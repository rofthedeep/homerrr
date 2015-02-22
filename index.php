<?php include 'pages/helpers/functions.php' ?>
<?php include 'pages/helpers/variables.php' ?>

<!DOCTYPE html>
<head> 
    <?php include 'pages/snippets/htmlHead.php'; ?>
    <title><?php echo $title ?></title>
</head>

<body>
    <div class="fullWrapper">
        <div class="wrapper wrapperContent">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-offset-2 col-md-8">
                        <div class="mod modDescription">
                            <div class="inner">
                                <img src="<?php echo resourcePath('/images/tim.jpg'); ?>" alt="Tim Binder" class="profileImage"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-md-offset-2 col-md-8">
                        <div class="mod modDescription">
                            <div class="inner">

                                <h1>
                                    Hi, my name is Tim. I'm working as a freelance (Frontend)Developer and Webdesigner - ey, and I'm running a lovely <a href="https://klotzaufklotz.de">shop</a> together with Mathias.
                                </h1>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-md-offset-2 col-md-4">
                        <h3>Working with this tools and techniqes:</h3>
                        <ul>
                            <li>Twitter Bootstrap Grid System to build responsive frontends</li>
                            <li>jQuery and its brothers and sisters</li>
                            <li>Less or Sass - doesn't matter. In combination with OOCSS.</li>
                            <li>Styleguides. Check <a href="styleGuide/index.php" title="Styleguide for E-Commerce Site" target="_blank">this</a> or <a href="https://klotzaufklotz.de/styleGuide/index.php" title="klotzaufklotz Styleguide">this</a>.</li>
                            <li>friendly people</li>
                            <li><a href="https://klotzaufklotz.de" title="klotzaufkotz" target="_blank">Shopware</a>, Magento and Wordpress</li>
                            <li>HTML, CSS and Php</li>
                        </ul>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <h3>Looking for:</h3>
                        <ul>
                            <li>longterm projects</li>
                            <li>cool and fair partners</li>
                            <li>inovative ideas</li>
                            <li>i love building frontends for large scale ecommerce projects - but hey, I'm open for other stuff, too.</li>
                            <li>projects where I'm able to learn something</li>
                        </ul>
                        <p>
                            What I won't ever do again: A shop for pet stuff. So don't try it, okay.                
                        </p>
                        <a href="mailto:tim@rotd.de" class="btn primary big">Feel free to contact me!</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-md-6">
                        <?php // include 'snippets/modules/Skills.php'; ?>
                    </div>
                </div>
            </div>
        </div>
        <?php include 'pages/snippets/footer.php' ?>
    </div>
    <?php include 'pages/snippets/bodyScript.php'; ?>
</body>
</html>
