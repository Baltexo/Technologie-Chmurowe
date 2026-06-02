from flask import Flask, render_template, request
import datetime
import logging
import requests
import sys

app = Flask(__name__)

AUTOR = "Bartosz Kierepka"
PORT = 5000
API_KEY = "89385227799f59a086936650c6bd2062" 

logging.basicConfig(level=logging.INFO, format='%(message)s')
logger = logging.getLogger()

@app.route('/', methods=['GET', 'POST'])
def index():
    weather_data = None
    if request.method == 'POST':
        city = request.form.get('city')
        url = f"http://api.openweathermap.org/data/2.5/weather?q={city}&appid={API_KEY}&units=metric&lang=pl"
        response = requests.get(url).json()
        if response.get('cod') == 200:
            weather_data = response
            
    return render_template('index.html', author=AUTOR, weather=weather_data)

if __name__ == "__main__":
    start_time = datetime.datetime.now().strftime("%Y-%m-%d %H:%M:%S")
    print(f"START APLIKACJI", file=sys.stdout)
    print(f"Data uruchomienia: {start_time}", file=sys.stdout)
    print(f"Autor programu: {AUTOR}", file=sys.stdout)
    print(f"Nasłuchiwanie na porcie: {PORT}", file=sys.stdout)
    
    app.run(host='0.0.0.0', port=PORT)