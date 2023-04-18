<!DOCTYPE html>
<html lang="en">

<head>
  @include('library.components.head')
</head>

<body>
  <div class="container-fluid position-relative d-flex p-0">
    @include('public_components.spinner')

    @include('library.components.hamburger')

    <!-- Content Start -->
    <div class="content">
      @include('library.components.navbar')

            <!-- Start -->
            <div class="container-fluid pt-4 px-4" style="min-height: 80vh">
                <div class="bg-secondary rounded h-100 p-3">
                    <h3 class="mb-4 text-dark">Add Books</h3>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control bg-secondary text-dark" id="bookId"
                            placeholder="name@example.com">
                        <label for="floatingInput">Book ID</label>
                    </div>
                    <div class="form-floating">
                        <select class="form-select bg-secondary text-dark" id="selectTitles"
                            aria-label="Floating label select example">
                        </select>
                        <label for="floatingSelect">Book's Title List</label>
                    </div>
                    <h5 for="" class="col-12 pb-2 text-center text-dark">If Title not exist</h5>
                    <div class="input-group mb-3 mb-5">
                        <input type="text" class="form-control bg-secondary text-dark" id="newTitle"
                            placeholder="Add New Title" aria-label="Recipient's username"
                            aria-describedby="basic-addon2">
                        <button class="btn-lg btn btn-outline-danger" onclick="addNewTitle();"><i
                                class="fa-lg bi-plus-circle-fill"></i></button>
                    </div>
                    <div class="form-floating">
                        <select class="form-select bg-secondary text-dark" id="selectAuthors"
                            aria-label="Floating label select example">
                        </select>
                        <label for="floatingSelect">Book's Authors List</label>
                    </div>
                    <h5 for="" class="col-12 pb-2 text-center text-dark">If Author not exist</h5>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control bg-secondary text-dark" id="newAuthor"
                            placeholder="Add New Author" aria-label="Recipient's username"
                            aria-describedby="basic-addon2">
                        <button class="btn-lg btn btn-outline-danger" onclick="addNewAuthor();"><i
                                class="fa-lg bi-plus-circle-fill"></i></button>
                    </div>
                    <div class="d-grid gap-2 col-6 mx-auto">
                        <button class="btn btn-primary" type="button" onclick="addNewBook();">Submit</button>
                    </div>
                </div>
            </div>
            <!-- End -->


            @include('public_components.footer')
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    @include('public_components.js')

    <script>
        hamburger("addBook")
        function addNewTitle() {
            var newTitle = document.getElementById("newTitle").value;
            if (newTitle.trim() == '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'Oops...',
                    text: "It's Look Like You Aren't Fill Text Field"
                });
            }
            else {
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4) {
                        if (xhr.status == 200) {
                            // handle response
                            var response = xhr.responseText;
                            if (response == 'success') {
                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'New Title Added',
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                                listTitles();
                            }
                            else {
                                Swal.fire({
                                    icon: 'warning',
                                    title: 'Oops...',
                                    text: "It's Look Like Title Already exist.",
                                    footer: "Please Refresh And Try Again"
                                });
                            }
                        }
                        else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: "Internel Server Error",
                                footer: "<a href='http://wa.me/94701189971'>Contact Developers Here</a>"
                            });
                        }
                    }
                };

                xhr.open("GET", "process/addNewTitle.php?title=" + newTitle + "", true);
                xhr.send();
            }
        }

        function listTitles() {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "process/listTitles.php", false);
            xhr.send();

            var response = JSON.parse(xhr.responseText);
            if (response[0].status == 'success') {
                document.getElementById("selectTitles").innerHTML = "<option selected value='0'>Select A Title</option>";
                for (var i = 0; i < response.length; i++) {
                    var option = document.createElement("option");
                    option.innerHTML = response[i].title;
                    option.value = response[i].id;
                    document.getElementById("selectTitles").appendChild(option);
                }
            }
        }

        function addNewAuthor() {
            var newAuthor = document.getElementById("newAuthor").value;
            if (newAuthor.trim() == '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'Oops...',
                    text: "It's Look Like You Aren't Fill Text Field"
                });
            }
            else {
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4) {
                        if (xhr.status == 200) {
                            // handle response
                            var response = xhr.responseText;
                            if (response == 'success') {
                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'New Author Added',
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                                listAuthors();
                            }
                            else {
                                Swal.fire({
                                    icon: 'warning',
                                    title: 'Oops...',
                                    text: "It's Look Like Title Already exist.",
                                    footer: "Please Refresh And Try Again"
                                });
                            }
                        }
                        else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: "Internel Server Error",
                                footer: "<a href='http://wa.me/94701189971'>Contact Developers Here</a>"
                            });
                        }
                    }
                };

                xhr.open("GET", "process/addNewAuthor.php?author=" + newAuthor + "", true);
                xhr.send();
            }
        }

        function listAuthors() {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "process/listAuthors.php", false);
            xhr.send();

            var response = JSON.parse(xhr.responseText);
            if (response[0].status == 'success') {
                document.getElementById("selectAuthors").innerHTML = "<option selected value='0'>Select A Author</option>";
                for (var i = 0; i < response.length; i++) {
                    var option = document.createElement("option");
                    option.innerHTML = response[i].title;
                    option.value = response[i].id;
                    document.getElementById("selectAuthors").appendChild(option);
                }
            }
        }

        function addNewBook() {
            var id = document.getElementById("bookId").value;
            var title = document.getElementById("selectTitles").value;
            var author = document.getElementById("selectAuthors").value;
            var regex = /^[0-9]+$/;

            if (regex.test(id) == '' || title == '0' || author == '0') {
                Swal.fire({
                    icon: 'warning',
                    title: 'Oops...',
                    text: "It's Look Like You Haven't Fill All Text Fields.",
                });
            }
            else {
                var xhr = new XMLHttpRequest();
                var form = new FormData();
                form.append("id", id);
                form.append("title", title);
                form.append("author", author);

                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        var response = xhr.responseText;
                        if (response == 'success') {
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'New Book Added',
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }
                        else {
                            Swal.fire({
                                icon: 'warning',
                                title: 'Oops...',
                                text: "It's Look Like A book Already Exist With That Id",
                            });
                        }
                    }
                }

                xhr.open("POST", "process/addNewBooks.php", true);
                xhr.send(form);
            }
        }

    </script>
</body>

</html>