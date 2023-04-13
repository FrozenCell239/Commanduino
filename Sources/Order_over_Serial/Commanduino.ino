#include "Relay.h" //The library used to command the relay(s). Be careful about its path.

Relay strikeRelay(10); //The pin 10 have to command the door strike relay.
Relay doorRelay1(11); //The pin 11 have to command the door opening relay.
Relay doorRelay2(12); //The pin 11 have to command the door closing relay.

void setup(){
    Serial.begin(9600);
};

void loop(){
    char order = (char)Serial.read();

    if(order == 'A'){
        unlockDoor();
    };
    if(order == 'B'){
        openDoor();
    };
};

void unlockDoor(){ //This one commands a door strike in order to unlock the door.
    strikeRelay.on();
    delay(2000); //I used delays for the initial test, but I'll replace them with end of stroke sensors in a later version.
    strikeRelay.off();
};

void openDoor(){ //Same goal + also opens the door once it's unlocked, then we close it before locking back the strike.
    strikeRelay.on();
    delay(1500); //I used delays for the initial test, but I'll replace them with end of stroke sensors in a later version.
    doorRelay1.on();
    delay(3000); //I used delays for the initial test, but I'll replace them with end of stroke sensors in a later version.
    doorRelay1.off();
    delay(3000); //I used delays for the initial test, but I'll replace them with end of stroke sensors in a later version.
    doorRelay2.on();
    delay(3000); //I used delays for the initial test, but I'll replace them with end of stroke sensors in a later version.
    doorRelay2.off();
    delay(1500); //I used delays for the initial test, but I'll replace them with end of stroke sensors in a later version.
    strikeRelay.off();
};