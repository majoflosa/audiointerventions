class MetaMediaLibrary {
  constructor(el) {
    this.dom = { el };
    
    // configure WordPress Media uploader
    this.wpMedia = wp.media && wp.media({
      title: 'Select or Upload Image',
      button: { text: 'Use This Image' },
      type: 'image',
      multiple: false,
    });

    // bind context of event handlers
    this.onClickButton = this.onClickButton.bind(this);
    this.onClickRemove = this.onClickRemove.bind(this);
    this.onSelectMediaItem = this.onSelectMediaItem.bind(this);

    // run initial setup functions
    this.setDomElements();
    this.setProperties();
    this.bindEvents();

    // if image is not set, hide preview element
    if (!this.dom.previewImg.src) {
      this.dom.previewWrap.classList.add('hidden');
    }
  }

  // this.dom contains cache of elements to use
  setDomElements() {
    this.dom.button = this.dom.el.querySelector('.js-media-library-fields__button');
    this.dom.previewWrap = this.dom.el.querySelector('.js-media-library-fields__preview-wrap');
    this.dom.previewImg = this.dom.el.querySelector('.js-media-library-fields__preview-img');
    this.dom.remove = this.dom.el.querySelector('.js-media-library-fields__remove');
    this.dom.input = this.dom.el.querySelector('.js-media-library-fields__input');
  }

  setProperties() {}

  // bind elements to event handlers
  bindEvents() {
    this.dom.button.addEventListener('click', this.onClickButton);
    this.dom.remove.addEventListener('click', this.onClickRemove);
    // custom wp.media event when main select button is clicked
    this.wpMedia.on('select', this.onSelectMediaItem);
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
    const selectedImg = this.wpMedia.state().get('selection').toJSON();
    this.dom.previewImg.src = selectedImg[0].sizes.thumbnail.url;
    this.dom.previewWrap.classList.remove('hidden');
    this.dom.input.value = selectedImg[0].sizes.full.url;
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
