const desktop = window.matchMedia("(min-width: 768px)");

window.onscroll = function () {
  if (desktop.matches) {
    if (window.pageYOffset >= 140) {
      headerStickyDesktop.classList.add("sticky-default");
      menuSticky.style.position = "sticky";
      menuSticky.style.left = "0";
      menuSticky.style.paddingTop = "20px";
      menuSticky.style.transform = "none";
    } else {
      headerStickyDesktop.classList.remove("sticky-default");
      menuSticky.style.position = "absolute";
      menuSticky.style.left = "50%";
      menuSticky.style.paddingTop = "60px";
      menuSticky.style.transform = "translateX(-50%)";
    }
  } else {
    if (window.pageYOffset >= 65) {
      headerStickyDesktop.classList.remove("sticky-default");
      menuSticky.style.position = "sticky";
      menuSticky.style.left = "50%";
      menuSticky.style.paddingTop = "0";
    } else {
      menuSticky.style.position = "absolute";
      menuSticky.style.left = "0";
      menuSticky.style.paddingTop = "0";
    }
  }
};

const menuSticky = document.getElementById("menu");
const headerStickyDesktop = document.getElementById("headerDefault");
