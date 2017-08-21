<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1 class="vermelhomh text-center">LOCALIZAÇÃO</h1>
        <h3 class='text-center'>Avenida Campeche,2811/ Novo Campeche<br/>
            Florianópolis</h3>
        <div id="mapa">
            <script  src='https://maps.googleapis.com/maps/api/js?key=AIzaSyDUvbHjyihk-5d3kkHfF0K-gCSh6BKP5EU'></script><div style='overflow:hidden;height:438px;width:700px; padding-left: 1%;'><div id='gmap_canvas' style='height:438px;width:700px;'></div><div><small><a href="http://embedgooglemaps.com">embed google map</a></small></div><div><small><a href="https://noleggioauto.zone/">ottimo servizio clienti</a></small></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div><script type='text/javascript'>function init_map(){var myOptions = {zoom:20,center:new google.maps.LatLng(-44.663555729894572,-48.48023042451900),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(-27.66370929894572,-48.48043242451956)});infowindow = new google.maps.InfoWindow({content:'<strong>Makino Studio Hair</strong><br>Av. campeche,2811<br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script><br />
        </div><br />
    </body>
</html>
