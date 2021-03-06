<?php
require_once("../src/Page.php");

class PageTest extends PHPUnit_Framework_TestCase {

    var $page;

    public function testTitle() {
        $this->page->setTitle();
        $result = $this->page->getTitle();
        $expected = 'Corollarium';
        $this->assertTrue($result == $expected);

        $this->page->setTitle("Title");
        $result = $this->page->getTitle();
        $expected = 'Title';
        $this->assertTrue($result == $expected);
    }

    public function testHeader() {
        $this->page->setHeader('Test header');
        $result = $this->page->getHeader();
        $expected = 'Test header';
        $this->assertTrue($result == $expected);
    }

    public function testFooter() {
        $this->page->setFooter('Test footer');
        $result = $this->page->getFooter();
        $expected = 'Test footer';
        $this->assertTrue($result == $expected);
    }

    public function testAddHead() {
        $this->page->addHead("<base href=\"http://corollarium.com/\">");
        $result = $this->page->getHead()[sizeof($this->page->getHead())-1];
        $expected = "<base href=\"http://corollarium.com/\">";
        $this->assertTrue($result == $expected);
    }

    public function testAddCSS() {
        $this->page->addCSS("http://www.example.com/css/filename.css");
        $result = $this->page->getHead()[sizeof($this->page->getHead())-1];
        $expected = "<link rel=\"stylesheet\" type=\"text/css\" media=\"all\" href=\"http://www.example.com/css/filename.css\">";
        $this->assertTrue($result == $expected);

        $this->page->cleanHead();
        $this->page->addCSSArray(Array("http://www.example.com/css/filename1.css",
                                    "http://www.example.com/css/filename2.css"));
        $firstCSS = $this->page->getHead()[sizeof($this->page->getHead())-2];
        $secondCSS = $this->page->getHead()[sizeof($this->page->getHead())-1];
        $result = $firstCSS . $secondCSS;
        $expected = "<link rel=\"stylesheet\" type=\"text/css\" media=\"all\" href=\"http://www.example.com/css/filename1.css\">" .
            "<link rel=\"stylesheet\" type=\"text/css\" media=\"all\" href=\"http://www.example.com/css/filename2.css\">";
        $this->assertTrue($result == $expected);
    }

    public function testAddJavaScript() {
        $this->page->addJavaScript("http://www.example.com/js/filename.js");
        $result = $this->page->getHead()[sizeof($this->page->getHead())-1];
        $expected = "<script type=\"text/javascript\" src=\"http://www.example.com/js/filename.js\"></script>";
        $this->assertTrue($result == $expected);

        $this->page->cleanHead();
        $this->page->addJavaScriptArray(Array("http://www.example.com/js/filename1.js",
                                        "http://www.example.com/js/filename2.js"));
        $firstJavaScript = $this->page->getHead()[sizeof($this->page->getHead())-2];
        $secondJavaScript = $this->page->getHead()[sizeof($this->page->getHead())-1];
        $result = $firstJavaScript . $secondJavaScript;
        $expected = "<script type=\"text/javascript\" src=\"http://www.example.com/js/filename1.js\"></script>" .
                    "<script type=\"text/javascript\" src=\"http://www.example.com/js/filename2.js\"></script>";
        $this->assertTrue($result == $expected);
    }

    public function testContent() {
        $this->page->setContent('Test content');
        $result = $this->page->getContent();
        $expected = 'Test content';
        $this->assertTrue($result == $expected);
    }

    public function testHead() {
        $this->page->cleanHead();
        $this->page->setTitle("title");
        $this->page->addHead("<meta charset=\"utf-8\">");

        $result = $this->page->getHeadContent();
        $expected = "<head><title>title</title><meta charset=\"utf-8\"></head>";
        $this->assertTrue($result == $expected);
    }

    public function testRender() {
        $this->page->cleanHead();
        $this->page->setTitle("title");
        $this->page->addHead("<meta charset=\"utf-8\">");
        $this->page->setHeader("header<br>");
        $this->page->setContent("content<br>");
        $this->page->setFooter("footer");

        $result = $this->page->render();
        $expected = "<!DOCTYPE html>\r\n<html>\r\n<head><title>title</title><meta charset=\"utf-8\"></head>" .
                    "\r\n<body>\r\nheader<br>content<br>footer\r\n</body>\r\n</html>";

        $expected = $expected;
        $result = $result;

        $this->assertTrue($result == $expected);
    }

    protected function setUp() {
        $this->page = Page::getInstance();
    }

    protected function tearDown() {
        unset($this->page);
    }
}
 