<!DOCTYPE html>
<html lang="en">

<head>
  @include('student.components.head')
</head>

<body>
  <div class="container-fluid position-relative d-flex p-0">
    <!-- Spinner Start -->
    @include('public_components.spinner')
    <!-- Spinner End -->


    <!-- Sidebar Start -->
    @include('student.components.hamburger')
    <!-- Sidebar End -->


    <!-- Content Start -->
    <div class="content">
      <!-- Navbar Start -->
      @include('student.components.navbar')
      <!-- Navbar End -->

      <div style="min-height: 80vh;">
        <!-- Warning Start -->
        <div class="container-fluid pt-4 px-4">
          <h4 class="fw-bold pb-3"><span class="text-dark fw-light">Request For The Bucket Subjects</span></h4>
          @if($aesthetic == null && $ol == null && $al == null)
          <div class="alert alert-warning rounded p-4">
            <h5 class="alert-heading">Subject Request Feature Not Active</h5>
            The subject request feature is not available for your grade level. Please contact the school administration
            for further information.
          </div>
          @else
          <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">Dear Students,</h4>
            <p>You have not completed your course registration for the upcoming semester. Please complete your
              registration as soon as possible to avoid any delays in your academic progress. If you have any questions or
              concerns regarding the registration process, please contact the student services office for assistance.</p>
            <hr>
            <p class="mb-0">Thank you for your attention, and we wish you all the best for the upcoming semester.</p>
          </div>
          @endif
        </div>
        <!-- Warning End -->


        <!-- Grade 6 start -->
        @if($aesthetic != null)
        <div class="container-fluid pt-4 px-4">
          <div class="bg-secondary rounded p-4">
            <h3 class="card-header mb-4 text-dark">Grade 6 Selection of Bucket Subjects</h3>
            <div class="row g-4">

              <div class="col-sm-6 col-xl-6">
                <div class="form-floating">
                  <select class="mt-3 form-select bg-secondary text-dark" id="aestheticSubject" aria-label="Floating label select example">
                    <option selected value="0">Choose...</option>
                    <option>Art</option>
                    <option>Dancing</option>
                    <option>Western Music</option>
                    <option>Easten Music</option>
                    <option>Drama</option>
                  </select>
                  <label for="floatingSelect">Select Aesthetic Subject</label>
                </div>
              </div>


              <div class="col-sm-6 col-xl-6">
                <div class="form-floating">
                  <select class="mt-3 form-select bg-secondary text-dark" id="medium" aria-label="Floating label select example">
                    <option selected value="0">Select A Medium</option>
                    <option>Sinhala</option>
                    <option>English</option>
                    <option>Tamil</option>
                  </select>
                  <label for="floatingSelect">Select A Medium</label>
                </div>
              </div>
            </div>
            <button type="button" class="btn btn-primary mt-3" id="searchBtn" onclick="aestheticRequest();">
              Request
            </button>
          </div>
        </div>
        @endif
        <!-- Grade 6 End -->


        <!-- Grade 10 start -->
        @if($ol != null)
        <div class="container-fluid pt-4 px-4">
          <div class="bg-secondary rounded p-4">
            <h3 class="card-header mb-4 text-dark">Grade 10 Selection of Bucket Subjects</h3>
            <div class="row g-4">

              <div class="col-sm-6 col-xl-6" id="firstChoice">
                <h5 class="mb-4 text-dark text-center">Your First Choice</h5>
                <hr/>
                <div class="form-floating">
                  <select class="mt-3 form-select bg-secondary text-dark" id="floatingSelect" aria-label="Floating label select example">
                    <option selected value="0">Choose...</option>
                    @foreach ($bucket_1 as $subject)
                      <option>{{ $subject }}</option>
                    @endforeach
                  </select>
                  <label for="floatingSelect">First subject</label>
                </div>
                <div class="form-floating">
                  <select class="mt-3 form-select bg-secondary text-dark" id="floatingSelect" aria-label="Floating label select example">
                    <option selected value="0">Choose...</option>
                    @foreach ($bucket_2 as $subject)
                      <option>{{ $subject }}</option>
                    @endforeach
                  </select>
                  <label for="floatingSelect">Second subject</label>
                </div>
                <div class="form-floating">
                  <select class="mt-3 form-select bg-secondary text-dark" id="floatingSelect" aria-label="Floating label select example">
                    <option selected value="0">Choose...</option>
                    @foreach ($bucket_3 as $subject)
                      <option>{{ $subject }}</option>
                    @endforeach
                  </select>
                  <label for="floatingSelect">Third subject</label>
                </div>
                <div class="form-floating">
                  <select class="mt-3 form-select bg-secondary text-dark" id="floatingSelect" aria-label="Floating label select example">
                    <option selected value="0">Choose...</option>
                    <option>Sinhala</option>
                    <option>English</option>
                    <option>Tamil</option>
                  </select>
                  <label for="floatingSelect">Select A Medium</label>
                </div>
              </div>


              <div class="col-sm-6 col-xl-6" id="secondChoice">
                <h5 class="mb-4 text-dark text-center">Your Second Choice</h5>
                <hr/>
                <div class="form-floating">
                  <select class="mt-3 form-select bg-secondary text-dark" id="secondChoiceFirstSubject" aria-label="Floating label select example">
                    <option selected value="0">Choose...</option>
                    <@foreach ($bucket_1 as $subject)
                      <option>{{ $subject }}</option>
                    @endforeach
                  </select>
                  <label for="floatingSelect">First subject</label>
                </div>
                <div class="form-floating">
                  <select class="mt-3 form-select bg-secondary text-dark" id="floatingSelect" aria-label="Floating label select example">
                    <option selected value="0">Choose...</option>
                    @foreach ($bucket_2 as $subject)
                      <option>{{ $subject }}</option>
                    @endforeach
                  </select>
                  <label for="floatingSelect">Second subject</label>
                </div>
                <div class="form-floating">
                  <select class="mt-3 form-select bg-secondary text-dark" id="floatingSelect" aria-label="Floating label select example">
                    <option selected value="0">Choose...</option>
                    @foreach ($bucket_3 as $subject)
                      <option>{{ $subject }}</option>
                    @endforeach
                  </select>
                  <label for="floatingSelect">Third subject</label>
                </div>
                <div class="form-floating">
                  <select class="mt-3 form-select bg-secondary text-dark" id="floatingSelect" aria-label="Floating label select example">
                    <option selected value="0">Choose...</option>
                    <option>Sinhala</option>
                    <option>English</option>
                    <option>Tamil</option>
                  </select>
                  <label for="floatingSelect">Select A Medium</label>
                </div>
              </div>
            </div>
            <button type="button" class="btn btn-primary mt-3" id="searchBtn" onclick="requestOlSubjects();">
              Request
            </button>
          </div>
        </div>
        @endif
        <!-- Grade 10 End -->


        <!-- Grade 12 start -->
        @if($al != null)
        <div class="container-fluid pt-4 px-4">
          <div class="bg-secondary rounded p-4">
            <h3 class="card-header mb-4 text-dark">Grade 12 Selection of stream Subjects</h3>
            <div class="row g-4">

              <div class="col-sm-6 col-xl-6">
                <h5 class="mb-4 text-dark">Subject scheme select 01</h5>
                <div class="form-floating">
                  <select class="form-select bg-secondary text-dark" id="floatingSelect" aria-label="Floating label select example">
                    <option selected value="0">Open this select menu</option>
                    <option>Maths</option>
                    <option>Bio</option>
                    <option>Commerce</option>
                    <option>Technology</option>
                    <option>Art</option>
                    <option>NVQ</option>
                  </select>
                  <label for="floatingSelect">Choose a scheme</label>
                </div>
                <div class="form-floating">
                  <select class="mt-3 form-select bg-secondary text-dark" id="floatingSelect" aria-label="Floating label select example">
                    <option selected value="0">Choose...</option>
                    <option value="1">Art</option>
                    <option value="2">Dance</option>
                    <option value="3">Music</option>
                    <option value="3">drama</option>
                  </select>
                  <label for="floatingSelect">First subject</label>
                </div>
                <div class="form-floating">
                  <select class="mt-3 form-select bg-secondary text-dark" id="floatingSelect" aria-label="Floating label select example">
                    <option selected value="0">Choose...</option>
                    <option value="1">Art</option>
                    <option value="2">Dance</option>
                    <option value="3">Music</option>
                    <option value="3">drama</option>
                  </select>
                  <label for="floatingSelect">Second subject</label>
                </div>
                <div class="form-floating">
                  <select class="mt-3 form-select bg-secondary text-dark" id="floatingSelect" aria-label="Floating label select example">
                    <option selected value="0">Choose...</option>
                    <option value="1">Art</option>
                    <option value="2">Dance</option>
                    <option value="3">Music</option>
                    <option value="3">drama</option>
                  </select>
                  <label for="floatingSelect">Third subject</label>
                </div>
              </div>


              <div class="col-sm-6 col-xl-6">
                <h5 class="mb-4 text-dark">Subject scheme select 02</h5>
                <div class="form-floating">
                  <select class="form-select bg-secondary text-dark" id="floatingSelect" aria-label="Floating label select example">
                    <option selected value="0">Open this select menu</option>
                    <option>Maths</option>
                    <option>Bio</option>
                    <option>Commerce</option>
                    <option>Technology</option>
                    <option>Art</option>
                    <option>NVQ</option>
                  </select>
                  <label for="floatingSelect">Choose a scheme</label>
                </div>
                <div class="form-floating">
                  <select class="mt-3 form-select bg-secondary text-dark" id="floatingSelect" aria-label="Floating label select example">
                    <option selected value="0">Choose...</option>
                    <option value="1">Art</option>
                    <option value="2">Dance</option>
                    <option value="3">Music</option>
                    <option value="3">drama</option>
                  </select>
                  <label for="floatingSelect">First subject</label>
                </div>
                <div class="form-floating">
                  <select class="mt-3 form-select bg-secondary text-dark" id="floatingSelect" aria-label="Floating label select example">
                    <option selected value="0">Choose...</option>
                    <option value="1">Art</option>
                    <option value="2">Dance</option>
                    <option value="3">Music</option>
                    <option value="3">drama</option>
                  </select>
                  <label for="floatingSelect">Second subject</label>
                </div>
                <div class="form-floating">
                  <select class="mt-3 form-select bg-secondary text-dark" id="floatingSelect" aria-label="Floating label select example">
                    <option selected value="0">Choose...</option>
                    <option value="1">Art</option>
                    <option value="2">Dance</option>
                    <option value="3">Music</option>
                    <option value="3">drama</option>
                  </select>
                  <label for="floatingSelect">Third subject</label>
                </div>
              </div>
            </div>
            <button type="button" class="btn btn-primary mt-3" id="searchBtn" onclick="grade12Request();">
              Request
            </button>
          </div>
        </div>
        @endif
        <!-- Grade 12 End -->
      </div>

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
    hamburger("subject");

    function changeScheme() {
      const scheme = document.getElementById("scheme");
      if (scheme.value == '0') {
        const container = document.getElementById("alContainer");
        var selectors = container.querySelectorAll("select");
        selectors.forEach(select => {
          var options = select.querySelectorAll('option');
          options.forEach(option => {
            if (option.value != 0) {
              option.remove();
            }
          });
        });
      } else {
        if (scheme.value == "Maths") {

        } else if (scheme.value == "Bio") {

        } else if (scheme.value == "Commerce") {
          const bucket_1 = ["Accounting", "Bussiness Studies", "Economics"];
          const bucket_2 = ["Accounting", "Bussiness Studies", "Economics"];
          const bucket_3 = ["Economics", "Business statistics", "Political science", "History", "Logic and Scientific Method", "English", "Germen", "French", "Agriculture", "Combined Maths", "ICT"];

        } else if (scheme.value == "Technology") {

        } else if (scheme.value == "Art") {

        } else if (scheme.value == "NVQ") {

        }
      }
    }

    function aestheticRequest() {
      const subject = document.getElementById("aestheticSubject");
      const medium = document.getElementById("medium");
      if (subject.value == '0' || medium.value == '0') {
        Swal.fire({
          icon: "warning",
          title: "WARNING",
          text: "Please Select A Subject And A Medium",
        });
      } else {
        var form = new FormData();
        form.append("subject", subject.value);
        form.append("medium", medium.value);

        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
          if(xhr.readyState == 4 && xhr.status == 200) {
            location.reload();
          }
        }

        xhr.open("POST", "{{ route('request.aesthetic.subject') }}");
        xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').content);
        xhr.send(form);
      }
    }

    function requestOlSubjects() {
      const firstChoice = document.getElementById("firstChoice");
      const secondChoice = document.getElementById("secondChoice");
      var isValid = true;

      var firstSubjects = firstChoice.querySelectorAll("select");
      firstSubjects.forEach(subject => {
        if(subject.value == "0") {
          subject.classList.add("is-invalid");
          isValid = false;
        } else {
          subject.classList.remove("is-invalid");
        }
      });
      if($("#secondChoiceFirstSubject").val() != "0") {
        var secondSubjects = secondChoice.querySelectorAll("select");
        secondSubjects.forEach(subject => {
          if(subject.value == "0") {
            subject.classList.add("is-invalid");
            isValid = false;
          } else {
            subject.classList.remove("is-invalid");
          }
        })
      } else if($("#secondChoiceFirstSubject").val() == "0" && isValid){
        isValid = false;
        Swal.fire({
          title: 'Do you want to select only one choice and move on?',
          showDenyButton: true,
          showCancelButton: true,
          confirmButtonText: 'Save',
          denyButtonText: `Don't save`,
        }).then((result) => {
          if (result.isConfirmed) {
            const request = {
              "type": "one",
              "subjects" : {
                "subject_1": firstSubjects[0].value,
                "subject_2": firstSubjects[1].value,
                "subject_3": firstSubjects[2].value,
              },
              "medium": firstSubjects[3].value
            };
            sendOlRequest(JSON.stringify(request));
          } 
        })
      }
      if(isValid) {
        const request = {
          "type": "two",
          "first": {
            "subject_1": firstSubjects[0].value,
            "subject_2": firstSubjects[1].value,
            "subject_3": firstSubjects[2].value,
          },
          "first_medium": firstSubjects[3].value,
          "second": {
            "subject_1": secondSubjects[0].value,
            "subject_2": secondSubjects[1].value,
            "subject_3": secondSubjects[2].value,
          },
          "second_medium": secondSubjects[3].value,
        };
        sendOlRequest(JSON.stringify(request));
      }
    }

    function sendOlRequest(json) {
      var form = new FormData();
      const spinner = document.getElementById("spinner");
      spinner.classList.add("show");
      form.append("data", json);

      var xhr = new XMLHttpRequest();
      xhr.onreadystatechange = function() {
        if(xhr.readyState == 4 && xhr.status == 200) {
          var response = xhr.responseText;
          if(response == "success") {
            Swal.fire({
              position: 'top-end',
              icon: 'success',
              title: 'Subjects Requested Successfull',
              showConfirmButton: false,
              timer: 1500
            });
            setTimeout(() => {
              location.reload();
            }, 2);
          } else if(response == "already"){
            Swal.fire(
              'Already Exists',
              'You Have Already Send An Request Previously',
              'warning'
            )
          }
          spinner.classList.remove("show");
        }
      }

      xhr.open("POST", "{{ route('request.ol.subject') }}");
      xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').content);
      xhr.send(form);
    }
  </script>

</body>

</html>