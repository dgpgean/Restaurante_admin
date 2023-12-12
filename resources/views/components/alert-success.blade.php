<div class="alert-success">
    @if (session('success'))
        <input type="hidden" id="msgSuccess" value="{{ session('success') }}">

        @section('js')
            <script>
                let msgSuccess = document.querySelector('#msgSuccess');
                msgSuccess = msgSuccess.value
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    }
                });

                Toast.fire({
                    icon: "success",
                    title: msgSuccess
                })
            </script>
        @stop
    @endif

</div>
