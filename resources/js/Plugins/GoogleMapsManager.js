export default class GoogleMapsManager{

    constructor(idMap , mapOptions = { zoom: 14 , center: new google.maps.LatLng(10, 10) }){
        this.containerMap = new google.maps.Map(document.getElementById(idMap), mapOptions)
    }

    drawMark(options){
        let marker = new google.maps.Marker(options)
        marker.setMap(this.containerMap)
    }

    drawMark(lat, lng, title){
        let marker = new google.maps.Marker({
            position: { lat , lng},
            title,
            map: this.containerMap
        })
        marker.setMap(this.containerMap)
    }

    makeMark(options){
        let marker = new google.maps.Marker(options)
        return marker;
    }

    makeMark(lat, lng, title){
        let marker = new google.maps.Marker({
            position: { lat , lng},
            title
        })
        return marker;
    }

    drawRoute(markerOrigin, markerDestination, travelMode){
        let directionsDisplay = new google.maps.DirectionsRenderer();
        let directionsServices = new google.maps.DirectionsService();

        directionsDisplay.setMap(this.containerMap);

        let request = {
            origin: new google.maps.LatLng(markerOrigin.lat,markerOrigin.lng),
            destination: new google.maps.LatLng(markerDestination.lat,markerDestination.lng),
            travelMode
        }

        directionsServices.route(request, (result, status) => {
            console.log(result, status)
            if (status == "OK") {
                //render direction here
                directionsDisplay.setDirections(result);
            }
        })
    }

    getUserPosition(options){
        return new Promise(function (resolve, reject) {
            navigator.geolocation.getCurrentPosition(resolve, reject, options);
        });
    }
}
