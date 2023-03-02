import serial;
import sys;

portCom = serial.Serial();

portCom.port = "/dev/ttyACM0";
portCom.baudrate = 115200;
portCom.open();
if sys.argv != '1' != '2' : error = 'Invalid or absent argument !'; raise Exception(error);
if sys.argv == '1' : order = '1';
if sys.argv == '2' : order = '2';
portCom.write(order.encode());
portCom.close();
