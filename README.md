# Commanduino
An example of a simple way to command one (or several) Arduino relay(s) via a HTML & PHP web page.

I did this for my student project.
_Please, note that the way to command the Arduino board over serial cable that I found doesn't work with Windows._

## Getting started.
Make sure that the PHP files are in the same folder, and also place the four files of the Relay library into the Arduino sketch folder.

If you encounter any problem, ensure you allowed your code to dial with your Arduino board. For the Ethernet way, also ensure that you provided relevant IP parameters to your Arduino Ethernet shield and your PC/server. You may need to disable your firewall on Windows and some Linux distros, or create a new firewale rule. Feel free to send me any questions or suggestions.

The Ethernet way uses UDP.

## Requirements.
### Arduino board :
- 1 Arduino board.
    - Must be provided with a serial port in case the case of communication via the Serial.
    - Must be provided with an Ethernet port or an Ethernet Shield 2 in case the case of communication via the Ethernet.
- Jumper wires.
- 1 Arduino compatbile relay or more (or anything you'd need to command, like LED(s), buzzer, ...).
- 1 USB-to-serial cable in case the case of communication via the Serial.

### Arduino code :
- Arduino IDE 2.
- Relay library found on [circuit.io](https://www.circuito.io/app?components=512,11061,3061987,3061987).

### Server/computer :
- Works with Debian 11, and thus with Debian-based most recent distributions. Should work with any of most recent GNU/Linux distributions. Ethernet way works with Windows 10 and 11.
- PHP 7.4 or later.
- Apache 2

## Environnement for test.
### Arduino board :
- Arduino Mega 2560.
- 2 Songle relays for Arduino.

### Arduino code :
- Arduino IDE 2 (started with 2.0.3 and updated to 2.0.4 during the project progress).
- Relay library found on [circuit.io](https://www.circuito.io/app?components=512,11061,3061987,3061987).

### Server side :
- Tested on both Debian 11 and Windows 11.
- PHP 8.
- Apache 2.

## Planned changes.
- Windows compatibility for serial way (because the `fopen()` method is built different on Linux and on Windows).
- Possibility to use Nginx instead of Apache 2 on a GNU/Linux server.
- Docker or Podman compatibility on a GNU/Linux server.
