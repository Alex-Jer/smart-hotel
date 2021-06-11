from time import sleep

import cv2 as cv
import requests


def send_file():
    url = "http://labs-ti.test/public/upload.php"
    files = {"imagem": open("scripts/webcam.png", "rb")}
    r = requests.post(url, files=files)

    if r.status_code == 200:
        print(r.text)
    else:
        print("O pedido HTTP não foi bem sucedido")
        print(r.text)


def get_temp(camera):
    r = requests.get("http://labs-ti.test/api/api.php?nome=temperatura")
    if r.status_code == 200:
        temp_value = r.json()
        if temp_value > -90:
            print("Temperatura HIGH: " + str(temp_value))
            ret, image = camera.read()
            cv.imwrite("scripts/webcam.png", image)
            send_file()
        else:
            print("Temperatura LOW: " + str(temp_value))
    else:
        print("O pedido HTTP não foi bem sucedido")


try:
    camera = cv.VideoCapture(0)
    print("Prima CTRL+C para terminar")
    while True:
        get_temp(camera)
        sleep(5)
except KeyboardInterrupt:
    camera.release()
    cv.destroyAllWindows()
    print("Programa terminado pelo utilizador")
finally:
    print("Fim do programa")
