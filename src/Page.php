<?php
/**
 * Class to generate html pages
 *
 * Class to generate an object Page with title, different head elements, header, footer and content.
 *
 * @author     Fabio Andreolli
 */

class Page {
    private static $instance = NULL;
    private $head = array();
    private $header;
    private $footer;
    private $content;
    private $page;
    private $title = "Corollarium";

    private function __construct() {
        //singleton
    }

    public static function getInstance() {
        if (!isset(self::$instance))
            self::$instance = new self;

        return self::$instance;
    }

    /**
     * @param mixed $header
     */
    public function setHeader($header) {
        $this->header = $header;
    }

    /**
     * @return mixed
     */
    public function getHeader() {
        return $this->header;
    }
    /**
     * @param mixed $footer
     */
    public function setFooter($footer) {
        $this->footer = $footer;
    }

    /**
     * @return mixed
     */
    public function getFooter() {
        return $this->footer;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content) {
        $this->content = $content;
    }

    /**
     * @return mixed
     */
    public function getContent() {
        return $this->content;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title = "") {
        if($title != "")
            $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * @param mixed $element
     */
    public function addHead($element) {
        if($element != ""){
            $this->head[] = $element;
        }
    }

    /**
     * @param mixed $path
     */
    public function addCSS($path) {
        if($path != ""){
            $this->head[] = "<link rel=\"stylesheet\" type=\"text/css\" media=\"all\" href=\"$path\">";
        }
    }

    /**
     * @param Array $pathList
     */
    public function addCSSArray(Array $pathList) {
        foreach($pathList as $path){
            if($path != ""){
                $this->addCSS($path);
            }
        }
    }

    /**
     * @param mixed $path
     */
    public function addJavaScript($path) {
        if($path != ""){
            $this->head[] = "<script type=\"text/javascript\" src=\"$path\"></script>";
        }
    }

    /**
     * @param Array $pathList
     */
    public function addJavaScriptArray(Array $pathList) {
        foreach($pathList as $path){
            if($path != ""){
                $this->addJavaScript($path);
            }
        }
    }

    public function cleanHead() {
        $this->head = array();
    }

    /**
     * @return array
     */
    public function getHead() {
        return $this->head;
    }

    /**
     * @return mixed
     */
    public function getHeadContent() {
        return $this->head();
    }

    public function render()
    {
        $headContent = $this->head();
        $this->page = "<!DOCTYPE html>" . "\r\n" ;
        $this->page .= $headContent;
        $this->page .= "\r\n" . "<html>" . "\r\n";
        $this->page .= "<body>" . "\r\n" . $this->header . $this->content;
        $this->page .= $this->footer;
        $this->page .= "\r\n" . "</body>" . "\r\n" . "</html>";

        return $this->page;
    }

    /**
     * @return mixed
     */
    private function head() {
        $headContent = "<head>";
        $headContent .= "<title>" . $this->title . "</title>";

        if(isset($this->head))
            $headContent .= implode("\r\n", $this->head);

        $headContent .=  "</head>";

        return $headContent;
    }

}


