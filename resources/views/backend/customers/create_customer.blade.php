@extends('backend.layouts.main')

@section('page.content')
<div class="container-fluid">
   <div class="card bg-light-info shadow-none position-relative overflow-hidden">
      <div class="card-body px-4 py-3">
         <div class="row align-items-center">
            <div class="col-9">
               <h4 class="fw-semibold mb-8">Add Customer</h4>
               <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a class="text-muted" href="{{url('admin/dashboard')}}">Home</a></li>
                     <li class="breadcrumb-item" aria-current="page">Add Customer</li>
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
   
             <div class="col-md-8 col-sm-12">

   <div class="card">
      <div class="card-body">
            <form method="post" action="{{route('customers.createPost')}}" class="manage-profile-form">
                @csrf
                <div class="row g-3">
                    <div class="col-md-4 col-sm-12 p-2">
                        <label for="first_name">First Name <span class="text-danger">*</span></label>
                        <input type="text" name="first_name" id="first_name" class="form-control" placeholder="Enter Your First Name" required>
                    </div>
                    <div class="col-md-4 col-sm-12 p-2">
                        <label for="last_name">Last Name <span class="text-danger">*</span></label>
                        <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Enter Your Last Name" required>
                    </div>
                    <div class="col-md-4 col-sm-12 p-2">
                        <label for="username">User Name <span class="text-danger">*</span></label>
                        <input type="text" name="username" id="username" class="form-control" placeholder="Enter Your User Name" required>
                    </div>
                    <div class="col-md-4 col-sm-12 p-2">
                        <label for="mobNo">Mobile Number</label>
                        <input type="text" name="mobile_number" id="mobile_number" class="form-control" placeholder="Enter Your Mobile Number" required>
                    </div>
                    <div class="col-md-4 col-sm-12 p-2">
                        <label for="email">Email ID <span class="text-danger">*</span></label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Enter Your Email" required>
                    </div> 
                    <div class="col-md-4 col-sm-12 p-2">
                        <label for="credits">Credits <span class="text-danger">*</span></label>
                        <input type="text" name="credits" id="credits" class="form-control" required>
                    </div>                    
                    <div class="col-md-12 col-sm-12 p-2">
                        <label for="address">Address</label>
                        <textarea id="address" name="address" rows="3" cols="50" class="form-control" placeholder="your address" required></textarea>
                    </div>
                  <div class="col-md-6 col-sm-12 p-2">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Enter Your Password" required />
                  </div>
                  <div class="col-md-6 col-sm-12 p-2">
                    <label for="confirmPassword">Confirm Password</label>
                    <input type="password" name="password_confirmation" placeholder="Confirm Password" id="confirmPassword" class="form-control" required />
                  </div>                    
                    <div class="col-md-4 col-sm-12 p-2">
                        <button type="submit" class="btn btn-primary">CREATE</button>
                    </div>
                </div>

            </form>
      </div>
   </div>
    </div>
   
</div>
@endsection
@section('page.script')

@endsection