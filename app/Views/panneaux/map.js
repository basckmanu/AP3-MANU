"use strict";


let panneauxAffiches = function () {
    panneauxStockes.infosBase.forEach(function (donnees) {


        let mapInstance = L.map('map').setView([44.022262753, 1.364081417], 13);
        // if (mapInstance && mapInstance.remove) {
        //     mapInstance.off();
        //     mapInstance.remove();
            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            }).addTo(map);

            let marker = L.marker([donnees.dataPanneaux["LATITUDE"], donnees.dataPanneaux["LONGITUDE"]]).addTo(map);


            // map.onclick = function (lat, long) {
            //     fetch(`${this.}`)
            //         .then(function (reponseHttp) {
            //             return reponseHttp.json();
            //         })
            //         .then(function (jsonData) {

            //         })
            //         .catch(function (erreur) {
            //             console.log(erreur);
            //         })


            //     if (lat == donnees.dataPanneaux["LATITUDE"] && long == donnees.dataPanneaux["LONGITUDE"])
                    
            // }

            // function onMapClick(ville) {

            // }

            //}
    })
}
