<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Clientes</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>
<body>
{{-- <a href="{{ route('clients.index')}}">acessar cliente</a> --}}
    <div class="container-fluid">
        
        @if (session()->has('msg_success'))
            <div class="row mt-3 mb-3">
                <div class="col-12">
                    <div class="alert alert-success" role="alert">                  
                    {{session()->get('msg_success')}} 
                    </div>                
                </div>
            </div>
        @endif
        
        @yield('content')
    
    </div>                    
    <script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>