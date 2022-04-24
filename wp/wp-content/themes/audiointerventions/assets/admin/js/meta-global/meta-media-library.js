class MetaMediaLibrary {
  constructor(el) {
    this.dom = { el };

    this.isMultiple = !!this.dom.el.dataset.multiple;
    console.log('this.isMultiple: ', this.isMultiple);
    
    // configure WordPress Media uploader
    this.wpMedia = wp.media && wp.media({
      title: 'Select or Upload Image',
      button: this.isMultiple ? { text: 'Set Images' } : { text: 'Use This Image' },
      type: 'image',
      multiple: this.isMultiple ? 'add' : false,
    });

    // bind context of event handlers
    this.onClickButton = this.onClickButton.bind(this);
    this.onClickRemove = this.onClickRemove.bind(this);
    this.onSelectMediaItem = this.onSelectMediaItem.bind(this);
    this.onInputBlur = this.onInputBlur.bind(this);
    this.onClickMultipleImage = this.onClickMultipleImage.bind(this);
    this.onClickClear = this.onClickClear.bind(this);

    // run initial setup functions
    this.setDomElements();
    this.setProperties();
    this.bindEvents();

    // if image is not set, hide preview element
    if (!this.isMultiple && !this.dom.previewImg.src) {
      this.dom.previewWrap.classList.add('hidden');
    }
  }

  // this.dom contains cache of elements to use
  setDomElements() {
    this.dom.button = this.dom.el.querySelector('.js-media-library-fields__button');
    this.dom.input = this.dom.el.querySelector('.js-media-library-fields__input');
    this.dom.previewWrap = this.dom.el.querySelector('.js-media-library-fields__preview-wrap');

    if (this.isMultiple) {
      this.dom.clear = this.dom.el.querySelector('.js-media-library-fields__clear');
    } else {
      this.dom.previewImg = this.dom.el.querySelector('.js-media-library-fields__preview-img');
      this.dom.remove = this.dom.el.querySelector('.js-media-library-fields__remove');
    }
  }

  setProperties() {
    if (this.isMultiple) {
      this.images = this.dom.input.value.split(',');
    }
  }

  // bind elements to event handlers
  bindEvents() {
    this.dom.button.addEventListener('click', this.onClickButton);
    
    // custom wp.media event when main select button is clicked
    this.wpMedia.on('select', this.onSelectMediaItem);

    if (this.isMultiple) {
      this.dom.previewWrap.addEventListener('click', this.onClickMultipleImage);
      this.dom.clear.addEventListener('click', this.onClickClear);
    } else {
      this.dom.remove.addEventListener('click', this.onClickRemove);
      this.dom.input.addEventListener('blur', this.onInputBlur);
    }
  }

  // opens WP Media uploader modal
  onClickButton(e) {
    e.preventDefault();
    this.wpMedia.open();
  }

  // clears the image field, hides preview
  onClickRemove(e) {
    e.preventDefault();
    this.dom.previewImg.removeAttribute('src');
    this.dom.previewWrap.classList.add('hidden');
    this.dom.input.value = '';
  }

  // renders updates when image is selected (main button is clicked) in WP Media Uploader
  onSelectMediaItem() {
    if (this.isMultiple) {
      const attachment = this.wpMedia.state().get('selection').toJSON();
      const thumbnails = attachment.map(item => item.sizes.thumbnail.url);

      thumbnails.forEach(src => {
        const preview = this.createImagePreview(src);
        this.dom.previewWrap.append(preview);
      });

      const newImages = attachment.map(image => image.url);
      this.updateHiddenValue(newImages, 'add');
    } else {
      const selectedImg = this.wpMedia.state().get('selection').toJSON();
      this.dom.previewImg.src = selectedImg[0].sizes.thumbnail.url;
      this.dom.previewWrap.classList.remove('hidden');
      this.dom.input.value = selectedImg[0].sizes.full.url;
    }
  }

  onInputBlur() {
    const newValue = this.dom.input.value;

    if (newValue && this.dom.previewImg.src !== newValue) {
      this.dom.previewImg.src = newValue;
      this.dom.previewWrap.classList.remove('hidden');
    }
  }

  onClickMultipleImage(e) {
    e.preventDefault();
    if (e.target.classList.contains('js-media-library-fields__remove')
      || e.target.closest('.js-media-library-fields__remove')) {
        const wrap = e.target.closest('.js-media-library-fields__preview-item');
        const src = wrap.querySelector('img').src;

        this.updateHiddenValue(src, 'remove');
        wrap.remove();
    }
  }

  onClickClear(e) {
    e.preventDefault();
    this.dom.previewWrap.innerHTML = '';
    this.updateHiddenValue([], 'replace');
  }

  createImagePreview(src) {
    const item = document.createElement('div');
    item.classList.add('audint-meta-image-preview__item');
    item.classList.add('js-media-library-fields__preview-item');

    const img = document.createElement('img');
    img.src = src;
    img.classList.add('js-media-library-fields__preview-img');

    const overlay = document.createElement('div');
    overlay.classList.add('audint-meta-image-preview__item-overlay');

    const remove = document.createElement('button');
    remove.innerText = 'X Remove';
    remove.classList.add('audint-meta-image-remove');
    remove.classList.add('js-media-library-fields__remove');

    overlay.append(remove);
    item.append(img);
    item.append(overlay);

    return item;
  }

  updateHiddenValue(newImages, action) {
    if (action === 'add') {
      this.images = [...this.images, newImages];
    } else if (action === 'remove') {
      this.images = this.images.filter(img => img !== newImages);
    } else if (action === 'replace') {
      this.images = [];
    }
    this.dom.input.value = this.images.join(',');
    console.log('this.dom.input.value: ', this.dom.input.value);
  }
}

// global object storing instances of admin modules for this theme
window.audintAdmin = window.audintAdmin || {};
// instantiate module
const metaMediaLibraryFields = document.body.querySelectorAll('.js-media-library-fields');
if (metaMediaLibraryFields.length) {
  window.audintAdmin.mediaLibrary = [];

  metaMediaLibraryFields.forEach(group => {
    window.audintAdmin.mediaLibrary.push(new MetaMediaLibrary(group));
  });
}

export default MetaMediaLibrary;
