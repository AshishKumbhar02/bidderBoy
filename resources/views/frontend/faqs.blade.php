@extends('frontend.layouts.main')

@section('page.breadcrumb')
<section class="inner_header">
  <div class="container">
    <ul class="breadcrumb breadcrumb list-inline justify-content-center">
      <li>
        <a href="{{url('')}}">Home</a>
      </li>
      <li> ></li>
      <li>Faqs</li>
    </ul>
    <h4 class="text-center">Faqs</h4>
  </div>
</section>
@endsection

@section('page.content')

<section class="tips_tricks para_test">
  <div class="container">
    <div class="row">
        <div class="col-md-12">
            @if($faqs)
                @foreach(json_decode($faqs) as $key => $val)
                    @foreach($val as $question => $answer)
                       <p><b>Q: </b>{{$question}}</p>
                       <p><b>A: </b>{{$answer}}</p>
                       <hr>
                    @endforeach                   
                @endforeach
            @endif
        </div>
    </div>
  </div>
</section>
@endsection

@section('page.script')
<script>
      
</script>
@endsection    