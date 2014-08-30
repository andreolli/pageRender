<?php
/**
 * Created by PhpStorm.
 * User: fabio
 * Date: 8/30/14
 * Time: 5:20 PM
 */

class Page {
    private static $instance = NULL;
    private $head;
    private $header;
    private $footer;
    private $content;
    private $page;

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

    public function renderPage()
    {
        //TODO: add html with version and char set
        $this->page = "<!DOCTYPE html>". "\r\n". "<html>" .
            $this->head . $this->header . $this->content . $this->footer .
            "</html>";

        return $this->page;
    }
} 