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
            <h3 class="mb-4 text-dark">Create a Table</h3>
            <div class="row g-2">
              <div class="col-sm-12 col-md-6">
                <div class="form-floating">
                  <input type="number" class="form-control bg-secondary text-dark" id="row" placeholder="row">
                  <label for="floatingPassword">Row</label>
                </div>
              </div>
              <div class="col-sm-12 col-md-6">
                <div class="form-floating">
                  <input type="number" class="form-control bg-secondary text-dark" id="column" placeholder="Column">
                  <label for="floatingPassword">Column</label>
                </div>
              </div>
              <div class="col-sm-12 col-md-6">
                <button type="submit" class="btn btn-primary col-12">Generate</button>
              </div>
              <div class="col-sm-12 col-md-6">
                <button type="submit" class="btn btn-primary col-12">Clear</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Search End -->


      <!-- 6 - 11 Table Start -->
      <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary rounded p-4">
          <h3 class="card-header mb-4 text-dark">Add Teacher Count</h3>
          <div class="row g-4">

            <div class="col-sm-12 col-xl-12" id="AlFirstOption">
              <div class="table-responsive">
                <table class="table table-bordered text-center">
                  <thead>
                    <tr>
                      <th scope="col">Subjects</th>
                      <th scope="col">Total Teachers</th>
                      <th scope="col">Total Teachers</th>
                      <th scope="col">Total Teachers</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td scope="row">ss</th>
                      <td>ss</td>
                      <td>ss</td>
                      <td>ss</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- 6 - 11 Table End -->


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

    hamburger('teacherCountAdd')
    create a function to generate the table using buttons
    function generateTable() {
      var row = document.getElementById("row").value;
      var column = document.getElementById("column").value;
      var table = document.getElementById("AlFirstOption");
      var tableBody = document.createElement('tbody');
      tableBody.setAttribute("id", "tableBody");
      table.appendChild(tableBody);
      for (var i = 0; i < row; i++) {
        var tr = document.createElement('tr');
        tableBody.appendChild(tr);
        for (var j = 0; j < column; j++) {
          var td = document.createElement('td');
          td.appendChild(document.createTextNode("Cell " + i + "," + j));
          tr.appendChild(td);
        }
      }
    }

    function clearTable() {
      var table = document.getElementById("AlFirstOption");
      var tableBody = document.getElementById("tableBody");
      table.removeChild(tableBody);
    }

  </script>
</body>

</html>