class MetaMediaLibrary {
  constructor(el) {
    this.dom = { el };
    
    this.wpMedia = wp.media && wp.media({
      title: 'Select or Upload Image',
      button: { text: 'Use This Image' },
      type: 'image',
      multiple: false,
    });

    this.onClickButton = this.onClickButton.bind(this);
    this.onClickRemove = this.onClickRemove.bind(this);
    this.onSelectMediaItem = this.onSelectMediaItem.bind(this);

    this.setDomElements();
    this.setProperties();
    this.bindEvents();

    if (!this.dom.previewImg.src) {
      this.dom.previewWrap.classList.add('hidden');
    }
  }

  setDomElements() {
    this.dom.button = document.body.querySelector('.js-media-library-fields__button');
    this.dom.previewWrap = document.body.querySelector('.js-media-library-fields__preview-wrap');
    this.dom.previewImg = document.body.querySelector('.js-media-library-fields__preview-img');
    this.dom.remove = document.body.querySelector('.js-media-library-fields__remove');
    this.dom.input = document.body.querySelector('.js-media-library-fields__input');
  }

  setProperties() {}

  bindEvents() {
    this.dom.button.addEventListener('click', this.onClickButton);
    this.dom.remove.addEventListener('click', this.onClickRemove);
    
    this.wpMedia.on('select', this.onSelectMediaItem);
  }

  onClickButton(e) {
    e.preventDefault();
    this.wpMedia.open();
  }

  onClickRemove(e) {
    e.preventDefault();
    this.dom.previewImg.removeAttribute('src');
    this.dom.previewWrap.classList.add('hidden');
    this.dom.input.value = '';
  }

  onSelectMediaItem() {
    const selectedImg = this.wpMedia.state().get('selection').toJSON();
    this.dom.previewImg.src = selectedImg[0].sizes.thumbnail.url;
    this.dom.previewWrap.classList.remove('hidden');
    this.dom.input.value = selectedImg[0].sizes.full.url;
  }
}

window.audintAdmin = window.audintAdmin || {};

const metaMediaLibraryFields = document.body.querySelectorAll('.js-media-library-fields');
if (metaMediaLibraryFields.length) {
  window.audintAdmin.mediaLibrary = [];

  metaMediaLibraryFields.forEach(group => {
    window.audintAdmin.mediaLibrary.push(new MetaMediaLibrary(group));
  });
}

export default MetaMediaLibrary;
