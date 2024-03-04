<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registro</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <script src="https://www.google.com/recaptcha/api.js"></script>
</head>
<body>
    <div class="container">
        <div class="register-container">
            <h2>Registro</h2>

            <form id="form_register" method="POST" action="{{ route('register') }}" >
                @csrf
                {{-- <x-jet-validation-errors class="mb-4"/> --}}
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
                </div>

                <div class="form-group">
                    <label for="email">Correo electrónico</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required>
                </div>

                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input id="password" type="password" name="password" required>
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Confirmar contraseña</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required>
                </div>

                <div class="form-group">
                    <button class="g-recaptcha" 
                    data-sitekey="6LeT6F0pAAAAAGskwo_gcJAsPZQairjJoCeMaYub" 
                    data-callback='onSubmit' 
                    data-action='submit'>Registrarse</button>
                </div>

            </form>
        </div>
    </div>
    <script src="https://www.google.com/recaptcha/api.js"></script>

    <script>
        function onSubmit(token) {
          document.getElementById("form_register").submit();
        }
      </script>
</body>
</html>