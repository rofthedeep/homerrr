<?php
//check the GET action var to see if an action is to be performed 
if (isset($_GET['pin'])) {
    //Load the serial port class 
    require("php_serial.class.php");
    $serial = new phpSerial();
    $serial->deviceSet("/dev/cu.usbmodem1421");
    $serial->confBaudRate(115200);
    $serial->deviceOpen();
    $pin = $_GET['pin'];
    $value = $_GET['value'];
    $direction = $_GET['direction'];
    // send values to arduino
    $serial->sendMessage($pin,$value,$direction);
    //Issue the appropriate command according to the Arduino source code 0=Green On, 1=Green Off, 2=Red On, 3=Red Off.

    // close serial connection
    $serial->deviceClose();
}
?>
