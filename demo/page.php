<?php
require_once("../src/Page.php");

try {
    $page = Page::getInstance();

    $page->addHead("<meta charset=\"utf-8\">");
    $page->setTitle("title");
    $page->setHeader("header<br>");
    $page->setContent("content<br>");
    $page->setFooter("footer");

    print $page->render();
}
catch (Exception $e)
{
    echo $e->getMessage();
}

