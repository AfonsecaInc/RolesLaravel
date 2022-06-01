@if (session('success'))
    <script>
        Swal.fire({
            position: 'top-end',
            icon: '{{session('icon')}}',
            title: '{{session('success')}}',
            showConfirmButton: false,
            timer: 2500
        })
    </script>
@endif
