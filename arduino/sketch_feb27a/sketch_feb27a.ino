 String cmd;
 void setup() {
   
   Serial.begin(115200); // initialize serial communication
   Serial.print("Setup");
   pinMode(12, OUTPUT);  // initialize the green LED pin as an output
   pinMode(11, OUTPUT);  // initialize the red LED pin as an output
 }
 void loop() {
   // see if there's incoming serial data:
   if (Serial.available() > 0) {
    int pin = Serial.parseInt();
    Serial.print(pin);
    int value = Serial.parseInt();
    Serial.print(value);
    digitalWrite(pin,value);
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

