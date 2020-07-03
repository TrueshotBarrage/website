/**-----------------------------------------------------------
 * name: index.js
 * purpose: jQuery scripts for terminal effect on index.php
 * author: david kim
 * last revised: july 3rd, 2020
 * Copyright 2020 David Kim. All rights reserved.
 -----------------------------------------------------------*/

$(document).ready(function () {
  $("#code-box").writer("Starting up terminal...\n", () => {
    $("#code-box").writer(`[${new Date().toLocaleString()}] /Homepage ➜ `, () => {
      $("#code-box").typewriter(`cowsay Welcome to my website! | lolcat\n`, 50);
    }, 1000);
  }, 1000);
});

$.fn.writer = function (text, callback, delay = 0) {
  this.append(text);
  if (callback) setTimeout(callback, delay);
  return this;
}

$.fn.typewriter = function (text, speed, callback, delay = 0) {
  function typewriterAux(self, i, txt, cb) {
    if (i < txt.length) {
      self.append(txt.charAt(i));
      setTimeout(() => {
        typewriterAux(self, i + 1, txt, cb);
      }, speed);
    }
    else if (cb) setTimeout(cb, delay);
    return self;
  }
  typewriterAux(this, 0, text, callback);
}