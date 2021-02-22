<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Serviços TI</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    {{-- <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js</script"> verificar o jquery validator--}}
</head>
<body>
    <div class="card-header">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Service IT</a>
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link" href="{{ route('dashboard.index') }}">Painel</a>
                    <a class="nav-item nav-link" href="{{ route('clients.index') }}">Clientes</a>
                    <a class="nav-item nav-link" href="{{ route('os.index') }}">Os</a>
                    @if (auth()->user()->role == 'admin') {{--Autenticação--}}
                        <a class="nav-item nav-link" href="{{ route('users.index') }}">Usuários</a>   
                        <a class="nav-item nav-link" href="{{ route('services.index') }}">Serviços</a>                              
                    @endif{{----}}
                </div>
            </div>
            <div class="d-flex align-items-center">
                <span class="nav-item nav-link">{{ auth()->user()->name }}</span>{{--Autenticação--}}
                <div>|</div>
                <a class="nav-item nav-link" href="{{  route('login.logout') }}">Sair</a>
            </div>
        </nav>
    </div>  

    <div class="container-fluid">

        @if ($errors->any()) 
            <div class="row mt-3 mb-3">
                <div class="col-12">
                    <div class="alert alert-danger" role="alert">                  
                        @if ($errors)
                            @foreach ($errors->all() as $error)
                                <div>{{$error}}</div>      
                            @endforeach        
                        @endif
                    </div>                
                </div>
            </div>  
        @endif

        @if (session()->has('msg_success'))
            <div class="row mt-3 mb-3">
                <div class="col-12">
                    <div class="alert alert-success" role="alert">                  
                    {{ session()->get('msg_success') }} 
                    </div>                
                </div>
            </div>
        @endif
        
        @yield('content')
        
    </div> 
    <div class="text-right">
            
    </div>  

    <script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    {{-- <script src="{{asset('js/check.js')}}"></script> --}}
    @yield('js')
</body>
</html>