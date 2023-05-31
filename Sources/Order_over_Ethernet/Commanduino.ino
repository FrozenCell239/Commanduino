#include "Relay.h" //The library used to command the relay(s). Be careful about its path.
#include <Ethernet.h>
#include <EthernetUdp.h>

#define DEBUG_PIN 4 //Declare this pin but put nothing on it to fix a bug on the Ethernet shield (this pin is basically reserved for SD card).
#define UDP_PORT 8888

Relay strikeRelay(10); //The pin 10 have to command the door strike relay.
Relay doorRelay1(11); //The pin 11 have to command the door opening relay.
Relay doorRelay2(12); //The pin 11 have to command the door closing relay.
IPAddress ip(192, 168, 1, 177); //Arduino board's IP.
IPAddress dns(192, 168, 1, 1); //DNS address of your computer.
EthernetUDP udp; //Creating the UDP client.
char
    packetBuffer[UDP_TX_PACKET_MAX_SIZE], //Buffer to hold incoming packet.
    ReplyBuffer[] = "Acknowledged !" //The response that you can send back to your computer. Put any value you want.
;

void setup(){
    Serial.begin(9600);
    Serial.println("\nStart init...");
    pinMode(DEBUG_PIN, OUTPUT);
    digitalWrite(DEBUG_PIN, HIGH);
    Ethernet.begin(mac, ip, dns); //Initializing the Ethernet shield not using DHCP.
    SPI.begin(); //Init SPI bus.
    udp.begin(UDP_PORT); //Init UDP.
    Serial.println("Inited !");
};

void loop(){
    int packetSize = udp.parsePacket();
    if(packetSize){ //If there is available data, read packet.
        Serial.print("Received packet of size ");
        Serial.print(packetSize);
        Serial.print(" from ");
        IPAddress remote = udp.remoteIP();
        for(int i = 0; i < 4; i++){
            Serial.print(remote[i], DEC);
            if(i < 3){
                Serial.print(".");
            };
        };
        Serial.print(", port ");
        Serial.print(udp.remotePort());
        Serial.println(".");
        udp.read(packetBuffer, UDP_TX_PACKET_MAX_SIZE); //Reads the packet into packetBuffer.
        Serial.print("Contents : ");
        Serial.println(packetBuffer); //Prints the full content of the packetBuffer.
        if(packetBuffer[0] == '%'){
            unlockDoor();
        };
        if(packetBuffer[0] == '#'){
            openDoor();
        };
        udp.beginPacket(udp.remoteIP(), udp.remotePort()); //Creates a packet in order to reply to the IP address and port that sent us the packet we received.
        udp.write(ReplyBuffer); //Sends the packet with its content.
        udp.endPacket(); //Closes the packet and connection.
    };
    delay(100);
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
