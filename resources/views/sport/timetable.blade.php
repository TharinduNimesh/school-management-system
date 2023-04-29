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

            <!-- Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded h-100 p-3">
                    <h3 class="mb-4 text-dark">Coach Add Sport Timetable</h3>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control bg-secondary text-dark" id="bookId"
                            placeholder="name@example.com">
                        <label for="floatingInput">Coach's Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control bg-secondary text-dark" id="bookId"
                            placeholder="name@example.com">
                        <label for="floatingInput">Coach's NIC</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control bg-secondary text-dark" id="bookId"
                            placeholder="name@example.com">
                        <label for="floatingInput">Sport Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control bg-secondary text-dark" id="bookId"
                            placeholder="name@example.com">
                        <label for="floatingInput">Venue</label>
                    </div>
                 
                    
                    <select class="form-control bg-secondary text-dark" aria-label="Select day of the week">
                        <option selected>"Click here" to select day of the week</option>
                        <option value="Sunday">Sunday</option>
                        <option value="Monday">Monday</option>
                        <option value="Tuesday">Tuesday</option>
                        <option value="Wednesday">Wednesday</option>
                        <option value="Thursday">Thursday</option>
                        <option value="Friday">Friday</option>
                        <option value="Saturday">Saturday</option>
                      </select>
                      <br>
                      <label for="start-time">Start Time:</label><input type="time" id="start-time" name="start-time" value="00:00" min="08:00" max="17:00"><label for="end-time">End Time:</label><input type="time" id="end-time" name="end-time" value="00:00" min="00:00" max="24:00">
                      <br><br>
                      <h5 class=" text-dark">More Information</h5>
                    <div class="form-floating">
                        <textarea class="form-control bg-secondary text-dark" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                        <label for="floatingTextarea2">Type here...</label>
                      </div> 
                   <br>
                   
                    <div class="d-grid gap-2 col-6 mx-auto">
                        <button class="btn btn-primary" type="button">Submit</button>
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
</body>
</html>