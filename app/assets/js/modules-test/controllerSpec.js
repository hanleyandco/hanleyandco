/* global require, define, describe, beforeEach, afterEach, it, spyOn, expect, jasmine */
define(
    [
        'hanleyandco/controller',
        'jquery'
    ],
    function (Controller, jquery) {
        'use strict';

        var controller;

        describe('Main JS Controller', function () {

            beforeEach(function() {

                var canvas = document.createElement('div');
                var navBar = document.createElement('div');
                navBar.id = "navbar";
                canvas.appendChild(navBar);

                controller = new Controller(canvas);
            });

            it('can be initilised', function () {
                spyOn(controller, 'init').andCallThrough();

                controller.init();

                expect(controller.init).toHaveBeenCalled();
            });

            it('has access to jquery', function () {
                expect(jquery).not.toBeNull();
            });

            it('can initialise a navbar', function () {

            })
        });
    }
);
