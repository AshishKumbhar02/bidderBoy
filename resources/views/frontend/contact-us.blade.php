@extends('frontend.layouts.main')

@section('page.breadcrumb')
    <section class="inner_header">
        <div class="container">
            <ul class="breadcrumb breadcrumb list-inline justify-content-center">
                <li>
                    <a href="{{ url('') }}">Home</a>
                </li>
                <li> ></li>
                <li>Contact Us</li>
            </ul>
            <h4 class="text-center">Contact Us</h4>
        </div>
    </section>
@endsection

@section('page.content')
    <section class="tips_tricks para_test">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p><b>Email:</b> {{ $contact->contact_email }}</p>
                    <p><b>Phone:</b> {{ $contact->contact_phone }}</p>
                    <p><b>Address:</b> {{ $contact->address }}</p>
                    <p><b>Facebook Url:</b> {{ $contact->facebook_url }}</p>
                    <p><b>Twitter Url:</b> {{ $contact->twitter_url }}</p>
                    <p><b>Youtube Url:</b> {{ $contact->youtube_url }}</p>
                    <p><b>LinkedIn Url:</b> {{ $contact->linkedin_url }}</p>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('page.script')
    <script></script>
@endsection
