<?php

//check the GET action var to see if an action is to be performed 
//Load the serial port class 
require("php_serial.class.php");
$serial = new phpSerial();
// for mac
$serial->deviceSet("/dev/cu.usbmodem1421");
// for rasperry
//$serial->deviceSet("/dev/ttyACMO");
$serial->confBaudRate(9600);
$serial->deviceOpen();
// add the sleep to wait until the connection is realy open
usleep(200000);
$pin = $_GET['pin'];
$value = $_GET['value'];
$direction = $_GET['direction'];
// send values to arduino
//error_log('get' . $pin . ' ' . $value . ' ' . $direction);
//$serial->sendMessage($pin . '?value=' . $value . '?direction=' . $direction);
$serial->sendMessage('A' . $pin . 'B' . $value . 'C' . $direction);
//$serial->sendMessage($value);
// Print out the data
//Issue the appropriate command according to the Arduino source code 0=Green On, 1=Green Off, 2=Red On, 3=Red Off.
// close serial connection
$serial->deviceClose();
return($read);
?>
