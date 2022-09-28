from signal import signal, SIGTERM, SIGHUP, pause
from time import sleep
from rpi_lcd import LCD
lcd = LCD()


def safe_exit(signum, frame):
    exit(1)


while True:
    try:
        signal(SIGTERM, safe_exit)
        signal(SIGHUP, safe_exit)
        lcd.text("Ethic Electronics", 1)
        lcd.text("Air Purity : 76%", 2)
        sleep(5)
        lcd.text("Temperature:36°", 1)
        lcd.text("Humidity : 83%", 2)
        sleep(5)
        lcd.text("Ethic Electronics", 1)
        lcd.text("Air Purity : 76%", 2)
        sleep(5)
        lcd.text("Temperature:36°", 1)
        lcd.text("Humidity : 83%", 2)
        sleep(5)
    except KeyboardInterrupt:
        pass
    finally:
        lcd.clear()
