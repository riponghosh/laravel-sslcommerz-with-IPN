@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Custom Payment</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('custom/pay') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="cus_name" required autocomplete="name" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="cus_email" required autocomplete="email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cus_add1" class="col-md-4 col-form-label text-md-right">Address</label>

                            <div class="col-md-6">
                                <input id="cus_add1" type="cus_add1" class="form-control" name="cus_add1" required autocomplete="cus_add1">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cus_city" class="col-md-4 col-form-label text-md-right">City</label>

                            <div class="col-md-6">
                                <input id="cus_city" type="cus_city" class="form-control" name="cus_city" required autocomplete="cus_city">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cus_country" class="col-md-4 col-form-label text-md-right">Country</label>

                            <div class="col-md-6">
                                <input id="cus_country" type="cus_country" class="form-control" name="cus_country" required autocomplete="cus_country">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cus_phone" class="col-md-4 col-form-label text-md-right">Phone</label>

                            <div class="col-md-6">
                                <input id="cus_phone" type="cus_phone" class="form-control" name="cus_phone" required autocomplete="cus_phone">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Total amount</label>

                            <div class="col-md-6">
                                <input id="total_amount" type="text" class="form-control" name="total_amount" required autocomplete="total_amount" autofocus>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Pay
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
