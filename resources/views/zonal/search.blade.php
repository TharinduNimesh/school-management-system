<!DOCTYPE html>
<html lang="en">

<head>
    @include('zonal.components.head')
</head>

<body>
  <div class="container-fluid position-relative d-flex p-0">
    <!-- Spinner Start -->
    @include('public_components.spinner')
    <!-- Spinner End -->


    <!-- Sidebar Start -->
    @include('zonal.components.hamburger')
    <!-- Sidebar End -->


    <!-- Content Start -->
    <div class="content">
      <!-- Navbar Start -->
      @include('zonal.components.navbar')
      <!-- Navbar End -->


      <!-- Search Start -->
      <div class="container-fluid pt-4 px-4">
        <div class="col-sm-12 col-xl-12">
          <div class="bg-secondary rounded h-100 p-4">
            <h3 class="mb-4 text-dark">School Search</h3>
            <div class="row g-2">
              <div class="form-floating">
                <select class="form-select text-dark bg-secondary" id="floatingSelect"
                  aria-label="Floating label select example">
                  <option selected>Open this select menu</option>
                  <option value="1">One</option>
                </select>
                <label for="floatingSelect">School Name</label>
              </div>
              <div>
                <div class="d-grid gap-2 col-6 mx-auto mt-3">
                  <button onclick="" type="submit" class="btn btn-primary col-sm-12 col-xl-12">Search<i
                      class="bi bi-search ms-2"></i></button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Search End -->


      <!-- Box Start -->
      <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
          <div class="col-sm-6 col-xl-6">
            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
              <i class="fas fa-user-graduate fa-3x text-primary"></i>
              <div class="ms-3">
                <p class="mb-2">Total Student</p>
                <h6 class="mb-0 text-wite">4020</h6>
              </div>
            </div>
          </div>

          <div class="col-sm-6 col-xl-6">
            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
              <i class="fas fa-user-tie fa-3x text-primary"></i>
              <div class="ms-3">
                <p class="mb-2">Total Teacher</p>
                <h6 class="mb-0 text-wite">40</h6>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Box End -->


      <!-- Details Start -->
      <div class="container-fluid pt-4 px-4">
        <div class="card">
          <h3 class="text-dark card-header">School Details</h3>
          <div class="card-body">
            <h5 class="text-dark">Name - <span>Sri Dharmaloka College</span></h5>
            <hr>
            <h5 class="text-dark">Mobile - <span>0705321516</span></h5>
            <hr>
            <h5 class="text-dark">School Type - <span>1AB</span></h5>
            <hr>
            <h5 class="text-dark">Grades in School - <span>1-13</span></h5>
            <hr>
            <h5 class="text-dark">Address - <span>Sri Dharmaloka College, Waragoda Rd, Peliyagoda</span></h5>
            <hr>
            <h5 class="text-dark">Sector - <span>Kelaniya</span></h5>
            <hr>
            <h5 class="text-dark">Zone - <span>Kelaniya</span></h5>
          </div>
        </div>
      </div>
      <!-- Details End -->


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
        hamburger('search')
    </script>
</body>

</html>