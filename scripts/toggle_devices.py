from msvcrt import getch, kbhit

import requests


def post_to_api(data):
    payload = {
        "name": data[0],
        "region_name": data[1],
        "value": data[2],
    }

    r = requests.post("http://projeto-ti.test/api", data=payload)

    if r.status_code != 200:
        print("Request error!")
        print(r.status_code)


def get_from_api(sensor_name, region_name):
    r = requests.get("http://projeto-ti.test/api?name=" + sensor_name + "&region_name=" + region_name)
    if r.status_code != 200:
        return print("Request error!")
    is_toggled = r.json()
    return 0 if is_toggled else 1


try:
    print("Usage:\n[B] Toggle barrier\n[L] Toggle lights\n[S] Toggle sprinklers\n[CTRL+C] Exit")
    while True:
        if kbhit():
            tecla = getch().upper()
            if tecla == b"B":
                toggled = get_from_api("barrier", "parking")
                if toggled:
                    print("Barrier opened")
                else:
                    print("Barrier closed")
                post_to_api(["barrier", "parking", toggled])
            elif tecla == b"L":
                toggled = get_from_api("lights", "foyer")
                if toggled:
                    print("Lights ON")
                else:
                    print("Lights OFF")
                post_to_api(["lights", "foyer", toggled])
            elif tecla == b"S":
                toggled = get_from_api("sprinklers", "garden")
                if toggled:
                    print("Sprinklers ON")
                else:
                    print("Sprinklers OFF")
                post_to_api(["sprinklers", "garden", toggled])
            else:
                print("Invalid option!")
except KeyboardInterrupt:
    print("Program terminated.")
