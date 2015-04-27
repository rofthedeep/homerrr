<?php 


/* Simple serial script for turning two leds on 
and off from the web! 

Utilizes the PHP Serial class by R�my Sanchez <thenux@gmail.com> 
(Thanks you rule!!) to communicate with the Arduino Serial! 

*/ 


//check the GET action var to see if an action is to be performed 
if (isset($_GET['action'])) { 
    //Action required 
     
    //Load the serial port class 
    require("php_serial.class.php"); 
     
    //Initialize the class 
    $serial = new phpSerial(); 

    //Specify the serial port to use... in this case COM1 
    $serial->deviceSet("/dev/cu.usbmodem1421"); //SET THIS TO WHATEVER YOUR SERIAL DEVICE HAPPENS TO BE, YOU CAN FIND THIS UNDER THE ARDUINO SOFTWARE'S MENU
     
    //Set the serial port parameters. The documentation says 9600 8-N-1, so 
    $serial->confBaudRate(9600); //Baud rate: 9600 
   // $serial->confParity("none");  //Parity (this is the "N" in "8-N-1") ******THIS PART OF THE CODE WAS NOT NEEDED
  // $serial->confCharacterLength(8); //Character length (this is the "8" in "8-N-1") ******THIS PART OF THE CODE WAS NOT NEEDED
   // $serial->confStopBits(1);  //Stop bits (this is the "1" in "8-N-1") ******THIS PART OF THE CODE WAS NOT NEEDED
    //$serial->confFlowControl("none"); //******THIS PART OF THE CODE WAS NOT NEEDED


    //Now we "open" the serial port so we can write to it 
    $serial->deviceOpen(); 

    //Issue the appropriate command according to the Arduino source code 0=Green On, 1=Green Off, 2=Red On, 3=Red Off.
    if ($_GET['action'] == "greenon") { 
        error_log('green on');
        //to turn the GREEN LED ON, we issue the command  
        $serial->sendMessage('12,255,1');
     
    } else if ($_GET['action'] == "greenoff") { 
        error_log('green of');
        //to turn the GREEN LED OFF, we issue this command 
        $serial->sendMessage('12,0,1'); 
    }
	
	if ($_GET['action'] == "redon") { 
             error_log('red on');
        //to turn the RED LED ON, we issue the command  
        $serial->sendMessage('11,255,1'); 
     
    } else if ($_GET['action'] == "redoff") { 
         error_log('red of');
        //to turn the RED LED OFF, we issue this command 
        $serial->sendMessage('11,0,1'); 
    } 
     
    //We're done, so close the serial port again 
    $serial->deviceClose(); 

} 


?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" 
"http://www.w3.org/TR/html4/loose.dtd"> 
<html> 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"> 
<title>Arduino Project 1: Serial LED Control</title> 
</head> 
<body> 

<h1>Arduino Project 1: Serial LED Control</h1> 
<p><a href="<?=$_SERVER['PHP_SELF'] . "?action=greenon" ?>">
Click here to turn the GREEN LED on.</a></p> 
<p><a href="<?=$_SERVER['PHP_SELF'] . "?action=greenoff" ?>">
Click here to turn the GREEN LED off.</a></p> 
<p><a href="<?=$_SERVER['PHP_SELF'] . "?action=redon" ?>">
Click here to turn the RED LED on.</a></p> 
<p><a href="<?=$_SERVER['PHP_SELF'] . "?action=redoff" ?>">
Click here to turn the RED LED off.</a></p> 
</body> 
</html>