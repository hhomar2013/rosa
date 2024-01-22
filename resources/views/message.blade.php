{{-- @if (session()->has('message'))
<script>
    toastr.success("{{ session('message') }}","{{ config('app.name') }}");
</script>
@elseif(session()->has('error'))
<script>
    toastr.error("{{ session('message') }}","{{ config('app.name') }}");
</script>
@endif --}}

@if(session()->has('message'))

    <script>
        Toast.fire({
            icon: 'success',
            title:'{{ session('message') }}',
        })
    </script>
@endif

@if(session()->has('error'))
    <script>
        Toast.fire({
            icon: 'error',
            title:'{{ session('error') }}',

        })
    </script>
@endif
