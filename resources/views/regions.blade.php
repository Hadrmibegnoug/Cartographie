<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet/dist/leaflet.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet-routing-machine/dist/leaflet-routing-machine.css" />    <title>Catographie avec marker</title>
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
    <h3 style="text-align: center">Recherchez les infos qui vous convient</h3><br>
    <div style="position: relative; text-align: center; width: 70%; height: 20%; background: #657786; left: 15%;">
        <input type="text" id="input" style="margin-top: 4%"  class="check"><br>
        <input type="checkbox" name="" id="checkbox-competence" class="check">Competence
        <input type="checkbox" name="" id="checkbox-sexe" class="check"> Sexe
        <input type="checkbox" name="" id="checkbox-poste" class="check">Poste de service humanitaire
        <button id="btn" style="margin: 10px;">search</button>
    </div>
    <div id="map"></div>
    <script src="https://cdn.jsdelivr.net/npm/leaflet/dist/leaflet.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/leaflet-routing-machine/dist/leaflet-routing-machine.js"></script>
    <script>
        var regions = @json($regions);
        var psh = @json($psh);
        var migrants = @json($migrants);
        var competence = @json($competence);
        var sexe = @json($sexe);
        console.log(migrants);
    </script>
    <script src="js/script.js"></script>
</body>
</html>
