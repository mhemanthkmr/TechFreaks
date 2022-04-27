
#define DEBUG_SW 1 // Make it 1 to see all debug messages in Serial Monitor

#include <WiFi.h>
#include <WiFiClient.h>
#include <FirebaseESP32.h>

// Firebase Credentials
#define FIREBASE_HOST "iot-project-2f20e-default-rtdb.firebaseio.com"
#define FIREBASE_AUTH "DCJqdn05xseUfXIve8SzxWu0wMEpkdtn1gE2WzRG"

// WiFi Credentials
#define WIFI_SSID "iQOO Z3 5G"
#define WIFI_PASSWORD "hemanth143"

// Function Declaration
void with_internet();
void without_internet();

// Pins of Switches
#define S5 32
#define S6 35
#define S7 34
#define S8 39

// Pins of Relay (Appliances Control)
#define R5 15
#define R6 2
#define R7 4
#define R8 22
#define R9 21

// Define FirebaseESP32 data object
FirebaseData firebaseData;
FirebaseJson json;

// Necessary Variables

int switch_ON_Flag1_previous_I = 0;
int switch_ON_Flag2_previous_I = 0;
int switch_ON_Flag3_previous_I = 0;
int switch_ON_Flag4_previous_I = 0;
int switch_ON_Flag5_previous_I = 0;

String Speed_Value;

void setup()
{
    // put your setup code here, to run once:
    pinMode(R5, OUTPUT);
    pinMode(R6, OUTPUT);
    pinMode(R7, OUTPUT);
    pinMode(R8, OUTPUT);
    pinMode(R9, OUTPUT);

    Serial.begin(115200);
    WiFi.begin(WIFI_SSID, WIFI_PASSWORD);

    Firebase.begin(FIREBASE_HOST, FIREBASE_AUTH);
    Firebase.reconnectWiFi(true);
}

void loop()
{

    if (WiFi.status() != WL_CONNECTED)
    {
        if (DEBUG_SW)
            Serial.println("Not Connected");
        without_internet();
    }

    else
    {
        if (DEBUG_SW)
            Serial.println(" Connected");
        Data_from_firebase();
        with_internet();
    }
}

void Data_from_firebase()
{
    if (Firebase.getString(firebaseData, "/Appliances/appliance1"))
    {
        if (DEBUG_SW)
            Serial.print("Relay1 - ");
        if (DEBUG_SW)
            Serial.println(firebaseData.stringData());

        if (firebaseData.stringData() == "1")
        {
            digitalWrite(R5, HIGH);
        }
        else
        {
            digitalWrite(R5, LOW);
        }
    }
    if (Firebase.getString(firebaseData, "/Appliances/appliance2"))
    {

        if (DEBUG_SW)
            Serial.print("Relay2 - ");
        if (DEBUG_SW)
            Serial.println(firebaseData.stringData());
        if (firebaseData.stringData() == "1")
        {
            digitalWrite(R6, HIGH);
        }
        else
        {
            digitalWrite(R6, LOW);
        }
    }

    if (Firebase.getString(firebaseData, "/Appliances/appliance3"))
    {
        if (DEBUG_SW)
            Serial.print("Relay3 - ");
        if (DEBUG_SW)
            Serial.println(firebaseData.stringData());

        if (firebaseData.stringData() == "1")
        {
            digitalWrite(R7, HIGH);
        }
        else
        {
            digitalWrite(R7, LOW);
        }
    }

    if (Firebase.getString(firebaseData, "/Appliances/appliance4"))
    {
        if (DEBUG_SW)
            Serial.print("Relay4 - ");
        if (DEBUG_SW)
            Serial.println(firebaseData.stringData());

        if (firebaseData.stringData() == "1")
        {
            digitalWrite(R8, HIGH);
        }
        else
        {
            digitalWrite(R8, LOW);
        }
    }

    if (Firebase.getString(firebaseData, "/Appliances/appliance5"))
    {
        if (DEBUG_SW)
            Serial.print("Relay5 - ");
        if (DEBUG_SW)
            Serial.println(firebaseData.stringData());

        if (firebaseData.stringData() == "1")
        {
            digitalWrite(R9, HIGH);
        }
        else
        {
            digitalWrite(R9, LOW);
        }
    }
}

void with_internet()
{
    // FOR SWITCH
    if (digitalRead(S5) == LOW)
    {
        if (switch_ON_Flag1_previous_I == 0)
        {
            digitalWrite(R5, HIGH);
            if (DEBUG_SW)
                Serial.println("Relay1- ON");
            String Value1 = "1";
            json.set("/appliance1", Value1);
            Firebase.updateNode(firebaseData, "/Appliances", json);
            switch_ON_Flag1_previous_I = 1;
        }
        if (DEBUG_SW)
            Serial.println("Switch1 -ON");
    }
    if (digitalRead(S5) == HIGH)
    {
        if (switch_ON_Flag1_previous_I == 1)
        {
            digitalWrite(R5, LOW);
            if (DEBUG_SW)
                Serial.println("Relay1 OFF");
            String Value1 = "0";
            json.set("/appliance1", Value1);
            Firebase.updateNode(firebaseData, "/Appliances", json);
            switch_ON_Flag1_previous_I = 0;
        }
        if (DEBUG_SW)
            Serial.println("Switch1 OFF");
    }

    if (digitalRead(S6) == LOW)
    {
        if (switch_ON_Flag2_previous_I == 0)
        {
            digitalWrite(R6, HIGH);
            if (DEBUG_SW)
                Serial.println("Relay2- ON");
            String Value2 = "1";
            json.set("/appliance2", Value2);
            Firebase.updateNode(firebaseData, "/Appliances", json);
            switch_ON_Flag2_previous_I = 1;
        }
        if (DEBUG_SW)
            Serial.println("Switch2 -ON");
    }
    if (digitalRead(S6) == HIGH)
    {
        if (switch_ON_Flag2_previous_I == 1)
        {
            digitalWrite(R6, LOW);
            if (DEBUG_SW)
                Serial.println("Relay2 OFF");
            String Value2 = "0";
            json.set("/appliance2", Value2);
            Firebase.updateNode(firebaseData, "/Appliances", json);
            switch_ON_Flag2_previous_I = 0;
        }
        if (DEBUG_SW)
            Serial.println("Switch2 OFF");
    }

    if (digitalRead(S7) == LOW)
    {
        if (switch_ON_Flag3_previous_I == 0)
        {
            digitalWrite(R7, HIGH);
            if (DEBUG_SW)
                Serial.println("Relay3- ON");
            String Value3 = "1";
            json.set("/appliance3", Value3);
            Firebase.updateNode(firebaseData, "/Appliances", json);
            switch_ON_Flag3_previous_I = 1;
        }
        if (DEBUG_SW)
            Serial.println("Switch3 -ON");
    }
    if (digitalRead(S7) == HIGH)
    {
        if (switch_ON_Flag3_previous_I == 1)
        {
            digitalWrite(R7, LOW);
            if (DEBUG_SW)
                Serial.println("Relay3 OFF");
            String Value3 = "0";
            json.set("/appliance3", Value3);
            Firebase.updateNode(firebaseData, "/Appliances", json);
            switch_ON_Flag3_previous_I = 0;
        }
        if (DEBUG_SW)
            Serial.println("Switch3 OFF");
    }

    if (digitalRead(S8) == LOW)
    {
        if (switch_ON_Flag4_previous_I == 0)
        {
            digitalWrite(R8, HIGH);
            if (DEBUG_SW)
                Serial.println("Relay4- ON");
            String Value4 = "1";
            json.set("/appliance4", Value4);
            Firebase.updateNode(firebaseData, "/Appliances", json);
            switch_ON_Flag4_previous_I = 1;
        }
        if (DEBUG_SW)
            Serial.println("Switch4 -ON");
    }
    if (digitalRead(S8) == HIGH)
    {
        if (switch_ON_Flag4_previous_I == 1)
        {
            digitalWrite(R8, LOW);
            if (DEBUG_SW)
                Serial.println("Relay4 OFF");
            String Value4 = "0";
            json.set("/appliance4", Value4);
            Firebase.updateNode(firebaseData, "/Appliances", json);
            switch_ON_Flag4_previous_I = 0;
        }
        if (DEBUG_SW)
            Serial.println("Switch4 OFF");
    }
    if (digitalRead(S8) == LOW)
    {
        if (switch_ON_Flag5_previous_I == 0)
        {
            digitalWrite(R8, HIGH);
            if (DEBUG_SW)
                Serial.println("Relay5- ON");
            String Value5 = "1";
            json.set("/appliance5", Value5);
            Firebase.updateNode(firebaseData, "/Appliances", json);
            switch_ON_Flag5_previous_I = 1;
        }
        if (DEBUG_SW)
            Serial.println("Switch5 -ON");
    }
    if (digitalRead(S8) == HIGH)
    {
        if (switch_ON_Flag5_previous_I == 1)
        {
            digitalWrite(R8, LOW);
            if (DEBUG_SW)
                Serial.println("Relay5 OFF");
            String Value5 = "0";
            json.set("/appliance5", Value5);
            Firebase.updateNode(firebaseData, "/Appliances", json);
            switch_ON_Flag5_previous_I = 0;
        }
        if (DEBUG_SW)
            Serial.println("Switch5 OFF");
    }
}

void without_internet()
{
    // FOR SWITCH
    digitalWrite(R5, !digitalRead(R5));
    digitalWrite(R6, !digitalRead(R6));
    digitalWrite(R7, !digitalRead(R7));
    digitalWrite(R8, !digitalRead(R8));
}