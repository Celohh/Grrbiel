$dropdown = document.getElementById("dropdownMenuLink")
if ($dropdown != null) {

    $dropdown.addEventListener("click", function () {
        document.getElementById("dropdownMenu").classList.toggle("dropdown-menu-drop")
    })
}

$btn_navbar = document.getElementById("navbar-toggler")
if ($btn_navbar != null) {
    $btn_navbar.addEventListener("click", function () {
        document.getElementById("navbarNavAltMarkup").classList.toggle("dropdown-menu-drop")
    })
}