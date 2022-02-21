/******/ (function() { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

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
    };
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
    this.dom.coloredWordsWrap = document.body.querySelector('.js-bicolor-text__words-wrap'); // this.dom.imageButton = document.body.querySelector('#audint_home_banner_image_button');
    // this.dom.imagePreview = document.body.querySelector('#audint_home_banner_image_preview');
  }

  setProperties() {
    // array of strings; each word in the heading text
    this.textWords = this.dom.textInput.value.split(' '); // array of integers; indexes of words that should be red

    this.coloredWords = this.dom.coloredWordsInput.value.length ? this.dom.coloredWordsInput.value.split(',') : [];
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
    }); // render the list

    this.dom.coloredWords.innerHTML = '';
    this.dom.coloredWords.append(...wordSpans);
  }

  onTextInputChange(e) {
    // set state of heading words
    this.textWords = e.currentTarget.value.trim().split(' '); // create a span element for each word to create a clickable list of words

    this.renderColoredWords();
  }

  onColoredWordsClick(e) {
    // exit if clicked element isn't a clicked word
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
  }

  onBicolorInputChange(e) {
    this.dom.coloredWordsWrap.classList.toggle('hidden', !e.currentTarget.checked);
  }

}

window.audintAdmin = window.audintAdmin || {};
const bicolorTextFields = document.body.querySelectorAll('.js-bicolor-text');

if (bicolorTextFields.length) {
  window.audintAdmin.bicolorTextFields = [];
  bicolorTextFields.forEach(group => {
    window.audintAdmin.bicolorTextFields.push(new BicolorTextSettings(group));
  });
}

/* harmony default export */ __webpack_exports__["default"] = (BicolorTextSettings);

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
/* harmony import */ var _meta_global_meta_bicolor_text__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./meta-global/meta-bicolor-text */ "./assets/admin/js/meta-global/meta-bicolor-text.js");
/* harmony import */ var _css_admin_scss__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../css/admin.scss */ "./assets/admin/css/admin.scss");


window.audintAdmin = window.audintAdmin || {};
}();
/******/ })()
;
//# sourceMappingURL=admin.js.map