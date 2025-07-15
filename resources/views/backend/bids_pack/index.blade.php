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
                    <h4 class="fw-semibold mb-8">Bids Packs</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="text-muted" href="{{url('admin/dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item" aria-current="page">Bids Packs</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-3">
                    <div class="text-center mb-n5">
                        <a href="{{route('product.add')}}" class="btn btn-primary btn-block"  data-bs-toggle="modal" data-bs-target="#addPackageModal">
                             Add Package
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
                                    <th>Package Name</th>
                                    <th>Credits Count</th>
                           
                                    <th>Cost</th>
                                    <th>Image</th>
                               
            
                                    <!--<th>Start Hour Auction</th>
                                    <th>Start Minute Auction</th>
                                    <th>Start Seconds Auction</th>
                                    <th>Delivery Information</th>-->
                                    
                                    <!--<th>Is Buynow</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>-->
                                    
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                   
                                @foreach($bids_packs as $bids_pack)
                             
                                <tr>
                                    <td>{{$bids_pack->id}}</td>
                                    <td>{{$bids_pack->package_name}}</td>
                                    <td>{{$bids_pack->total_credit}}</td>
                                    <td>{{$bids_pack->cost}}</td>
                                    <td>
                          <img src="{{ url('public/storage/' . $bids_pack->image_path) }}" width="100px" height="100px">

                           
                             </td>
                                    <td>
                                        <a onclick="edit_bidspack('<?php echo $bids_pack->id; ?>')" class="btn btn-primary btn-sm">Edit</a>
                                        <a href="{{route('bids_packs.delete', $bids_pack->id)}}" class="btn btn-danger btn-sm">Delete</a>
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

<!-- Modal -->
<div class="modal fade" id="addPackageModal" tabindex="-1" aria-labelledby="addPackageModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addPackageModalLabel">Add Package Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label for="packageName" class="form-label">Package Name</label>
            <input type="text" class="form-control" id="packageName" required>
          </div>
          <div class="mb-3">
            <label for="totalCredit" class="form-label">Total Credit</label>
            <input type="number" class="form-control" id="totalCredit" required>
          </div>
          <div class="mb-3">
            <label for="cost" class="form-label">Cost</label>
            <input type="number" class="form-control" id="cost" required>
          </div>
           <div class="mb-3">
    <label for="image" class="form-label">Image</label>
    <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
    <!-- 'accept="image/*"' ensures that only image files are allowed -->
  </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" onclick="savePackage()">Save Package</button>
      </div>
    </div>
  </div>
</div>

<!-- Edit Modal -->
<!-- Modal -->
<div class="modal fade" id="editPackageModal" tabindex="-1" aria-labelledby="editPackageModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editPackageModalLabel">Edit Package Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <input type="hidden" id="editPackageId">
          <div class="mb-3">
            <label for="editPackageName" class="form-label">Package Name</label>
            <input type="text" class="form-control" id="editPackageName" required>
          </div>
          <div class="mb-3">
            <label for="editTotalCredit" class="form-label">Total Credit</label>
            <input type="number" class="form-control" id="editTotalCredit" required>
          </div>
          <div class="mb-3">
            <label for="editCost" class="form-label">Cost</label>
            <input type="number" class="form-control" id="editCost" required>
          </div>
          <div class="mb-3">
            <label for="editImage" class="form-label">Image</label>
            <input type="file" class="form-control" id="editImage" name="editImage" accept="image/*">
            <!-- 'accept="image/*"' ensures that only image files are allowed -->
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" onclick="updatePackage()">Update Package</button>
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
    const editPackageModal = new bootstrap.Modal(document.getElementById("editPackageModal"));
    editPackageModal.hide();
  }
  function edit_bidspack(packageId)
  {

  // Replace 'your_fetch_endpoint_url' with the actual endpoint URL to fetch package details
      var fetchEndpointUrl ='{{ url('admin/bids_packs/edit/') }}/'+packageId ;
      // get laraavel maiun url
    


      $.ajax({
        url: fetchEndpointUrl,
        type: 'GET',
        dataType: 'json',
        success: function (response) {
          if (response.status === 'success' && response.data) {
            var data = response.data;
            // Set the received data to the edit form fields
            $('#editPackageId').val(data.id);
            $('#editPackageName').val(data.package_name);
            $('#editTotalCredit').val(data.total_credit);
            $('#editCost').val(data.cost);
            // Set the image preview (if you have an image element for preview)
            $('#editImagePreview').attr('src', data.image_path);
            //open editPackageModal
            const editPackageModal = new bootstrap.Modal(document.getElementById("editPackageModal"));
            editPackageModal.show();

          } else {
            console.error('Invalid server response:', response);
          }
        },
        error: function (xhr, status, error) {
          console.error('Error:', error);
          // Handle errors if the request fails
        }
      });

  }
  function savePackage() {
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
    const addPackageModal = new bootstrap.Modal(document.getElementById("addPackageModal"));
    addPackageModal.hide();
  }
</script>
@endsection

