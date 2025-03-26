
const LeafIcon = L.Icon.extend({
    options: {
        iconSize:     [30, 30],
    }
});

const connecteIcon = new LeafIcon({iconUrl: '/assets/img/station-connecte.png'}),
    deconnecteIcon = new LeafIcon({iconUrl: '/assets/img/station-deconnecte.png'}),
    maintenanceIcon = new LeafIcon({iconUrl: '/assets/img/station-maintenance.png'});

function iconStation(etat) {
    let icon;
    switch (etat) {
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

const parkingIcon = new LeafIcon({iconUrl: '/assets/img/parking.png'})
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
    if (typeof etatCustom !== 'undefined' && etatCustom) {
        etat = null;
    }

    const osm = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 18,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    });


    const map = L.map('map', {
        center: [lat, lon],
        zoom: 18,
        layers: [osm],
        scrollWheelZoom: false
    });
    L.marker([lat, lon], {icon: iconStation(etat)}).addTo(map);
});
