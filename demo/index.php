<?php
require_once("../src/Page.php");

try {
    if(isset($_GET['request']))
        $request = $_GET['request'];
    else
        $request = "index";

    $page = Page::getInstance();

    $page->addHead("<meta charset=\"utf-8\">");
    $page->addHead("<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">");
    $page->addHead("<link rel=\"home\" href=\"http://corollarium.com\">");
    $page->addHead("<!--[if IE 8]>");
    $page->addJavaScript("http://corollarium.com/floh/js/css3-mediaqueries.js");
    $page->addHead("<![endif]-->");
    $page->addCSSArray(Array("http://corollarium.com/floh/css/site.6208.css",
                                "http://code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.min.css",
                                "http://corollarium.com/floh/bootstrap-2.3.2/css/bootstrapall.6208.css",
                                "http://corollarium.com/floh/js/external/prettify/prettify.css",
                                "http://corollarium.com/css/screen.1726.css"));
    $page->addJavaScriptArray(Array("http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js",
                                "http://code.jquery.com/ui/1.11.0/jquery-ui.min.js",
                                "http://corollarium.com/floh/js/strings.pt_BR.6208.js",
                                "http://corollarium.com/floh/js/plugins.6208.js",
                                "http://corollarium.com/floh/js/locale.pt_BR.6208.js",
                                "http://corollarium.com/floh/js/floh-min.6208.js"));
    $page->addHead("<!--[if lt IE 9]>");
    $page->addJavaScript("http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js");
    $page->addJavaScript("http://corollarium.com/floh/perfectum_dashboard_1_0_4_html/js/excanvas.js");
    $page->addHead("<![endif]-->");
    $page->addCSS("http://corollarium.com/templates/royalblue/media.1726.css");
    $page->addJavaScript("http://corollarium.com/floh/bootstrap-2.3.2/js/bootstrap.min.js");
    $page->addJavaScript("http://corollarium.com/floh/js/floh-bootstrap.js");
    $page->addJavaScript("http://corollarium.com/floh/js/external/prettify/prettify.js");
    $page->addJavaScript("http://corollarium.com/templates/royalblue/template.1726.js");
    $page->addCSS("http://code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.min.css");

    $page->setHeader("<div class='header'>Header</div>");

    $headerFile = "./src/header.php";
    if(file_exists($headerFile))
        $header = file_get_contents($headerFile);
    if(!isset($header))
        $header = "<div class='header'></div>";
    $page->setHeader($header);

    switch($request){
        case "index":
            $page->setTitle();
            $content = "<div class='content'>Exemplo de conte&uacute;do<br>".
                       "<a href=\"about\">Teste: Sobre n&oacute;s</a><br>".
                       "<a href=\"contact\">Teste: Contate-nos</a></div>".
                       "<a href=\"simple_page.php\">simple_page.php</a></div>";
            break;
        case "about":
            $page->setTitle("Corollarium - Sobre n&oacute;s");
            $contentFile = "./src/pt_BR_about.php";
            if(file_exists($contentFile))
                $content = file_get_contents($contentFile);
            if(!isset($content))
                $content = "<div class='content'>Sobre n&oacute;s</div>";
            break;

        case "contact":
            $page->setTitle("Corollarium - Contate-nos");
            $contentFile = "./src/pt_BR_contact.php";
            if(file_exists($contentFile))
                $content = file_get_contents($contentFile);
            if(!isset($content))
                $content = "<div class='content'>Contate-nos</div>";
            break;

        default:
            $content = "P&aacute;gina n&atilde;o encontrada.";
    }
    $page->setContent($content);

    $footerFile = "./src/footer.php";
    if(file_exists($footerFile))
        $footer = file_get_contents($footerFile);
    if(!isset($content))
        $footer = "<div class='footer'></div>";
    $page->setFooter($footer);

    print $page->render();
} catch (Exception $e){
    echo $e->getMessage();
}

