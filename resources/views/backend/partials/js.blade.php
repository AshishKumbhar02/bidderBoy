<!--  Import Js Files -->
<script src="{{url('assets/back/js/jquery.min.js')}}"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="{{url('assets/back/js/simplebar.min.js')}}"></script>
<script src="{{url('assets/back/js/bootstrap.bundle.min.js')}}"></script>

<!--  core files -->
<script src="{{url('assets/back/js/app.min.js')}}"></script>
<script src="{{url('assets/back/js/app.init.js')}}"></script>
<script src="{{url('assets/back/js/app-style-switcher.js')}}"></script>
<script src="{{url('assets/back/js/sidebarmenu.js')}}"></script>
<script src="{{url('assets/back/js/custom.js')}}"></script>

<!--text editor-->
<script src="{{url('assets/back/js/quill.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.27.3/trumbowyg.min.js"></script>

<!--validation jquery-->
<script src="{{url('assets/back/js/jquery.validate.min.js')}}"></script>
<script src="{{url('assets/back/js/additional-methods.min.js')}}"></script>

<!--notification jquery-->
<script src="{{url('assets/back/js/toastr.min.js')}}"></script>

<!--datatable-->
<script src="https://cdn.datatables.net/1.11.2/js/jquery.dataTables.min.js"></script>

@if(session('success'))
<script>
    toastr.success('{{ session("success") }}');
</script>
@endif

@if($errors->any())
<script>
    @foreach ($errors->all() as $error)
        Command: toastr["error"]('{{$error}}', "Alert");
    @endforeach
</script>        
@endif 

