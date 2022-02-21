class BicolorTextSettings {
  constructor(el) {
    this.dom = { el };

    this.onTextInputChange = this.onTextInputChange.bind(this);
    this.onColoredWordsClick = this.onColoredWordsClick.bind(this);
    this.onBicolorInputChange = this.onBicolorInputChange.bind(this);

    this.setDomElements();
    this.setProperties();
    this.bindEvents();

    this.renderColoredWords();
    this.dom.coloredWordsWrap.classList.toggle('hidden', !this.dom.bicolorInput.checked);
  }

  setDomElements() {
    this.dom.textInput = document.body.querySelector('.js-bicolor-text__text-input');
    this.dom.bicolorInput = document.body.querySelector('.js-bicolor-text__checkbox-input');
    this.dom.coloredWordsInput = document.body.querySelector('.js-bicolor-text__words-input');
    this.dom.coloredWords = document.body.querySelector('.js-bicolor-text__words');
    this.dom.coloredWordsWrap = document.body.querySelector('.js-bicolor-text__words-wrap');
    // this.dom.imageButton = document.body.querySelector('#audint_home_banner_image_button');
    // this.dom.imagePreview = document.body.querySelector('#audint_home_banner_image_preview');
  }

  setProperties() {
    // array of strings; each word in the heading text
    this.textWords = this.dom.textInput.value.split(' ');
    // array of integers; indexes of words that should be red
    this.coloredWords = this.dom.coloredWordsInput.value.length 
      ? this.dom.coloredWordsInput.value.split(',')
      : [];
  }

  bindEvents() {
    this.dom.textInput.addEventListener('input', this.onTextInputChange);
    this.dom.coloredWords.addEventListener('click', this.onColoredWordsClick);
    this.dom.bicolorInput.addEventListener('change', this.onBicolorInputChange);
  }

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

  onTextInputChange(e) {
    // set state of heading words
    this.textWords = e.currentTarget.value.trim().split(' ');

    // create a span element for each word to create a clickable list of words
    this.renderColoredWords();
  }

  onColoredWordsClick(e) {
    // exit if clicked element isn't a clicked word
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

  onBicolorInputChange(e) {
    this.dom.coloredWordsWrap.classList.toggle('hidden', !e.currentTarget.checked);
  }
}

window.audintAdmin = window.audintAdmin || {};

const bicolorTextFields = document.body.querySelectorAll('.js-bicolor-text');
if (bicolorTextFields.length) {
  window.audintAdmin.bicolorTextFields = []

  bicolorTextFields.forEach(group => {
    window.audintAdmin.bicolorTextFields.push(new BicolorTextSettings(group));
  });
}

export default BicolorTextSettings;
