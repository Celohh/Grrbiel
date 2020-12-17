var image = document.getElementById("image1");
var label = document.getElementById("img_selector1");
var deleteSubmit = document.getElementById("delete-submit");
var deletedPressed = false;
var inputs = document.getElementsByClassName("input_check");
var buttons = document.getElementsByClassName("input_button");

deleteSubmit.addEventListener("click", function() {
    deletedPressed = true;
})

image.addEventListener("change", function () {
    label.classList.remove("input_invalid");
})
for (var i = 0; i < inputs.length; i++) {
    startInputs(i)
}
for (var i = 0; i < buttons.length; i++) {
    startButtons(i)
}

function startInputs(index) {
    inputs[index].addEventListener("change", function () {
        if (inputs[index].value != "") {
            inputs[index].classList.remove("input_invalid");
        }
    })
}
function startButtons(index) {
    buttons[index].addEventListener("click", function () {
        buttonClicked(index)
    })
}

function buttonClicked(index) {
    for (var i = 0; i < buttons.length; i++) {
        buttons[i].classList.remove("input_invalid")
        buttons[i].classList.remove("button-selected")
        document.getElementById("hide-gender").value = index;
    }
    buttons[index].classList.add("button-selected")
}
function removeAllInvalids() {
    label.classList.remove("input_invalid");
    for(var i = 0; i < inputs.length; i++) {
        inputs[i].classList.remove("input_invalid");
    }
    for(var i = 0; i < buttons.length; i++) {
        buttons[i].classList.remove("input_invalid");
    }
}
function validate() {
    var toReturn = false;
    var error = true;
    var btnArePressed = false;

    if (!image.value) {
        if (label.innerHTML == "Select image 1 - Main" || label.innerHTML == "") {
            label.classList.add("input_invalid");
            error = false;
        }
    }

    for (var i = 0; i < inputs.length; i++) {
        if (inputs[i].value == "") {
            inputs[i].classList.add("input_invalid");
            error = false;
        }
    }
    for (var i = 0; i < buttons.length; i++) {
        if (buttons[i].classList.contains("button-selected")) {
            btnArePressed = true
            break;
        }
    }
    if (btnArePressed == false) {
        for (var i = 0; i < buttons.length; i++) {
            buttons[i].classList.add("input_invalid")
        }
        error = false;
    }
    toReturn = error;
    if (deletedPressed == true) {
        removeAllInvalids();
        toReturn = deletedPressed;
    }
    return toReturn;
}