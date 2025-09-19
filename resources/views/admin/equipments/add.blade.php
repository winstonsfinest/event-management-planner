@extends('admin.layouts.app')

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
            <form method="post" action="{{ route('admin.equipments.store') }}">
                {{ csrf_field() }}
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Add Equipment</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control" id="inputEmail3">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Section</label>
                            <div class="col-sm-10">
                                <select name="section_id" class="form-control">
                                    <option></option>
                                    @foreach(\App\Models\Section::all() as $section)
                                        <option value="{{ $section->id }}">{{ $section->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Type</label>
                            <div class="col-sm-10">
                                <select name="equipment_type_id" class="form-control">
                                    <option></option>
                                    @foreach(\App\Models\EquipmentType::all() as $equipment_type)
                                        <option value="{{ $equipment_type->id }}">{{ $equipment_type->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Specification</label>
                            <div class="col-sm-10">
                                <input type="text" name="specification" class="form-control" id="inputEmail3">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Notes</label>
                            <div class="col-sm-10">
                                <textarea name="notes" class="form-control" rows="5"></textarea>
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
