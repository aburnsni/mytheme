var myLatlng = new google.maps.LatLng(54.55663, -5.964576);

function initialize() {
    "use strict";
    var mapOptions = {
            zoom: 15,
            center: myLatlng,
            streetViewControl: 0,
            mapTypeControl: true,
            mapTypeControlOptions: {
                style: google.maps.MapTypeControlStyle.DEFAULT,
                mapTypeIds: [google.maps.MapTypeId.ROADMAP, google.maps.MapTypeId.SATELLITE]
            },
            zoomControl: true,
            zoomControlOptions: {
                style: google.maps.ZoomControlStyle.LARGE,
                position: google.maps.ControlPosition.TOP_LEFT
            }
        },
        map = new google.maps.Map(document.getElementById('map-canvas-large'), mapOptions),
        marker = new google.maps.Marker({
            icon: '/sites/all/themes/fleming/logo.png',
            position: myLatlng,
            map: map,
            title: 'Fleming Fulton School',
            animation: google.maps.Animation.DROP
        });
}

google.maps.event.addDomListener(window, 'load', initialize);