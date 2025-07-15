@extends('frontend.layouts.main')

@section('page.content')
 <style>
   .top_baar {
     display: none;
   }

   header#header {
     display: none;
   }

   section.footer_sections {
     display: none;
   }

.modal-title {
  font-size: 1.8rem;
  font-weight: 700;
  background: linear-gradient(to right, #6a11cb, #2575fc); 
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  text-align: center;
}

#registration_form .modal-dialog {
  margin-top: 55px; 
}

#forgotPasswordModal .modal-content {
  padding: 2rem;
  border-radius: 0.75rem;
  background: #ffffff;
  box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.2);
  border: 1px solid #e0e0e0;
}

#forgotPasswordModal .modal-title {
  font-size: 1.5rem;
  font-weight: 600;
  color: #333;
}

#forgotPasswordModal .form-control {
  height: 45px;
  font-size: 1rem;
  border-radius: 0.5rem;
  border: 1px solid #ccc;
}

#forgotPasswordModal .btn-primary {
  background-color: #0044ff;
  border: none;
  padding: 0.6rem 1.2rem;
  font-size: 1rem;
  border-radius: 0.5rem;
  font-weight: 500;
}

#forgotPasswordModal .modal-dialog {
  margin-top: 2vh !important; /* moves it further up */
  transform: translateY(-22%);
}

.login_page p a.thembo {
    font-weight: 600;
    text-decoration: none !important;
    margin-left: 5px;
    cursor: pointer; 
}


 </style>
 <div class="login_page">
   <div class="container">
     <div class="row">
       <div class="col-lg-12">
         <div class="form-section">
           <div class="form-inner">
             <a href="{{url('/')}}" class="logo">
               <img src="{{ asset('assets/front/img/logo.png') }}" alt="Logo" style="max-width: 200px;">
             </a>
             <h3>Sign Into Your Account</h3>
             <form action="{{ route('authenticate') }}" method="post">
                @csrf
               <div class="form-group form-box clearfix">
                 <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="Username Or Email ID" required>
               @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                </div>
               <div class="form-group form-box clearfix">
                 <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" autocomplete="off" placeholder="Password" required>
             
                </div>
               <div class="checkbox form-group clearfix">
                 <div class="form-check float-start">
                   <input class="form-check-input" type="checkbox" id="rememberme">
                   <label class="form-check-label" for="rememberme"> Remember me </label>
                 </div>
                 <a href="#"  data-bs-toggle="modal" data-bs-target="#forgotPasswordModal" class="link-light float-end forgot-password pddtop13">Forgot your password?</a>
               </div>
               <div class="form-group">
                 <button type="submit" value="Login" class="btn btn-primary btn-lg btn-theme">
                   <span>Login</span>
                 </button>
               </div>
               <div class="extra-login form-group clearfix">
                 <span>Or Login With</span>
               </div>
             </form>
             <div class="clearfix"></div>
             <ul class="social-list clearfix">
               <li>
                 <a href="#" class="facebook-bg">Facebook</a>
               </li>
               <li>
                 <a href="#" class="twitter-bg">Twitter</a>
               </li>
               <li>
                 <a href="#" class="google-bg">Google</a>
               </li>
             </ul>
             <div class="clearfix"></div>
             <p>Don't have an account? <a data-bs-toggle="modal" data-bs-target="#registration_form" class="thembo"> Register here</a>
             </p>
           </div>
         </div>
       </div>
     </div>
   </div>
 </div>
 
  {{-- Registration Modal  --}}
 <div class="modal fade" id="registration_form" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header justify-content-center">
         <h5 class="modal-title text-center w-100 fw-bold" id="staticBackdropLabel">Register Here</h5>
         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
       </div>
       <div class="modal-body registration_section">
         <div class="col-lg-12">
           <div class="form-section">
             <div class="form-inner">
               <form id="register-form" action="{{ route('store') }}" method="post">
                  @csrf
                 <div class="form-group form-box clearfix">
                   <input type="text" id="first_name" name="first_name" value="{{ old('first_name') }}" class="form-control @error('first_name') is-invalid @enderror" placeholder="First Name" required>
                  </div>
                 <div class="form-group form-box clearfix">
                   <input type="text" id="last_name" name="last_name" value="{{ old('last_name') }}" class="form-control @error('last_name') is-invalid @enderror" placeholder="Last Name" required>
                  </div>
                 <div class="form-group form-box clearfix">
                   <input type="text" id="username" name="username" value="{{ old('username') }}" class="form-control @error('username') is-invalid @enderror" placeholder="Username" required>
                  </div>                  
                 <div class="form-group form-box clearfix">
                   <input type="email" class="form-control  @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="Email Address" required>
                  <!-- @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif -->
                  </div>
                 <div class="form-group form-box clearfix">
                   <input style="padding-left: 40px;" id="mobile_number" name="mobile_number" type="tel" class="form-control" placeholder="Mobile Number" required>
                 </div>
                 <div class="form-group form-box clearfix">
                   <input type="password" class="form-control" name="password" placeholder="Password" required>
                  <!-- @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif -->
                  </div>
                
                  <!-- OTP Blocks -->
                <div id="sms-otp-block" style="display:none;">
                    <div class="form-group form-box clearfix">
                        <input type="text" class="form-control" name="sms_otp" placeholder="Please Enter Phone OTP">
                    </div>                    
                </div>  
                
                <div id="email-otp-block" style="display:none;">
                    <div class="form-group form-box clearfix">
                        <input type="text" class="form-control" name="email_otp" placeholder="Please Enter Email OTP">
                    </div>       
                </div>                
                  
                 <div class="form-group form-box clearfix text-left">
                   <input id="checkbox" type="checkbox" />
                   <label for="checkbox"> I agree to these <a href="#">Terms and Conditions</a>. </label>
                 </div>
                 <div class="form-group">
                   <button type="submit" value="Register" class="btn btn-primary btn-lg btn-theme">
                     <span>Register Now </span>
                   </button>
                 </div>
               </form>
               <div class="clearfix"></div>
               <p>Already have an account? <a href="{{ route('login') }}"> Log In</a>
               </p>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </div>


 {{-- Forgot Password Modal --}}
 {{-- <div class="modal fade" id="forgotPasswordModal" tabindex="-1" aria-labelledby="forgotPasswordModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content p-3">
      <div class="modal-header">
        <h5 class="modal-title" id="forgotPasswordModalLabel">Forgot Password</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('password.email') }}" id="forgotPasswordForm">
           @csrf
          <div class="mb-3">
            <label for="forgot_email" class="form-label">Email address</label>
            <input type="email" name="email" class="form-control" id="forgot_email" required>
          </div class="d-grid">
          <button type="submit" class="btn btn-primary">Reset Password</button>
        </form>
      </div>
    </div>
  </div>
</div> --}}

{{-- Forgot Password Modal --}}
<div class="modal fade" id="forgotPasswordModal" tabindex="-1" aria-labelledby="forgotPasswordModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content border-0 shadow-lg rounded">
      <div class="modal-header border-0 pb-0">
        <h5 class="modal-title fw-bold" id="forgotPasswordModalLabel">Forgot Password</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('password.email') }}" id="forgotPasswordForm">
          @csrf
          <div class="mb-3">
            <label for="forgot_email" class="form-label">Email address</label>
            <input type="email" name="email" class="form-control" id="forgot_email" placeholder="Enter your registered email" required>
          </div>
          <div class="d-grid">
            <button type="submit" class="btn btn-primary btn-block">
              Send Password Reset Link
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>



@endsection

@section('page.script')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.js"></script>

<script>
$(document).ready(function() {
    
  // Forgot Password Submit
    $('#forgotPasswordForm').submit(function(e) {
      e.preventDefault(); // Prevent form submission

     var form = $(this);
    var url = form.attr('action');
    var formData = form.serialize();// Serialize form data
        var url = form.attr('action');
      $.ajax({
        url: url, // Replace "your_controller" with your actual controller name and method
        type: 'POST',
        data: formData,
        success: function(response) {
          // Handle success response
          // console.log(response);

              response=JSON.parse(response);
        if (response.success) {

          Swal.fire({
            icon: 'success',
          title: 'Email Sent',
          text: response.message || 'Password reset link has been sent!',
          timer: 2000,
          timerProgressBar: true,
          showConfirmButton: false
          }).then(() => {
          $('#forgotPasswordModal').modal('hide');
          // Optional: redirect to login page after modal closes
          // window.location.href = "{{ route('login') }}";
        });
        }
        else{
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: response.message || 'Something went wrong.',
          })
        }
      },
        error: function(xhr, status, error) {
      if (xhr.status === 422) {
        // Laravel validation errors
        let response = xhr.responseJSON;
        let errorMsg = 'Please correct the following:\n';
        if (response.errors) {
          errorMsg = Object.values(response.errors).join('\n');
        }

        Swal.fire({
          icon: 'error',
          title: 'Validation Error',
          text: errorMsg
        });
      } else {
        Swal.fire({
          icon: 'error',
          title: 'Server Error',
          text: 'Something went wrong. Please try again.'
        });
      }
    }
  });
});
  // Submit form function

  // Registration Submit
  $('#register-form').on('submit', function(event) {
    event.preventDefault();

    var form = $(this);
    var url = form.attr('action');
    var formData = form.serialize();

    // Send the form data using AJAX
    
    $.ajax({
      type: 'POST',
      url: url,
      data: formData,
      
      success: function(response) {
          
        // response=JSON.parse(response);
        if (typeof response === 'string') {
        response = JSON.parse(response);
    }
        if(response.rstep == 1){
            
            if(response.success){
                if(response.verification == 'email'){ //for only email
                    $('#email-otp-block').show();
                    $('#email-otp-block input').attr('required', 'required');
                }else{ //for both email and sms
                    $('#email-otp-block').show();
                    $('#email-otp-block input').attr('required', 'required');
                    $('#sms-otp-block').show();
                    $('#sms-otp-block input').attr('required', 'required');                    
                }
                
                //make fileds only readoly
                $('input[name="first_name"]').attr('readonly', 'readonly');
                $('input[name="last_name"]').attr('readonly', 'readonly');
                $('input[name="username"]').attr('readonly', 'readonly');
                $('input[name="email"]').attr('readonly', 'readonly');
                $('input[name="mobile_number"]').attr('readonly', 'readonly');
                $('input[name="password"]').attr('readonly', 'readonly');
            }else{
                Swal.fire({
                  icon: 'error',
                  title: 'Error',
                  text: response.message,
                  confirmButtonColor: '#3085d6',
                  confirmButtonText: 'OK'
                });                 
            }
        
        }else if(response.rstep == 2){
            if (response.success) {
              // window.location.href = '/';
              Swal.fire({
          icon: 'success',
          title: 'Registration Successful!',
          showConfirmButton: false,
          timerProgressBar: true,
          timer: 2000 
        }).then(() => {
            window.location.href = "{{ route('login') }}"; // redirect to login
        });
            } else {
                
                Swal.fire({
                  icon: 'error',
                  title: 'Error',
                  text: response.message,
                  confirmButtonColor: '#3085d6',
                  confirmButtonText: 'OK'
                });                
                
                openRegisterPopup();
            }        
        }
          
        // Check if the form submission was successful
        response=JSON.parse(response);
        if (response.success) {
          // Do something when registration is successful, e.g., redirect to a new page
          window.location.href = '/';
        } else {
         

          // Display errors to the user or take appropriate action
          
          // Reopen the register popup
          openRegisterPopup();
        }
      },
      error: function(xhr, status, error) {

        // Handle the 422 Unprocessable Entity response
        if (xhr.status === 422) {
          var responseErrors = xhr.responseJSON.errors;

     
          // Handle form errors
          var errors = responseErrors;
          var errorMessages = [];

          // Extract error messages from the errors object
          for (var field in responseErrors) {
            if (responseErrors.hasOwnProperty(field)) {
              var fieldErrors = responseErrors[field];
              errorMessages = errorMessages.concat(fieldErrors);
            }
          }

          Swal.fire({
  icon: 'error',
  title: 'Error',
  text: errorMessages,
  confirmButtonColor: '#3085d6',
  confirmButtonText: 'OK'
});
          // Display the validation errors to the user or take appropriate action

          // Reopen the register popup
          openRegisterPopup();
        } else {
          // Handle other errors
          console.error(error);
        }
      }
    });
  });

  // Function to open the register popup
  function openRegisterPopup() {
    // Code to open the register popup
  }
  
  $("#mobile_number").intlTelInput();
});
 
      /*var input = document.querySelector("#mobile_number");
      window.intlTelInput(input, {
        // allowDropdown: false,
        autoInsertDialCode: true,
        // autoPlaceholder: "off",
        // dropdownContainer: document.body,
        // excludeCountries: ["us"],
        // formatOnDisplay: false,
        // geoIpLookup: function(callback) {
        //   fetch("https://ipapi.co/json")
        //     .then(function(res) { return res.json(); })
        //     .then(function(data) { callback(data.country_code); })
        //     .catch(function() { callback("us"); });
        // },
        // hiddenInput: "full_number",
        initialCountry: "IN",
        // localizedCountries: { 'de': 'Deutschland' },
        // nationalMode: false,
        // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
        // placeholderNumberType: "MOBILE",
        // preferredCountries: ['cn', 'jp'],
        separateDialCode: true,
        // showFlags: false,
        utilsScript: "public/assets/front/js/utils.js"
      });*/
</script>
@endsection