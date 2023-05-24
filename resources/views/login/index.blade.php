@auth
@if (auth()->user()->role == 'admin')
<script> window.location = "{{ route('admin.dashboard') }}"</script>
@endif
@endauth
<!DOCTYPE html>
<html lang="en">

<head>
    @include('login.components.head')
</head>

<body onkeyup="checkLogin(event);">
    <!-- Content Start -->

    <!-- Background Animation Start -->
    <div id="bg">
        <canvas></canvas>
        <canvas></canvas>
        <canvas></canvas>
    </div>
    <!-- Background Animation End -->
    <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
        <div class="container">
            <div class="card login-card">
                <div class="row no-gutters">
                    <div class="col-md-5">
                        <img src="/img/Admin.jpg" id="interface-image" alt="login" class="login-card-img">
                    </div>
                    <div class="col-md-7">
                        <div class="card-body">
                            <div class="brand-wrapper">
                                <h1>LOGIN</h1>
                            </div>
                            <p class="login-card-description">School Management System</p>
                            <form action="#!">
                                <p id="invalid-feedback" class="text-danger text-center invalid-login d-none">
                                    Invalid Index / NIC Number Or Password
                                </p>
                                <div class="form-group mb-4">
                                    <label for="roll" class="">Select Your Role</label>
                                    <select onchange="profileImg();" id="role" class="form-control" name="roll">
                                        <option selected value="0">Open this select menu</option>
                                        <option>Student</option>
                                        <option>Teacher</option>
                                        <option>Admin</option>
                                        <option>Librarian</option>
                                        <option>Coach</option>
                                        <option>Developer</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="NIC" class="">Index/ NIC Number</label>
                                    <input type="text" name="NIC" id="nic" class="form-control"
                                        placeholder="Enter Your NIC Number">
                                </div>
                                <div class="form-group mb-4">
                                    <label for="password" class="">Password</label>
                                    <input id="password-field" type="password" class="form-control" name="password"
                                        placeholder="Enter Your Password">
                                    <span toggle="#password-field"
                                        class="fa fa-fw fa-eye field-icon toggle-password mr-2"></span>
                                </div>
                                <input name="login" id="login" class="btn btn-block login-btn mb-4" type="button"
                                    value="Login" onclick="loginAll();">
                            </form>
                            <a href="#!" class="forgot-password-link">Forgot password?</a>
                            <p class="login-card-footer-text">Go Back To <a href="{{ route('home.index') }}"
                                    class="text-reset "><u>Home</u></a>
                            </p>
                            <nav class="login-card-footer-nav">
                                <a href="https://eversoft.cf/">Terms of use.</a>
                                <a href="https://eversoft.cf/">EverSoft it Solutions.</a>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- Content End -->

    <!-- JavaScript File -->
    @include('login.components.javascript')
    <script>
        function loginAll() {
            const index = document.getElementById("nic").value;
            const password = document.getElementById("password-field").value;
            document.getElementById('invalid-feedback').classList.add('d-none');
            const role = document.getElementById("role").value;

            if(role == "0"){
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Please Select Your Role!',
                })
                return;
            }

            var form = new FormData();
            form.append('index', index);
            form.append('password', password);
            form.append('role', role.toLowerCase());

            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var response = JSON.parse(xhr.responseText);
                    if (response.status == 'success') {
                        window.location = response.path;
                    } else {
                        document.getElementById('invalid-feedback').classList.remove('d-none');
                    }
                }
            }

            xhr.open('POST', '{{ route('login') }}');
            xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').content);
            xhr.send(form);
        }

        function profileImg() {
            const role = document.getElementById("role").value;
            const img = document.getElementById("interface-image");

            if(role == 'Student') {
                img.src = "/img/Student.jpg";
            } else if (role == 'Teacher') {
                img.src = "/img/Teacher.jpg";
            } else if (role == 'Admin') {
                img.src = "/img/Admin.jpg";
            } else if (role == 'Librarian') {
                img.src = "/img/Lib.jpg";
            } else if (role == 'Coach') {
                img.src = "/img/Sport.jpg";
            } else if (role == 'Developer') {
                img.src = "/img/Developer.jpg";
            }
        }

        function checkLogin(event) {
            if (event.keyCode === 13) {
                loginAll();
            }
        }
    </script>
</body>

</html>