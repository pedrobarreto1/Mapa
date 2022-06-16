//mapa com leafletjs
var map = L.map(document.getElementById('map'), {
      center: [-5.18, -40.67],
      zoom: 15
      });
var basemap = L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
          });
basemap.addTo(map);