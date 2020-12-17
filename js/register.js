var sectionLogin = document.getElementById("section-login")
var sectionSignup = document.getElementById("section-signup")
var login = document.getElementById("signup-to-login")
var signup = document.getElementById("login-to-signup")

var buttonMale = document.getElementById("button-male")
var buttonFemale = document.getElementById("button-female")
var gender = document.getElementById("hide-gender")

login.addEventListener("click", toggleSections);
signup.addEventListener("click", toggleSections);
buttonMale.addEventListener("click", maleGender);
buttonFemale.addEventListener("click", femaleGender);

function toggleSections() {
    sectionLogin.classList.toggle("section-hide");
    sectionSignup.classList.toggle("section-hide");
}

function maleGender() {
    buttonFemale.classList.remove("button-selected");
    buttonMale.classList.add("button-selected");
    gender.value = 0;
}
function femaleGender() {
    buttonMale.classList.remove("button-selected");
    buttonFemale.classList.add("button-selected");
    gender.value = 1;
}