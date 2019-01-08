var slideIndex = 1;
showDiv(slideIndex);
var refreshIntervalId;

function currentDiv(n) {
  clearInterval(refreshIntervalId);
  showDiv(slideIndex = n);
}

function plusDiv() {
  clearInterval(refreshIntervalId);
  showDiv(slideIndex += 1);
}

function minusDiv() {
  clearInterval(refreshIntervalId);
  showDiv(slideIndex -= 1);
}

function showDiv(n) {
  clearInterval(refreshIntervalId);
  refreshIntervalId = setInterval(plusDiv, 5000);
  var i;
  var x = document.getElementsByClassName("slides");
  var dots = document.getElementsByClassName("image-slider-dot");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
      if((slideIndex-1) == i) continue;
     fade(x[i],0);
  }
  for (i = 0; i < dots.length; i++) {
     dots[i].className = dots[i].className.replace(" white-dot", "");
  }
  unfade(x[slideIndex-1]);
  dots[slideIndex-1].className += " white-dot";
}
