# homerrr
home automation with php

With homerrr you can create your own php based homeautomation system. For the communication beween the webserver and the arduino
the [php_serial.class.php](http://code.google.com/p/php-serial/) is used.

Why another solution? I didn't get the other work :-)

## Install

### Webserver
You have to install a local webserver with php. 
For OSX you can use http://www.mamp.info/de/ or the build in server
For Rasperry Pi look at this tutorial http://www.raspberrypi.org/documentation/remote-access/web-server/apache.md

### Clone repository and open site in webbrowser

Clone the repository in your htdocs folder an try to open it. For example with http://localhost/homerrr/.

### set permissions for serial 
To allow access to the serial port of your device, you have to chmod 777 the driver for the serial.

### Push code on the arduino
Use the arduino software to push the code (arduino/arduino_homerrr/arduino_homerrr.ino) on the arduino. 

### Serial Monitor or disable reset of arduino
Open the arduino serial monitor - otherwise sending won't have any effect. Other solution: Put a 100 Ohm resistor between the 5v and the reset pin of the arduino.

## Inspiration and Thanks!
This Project is heavily inspired by a few other projects:
heimcontrol.js - http://ni-c.github.io/heimcontrol.js/ - i wanted to have something like this that I understand
arduinoPi - https://github.com/JanStevens/ArduinoPi-Controller - here I understood the working of the php_serial.class - thanks a lot! 





