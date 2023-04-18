@auth
    @if (auth()->user()->role == 'admin')
        <script> window.location = "{{ route('admin.dashboard') }}"</script>
    @endif
@endauth
<!DOCTYPE html>
<html>

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/css/mainstyle.css">
    <link rel="stylesheet" href="/css/mystyle.css">
    <title>Admin Login</title>
</head>

<body>
    <div class="container" style="justify-content: center;">
        <div class="content">
            <div class="banner">
                <h1>MANAGEMENT SYSTEM</h1>
                <h3>Welcome to the Sri Dharmaloka College School Management System</h3>
                <br>
                <h5>EverSoft it Solutions.</h5>
            </div>
            <form>
                @csrf
                <div class="form">
                    <lable class="topic">Admin LogIn</lable>
                    <img src="/img/badge.png" />
                    <p class="failed" id="failed">Login Failed</p>
                    <input type="text" id="nic" autocomplete placeholder="NIC NO" value="">
                    <input type="password" id="password" placeholder="Password" value="">
                    <button type="button" onclick="adminLogin();">Sign In</button>
                    <p>Back to <a href="{{ route('home.index') }}">Home</a> menu</p>
                    <a href="#" id="r">Forgot Your Password?</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function adminLogin() {
            const index = document.getElementById("nic").value;
            const password = document.getElementById("password").value;

            var form = new FormData();
            form.append('index', index);
            form.append('password', password);
            form.append('role', 'admin');

            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if(xhr.readyState == 4 && xhr.status == 200) {
                    document.getElementById('failed').style.display = 'none';
                    var response = xhr.responseText;
                    if(response == 'success') {
                        window.location = "{{ route('admin.dashboard') }}";
                    } else if(response == 'invalid') {
                        document.getElementById('failed').style.display = 'block';
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