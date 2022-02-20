class MetaHomeBanner {
  constructor(el) {
    this.dom = { el };

    this.onHeadingInputChange = this.onHeadingInputChange.bind(this);
    this.onColoredWordsClick = this.onColoredWordsClick.bind(this);

    this.setDomElements();
    this.setProperties();
    this.bindEvents();

    this.renderColoredWords();
  }

  setDomElements() {
    this.dom.headingInput = document.body.querySelector('#audint_home_banner_heading');
    this.dom.bicolorInput = document.body.querySelector('#audint_home_banner_heading_bicolor');
    this.dom.coloredWordsInput = document.body.querySelector('#audint_home_banner_heading_colored_words');
    this.dom.coloredWords = document.body.querySelector('#audint_home_banner_heading_words');
    this.dom.imageButton = document.body.querySelector('#audint_home_banner_image_button');
    this.dom.imagePreview = document.body.querySelector('#audint_home_banner_image_preview');
  }

  setProperties() {
    // array of strings; each word in the heading text
    this.headingWords = this.dom.headingInput.value.split(' ');
    // array of integers; indexes of words that should be red
    this.headingColoredWords = this.dom.coloredWordsInput.value.length 
      ? this.dom.coloredWordsInput.value.split(',')
      : [];
  }

  bindEvents() {
    this.dom.headingInput.addEventListener('input', this.onHeadingInputChange);
    this.dom.coloredWords.addEventListener('click', this.onColoredWordsClick);
    // colored words checkbox
  }

  renderColoredWords() {
    // create a span element for each word to create a clickable list of words
    const wordSpans = this.headingWords.map((word, index) => {
      const span = document.createElement('span');
      span.innerText = word;
      span.dataset.index = index;

      if (this.headingColoredWords.indexOf(`${index}`) !== -1) {
        span.classList.add('highlight');
      }

      return span;
    });

    // render the list
    this.dom.coloredWords.innerHTML = '';
    this.dom.coloredWords.append(...wordSpans);
  }

  onHeadingInputChange(e) {
    // set state of heading words
    this.headingWords = e.currentTarget.value.trim().split(' ');

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
    if (this.headingColoredWords.indexOf(index) === -1) {
      this.headingColoredWords.push(`${index}`);
    } else {
      this.headingColoredWords = this.headingColoredWords.filter(wordIndex => wordIndex !== `${index}`);
    }
    // update value on hidden field
    this.dom.coloredWordsInput.value = this.headingColoredWords.join(',');

    // render the word state change
    e.target.classList.toggle('highlight');
  }
}

window.audintAdmin = window.audintAdmin || {};

const metaHomeBanner = document.body.querySelector('#audint-meta-home-banner');
if (metaHomeBanner) {
  window.audintAdmin.metaHomeBanner = new MetaHomeBanner(metaHomeBanner);
}

export default MetaHomeBanner;
