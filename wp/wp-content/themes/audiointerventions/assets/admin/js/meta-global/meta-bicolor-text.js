class BicolorTextSettings {
  constructor(el) {
    this.dom = { el };

    // bind context of event handlers
    this.onTextInputChange = this.onTextInputChange.bind(this);
    this.onColoredWordsClick = this.onColoredWordsClick.bind(this);
    this.onBicolorInputChange = this.onBicolorInputChange.bind(this);

    // run initial setup functions
    this.setDomElements();
    this.setProperties();
    this.bindEvents();

    // render initial colored words
    this.renderColoredWords();
    // hide words list, if not using colored words
    this.dom.coloredWordsWrap.classList.toggle('hidden', !this.dom.bicolorInput.checked);
  }

  // bind elements to event handlers
  setDomElements() {
    this.dom.textInput = this.dom.el.querySelector('.js-bicolor-text__text-input');
    this.dom.bicolorInput = this.dom.el.querySelector('.js-bicolor-text__checkbox-input');
    this.dom.coloredWordsInput = this.dom.el.querySelector('.js-bicolor-text__words-input');
    this.dom.coloredWords = this.dom.el.querySelector('.js-bicolor-text__words');
    this.dom.coloredWordsWrap = this.dom.el.querySelector('.js-bicolor-text__words-wrap');
  }

  // initial "state" and other data about this instance
  setProperties() {
    // array of strings; each word in the heading text
    this.textWords = this.dom.textInput.value.split(' ');
    // array of integers; indexes of words that should be red; initial value is comma-separated string of integers
    this.coloredWords = this.dom.coloredWordsInput.value.length 
      ? this.dom.coloredWordsInput.value.split(',')
      : [];
  }

  // bind elements to event handlers
  bindEvents() {
    this.dom.textInput.addEventListener('input', this.onTextInputChange);
    this.dom.coloredWords.addEventListener('click', this.onColoredWordsClick);
    this.dom.bicolorInput.addEventListener('change', this.onBicolorInputChange);
  }

  // renders the colored words
  renderColoredWords() {
    // create a span element for each word to create a clickable list of words
    const wordSpans = this.textWords.map((word, index) => {
      const span = document.createElement('span');
      span.innerText = word;
      span.dataset.index = index;

      if (this.coloredWords.indexOf(`${index}`) !== -1) {
        span.classList.add('red-highlight');
      }

      return span;
    });

    // render the list
    this.dom.coloredWords.innerHTML = '';
    this.dom.coloredWords.append(...wordSpans);
  }

  // updates list of words and re-renders clickable list
  onTextInputChange(e) {
    // set state of heading words
    this.textWords = e.currentTarget.value.trim().split(' ');

    // create a span element for each word to create a clickable list of words
    this.renderColoredWords();
  }

  // toggles the clicked word as colored, updates hidden field, and renders the updated list
  onColoredWordsClick(e) {
    // exit if clicked element isn't a clickable word
    if (e.target.tagName.toLowerCase() !== 'span') {
      return;
    }

    // value that will be added to colored words hidden input
    const index = e.target.dataset.index;
    // add/remove current word's index to list of words to save
    if (this.coloredWords.indexOf(index) === -1) {
      this.coloredWords.push(`${index}`);
    } else {
      this.coloredWords = this.coloredWords.filter(wordIndex => wordIndex !== `${index}`);
    }
    // update value on hidden field
    this.dom.coloredWordsInput.value = this.coloredWords.join(',');

    // render the word state change
    e.target.classList.toggle('red-highlight');
  }

  // toggle visibility of list of input when checkbox is checked/unchecked
  onBicolorInputChange(e) {
    this.dom.coloredWordsWrap.classList.toggle('hidden', !e.currentTarget.checked);
  }
}

// global object storing instances of admin modules for this theme
window.audintAdmin = window.audintAdmin || {};
// instantiate module
const bicolorTextFields = document.body.querySelectorAll('.js-bicolor-text');
if (bicolorTextFields.length) {
  window.audintAdmin.bicolorTextFields = []

  bicolorTextFields.forEach(group => {
    window.audintAdmin.bicolorTextFields.push(new BicolorTextSettings(group));
  });
}

export default BicolorTextSettings;
