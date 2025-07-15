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
                    <h4 class="fw-semibold mb-8">Coupons</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="text-muted" href="{{url('admin/dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item" aria-current="page">Coupons</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-3">
                    <div class="text-center mb-n5">
                        <a href="{{route('product.add')}}" class="btn btn-primary btn-block"  data-bs-toggle="modal" data-bs-target="#addCouponModal">
                             Add Coupon
                            </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">

        <div class="card-header p-3">
         
        </div>

        <div class="card-body p-3">
            <div class="row">
                <div class="col-md-12">

                </div>
                <div class="col-md-12">
                    <div style1="overflow-x: scroll;">
                        <table id="userTable" class="table border table-striped table-bordered text-nowrap1 dataTable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Code</th>
                                    <th>Description</th>
                                    <th>Discount</th>
                                    <th>Discount Type</th>
                                    <th>Valid From</th>
                                    <th>Valid Until</th>
                                    <th>Total Usage</th>
                                    <th>Max Usage</th>
                                    <th>Is Enabled</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($coupons as $row)
                                    <tr>
                                        <td>{{$row->id}}</td>
                                        <td>{{$row->code}}</td>
                                        <td>{{$row->description}}</td>
                                        <td>{{$row->discount}}</td>
                                        <td>{{$row->discount_type}}</td>
                                        <td>{{$row->valid_from}}</td>
                                        <td>{{$row->valid_until}}</td>
                                        <td>{{$row->total_usage}}</td>
                                        <td>{{$row->max_usage}}</td>
                                        <td>{{$row->is_enabled ? 'Yes' : 'No'}}</td>
                                        <td>{{$row->created_at}}</td>
                                        <td>{{$row->updated_at}}</td>
                                        <td>
                                            <a onclick="edit_coupon('<?php echo $row->id; ?>')" class="btn btn-primary btn-sm">Edit</a>
                                            <a href="{{ route('coupon.delete', $row->id) }}" class="btn btn-danger btn-sm">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12 mt-3 pagination-container">
                   
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





{{-- //add model --}}

<div class="modal fade" id="addCouponModal" tabindex="-1" aria-labelledby="addCouponModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCouponModalLabel">Add Coupon Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('coupon.create') }}" id="addCouponForm">
                    @csrf
                    <div class="mb-3">
                        <label for="code" class="form-label">Code</label>
                        <input type="text" class="form-control" id="code" name="code" required>
                        <div class="invalid-feedback" id="code_error"></div>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="discount" class="form-label">Discount</label>
                        <input type="number" class="form-control" id="discount" name="discount" step="0.01" required>
                    </div>
                    <div class="mb-3">
                        <label for="discount_type" class="form-label">Discount Type</label>
                        <select class="form-control" id="discount_type" name="discount_type" required>
                            <option value="percentage">Percentage</option>
                            <option value="fixed">Fixed</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="valid_from" class="form-label">Valid From</label>
                        <input type="date" class="form-control" id="valid_from" name="valid_from" required>
                    </div>
                    <div class="mb-3">
                        <label for="valid_until" class="form-label">Valid Until</label>
                        <input type="date" class="form-control" id="valid_until" name="valid_until" required>
                    </div>
                    <div class="mb-3">
                        <label for="max_usage" class="form-label">Max Usage</label>
                        <input type="number" class="form-control" id="max_usage" name="max_usage" required>
                    </div>
                    <div class="mb-3">
                        <label for="is_enabled" class="form-label">Is Enabled</label>
                        <select class="form-control" id="is_enabled" name="is_enabled" required>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save Coupon</button>
                    </div>                    
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<!-- Modal -->
<div class="modal fade" id="editCouponModal" tabindex="-1" aria-labelledby="editCouponModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editCouponModalLabel">Edit Coupon Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="" id="editCouponForm">
                    @csrf
                    <input type="hidden" id="editCouponId" name="editCouponId">
                    <div class="mb-3">
                        <label for="editCode" class="form-label">Code</label>
                        <input type="text" class="form-control" id="editCode" name="editCode" required>
                        <div class="invalid-feedback" id="code_error"></div>
                    </div>
                    <div class="mb-3">
                        <label for="editDescription" class="form-label">Description</label>
                        <textarea class="form-control" id="editDescription" name="editDescription"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="editDiscount" class="form-label">Discount</label>
                        <input type="number" class="form-control" id="editDiscount" name="editDiscount" step="0.01"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="editDiscountType" class="form-label">Discount Type</label>
                        <select class="form-control" id="editDiscountType" name="editDiscountType" required>
                            <option value="percentage">Percentage</option>
                            <option value="fixed">Fixed</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="editValidFrom" class="form-label">Valid From</label>
                        <input type="date" class="form-control" id="editValidFrom" name="editValidFrom" required>
                    </div>
                    <div class="mb-3">
                        <label for="editValidUntil" class="form-label">Valid Until</label>
                        <input type="date" class="form-control" id="editValidUntil" name="editValidUntil" required>
                    </div>
                    <div class="mb-3">
                        <label for="editMaxUsage" class="form-label">Max Usage</label>
                        <input type="number" class="form-control" id="editMaxUsage" name="editMaxUsage">
                    </div>
                    <div class="mb-3">
                        <label for="editIsEnabled" class="form-label">Is Enabled</label>
                        <select class="form-control" id="editIsEnabled" name="editIsEnabled" required>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Update Coupon</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



@endsection
@section('page.script')

<script>
  function  updatePackage()
  {
    // Retrieve values from the form fields
    const packageName = document.getElementById("editPackageName").value;
    const totalCredit = document.getElementById("editTotalCredit").value;
    const cost = document.getElementById("editCost").value;
    const packageId = document.getElementById("editPackageId").value;

    // add it with formdata
    var formData = new FormData();
    formData.append('packageName', packageName);
    formData.append('totalCredit', totalCredit);
    formData.append('cost', cost);

    // Check if the image is set or not
    if ($('#editImage')[0].files[0]) {
      formData.append('image', $('#editImage')[0].files[0]);
    }
    
    formData.append('_token', "{{ csrf_token() }}");

    // Perform any additional processing or validation here
    //submit data to server to create controller
     var fetchEndpointUrl = 'bids_packs/update/' + packageId;
    $.ajax({
      url: fetchEndpointUrl,
      type: "POST",
      data: formData,
      processData: false,
      contentType: false,
      success: function(response) {
        // Handle the response object
        console.log(response);
        if (response.status == 'success') {
          // Reload the page
          location.reload();
        }
      },
      error: function(response) {
        // Handle error
        console.log(response);
      }
    });

    // Close the modal
    const editCouponModal = new bootstrap.Modal(document.getElementById("editCouponModal"));
    editCouponModal.hide();
  }
  
    function edit_coupon(CouponId)
    {
      var fetchEndpointUrl = "{{ url('admin/coupon/edit') }}/" + CouponId;
      
      $.ajax({
        url: fetchEndpointUrl,
        type: 'GET',
        dataType: 'json',
        success: function(response) {
          if (response.status === 'success' && response.data) {
            var data = response.data;
    
            // Set the received data to the edit form fields
            $('#editCouponId').val(data.id);
            $('#editCode').val(data.code);
            $('#editDescription').val(data.description);
            $('#editDiscount').val(data.discount);
            $('#editDiscountType').val(data.discount_type);
            $('#editValidFrom').val(data.valid_from);
            $('#editValidUntil').val(data.valid_until);
            $('#editMaxUsage').val(data.max_usage);
            $('#editIsEnabled').val(data.is_enabled);
            $('#editCouponForm').attr('action', 'coupon/update/'+data.id);
    
            // Open editCouponModal
            const editCouponModal = new bootstrap.Modal(document.getElementById("editCouponModal"));
            editCouponModal.show();
          } else {
            console.error('Invalid server response:', response);
          }
        },
        error: function(xhr, status, error) {
          console.error('Error:', error);
          // Handle errors if the request fails
        }
      });
    }
  
  /*function savePackage() {
    // Retrieve values from the form fields
    const packageName = document.getElementById("packageName").value;
    const totalCredit = document.getElementById("totalCredit").value;
    const cost = document.getElementById("cost").value;

    // add it with formdata
    var formData = new FormData();
    formData.append('packageName', packageName);
    formData.append('totalCredit', totalCredit);
    formData.append('cost', cost);
    formData.append('image', $('#image')[0].files[0]);
    formData.append('_token', "{{ csrf_token() }}");


    // Perform any additional processing or validation here
    //submit data to server to create controller
    $.ajax({
      url: "{{route('bids_packs.create')}}",
      type: "POST",
      data: formData,
      processData: false,
      contentType: false,
      success: function(response) {
        // Handle the response object
        console.log(response);
        if (response.status == 'success') {
          // Reload the page
          location.reload();
        }
      },
      error: function(response) {
        // Handle error
        console.log(response);
      }
    });

    // Close the modal
    const addCouponModal = new bootstrap.Modal(document.getElementById("addCouponModal"));
    addCouponModal.hide();
  }*/
  
$(document).ready(function() {
    $("#addCouponForm").submit(function(event) {
        // Prevent default form submission
        event.preventDefault();
        
        // Serialize the form data
        var formData = $(this).serialize();

        // Perform AJAX submission
        $.ajax({
            url: $(this).attr("action"), // Get the form action attribute
            type: "POST",
            data: formData,
            dataType: "json", // Assuming you expect JSON response
            success: function(response) {
                // Handle the response object
                console.log(response);
                if (response.status == 'success') {
                    location.reload();
                }
            },
            error: function(response) {
                // Handle error
                console.log(response);
                
                if (response.responseJSON && response.responseJSON.errors) {
                    // Display validation errors to the user
                    var errors = response.responseJSON.errors;
                    for (var field in errors) {
                        var errorMessage = errors[field][0]; // Assuming you want to display only the first error
                        $("#" + field).addClass("is-invalid");
                        $("#" + field + "_error").html(errorMessage);
                    }
                }
            }
        });
    });
});

$(document).ready(function() {
    $("#editCouponForm").submit(function(event) {
        // Prevent default form submission
        event.preventDefault();
        
        // Serialize the form data
        var formData = $(this).serialize();
        var form = $(this);

        // Perform AJAX submission
        $.ajax({
            url: form.attr('action'),
            type: "POST",
            data: formData,
            dataType: "json", // Assuming you expect JSON response
            success: function(response) {
                // Handle the response object
                console.log(response);
                if (response.status === 'success') {
                    // Reload the page or update the coupon in the table
                    location.reload(); // or update the coupon in the table
                }
            },
            error: function(response) {
                // Handle error
                console.log(response);
                if (response.responseJSON && response.responseJSON.errors) {
                    // Handle validation errors
                    var errors = response.responseJSON.errors;
                    $.each(errors, function(field, messages) {
                        // Display validation error messages next to the corresponding fields
                        $('#' + field).addClass('is-invalid');
                        $('#' + field + '_error').html(messages[0]).show();
                    });
                }
            }
        });
    });
});
</script>
@endsection

