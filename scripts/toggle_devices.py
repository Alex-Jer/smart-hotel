# This script shows the user a menu with multiple actuators
# When the corresponding key is pressed, the actuator is toggled (ON / OFF ; Open / Closed)

from msvcrt import getch, kbhit

from requests import get, post


def post_to_api(data):
    # Creates the payload of necessary data for the POST request
    payload = {
        "name": data[0],
        "region_name": data[1],
        "value": data[2],
    }

    # Sends the payload to the server
    r = post("http://projeto-ti.test/api/actuator", data=payload)

    # If the POST wasn't successful
    if r.status_code != 200:
        print("Request error!" + r.text)


def get_from_api(actuator_name, region_name):
    r = get("http://projeto-ti.test/api/actuator?name=" + actuator_name + "&region_name=" + region_name)

    # If the GET request wasn't successful
    if r.status_code != 200:
        return print("Request error!")

    # Returns the device's current state (0 - OFF/Closed | 1 - ON/Open)
    is_toggled = r.json()
    return 0 if is_toggled else 1


try:
    print("Usage:\n[B] Toggle barrier\n[L] Toggle lights\n[S] Toggle sprinklers\n[CTRL+C] Exit")
    while True:
        if kbhit():
            # Converts the input character to uppercase for easier validation
            key = getch().upper()

            # Checks the user input and toggles the device (0 - OFF/Closed | 1 - ON/Open)
            if key == b"B":
                toggled = get_from_api("barrier", "parking")
                if toggled:
                    print("Barrier opened")
                else:
                    print("Barrier closed")
                post_to_api(["barrier", "parking", toggled])
            elif key == b"L":
                toggled = get_from_api("lights", "foyer")
                if toggled:
                    print("Lights ON")
                else:
                    print("Lights OFF")
                post_to_api(["lights", "foyer", toggled])
            elif key == b"S":
                toggled = get_from_api("sprinklers", "garden")
                if toggled:
                    print("Sprinklers ON")
                else:
                    print("Sprinklers OFF")
                post_to_api(["sprinklers", "garden", toggled])
            else:
                print("Invalid option!")
except KeyboardInterrupt:
    print("Program terminated by user.")
