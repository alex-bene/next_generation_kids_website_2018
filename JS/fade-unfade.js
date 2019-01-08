function unfade(element) {
    var op = 0.1;  // initial opacity
    var timer = setInterval(function () {
        if (op >= 0.95){
            clearInterval(timer);
            op = 1;
        }
        element.style.opacity = op;
        element.style.filter = 'alpha(opacity=' + op * 100 + ")";
        op += op * 0.1;
    }, 20);
}

function fade(element,none) {
    var op = element.style.opacity;  // initial opacity
    var timer = setInterval(function () {
        if (op <= 0.05){
            clearInterval(timer);
            op = 0;
            if(none) element.style.display = 'none';
        }
        element.style.opacity = op;
        element.style.filter = 'alpha(opacity=' + op * 100 + ")";
        op -= op * 0.1;
    }, 20);
}

function unzoom(element){
    var height = parseInt(element.clientHeight);  // initial height
    var zoom  = 1;
    var timer = setInterval(function () {
        if (zoom <= 0.05 || height <= 0.05){
            clearInterval(timer);
            zoom = 0;
            height = 0;
            element.style.display = 'none';
        }
        element.style.height = '' + height + 'px';
        element.style.transform = 'scale(' + zoom + ')';
        height -= height*0.1;
        zoom -= zoom*0.1;
    }, 15);
}

function zoom(element){
    element.style.height = "100%";
    var zoom  = 0.01;
    var timer = setInterval(function () {
        if (zoom >= 0.95){
            clearInterval(timer);
            zoom = 1;
        }
        element.style.transform = 'scale(' + zoom + ')';
        zoom += zoom*0.1;
    }, 15);
    element.style.display = 'block';

}
