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
            this.navBarLinks = navBarElement.querySelectorAll('li a');
        };

        NavBar.prototype.init = function () {
            var self = this;

            var navigateToSection = function(ev) {
                ev.preventDefault();
                var startOffset = window.pageYOffset;
                var endOffset = self.scrollToPositionForHash(ev.srcElement.hash);
                var distance = endOffset - startOffset;

                var step = function (delta) {
                    var nextStep = Math.ceil((distance * delta) + startOffset);
                    window.scrollTo(0, nextStep);
                };

                var callback = function () {
                    window.location.hash = ev.srcElement.hash.substring(1);
                    window.scrollTo(0, endOffset);
                };

                self.animate(400, step, callback);
            };

            for(var i = 0; i < this.navBarLinks.length; i++) {
                Util.addEvent('click', navigateToSection, this.navBarLinks[i]);
            }
        };

        NavBar.prototype.scrollToPositionForHash = function(hash) {
            return $(hash).position().top - (30 + this.navBar.parentNode.offsetHeight);
        };

        NavBar.prototype.animate = function(duration, step, callBack) {
            var self = this;

            function easing(progress) {
                return 1 - Math.sin(Math.acos(progress));
            }

            function easeInOut(progress) {
                if(progress < 0.5) {
                    return easing(2 * progress)/2;
                } else {
                    return (2 - easing(2 * (1 - progress))) / 2;
                }
            }

            var timeElapsed = 0;
            var id = setInterval(function () {

                var progress = timeElapsed / duration;

                if (progress > 1) {
                    progress = 1;
                }

                var delta = easeInOut(progress);

                step(delta);

                if (progress === 1) {
                    clearInterval(id);
                    callBack();
                }
                timeElapsed = timeElapsed + 16;

            }, 16);
        };


        return NavBar;
    }
);