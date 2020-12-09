<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Users</title>

    <link rel="stylesheet" href=""
</head>
<body>
<a herf="{{route('user.index')}}"></a>
    <h1>Usuários</h1>
    <table border="1">
        <thead>
            <th>Nome</th>
            <th>E-mail</th>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                </tr>    
            @endforeach
        </tbody>
    </table>
<script src="{{ asset('js.')}}"
</body>
</html>