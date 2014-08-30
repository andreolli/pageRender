<?php

require_once("../src/Page.php");

try {
    $page = Page::getInstance();

    //TODO: add jquery and bootstrap

    $page->setHeader("<div class='header'>Header</div>");
    //TODO: get content from a file or database
    $page->setContent("<div class='content'>Content</div>");
    $page->setFooter("<div class='footer'>Example.com - Example Marketplace</div>");

    print $page->renderPage();
}
catch (Exception $e)
{
    echo $e->getMessage();
}

