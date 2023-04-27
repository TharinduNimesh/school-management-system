<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="/img/favicon.ico"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <title>404 - Not Found</title>
    <style>
        body {
            overflow: hidden;
        }

        .error-background {
            background-image: url('/img/school.png');
            background-size: cover;
            background-repeat: no-repeat;
            filter: blur(8px);
            position: absolute;
        }

        .animation {
            animation: animate 2s;
        }

        @keyframes animate {
            from {
                margin-top: -30vh;
                opacity: 0;
            }
            to {
                margin-top: 0;
                opacity: 1;
            }
        }
    </style>
</head>
<body>
    <div class="container-fluid vh-100 error-background">

    </div>
    <div class="container-fluid vh-100 position-absolute d-flex flex-column justify-content-center align-items-center">
        <div class="animation bg-light d-flex flex-column justify-content-center align-items-center px-5 py-2 rounded-3">
            <h1 style="font-size: 3rem">Page Not Found</h1>
            <a href="{{ route('home.index') }}" class="btn btn-primary mt-3 ">
                Bring Me Back To Home
            </a>
        </div>
    </div>
</body>
</html>
