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
                        <h1>Equipment</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <form method="post" action="{{ route('admin.equipments.update', $equipment) }}">
                {{ csrf_field() }}
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ $isEdit ? 'Edit' : 'View' }} Equipment</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control" id="inputEmail3"
                                       value="{{ $equipment->name }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Section</label>
                            <div class="col-sm-10">
                                <select name="section_id" class="form-control">
                                    @foreach(\App\Models\Section::all() as $section)
                                        <option
                                            value="{{ $section->id }}" {{ $equipment->section_id == $section->id ? 'selected' : '' }}>{{ $section->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Type</label>
                            <div class="col-sm-10">
                                <select name="equipment_type_id" class="form-control">
                                    @foreach(\App\Models\EquipmentType::all() as $equipmentType)
                                        <option
                                            value="{{ $equipmentType->id }}" {{ $equipment->equipment_type_id == $equipmentType->id ? 'selected' : '' }}>{{ $equipmentType->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Specification</label>
                            <div class="col-sm-10">
                                <input type="text" name="specification" class="form-control" id="inputEmail3"
                                       value="{{ $equipment->specification }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Notes</label>
                            <div class="col-sm-10">
                                <textarea name="notes" class="form-control" rows="5">{{ $equipment->notes }}</textarea>
                            </div>
                        </div>
                    </div>

                    @if($isEdit)
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary float-sm-right">Update</button>
                        </div>
                    @else
                        <div class="card-footer">
                            <a href="{{ route('admin.equipments.edit', $equipment->id) }}"
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
