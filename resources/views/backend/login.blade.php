<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Raleway:400,700');

        body {
            background: #c0c0c0;
            font-family: Raleway, sans-serif;
            color: #666;
        }

        .login {
            margin: 20px auto;
            padding: 40px 50px;
            max-width: 300px;
            border-radius: 5px;
            background: #fff;
            box-shadow: 1px 1px 1px #666;
        }

        .login input {
            width: 100%;
            display: block;
            box-sizing: border-box;
            margin: 10px 0;
            padding: 14px 12px;
            font-size: 16px;
            border-radius: 2px;
            font-family: Raleway, sans-serif;
        }

        .login input[type=text],
        .login input[type=password] {
            border: 1px solid #c0c0c0;
            transition: .2s;
        }

        .login input[type=email]:hover {
            border-color: #58A399;
            outline: none;
            transition: all .2s ease-in-out;
        }

        .login input[type=submit] {
            border: none;
            background: #58A399;
            color: white;
            font-weight: bold;
            transition: 0.2s;
            margin: 20px 0px;
        }

        .login input[type=submit]:hover {
            background: #58A399;
        }

        .login h2 {
            margin: 20px 0 0;
            color: #58A399;
            font-size: 28px;
        }

        .login p {
            margin-bottom: 40px;
        }

        .links {
            display: table;
            width: 100%;
            box-sizing: border-box;
            border-top: 1px solid #c0c0c0;
            margin-bottom: 10px;
        }

        .links a {
            display: table-cell;
            padding-top: 10px;
        }

        .links a:first-child {
            text-align: left;
        }

        .links a:last-child {
            text-align: right;
        }

        .login h2,
        .login p,
        .login a {
            text-align: center;
        }

        .login a {
            text-decoration: none;
            font-size: .8em;
        }

        .login a:visited {
            color: inherit;
        }

        .login a:hover {
            text-decoration: underline;
        }
    </style>

</head>

<body>
    <form class="login" action="{{ url('/admin/login-acess') }}" method="post">
        @csrf
        <h2>Welcome, Admin!</h2>
        <p>Please log in</p>
        <input type="email" placeholder="Email" name="email" required />
        <input type="password" placeholder="Password" name="password" required />
        <input type="submit" value="Log In" />
    </form>
</body>

</html>
