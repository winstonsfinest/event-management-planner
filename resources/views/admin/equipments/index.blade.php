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

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Equipment List</h3>

                    <div class="card-tools">
                        <a href="{{ route('admin.equipments.add') }}" class="btn btn-primary float-end">Add Equipment</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped dataTable" data-order="[[ 1, &quot;desc&quot; ]]">
                        <thead>
                        <tr>
                            <th scope="col">Equipment Item</th>
                            <th scope="col">Section</th>
                            <th scope="col">Type</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($equipments as $equipment)
                            <tr>
                                <td>{{ $equipment->name }}</td>
                                <td>{{ $equipment->section->name ?? '' }}</td>
                                <td>{{ $equipment->equipment_type->name ?? '' }}</td>
                                <td>
                                    <a class="btn btn-sm btn-primary"
                                       href="{{ route('admin.equipments.edit', $equipment) }}">Edit</a>
                                    <a class="btn btn-sm btn-primary"
                                       href="{{ route('admin.equipments.show', $equipment) }}">View</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </section>
    </div>

@endsection
