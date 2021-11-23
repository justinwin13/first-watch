var mymap = L.map('mapid').setView([33.74906964159741, -84.38839497301485], 13);

L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox/streets-v11',
    tileSize: 512,
    zoomOffset: -1,
    accessToken: 'pk.eyJ1IjoiMTAzNTA4IiwiYSI6ImNrb2RoeTRkdTAyNmkybnFlN3NmOG56M2oifQ.JInEIV9dA3JravOm085keg'
}).addTo(mymap);

var marker = L.marker([33.74906964159741, -84.38839497301485]).addTo(mymap);
var marker = L.marker([33.762571790357455, -84.39265845938522]).addTo(mymap);
var marker = L.marker([33.733974404599124, -84.37178157063535]).addTo(mymap);