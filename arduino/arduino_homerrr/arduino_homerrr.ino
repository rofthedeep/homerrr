 String cmd;
 int pin;
 int value;
 int inorout;
 void setup() {
   
   Serial.begin(115200); // initialize serial communication
   Serial.setTimeout(10);
   Serial.print("Setup");
   //pinMode(12, OUTPUT);  // initialize the green LED pin as an output
   //pinMode(11, OUTPUT);  // initialize the red LED pin as an output
 }
 void loop() {
   // see if there's incoming serial data:
   if (Serial.available() > 0) {
    pin = Serial.parseInt();
    //pin = Serial.read();
    Serial.print(pin);
    value = Serial.parseInt();
    Serial.print(value);
    inorout = Serial.parseInt();
    Serial.print(inorout);
    if(inorout == 1) {
      pinMode(pin, OUTPUT);
      digitalWrite(pin,value);
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

