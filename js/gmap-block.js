var map;

function initialize() {
    "use strict";
    var myLatlng = new google.maps.LatLng(54.55651, -5.964445),
        mapOptions = {
            zoom: 15,
            center: myLatlng,
            draggable: 0,
            mapTypeControl: 0,
            zoomControl: 0,
            scrollwheel: 0,
            streetViewControl: 0
        };
    map = new google.maps.Map(document.getElementById('map-canvas-block'), mapOptions);
    var marker = new google.maps.Marker({
        icon: 'http://maps.google.com/mapfiles/ms/micons/blue-dot.png',
        position: myLatlng,
        map: map,
        title: 'Fleming Fulton School',
        url: "/contact_us",
        animation: google.maps.Animation.DROP
    });
    google.maps.event.addListener(marker, 'click', function () {
        window.location.href = marker.url;
    });

}

google.maps.event.addDomListener(window, 'load', initialize);