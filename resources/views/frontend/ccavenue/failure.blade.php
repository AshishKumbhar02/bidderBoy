@extends('frontend.layouts.main')

@section('page.breadcrumb')
    <section class="inner_header">
        <div class="container">
            <ul class="breadcrumb breadcrumb list-inline justify-content-center">
                <li>
                    <a href="{{ url('') }}">Home</a>
                </li>
                <li> ></li>
                <li>Ccavenue Failure</li>
            </ul>
            <h4 class="text-center">Ccavenue Failure</h4>
        </div>
    </section>
@endsection

@section('page.content')
    <section class="mb-4">
        <div class="container">
            <div class="rounded bg-white px-3 pt-3 shadow-sm">
                <div class="row row-cols-xxl-12 row-cols-xl-12 row-cols-lg-12 row-cols-md-12 row-cols-12 gutters-10">
                    <div class="col text-center">
                        <h3>Your Order Code is <b>{{ $orderId }}</b></h3>
                        <p class="mb-0">{{ $message }}</p>
                        <p><b class="text-danger">Note:</b> If any amount is deducted by the payment gateway, the system
                            will confirm the order and you will receive an Email & SMS.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
