@extends('frontend.layouts.main')

@section('page.breadcrumb')
<section class="inner_header">
  <div class="container">
    <ul class="breadcrumb breadcrumb list-inline justify-content-center">
      <li>
        <a href="{{url('')}}">Home</a>
      </li>
      <li> ></li>
      <li>Manage Auto Bid</li>
    </ul>
    <h4 class="text-center">Manage Auto Bid</h4>
  </div>
</section>
@endsection

@section('page.content')
<section class="account_section">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="table-responsive">
          <table class="table bid_history">
            <tbody>
              <tr class="hed_back">
                <th colspan="7" class="text-center">Manage Auto Bid</th>
              </tr>
              <tr>
                <th>Auction ID</th>
                <th>Product Name </th>
                <th>Max Bid Count </th>
                <th>Remaining Bid Count </th>
                <th>Bid Start at Rs </th>
                <th>Status</th>
                <th></th>
              </tr>
              <tr>
                <td>BB34963</td>
                <td>huami Amazfit Pace Smartwatch</td>
                <td>1</td>
                <td>10</td>
                <td>
                  <i class="fa fa-inr" aria-hidden="true"></i> 20.00
                </td>
                <td>Active</td>
                <td>
                  <a title="Edit" class="btn btn-warning btn-xs" href="#">
                    <i class="fa fa-edit"></i>
                  </a>
                  <a title="Delete" class="btn btn-danger btn-xs" href="#">
                    <i class="fa fa-trash-o"></i>
                  </a>
                </td>
              </tr>
            </tbody>
          </table>
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