<!DOCTYPE html>
<html lang="en">

<head>
    @include("teacher.components.head")
</head>

<body style="background-color: #f3f3f3">
  <div class="container-fluid position-relative d-flex p-0">
    @include('public_components.spinner')
    @include("teacher.components.hamburger")

    <!-- Content Start -->
    <div class="content">
        @include('teacher.components.navbar')

      <div class="container-fluid pt-4 px-4" style="overflow-x: hidden">
        <div class="row bg-secondary p-3">
          <h3 class="text-dark">Request For Leaves</h3>
          <hr />
          <div class="col-12 d-flex justify-content-end">
            <p class="text-danger">
              You Have Remaining
              <span id="remainingCount">
                {{ $sick_leaves }}
              </span> Sick
              Leaves
            </p>
          </div>

          <div class="col-12 d-flex justify-content-end">
            <p class="text-danger">
              You Have Remaining
              <span id="remainingCasualCount">
                {{ 20 - $casual_leaves }}
              </span> Casual
              Leaves
            </p>
          </div>
          <div class="alert alert-success col-md-8 col-12 offset-md-2" role="alert">
            <h4 class="alert-heading">Notice!</h4>
            <p>
              You are eligible for up to 20 sick leaves per Year. Any unused
              sick leaves can be accumulated and used within a period of 3
              years.
            </p>
            <hr />
            <p class="mb-0">
              Casual vacations can only be granted to a maximum of 5 teachers
              per day and 21 leaves for a teacher per year. Please note that casual
              vacations can be cancelled if the teacher is required to attend
              an urgent meeting or for any other unforeseen circumstances.
            </p>
          </div>

          <span class="offset-md-2">Select Leaves Type</span>
          <div class="col-md-8 col-12 offset-md-2">
            <div class="input-group mb-3">
              <select class="form-select form-select-lg mb-3 bg-secondary text-dark"
                aria-label=".form-select-lg example" id="vocationType" onchange="vocationTypeChange();">
                <option selected value="0">Open this select menu</option>
                <option value="1">Casual Leave</option>
                <option value="2">Sick Leave</option>
              </select>
            </div>
          </div>

          <div class="col-12 d-none" id="casualContainer">
            <div class="row">
              <div class="col-md-8 col-12 offset-md-2">
                <div class="input-group mb-3">
                  <span class="input-group-text" id="basic-addon1">Set a Date
                  </span>
                  <input type="date" class="form-control text-dark bg-secondary" placeholder="Set a Date"
                    aria-label="Username" aria-describedby="basic-addon1" id="date" />
                </div>
              </div>
              <div class="mb-3 col-md-8 col-12 offset-md-2">
                <div class="input-group mb-3">
                  <select id="reason" class="form-select form-select-md mb-3 bg-secondary text-dark"
                    onchange="showModal();" aria-label=".form-select-lg example">
                    <option selected>Open this select menu</option>
                    <option value="Marrige">Marrige</option>
                    <option value="Death">Death</option>
                    <option value="Religious Seremony">
                      Religious Seremony
                    </option>
                    <option value="Profetional Development">
                      Profetional Development
                    </option>
                    <option value="family Recent">family Recent</option>
                    <option value="6" data-bs-toggle="modal" data-bs-target="#exampleModal" id="customReason">
                      Other
                    </option>
                  </select>
                </div>
              </div>
            </div>
          </div>

          <div class="button-group mb-3 offset-md-2">
            <button type="button" class="btn btn-primary" onclick="sendRequest();">
              Request
            </button>
          </div>

          <!--Modal start-->
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title text-dark" id="exampleModalLabel">
                    Custom Reason
                  </h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    onclick="closeModal();"></button>
                </div>
                <div class="modal-body">
                  <div class="input-group flex-nowrap">
                    <input type="text" class="form-control bg-secondary text-dark" placeholder="Enter You Reason"
                      aria-label="Username" aria-describedby="addon-wrapping" id="reasonText" />
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn" style="background-color: #3495eb; color: white"
                    data-bs-dismiss="modal" onclick="setReason();">
                    Set
                  </button>
                </div>
              </div>
            </div>
          </div>
          <hr>
          <div class="row mt-3">
            <div class="col-12">
              <h3 class="text-dark">List OF My Leaves</h3>
            </div>
            <hr>
            <div class="col-12">
              <div class="table-responsive">
                <table class="table table-bordered">
                  <thead class="table-dark">
                    <th>No</th>
                    <th>Date</th>
                    <th>Action</th>
                  </thead>

                  <tbody>
                    @foreach ($leaves_data as $key => $data)
                      <tr>
                        <td class="text-dark">{{ $key + 1 }}</td>
                        <td class="text-dark">{{ $data->date }}</td>
                        <td>
                          @if ($data->status == 'pending')
                            <form method="post" action="{{ route('teacher.reject.leaves', [ 'id' => $data->_id ]) }}">
                              @method("patch")
                              @csrf
                              <button class="btn btn-danger">Pending</button>
                            </form>
                          @elseif ($data->status == 'accepted')
                            <button class="btn btn-danger disabled">Accepted</button>
                          @elseif ($data->status == 'rejected')
                            <button class="btn btn-danger disabled">Rejected</button>
                          @endif
                        </td>
                      </tr>
                    @endforeach

                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

      @include('public_components.footer')
    </div>
    <!-- Content End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
  </div>

    @include('public_components.js')
  <script>
    hamburger("leaves");

    function holdBackRequest(Button) {
      var xhr = new XMLHttpRequest();
      xhr.open("GET", "process/holdBackRequest.php?id=" + Button.dataset.id + "", true);
      xhr.send();

      xhr.onreadystatechange = function () {
        if (xhr.readyState == 4) {
          // handle response
          document.getElementById("row" + Button.dataset.id).classList.add("d-none");
        }
      }
    }

    function showModal() {
      const reason = document.getElementById("reason");
      var modal = document.getElementById("exampleModal");
      if (reason.value == "6") {
        $("#exampleModal").modal("show");
      } else {
        $("#exampleModal").modal("hide");
      }
    }

    function vocationTypeChange() {
      const type = document.getElementById("vocationType");
      const container = document.getElementById("casualContainer");

      if (type.value == "1") {
        container.classList.remove("d-none");
      } else {
        container.classList.add("d-none");
      }
    }

    function closeModal() {
      document.getElementById("exampleModal").classList.remove("show");
      document.getElementById("exampleModal").style.display = "none";
    }

    function setReason() {
      const custom = document.getElementById("customReason");
      const reason = document.getElementById("reason");
      const text = document.getElementById("reasonText");

      if (text.value.trim() == "") {
        Swal.fire({
          icon: "warning",
          title: "WARNING",
          text: "Type A Custom Reason First",
        });
      } else {
        custom.innerHTML = text.value;
        document.getElementById("exampleModal").classList.remove("show");
        document.getElementById("exampleModal").style.display = "none";
      }
    }

    function sendRequest() {
      const spinner = document.getElementById("spinner")
      const type = document.getElementById("vocationType");
      if (type.value == "0") {
        Swal.fire({
          icon: "warning",
          title: "WARNING",
          text: "Please Select A Vocation Category",
        });
      } else {
        spinner.classList.add("show");
        var form = new FormData();
        if (type.value == "1") {
          const date = document.getElementById("date");
          var reason = document.getElementById("reason").value;
          if (reason == "6") {
            reason = document.getElementById("customReason").innerHTML;
          }
          form.append("type", "casual");
          form.append("date", date.value);
          form.append("reason", reason);
        } else {
          form.append("type", "sick");
        }
        form.append("nic", "{{ auth()->user()->index }}");

        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
          if (xhr.readyState == 4 && xhr.status == 200) {
            var response = xhr.responseText;
            if(response == "error") {
                Swal.fire({
                    icon: "error",
                    title: "Oops",
                    text: "Something Went Wrong",
                    footer: "<a href='http://wa.me/94701189971'>Contact Developers Here</a>"
                });
            } else if(response == 'success') {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'You Requested A Leave',
                    showConfirmButton: false,
                    timer: 1500
                })
                setTimeout(() => {
                    location.reload();
                }, 2);
            } else if(response == "noLeaves") {
              Swal.fire({
                    icon: "warning",
                    title: "WARNING",
                    text: "You Haven't Any Leaves Left",
                });
            } else if(response == "already") {
              Swal.fire({
                    icon: "warning",
                    title: "WARNING",
                    text: "You Haven Already Got A Leave Today",
                });
            } else if(response == "casualAlready") {
              Swal.fire({
                    icon: "warning",
                    title: "WARNING",
                    text: "You Haven Already Got A Leave That Day",
                });
            }
            spinner.classList.remove("show");
          } 
        };

        xhr.open("POST", "{{ route('request.leaves') }}");
        xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').content);
        xhr.send(form);
      }
    }
  </script>
</body>

</html>