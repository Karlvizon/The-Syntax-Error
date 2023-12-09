// Get the current page URL
var url = window.location.pathname;
var filename = url.substring(url.lastIndexOf("/") + 1);

// Find the corresponding link and add 'active' class
var links = document.querySelectorAll("nav a");
links.forEach(function (link) {
  if (link.getAttribute("href") === filename) {
    link.classList.add("active");
  }
});
