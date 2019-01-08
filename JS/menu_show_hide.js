function change_section(id) {

    var change = document.getElementById(id);
    var tab_change = document.getElementById(id+"_tab");
    var parent = change.parentNode;
    var tabs = parent.getElementsByClassName("tab_picker");
    var sections = parent.getElementsByClassName("hidden");
    if (change.style.display == "block") {}
    else {
        for(var i=0; i < sections.length; i++){
            if(change == sections[i]) continue;
            sections[i].style.display = "none";
        }
        for(var i=0; i < tabs.length; i++){
            removeClass(tabs[i],"active");
        }
        change.style.opacity = 1;
        change.style.position = "relative";

        change.style.display = "block";
        addClass(tab_change,"active");
    }
}
