@extends('tmpl.public')

@section('_header') 
    <style type="text/css">
        .page-wrap {
            min-height: 0rem !important;
            margin-bottom: -4rem !important;
            background-color: red !important;
        }

        .site-footer, .page-wrap:after {
            height: 0rem !important;
        }

        a.lt_logo{
            display: none !important;
        }

        .header{
            margin-left: 7.5rem !important;
            padding-left: 0rem !important;
        }
    </style>
@stop  

@section('image')
<!-- <a href="/getfedup"> -->
<div class="bgimg" style=" overflow: hidden !important;">
    <div id="map_map" class="full_map" style="height: 99.75rem; ">
            </div> 
    <!-- <div class="header_title_wrapper">
    <h1 class="header_title">Special: Poke Me Bowl</h1>
    </div> -->
    <!-- <img class="arrow" src="/images/site/seemore.png"> -->
</div>
<!-- </a> -->
@stop
@section('content') 

<script type="text/javascript">
    function initMap() {
      var myLatLng = {lat: -37.831079, lng: 144.959485}; //-37.832674, 144.956657
      var cen = {lat: -37.839331, lng: 144.959857  };   

      var map = new google.maps.Map(document.getElementById('map_map'), {
        zoom: 15,
        center: cen,
        scrollwheel: false,
        navigationControl: true,
        mapTypeControl: true,
        scaleControl: true,
        draggable: true,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        styles: [
            {
            "elementType": "geometry",
            "stylers": [
              {
                "color": "#ebe3cd"
              }
            ]
            },
            {
            "elementType": "labels.icon",
            "stylers": [
              {
                "visibility": "off"
              }
            ]
            },
            {
            "elementType": "labels.text",
            "stylers": [
              {
                "saturation": -60
              },
              {
                "visibility": "simplified"
              },
              {
                "weight": 1.5
              }
            ]
            },
            {
            "elementType": "labels.text.fill",
            "stylers": [
              {
                "color": "#523735"
              }
            ]
            },
            {
            "elementType": "labels.text.stroke",
            "stylers": [
              {
                "color": "#f5f1e6"
              }
            ]
            },
            {
            "featureType": "administrative",
            "elementType": "geometry.stroke",
            "stylers": [
              {
                "color": "#c9b2a6"
              }
            ]
            },
            {
            "featureType": "administrative.land_parcel",
            "elementType": "geometry.stroke",
            "stylers": [
              {
                "color": "#dcd2be"
              }
            ]
            },
            {
            "featureType": "administrative.land_parcel",
            "elementType": "labels.text.fill",
            "stylers": [
              {
                "color": "#ae9e90"
              }
            ]
            },
            {
            "featureType": "landscape.natural",
            "elementType": "geometry",
            "stylers": [
              {
                "color": "#dfd2ae"
              }
            ]
            },
            {
            "featureType": "poi",
            "elementType": "geometry",
            "stylers": [
              {
                "color": "#dfd2ae"
              }
            ]
            },
            {
            "featureType": "poi",
            "elementType": "labels.text.fill",
            "stylers": [
              {
                "color": "#93817c"
              }
            ]
            },
            {
            "featureType": "poi.park",
            "elementType": "geometry.fill",
            "stylers": [
              {
                "color": "#a5b076"
              }
            ]
            },
            {
            "featureType": "poi.park",
            "elementType": "labels.text.fill",
            "stylers": [
              {
                "color": "#447530"
              }
            ]
            },
            {
            "featureType": "road",
            "elementType": "geometry",
            "stylers": [
              {
                "color": "#f5f1e6"
              }
            ]
            },
            {
            "featureType": "road.arterial",
            "elementType": "geometry",
            "stylers": [
              {
                "color": "#fdfcf8"
              }
            ]
            },
            {
            "featureType": "road.highway",
            "elementType": "geometry",
            "stylers": [
              {
                "color": "#f8c967"
              }
            ]
            },
            {
            "featureType": "road.highway",
            "elementType": "geometry.stroke",
            "stylers": [
              {
                "color": "#e9bc62"
              }
            ]
            },
            {
            "featureType": "road.highway.controlled_access",
            "elementType": "geometry",
            "stylers": [
              {
                "color": "#e98d58"
              }
            ]
            },
            {
            "featureType": "road.highway.controlled_access",
            "elementType": "geometry.stroke",
            "stylers": [
              {
                "color": "#db8555"
              }
            ]
            },
            {
            "featureType": "road.local",
            "elementType": "labels.text.fill",
            "stylers": [
              {
                "color": "#806b63"
              }
            ]
            },
            {
            "featureType": "transit.line",
            "elementType": "geometry",
            "stylers": [
              {
                "color": "#dfd2ae"
              }
            ]
            },
            {
            "featureType": "transit.line",
            "elementType": "labels.text.fill",
            "stylers": [
              {
                "color": "#8f7d77"
              }
            ]
            },
            {
            "featureType": "transit.line",
            "elementType": "labels.text.stroke",
            "stylers": [
              {
                "color": "#ebe3cd"
              }
            ]
            },
            {
            "featureType": "transit.station",
            "elementType": "geometry",
            "stylers": [
              {
                "color": "#dfd2ae"
              }
            ]
            },
            {
            "featureType": "water",
            "elementType": "geometry.fill",
            "stylers": [
              {
                "color": "#b9d3c2"
              }
            ]
            },
            {
            "featureType": "water",
            "elementType": "labels.text.fill",
            "stylers": [
              {
                "color": "#92998d"
              }
            ]
            }
        ]

      });

      var marker = new google.maps.Marker({
        position: myLatLng,
        map: map,
        title: 'Fed Up Project',
        
      });
    }



    </script>
    
    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAc_dsJGFgSoJP0Zw5QbzklR2vQ1DMEyyU&callback=initMap"
    async defer></script>AIzaSyCDz88OVnx1tQ17Zbq003l-723NLO_rapk -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAbvwNaP9zyoSOzUNHFX0FC8uZN1oI-ODE&callback=initMap"
    async defer></script>

@stop  