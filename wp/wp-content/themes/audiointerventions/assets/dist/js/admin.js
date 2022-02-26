/******/ (function() { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./assets/admin/js/global/character-count.js":
/*!***************************************************!*\
  !*** ./assets/admin/js/global/character-count.js ***!
  \***************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
class CharacterCount {
  constructor(el) {
    this.dom = {
      el
    }; // bind context of event handlers

    this.onFieldChange = this.onFieldChange.bind(this); // run initial setup functions

    this.setDomElements();
    this.setProperties();
    this.bindEvents(); // render initial character count

    this.renderCount();
  } // this.dom contains cache of elements to use


  setDomElements() {
    this.dom.field = this.dom.el.querySelector('.js-character-count__field');
    this.dom.label = this.dom.el.querySelector('.js-character-count__label');
  } // "state" and other data about this instance


  setProperties() {
    this.count = this.dom.field.value.length;
  } // bind elements to event handlers


  bindEvents() {
    this.dom.field.addEventListener('input', this.onFieldChange);
  } // renders the count label


  renderCount() {
    this.dom.label.innerText = this.count;
  } // updates count and renders update


  onFieldChange(e) {
    this.count = this.dom.field.value.length;
    this.renderCount();
  }

} // global object storing instances of admin modules for this theme


window.audintAdmin = window.audintAdmin || {}; // instantiate module

const characterCount = document.body.querySelectorAll('.js-character-count');

if (characterCount.length) {
  window.audintAdmin.characterCount = [];
  characterCount.forEach(item => {
    window.audintAdmin.characterCount.push(new CharacterCount(item));
  });
}

/* harmony default export */ __webpack_exports__["default"] = (CharacterCount);

/***/ }),

/***/ "./assets/admin/js/meta-global/meta-bicolor-text.js":
/*!**********************************************************!*\
  !*** ./assets/admin/js/meta-global/meta-bicolor-text.js ***!
  \**********************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
class BicolorTextSettings {
  constructor(el) {
    this.dom = {
      el
    }; // bind context of event handlers

    this.onTextInputChange = this.onTextInputChange.bind(this);
    this.onColoredWordsClick = this.onColoredWordsClick.bind(this);
    this.onBicolorInputChange = this.onBicolorInputChange.bind(this); // run initial setup functions

    this.setDomElements();
    this.setProperties();
    this.bindEvents(); // render initial colored words

    this.renderColoredWords(); // hide words list, if not using colored words

    this.dom.coloredWordsWrap.classList.toggle('hidden', !this.dom.bicolorInput.checked);
  } // bind elements to event handlers


  setDomElements() {
    this.dom.textInput = this.dom.el.querySelector('.js-bicolor-text__text-input');
    this.dom.bicolorInput = this.dom.el.querySelector('.js-bicolor-text__checkbox-input');
    this.dom.coloredWordsInput = this.dom.el.querySelector('.js-bicolor-text__words-input');
    this.dom.coloredWords = this.dom.el.querySelector('.js-bicolor-text__words');
    this.dom.coloredWordsWrap = this.dom.el.querySelector('.js-bicolor-text__words-wrap');
  } // initial "state" and other data about this instance


  setProperties() {
    // array of strings; each word in the heading text
    this.textWords = this.dom.textInput.value.split(' '); // array of integers; indexes of words that should be red; initial value is comma-separated string of integers

    this.coloredWords = this.dom.coloredWordsInput.value.length ? this.dom.coloredWordsInput.value.split(',') : [];
  } // bind elements to event handlers


  bindEvents() {
    this.dom.textInput.addEventListener('input', this.onTextInputChange);
    this.dom.coloredWords.addEventListener('click', this.onColoredWordsClick);
    this.dom.bicolorInput.addEventListener('change', this.onBicolorInputChange);
  } // renders the colored words


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
    }); // render the list

    this.dom.coloredWords.innerHTML = '';
    this.dom.coloredWords.append(...wordSpans);
  } // updates list of words and re-renders clickable list


  onTextInputChange(e) {
    // set state of heading words
    this.textWords = e.currentTarget.value.trim().split(' '); // create a span element for each word to create a clickable list of words

    this.renderColoredWords();
  } // toggles the clicked word as colored, updates hidden field, and renders the updated list


  onColoredWordsClick(e) {
    // exit if clicked element isn't a clickable word
    if (e.target.tagName.toLowerCase() !== 'span') {
      return;
    } // value that will be added to colored words hidden input


    const index = e.target.dataset.index; // add/remove current word's index to list of words to save

    if (this.coloredWords.indexOf(index) === -1) {
      this.coloredWords.push(`${index}`);
    } else {
      this.coloredWords = this.coloredWords.filter(wordIndex => wordIndex !== `${index}`);
    } // update value on hidden field


    this.dom.coloredWordsInput.value = this.coloredWords.join(','); // render the word state change

    e.target.classList.toggle('red-highlight');
  } // toggle visibility of list of input when checkbox is checked/unchecked


  onBicolorInputChange(e) {
    this.dom.coloredWordsWrap.classList.toggle('hidden', !e.currentTarget.checked);
  }

} // global object storing instances of admin modules for this theme


window.audintAdmin = window.audintAdmin || {}; // instantiate module

const bicolorTextFields = document.body.querySelectorAll('.js-bicolor-text');

if (bicolorTextFields.length) {
  window.audintAdmin.bicolorTextFields = [];
  bicolorTextFields.forEach(group => {
    window.audintAdmin.bicolorTextFields.push(new BicolorTextSettings(group));
  });
}

/* harmony default export */ __webpack_exports__["default"] = (BicolorTextSettings);

/***/ }),

/***/ "./assets/admin/js/meta-global/meta-media-library.js":
/*!***********************************************************!*\
  !*** ./assets/admin/js/meta-global/meta-media-library.js ***!
  \***********************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
class MetaMediaLibrary {
  constructor(el) {
    this.dom = {
      el
    }; // configure WordPress Media uploader

    this.wpMedia = wp.media && wp.media({
      title: 'Select or Upload Image',
      button: {
        text: 'Use This Image'
      },
      type: 'image',
      multiple: false
    }); // bind context of event handlers

    this.onClickButton = this.onClickButton.bind(this);
    this.onClickRemove = this.onClickRemove.bind(this);
    this.onSelectMediaItem = this.onSelectMediaItem.bind(this); // run initial setup functions

    this.setDomElements();
    this.setProperties();
    this.bindEvents(); // if image is not set, hide preview element

    if (!this.dom.previewImg.src) {
      this.dom.previewWrap.classList.add('hidden');
    }
  } // this.dom contains cache of elements to use


  setDomElements() {
    this.dom.button = this.dom.el.querySelector('.js-media-library-fields__button');
    this.dom.previewWrap = this.dom.el.querySelector('.js-media-library-fields__preview-wrap');
    this.dom.previewImg = this.dom.el.querySelector('.js-media-library-fields__preview-img');
    this.dom.remove = this.dom.el.querySelector('.js-media-library-fields__remove');
    this.dom.input = this.dom.el.querySelector('.js-media-library-fields__input');
  }

  setProperties() {} // bind elements to event handlers


  bindEvents() {
    this.dom.button.addEventListener('click', this.onClickButton);
    this.dom.remove.addEventListener('click', this.onClickRemove); // custom wp.media event when main select button is clicked

    this.wpMedia.on('select', this.onSelectMediaItem);
  } // opens WP Media uploader modal


  onClickButton(e) {
    e.preventDefault();
    this.wpMedia.open();
  } // clears the image field, hides preview


  onClickRemove(e) {
    e.preventDefault();
    this.dom.previewImg.removeAttribute('src');
    this.dom.previewWrap.classList.add('hidden');
    this.dom.input.value = '';
  } // renders updates when image is selected (main button is clicked) in WP Media Uploader


  onSelectMediaItem() {
    const selectedImg = this.wpMedia.state().get('selection').toJSON();
    this.dom.previewImg.src = selectedImg[0].sizes.thumbnail.url;
    this.dom.previewWrap.classList.remove('hidden');
    this.dom.input.value = selectedImg[0].sizes.full.url;
  }

} // global object storing instances of admin modules for this theme


window.audintAdmin = window.audintAdmin || {}; // instantiate module

const metaMediaLibraryFields = document.body.querySelectorAll('.js-media-library-fields');

if (metaMediaLibraryFields.length) {
  window.audintAdmin.mediaLibrary = [];
  metaMediaLibraryFields.forEach(group => {
    window.audintAdmin.mediaLibrary.push(new MetaMediaLibrary(group));
  });
}

/* harmony default export */ __webpack_exports__["default"] = (MetaMediaLibrary);

/***/ }),

/***/ "./assets/admin/css/admin.scss":
/*!*************************************!*\
  !*** ./assets/admin/css/admin.scss ***!
  \*************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	!function() {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = function(exports) {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	}();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be isolated against other modules in the chunk.
!function() {
/*!**********************************!*\
  !*** ./assets/admin/js/index.js ***!
  \**********************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _global_character_count__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./global/character-count */ "./assets/admin/js/global/character-count.js");
/* harmony import */ var _meta_global_meta_bicolor_text__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./meta-global/meta-bicolor-text */ "./assets/admin/js/meta-global/meta-bicolor-text.js");
/* harmony import */ var _meta_global_meta_media_library__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./meta-global/meta-media-library */ "./assets/admin/js/meta-global/meta-media-library.js");
/* harmony import */ var _css_admin_scss__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../css/admin.scss */ "./assets/admin/css/admin.scss");




window.audintAdmin = window.audintAdmin || {};
}();
/******/ })()
;
//# sourceMappingURL=admin.js.map