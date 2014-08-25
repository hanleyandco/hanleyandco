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
    public function showsTheIndexIfNoPageProvided() {
        $page = $this->mockController->show();

        $this->assertEquals($page, 'index');
    }

    /** @test */
    public function showsThePageProvidedToIt() {
        $expected = 'somePage';

        $actual = $this->mockController->show($expected);

        $this->assertEquals($expected, $actual);
    }
}
