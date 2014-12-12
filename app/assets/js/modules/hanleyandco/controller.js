define(
    "hanleyandco/controller",
    [
        "hanleyandco/navBar"
    ],

    function (NavBar) {
        "use strict";

        var Controller = function () {
        };

        Controller.prototype.init = function (page) {
            this.page = page;
        };

        return Controller;
    }
);
