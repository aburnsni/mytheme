var myLatlng = new google.maps.LatLng(54.55663, -5.964576);


function initialize() {
    "use strict";
    var saveWidget,
        
        mapOptions = {
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
        
        saveWidgetOptions = {
            place: {
                // ChIJJfVFI6oIYUgRdw0d7GHwHOs is the place Id for FFS. Found using 
                // https://developers.google.com/maps/documentation/javascript/examples/places-placeid-finder
                placeId: 'ChIJJfVFI6oIYUgRdw0d7GHwHOs',
                location: myLatlng
            },
            attribution: {
                source: 'Fleming Fulton School',
                webUrl: 'http://www.flemingfulton.org.uk'
            }
        },
        
        contentString = '<div id="save-widget">' +
            '<h4>Fleming Fulton School</h4>' +
            '<div>' +
            'Upper Malone Road<br />Belfast<br />BT9 6TY' +
            '</div>' +
            '</div>',

        infowindow = new google.maps.InfoWindow({
            content: contentString
        }),
        
        marker = new google.maps.Marker({
            icon: '/sites/all/themes/fleming/logo.png',
            position: saveWidgetOptions.place.location,
            map: map,
            title: 'Fleming Fulton School',
            animation: google.maps.Animation.DROP
        });

    google.maps.event.addListener(marker, 'click', function () {
        infowindow.open(map, marker);
        var widgetDiv = document.getElementById('save-widget');
        saveWidget = new google.maps.SaveWidget(widgetDiv, saveWidgetOptions);
    });
}

google.maps.event.addDomListener(window, 'load', initialize);