<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Crunchyroll</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');
        
        body {
            background-color: #F47521;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: 'Roboto', sans-serif;
        }
        .login-container {
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: 350px;
        }
        .login-container h2 {
            color: #F47521;
            font-size: 24px;
            margin-bottom: 20px;
        }
        .login-container input {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
            outline: none;
        }
        .login-container button {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 5px;
            background-color: #F47521;
            color: white;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
           
        }
        .login-container button:hover {
            background-color: #d3631c;
        }
        .login-container .links {
            margin-top: 15px;
            font-size: 14px;
        }
        .login-container .links a {
            color: #F47521;
            text-decoration: none;
        }
        .login-container .links a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Entrar</h2>
        <input type="email" placeholder="E-mail" required>
        <input type="password" placeholder="Senha" required>
        <button>Entrar</button>
        <div class="links">
            <a href="#">Esqueceu sua senha?</a>
        </div>
    </div>
</body>
</html>
