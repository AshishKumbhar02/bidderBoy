@extends('frontend.layouts.main')

@section('page.breadcrumb')
<section class="inner_header">
  <div class="container">
    <ul class="breadcrumb breadcrumb list-inline justify-content-center">
      <li>
        <a href="{{url('')}}">Home</a>
      </li>
      <li> ></li>
      <li>Referral</li>
    </ul>
    <h4 class="text-center">Referral</h4>
  </div>
</section>
@endsection

@section('page.content')
<section class="win_history">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="border_boxex">
          <h4>Referral</h4>
          <div class="nofound">
            <i class="fa fa-list" aria-hidden="true"></i>
            <h5>Sorry, No Record Found.</h5>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@section('page.script')
<script>
      
</script>
@endsection 