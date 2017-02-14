window.onload = function () {
    var burger = document.querySelector("#main-header .burger");
    function burgerCallback() {
        var menu = document.querySelector("#main-header .mobile-menu");
        var menuClass = menu.className;
        if(/_hide/.test(menuClass)){
            menu.className = menuClass.replace(/_hide/, "");
            console.log(menu.className);
        }else{
            menu.className += " _hide";
        }
    }

    if(burger.attachEvent){
        burger.attachEvent('onclick', burgerCallback);
    }else {
        burger.addEventListener('click', burgerCallback, false);
    }
};