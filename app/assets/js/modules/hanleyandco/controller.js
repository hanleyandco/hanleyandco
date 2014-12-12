define(
    "hanleyandco/controller",
    [
        "hanleyandco/navBar",
        "hanleyandco/util"
    ],

    function (NavBar, Util) {
        "use strict";

        var Controller = function (page) {
            this.page = page;
        };

        Controller.prototype.init = function () {
            this.initNavBar();
        };

        Controller.prototype.initNavBar = function() {
            var navBar = new NavBar(this.page, this.page.querySelector("#navbar"));
            navBar.init();
        };

        return Controller;
    }
);
