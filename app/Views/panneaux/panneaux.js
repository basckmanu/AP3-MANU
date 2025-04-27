
let panneauxStockes = {
    "infosBase":
        [
            { "type": "header", "version": "5.2.1", "comment": "Export to JSON plugin for PHPMyAdmin" },
            { "type": "database", "name": "publicom" },
            {
                "type": "table", "name": "commune", "database": "publicom", 
                
                "dataCommune":
                    [
                        { "IDCOMMUNE": "1", "NOM": "Montauban", "DEPARTEMENT": "82" },
                        { "IDCOMMUNE": "2", "NOM": "Paris", "DEPARTEMENT": "75" },
                        { "IDCOMMUNE": "3", "NOM": "Toulouse", "DEPARTEMENT": "31" },
                        { "IDCOMMUNE": "4", "NOM": "Lyon", "DEPARTEMENT": "69" },
                        { "IDCOMMUNE": "5", "NOM": "Bordeaux", "DEPARTEMENT": "33" },
                        { "IDCOMMUNE": "6", "NOM": "Rennes", "DEPARTEMENT": "35" },
                        { "IDCOMMUNE": "7", "NOM": "Marseille", "DEPARTEMENT": "13" },
                        { "IDCOMMUNE": "8", "NOM": "Béziers", "DEPARTEMENT": "34" },
                        { "IDCOMMUNE": "9", "NOM": "Metz", "DEPARTEMENT": "57" },
                        { "IDCOMMUNE": "10", "NOM": "Perpignan", "DEPARTEMENT": "66" }
                    ]
            }
            , {
                "type": "table", "name": "message", "database": "publicom", 
                
                "dataMessage":
                    [

                    ]
            }
            , {
                "type": "table", "name": "panneau", "database": "publicom", 
                
                "dataPanneaux":
                    [
                        { "IDPANNEAU": "1", "IDCOMMUNE": "1", "REFERENCE": "Brucin3", "LATITUDE": "44.022262753", "LONGITUDE": "1.364081417" },
                        { "IDPANNEAU": "2", "IDCOMMUNE": "2", "REFERENCE": "Hkraf736", "LATITUDE": "48.86287791", "LONGITUDE": "2.3599986" },
                        { "IDPANNEAU": "3", "IDCOMMUNE": "3", "REFERENCE": "Buhvf75", "LATITUDE": "43.596037953", "LONGITUDE": "1.432094901" },
                        { "IDPANNEAU": "4", "IDCOMMUNE": "4", "REFERENCE": "Yuvèt83T", "LATITUDE": "45.733906132", "LONGITUDE": "4.868941686" },
                        { "IDPANNEAU": "5", "IDCOMMUNE": "5", "REFERENCE": "Ghibub94", "LATITUDE": "44.857621613", "LONGITUDE": "-0.5733793060000001" },
                        { "IDPANNEAU": "6", "IDCOMMUNE": "6", "REFERENCE": "Gduh47", "LATITUDE": "48.111680407", "LONGITUDE": "-1.681868718" },
                        { "IDPANNEAU": "7", "IDCOMMUNE": "7", "REFERENCE": "Nejix836", "LATITUDE": "43.28692858", "LONGITUDE": "5.38060836" },
                        { "IDPANNEAU": "8", "IDCOMMUNE": "8", "REFERENCE": "Bozbi24", "LATITUDE": "43.347466978", "LONGITUDE": "3.230859725" },
                        { "IDPANNEAU": "9", "IDCOMMUNE": "9", "REFERENCE": "Fedhu73", "LATITUDE": "49.10819284", "LONGITUDE": "6.195988106" },
                        { "IDPANNEAU": "11", "IDCOMMUNE": "10", "REFERENCE": "Jipzn93", "LATITUDE": "42.696441301", "LONGITUDE": "2.898977872" },
                        { "IDPANNEAU": "22", "IDCOMMUNE": "3", "REFERENCE": "PAN01", "LATITUDE": "44.030334773807", "LONGITUDE": "11.0303347" }
                    ]
            }
        ]
}