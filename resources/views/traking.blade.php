<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
    crossorigin=""/>



    <style>
        #map { height: 90vh; }
    </style>
</head>
<body>

    <h1>gerges hana</h1>
    <div id="map"></div>


     <!-- Make sure you put this AFTER Leaflet's CSS -->
 <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
 integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
 crossorigin=""></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

 <script>
var map = L.map('map').setView([51.505, -0.09], 13);
L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);

var customTitle="";
for(var i=0;i<locations.lenth;i++){
    customTitle=i.toSting();
    if(i==(locations.lenth-1)){
        customTitle="hir";
    }
    marker=newL.marker([locations[i][0],locations[i][1]])
        .addTo(map)
        .bindPopup(customTitle)
        .openPopup();
}


var arr=[];
$.ajax({
    url:'{{route('tracking')}}',
    type:'GET',
    dataType:'json',
    success:function(data){
        addToMap(data.slice(-1)[0])
    }
});

 </script>
</body>
</html>
