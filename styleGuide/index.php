<?php include 'snippets/head.php'; ?>
<?php
$headlineContent = 'Überschrift h1';
$headlineWrapper = 'h1';

function chapter($content, $grid) {
    ob_start();
    require_once($content);
    $filesContent = ob_get_clean();
    $chapter = '';
    $chapter .= '<div class="row">';
    $chapter .= '<div class="col-xs-' . $grid . '">';
    $chapter .= '<div class="chapter">';
    $chapter .= $filesContent;
    $chapter .= '</div>';
    $chapter .= '</div>';
    $chapter .= '</div>';

    return $chapter;
}
?>
<body>
    <div class="fullWrapper">
        <div class="wrapper fullBg">
            <div class="container">   
                <div class="row">
                    <div class="col-xs-12">
                        <h1 class="chapterHeadline">StyleGuide</h1>
                        <p class="styleguideDescription">
                            In this document you can see the different styles that are used on this website.
                            It is used to maintain modular frontend code and visual consistency across the web app.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="wrapper wrapperContent">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-4 col-sm-push-8 col-md-4 col-md-push-8">
                        <div class="staticNavigation">
                            <div class="area">
                                <h2>Navigation:</h2>
                                <div class="navigationContent">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-8 col-sm-pull-4 col-md-8 col-md-pull-4">  
                    <?php
                        // echo first part of styleguide
                        echo chapter('snippets/typo.php', 12);
                        echo chapter('snippets/buttons.php', 12);
                        echo chapter('snippets/alerts.php', 12);
                        echo chapter('snippets/forms.php', 12);
                        //echo chapter('snippets/horizontalForms.php', 12);
                        echo chapter('snippets/modals.php', 12);
                        // echo chapter('snippets/images.php', 12);
                        // echo chapter('snippets/lines.php', 12);
                        echo chapter('snippets/popovers.php', 12);
                        //echo chapter('snippets/tooltipps.php', 12);
                        echo chapter('snippets/colors.php', 12);
                        ?>
                     </div>
                </div>
            </div>
        </div>
        <div class="wrapper">
            <div class="container">   
                <div class="row">
                    <div class="col-xs-12">
                        <div class="footerContent">
                            &copy; <?php echo date("Y"); ?> Tim Binder - <a href="/pages/imprint.php" title="Imprint">Imprint</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include 'snippets/bodyScript.php'; ?>
</body>
</html>
