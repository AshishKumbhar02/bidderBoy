@extends('frontend.layouts.main')

@section('page.breadcrumb')
<section class="inner_header">
  <div class="container">
    <ul class="breadcrumb breadcrumb list-inline justify-content-center">
      <li>
        <a href="{{url('')}}">Home</a>
      </li>
      <li> ></li>
      <li>Top Up Credits</li>
    </ul>
    <h4 class="text-center">Top Up Credits</h4>
  </div>
</section>
@endsection

@section('page.content')

<section class="tips_tricks para_test">
  <div class="container">
    <div class="row">
        @php
        $bidPacks = DB::table('bids_packs')->get();
        @endphp
        @foreach($bidPacks as $row)
        <div class="col-md-3">
            <div class="card">
              <img class="card-img-top" src="{{url('public/storage/'.$row->image_path)}}" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">{{$row->package_name}}</h5>
                <p class="card-text">₹{{$row->cost}}</p>
                <a href="{{url('top-up-bid-credits/'.$row->id)}}" class="btn btn-primary">Buynow</a>
              </div>
            </div>
        </div>
        @endforeach
    </div>
  </div>
</section>
@endsection

@section('page.script')
<script>
      
</script>
@endsection