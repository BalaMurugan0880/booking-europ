@extends('admin.layout.layout')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0 text-dark">Add New Appointment</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('appointments.index')}}">Appointment</a></li>
                <li class="breadcrumb-item active">Create</li>
            </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-right"  style="float: right;">
                        <a class="btn btn-primary" href="{{ route('appointments.index') }}"><i class="fas fa-arrow-left"></i></a>
                    </div>
                </div>
            </div>

            <div class="card card-warning mt-2">
                <div class="card-body">
                    <form action="{{ route('appointments.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Requester Name</label>
                                    <input type="text" name="req_name" class="form-control" value="{{ auth()->user()->name ?? '' }}" placeholder="">
                                    <input type="text" name="user_id" class="form-control" value="{{ auth()->user()->id }}" hidden>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Requester Designation</label>
                                    <input type="text" name="req_designation" value="{{ auth()->user()->profile->designation ?? '' }}" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                    <label>Requester Contact Number</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                    </div>
                                    <input type="text" name="req_contact" autocomplete="off" class="form-control" value="{{ auth()->user()->profile->phone_number ?? '' }}" data-inputmask='"mask": "(60) 99-99999999"' data-mask>
                                  </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Appointment Date</label>
                                    <input type="date" name="apt_date" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Appointment Time</label>
                                    <input type="time" name="apt_time" class="form-control" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <p class="marker-info">**Please drag the marker to get your exact location.</p>
                                <div id="map" style="height:400px;width:auto;"></div>
                                <div class="form-group">
                                    <label>Pick-Up Location</label>
                                    <input type="text" name="pickup_location" id="pickup_location" class="form-control" placeholder="Enter a Location">
                                    <input type="text" name="pickup_lat" id="pickup_lat" class="form-control" hidden>
                                    <input type="text" name="pickup_long" id="pickup_long" class="form-control" hidden>
                                    <input type="text" name="pickup_url" id="pickup_url" class="form-control" hidden>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Customer Name</label>
                                    <input type="text" name="customer_name" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Customer Phone Number</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        </div>
                                        <input type="text" name="customer_contact" autocomplete="off" class="form-control" data-inputmask='"mask": "(60) 99-99999999"' data-mask>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Vehicle Registration Number</label>
                                    <input type="text" name="customer_vrn" class="form-control" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-6">
                              <div class="form-group">
                                  <label>Vehicle Make</label>
                                  <select name="vehicle_make" id="vehicle_make" class="form-control select2">
                                      <option value="">-- Select Vehicle Make --</option>
                                      @foreach ($vehicleMakes as $make)
                                          <option value="{{ $make->name }}">{{ $make->name }}</option>
                                      @endforeach
                                  </select>
                              </div>
                          </div>
                          <div class="col-sm-6">
                              <div class="form-group">
                                  <label>Vehicle Model</label>
                                  <select name="vehicle_model" id="vehicle_model" class="form-control select2" data-placeholder="-- Select Vehicle Model --">
                                      <!-- Options will be dynamically loaded -->
                                  </select>
                              </div>
                          </div>
                      </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <p class="marker-info">**Please drag the marker to get your exact location.</p>
                                    <div id="map2" style="height:400px;width:auto;"></div>
                                    <label>Drop-off Location</label>
                                    <input type="text" name="dropoff_location" id="dropoff_location" class="form-control" placeholder="Enter a Location">
                                    <input type="text" name="dropoff_lat" id="dropoff_lat"  class="form-control" hidden>
                                    <input type="text" name="dropoff_long" id="dropoff_long" class="form-control" hidden>
                                    <input type="text" name="dropoff_url" id="dropoff_url" class="form-control" hidden>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Special Notes</label>
                                    <textarea class="form-control" style="height:150px" name="special_notes" placeholder=""></textarea>
                                </div>
                            </div>
                        </div>
                        <input type="text" name="status" id="status" value="Pending Approval" class="form-control" hidden>
                        <div class="row">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
        </div>
    </section>
</div>

</form>

<script>
  $(document).ready(function() {
      // Initialize Select2 on the dropdowns
      $('.select2').select2();

      // Handle vehicle make change
      $('#vehicle_make').on('change', function() {
          var make = $(this).val();
          if (make) {
              $.ajax({
                  url: '/get-vehicle-models',
                  type: 'GET',
                  data: { vehicle_make: make },
                  dataType: 'json',
                  success: function(response) {
                      var options = '<option></option>'; // Add an empty option for the placeholder
                      if (response.length > 0) {
                          // Add options for each vehicle model
                          $.each(response, function(index, model) {
                              options += '<option value="' + model.name + '">' + model.name + '</option>';
                          });
                      } else {
                          options += '<option value="">No vehicle models found</option>';
                      }
                      $('#vehicle_model').html(options);
                      $('#vehicle_model').val(null).trigger('change'); // Reset the selected value
                  },
                  error: function() {
                      $('#vehicle_model').html('<option></option>'); // Clear the options
                      $('#vehicle_model').val(null).trigger('change'); // Reset the selected value
                  }
              });
          } else {
              $('#vehicle_model').html('<option></option>'); // Clear the options
              $('#vehicle_model').val(null).trigger('change'); // Reset the selected value
          }
      });
  });
</script>






{{-- Pick up Location Map --}}
<script>
    var map;
    var marker;
    var autocomplete;
    var userInteraction = false; // Flag to track user interaction

    function initMap() {
      var initialLatLng = { lat: 3.1319, lng: 101.6841 };
      var mapOptions = {
        zoom: 13,
        center: initialLatLng,
      };

      map = new google.maps.Map(document.getElementById('map'), mapOptions);

      marker = new google.maps.Marker({
        position: initialLatLng,
        map: map,
        draggable: true,
      });

      autocomplete = new google.maps.places.Autocomplete(document.getElementById('pickup_location'));
      autocomplete.bindTo('bounds', map);

      autocomplete.addListener('place_changed', function () {
        // Set the flag to false when the autocomplete selection changes the place
        userInteraction = false;

        var place = autocomplete.getPlace();
        if (!place.geometry) {
          console.log('Place details not found for the selected input');
          return;
        }

        if (place.geometry.location) {
          marker.setPosition(place.geometry.location);
          map.panTo(place.geometry.location);
          map.setZoom(13);
          updateLocation(place.geometry.location);
        }
      });

      google.maps.event.addListener(map, 'click', function (event) {
        // Set the flag to true when the user manually clicks on the map
        userInteraction = true;

        marker.setPosition(event.latLng);
        updateLocation(event.latLng);
      });

      google.maps.event.addListener(marker, 'dragend', function () {
        // Set the flag to true when the user manually drags the marker
        userInteraction = true;

        var latLng = marker.getPosition();
        updateLocation(latLng);
      });
    }

    function updateLocation(latLng) {
      document.getElementById('pickup_lat').value = latLng.lat();
      document.getElementById('pickup_long').value = latLng.lng();

      // Generate URL and get address for the new marker position
      var url = 'https://www.google.com/maps/search/?api=1&query=' + latLng.lat() + ',' + latLng.lng();
      document.getElementById('pickup_url').value = url;

      var geocoder = new google.maps.Geocoder();
      geocoder.geocode({ 'location': latLng }, function (results, status) {
        if (status === 'OK') {
          if (results[0]) {
            // Check the flag to determine whether to update the address
            if (userInteraction) {
              var addressComponents = results[0].address_components;
              var address = '';
              for (var i = 0; i < addressComponents.length; i++) {
                var component = addressComponents[i];
                if (component.types.includes('street_number') || component.types.includes('route')) {
                  address += component.long_name + ' ';
                } else if (component.types.includes('locality')) {
                  address += component.long_name + ', ';
                } else if (component.types.includes('administrative_area_level_1')) {
                  address += component.long_name + ', ';
                } else if (component.types.includes('country')) {
                  address += component.long_name;
                }
              }
              document.getElementById('pickup_location').value = address;
            }
          } else {
            console.log('No results found');
          }
        } else {
          console.log('Geocoder failed due to: ' + status);
        }
      });
    }

    window.addEventListener('load', initMap);
  </script>



{{-- Drop OFF Location Map --}}
<script>
    var map2;
    var marker2;
    var autocomplete2;

    function initDropoffMap() {
      var initialLatLng = { lat: 3.1319, lng: 101.6841 };
      var mapOptions = {
        zoom: 13,
        center: initialLatLng
      };

      map2 = new google.maps.Map(document.getElementById('map2'), mapOptions);

      marker2 = new google.maps.Marker({
        position: initialLatLng,
        map: map2,
        draggable: true
      });

      autocomplete2 = new google.maps.places.Autocomplete(document.getElementById('dropoff_location'));
      autocomplete2.bindTo('bounds', map2);

      autocomplete2.addListener('place_changed', function () {
        // Set the flag to false when the autocomplete selection changes the place
        userInteraction = false;

        var place = autocomplete2.getPlace();
        if (!place.geometry) {
          console.log('Place details not found for the selected input');
          return;
        }

        if (place.geometry.location) {
          marker2.setPosition(place.geometry.location);
          map2.panTo(place.geometry.location);
          map2.setZoom(13);
          updateDropoffLocation(place.geometry.location);
        }
      });

      google.maps.event.addListener(map2, 'click', function (event) {
        // Set the flag to true when the user manually clicks on the map
        userInteraction = true;

        marker2.setPosition(event.latLng);
        updateDropoffLocation(event.latLng);
      });

      google.maps.event.addListener(marker2, 'dragend', function () {
        // Set the flag to true when the user manually drags the marker
        userInteraction = true;

        var latLng = marker2.getPosition();
        updateDropoffLocation(latLng);
      });
    }

    function updateDropoffLocation(latLng) {
      document.getElementById('dropoff_lat').value = latLng.lat();
      document.getElementById('dropoff_long').value = latLng.lng();

      // Generate URL and get address for the new marker position
      var url = 'https://www.google.com/maps/search/?api=1&query=' + latLng.lat() + ',' + latLng.lng();
      document.getElementById('dropoff_url').value = url;

      var geocoder = new google.maps.Geocoder();
      geocoder.geocode({ 'location': latLng }, function (results, status) {
        if (status === 'OK') {
          if (results[0]) {
            // Check the flag to determine whether to update the address
            if (userInteraction) {
              var addressComponents = results[0].address_components;
              var address = '';
              for (var i = 0; i < addressComponents.length; i++) {
                var component = addressComponents[i];
                if (component.types.includes('street_number') || component.types.includes('route')) {
                  address += component.long_name + ' ';
                } else if (component.types.includes('locality')) {
                  address += component.long_name + ', ';
                } else if (component.types.includes('administrative_area_level_1')) {
                  address += component.long_name + ', ';
                } else if (component.types.includes('country')) {
                  address += component.long_name;
                }
              }
              document.getElementById('dropoff_location').value = address;
            }
          } else {
            console.log('No results found');
          }
        } else {
          console.log('Geocoder failed due to: ' + status);
        }
      });
    }

    window.addEventListener('load', initDropoffMap);
  </script>





@endsection