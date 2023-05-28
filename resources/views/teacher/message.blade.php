<!DOCTYPE html>
<html lang="en">

<head>
    @include('teacher.components.head')
</head>

<body>
  <div class="container-fluid position-relative d-flex p-0">
    <!-- Spinner Start -->
    @include('public_components.spinner')
    <!-- Spinner End -->


    <!-- Sidebar Start -->
    @include('teacher.components.hamburger')
    <!-- Sidebar End -->


    <!-- Content Start -->
    <div class="content">
      <!-- Navbar Start -->
      @include('teacher.components.navbar')
      <!-- Navbar End -->


      <!-- Widget Start -->
      <div class="container-fluid pt-4 px-4">
        <div class="row g-4 bg-secondary mt-1 px-4 pt-2 pb-3 rounded-5" style="min-height: 80vh">
          <div class="col-12">
            <h3 class="text-dark">Send Broadcast Message</h3>
            <div class="form-floating text-dark bg-secondary">
              <select class="form-select text-dark bg-secondary" id="senderType"
                aria-label="Floating label select example" onclick="messageTypeChange();">
                <option selected value="0">Open this select menu</option>
                <option value="1">For All Student In Class</option>
                <option value="2">For Specific Students</option>
              </select>
              <label for="floatingSelect">Who Need To Get This Message</label>
            </div>

            <!-- all student start  -->

            <div class="row mt-2 d-none" id="allStudentUi">
              <h5 class="text-dark mt-3">
                Send Message For All Students In Your Class
              </h5>
              <div class="col-12">
                <div class="row">
                  <div class="col-12">
                    <div class="form-floating">
                      <select onchange="messageCategory();" id="messageType" class="form-select bg-secondary text-dark"
                        id="floatingSelect" aria-label="Floating label select example">
                        <option selected value="0">
                          Open this select menu
                        </option>
                        <option value="1">Parents Meeting</option>
                        <option value="2">General meeting</option>
                        <option value="3">Excursion plans</option>
                        <option value="4">Exam Details</option>
                        <option value="5">Custom Message</option>
                      </select>
                      <label for="floatingSelect">Select Message Catogary</label>
                    </div>
                  </div>
                </div>

                <!-- parents meeting start  -->
                <div class="row mt-2 d-none" id="parentContainer">
                  <div class="col-md">
                    <div class="input-group mb-3">
                      <span class="input-group-text bg-dark" id="basic-addon1" style="color: white">Date of
                        meeting</span>
                      <input type="date" id="parentsMeetingDate" class="form-control bg-secondary text-dark"
                        placeholder="Choose A Date" aria-label="Username" aria-describedby="basic-addon1" />
                    </div>
                  </div>

                  <div class="col-md">
                    <div class="input-group mb-3">
                      <span class="input-group-text bg-dark" id="basic-addon1" style="color: white">Time of
                        meeting</span>
                      <input type="time" id="parentsMeetingTime" class="form-control bg-secondary text-dark"
                        placeholder="Choose A Time" aria-label="Username" aria-describedby="basic-addon1" />
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="input-group mb-3">
                      <span class="input-group-text bg-dark" id="basic-addon1" style="color: white">Place</span>
                      <input type="text" id="parentsMeetingPlace" class="form-control bg-secondary text-dark"
                        placeholder="Ex: Class/ Mail Hall" aria-label="Username" aria-describedby="basic-addon1" />
                    </div>
                  </div>

                  <div class="d-grid gap-2 col-6 mx-auto">
                    <button class="btn btn-primary" type="button" onclick="sendMessageToAll();">
                      Send Message
                    </button>
                  </div>
                </div>
                <!-- parents meeting end  -->


                <!-- general meeting start  -->
                <div class="row mt-2 d-none" id="generalContainer">
                  <div class="col-md-6 col-12">
                    <div class="input-group mb-3">
                      <span class="input-group-text bg-dark" id="basic-addon1" style="color: white">Date Of
                        Meeting</span>
                      <input name="generalInputs" type="date" class="form-control bg-secondary text-dark"
                        placeholder="Choose A Date" aria-label="Username" aria-describedby="basic-addon1"
                        id="generalDate" />
                    </div>
                  </div>

                  <div class="col-md-6 col-12">
                    <div class="input-group mb-3">
                      <span class="input-group-text bg-dark" id="basic-addon1" style="color: white">Time Of
                        Meeting</span>
                      <input name="generalInputs" type="time" class="form-control bg-secondary text-dark"
                        placeholder="Choose A Time" aria-label="Username" aria-describedby="basic-addon1"
                        id="generalTime" />
                    </div>
                  </div>

                  <div class="col-md-6 col-12">
                    <div class="input-group mb-3">
                      <span class="input-group-text bg-dark" id="basic-addon1" style="color: white">Subject Of
                        Meeting</span>
                      <input name="generalInputs" type="text" class="form-control bg-secondary text-dark"
                        placeholder="Enter A Subject" aria-label="Username" aria-describedby="basic-addon1"
                        id="generalSubject" />
                    </div>
                  </div>

                  <div class="col-md-6 col-12">
                    <div class="input-group mb-3">
                      <span class="input-group-text bg-dark" id="basic-addon1" style="color: white">Place</span>
                      <input name="generalInputs" type="text" class="form-control bg-secondary text-dark"
                        placeholder="Enter A Place" aria-label="Username" aria-describedby="basic-addon1"
                        id="generalPlace" />
                    </div>
                  </div>

                  <div class="d-grid gap-2 col-6 mx-auto">
                    <button class="btn btn-primary" type="button" onclick="sendMessageToAll();">
                      Send Message
                    </button>
                  </div>
                </div>
                <!-- general meeting end  -->


                <!-- trip plan start  -->
                <div class="row mt-2 d-none" id="tripContainer">
                  <div class="col-md-6">
                    <div class="input-group mb-3">
                      <span style="width: 130px" class="input-group-text" id="basic-addon1"
                        style="color: white">Date</span>
                      <input type="date" name="tripInputs" class="form-control text-dark bg-secondary"
                        placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" id="tripDate" />
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="input-group mb-3">
                      <span style="width: 130px" class="input-group-text" id="basic-addon1"
                        style="color: white">Time</span>
                      <input type="time" name="tripInputs" class="form-control text-dark bg-secondary"
                        placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" id="tripTime" />
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="input-group mb-3">
                      <span style="width: 130px" class="input-group-text" id="basic-addon1"
                        style="color: white">Amount</span>
                      <input type="text" name="tripInputs" class="form-control text-dark bg-secondary"
                        placeholder="Ex: Rs. 1000" aria-label="Username" aria-describedby="basic-addon1"
                        id="tripAmount" />
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="input-group mb-3">
                      <span style="width: 130px" class="input-group-text" id="basic-addon1" style="color: white">Place
                        To Come</span>
                      <input type="text" name="tripInputs" class="form-control text-dark bg-secondary"
                        placeholder="Enter A Place" aria-label="Username" aria-describedby="basic-addon1"
                        id="tripPlace" />
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="input-group mb-3">
                      <span style="width: 130px" class="input-group-text" id="basic-addon1"
                        style="color: white">Duration</span>
                      <input type="text" name="tripInputs" class="form-control text-dark bg-secondary"
                        placeholder="Ex: one day" aria-label="Username" aria-describedby="basic-addon1"
                        id="tripDuration" />
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="input-group mb-3">
                      <span style="width: 130px" class="input-group-text" id="basic-addon1"
                        style="color: white">Viewpoints</span>
                      <input type="text" name="tripInputs" class="form-control text-dark bg-secondary"
                        placeholder="Ex: Anuradhapura, Polonnaruwa" aria-label="Username"
                        aria-describedby="basic-addon1" id="viewpoints" />
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="input-group mb-3">
                      <span class="input-group-text" style="width: 180px" id="basic-addon1" style="color: white">Things
                        To Take Away</span>
                      <input type="text" name="tripInputs" class="form-control text-dark bg-secondary"
                        placeholder="Ex: Breakfast, Launch" aria-label="Username" aria-describedby="basic-addon1"
                        id="tripThings" />
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="input-group mb-3">
                      <span class="input-group-text" style="width: 180px" id="basic-addon1" style="color: white">Payment
                        Deadline</span>
                      <input type="date" name="tripInputs" class="form-control text-dark bg-secondary"
                        aria-label="Username" aria-describedby="basic-addon1" id="tripPaymentEnd" />
                    </div>
                  </div>

                  <div class="d-grid gap-2 col-6 mx-auto">
                    <button class="btn btn-primary" type="button" onclick="sendMessageToAll();">
                      Send Message
                    </button>
                  </div>
                </div>
                <!-- trip plan end  -->


                <!-- exam details start  -->
                <div class="row mt-2 d-none" id="examContainer">
                  <div class="col-12" id="subjectContainer">
                    <hr />
                    <div class="row mb-2">
                      <div class="col-12">
                        <div class="form-floating">
                          <select class="form-select bg-secondary text-dark" id="examType"
                            aria-label="Floating label select example">
                            <option selected value="0">
                              Open this select menu
                            </option>
                            <option value="1">Monthly Test</option>
                            <option value="2">Term Test</option>
                          </select>
                          <label for="floatingSelect">Select Exam Category</label>
                        </div>
                      </div>
                    </div>
                    <div class="row rounded bg-warning border px-2 py-1">
                      <div class="col-md-6 mt-md-0 mt-1">
                        <div class="input-group flex-nowrap">
                          <span class="input-group-text bg-dark" style="color: white" id="addon-wrapping">Date</span>
                          <input type="date" class="form-control text-dark
                            bg-secondary placeholder=" Username" aria-label="Username"
                            aria-describedby="addon-wrapping" name="examInputs" id="date0" />
                        </div>
                      </div>

                      <div class="col-md-6 mt-md-0 mt-1">
                        <div class="input-group flex-nowrap">
                          <span class="input-group-text bg-dark" style="color: white" id="addon-wrapping">Subject</span>
                          <input type="text" class="form-control text-dark bg-secondary" placeholder="Enter A Subject"
                            aria-label="Username" aria-describedby="addon-wrapping" name="examInputs" id="subject0" />
                        </div>
                      </div>

                      <div class="col-12 mt-1">
                        <div class="input-group mb-3">
                          <input type="time" class="form-control bg-secondary text-dark" placeholder="Start Time"
                            aria-label="Username" name="examInputs" id="from0" />
                          <span class="input-group-text bg-dark" style="color: white">To</span>
                          <input type="time" class="form-control bg-secondary text-dark" placeholder="End Time"
                            aria-label="Server" name="examInputs" id="to0" />
                        </div>
                      </div>

                      <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button class="btn btn-danger me-md-2" type="button" onclick="leastOne();" id="removebtn0">
                          Remove
                        </button>
                      </div>
                    </div>
                  </div>

                  <button class="btn mt-3" style="background-color: rgb(25, 180, 25); color: white"
                    onclick="addNewRow();">
                    Add New Row <i class="bi bi-plus-circle-fill mx-1"></i>
                  </button>
                  <hr />
                  <div class="d-grid gap-2 col-6 mx-auto">
                    <button class="btn btn-primary" type="button" onclick="sendMessageToAll();">
                      Send Message
                    </button>
                  </div>
                </div>
                <!-- exam details end  -->


                <!-- custom message start  -->
                <div class="row mt-2 d-none" id="customMessageContainer">
                  <div class="col-12">
                    <div class="input-group mb-3 mt-4">
                      <span class="input-group-text bg-dark" style="width: 120px; color: white"
                        id="basic-addon1">Subject</span>
                      <input type="text" class="form-control bg-secondary text-dark" id="customSubject"
                        placeholder="Subject Of The Message" aria-label="Username" aria-describedby="basic-addon1" />
                    </div>

                    <div class="input-group">
                      <span class="input-group-text bg-dark" style="width: 120px; color: white">Description</span>
                      <textarea class="form-control bg-secondary text-dark" id="customContent"
                        aria-label="With textarea" placeholder="Content Of The Message"></textarea>
                    </div>

                    <div class="d-grid gap-2 col-6 mx-auto">
                      <button class="btn btn-primary mt-3" type="button" onclick="sendMessageToAll();">
                        Send Message
                      </button>
                    </div>
                  </div>
                </div>

                <!-- custom message end  -->
              </div>
            </div>

            <!-- all student end  -->

            
            <!-- Specific student start  -->
            <div class="row d-none" id="specificStudentUi">
              <h5 class="text-dark mt-3">
                Send Message For Specific Students
              </h5>
              <div class="col-12">
                <div class="row">
                  <div class="col-12 col-md-8 offset-md-2">
                    <div class="alert alert-danger text-center">
                      <span style="color: rgb(168, 11, 0)">&#9888;</span>
                      Please ensure that you have already received the list
                      registration numbers of the students you wish to send
                      messages to
                    </div>
                  </div>
                  <div class="col-md-8 col-12 offset-md-2" id="listContainer"></div>

                  <div class="col-md-10 col-12 offset-md-1 mt-3">
                    <div class="input-group mb-3">
                      <input type="text" class="form-control text-dark bg-secondary" placeholder="Registration Number"
                        aria-label="Recipient's username" aria-describedby="button-addon2" id="index" />
                      <button class="btn btn-outline-secondary" type="button" id="button-addon2"
                        onclick="addStudentToList();">
                        Add
                      </button>
                    </div>
                    <p class="text-danger d-none" id="invalidText">
                      Invalid Registration Number
                    </p>
                    <p class="text-danger d-none" id="alreadyAdded">
                      This student has already been added to the list
                    </p>
                  </div>

                  <div class="col-12">
                    <div class="input-group mb-3 mt-4">
                      <span class="input-group-text bg-dark" style="width: 120px; color: white"
                        id="basic-addon1">Subject</span>
                      <input type="text" class="form-control bg-secondary text-dark" id="subject"
                        placeholder="Subject Of The Message" aria-label="Username" aria-describedby="basic-addon1" />
                    </div>

                    <div class="input-group">
                      <span class="input-group-text bg-dark" style="width: 120px; color: white">Description</span>
                      <textarea class="form-control bg-secondary text-dark" id="content" aria-label="With textarea"
                        placeholder="Content Of The Message"></textarea>
                    </div>

                    <div class="d-grid gap-2 col-6 mx-auto">
                      <button class="btn btn-primary mt-3" type="button" onclick="sendSpecificMessage();">
                        Send Message
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Specific student end  -->
          </div>
        </div>
      </div>

      <!-- Widget End -->

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

    hamburger("message");

    function sendMessageToAll() {
      const msgType = document.getElementById("messageType");
      const spinner = document.getElementById("spinner");

      if (msgType.value == "1") {
        const date = document.getElementById("parentsMeetingDate");
        const time = document.getElementById("parentsMeetingTime");
        const place = document.getElementById("parentsMeetingPlace");
        var count = 0;

        if (date.value == "") {
          date.classList.add("is-invalid");
        } else {
          date.classList.remove("is-invalid");
          count = count + 1;
        }

        if (time.value == "") {
          time.classList.add("is-invalid");
        } else {
          time.classList.remove("is-invalid");
          count = count + 1;
        }

        if (place.value.trim() == "") {
          place.classList.add("is-invalid");
        } else {
          place.classList.remove("is-invalid");
          count = count + 1;
        }

        if (count == 3) {
          spinner.classList.add("show");
          var form = new FormData();
          form.append("date", date.value);
          form.append("time", time.value);
          form.append("place", place.value);
          form.append("type", "1");

          var xhr = new XMLHttpRequest();
          xhr.onload = function () {
            if (xhr.status == 200) {
              // handle reponse
              var response = xhr.responseText;
              Swal.fire({
                position: "top-end",
                icon: "success",
                title: "Messages Send Successfully",
                showConfirmButton: false,
                timer: 1500,
              });
              spinner.classList.remove("show");
            } else {
              Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Something went wrong!",
              });
              spinner.classList.remove("show");
            }
          };

          xhr.open("POST", "process/teacherSendMessage.php", true);
          xhr.send(form);
        }
      } else if (msgType.value == "2") {
        var inputs = document.getElementsByName("generalInputs");
        var isValid = true;

        for (var i = 0; i < inputs.length; i++) {
          if (inputs[i].value.trim() === "") {
            inputs[i].classList.add("is-invalid");
            isValid = false;
          } else {
            inputs[i].classList.remove("is-invalid");
          }
        }

        if (isValid) {
          spinner.classList.add("show");
          const date = document.getElementById("generalDate");
          const time = document.getElementById("generalTime");
          const subject = document.getElementById("generalSubject");
          const place = document.getElementById("generalPlace");

          var form = new FormData();
          form.append("date", date.value);
          form.append("time", time.value);
          form.append("subject", subject.value);
          form.append("place", place.value);
          form.append("type", "2");

          var xhr = new XMLHttpRequest();
          xhr.onload = function () {
            if (xhr.status == 200) {
              // handle reponse
              var response = xhr.responseText;
              Swal.fire({
                position: "top-end",
                icon: "success",
                title: "Messages Send Successfully",
                showConfirmButton: false,
                timer: 1500,
              });
              spinner.classList.remove("show");
            } else {
              Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Something went wrong!",
              });
              spinner.classList.remove("show");
            }
          };

          xhr.open("POST", "{{ route('send.mail.general.meeting') }}", true);
          xhr.setRequestHeader("X-CSRF-TOKEN", "{{ csrf_token() }}");
          xhr.send(form);
        }
      } else if (msgType.value == "3") {
        var inputs = document.getElementsByName("tripInputs");
        var isValid = true;

        for (var i = 0; i < inputs.length; i++) {
          if (inputs[i].value.trim() === "") {
            inputs[i].classList.add("is-invalid");
            isValid = false;
          } else {
            inputs[i].classList.remove("is-invalid");
          }
        }

        if (isValid) {
          spinner.classList.add("show");
          const date = document.getElementById("tripDate");
          const time = document.getElementById("tripTime");
          const amount = document.getElementById("tripAmount");
          const place = document.getElementById("tripPlace");
          const duration = document.getElementById("tripDuration");
          const viewpoints = document.getElementById("viewpoints");
          const things = document.getElementById("tripThings");
          const deadline = document.getElementById("tripPaymentEnd");

          var form = new FormData();
          form.append("date", date.value);
          form.append("time", time.value);
          form.append("amount", amount.value);
          form.append("place", place.value);
          form.append("duration", duration.value);
          form.append("viewpoints", viewpoints.value);
          form.append("things", things.value);
          form.append("deadline", deadline.value);
          form.append("type", "3");

          var xhr = new XMLHttpRequest();
          xhr.onload = function () {
            if (xhr.status == 200) {
              // handle reponse
              var response = xhr.responseText;
              // console.log(response);
              Swal.fire({
                position: "top-end",
                icon: "success",
                title: "Messages Send Successfully",
                showConfirmButton: false,
                timer: 1500,
              });
              spinner.classList.remove("show");
            } else {
              Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Something went wrong!",
              });
              spinner.classList.remove("show");
            }
          };

          xhr.open("POST", "{{ route('send.mail.school.trip') }}");
          xhr.setRequestHeader("X-CSRF-TOKEN", "{{ csrf_token() }}");
          xhr.send(form);
        }
      } else if (msgType.value == "4") {
        var inputs = document.getElementsByName("examInputs");
        var isValid = true;

        const examType = document.getElementById("examType");

        if (examType.value == "0") {
          Swal.fire({
            icon: "warning",
            title: "WARNING",
            text: "Please Select A Exam Category First",
          });
        } else {
          for (let i = 0; i < inputs.length; i++) {
            const input = inputs[i];
            if (input.value == "") {
              input.classList.add("is-invalid");
              isValid = false;
            } else {
              input.classList.remove("is-invalid");
            }
          }

          if (isValid) {
            var subjects = [];
            var dates = [];
            var startTime = [];
            var endTime = [];

            for (let i = 0; i < subContainer; i++) {
              subjects[i] = document.getElementById("subject" + i).value;
              dates[i] = document.getElementById("date" + i).value;
              startTime[i] = document.getElementById("from" + i).value;
              endTime[i] = document.getElementById("to" + i).value;
            }

            var form = new FormData();

            const obj = {
              subjects: subjects,
              dates: dates,
              startTime: startTime,
              endTime: endTime,
            };

            form.append("obj", JSON.stringify(obj));
            form.append("exam", examType.innerHTML);
            form.append("type", "4");

            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
              if (xhr.readyState == 4 && xhr.status == 200) {
                Swal.fire({
                  position: "top-end",
                  icon: "success",
                  title: "Messages Send Successfully",
                  showConfirmButton: false,
                  timer: 1500,
                });
              }
            };

            xhr.open("POST", "process/teacherSendMessage.php", true);
            xhr.send(form);
          }
        }
      } else if (msgType.value == "5") {
        const subject = document.getElementById("customSubject");
        const content = document.getElementById("customContent");

        if (subject.value.trim() == '' || content.value.trim() == '') {
          Swal.fire({
            icon: "warning",
            title: "WARNING",
            text: "Please Fill Both Heading And Message Content",
          });
        }
        else {
          var form = new FormData();
          form.append("heading", subject.value);
          form.append("content", content.value);
          form.append("type", "5");

          var xhr = new XMLHttpRequest();
          xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
              // handle response
              var response = xhr.responseText;
            }
          }

          xhr.open("POST", "process/teacherSendMessage.php", true);
          xhr.send(form);
        }
      }
    }

    var subContainer = 1;

    function addNewRow() {

      var inputs = document.getElementsByName("examInputs");
      var isValid = true;

      for (let i = 0; i < inputs.length; i++) {
        if (inputs[i].value.trim() == "") {
          isValid = false;
        }
      }

      if (isValid) {
        document
          .getElementById("removebtn" + (subContainer - 1))
          .classList.add("d-none");
        const row = document.createElement("div");
        row.className = "row rounded bg-warning border px-2 py-1 mt-1";
        row.id = "subRow" + subContainer;

        const col1 = document.createElement("div");
        col1.className = "col-md-6 mt-md-0 mt-1";

        const input1 = document.createElement("input");
        input1.type = "date";
        input1.name = "examInputs";
        input1.className = "form-control text-dark bg-secondary";
        input1.placeholder = "Username";
        input1.setAttribute("aria-label", "Username");
        input1.id = "date" + subContainer;

        const span1 = document.createElement("span");
        span1.className = "input-group-text bg-dark";
        span1.style.color = "white";
        span1.setAttribute("id", "addon-wrapping");
        span1.textContent = "Date";

        const div1 = document.createElement("div");
        div1.className = "input-group flex-nowrap";
        div1.appendChild(span1);
        div1.appendChild(input1);
        col1.appendChild(div1);

        const col2 = document.createElement("div");
        col2.className = "col-md-6 mt-md-0 mt-1";

        const input2 = document.createElement("input");
        input2.type = "text";
        input2.name = "examInputs";
        input2.className = "form-control text-dark bg-secondary";
        input2.placeholder = "Enter A Subject";
        input2.setAttribute("aria-label", "Username");
        input2.id = "subject" + subContainer;

        const span2 = document.createElement("span");
        span2.className = "input-group-text bg-dark";
        span2.style.color = "white";
        span2.setAttribute("id", "addon-wrapping");
        span2.textContent = "Subject";

        const div2 = document.createElement("div");
        div2.className = "input-group flex-nowrap";
        div2.appendChild(span2);
        div2.appendChild(input2);
        col2.appendChild(div2);

        const col3 = document.createElement("div");
        col3.className = "col-12 mt-1";

        const input3 = document.createElement("input");
        input3.type = "time";
        input3.name = "examInputs";
        input3.className = "form-control bg-secondary text-dark";
        input3.placeholder = "Start Time";
        input3.setAttribute("aria-label", "Username");
        input3.id = "from" + subContainer;

        const input4 = document.createElement("input");
        input4.type = "time";
        input4.name = "examInputs";
        input4.className = "form-control bg-secondary text-dark";
        input4.placeholder = "End Time";
        input4.setAttribute("aria-label", "Server");
        input4.id = "to" + subContainer;

        const span3 = document.createElement("span");
        span3.className = "input-group-text bg-dark";
        span3.style.color = "white";
        span3.textContent = "To";

        const div3 = document.createElement("div");
        div3.className = "input-group mb-3";
        div3.appendChild(input3);
        div3.appendChild(span3);
        div3.appendChild(input4);
        col3.appendChild(div3);

        const col4 = document.createElement("div");
        col4.className = "d-grid gap-2 d-md-flex justify-content-md-end";

        const button = document.createElement("button");
        button.type = "button";
        button.className = "btn btn-danger me-md-2";
        button.id = "removebtn" + subContainer;
        button.textContent = "Remove";

        col4.appendChild(button);

        // Add event listener to the "Remove" button
        button.addEventListener("click", function () {
          row.remove();
          subContainer = subContainer - 1;
        });

        row.appendChild(col1);
        row.appendChild(col2);
        row.appendChild(col3);
        row.appendChild(col4);

        // Add row to the document
        document.getElementById("subjectContainer").appendChild(row);
        subContainer = subContainer + 1;
      } else {
        Swal.fire({
          icon: "warning",
          title: "WARNING",
          text: "Please Fill Previous Row Before Add A New One",
        });
      }
    }

    function messageCategory() {
      const msgType = document.getElementById("messageType");
      const parent = document.getElementById("parentContainer");
      const general = document.getElementById("generalContainer");
      const trip = document.getElementById("tripContainer");
      const exam = document.getElementById("examContainer");
      const custom = document.getElementById("customMessageContainer");

      if (msgType.value == "0") {
        parent.classList.add("d-none");
        general.classList.add("d-none");
        trip.classList.add("d-none");
        exam.classList.add("d-none");
        custom.classList.add("d-none");
      } else if (msgType.value == "1") {
        parent.classList.remove("d-none");
        general.classList.add("d-none");
        trip.classList.add("d-none");
        custom.classList.add("d-none");
        exam.classList.add("d-none");
      } else if (msgType.value == "2") {
        parent.classList.add("d-none");
        trip.classList.add("d-none");
        exam.classList.add("d-none");
        custom.classList.add("d-none");
        general.classList.remove("d-none");
      } else if (msgType.value == "3") {
        parent.classList.add("d-none");
        general.classList.add("d-none");
        exam.classList.add("d-none");
        custom.classList.add("d-none");
        trip.classList.remove("d-none");
      } else if (msgType.value == "4") {
        parent.classList.add("d-none");
        general.classList.add("d-none");
        trip.classList.add("d-none");
        custom.classList.add("d-none");
        exam.classList.remove("d-none");
      } else if (msgType.value == "5") {
        parent.classList.add("d-none");
        general.classList.add("d-none");
        trip.classList.add("d-none");
        custom.classList.remove("d-none");
        exam.classList.add("d-none");
      }
    }

    function messageTypeChange() {
      const type = document.getElementById("senderType");
      const allStudent = document.getElementById("allStudentUi");
      const specificStudentUi = document.getElementById("specificStudentUi");

      if (type.value == "0") {
        allStudent.classList.add("d-none");
        specificStudentUi.classList.add("d-none");
      } else if (type.value == "1") {
        allStudent.classList.remove("d-none");
        specificStudentUi.classList.add("d-none");
      } else if (type.value == "2") {
        allStudent.classList.add("d-none");
        specificStudentUi.classList.remove("d-none");
      }
    }

    var studentList = [];
    var listIndex = 0;
    var emailList = [];

    function addStudentToList() {
      const index = document.getElementById("index");
      const invalid = document.getElementById("invalidText");
      const list = document.getElementById("listContainer");
      const alreadyExist = document.getElementById("alreadyAdded");

      invalid.classList.add("d-none");
      invalid.innerHTML = "Invalid Registration Number";

      if (index.value.trim() == "") {
        index.classList.add("is-invalid");
        invalid.classList.add("d-none");
        alreadyExist.classList.add("d-none");
      } else {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
          if (xhr.readyState == 4 && xhr.status == 200) {
            var response = xhr.responseText;
            if (response == "invalid") {
              invalid.classList.remove("d-none");
            } 
            else if (response == "permission_denied") {
              invalid.innerHTML = "Permission Denied";
              invalid.classList.remove("d-none");
            }
            else {
              response = JSON.parse(response);
              invalid.classList.add("d-none");
              if (studentList.includes(index.value)) {
                alreadyExist.classList.remove("d-none");
              } else {
                alreadyExist.classList.add("d-none");
                var card = document.createElement("div");
                card.id = "card" + listIndex;
                var cardBody = document.createElement("div");
                var col10 = document.createElement("div");
                var col2 = document.createElement("div");
                var btn = document.createElement("button");
                btn.dataset.cid = listIndex;
                btn.dataset.index = index.value;
                btn.dataset.email = response.emergency_email;
                var icon = document.createElement("i");

                btn.onclick = function () {
                  removeFromList(this);
                };

                card.classList.add("card");
                card.classList.add("mt-1");
                cardBody.classList.add("card-body");
                cardBody.classList.add("text-dark");
                cardBody.classList.add("d-flex");
                col10.innerHTML = response.initial_name;
                col10.classList.add("col-10");
                col2.classList.add("col-2");
                btn.classList.add("btn");
                btn.classList.add("btn-danger");
                icon.classList.add("bi");
                icon.classList.add("bi-x-circle-fill");

                btn.appendChild(icon);
                col2.appendChild(btn);
                cardBody.appendChild(col10);
                cardBody.appendChild(col2);
                card.appendChild(cardBody);
                list.appendChild(card);

                studentList[listIndex] = index.value;
                emailList[listIndex] = response.emergency_email;
                listIndex = listIndex + 1;
                index.value = "";
              }
            }
          }
        };

        xhr.open(
          "GET",
          "{{ route('search.student', ':id') }}".replace(":id", index.value),
          true
        );
        xhr.send();
      }
    }

    function removeFromList(Button) {
      var cid = Button.dataset.cid;
      var indexNumber = Button.dataset.index;
      var email = Button.dataset.email;

      var card = document.getElementById("card" + cid);
      card.parentNode.removeChild(card);
      studentList = studentList.filter((item) => item !== indexNumber);
      emailList = emailList.filter((item) => item !== email);

      if (!listIndex == 0) {
        listIndex = listIndex - 1;
      }
    }

    function sendSpecificMessage() {
      const subject = document.getElementById("subject");
      const description = document.getElementById("content");

      if (studentList.length == 0) {
        Swal.fire({
          icon: "warning",
          title: "WARNING",
          text: "Please Add Some Students First",
        });
      } else {
        if (subject.value.trim() == "" || description.value.trim() == "") {
          Swal.fire({
            icon: "warning",
            title: "WARNING",
            text: "Please Fill Subject And Message Content Before Sending Message",
          });
        } else {
          var form = new FormData();
          form.append("emails", JSON.stringify(emailList));
          form.append("subject", subject.value);
          form.append("content", description.value);

          var xhr = new XMLHttpRequest();
          xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
              Swal.fire({
                position: "top-end",
                icon: "success",
                title: "Messages Send Successfully",
                showConfirmButton: false,
                timer: 1500,
              });
            }
          };

          xhr.open("POST", "{{ route('send.mail.manual') }}", true);
          xhr.setRequestHeader("X-CSRF-TOKEN", "{{ csrf_token() }}");
          xhr.send(form);
        }
      }
    }

    function leastOne() {
      Swal.fire({
        icon: "warning",
        title: "WARNING",
        text: "You Must Use At Least One Row",
      });
    }
  </script>
</body>

</html>