@extends('backend.layouts.layout')
@section('title')
أعدادات الموقع الرئيسية
@endsection
@section('content')
@section('header')
<style>
    /* Always set the map height explicitly to define the size of the div
     * element that contains the map. */
    #map {
        height: 400px;
    }

    /* Optional: Makes the sample page fill the window. */
    html,
    body {
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
        margin-left: -113px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        z-index: 0;
        position: absolute;
        right: 0px;
        top: -8px;
        left: 191px;
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
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-12">
                <div class="col-md-7">
                    <div class="d-flex">
                        <ol class="breadcrumb m-b-10">
                            <li class="breadcrumb-item"><a href="{{url('/admin')}}">الرئيسية</a></li>
                            <li class="breadcrumb-item active">اعدادات الموقع الرئيسية</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body wizard-content">
                        <label>الاعدادات العامة</label>

                        <ul class="nav nav-tabs customtab" role="tablist">
                            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home1"
                                    role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span
                                        class="hidden-xs-down">الرئيسية</span></a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#logo2" role="tab"><span
                                        class="hidden-sm-up"><i class="fa fa-map"></i></span> <span
                                        class="hidden-xs-down">اللوجو</span></a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#seo3" role="tab"><span
                                        class="hidden-sm-up"><i class="fa fa-text-width"></i></span> <span
                                        class="hidden-xs-down"> Seo </span></a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#social4" role="tab"><span
                                        class="hidden-sm-up"><i class="fa fa-link"></i></span> <span
                                        class="hidden-xs-down">السوشيال ميديا</span></a> </li>

                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#map6" role="tab"><span
                                        class="hidden-sm-up"><i class="fa fa-location-arrow"></i></span> <span
                                        class="hidden-xs-down">اللوكيشن</span></a> </li>
                        </ul>

                        @if(!empty($setting))
                        <form action="{{url('/admin/EditSiteSetting')}}" method="post" enctype="multipart/form-data"
                            class="form-horizontal m-t-40">
                            {{ csrf_field() }}
                            @else
                            <form method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                                @endif
                                <div class="tab-content">
                                    <div class="tab-pane active" id="home1" role="tabpanel">
                                        <div class="row">
                                            <div class="form-group col-md-6 m-t-20">
                                                <p>عنوان الويب سايب عربى</p>
                                                <input type="text" id="example-email2" name="sit_title_ar" class="form-control" placeholder="عنوان الويب سايب عربى" @if(!empty($setting->sit_title_ar)) value="{{$setting->sit_title_ar}}" @endif>
                                            </div>

                                            <div class="form-group col-md-6 m-t-20">
                                                <p>العنوان عربى</p>
                                                <input type="text" id="example-email2" name="sit_address_ar"
                                                    class="form-control" placeholder="العنوان عربى" @if(!empty($setting->sit_address_ar)) value="{{$setting->sit_address_ar}}" @endif>
                                            </div>

                                            <div class="form-group col-md-6 m-t-20">
                                                <p>رقم الجوال</p>
                                                <input type="text" id="example-email2" name="sit_phone"
                                                    class="form-control" placeholder="رقم الجوال" @if(!empty($setting->sit_phone)) value="{{$setting->sit_phone}}" @endif>
                                            </div>
                                            <div class="form-group col-md-6 m-t-20">
                                                <p>البريد الألكترونى</p>
                                                <input type="text" id="example-email2" name="sit_mail"
                                                    class="form-control" placeholder="البريد الألكترونى" @if(!empty($setting->sit_mail)) value="{{$setting->sit_mail}}" @endif>
                                            </div>
                                            <div class="form-group col-md-6 m-t-20">
                                                <p>توقيت العمل عربى</p>
                                                <input type="text" id="example-email2" name="sit_open_ar"
                                                    class="form-control" placeholder="توقيت العمل" @if(!empty($setting->sit_open_ar)) value="{{$setting->sit_open_ar}}" @endif>
                                            </div>
                                            <div class="form-group col-md-6 m-t-20">
                                                <p>عملة الموقع</p>
                                                <input type="text" id="example-email2" name="sit_mony" class="form-control"
                                                    placeholder="عملة الموقع" @if(!empty($setting->sit_mony)) value="{{$setting->sit_mony}}" @endif>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <p>وصف فوتر عربى</p>
                                                    <textarea class="form-control" rows="5" name="sit_footer_desc_ar"
                                                        maxlength="200">@if(!empty($setting->sit_footer_desc_ar)) {{$setting->sit_footer_desc_ar}} @endif</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Step 2 -->

                                    <div class="tab-pane" id="logo2" role="tabpanel">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <p>اللوجو عربى</p>
                                                        <input type="file" id="input-file-now" name="sit_logo_ar"
                                                            class="dropify"@if(!empty($setting->sit_logo_ar)) data-default-file="{{ url($setting->sit_logo_ar) }}" @endif />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <p>اللوجو عربى فوتر</p>

                                                        <input type="file" id="input-file-now" name="sit_logofooter_ar"
                                                            class="dropify" @if(!empty($setting->sit_logofooter_ar)) data-default-file="{{ url($setting->sit_logofooter_ar) }}" @endif/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <p>ايقونة الموقع</p>
                                                        <input type="file" id="input-file-now" name="sit_favicon"
                                                            class="dropify" @if(!empty($setting->sit_favicon)) data-default-file="{{ url($setting->sit_favicon) }}" @endif/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="tab-pane " id="seo3" role="tabpanel">
                                        <div class="row">
                                            <div class="form-group col-md-12 m-t-20">
                                                <p>Meta keywords Arabic</p>

                                                <input type="text" id="example-email2" name="sit_keywords_ar"
                                                    class="form-control" placeholder="Meta keywords Arabic"
                                                    data-role="tagsinput" @if(!empty($setting->sit_keywords_ar)) value="{{$setting->sit_keywords_ar}}" @endif>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <p>Meta description Arabic</p>
                                                    <textarea class="form-control" rows="5" name="sit_desc_ar">@if(!empty($setting->sit_desc_ar)) {{$setting->sit_desc_ar}} @endif</textarea>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <!-- Step 3 -->

                                    <div class="tab-pane " id="social4" role="tabpanel">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon3"><i
                                                                class="ti-facebook"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="facebook"
                                                        placeholder="FaceBook" aria-label="FaceBook" aria-describedby="basic-addon3" @if(!empty($setting->facebook)) value="{{$setting->facebook}}" @endif>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" name="whatsapp"
                                                        placeholder="Whatsapp" aria-label="Youtube"
                                                        aria-describedby="basic-addon1" @if(!empty($setting->whatsapp)) value="{{$setting->whatsapp}}" @endif>
                                                        <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1"><i
                                                                class="fa fa-whatsapp"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1"><i
                                                                class="ti-twitter"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="twitter"
                                                        placeholder="Twitter" aria-label="Twitter"
                                                        aria-describedby="basic-addon1" @if(!empty($setting->twitter)) value="{{$setting->twitter}}" @endif>
                                                </div>
                                            </div>
                                            <br><br><br>
                                            <div class="clearfix"></div>

                                            <div class="col-md-6">
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" name="google"
                                                        placeholder="google-plus" aria-label="google-plus"
                                                        aria-describedby="basic-addon3" @if(!empty($setting->google)) value="{{$setting->google}}" @endif>
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon3"><i
                                                                class="fa fa-google-plus"></i></span>
                                                    </div>       
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1"><i
                                                                class="ti-instagram"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="instgram"
                                                        placeholder="Instagram" aria-label="Instagram"
                                                        aria-describedby="basic-addon1" @if(!empty($setting->instgram)) value="{{$setting->instgram}}" @endif>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" name="snapchat"
                                                        placeholder="snapchat" aria-label="Instagram"
                                                        aria-describedby="basic-addon1" @if(!empty($setting->snapchat)) value="{{$setting->snapchat}}" @endif>
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1"><i
                                                                class="fa fa-snapchat-ghost"></i></span>
                                                    </div>    
                                                </div>
                                            </div>


                                            <br><br><br>
                                            <div class="clearfix"></div>

                                            <div class="col-md-6">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon3"><i
                                                                class="ti-linkedin"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="linked"
                                                        placeholder="Linkend-In" aria-label="Linkend-In"
                                                        aria-describedby="basic-addon3" @if(!empty($setting->linked)) value="{{$setting->linked}}" @endif>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" name="youtuob"
                                                        placeholder="Youtube" aria-label="Youtube"
                                                        aria-describedby="basic-addon1" @if(!empty($setting->youtuob)) value="{{$setting->youtuob}}" @endif>
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1"><i
                                                                class="ti-youtube"></i></span>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                    <!-- Step 4 -->

                                    <div class="tab-pane" id="map6" role="tabpanel">
                                        <div class="col-md-12">
                                            <div class="form-group{{ $errors->has('map') ? ' has-error' : '' }}">

                                                {!! Form::text('map', null, ['id'=>'pac-input','class' => 'form-control
                                                controls','rows'=>3,'onkeydown'=>"if (event.keyCode == 13) { return
                                                false;}",'placeholder'=>'إبحث بالمنطقه']) !!}
                                                <small class="text-danger">{{ $errors->first('map') }}</small>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div id="map"></div>
                                        </div>
                                        {!! Form::hidden('lng', null, ['id'=>'lng']) !!}
                                        {!! Form::hidden('lat', null, ['id'=>'lat']) !!}

                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <br>
                                    <button type="submit" class="btn waves-effect waves-light btn-outline-success">
                                        <i class="fa fa-check"></i>
                                        <span>حفظ</span>
                                    </button>
                                   
                                    </a>
                                </div>
                            </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@section('js')
<script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDtaIwmepScDMmCOqr7-WszNY0HU4uwhdY&libraries=places&callback=initAutocomplete"
    async defer></script>

    <script>
      var map = null;
      var marker = null;

      function initAutocomplete(){
        var mapProp = {
            zoom: 15,
            @if(!empty($setting) != 0 && $setting->lat != '' &&  $setting->lng !='')
              center: {lat: {{$setting->lat}}, lng:{{$setting->lng}}  },
            @else
            center: {lat: 30.0032491, lng:31.1789619},
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
