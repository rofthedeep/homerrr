 String cmd;
 int fullValue;
 int pin;
 int value;
 int inorout;
 void setup() {
 
   Serial.begin(9600); // initialize serial communication
   while (!Serial) {
    ; // wait for serial port to connect. Needed for Leonardo only
  }
   //Serial.setTimeout(100);
 }
 void loop() {
   // see if there's incoming serial data:
   if (Serial.available() > 0) {
    //fullValue = Serial.parseInt();
    //Serial.println(fullValue);
    pin = Serial.parseInt();
    //pin = Serial.read();
    //Serial.println(pin);
    value = Serial.parseInt();
    //Serial.println(value);
    inorout = Serial.parseInt();
    //Serial.println(inorout);
    if(inorout == 1) {
      pinMode(pin, OUTPUT);
      analogWrite(pin,value);
    } else {
      pinMode(pin, INPUT);
    }
    //incomingByte = Serial.read(); // read the oldest byte in the serial buffer
//Preform the code to switch on or off the leds
    //Serial.println();
    //Serial.println("Serial Read");
    //Serial.print("incomingByte", BIN);
    //Serial.println();
    //Serial.println(incomingByte, DEC);
    //if (incomingByte == '0') {
    //digitalWrite(ledPin13, HIGH); //If the serial data is 0 turn red LED on
  }

   }


