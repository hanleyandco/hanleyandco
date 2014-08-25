<?php

namespace Hanleyandco\Controllers;

use Mockery\Exception;

class ControllerTest extends \PHPUnit_Framework_TestCase {

    private $mockApplication;
    private $mockController;

    public function setUp() {
        parent::setUp();

        $this->mockApplication = \Mockery::mock('Silex\Application[abort]');
        $this->mockController = new Controller($this->mockApplication);
    }

    /** @test */
    public function trueIsTrue() {
        $this->assertEquals(true, true);
    }

}
