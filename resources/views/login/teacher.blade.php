<!DOCTYPE html>
<html>

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/css/mainstyle.css">
    <link rel="stylesheet" href="/css/mystyle.css">
    <title>Teacher Login</title>
</head>

<body>
    <div class="container" style="justify-content: center;">
        <div class="content">
            <div class="banner">
                <h1>MANAGEMENT SYSTEM</h1>
                <h3>Welcome to the Sri Dharmaloka College Lecturer Management System</h3>
                <br>
                <h5>EverSoft it Solutions.</h5>
            </div>
            <form>
                @csrf
                <div class="form">
                    <lable class="topic">Lecturer LogIn</lable>
                    <img src="/img/badge.png">
                    <p class="failed" id="failed">Login Failed</p>
                    <input type="text" id="nic" autocomplete placeholder="NIC NO" value="">
                    <input type="password" id="password" placeholder="Password" value="">
                    <button type="button" onclick="teacherLogin();">Sign In</button>
                    <p>Login as a<a href="{{ route('student.login') }}"> Student</a></p>
                    <a href="teacherForgetPassword.php" id="r">Forgot Your Password?</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function teacherLogin() {
            const index = document.getElementById("nic").value;
            const password = document.getElementById("password").value;

            var form = new FormData();
            form.append('index', index);
            form.append('password', password);
            form.append('role', '1');

            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if(xhr.readyState == 4 && xhr.status == 200) {
                    document.getElementById('failed').style.display = 'none';
                    var response = xhr.responseText;
                    if(response == 'success') {
                        window.location = "{{ route('teacher.dashboard') }}";
                    } else if (response == "invalidLogin") {
                        Swal.fire(
                            'WARNING',
                            'Please Make Sure That You Are Using Correct Login Page',
                            'warning'
                        );
                    } else if(response == 'invalid') {
                        document.getElementById('failed').style.display = 'block';
                    } else {
                        body.appendChild(response);
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