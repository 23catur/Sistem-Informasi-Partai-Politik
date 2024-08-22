<script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })

    @if (Session::has('error'))
        Toast.fire({
            icon: 'error',
            title: '{{ Session::get("error") }}'
        })
    @endif

    @if (Session::has('success'))
        Toast.fire({
            icon: 'success',
            title: '{{ Session::get("success") }}'
        })
    @endif

    $('#delete').on('click', function() {
        Swal.fire({
            title: 'Apa kamu yakin?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus saja!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.reload()
            }
        })

        return;
    })
</script>
