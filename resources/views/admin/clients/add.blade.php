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

            <form method="post" action="https://sss.thefinestgroup.co.uk{{ route('admin.clients.store', [], false) }}">
                {{ csrf_field() }}
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Add Client</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Business Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="business_name" class="form-control" id="inputEmail3" value="{{ old('business_name') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Business Address</label>
                            <div class="col-sm-10">
                                <input type="text" name="business_address" class="form-control" id="inputEmail3">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Contact Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="contact_name" class="form-control" id="inputEmail3">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Contact Telephone</label>
                            <div class="col-sm-10">
                                <input type="text" name="contact_telephone" class="form-control" id="inputEmail3">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Contact Mobile</label>
                            <div class="col-sm-10">
                                <input type="text" name="contact_mobile" class="form-control" id="inputEmail3">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Contact Email Address</label>
                            <div class="col-sm-10">
                                <input type="text" name="contact_email" class="form-control" id="inputEmail3">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Other Contact Details</label>
                            <div class="col-sm-10">
                                <input type="text" name="other_contact" class="form-control" id="inputEmail3">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Invoice Address</label>
                            <div class="col-sm-10">
                                <input type="text" name="invoice_address" class="form-control" id="inputEmail3">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Invoice Email</label>
                            <div class="col-sm-10">
                                <input type="text" name="invoice_email" class="form-control" id="inputEmail3">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Payment Terms</label>
                            <div class="col-sm-10">
                                <input type="text" name="payment_term" class="form-control" id="inputEmail3">
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
