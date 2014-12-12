define(
    "hanleyandco/navBar",
    [
        "hanleyandco/util"
    ],
    function (Util) {
        "use strict";

        var NavBar = function (page, navBarElement) {
            this.page = page;
            this.navBar = navBarElement;
        };

        NavBar.prototype.init = function () {
            var self = this;

        };


        return NavBar;
    }
);