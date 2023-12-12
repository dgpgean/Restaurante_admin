<div class="alert">
    @if ($errors->all())

        @foreach ($errors->all() as $error)
            <input type="hidden" class="input_error" value="{{ $error }}">
        @endforeach

        @section('js')
            <script>
                const errors = document.querySelectorAll('.input_error');
                let msgErrors = ''
                errors.forEach(err => {
                    msgErrors += err.value + "\n";
                })
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
                    icon: "error",
                    title: msgErrors

                })
            </script>
        @stop
    @endif
</div>
