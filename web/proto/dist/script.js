!function(e){var t={};function s(n){if(t[n])return t[n].exports;var l=t[n]={i:n,l:!1,exports:{}};return e[n].call(l.exports,l,l.exports,s),l.l=!0,l.exports}s.m=e,s.c=t,s.d=function(e,t,n){s.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:n})},s.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},s.t=function(e,t){if(1&t&&(e=s(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var n=Object.create(null);if(s.r(n),Object.defineProperty(n,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var l in e)s.d(n,l,function(t){return e[t]}.bind(null,l));return n},s.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return s.d(t,"a",t),t},s.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},s.p="",s(s.s=0)}([function(e,t,s){"use strict";s.r(t);s(1);console.log("js entry point");const n=document.querySelector(".tabs");new class{constructor(e){this.dom={el:e},this.onTabClick=this.onTabClick.bind(this),this.setDomElements(),this.setProperties(),this.bindEvents()}setDomElements(){this.dom.header=this.dom.el.querySelector(".tabs__header"),this.dom.tabs=this.dom.el.querySelectorAll(".tabs__tab"),this.dom.content=this.dom.el.querySelector(".tabs__content"),this.dom.panels=this.dom.el.querySelectorAll(".tabs__panel")}setProperties(){this.selectedTab=this.dom.header.querySelector(".selected")||this.dom.tabs[0],this.selectedPanel=this.dom.content.querySelector(`[data-index="${this.selectedTab.dataset.index}"]`),this.selectedTab.classList.contains("selected")||this.selectedTab.classList.add("selected"),this.selectedPanel.classList.contains("selected")||this.selectedPanel.classList.add("selected")}bindEvents(){this.dom.tabs.forEach(e=>e.addEventListener("click",this.onTabClick))}onTabClick(e){const t=e.currentTarget.dataset.index;this.selectedTab.classList.remove("selected"),this.selectedPanel.classList.remove("selected"),this.selectedTab=e.currentTarget,this.selectedTab.classList.add("selected"),this.selectedPanel=this.dom.content.querySelector(`[data-index="${t}"]`),this.selectedPanel.classList.add("selected")}}(n)},function(e,t,s){}]);
//# sourceMappingURL=script.js.map