function toggle_visibility(id) {
    var parent = document.getElementById(id)
    var staff = parent.getElementsByClassName("hidden")[1];
    var hide_button = parent.getElementsByClassName("hidden")[0];
    var show_button = parent.getElementsByClassName("button")[0];
    if (staff.style.display === "block") {
        unzoom(staff);
        unzoom(hide_button);
        zoom(show_button);
    } else {
        unzoom(show_button);
        zoom(staff);
        zoom(hide_button);
    }
}
