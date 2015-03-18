<?php include 'initSerial.php'; ?>
<?php include 'function.php'; ?>
<?php include 'pages/helpers/functions.php'; ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html> 
    <head> 
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"> 
        <title>homerrr</title>
        <?php include 'pages/snippets/htmlHead.php'; ?>  
    </head> 
    <body>
        <?php include 'pages/snippets/modules/FixedNavigation.php'; ?>
        <div class="fullWrapper">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">         
                        <div class="group">
                            <div class="groupName">
                                Wohnzimmer
                            </div>
                            <h3>Light 1</h3>
                            <div class="btn-group" role="group">
                                <?php echo button('on', 'Pin 11 on', 11, 255, 1, 'on'); ?>
                                <?php echo button('off', 'Pin 11 off', 11, 0, 1, 'off'); ?>
                            </div>
                            <h3>Light 2</h3>
                            <div class="btn-group" role="group">
                                <?php echo button('on', 'Pin 12 on', 12, 255, 1, 'on'); ?>
                                <?php echo button('off', 'Pin 12 off', 12, 0, 1, 'off'); ?>
                            </div>
                        </div>
                        <div class="group">
                            <div class="groupName">
                                Schlafzimmer
                            </div>
                            <h3>Dimmer</h3>
                            <?php echo dimmer('senden', 'Pin 11 on', 11, 255, 1, 'on'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include 'pages/snippets/bodyScript.php'; ?>  
    </body> 
</html>