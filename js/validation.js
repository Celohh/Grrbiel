var allInputs = document.getElementsByClassName("input_text");
var buttonMale = document.getElementById("button-male")
var buttonFemale = document.getElementById("button-female")
for (i = 0; i < allInputs.length; i++) {
    removeClass(i);
}
buttonMale.addEventListener("click", buttonsRemoveClass)
buttonFemale.addEventListener("click", buttonsRemoveClass)

function removeClass(index) {
    allInputs[index].addEventListener("change", function () {
        if (allInputs[index].value != "") {
            allInputs[index].classList.remove("input_invalid");
        }
    });
}

function buttonsRemoveClass() {
    if (buttonMale.classList.contains("button-selected") || buttonFemale.classList.contains("button-selected")) {
        buttonMale.classList.remove("input_invalid")
        buttonFemale.classList.remove("input_invalid")
    }
}
function validate(index) {
    var toReturn = false;
    var error = true;
    if (index == "sign") {
        var inputs = document.getElementsByClassName("input_sign");
    } else {
        var inputs = document.getElementsByClassName("input_login");
    }
    var i;
    for (i = 0; i < inputs.length; i++) {
        if (inputs[i].value == "") {
            inputs[i].classList.add("input_invalid")
            error = false;
        }
    }
    if (index == "sign") {
        if (!buttonMale.classList.contains("button-selected") && !buttonFemale.classList.contains("button-selected")) {
            buttonMale.classList.add("input_invalid")
            buttonFemale.classList.add("input_invalid")
            error = false;
        }
    }
    toReturn = error;
    return toReturn;
}