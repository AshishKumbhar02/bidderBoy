@extends('frontend.layouts.main')

@section('page.breadcrumb')
    <section class="inner_header">
        <div class="container">
            <ul class="breadcrumb breadcrumb list-inline justify-content-center">
                <li>
                    <a href="{{ url('') }}">Home</a>
                </li>
                <li> ></li>
                <li>Winner</li>
            </ul>
            <h4 class="text-center">Winner</h4>
        </div>
    </section>
@endsection

@section('page.content')
    <section class="tips_tricks para_test">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p class="text-center">Coming soon</p>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('page.script')
    <script></script>
@endsection
