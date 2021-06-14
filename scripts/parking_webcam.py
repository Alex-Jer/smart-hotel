# This script takes a photo (webcam) every 5 seconds
# as long as the parking barrier is open

from datetime import datetime
from os import remove
from time import sleep

from cv2 import VideoCapture, destroyAllWindows, imwrite
from requests import get, post


def post_file(file):
    url = "http://projeto-ti.test/api/upload"

    # Opens the image
    f = open(file, "rb")
    image = {"image": f}

    # Sends the image to the server
    r = post(url, files=image, data={"location": "parking"})

    # If the POST wasn't successful
    if r.status_code != 200:
        print("POST error!\n" + r.text)
        return

    # Closes and deletes the file after a successful POST
    f.close()
    remove(file)


def upload_picture_when_open(camera):
    r = get("http://projeto-ti.test/api/actuator?name=barrier&region_name=parking")

    # If the GET wasn't sucessful
    if r.status_code != 200:
        return

    # Creates a string with the current time (e.g. "11-06-2021 19_02_26")
    now = datetime.now().strftime("%d-%m-%Y %H_%M_%S")

    # Creates a string with the filename (e.g "11-06-2021 19_02_26.png")
    file = now + ".png"

    # Stores the barrier's state returned by the GET request (0 - Closed / 1 - Open)
    is_open = r.json()

    # If the barrier is open (0 - Closed / 1 - Open)
    if is_open:
        print("Picture taken: " + now)
        ret, pic = camera.read()
        imwrite(file, pic)
        post_file(file)


try:
    # Readies the camera
    camera = VideoCapture(0)
    print("This program is responsible for taking a picture every time the parking barrier opens.")
    print("Press CTRL+C to exit the program.")
    while True:
        upload_picture_when_open(camera)
        sleep(5)
except KeyboardInterrupt:
    # Shuts the camera down and exits
    camera.release()
    destroyAllWindows()
    print("Program exited by user.")
