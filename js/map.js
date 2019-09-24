/*
function initMap() {
    var adress1 = {
        lat: 52.310714,
        lng: 104.236796
        /!*Трактовая, 18/36а*!/
    };

    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 12,
        center: adress1,
        styles: [{
            "featureType": "all",
            "elementType": "all",
            "stylers": [{
                "saturation": -100
            }, {
                "gamma": 0.5
            }]
        }]
    });
    var marker1 = new google.maps.Marker({
        position: adress1,
        map: map,
        //icon: ''
    });
}*/

var map;
DG.then(function () {
    map = DG.map('map', {
        center: [52.236796, 104.236796],
        zoom: 12,
        boxZoom: false,
        zoomControl: false,
        fullscreenControl: false
    });
    DG.marker([52.236796, 104.236796]).addTo(map);
});
