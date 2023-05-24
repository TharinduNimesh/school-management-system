<!DOCTYPE html>
<html lang="en">

<head>
  @include('developer.components.head')
</head>

<body >
  <div class="container-fluid position-relative d-flex p-0">
    @include('public_components.spinner')

    @include('developer.components.hamburger')

    <!-- Content Start -->
    <div class="content body">
      @include('developer.components.navbar')

            <!-- Start -->
            <div class="container-fluid pt-4 px-4" style="min-height: 80vh" >
                <div class="bg-secondary rounded h-100 p-3">
                    <h3 class="mb-4 text-primary">Add Schools</h3>
                    <form class="row g-3 needs-validation" novalidate>
                        <div class="col-md-4">
                          <label for="validationCustom01" class="form-label">School Name</label>
                          <input type="text" name="school_name" class="form-control text-primary" id="validationCustom01" value="" required>
                          <div class="valid-feedback">
                            Looks good!
                          </div>
                          <div class="invalid-feedback">
                            Please enter your school name
                          </div>
                        </div>
                        <div class="col-md-4">
                          <label for="validationCustom02" class="form-label">School Unique Code</label>
                          <input type="text" name="unique_code" class="form-control text-primary" id="uniq_id_input" value="" required>
                          <div class="valid-feedback" id="unique-code">
                            Looks good!
                          </div>
                          <div class="invalid-feedback">
                            Please enter a unique identifier
                          </div>
                          <div class="already-given d-none">
                            this name is already given
                          </div>
                        </div>
                        <div class="col-md-4">
                          <label for="validationCustomUsername" class="form-label">School Contact Number</label>
                          <div class="input-group has-validation">
                            <span class="input-group-text" id="inputGroupPrepend">+94</span>
                            <input type="text" name="contact_number"  class="form-control text-primary" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
                            <div class="invalid-feedback">
                              Please enter a contact number.
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <label for="validationCustom03" class="form-label">Address</label>
                          <input type="text" name="address" class="form-control text-primary" id="validationCustom03" required>
                          <div class="invalid-feedback">
                            Please provide school address.
                          </div>
                        </div>
                        <div class="col-md-3">
                            <label for="validationCustom03" class="form-label">Education Sector</label>
                            <input type="text" name="education_sector" class="form-control text-primary" id="validationCustom03" required>
                            <div class="invalid-feedback">
                              Please provide education sector.
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="validationCustom03" class="form-label">Education Zone</label>
                            <input type="text" name="education_zone" class="form-control text-primary" id="validationCustom03" required>
                            <div class="invalid-feedback">
                              Please provide education zone.
                            </div>
                        </div>
                        <div class="col-md-6">
                          <label for="validationCustom04" class="form-label">Approved Grade of School</label>
                          <select class="form-select text-primary" name="approved_grades" id="validationCustom04" required>
                            <option selected disabled value="">Choose...</option>
                            <option>1AB</option>
                            <option>1C</option>
                            <option>Type 2</option>
                            <option>Type 3</option>
                          </select>
                          <div class="invalid-feedback">
                            Please select a valid grade.
                          </div>
                        </div>
                        <div class="col-md-6">
                            <label for="validationCustom04" class="form-label">Grades in school</label>
                            <select class="form-select text-primary" name="grades_in_school" id="validationCustom04" required>
                              <option selected disabled value="">Choose...</option>
                              <option>1-5</option>
                              <option>1-8</option>
                              <option>1-11</option>
                              <option>1-13</option>
                              <option>6-11</option>
                              <option>6-13</option>
                            </select>
                            <div class="invalid-feedback">
                              Please select a valid grade.
                            </div>
                          </div>
                        <div class="col-12">
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                            <label class="form-check-label" for="invalidCheck">
                              Double check the details
                            </label>
                            <div class="invalid-feedback">
                              You must double check details before submitting.
                            </div>
                          </div>
                        </div>
                        <div class="col-12">
                          <button class="btn btn-primary" id="submitButton" type="button">Submit form</button>
                        </div>
                      </form>
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
        hamburger("schools");
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (() => {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll('.needs-validation')
        const button = document.getElementById('submitButton');

        // Loop over them and prevent submission
        Array.from(forms).forEach(form => {
            button.addEventListener('click', event => {
            if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
            } else {
                var formData = new FormData(form);
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '{{ route("add.school") }}', true);
                xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
                xhr.onload = function () {
                    if (xhr.status === 200) {
                        var response = xhr.responseText;
                        if(response == "already") {
                            $(".already-given").removeClass("d-none");
                            $("#unique-code").addClass("d-none");
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Unique Code Already Given!',
                            });
                        } else {
                            Swal.fire({
                                icon: 'success',
                                title: 'School Added Successfully',
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }
                    }
                };
                xhr.send(formData);
            }

            form.classList.add('was-validated')
            }, false)
        })
        })()
    </script>
</body>

</html>