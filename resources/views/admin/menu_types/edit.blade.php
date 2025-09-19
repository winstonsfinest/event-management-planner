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
                        <h1>Menu Types</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">

            <form method="post" action="{{ route('admin.menu_types.update', $menuType) }}">
                {{ csrf_field() }}
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ $isEdit ? 'Edit' : 'View' }} Menu Type</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Menu Type Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control" id="name" value="{{ $menuType->name }}">
                            </div>
                        </div>
                    </div>

                    @if($isEdit)
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary float-sm-right">Update</button>
                        </div>
                    @else
                        <div class="card-footer">
                            <a href="{{ route('admin.menu_types.edit', $menuType->id) }}"
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
