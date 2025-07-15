<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Bidder Boy</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <meta name="csrf-token" class="csrf-token" id="csrf-token" data-token="{{ csrf_token() }}" />

    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,500;0,600;0,700;1,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Vendor CSS Files -->
    <link href="{{url('assets/front/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Owl Stylesheets -->
    <link rel="stylesheet" href="{{url('assets/front/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{url('assets/front/css/owl.theme.default.min.css')}}">
    <!-- Template Main CSS File -->
    <link href="{{url('assets/front/css/intlTelInput.css')}}" rel="stylesheet">
    <link href="{{url('assets/front/css/style.css')}}" rel="stylesheet">   
    <link href="{{url('assets/front/css/toastr.min.css')}}" rel="stylesheet">  

    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'></link>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <!-- <script src="{{url('assets/front/js/jquery.min.js')}}"></script> -->
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
<script src="{{url('assets/front/js/owl.carousel.js')}}"></script>
<script src="{{url('assets/front/js/intlTelInput.js')}}"></script>
<script src="{{url('assets/front/js/toastr.min.js')}}"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    @include('frontend.partials.header')
    @yield('page.breadcrumb')
    
    @yield('page.content')
    
    @include('frontend.partials.footer')
    
    @yield('page.script')
</body>

<script>
toastr.options = {
  "showHideTransition": 'plain',
  "closeButton": true,
  "newestOnTop": false,
  "progressBar": true,
  "positionClass": "toast-top-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "500",
  "timeOut": "7000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}

@if(session('success'))
   Command: toastr["success"]('{{session("success")}}', "Success");
@endif

@if(session('error'))
   Command: toastr["error"]('{{session("error")}}', "Alert");
@endif

@if($errors->any())
        @foreach ($errors->all() as $error)
            Command: toastr["error"]('{{$error}}', "Alert");
        @endforeach
@endif 
</script>

<script>
 $(document).ready(function() {
     $('.bid_now').click(function() {
            var product_id = $(this).attr('data-id');
            var bid_amount = $(this).attr('data-amount');
            var user_id = $(this).attr('data-user');
            var token = $(this).attr('data-token');
            var url = "{{url('bid-now')}}";


            $.ajax({
               url: url,
               type: 'POST',
               data: {
                  product_id: product_id,
                  bid_amount: bid_amount,
                  user_id: user_id,
                  _token: token
               },
               success: function(data) {
                  console.log("bid data => ", data);

                  if (data.status == 'success') {
                     $('.name_of_bidder_' + product_id).text('<?php echo (isset($user->name) ? $user->name : ""); ?>')
                     $('.product_cur_price_' + product_id).text('Rs. ' + data.amount_per_bid);

                     let message = [data.amount_per_bid, product_id, '<?php echo (isset($user->name) ? $user->name : ""); ?>'];
                     /* socket.emit('sendChatToServer', message); */
                     swal(
                        'Great!',
                        data.message,
                        data.status
                     )
                  } else {
                     swal(
                        'Oh No!',
                        data.message,
                        data.status
                     )
                  }
               }
            });
         });
});
</script>
<script type="module">
    window.Echo.channel('update-bid-price').listen('UpdateBidPrice', (event) => {
            console.log(event);
            $('.bid-price-'+event.all.id).text(event.all.amount_per_bid);
            $('.bidder-name-'+event.all.id).text(event.all.last_bidder_name);
        });
</script>
</html>