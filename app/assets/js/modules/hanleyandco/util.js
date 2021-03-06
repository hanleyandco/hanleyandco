define(
    "hanleyandco/util",
    [],

    function() {
        "use strict";

        var Util = {

            addEvent: function(type, listener, element) {
                if (!element) {
                    element = window;
                }

                if (element.addEventListener) {
                    element.addEventListener(type, listener, false);
                } else if (element.attachEvent) {
                    element.attachEvent('on' + type, listener);
                }
            },

            removeEvent: function(type, listener, element) {
                if (!element) {
                    element = window;
                }

                if (element.removeEventListener) {
                    element.removeEventListener(type, listener, false);
                } else if (element.detachEvent) {
                    element.detachEvent('on' + type, listener);
                }
            },

            removeClass: function(element, cls) {
                if(element) {
                    if(element.classList) {
                        element.classList.remove(cls);
                    }
                    element.className = element.className.replace(cls, '');
                }
            }

        };

        return Util;
    }
);