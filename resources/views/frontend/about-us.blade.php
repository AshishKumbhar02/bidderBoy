@extends('frontend.layouts.main')

@section('page.breadcrumb')
    <section class="inner_header">
        <div class="container">
            <ul class="breadcrumb breadcrumb list-inline justify-content-center">
                <li>
                    <a href="{{ url('') }}">Home</a>
                </li>
                <li> ></li>
                <li>About Us</li>
            </ul>
            <h4 class="text-center">About Us</h4>
        </div>
    </section>
@endsection

@section('page.content')
    <section class="tips_tricks para_test">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @php echo $about; @endphp
                </div>
            </div>
        </div>
    </section>
@endsection

@section('page.script')
    <script></script>
@endsection
