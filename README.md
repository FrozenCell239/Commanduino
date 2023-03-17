# Commanduino
An example of a simple way to command an Arduino relay via a PHP web page. (I did this for my student project.)

In this example the PHP webpage was hosted on a Debian 11 server and was runned by a classical Apache 2 service, and the Arduino board and the physical server are connected with a USB cable.
I'm looking for a way to make this work but with an Ethernet connection instead of the USB cable. So it could be used in an actual firm network as I have to do in my student project.

## Requirements.
### Arduino board :
- 1 Arduino board provided with a serial port (e.g. Uno, Mega, ...).
- Jumper wires.
- 1 Arduino compatbile relay or more (or anything you'd need to command, like LED(s), buzzer, ...).
- 1 USB-to-serial cable.

### Arduino code :
- Arduino IDE 2.
- Relay 1.0.0 library (download it via Arduino IDE ; here is the [source code](https://github.com/rafaelnsantos/Relay) if you're curious about it.).

### Server/computer :
- Should work with any of most recent Linux distributions. _Gotta find a way to make it work on Windows later._
- PHP 7.4 or later.
- Apache 2
_(Nginx could later be used instead of Apache 2. It also currently doesn't work with Docker containment, but this should be fixed later)_.


## Environnement for test.
### Arduino board :
- Arduino Mega 2560.
-2 Songle relays for Arduino.

### Arduino code :
- Arduino IDE 2 (started with 2.0.3 and updated to 2.0.4 during the project progress).
- Relay 1.0.0 library.

### Server side :
- Debian 11.
- PHP 7.4.
- Apache 2
