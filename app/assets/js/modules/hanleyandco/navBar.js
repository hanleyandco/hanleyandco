define(
    "hanleyandco/navBar",
    [],
    function () {
        "use strict";

        var NavBar = function (navBarElement) {
            this.navBar = navBarElement;
        };

        NavBar.prototype.init = function () {
            this.navBar.collapse("show");
        };

        return NavBar;
    }
);