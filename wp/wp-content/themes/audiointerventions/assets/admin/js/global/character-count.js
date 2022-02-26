class CharacterCount {
  constructor(el) {
    this.dom = { el };

    // bind context of event handlers
    this.onFieldChange = this.onFieldChange.bind(this);

    // run initial setup functions
    this.setDomElements();
    this.setProperties();
    this.bindEvents();

    // render initial character count
    this.renderCount();
  }

  // this.dom contains cache of elements to use
  setDomElements() {
    this.dom.field = this.dom.el.querySelector('.js-character-count__field');
    this.dom.label = this.dom.el.querySelector('.js-character-count__label');
  }

  // "state" and other data about this instance
  setProperties() {
    this.count = this.dom.field.value.length;
  }

  // bind elements to event handlers
  bindEvents() {
    this.dom.field.addEventListener('input', this.onFieldChange);
  }

  // renders the count label
  renderCount() {
    this.dom.label.innerText = this.count;
  }

  // updates count and renders update
  onFieldChange(e) {
    this.count = this.dom.field.value.length;
    this.renderCount();
  }
}

// global object storing instances of admin modules for this theme
window.audintAdmin = window.audintAdmin || {};
// instantiate module
const characterCount = document.body.querySelectorAll('.js-character-count');
if (characterCount.length) {
  window.audintAdmin.characterCount = [];

  characterCount.forEach(item => {
    window.audintAdmin.characterCount.push(new CharacterCount(item));
  });
}

export default CharacterCount;
