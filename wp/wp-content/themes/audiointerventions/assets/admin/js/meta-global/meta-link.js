class MetaLink {
  constructor(el) {
    this.dom = { el };

    this.onTypeChange = this.onTypeChange.bind(this);
    this.onPageChange = this.onPageChange.bind(this);

    this.setDomElements();
    this.setProperties();
    this.bindEvents();

    this.displaySelectedType();
  }

  setDomElements() {
    this.dom.type = this.dom.el.querySelectorAll('.js-link-field__type');
    this.dom.pageSection = this.dom.el.querySelector('.js-link-field__page-section');
    this.dom.pageSelector = this.dom.el.querySelector('.js-link-field__page-selector');
    this.dom.textWrap = this.dom.el.querySelector('.js-link-field__text-input-wrap');
    this.dom.textInput = this.dom.el.querySelector('.js-link-field__text-input');
    this.dom.urlWrap = this.dom.el.querySelector('.js-link-field__url-input-wrap');
    this.dom.urlInput = this.dom.el.querySelector('.js-link-field__url-input');
    this.dom.tabWrap = this.dom.el.querySelector('.js-link-field__tab-input-wrap');
    this.dom.openInNewTab = this.dom.tabWrap.querySelector('input');
  }

  setProperties() {
    this.setSelectedType();
  }

  bindEvents() {
    this.dom.type.forEach(radio => {
      radio.addEventListener('change', this.onTypeChange);
    });
    this.dom.pageSelector.addEventListener('change', this.onPageChange);
  }

  setSelectedType() {
    this.dom.type.forEach(radio => {
      if (radio.checked) {
        this.urlType = radio.value;
      }
    });
    if (!this.urlType) this.urlType = 'page';
    this.url = this.dom.urlInput.value;
    this.page = this.dom.pageSelector.value;
    this.label = this.dom.textInput.value;
    this.openInNewTab = this.dom.openInNewTab.checked;
  }

  displaySelectedType() {
    if (this.urlType === 'page') {
      this.dom.urlWrap.classList.add('hidden');
      this.dom.pageSection.classList.remove('hidden');
      this.dom.textWrap.classList.remove('hidden');
      this.dom.tabWrap.classList.remove('hidden');
    } else if (this.urlType === 'custom') {
      this.dom.urlWrap.classList.remove('hidden');
      this.dom.pageSection.classList.add('hidden');
      this.dom.textWrap.classList.remove('hidden');
      this.dom.tabWrap.classList.remove('hidden');
    } else if (this.urlType === 'none') {
      this.dom.urlWrap.classList.add('hidden');
      this.dom.pageSection.classList.add('hidden');
      this.dom.textWrap.classList.add('hidden');
      this.dom.tabWrap.classList.add('hidden');
    }
  }

  updateFieldValues() {
    this.dom.urlInput.value = this.url;
    this.dom.pageSelector.value = this.page;
    this.dom.textInput.value = this.label;
    this.dom.openInNewTab.checked = this.openInNewTab;
  }

  onTypeChange() {
    this.setSelectedType();
    this.displaySelectedType();
  }

  onPageChange(e) {
    this.url = e.currentTarget.value;
    this.page = e.currentTarget.value;
    this.updateFieldValues();
  }
}

window.audintAdmin = window.audintAdmin || {};

const metaLinks = document.body.querySelectorAll('.js-link-field');
if (metaLinks.length) {
  window.audintAdmin.linkFields = [];

  metaLinks.forEach(field => {
    window.audintAdmin.linkFields.push(new MetaLink(field));
  });
}

export default MetaLink;
