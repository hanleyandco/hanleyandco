<?php

namespace Hanleyandco\footer;

class FooterModel {

    private $_links;
    private $_text;
    private $_organisations;
    private $_copyright;
    private $_registeredOffice;

    public function __construct($links, $text, $memberOf, $copyright, $registeredOffice) {
        $this->_links = $links;
        $this->_text = $text;
        foreach($memberOf as $organisation) {
            $this->_organisations[] = new Organisation(
                $organisation->name, $organisation->logo
            );
        }
        $this->organisations = $memberOf;
        $this->_copyright = "&copy; " . date("Y") . " " . $copyright;
        $this->_registeredOffice = new Address(
            $registeredOffice->street, $registeredOffice->town, $registeredOffice->postcode
        );
    }

    public function getLinks() {
        return $this->_links;
    }

    public function getText() {
        return $this->_text;
    }

    public function getOrganisations() {
        return $this->_organisations;
    }

    public function getCopyright() {
        return $this->_copyright;
    }

    public function getRegisteredOffice() {
        return $this->_registeredOffice;
    }
}

class Address {

    private $_street;
    private $_town;
    private $_postcode;

    public function __construct($street, $town, $postcode) {
        $this->_street = $street;
        $this->_town = $town;
        $this->_postcode = $postcode;
    }

    public function getStreet() {
        return $this->_street;
    }

    public function getTown() {
        return $this->_town;
    }

    public function getPostcode() {
        return $this->_postcode;
    }
}

class Organisation {

    private $_name;
    private $_logo;

    public function __construct($name, $logo) {
        $this->_name = $name;
        $this->_logo = $logo;
    }

    public function getLogo()
    {
        return $this->_logo;
    }

    public function getName()
    {
        return $this->_name;
    }
}
