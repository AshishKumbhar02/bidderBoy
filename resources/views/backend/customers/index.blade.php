@extends('backend.layouts.main')

<style>
    #userTable th {
        font-size: 12px;
        padding: 5px;
    }

    #userTable td {
        font-size: 12px;
        padding: 5px;
    }

    .pagination-container svg {
        height: 20px;
    }
    
    #userTable .btn {
        font-size: 12px;
        padding: 5px;
        margin-bottom: 5px;
    }    
</style>

@section('page.content')
<div class="container-fluid">
    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">Customers</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="text-muted" href="{{url('admin/dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item" aria-current="page">Customers</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-3">
                    <div class="text-center mb-n5">
                        <a href="{{route('customers.create')}}" class="btn btn-primary btn-block">
                                Add Customer
                            </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">

        <div class="card-header p-3">
            <form action="" method="get" class="">
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" placeholder="Name" value="{{$param['name']}}">
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="form-group">
                            <input type="text" name="username" class="form-control" placeholder="Username" value="{{$param['username']}}">
                        </div>
                    </div>                    
                    <div class="col-md-3 mb-3">
                        <div class="form-group">
                            <input type="text" name="email" class="form-control" placeholder="Email" value="{{$param['email']}}">
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="form-group">
                            <input type="text" name="mobile_number" class="form-control" placeholder="Phone" value="{{$param['mobile_number']}}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="text" name="ip_address" class="form-control" placeholder="IP Address" value="{{$param['ip_address']}}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <select name="is_active" class="form-control">
                                <option value="">--select status--</option>
                                <option value="active" @if($param['is_active'] == 'active') selected @endif>Active</option>
                                <option value="inactive" @if($param['is_active'] == 'inactive') selected @endif>Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block" style="width: 100%;">Filter</button>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="form-group">
                            <a href="{{url('admin/customers')}}" class="btn btn-primary btn-block"><i style="font-size: 21px;" class="fa-solid fa-refresh"></i></a>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="form-group">
                            <a href="{{ route('export.allCustomers', request()->input()) }}" class="btn btn-primary btn-block">
                                <i style="font-size: 21px;" class="fa-solid fa-file-export"></i>
                            </a>                            
                        </div>
                    </div>                    
                    <!-- <div class="col-md-1">
                        <div class="form-group">
                            <a href="{{ route('export.allCustomers', request()->input()) }}" class="btn btn-primary btn-block">
                                <i style="font-size: 21px;" class="fa-solid fa-file-export"></i>
                            </a>
                        </div>
                    </div> -->                   
                </div>
            </form>
        </div>

        <div class="card-body p-3">
            <div class="row">
                <div class="col-md-12">

                </div>
                <div class="col-md-12">
                    <table id="userTable" class="table border table-striped table-bordered text-nowrap1 dataTable">
                        <thead>
                            <tr>
                                <th class="t-head">ID</th>
                                <th class="t-head">First Name</th>
                                <th class="t-head">Last Name</th>
                                <th class="t-head">Username</th>
                                <th class="t-head">Email</th>
                                <th class="t-head">Phone</th>
                                <!--<th>KYC Document</th>
                  <th>KYC Document Status</th>-->
                                <th class="t-head">Status</th>
                                <th class="t-head">Credit</th>
                                <th class="t-head">IP</th>
                                <th class="t-head">DOJ</th>
                                <th class="t-head">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($customers as $row)
                            <tr>
                                <td>{{$row->id}}</td>
                                <td>{{$row->first_name}}</td>
                                <td>{{$row->last_name}}</td>
                                <td>{{$row->username}}</td>
                                <td>{{$row->email}}</td>
                                <td>{{$row->mobile_number}}</td>
                                <!--<td>
                      @if($row->kyc_document)
                      <a target="_blank" href="{{url('public/uploads/users/kyc_document/'.$row->kyc_document)}}">View</a>
                      @endif
                  </td>
                  <td>
                      @if($row->kyc_document_verification == 1)
                         Verified
                      @else
                         Pending
                      @endif                      

                  </td>-->
                                <td class="row-data">{{ $row->is_active ? 'Active' : 'Inactive' }}</td>
                                <td>{{$row->credits}}</td>
                                <td>{{$row->ip_address}}</td>
                                <td>{{date('d M Y', strtotime($row->created_at))}}</td>
                                <td>
                                    <a href="{{route('customers.edit_customer', $row->id)}}" class="btn btn-success"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                    @if( $row->kyc_document_verification == 1 && !empty($row->kyc_document) )
                                    <a class="btn btn-warning" href="{{route('customers.update_kyc_ducument_status', ['id'=> $row->id, 'status' => '0'])}}" title="Disapprove KYC"><i class="fa fa-key" aria-hidden="true"></i></a>
                                    @elseif( $row->kyc_document_verification == 0 && !empty($row->kyc_document) )
                                    <a class="btn btn-primary" href="{{route('customers.update_kyc_ducument_status', ['id'=> $row->id, 'status' => '1'])}}" title="Approve KYC"><i class="fa fa-key" aria-hidden="true"></i></a>
                                    @endif
                                    @if( $row->is_active == 1 )
                                    <a style="background: red; border: none;" class="btn btn-primary" href="{{route('customers.update_customer_status', ['id'=> $row->id, 'status' => '0'])}}" title="Deactivate"><i class="fa fa-lock" aria-hidden="true"></i></a>
                                    @else
                                    <a style="background: blue; border: none;" class="btn btn-primary" href="{{route('customers.update_customer_status', ['id'=> $row->id, 'status' => '1'])}}" title="Activate"><i class="fa fa-unlock" aria-hidden="true"></i></a>
                                    @endif
                                    
                                    <a style="background: red; border: none;" class="btn btn-primary" href="{{route('customers.delete', $row->id)}}" onclick="return confirm('Are you sure?')"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="col-md-12 mt-3 pagination-container">
                        {{ $customers->appends(request()->input())->links() }}
                        <!-- $customers->appends(request()->input())->links('vendor.pagination.bootstrap-4') -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>










@endsection
@section('page.script')
<script>
    /*$(document).ready(function() {
       $('#myTable').DataTable();
   });*/
</script>
@endsection