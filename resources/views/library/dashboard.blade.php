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
    <div class="container-fluid" style="min-height: 80vh">
      <!-- Sale & Revenue Start -->
      <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
          <div class="col-sm-6 col-xl-6">
            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
              <i class="fa fa-chart-line fa-3x text-primary"></i>
              <div class="ms-3">
                <p class="mb-2">All Books</p>
                <h6 class="mb-0 text-dark">
                 28 453
                </h6>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-xl-6">
            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
              <i class="fa fa-chart-bar fa-3x text-primary"></i>
              <div class="ms-3">
                <p class="mb-2">Available Books</p>
                <h6 class="mb-0 text-dark">
                  23 123
                </h6>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Sale & Revenue End -->
      <hr />

      <!-- Sales Chart Start -->
      <div class="container-fluid pt-4 px-4">
        <div class="row g-2 bg-secondary rounded p-2">
          <h3 class="text-dark">Famous Books</h3>
          <div class="col-12">


                  <li class="list-group-item d-flex justify-content-between align-items-start">
                  <div class="ms-2 me-auto">
                    <div class="fw-bold">Famous Five</div>
                    Enid Blyton
                  </div>
                  <span class="badge bg-primary rounded-pill">97</span>
                </li>
            </ol>
          </div>
        </div>
      </div>
      <hr />

      <!-- Sales Chart End -->
      <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
          <div class="col-12">
            <div class="h-100 bg-secondary rounded p-4">
              <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0 text-dark">Calender</h6>
                <a href="">Today</a>
              </div>
              <div id="libraryCalender"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
      <!-- Widgets End -->

      @include('public_components.footer')
    </div>
    <!-- Content End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
  </div>

  <!-- JavaScript Libraries -->
  @include('public_components.js')

  <script>
    hamburger("dashboard");
    
       $('#libraryCalender').datetimepicker({
        inline: true,
        format: 'L'
    });
  </script>
</body>

</html>