@extends('admin.layouts.app')

@php
    $isEdit = isset($isEdit) ? $isEdit : false;
@endphp

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

        <section class="content" id="to-print">

            <form method="post" action="{{ route('admin.events.update', $event) }}">
                {{ csrf_field() }}
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ $isEdit ? 'Edit' : 'View' }} Event</h3>
                    </div>
                    <div class="card-body" id="event-section">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Event Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control" id="inputEmail3"
                                       value="{{ $event->name }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Client</label>
                            <div class="col-sm-10">
                                <select name="client_id" class="form-control">
                                    <option></option>
                                    @foreach(\App\Models\Client::all() as $client)
                                        <option
                                            value="{{ $client->id }}" {{ $event->client_id == $client->id ? 'selected' : '' }}>{{ $client->business_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Date</label>
                            <div class="col-sm-10">
                                <input type="date" name="date" class="form-control" id="inputEmail3"
                                       value="{{ $event->date }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Location</label>
                            <div class="col-sm-10">
                                <select name="location_id" class="form-control select2">
                                    <option></option>
                                    @foreach(\App\Models\Location::all() as $location)
                                        <option
                                            value="{{ $location->id }}" {{ $event->location_id == $location->id ? 'selected' : '' }}>{{ $location->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Event Style</label>
                            <div class="col-sm-10">
                                <input type="text" name="event_style" class="form-control" id="inputEmail3"
                                       value="{{ $event->event_style }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Pax</label>
                            <div class="col-sm-10">
                                <input type="text" name="pax" class="form-control" id="inputEmail3"
                                       value="{{ $event->pax }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Event Address</label>
                            <div class="col-sm-10">
                                <input type="text" name="address" class="form-control" id="inputEmail3"
                                       value="{{ $event->address }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Contact Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="contact_name" class="form-control" id="inputEmail3"
                                       value="{{ $event->contact_name }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Mobile</label>
                            <div class="col-sm-10">
                                <input type="text" name="mobile" class="form-control" id="inputEmail3"
                                       value="{{ $event->mobile }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="text" name="email" class="form-control" id="inputEmail3"
                                       value="{{ $event->email }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Guest Arrive?</label>
                            <div class="col-sm-10">
                                <input type="time" name="guest_arrival_time" class="form-control" id="inputEmail3"
                                       value="{{ $event->guest_arrival_time }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Our Arrival Time</label>
                            <div class="col-sm-10">
                                <input type="time" name="our_arrival_time" class="form-control" id="inputEmail3"
                                       value="{{ $event->our_arrival_time }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Full Timings List</label>
                            <div class="col-sm-10">
                            <textarea name="full_timing_list" class="form-control"
                                      rows="3">{{ $event->full_timing_list }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Location Instructions</label>
                            <div class="col-sm-10">
                            <textarea name="location_instruction" class="form-control"
                                      rows="3">{{ $event->location_instruction }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Loading Bay Address</label>
                            <div class="col-sm-10">
                                <input type="text" name="loading_bay_address" class="form-control" id="inputEmail3"
                                       value="{{ $event->loading_bay_address }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Equipment Needed</label>
                            <div class="col-sm-10">
                                <select name="equipment_ids[]" class="form-control select2" multiple="multiple">
                                    @foreach(\App\Models\Equipment::all() as $equipment)
                                        <option
                                            value="{{ $equipment->id }}" {{ $event->equipments->where('id', $equipment->id)->count() ? 'selected' : '' }}>{{ $equipment->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Prep Area Description</label>
                            <div class="col-sm-10">
                            <textarea name="prep_area_description" class="form-control"
                                      rows="3">{{ $event->prep_area_description }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Number Of Power</label>
                            <div class="col-sm-10">
                                <input type="text" name="number_of_power" class="form-control" id="inputEmail3"
                                       value="{{ $event->number_of_power }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Food Menu</label>
                            <div class="col-sm-10">
                                <select name="menu_item_ids[]" class="form-control select2" multiple="multiple">
                                    @foreach(\App\Models\MenuItem::all() as $menuItem)
                                        <option
                                            value="{{ $menuItem->id }}" {{ $event->menu_items->where('id', $menuItem->id)->count() ? 'selected' : '' }}>{{ $menuItem->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Drinks Menu</label>
                            <div class="col-sm-10">
                            <textarea name="drinks_menu" class="form-control"
                                      rows="5">{{ $event->drinks_menu }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Staff</label>
                            <div class="col-sm-10">
                                <select name="staff_ids[]" class="form-control select2" multiple="multiple">
                                    @foreach(\App\Models\Staff::all() as $staff)
                                        <option
                                            value="{{ $staff->id }}" {{ $event->staffs->where('id', $staff->id)->count() ? 'selected' : '' }}>{{ $staff->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">

                        <a type="button" class="btn btn-info" onclick="printDiv('event-section')">Print Plan</a>
                        <a type="button" class="btn btn-info" onclick="printDiv('shopping-section')">Print Shopping List</a>
                        @if($isEdit)
                            <button type="submit" class="btn btn-primary float-sm-right">Update</button>
                        @else
                            <a href="{{ route('admin.events.edit', $event->id) }}"
                               class="btn btn-primary float-sm-right">Edit</a>
                        @endif
                    </div>

                </div>
            </form>


            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Shopping List</h3>
                </div>
                <div class="card-body" id="shopping-section">
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Event Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control" id="inputEmail3"
                                   disabled
                                   value="{{ $event->name }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Pax</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control" id="inputEmail3"
                                   disabled
                                   value="{{ $event->pax }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Food Menu</label>
                        <div class="col-sm-10">
                            @foreach($event->menu_items as $menuItem)
                                <input type="text" name="name" class="form-control" id="inputEmail3"
                                       disabled="disabled"
                                       value="{{ $menuItem->name }}">
                            @endforeach
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Ingredients</label>
                        <div class="col-sm-10">
                            <div class="row">
                                @foreach($event->menu_items as $menuItem)
                                    @foreach($menuItem->ingredients as $ingredient)
                                        <input type="hidden" class="form-control"
                                               id="inputEmail3" value="{{ $ingredient->id ?? '' }}" disabled>

                                        <div class="col-8">
                                            <input type="text" class="form-control"
                                                   disabled
                                                   id="inputEmail3" value="{{ $ingredient->name ?? '' }}">
                                        </div>
                                        <div class="col-2">
                                            <input type="text" class="form-control" disabled
                                                   id="inputEmail3" value="{{ ceil(($ingredient->weight??0) / 10 * ($event->pax??0)) ?? 'unable to calculate' }}">
                                        </div>
                                        <div class="col-2">
                                            <input type="text" class="form-control" disabled
                                                   id="inputEmail3" value="{{ $ingredient->unit ?? '' }}">
                                        </div>
                                    @endforeach
                                @endforeach
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </section>
    </div>

@endsection



@push('js')
    <script>
        @if(!$isEdit)
        $(".content :input").attr("disabled", true);
        @endif


        function printDiv(divId) {
            let printContents = document.getElementById(divId).innerHTML;
            let originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script>
@endpush
