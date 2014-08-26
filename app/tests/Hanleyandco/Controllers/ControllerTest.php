<?php

namespace Hanleyandco\Controllers;

use Mockery\Exception;

class ControllerTest extends \PHPUnit_Framework_TestCase {

    private $_mockApplication;
    private $_mockController;

    public function setUp() {
        parent::setUp();

        $this->_mockApplication = \Mockery::mock('Silex\Application[abort]');
        $this->_mockController = new Controller($this->_mockApplication);
    }

    /** @test */
    public function showsTheIndexIfNoPageProvided() {
        $page = $this->_mockController->show();

        $this->assertEquals($page, 'index');
    }

    /** @test */
    public function showsThePageProvidedToIt() {
        $expected = 'somePage';

        $actual = $this->_mockController->show($expected);

        $this->assertEquals($expected, $actual);
    }
}
