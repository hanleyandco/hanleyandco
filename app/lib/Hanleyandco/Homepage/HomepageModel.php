<?php

namespace Hanleyandco\Homepage;

use Hanleyandco\Util;

class HomepageModel {

    private $_title;
    private $_headerSection;
    private $_sections;

    public function __construct($title, $headerSection, $sections)
    {
        $this->_title = $title;

        $this->_headerSection = new HeaderSectionModel(
            $headerSection->title,
            $headerSection->image,
            $headerSection->subTitle,
            $headerSection->tagLine
        );

        foreach($sections as $section) {
            $this->_sections[] = new SectionModel($section->header, $section->content);
        }
    }

    public function getTitle() {
        return $this->_title;
    }

    /**
     * @return mixed
     */
    public function getHeaderSection()
    {
        return $this->_headerSection;
    }

    /**
     * @return mixed
     */
    public function getSections()
    {
        return $this->_sections;
    }

}

class HeaderSectionModel {

    private $_title;
    private $_image;
    private $_tagLine;
    private $_subTitle;

    public function __construct($title, $image, $subTitle, $tagLine)
    {
        $this->_title = $title;
        $this->_image = $image;
        $this->_subTitle = $subTitle;
        $this->_tagLine = $tagLine;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->_image;
    }

    /**
     * @return mixed
     */
    public function getTagLine()
    {
        return $this->_tagLine;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->_title;
    }

    /**
     * @return mixed
     */
    public function getSubTitle()
    {
        return $this->_subTitle;
    }
}

class SectionModel {

    private $_title;
    private $_id;
    private $_image;
    private $_paragraphs;
    private $_intro;
    private $_quote;
    private $_links;

    public function __construct($title, $content) {
        $this->_title = $title;
        $this->_id = Util::convertStringToId($title);
        $this->_image = $content->image;
        $this->_intro = $content->intro;
        $this->_paragraphs = $content->paragraph;
        if ($content->quote) {
            $this->_quote = new QuoteModel(
                $content->quote->text, $content->quote->attribution->name, $content->quote->attribution->company
            );
        }

        foreach($content->link as $link) {
            $this->_links[] = new LinkModel(
                $link->title, $link->text, $link->url
            );
        }
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->_title;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->_image;
    }

    /**
     * @return mixed
     */
    public function getParagraphs()
    {
        return $this->_paragraphs;
    }

    /**
     * @return mixed
     */
    public function getIntro()
    {
        return $this->_intro;
    }

    /**
     * @return mixed
     */
    public function getQuote()
    {
        return $this->_quote;
    }

    /**
     * @return mixed
     */
    public function getLinks()
    {
        return $this->_links;
    }
}

class QuoteModel {

    private $_text;
    private $_name;
    private $_company;

    public function __construct($text, $name, $company) {
        $this->_text = $text;
        $this->_name = $name;
        $this->_company = $company;
    }

    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->_text;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->_name;
    }

    /**
     * @return mixed
     */
    public function getCompany()
    {
        return $this->_company;
    }

}

class LinkModel {

    private $_title;
    private $_text;
    private $_url;

    public function  __construct($title, $text, $url) {
        $this->_title = $title;
        $this->_text = $text;
        $this->_url = $url;
    }

    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->_text;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->_title;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->_url;
    }
}