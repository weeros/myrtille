const LeafIcon = L.Icon.extend({
    options: {
        iconSize: [30, 30],
    }
});

const connecteIcon = new LeafIcon({iconUrl: '/assets/img/station-connecte.png'}),
    deconnecteIcon = new LeafIcon({iconUrl: '/assets/img/station-deconnecte.png'}),
    maintenanceIcon = new LeafIcon({iconUrl: '/assets/img/station-maintenance.png'});

const parkingIcon = new LeafIcon({iconUrl: '/assets/img/parking.png'})

function iconParking(parking) {
    let icon;
    switch (parking.etat) {
        case 'DECONNECTEE':
            icon = parkingIcon;
            break;
        case 'MAINTENANCE':
            icon = parkingIcon;
            break;
        case 'OUT_OF_SERVICE':
            icon = parkingIcon;
            break;
        default:
            icon = parkingIcon;
            break;
    }
    return icon;
}

function iconStation(station) {
    let icon;
    switch (station.etat) {
        case 'DECONNECTEE':
            icon = deconnecteIcon;
            break;
        case 'MAINTENANCE':
            icon = maintenanceIcon;
            break;
        case 'OUT_OF_SERVICE':
            icon = maintenanceIcon;
            break;
        default:
            icon = connecteIcon;
            break;
    }
    return icon;
}


function getParkings() {
    return $.ajax({
        async: false,
        method: "GET",
        url: `/api/parkings`,
        success: function (response) {
            // Vide l'élément d'ID localisationsSelect
            return response
        },
        error: function (e) {
        },
    });
}


function getStations() {
    return $.ajax({
        async: false,
        method: "GET",
        url: `/api/stations`,
        success: function (response) {
            // Vide l'élément d'ID localisationsSelect
            return response
        },
        error: function (e) {
        },
    });
}

function styleTrafic(etat) {
    let style;
    switch (etat) {
        case 'FLUIDE':
            style = {
                "color": "#52e00e",
                "weight": 5,
                "opacity": 0.65
            };
            break;
        case 'DENSE':
            style = {
                "color": "#E68C00",
                "weight": 5,
                "opacity": 0.65
            };
            break;
        case 'EMBOUTEILLE':
            style = {
                "color": "#FA0A0A",
                "weight": 5,
                "opacity": 0.65
            };
            break;
        case 'PARALYSE':
            style = {
                "color": "#000000",
                "weight": 5,
                "opacity": 0.65
            };
            break;
        default:
            style = {
                "color": "#999999",
                "weight": 5,
                "opacity": 0.65
            };
            break;
    }
    return style;
}


function api(route = "trafics") {
    return $.ajax({
        async: false,
        method: "GET",
        url: '/api/' + route,
        success: function (response) {
            // Vide l'élément d'ID localisationsSelect
            return response
        },
        error: function (e) {
        },
    });
}


function getTooltipStation(entity) {
    return "<h2>" + entity.nom + "</h2><table>"
        + "<tr><td>GID</td><td>" + entity.gid + "</td></tr>"
        + "<tr><td>Etat de la station</td><td>" + entity.etat + "</td></tr>"
        + "<tr><td>Vélos</td><td>" + entity.nbvelos + "</td></tr>"
        + "<tr><td  rowspan='2'><a href='/station/" + entity.id + "'>Détails</a></td></tr>"
        + "</table>"
}

function getTooltipParking(entity) {
    return "<h2>" + entity.nom + "</h2><table>"
        + "<tr><td>GID</td><td>" + entity.gid + "</td></tr>"
        + "<tr><td>Etat du Parking</td><td>" + entity.etat + "</td></tr>"
        + "<tr><td>Places Vélos</td><td>" + entity.placesVelos + "</td></tr>"
        + "<tr><td>Places Voitures</td><td>" + entity.placesVoitures + "</td></tr>"
        + "<tr><td  rowspan='2'><a href='/parking/" + entity.id + "'>Détails</a></td></tr>"
        + "</table>"
}

$(document).ready(function () {

    let lat = 44.8333;
    let lon = -0.5667;
    let zoom = 12;

    if (typeof latCustom !== 'undefined' && latCustom) {
        lat = latCustom;
    }
    if (typeof lonCustom !== 'undefined' && lonCustom) {
        lon = lonCustom;
    }
    if (typeof zoomCustom !== 'undefined' && zoomCustom) {
        zoom = zoomCustom;
    }

    const osm = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    });

    const osmHOT = L.tileLayer('https://{s}.tile.openstreetmap.fr/hot/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Tiles style by <a href="https://www.hotosm.org/" target="_blank">Humanitarian OpenStreetMap Team</a> hosted by <a href="https://openstreetmap.fr/" target="_blank">OpenStreetMap France</a>'
    });

    const openTopoMap = L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: 'Map data: © OpenStreetMap contributors, SRTM | Map style: © OpenTopoMap (CC-BY-SA)'
    });

    const map = L.map('map', {
        center: [lat, lon],
        zoom: zoom,
        layers: [osm]
    });

    const baseLayers = {
        'OpenStreetMap': osm,
        'OpenStreetMap.HOT': osmHOT,
        'OpenStreetMap.TopoMap': openTopoMap
    };

    const stationLayer = L.layerGroup().addTo(map);
    const parkingLayer = L.layerGroup().addTo(map);
    const traficLayer = L.layerGroup().addTo(map);

    let stations = [];
    let parkings = [];
    let trafics = [];


    for (let station of api('stations').responseJSON) {
        stations[station.id] = L.marker([station.latitude, station.longitude], {icon: iconStation(station)}).bindPopup(getTooltipStation(station)).addTo(stationLayer);
    }

    for (let parking of api('parkings').responseJSON) {
        parkings[parking.id] = L.marker([parking.latitude, parking.longitude], {icon: iconParking(parking)}).bindPopup(getTooltipParking(parking)).addTo(parkingLayer);
    }

    for (let trafic of api('trafics').responseJSON) {
        trafics[trafic.id] = L.geoJSON(trafic.geoShape, {style: styleTrafic(trafic.etat)}).addTo(traficLayer);
    }

    const overlays = {
        'Stations Vélos': stationLayer,
        'Parkings': parkingLayer,
        'Trafic': traficLayer,
    };

    let layerControl = L.control.layers(baseLayers, overlays).addTo(map);

    const eventStations = new EventSource('http://localhost:8080/.well-known/mercure?topic=http://localhost:8000/stations');
    eventStations.onmessage = function (event) {
        const station = JSON.parse(event.data);
        if (stations[station.id]) {
            stations[station.id].getPopup().setContent(getTooltipStation(station));
            stations[station.id].getPopup().update();
        } else {
            stations[station.id] = L.marker([station.latitude, station.longitude], {icon: iconStation(station)}).bindPopup(getTooltipStation()).addTo(stationLayer);
        }
        $('.event > tbody').prepend('<tr><td>' + station.mdate + '</td><td>station : <a href="parking/' + station.id + '">' + station.nom + '</a></td></tr>');
    };

    const eventParkings = new EventSource('http://localhost:8080/.well-known/mercure?topic=http://localhost:8000/parkings');
    eventParkings.onmessage = function (event) {
        const parking = JSON.parse(event.data);
        if (parkings[parking.id]) {
            parkings[parking.id].getPopup().setContent(getTooltipParking(parking));
            parkings[parking.id].getPopup().update();
        } else {
            parkings[parking.id] = L.marker([parking.latitude, parking.longitude], {icon: iconParking(parking)}).bindPopup(getTooltipParking(parking)).addTo(parkingLayer);
        }
        $('.event > tbody').prepend('<tr><td>' + parking.mdate + '</td><td>parking : <a href="parking/' + parking.id + '">' + parking.nom + '</a></td></tr>');
    };

    const eventTrafics = new EventSource('http://localhost:8080/.well-known/mercure?topic=http://localhost:8000/trafics');
    eventTrafics.onmessage = function (event) {
        const trafic = JSON.parse(event.data);
        if (trafics[trafic.id]) {
            trafics[trafic.id].setStyle(styleTrafic(trafic.etat));
        } else {
            trafics[trafic.id] = L.geoJSON(trafic.geoShape, {style: styleTrafic(trafic.etat)}).addTo(traficLayer)
        }
        $('.event > tbody').prepend('<tr><td>' + trafic.mdate + '</td><td>trafic : ' + trafic.typevoie + ' - ' + trafic.etat + '</td></tr>');

    };


});
