<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Probation Test</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <livewire:styles/>
    <livewire:scripts/>
</head>
<body>
    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if (session()->has('mesage'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                    @endif

                    @yield('content')
            </div>
        </div>
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
</body>
   
<script>
window.addEventListener('alert', event => { 
             toastr[event.detail.type](event.detail.message, 
             event.detail.title ?? ''), toastr.options = {
                    "closeButton": true,
                    "progressBar": true,
                }
            });
</script>
</html>