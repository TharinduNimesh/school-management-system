@if (auth()->check())
    @if (auth()->user()->role == '0')
        <script>window.location = ("{{ route('student.dashboard') }}")</script>
    @endif
@endif
<!DOCTYPE html>
<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/css/mainstyle.css">
    <link rel="stylesheet" href="/css/mystyle.css">
    <title>Student Login</title>
</head>

<body>
    <div class="container" style="justify-content: center;">
        <div class="content">
            <div class="banner">
                <h1>MANAGEMENT SYSTEM</h1>
                <h3>Welcome to the Sri Dharmaloka College Student Management System</h3>
                <br>
                <h5>EverSoft it Solutions.</h5>
            </div>
            <form>
                @csrf
                <div class="form">
                    <lable class="topic">Student LogIn</lable>
                    <img src="/img/badge.png">
                    <p class="failed" id="failed">Login Failed</p>
                    <input type="text" id="indexNo" autocomplete placeholder="Registration NO" value="">
                    <input type="password" id="password" placeholder="Password" value="">
                    <button type="button" onclick="studentLogin();">Sign In</button>
                    <p>Login as a <a href="{{ route('teacher.login') }}">Teacher</a></p>
                    <a href="studentGetRegistration.php" id="r">Forgot Your Password?</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function studentLogin() {
            const index = document.getElementById("indexNo").value;
            const password = document.getElementById("password").value;

            var form = new FormData();
            form.append('index', index);
            form.append('password', password);
            form.append('role', '0');

            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if(xhr.readyState == 4 && xhr.status == 200) {
                    document.getElementById('failed').style.display = 'none';
                    var response = xhr.responseText;
                    if(response == 'success') {
                        window.location = "{{ route('student.dashboard') }}";
                    } else if (response == "invalidLogin") {
                        Swal.fire(
                            'WARNING',
                            'Please Make Sure That You Are Using Correct Login Page',
                            'warning'
                        );
                    } else if(response == 'invalid') {
                        document.getElementById('failed').style.display = 'block';
                    } else {
                       // window.location = response;
                    }
                }
            }

            xhr.open('POST', '{{ route("login") }}');
            xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').content);
            xhr.send(form);
        }
    </script>
</body>

</html>