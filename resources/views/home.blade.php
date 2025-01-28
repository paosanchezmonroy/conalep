<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos.css">
    <title>Registro Conalep</title>
</head>
<body>
    <div class="login">
        <img src="/img/idle/1.png" id="monster" alt="">
        <form action="/login" method="POST" class="formulario">
            @csrf
            <label>Usuario</label>
            <input name="email" type="email" id="input-usuario" placeholder="lobo@conalepmex.edu.mx" autocomplete="off" required>
            <label>Contraseña</label>
            <input name="password" type="password" id="input-clave" placeholder="*******" required>
            <button type="submit">Login</button>
        </form>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    </div>
    <script src="js/javascript.js"></script>
</body>
</html>