@extends('frontend.layouts.layout')
@section('title')
اتصل بنا
@endsection
@section('header')
<style>
    /* Always set the map height explicitly to define the size of the div
     * element that contains the map. */
    #map {
        height: 300px;
    }
    /* Optional: Makes the sample page fill the window. */
    html, body {
        height: 100%;
        margin: 0;
        padding: 0;
    }
    #description {
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300; 
    }

    #infowindow-content .title {
        font-weight: bold;
    }

    #infowindow-content {
        display: none;
    }

    #map #infowindow-content {
        display: inline;
    }

    .pac-card {
        margin: 10px 10px 0 0;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        background-color: #fff;
        font-family: Roboto;
    }

    #pac-container {
        padding-bottom: 12px;
        margin-right: 12px;
    }

    .pac-controls {
        display: inline-block;
        padding: 5px 11px;
    }

    .pac-controls label {
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
    }

    #pac-input {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        /*margin-left: -113px;*/
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        right:0 !important;
        left:0 !important;
    }

    #pac-input:focus {
        border-color: #4d90fe;
    }

    #title {
        color: #fff;
        background-color: #4d90fe;
        font-size: 25px;
        font-weight: 500;
        padding: 6px 12px;
    }
    #target {
        width: 345px;
    }
</style>
@endsection
@section('content')
<div class="page-title">
        <div class="container">
            <h1><strong>اتصل بنا</strong></h1>
        </div>
    </div>
    <section class="shopping-pattern">
        <div class="container">
            <div class="row"> 
                <div class="col-md-6">
                    <div class="card mb-4 widget">
                        <div class="card-body p-2">
                            <h4 class="card-title"><strong>معلومات الإتصال</strong></h4>
                            <ul class="list-group">
                                <li class="list-group-item"><i class="icon-location-pin"></i><span> @if(!empty($setting->sit_address_ar)){{$setting->sit_address_ar}}@endif</span></li>
                                <li class="list-group-item"><i class="fa fa-phone"></i><span> @if(!empty($setting->sit_phone)){{$setting->sit_phone}}@endif</span></li>
                                <li class="list-group-item"><i class="fa fa-whatsapp"></i><span> 010-000-00000</span></li>
                                <li class="list-group-item"><i class="fa fa-envelope"></i><span> @if(!empty($setting->sit_mail)){{$setting->sit_mail}}@endif</span></li>
                                <li class="list-group-item"><i class="fa fa-clock-o"></i><span> @if(!empty($setting->sit_open_ar)){{$setting->sit_open_ar}}@endif</span></li>
                            </ul>
                            <div id="map"></div>
                            {!! Form::hidden('lng', null, ['id'=>'lng']) !!}
                            {!! Form::hidden('lat', null, ['id'=>'lat']) !!}
                            </div>
                    </div>
                </div> 
                <div class="col-md-6">
                    <form action="{{url('/Contact-Us')}}" method="post" class="contact-form">
                       {{csrf_field()}}
                        <div class="form-group {{ $errors->has('complain_name') ? ' has-danger' : '' }}">
                        <label>الإسم <span style="color: red">*</span></label>
                        <input class="form-control" name="complain_name" type="text">
                        @if ($errors->has('complain_name'))
                        <small class="form-control-feedback">{{ $errors->first('complain_name') }} </small>
                        @endif
                        </div>
                        <div class="form-group {{ $errors->has('complain_reason') ? ' has-danger' : '' }}">
                        <label>عنوان الرسالة <span style="color: red">*</span></label>
                        <input class="form-control" name="complain_reason" type="text">
                        @if ($errors->has('complain_reason'))
                        <small class="form-control-feedback">{{ $errors->first('complain_reason') }} </small>
                        @endif
                        </div>
                        <div class="form-group {{ $errors->has('complain_mail') ? ' has-danger' : '' }}">
                        <label>البريد الإلكتروني <span style="color: red">*</span></label>
                        <input class="form-control" name="complain_mail" type="email">
                        @if ($errors->has('complain_mail'))
                        <small class="form-control-feedback">{{ $errors->first('complain_mail') }} </small>
                        @endif
                        </div>
                        <div class="form-group {{ $errors->has('complain_desc') ? ' has-danger' : '' }}">
                        <label>الرسالة <span style="color: red">*</span></label>
                        <textarea class="form-control" name="complain_desc" rows="6">
                        </textarea>
                        @if ($errors->has('complain_desc'))
                        <small class="form-control-feedback">{{ $errors->first('complain_desc') }} </small>
                        @endif
                        </div>
                        <div class="form-group"><button class="btn btn-outline-secondary btn-block" type="submit">إرسال</button></div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    @section('js')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDtaIwmepScDMmCOqr7-WszNY0HU4uwhdY&libraries=places&callback=initAutocomplete"
async defer></script>

 <script>
      var map = null;
      var marker = null;

      function initAutocomplete(){
        var mapProp = {
            zoom: 15,
         
           @if(!empty($setting) != 0 && $setting->lat != '' &&  $setting->lng !='')
              center: {lat:{{$setting->lat}}, lng:{{$setting->lng}}  },
            @else
            center: {lat:24.774265, lng:46.738586},
            @endif
            mapTypeId: 'roadmap'
           };
        map = new google.maps.Map(document.getElementById('map'), mapProp);
        var styles = [{stylers: [{hue: "#c5c5c5"}, {saturation: -100}]},];
        map.setOptions({styles: styles});
        // Create the search box and link it to the UI element.
        var input = document.getElementById('pac-input');
        var searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function() {
          searchBox.setBounds(map.getBounds());
        });

        map.addListener('click', function(event) {
          //call function to create marker
               if (marker) {
                  marker.setMap(null);
                  marker = null;
               }
           marker = createMarker(event.latLng, "name", "<b>Location</b><br>"+event.latLng);
        });

        var markers = [];
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function() {
          var places = searchBox.getPlaces();

          if (places.length == 0) {
            return;
          }

          // Clear out the old markers.
          markers.forEach(function(marker) {
            marker.setMap(null);
          });
          markers = [];

          // For each place, get the icon, name and location.
          var bounds = new google.maps.LatLngBounds();
          places.forEach(function(place) {
            if (!place.geometry) {
              console.log("Returned place contains no geometry");
              return;
            }

            var icon = {
              url: place.icon,
              size: new google.maps.Size(71, 71),
              origin: new google.maps.Point(0, 0),
              anchor: new google.maps.Point(17, 34),
              scaledSize: new google.maps.Size(25, 25)
            };

           

            if (place.geometry.viewport) {
              // Only geocodes have viewport.
              bounds.union(place.geometry.viewport);
            } else {
              bounds.extend(place.geometry.location);
            }
          });
          map.fitBounds(bounds);
        });
       @if(!empty($setting) != 0 && $setting->lat != '' &&  $setting->lng !='')
           marker = createMarker(new google.maps.LatLng({{$setting->lat}},{{$setting->lng}}),'egy','')
         @endif
      }


      function createMarker(latlng, name, html) {
          var contentString = html;
          var marker = new google.maps.Marker({
              position: latlng,
              map: map,
              zIndex: Math.round(latlng.lat()*-100000)<<5
              });
          
          google.maps.event.trigger(marker, 'click');  

          $('#lat').val(latlng.lat());
          $('#lng').val(latlng.lng());
          return marker;
      }

     
    </script>
@endsection
@endsection