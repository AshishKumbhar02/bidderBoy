@extends('frontend.layouts.main')

@section('page.breadcrumb')
    <section class="inner_header">
        <div class="container">
            <ul class="breadcrumb breadcrumb list-inline justify-content-center">
                <li>
                    <a href="{{ url('') }}">Home</a>
                </li>
                <li> ></li>
                <li>Privacy Policy</li>
            </ul>
            <h4 class="text-center">Privacy Policy</h4>
        </div>
    </section>
@endsection

@section('page.content')
    <section class="tips_tricks para_test">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @php echo $privacy_policy; @endphp
                </div>
            </div>
        </div>
    </section>
@endsection

@section('page.script')
    <script></script>
@endsection
