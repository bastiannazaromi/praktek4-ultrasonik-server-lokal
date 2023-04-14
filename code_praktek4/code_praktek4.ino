// Wifi
#include <ESP8266WiFi.h>
#include <ESP8266WiFiMulti.h>
#include <ESP8266HTTPClient.h>
// Buat object Wifi
ESP8266WiFiMulti WiFiMulti;
// Buat object http
HTTPClient http;
#define USE_SERIAL Serial

String urlSimpan = "http://192.168.5.7/praktek4-ultrasonik-server-lokal/data/simpan?jarak=";

String respon = "";

#define WIFI_SSID "Bas"
#define WIFI_PASSWORD "12345678"

// Timer variables
unsigned long lastTime = 0;
unsigned long timerDelay = 5000;

// Sensor Ultrasonik
#define echoPin D7
#define trigPin D6

void setup() {
  Serial.begin(115200);

  USE_SERIAL.begin(115200);
  USE_SERIAL.setDebugOutput(false);

  for(uint8_t t = 4; t > 0; t--) {
      USE_SERIAL.printf("[SETUP] Tunggu %d...\n", t);
      USE_SERIAL.flush();
      delay(1000);
  } 

  WiFi.mode(WIFI_STA);
  WiFiMulti.addAP(WIFI_SSID, WIFI_PASSWORD);

  for (int u = 1; u <= 5; u++)
  {
    if ((WiFiMulti.run() == WL_CONNECTED))
    {
      USE_SERIAL.println("Terhubung ke wifi");
      USE_SERIAL.flush();
      delay(1000);
    }
    else
    {
      Serial.println("Wifi belum terhubung");
      delay(1000);
    }
  }
  
  pinMode(echoPin, INPUT);
  pinMode(trigPin, OUTPUT);
}

void loop() {
  int durasi, jarak, pos=0;
  digitalWrite(trigPin, HIGH);
  delayMicroseconds(10);
  digitalWrite(trigPin, LOW);
  durasi = pulseIn(echoPin, HIGH);
  jarak = (durasi / 2) / 29.1;

  if (jarak < 0) {
    jarak = 0;
  } else if (jarak > 100) {
    jarak = 100;
  }

  Serial.print("Jarak : ");
  Serial.print(jarak);
  Serial.println(" cm");

  Serial.println();
    
  if ((millis() - lastTime) > timerDelay) {
    // Kirim Data Sensor Ultrasnoik ke Database

    kirim_database(jarak);

    lastTime = millis();
  }

  Serial.println();
  delay(1000);
}

void kirim_database(int jrk) {
  if ((WiFiMulti.run() == WL_CONNECTED))
  {
    USE_SERIAL.print("[HTTP] Memulai...\n");
    
    http.begin( urlSimpan + (String) jrk );
    
    USE_SERIAL.print("[HTTP] Kirim ke database ...\n");
    int httpCode = http.GET();

    if(httpCode > 0)
    {
      USE_SERIAL.printf("[HTTP] kode response GET : %d\n", httpCode);

      if (httpCode == HTTP_CODE_OK) // kode 200 
      {
        respon = http.getString();
        USE_SERIAL.println("Respon : " + respon);
        delay(200);
      }
    }
    else
    {
      USE_SERIAL.printf("[HTTP] GET data gagal, error: %s\n", http.errorToString(httpCode).c_str());
    }
    http.end();
  }
}
