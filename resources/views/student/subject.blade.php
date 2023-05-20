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
        @if($al == null)
        <div class="container-fluid pt-4 px-4">
          <div class="bg-secondary rounded p-4">
            <h3 class="card-header mb-4 text-dark">Grade 12 Selection of stream Subjects</h3>
            <div class="row g-4">

              <div class="col-sm-6 col-xl-6" id="AlFirstOption">
                <h5 class="mb-4 text-dark">Subject scheme select 01</h5>
                <div class="form-floating">
                  <select onchange="changeScheme(firstScheme, AlFirstOption, AlFirstOption_bucket_1, AlFirstOption_bucket_2, AlFirstOption_bucket_3)" class="form-select bg-secondary text-dark" id="firstScheme" aria-label="Floating label select example">
                    <option selected value="0">Open this select menu</option>
                    <option>Maths</option>
                    <option>Bio</option>
                    <option>Technology</option>
                    <option>Commerce</option>
                    <option>Art</option>
                    <option>NVQ</option>
                  </select>
                  <label for="floatingSelect">Choose a scheme</label>
                </div>
                <div class="form-floating">
                  <select class="mt-3 form-select bg-secondary text-dark" id="AlFirstOption_bucket_1" aria-label="Floating label select example">
                    <option selected value="0">Choose...</option>
                    
                  </select>
                  <label for="floatingSelect">First subject</label>
                </div>
                <div class="form-floating">
                  <select class="mt-3 form-select bg-secondary text-dark" id="AlFirstOption_bucket_2" aria-label="Floating label select example">
                    <option selected value="0">Choose...</option>

                  </select>
                  <label for="floatingSelect">Second subject</label>
                </div>
                <div class="form-floating">
                  <select class="mt-3 form-select bg-secondary text-dark" id="AlFirstOption_bucket_3" aria-label="Floating label select example">
                    <option selected value="0">Choose...</option>
                    
                  </select>
                  <label for="floatingSelect">Third subject</label>
                </div>
                <div class="form-floating">
                  <select class="mt-3 form-select bg-secondary text-dark" id="first_medium" aria-label="Floating label select example">
                    <option selected value="0">Choose...</option>
                    <option>Sinhala</option>
                    <option>English</option>
                    <option>Tamil</option>
                  </select>
                  <label for="floatingSelect">Medium</label>
                </div>
              </div>


              <div class="col-sm-6 col-xl-6" id="AlSecondOption">
                <h5 class="mb-4 text-dark">Subject scheme select 02</h5>
                <div class="form-floating">
                  <select onchange="changeScheme(secondScheme, AlSecondOption, AlSecondOption_bucket_1, AlSecondOption_bucket_2, AlSecondOption_bucket_3)" id="secondScheme" class="form-select bg-secondary text-dark" aria-label="Floating label select example">
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
                  <select class="mt-3 form-select bg-secondary text-dark" id="AlSecondOption_bucket_1" aria-label="Floating label select example">
                    <option selected value="0">Choose...</option>
                    
                  </select>
                  <label for="floatingSelect">First subject</label>
                </div>
                <div class="form-floating">
                  <select class="mt-3 form-select bg-secondary text-dark" id="AlSecondOption_bucket_2" aria-label="Floating label select example">
                    <option selected value="0">Choose...</option>
                    
                  </select>
                  <label for="floatingSelect">Second subject</label>
                </div>
                <div class="form-floating">
                  <select class="mt-3 form-select bg-secondary text-dark" id="AlSecondOption_bucket_3" aria-label="Floating label select example">
                    <option selected value="0">Choose...</option>
                    
                  </select>
                  <label for="floatingSelect">Third subject</label>
                </div>
                <div class="form-floating">
                  <select class="mt-3 form-select bg-secondary text-dark" id="seocond_medium" aria-label="Floating label select example">
                    <option selected value="0">Choose...</option>
                    <option>Sinhala</option>
                    <option>English</option>
                    <option>Tamil</option>
                  </select>
                  <label for="floatingSelect">Medium</label>
                </div>
              </div>
            </div>
            <button type="button" class="btn btn-primary mt-3" id="searchBtn" onclick="requestAlSubject();">
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

    function changeScheme(scheme, container, select_1, select_2, select_3) {
      select_1.innerHTML = "<option selected value='0'>Choose...</option>";
      select_2.innerHTML = "<option selected value='0'>Choose...</option>";
      select_3.innerHTML = "<option selected value='0'>Choose...</option>";
      if(scheme.value != '0') {
        var bucket_1;
        var bucket_2;
        var bucekt_3;
        if (scheme.value == "Maths") {
          bucket_1 = ["Combined Maths"];
          bucket_2 = ["Chemistry", "Information And Communication  Sinhala", "Information And Communication Technology English"];
          bucket_3 = ["Physics"];

        } else if (scheme.value == "Bio") {
          bucket_1 = ["Biology"];
          bucket_2 = ["Chemistry", "Information And Communication  Sinhala", "Information And Communication Technology English"];
          bucket_3 = ["Physics", "Agriculture"];

        } else if (scheme.value == "Commerce") {
          bucket_1 = ["Economics"];
          bucket_2 = ["Bussiness Studies", "Information And Communication  Sinhala", "Information And Communication Technology English"];
          bucket_3 = ["Accounting"];

        } else if (scheme.value == "Technology") {
          bucket_1 = ["Engineering Technology", "Bio System Technology"];
          bucket_2 = ["Science For Technology"];
          bucket_3 = ["Information And Communication  Sinhala", "Information And Communication Technology English", "Agriculture", "Art"];

        } else if (scheme.value == "Art") {
          bucket_1 = ["Sinhala", "History", "Drama", "Information And Communication Technology Sinhala", "Information And Communication Technology English", "Germen", "Geography"];
          bucket_2 = ["Media", "Art", "Dancing", "Easten Music", "Japanese", "Sanskrit", "Tamil", "Chinese", "Economic"];
          bucket_3 = ["Political Science", "English Literature", "Logic", "Buddhism", "Hinduism"];
        }else if (scheme.value == "NVQ") {
          bucket_1 = ["Graphic Designing", "Tourism And Hospitality", "Management", "Arts & Crafts"];
          bucket_2 = ["Computer Hardware", "Textile And Apparel Studies", "Health And Physical Education"];
          bucket_3 = ["Interior Designing", "Automobile Studies", "Child Psychology And Care"];
        }
        bucket_1.forEach(subject => {
          var option = document.createElement("option");
          option.text = subject;
          select_1.appendChild(option);
        });

        bucket_2.forEach(subject => {
          var option = document.createElement("option");
          option.text = subject;
          select_2.appendChild(option);
        });

        bucket_3.forEach(subject => {
          var option = document.createElement("option");
          option.text = subject;
          select_3.appendChild(option);
        });
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

    function requestAlSubject() {
      const firstContainer = document.getElementById("AlFirstOption");
      const secondContainer = document.getElementById("AlSecondOption");

      const firstScheme = document.getElementById("firstScheme");
      const secondScheme = document.getElementById("secondScheme");

      if(firstScheme.value == '0') {
        Swal.fire({
          icon: "warning",
          title: "WARNING",
          text: "Please Select At Least One Scheme",
        });
        return;
      } else {
        var isValid = true;
        var subjects_1 = firstContainer.querySelectorAll("select");
        subjects_1.forEach(subject => {
          if(subject.value == '0') {
            subject.classList.add("is-invalid");
            isValid = false;
          } else {
            subject.classList.remove("is-invalid");
          }
        });
        if(!isValid) {
          Swal.fire({
            icon: "warning",
            title: "WARNING",
            text: "Please Select All The Subjects",
          });
          return;
        } 
        if(secondScheme.value != '0') {
          var isValid = true;
          var subjects_2 = secondContainer.querySelectorAll("select");
          subjects_2.forEach(subject => {
            if(subject.value == '0') {
              subject.classList.add("is-invalid");
              isValid = false;
            } else {
              subject.classList.remove("is-invalid");
            }
          });
          if(!isValid) {
            Swal.fire({
              icon: "warning",
              title: "WARNING",
              text: "Please Select All The Subjects",
            });
            return;
          } 
          const request = {
            "type": "two",
            "scheme": firstScheme.value,
            "first" : {
              "subject_1": subjects_1[0].value,
              "subject_2": subjects_1[1].value,
              "subject_3": subjects_1[2].value,
            },
            "first_medium": subjects_1[3].value,
            "second" : {
              "subject_1": subjects_2[0].value,
              "subject_2": subjects_2[1].value,
              "subject_3": subjects_2[2].value,
            },
            "second_medium": subjects_2[3].value,
          };
          sendAlRequest(JSON.stringify(request));
        } else {
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
                "scheme": firstScheme.value,
                "subjects" : {
                  "subject_1": subjects_1[0].value,
                  "subject_2": subjects_1[1].value,
                  "subject_3": subjects_1[2].value,
                },
                "medium": subjects_1[3].value,
              };
              sendAlRequest(JSON.stringify(request));
            } 
          })
        }
      }
    }

    function sendAlRequest(json) {
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

      xhr.open("POST", "{{ route('request.al.subject') }}");
      xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').content);
      xhr.send(form);
    }
  </script>

</body>

</html>