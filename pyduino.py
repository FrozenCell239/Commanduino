import serial;
import sys;

order = str(sys.argv[1]);
portCom = serial.Serial();

portCom.port = "/dev/ttyACM0";
portCom.baudrate = 115200;
portCom.open();
portCom.write(order.encode());
portCom.close();
