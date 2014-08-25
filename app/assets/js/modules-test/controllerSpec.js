/* global require, define, describe, beforeEach, afterEach, it, spyOn, expect, jasmine */
define(
    [
        'hanleyandco/controller'
    ],
    function (Controller) {
        'use strict';

        var controller;

        describe('Main JS Controller', function() {

            beforeEach(function() {
                controller = new Controller();
            });

            it('can be initilised', function() {
                spyOn(controller, 'init').andCallThrough();

                controller.init();

                expect(controller.init).toHaveBeenCalled();
            });
        });
    }
);
