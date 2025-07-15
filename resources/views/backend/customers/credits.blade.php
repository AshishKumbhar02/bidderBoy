@extends('backend.layouts.main')

@section('page.content')
<div class="container-fluid">
   <div class="card bg-light-info shadow-none position-relative overflow-hidden">
      <div class="card-body px-4 py-3">
         <div class="row align-items-center">
            <div class="col-9">
               <h4 class="fw-semibold mb-8">Credits Request</h4>
               <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a class="text-muted" href="{{url('admin/dashboard')}}">Home</a></li>
                     <li class="breadcrumb-item" aria-current="page">Credits Request</li>
                  </ol>
               </nav>
            </div>
            <div class="col-3">
               <div class="text-center mb-n5">  
                  <img src="../../dist/images/breadcrumb/ChatBc.png" alt="" class="img-fluid mb-n4">
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="card">
      <div class="card-body">
         <table id="myTable" class="table border table-striped table-bordered text-nowrap dataTable">
            <thead>
               <tr>
                  <th>Referral By</th>
                  <!-- <th>Reffered to</th> -->

                  <th>Credits</th>
                  <th>Status</th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody>
               @foreach($credits as $row)
               <tr>
                  <td>{{DB::table('users')->where('id', $row->user_id)->first()->name}}</td>
                                    <!--DB::table('users')->where('id', $row->referred_id)->first()->name-->

                  <td>{{$row->credits}}</td>
                  <td>
                      @if($row->status == 1)
                         Success
                      @else
                         Pending
                      @endif                      

                  </td>
                  <td>
                      @if( $row->status == 1 )
                          <a href="{{route('customers.update_credit_request', ['id'=> $row->id, 'status' => '0', 'credit' => '-'.$row->credits, 'user_id' => $row->user_id])}}">Disapprove</a>
                      @else
                          <a href="{{route('customers.update_credit_request', ['id'=> $row->id, 'status' => '1', 'credit' => $row->credits, 'user_id' => $row->user_id])}}">Approve</a>
                      @endif
                  </td>
               </tr>
               @endforeach
            </tbody>
         </table>
      </div>
   </div>
</div>
@endsection
@section('page.script')
<script>
   $(document).ready(function() {
       $('#myTable').DataTable();
   });
</script>
@endsection