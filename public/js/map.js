var mapObj = {

    initMap: function () {
        var map = L.map('map');
        var osmUrl='http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
        var osmAttrib='Map data © OpenStreetMap contributors';
        var osm = new L.TileLayer(osmUrl, {attribution: osmAttrib});
        map.setView([43.6149, 4.00588], 12);
        map.addLayer(osm);
    }
};

var map = Object.create(mapObj);
map.initMap();