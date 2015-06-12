var map;

function initialize() {
    "use strict";
    var myLatlng = new google.maps.LatLng(54.55651, -5.964445);
    var mapOptions = {
        zoom: 15,
        center: myLatlng,
        draggable: 1,
        mapTypeControl: 1,
        zoomControl: 1,
        scrollwheel: 1,
        streetViewControl: 0
    };
    map = new google.maps.Map(document.getElementById('map-canvas-large'), mapOptions);
    var marker = new google.maps.Marker({
        icon: 'http://maps.google.com/mapfiles/ms/micons/green-dot.png',
        position: myLatlng,
        map: map,
        title: 'Fleming Fulton School',
        animation: google.maps.Animation.DROP
    });
}

google.maps.event.addDomListener(window, 'load', initialize);
