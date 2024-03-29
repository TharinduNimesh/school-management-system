<!DOCTYPE html>
<html lang="en">

<head>
    @include('sport.components.head')
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        @include('public_components.spinner')

        @include('sport.components.hamburger')

        <!-- Content Start -->
        <div class="content">
            @include('sport.components.navbar')

            <!-- Profile Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded h-100 p-3">
                    <h3 class="mb-4 text-dark">Add Sport Timetable</h3>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control bg-secondary text-dark" id="place"
                            placeholder="name@example.com">
                        <label for="floatingInput">Place</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-select bg-secondary text-dark" id="sport"
                            aria-label="Floating label select example">
                            <option selected value="0">"Click here" to select a sport</option>
                            @foreach ($sports as $sport)
                                <option>{{ $sport }}</option>
                            @endforeach
                        </select>
                        <label for="floatingSelect">Works with selects</label>
                    </div>
                    <div class="form-floating">
                        <select class="form-select bg-secondary text-dark" id="day"
                            aria-label="Floating label select example">
                            <option selected value="0">"Click here" to select day of the week</option>
                            <option value="Sunday">Sunday</option>
                            <option value="Monday">Monday</option>
                            <option value="Tuesday">Tuesday</option>
                            <option value="Wednesday">Wednesday</option>
                            <option value="Thursday">Thursday</option>
                            <option value="Friday">Friday</option>
                            <option value="Saturday">Saturday</option>
                        </select>
                        <label for="floatingSelect">Works with selects</label>
                    </div>
                    <br>
                    <label for="start-time">Start Time:</label><input type="time" id="start-time" name="start-time"
                        value="00:00" min="08:00" max="17:00"><label for="end-time">End Time:</label><input
                        type="time" id="end-time" name="end-time" value="00:00" min="00:00" max="24:00">
                    <br><br>
                    <h5 class=" text-dark">More Information</h5>
                    <div class="form-floating">
                        <textarea class="form-control bg-secondary text-dark" placeholder="Leave a comment here" id="description"
                            style="height: 100px"></textarea>
                        <label for="floatingTextarea2">Type here...</label>
                    </div>
                    <br>

                    <div class="d-grid gap-2 col-6 mx-auto">
                        <button class="btn btn-primary" type="button" onclick="sendMail();">Submit</button>
                    </div>
                </div>
            </div>
            <!-- Profile End -->


            <!-- Footer Start -->
            @include('public_components.footer')
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    @include('public_components.js')
    <!-- Template Javascript -->

    <script>
        hamburger("timetable")
        function sendMail() {
            let place = document.getElementById('place').value;
            let day = document.getElementById('day').value;
            let sport = document.getElementById('sport').value;
            let startTime = document.getElementById('start-time').value;
            let endTime = document.getElementById('end-time').value;
            let description = document.getElementById('description').value;

            if (place == "" || day == "0" || sport == "0" || startTime == "" || endTime == "" || description == "") {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Please fill all the fields!',
                })
                return false;
            }

            var data = new FormData();
            data.append('place', place);
            data.append('day', day);
            data.append('sport', sport);
            data.append('startTime', startTime);
            data.append('endTime', endTime);
            data.append('description', description);

            var xhr = new XMLHttpRequest();
            xhr.open('POST', '{{ route("send.sport.timetable") }}', true);
            xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
            xhr.send(data);
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    console.log(xhr.responseText);
                }
            }
        }
    </script>

</body>

</html>
