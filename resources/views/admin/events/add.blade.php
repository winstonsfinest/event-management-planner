@extends('admin.layouts.app')

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Events</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form method="post" action="https://sss.thefinestgroup.co.uk{{ route('admin.events.store', [], false) }}">
                {{ csrf_field() }}
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Add Event</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Event Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control" id="inputEmail3">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Client</label>
                            <div class="col-sm-10">
                                <select name="client_id" class="form-control select2">
                                    <option></option>
                                    @foreach(\App\Models\Client::all() as $client)
                                        <option value="{{ $client->id }}">{{ $client->business_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Date</label>
                            <div class="col-sm-10">
                                <input type="date" name="date" class="form-control" id="inputEmail3">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Location</label>
                            <div class="col-sm-10">
                                <select name="location_id" class="form-control select2">
                                    <option></option>
                                    @foreach(\App\Models\Location::all() as $location)
                                        <option value="{{ $location->id }}">{{ $location->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="event_style" class="col-sm-2 col-form-label">Event Style</label>
                            <div class="col-sm-10">
                                <input type="text" name="event_style" class="form-control" id="event_style">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Pax</label>
                            <div class="col-sm-10">
                                <input type="text" name="pax" class="form-control" id="inputEmail3">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Event Address</label>
                            <div class="col-sm-10">
                                <input type="text" name="address" class="form-control" id="inputEmail3">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Contact Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="contact_name" class="form-control" id="inputEmail3">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Mobile</label>
                            <div class="col-sm-10">
                                <input type="text" name="mobile" class="form-control" id="inputEmail3">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="text" name="email" class="form-control" id="inputEmail3">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Guest Arrive?</label>
                            <div class="col-sm-10">
                                <input type="time" name="guest_arrival_time" class="form-control" id="inputEmail3">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Our Arrival Time</label>
                            <div class="col-sm-10">
                                <input type="time" name="our_arrival_time" class="form-control" id="inputEmail3">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Full Timings List</label>
                            <div class="col-sm-10">
                                <textarea name="full_timing_list" class="form-control" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Location Instructions</label>
                            <div class="col-sm-10">
                                <textarea name="location_instruction" class="form-control" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Loading Bay Address</label>
                            <div class="col-sm-10">
                                <input type="text" name="loading_bay_address" class="form-control" id="inputEmail3">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Equipment Needed</label>
                            <div class="col-sm-10">
                                <select name="equipment_ids[]" class="form-control select2" multiple="multiple">
                                    @foreach(\App\Models\Equipment::all() as $equipment)
                                        <option value="{{ $equipment->id }}">{{ $equipment->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Prep Area Description</label>
                            <div class="col-sm-10">
                                <textarea name="prep_area_description" class="form-control" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Number Of Power</label>
                            <div class="col-sm-10">
                                <input type="text" name="number_of_power" class="form-control" id="inputEmail3">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Food Menu</label>
                            <div class="col-sm-10">
                                <select name="menu_item_ids[]" class="form-control select2" multiple="multiple">
                                    @foreach(\App\Models\MenuItem::all() as $menuItem)
                                        <option value="{{ $menuItem->id }}">{{ $menuItem->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Drinks Menu</label>
                            <div class="col-sm-10">
                                <textarea name="drinks_menu" class="form-control" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Staff</label>
                            <div class="col-sm-10">
                                <select name="staff_ids[]" class="form-control select2" multiple="multiple">
                                    @foreach(\App\Models\Staff::all() as $staff)
                                        <option value="{{ $staff->id }}">{{ $staff->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary float-sm-right">Submit</button>
                    </div>
                </div>
            </form>

        </section>
    </div>

@endsection
