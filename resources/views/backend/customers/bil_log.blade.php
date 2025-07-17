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
                                <li class="breadcrumb-item"><a class="text-muted" href="{{ url('admin/dashboard') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">Customers</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-3">
                        <div class="text-center mb-n5">
                            <a href="{{ route('customers.create') }}" class="btn btn-primary btn-block">
                                Add Customer
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="card">



            <div class="card-body p-3">
                <div class="row">
                    <div class="col-md-12">

                    </div>
                    <div class="col-md-12">
                        <table id="userTable" class="table border table-striped table-bordered text-nowrap1 dataTable">
                            <thead>
                                <tr>
                                    <th class="t-head">ID</th>
                                    <th class="t-head">User ID</th>
                                    <th class="t-head">Product ID</th>
                                    <th class="t-head">Bid Amount</th>
                                    <th class="t-head">Bid Credit</th>
                                    <th class="t-head">Created At</th>
                                    <th class="t-head">Updated At</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $row)
                                    <tr>
                                        <td>{{ $row->id }}</td>
                                        <td>{{ $row->user_id }}</td>
                                        <td>{{ $row->product_id }}</td>
                                        <td>{{ $row->bid_amount }}</td>
                                        <td>{{ $row->bid_credit }}</td>
                                        <td>{{ $row->created_at }}</td>
                                        <td>{{ $row->updated_at }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="col-md-12 mt-3 pagination-container">

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
