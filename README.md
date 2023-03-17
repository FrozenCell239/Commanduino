# Commanduino
An example of a simple way to command an Arduino relay via a PHP web page.

I did this for my student project.
I'm looking for a way to make this work but with an Ethernet connection instead of the USB cable. Then it could be used in an actual firm network as I have to do in my student project.

If you encounter any problem, ensure you allowed your code to dial with your Arduino board. I'll indicate later the necessary CLI command(s) in a Troubleshooting section. Feel free to send me any question or suggestions.

## Requirements.
### Arduino board :
- 1 Arduino board provided with a serial port (e.g. Uno, Mega, ...).
- Jumper wires.
- 1 Arduino compatbile relay or more (or anything you'd need to command, like LED(s), buzzer, ...).
- 1 USB-to-serial cable.

### Arduino code :
- Arduino IDE 2.
- [Relay 1.0.0](https://github.com/rafaelnsantos/Relay) library (download it via Arduino IDE).

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
- Relay 1.0.0 library.

### Server side :
- Debian 11.
- PHP 7.4.
- Apache 2

## Planned changes.
- Windows compatibility (because the `fopen()` method is built different on Linux and on Windows).
- Possibility to use Nginx instead of Apache 2 on a GNU/Linux server.
- Docker or Podman compatibility on a GNU/Linux server.
- Possibility to command the Arduino board over an Ethernet link instead of the serial link.
- A Troubleshooting section in this read-me file. (Could be useful especially for Ethernet link.)
