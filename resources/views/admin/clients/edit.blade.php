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
                        <h1>Clients</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">

            <form method="post" action="{{ route('admin.clients.store') }}">
                {{ csrf_field() }}
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ $isEdit ? 'Edit' : 'View' }} Client</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Business Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control"
                                       name="business_name"
                                       id="inputEmail3"
                                       value="{{ $client->business_name }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Business Address</label>
                            <div class="col-sm-10">
                                <input type="text" name="business_address" class="form-control" id="inputEmail3"
                                       value="{{ $client->business_address }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Contact Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="contact_name" class="form-control" id="inputEmail3"
                                       value="{{ $client->contact_name }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="contact_telephone" class="col-sm-2 col-form-label">Contact Telephone</label>
                            <div class="col-sm-10">
                                <input type="text" name="contact_telephone" class="form-control" id="contact_telephone"
                                       value="{{ $client->contact_telephone }}"
                                >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="contact_mobile" class="col-sm-2 col-form-label">Contact Mobile</label>
                            <div class="col-sm-10">
                                <input type="text" name="contact_mobile" class="form-control" id="contact_mobile"
                                       value="{{ $client->contact_mobile }}"
                                >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="contact_email" class="col-sm-2 col-form-label">Contact Email Address</label>
                            <div class="col-sm-10">
                                <input type="text" name="contact_email" class="form-control" id="contact_email"
                                       value="{{ $client->contact_email }}"
                                >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="other_contact" class="col-sm-2 col-form-label">Other Contact Details</label>
                            <div class="col-sm-10">
                                <input type="text" name="other_contact" class="form-control" id="other_contact"
                                       value="{{ $client->other_contact }}"
                                >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="invoice_address" class="col-sm-2 col-form-label">Invoice Address</label>
                            <div class="col-sm-10">
                                <input type="text" name="invoice_address" class="form-control" id="invoice_address"
                                       value="{{ $client->invoice_address }}"
                                >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="invoice_email" class="col-sm-2 col-form-label">Invoice Email</label>
                            <div class="col-sm-10">
                                <input type="text" name="invoice_email" class="form-control" id="invoice_email"
                                       value="{{ $client->invoice_email }}"
                                >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="payment_term" class="col-sm-2 col-form-label">Payment Terms</label>
                            <div class="col-sm-10">
                                <input type="text" name="payment_term" class="form-control" id="payment_term"
                                       value="{{ $client->payment_term }}"
                                >
                            </div>
                        </div>
                    </div>

                    @if($isEdit)
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary float-sm-right">Update</button>
                        </div>
                    @else
                        <div class="card-footer">
                            <a href="{{ route('admin.clients.edit', $client->id) }}"
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
