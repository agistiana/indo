function changeColor() {
    var icon = document.getElementById("myIcon");
    var iconPath = document.getElementById("iconPath");
    if (!icon.classList.contains("clicked")) {
        icon.classList.add("clicked");
        iconPath.setAttribute("fill", "#4AB273");
    } else {
        icon.classList.remove("clicked");
        iconPath.setAttribute("fill", "rgba(0, 0, 0, 0.20);");
    }
}