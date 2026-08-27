function openLgNav() {
    var elem = document.getElementById("mySidepanel");
    if (elem) elem.style.width = "300px";
    closesideMenu();
}

function openNav() {
    var elem = document.getElementById("mySidepanel");
    if (elem) elem.style.width = "280px";
    closesideMenu();
    clossProfileNav();
}

function openProfileNav() {
    var elem = document.getElementById("myProfileSidepanel");
    if (elem) elem.style.width = "280px";
    closeNav();
    closesideMenu();
}

function clossProfileNav() {
    var elem = document.getElementById("myProfileSidepanel");
    if (elem) elem.style.width = "0";
}

function closeNav() {
    var elem = document.getElementById("mySidepanel");
    if (elem) elem.style.width = "0";
}

function closelgNav() {
    var elem = document.getElementById("mySidepanel");
    if (elem) elem.style.width = "0";
}

function sideMenuOpen() {
    var elem = document.getElementById("SideMenu");
    if (elem) elem.style.width = "280px";
    closeNav();
}

function closesideMenu() {
    var elem = document.getElementById("SideMenu");
    if (elem) elem.style.width = "0";
}