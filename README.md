# Commanduino
An example of a simple way to command an Arduino relay via a PHP web page.

I did this for my student project.
_Please, note that the way to command the Arduino board over serial cable that I found doesn't work with Windows._

If you encounter any problem, ensure you allowed your code to dial with your Arduino board. For the Ethernet way, also ensure that you provided relevant IP parameters to your Arduino Ethernet shield and your PC/server. You may need to disable your firewall on Windows and some Linux distros, or create a new firewale rule. Feel free to send me any questions or suggestions.

## Getting started.
Make sure that the PHP files are in the same folder, and also place the four files of the Relay library into the Arduino sketch folder.

## Requirements.
### Arduino board :
- 1 Arduino board provided with a serial port (e.g. Uno, Mega, ...).
- Jumper wires.
- 1 Arduino compatbile relay or more (or anything you'd need to command, like LED(s), buzzer, ...).
- 1 USB-to-serial cable.

### Arduino code :
- Arduino IDE 2.
- Relay library found on [circuit.io](https://www.circuito.io/app?components=512,11061,3061987,3061987).

### Server/computer :
- Works with Debian 11, and thus with Debian-based most recent distributions. Should work with any of most recent GNU/Linux distributions.
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
- Debian 11.
- PHP 7.4.
- Apache 2

## Planned changes.
- Windows compatibility for serial way (because the `fopen()` method is built different on Linux and on Windows).
- Possibility to use Nginx instead of Apache 2 on a GNU/Linux server.
- Docker or Podman compatibility on a GNU/Linux server.
- Possibility to command the Arduino board over an Ethernet link instead of the serial link.
