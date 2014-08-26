<?php

namespace Hanleyandco;

use Symfony\Component\HttpFoundation\Tests\ParameterBagTest;

class GitXmlAdapterTest extends \PHPUnit_Framework_TestCase {

    private $_gitXmlAdapter;

    public function setUp() {
        parent::setUp();

        $this->_gitXmlAdapter = new GitXmlAdapter();
    }

    /** @test */
    public function theAdapterKnowsAllOfTheBrowsablePages() {
        $this->assertNotEmpty($this->_gitXmlAdapter->fetchAvailablePages());
    }

    /** @test */
    public function theAdapterDoesntReturnDotAndDoubleDotAsValidPages() {
        foreach ($this->_gitXmlAdapter->fetchAvailablePages() as $page) {
            $this->assertNotEquals($page, '.');
            $this->assertNotEquals($page, '..');
        }
    }

    /** @test */
    public function theAdapterCanReturnAPageThatExists() {
        // We will assume that there is always at least one page
        $page = $this->_gitXmlAdapter->fetchPage(
            $this->_gitXmlAdapter->fetchAvailablePages()[0]
        );
        $this->assertNotNull($page);
    }

    /** @test */
    public function theAdapterThrowsAnExceptionIfTheRequestedPageDoesNotExist() {
        $this->setExpectedException('\Hanleyandco\Exceptions\PageNotFoundException');

        $this->_gitXmlAdapter->fetchPage('some-random-page-that-doesnt-exist-dsfisfhi');
    }
}
