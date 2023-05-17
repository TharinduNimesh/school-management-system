<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>Login</title>
<!-- Icon file -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet" />
<!-- style sheet -->
<link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="/css/login.css">
<link rel="stylesheet" href="/css/animation.css">
<style>
    .invalid-login {
        animation: invalid-animation 0.3s ease-in-out;
        animation-iteration-count: 3;
    }

    @keyframes invalid-animation {
        0% {
            margin-left: 0px;
        }
        25% {
            margin-left: 10px;
        }
        50% {
            margin-left: 0px;
        }
        75% {
            margin-left: -10px;
        }
        100% {
            margin-left: 0px;
        }
    }
</style>