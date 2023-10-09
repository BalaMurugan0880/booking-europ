@extends('admin.layout.layout')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Appointment</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('appointments.index')}}">Appointment</a></li>
                <li class="breadcrumb-item active">Edit</li>
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
                    <form action="{{ route('appointments.update',$appointment->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Requester Name</label>
                                    <input type="text" name="req_name" value="{{ $appointment->req_name }}" class="form-control" placeholder="">
                                    <input type="text" name="user_id" value="{{ $appointment->user_id }}"  class="form-control" value="{{ auth()->user()->id }}" hidden>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Requester Designation</label>
                                    <input type="text" name="req_designation" value="{{ $appointment->req_designation }}" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Requester Contact Number</label>
                                    <input type="text" name="req_contact" autocomplete="off" value="{{ $appointment->req_contact }}" class="form-control" data-inputmask='"mask": "(60) 99-99999999"' data-mask>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Appointment Date</label>
                                    <input type="date" name="apt_date" value="{{ $appointment->apt_date }}" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Appointment Time</label>
                                    <input type="time" name="apt_time" value="{{ $appointment->apt_time }}" class="form-control" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Pick-Up Location</label>
                                    <input type="text" name="pickup_location" id="pickup_location" value="{{ $appointment->pickup_location }}" class="form-control" placeholder="Enter a Location">
                                    <input type="text" name="pickup_lat" id="pickup_lat" value="{{ $appointment->pickup_lat }}" class="form-control" hidden>
                                    <input type="text" name="pickup_long" id="pickup_long" value="{{ $appointment->pickup_long }}" class="form-control" hidden>
                                    <input type="text" name="pickup_url" id="pickup_url" value="{{ $appointment->pickup_url }}" class="form-control" hidden>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Customer Name</label>
                                    <input type="text" name="customer_name" value="{{ $appointment->customer_name }}" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Customer Phone Number</label>
                                    <input type="text" name="customer_contact" autocomplete="off" value="{{ $appointment->customer_contact }}" class="form-control" data-inputmask='"mask": "(60) 99-99999999"' data-mask>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Vehicle Registration Number</label>
                                    <input type="text" name="customer_vrn" value="{{ $appointment->customer_vrn }}" class="form-control" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Vehicle Make</label>
                                    <select name="vehicle_make" id="vehicle_make" class="form-control">
                                        <option value="">-- Select Vehicle Make --</option>
                                        <option value="Vehicle 1" {{ $appointment->vehicle_make == 'Vehicle 1' ? 'selected' : '' }}>Vehicle 1</option>
                                        <option value="Vehicle 2" {{ $appointment->vehicle_make == 'Vehicle 2' ? 'selected' : '' }}>Vehicle 2</option>
                                        <option value="Vehicle 3" {{ $appointment->vehicle_make == 'Vehicle 3' ? 'selected' : '' }}>Vehicle 3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Vehicle Model</label>
                                    <select name="vehicle_model" id="vehicle_model" class="form-control">
                                        <option value="">-- Select Vehicle Model --</option>
                                        <option value="Model 1" {{ $appointment->vehicle_model == 'Model 1' ? 'selected' : '' }}>Model 1</option>
                                        <option value="Model 2" {{ $appointment->vehicle_model == 'Model 2' ? 'selected' : '' }}>Model 2</option>
                                        <option value="Model 3" {{ $appointment->vehicle_model == 'Model 3' ? 'selected' : '' }}>Model 3</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Drop-off Location</label>
                                    <input type="text" name="dropoff_location" id="dropoff_location" value="{{ $appointment->dropoff_location }}" class="form-control" placeholder="Enter a Location">
                                    <input type="text" name="dropoff_lat" id="dropoff_lat" value="{{ $appointment->dropoff_lat }}"  class="form-control" hidden>
                                    <input type="text" name="dropoff_long" id="dropoff_long" value="{{ $appointment->dropoff_long }}" class="form-control" hidden>
                                    <input type="text" name="dropoff_url" id="dropoff_url" value="{{ $appointment->dropoff_url }}" class="form-control" hidden>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Special Notes</label>
                                    <textarea class="form-control" style="height:150px" name="special_notes" placeholder="">{{ $appointment->special_notes }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
        </div>
    </section>
</div>

</form>

<script>
    function initAutocomplete() {
        // Initialize the autocomplete feature for pickup location
        var pickupInput = document.getElementById('pickup_location');
        var pickupAutocomplete = new google.maps.places.Autocomplete(pickupInput);

        // Add event listener for when a user selects an address for pickup location
        pickupAutocomplete.addListener('place_changed', function() {
            var pickupPlace = pickupAutocomplete.getPlace();
            if (!pickupPlace.geometry) {
                window.alert("No details available for input: '" + pickupPlace.name + "'");
                return;
            }

            // Populate the latitude and longitude fields with the coordinates of the selected place for pickup location
            document.getElementById('pickup_lat').value = pickupPlace.geometry.location.lat();
            document.getElementById('pickup_long').value = pickupPlace.geometry.location.lng();

            var pickupMapUrl = "https://www.google.com/maps/search/?api=1&query=" + encodeURIComponent(pickupPlace.formatted_address);

            // Populate the pickup_url field with the generated URL for pickup location
            document.getElementById('pickup_url').value = pickupMapUrl;
        });

        // Initialize the autocomplete feature for dropoff location
        var dropoffInput = document.getElementById('dropoff_location');
        var dropoffAutocomplete = new google.maps.places.Autocomplete(dropoffInput);

        // Add event listener for when a user selects an address for dropoff location
        dropoffAutocomplete.addListener('place_changed', function() {
            var dropoffPlace = dropoffAutocomplete.getPlace();
            if (!dropoffPlace.geometry) {
                window.alert("No details available for input: '" + dropoffPlace.name + "'");
                return;
            }

            // Populate the latitude and longitude fields with the coordinates of the selected place for dropoff location
            document.getElementById('dropoff_lat').value = dropoffPlace.geometry.location.lat();
            document.getElementById('dropoff_long').value = dropoffPlace.geometry.location.lng();

            var dropoffMapUrl = "https://www.google.com/maps/search/?api=1&query=" + encodeURIComponent(dropoffPlace.formatted_address);

            // Populate the dropoff_url field with the generated URL for dropoff location
            document.getElementById('dropoff_url').value = dropoffMapUrl;
        });
    }
</script>
@endsection