var fixed = document.getElementById("fixed");
var button = document.getElementById("ok-btn");
button.addEventListener("click", function() {
    fixed.parentNode.removeChild(fixed);
})