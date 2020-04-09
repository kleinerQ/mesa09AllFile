import max7219.led as led

device = led.matrix()
device.show_message('hello world', delay=0.2)
