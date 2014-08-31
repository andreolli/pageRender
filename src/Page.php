<?php
/**
 * Created by PhpStorm.
 * User: fabio
 * Date: 8/30/14
 * Time: 5:20 PM
 */

class Page {
    private static $instance = NULL;
    private $head = array();
    private $header;
    private $footer;
    private $content;
    private $page;
    private $title = "Corollarium";

    private function __construct()
    {
        // singleton
    }

    public static function getInstance()
    {
        if (!isset(self::$instance))
            self::$instance = new self;

        return self::$instance;
    }

    /**
     * @param mixed $header
     */
    public function setHeader($header)
    {
        $this->header = $header;
    }

    /**
     * @return mixed
     */
    public function getHeader()
    {
        return $this->header;
    }
    /**
     * @param mixed $footer
     */
    public function setFooter($footer)
    {
        $this->footer = $footer;
    }

    /**
     * @return mixed
     */
    public function getFooter()
    {
        return $this->footer;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    public function addHead($element)
    {
        if($element != ""){
            $this->head[] = $element;
        }
    }

    public function addCSS($path)
    {
        if($path != ""){
            $this->head[] = "<link rel=\"stylesheet\" type=\"text/css\" media=\"all\" href=\"$path\">";
        }
    }

    public function addJavaScript($path)
    {
        if($path != ""){
            $this->head[] = "<script type=\"text/javascript\" src=\"$path\"></script>";
        }
    }


    public function render()
    {
        $headContent = $this->head();
        $this->page = "<!DOCTYPE html>". "\r\n";
//        $this->page .= "<html>" . "\r\n";
        $this->page .= "<html xmlns=\"http://www.w3.org/1999/xhtml\" xmlns:foaf=\"http://xmlns.com/foaf/0.1/\"
                        xmlns:dc=\"http://purl.org/dc/elements/1.1/\" version=\"XHTML+RDFa 1.0\"
	                    lang=\"pt-BR\" xml:lang=\"pt-BR\"
	                    locale=\"pt_BR\"
	                    class=\"no-js no-loggedin\">" . "\r\n";
        $this->page .= $headContent . "\t";
        $this->page .= "<body>" . "\r\n" . $this->header . $this->content;
        $this->page .= $this->footer . "\r\n" . "\t";
        $this->page .= "</body>" . "\r\n" . "</html>";

        return $this->page;
    }

    private function head()
    {
        $headContent = "<head>";
        $headContent .= "<title>" . $this->title . "</title>";

        if(isset($this->head))
            $headContent .= implode("\r\n", $this->head);

        $headContent .=  "</head>";

        return $headContent;
    }

}


