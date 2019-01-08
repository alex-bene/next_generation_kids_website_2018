var path = document.location.pathname;
var dir = path.substring(path.indexOf('/', 1)+1, path.lastIndexOf('/'));

function show_bio(id) {

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("bio").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "./PHP/getbio.php?name=" + id, true)

    xmlhttp.send();

    var overlay = document.getElementsByClassName("hidden_overlay")[0];
    overlay.className = overlay.className.replace("hidden_overlay", "visible_overlay");
}
function hide_bio() {
    var overlay = document.getElementsByClassName("visible_overlay")[0];
    overlay.className = overlay.className.replace("visible_overlay", "hidden_overlay");
}
