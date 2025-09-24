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
                        <h1>Staff</h1>
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

            <form method="post" action="https://sss.thefinestgroup.co.uk{{ $isEdit ? route('admin.staffs.update', $staff, false) : route('admin.staffs.store', [], false) }}">
                {{ csrf_field() }}
                @if($isEdit)
                    @method('PUT')
                @endif
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ $isEdit ? 'Edit' : 'View' }} Staff</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control" id="inputEmail3" value="{{ $staff->name }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="text" name="email" class="form-control" id="inputEmail3" value="{{ $staff->email }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Mobile</label>
                            <div class="col-sm-10">
                                <input type="text" name="mobile" class="form-control" id="inputEmail3" value="{{ $staff->mobile }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Location</label>
                            <div class="col-sm-10">
                                <select name="location_id" class="form-control">
                                    <option></option>
                                    @foreach(\App\Models\Location::all() as $location)
                                        <option
                                            value="{{ $location->id }}" {{ $staff->location_id == $location->id ? 'selected' : '' }}>{{ $location->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Hourly Rate</label>
                            <div class="col-sm-10">
                                <input type="text" name="hourly_rate" class="form-control" id="inputEmail3"
                                       value="{{ $staff->hourly_rate }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Section</label>
                            <div class="col-sm-10">
                                <select name="section_id" class="form-control">
                                    <option></option>
                                    @foreach(\App\Models\Section::all() as $section)
                                        <option value="{{ $section->id }}" {{ $staff->section_id == $section->id ? 'selected' : '' }}>{{ $section->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">M / F</label>
                            <div class="col-sm-10">
                                <select name="gender" class="form-control">
                                    <option></option>
                                    <option value="M" {{ $staff->gender == 'M' ? 'selected' : '' }}>M</option>
                                    <option value="F" {{ $staff->gender == 'F' ? 'selected' : '' }}>F</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Notes</label>
                            <div class="col-sm-10">
                                <textarea name="notes" class="form-control" rows="5">{{ $staff->notes }}</textarea>
                            </div>
                        </div>
                    </div>

                    @if($isEdit)
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary float-sm-right">Update</button>
                        </div>
                    @else
                        <div class="card-footer">
                            <a href="{{ route('admin.staffs.edit', $staff->id) }}"
                               class="btn btn-primary float-sm-right">Edit</a>
                        </div>
                    @endif
                </div>
            </form>
        </section>
    </div>

@endsection



@push('js')
    <script>
        @if(!$isEdit)
        $(".content :input").attr("disabled", true);
        @endif
    </script>
@endpush
