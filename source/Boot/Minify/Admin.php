<?php
if (strpos(url(), "localhost")) {
    /**
     * CSS
     */
    $minCSS = new MatthiasMullie\Minify\CSS();
    $minCSS->add(__DIR__ . "/../../../shared/styles/style.css");
    $minCSS->add(__DIR__ . "/../../../shared/styles/bootstrap.css");

    //theme CSS
    $cssDir = scandir(__DIR__ . "/../../../themes/" . CONF_VIEW_ADMIN . "/assets/css");
    foreach ($cssDir as $css) {
        $cssFile = __DIR__ . "/../../../themes/" . CONF_VIEW_ADMIN . "/assets/css/{$css}";
        if (is_file($cssFile) && pathinfo($cssFile)['extension'] == "css") {
            $minCSS->add($cssFile);
        }
    }

    //Minify CSS
    $minCSS->minify(__DIR__ . "/../../../themes/" . CONF_VIEW_ADMIN . "/assets/style.css");


    /**
     * JS
     */
    $minJS = new MatthiasMullie\Minify\JS();
    $minJS->add(__DIR__ . "/../../../shared/scripts/jquery.js");
    $minJS->add(__DIR__ . "/../../../shared/scripts/popper.js");
    $minJS->add(__DIR__ . "/../../../shared/scripts/bootstrap.js");
    $minJS->add(__DIR__ . "/../../../shared/scripts/moment.js");
    $minJS->add(__DIR__ . "/../../../shared/scripts/jquery.form.js");
    $minJS->add(__DIR__ . "/../../../shared/scripts/jquery-ui.js");
    $minJS->add(__DIR__ . "/../../../shared/scripts/jquery.mask.js");
    $minJS->add(__DIR__ . "/../../../shared/scripts/tracker.js");

    //theme CSS
    $jsDir = scandir(__DIR__ . "/../../../themes/" . CONF_VIEW_ADMIN . "/assets/js");
    foreach ($jsDir as $js) {
        $jsFile = __DIR__ . "/../../../themes/" . CONF_VIEW_ADMIN . "/assets/js/{$js}";
        if (is_file($jsFile) && pathinfo($jsFile)['extension'] == "js") {
            $minJS->add($jsFile);
        }
    }

    //Minify JS
    $minJS->minify(__DIR__ . "/../../../themes/" . CONF_VIEW_ADMIN . "/assets/scripts.js");
}