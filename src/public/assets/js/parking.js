
const LeafIcon = L.Icon.extend({
    options: {
        iconSize:     [30, 30],
    }
});

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

    const osm = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    });


    const map = L.map('map', {
        center: [lat, lon],
        zoom: 18,
        layers: [osm],
        scrollWheelZoom: false
    });
    L.marker([lat, lon], {icon: parkingIcon}).addTo(map);
});
