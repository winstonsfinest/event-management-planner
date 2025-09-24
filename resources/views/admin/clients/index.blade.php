@extends('admin.layouts.app')

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Clients</h1>
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
                    <h3 class="card-title">Client List</h3>

                    <div class="card-tools">
                        <a href="{{ route('admin.clients.add') }}" class="btn btn-primary float-end">Add Client</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped dataTable" data-order="[[ 1, &quot;desc&quot; ]]">
                        <thead>
                        <tr>
                            <th scope="col">Client Name</th>
                            <th scope="col">Address</th>
                            <th scope="col">Contact</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($clients as $client)
                            <tr>
                                <td>{{ $client->business_name }}</td>
                                <td>{{ $client->business_address }}</td>
                                <td>{{ $client->contact_name }}</td>
                                <td>
                                    <a class="btn btn-sm btn-primary"
                                       href="{{ route('admin.clients.edit', $client) }}">Edit</a>
                                    <a class="btn btn-sm btn-primary"
                                       href="{{ route('admin.clients.show', $client) }}">View</a>
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
