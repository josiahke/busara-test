<link href="{{ asset('bootstrap-toastr/toastr.min.css')}}" rel="stylesheet" type="text/css" />
<script src="{{ asset('bootstrap-toastr/toastr.min.js')}}" type="text/javascript"></script>

<script>
    toastr.options = {
        closeButton: true,
        positionClass: 'toast-top-full-width' || 'toast-top-right',
        onclick: null,
        showDuration: "2000",
        hideDuration: "2000",
        timeOut: "6000",
        extendedTimeOut: "2000",
        showEasing: "swing",
        hideEasing: "linear",
        showMethod: "fadeIn",
        hideMethod: "fadeOut"
    };
</script>


@if (session('message'))
<script>
    $(document).ready(function () {
        toastr.info('{{Session::get('message')}}');
    });
</script>
@endif

@if (session('error'))
<script>
    $(document).ready(function () {
        toastr.error('{{Session::get('error')}}');
    });
</script>
@endif

@if (session('success'))
<script>
    $(document).ready(function () {
        toastr.success('{{Session::get('success')}}');
    });
</script>
@endif

@if (session('warning'))
<script>
    $(document).ready(function () {
        toastr.warning('{{Session::get('warning')}}');
    });
</script>
@endif

@if (session('info'))
<script>
    $(document).ready(function () {
        toastr.info('{{Session::get('info')}}');
    });
</script>
@endif
