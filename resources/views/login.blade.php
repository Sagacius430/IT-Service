<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
</head>
<body class="bg-dark">
    <div class="container"> 

        @if (session()->has('msg_error'))
            <div class="row mt-3 mb-3">
                <div class="col-12">
                    <div class="alert alert-danger" role="alert">                  
                    {{session()->get('msg_error')}} 
                    </div>                
                </div>
            </div>
        @endif

        <div class="row">
            <div class="col-4 mx-auto">                
                <div class="card-body">
                    <div class="p-3 mb-2 bg-light text-dark">
                        <h1 class="text-center">Login</h1>
                        <div class="card-body">
                            <form action="{{ route('login.login') }}" method="POST">

                                @csrf

                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" placeholder="E-mail">                                
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control" placeholder="Senha">
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">
                                        Login
                                    </button>
                                </div>
                            </form>
                            <form action="{{ route('login.login') }}" method="POST">
                                <div class="mt-5" id="addRecoveryPass" style="display:none">
                                    <div>
                                        Insira um email para recuperação
                                        <div class="mt-3 text-right">
                                            <input type="email" name="email" class="form-control" placeholder="E-mail" id="email" >
                                        </div>                                        
                                        <div class="mt-3 text-right">
                                            <button type="submit" class="btn btn-primary">
                                                Enviar
                                            </button>
                                        </div>                                        
                                    </div>                                    
                                </div>
                                <div class="mt-3 text-center">
                                    <button type="button" class="btn btn-link text-secondary" onclick="add_div('addRecoveryPass')">Esqueceu a senha?</button>
                                </div> 
                            </form>
                        </div>                       
                    </div>
                </div>
            </div>            
        </div>
    </div>

<script src="{{asset('js/jquery-3.5.1.mim.js')}}"></script>
<script src="{{asset('js/bootstrap.bundle.mim.js')}}"></script>

<script>//script para adicionar mais divs 
    function add_div(addRecoveryPass){
        var display = document.getElementById(addRecoveryPass).style.display;
        // if (display == "none")
            document.getElementById(addRecoveryPass).style.display = "block"
        // else
        //     document.getElementById(el).style.display = 'none' 
    } 
</script>
  
</body>
</html>