import time

import requests
import simpleaudio


def play_sound(file):
    wave_obj = simpleaudio.WaveObject.from_wave_file(file)
    play_obj = wave_obj.play()  # tocar o audio
    play_obj.wait_done()  # espera ate o audio terminar


try:
    print("Prima CTRL+C para terminar")
    while True:  # ciclo para o programa executar sem parar…
        print("*** LER Temperatura do Servidor ***")
        r = requests.get("http://labs-ti.test/api/api.php?nome=temperatura")
        if r.status_code == 200:
            temp_value = r.json()
            if temp_value > 20:
                print("Temperatura HIGH: " + str(temp_value))
                play_sound("./public/audio/Alarm.wav")
            else:
                print("Temperatura LOW: " + str(temp_value))
        else:
            print("O pedido HTTP não foi bem sucedido")
        time.sleep(2)
except KeyboardInterrupt:  # caso haja interrupção de teclado CTRL+C
    print("Programa terminado pelo utilizador")
finally:  # executa sempre, independentemente se ocorreu exception
    print("Fim do programa")
