<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.components.head')
</head>

<body>
  <div class="container-fluid position-relative d-flex p-0">
    @include('public_components.spinner')
    @include('admin.components.sidebar')
    <!-- Content Start -->
    <div class="content">
        @include('admin.components.navbar')

      <form id="news-form" method="post" action="" enctype="multipart/form-data">
        <div class="container-fluid pt-4 px-4">
          <div class="row add-events bg-secondary p-3">
            <h3 class="text-dark">Add News & Upcoming Events</h3>
            <div class="input-group mb-3">
              <span class="input-group-text" style="width: 240px;" id="basic-addon1">Add News/Events Header</span>
              <input type="text" class="form-control bg-secondary text-dark" placeholder="Add News/Events Header" aria-label="Add News/Events Header" aria-describedby="basic-addon1" name="newsHeader" id="newsHeader">
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text" style="width: 240px;" id="basic-addon1">Add News/Events description</span>
              <input type="text" class="form-control bg-secondary text-dark" placeholder="Add News/Events description" aria-label="Add News/Events description" aria-describedby="basic-addon1" name="newsDescription" id="newsDescription">
            </div>
            <div class="input-group mb-3 col-6">
              <label class="input-group-text" style="width: 240px;" for="inputGroupFile01">Add News/Events Image</label>
              <input type="file" class="form-control text-dark" id="newsImage" name="news-image">
              <p class="text-primary" style="color: red;">&#9888; NOTE: Please ensure that your image has a resolution
                of 1280x720 before uploading. Images with resolutions other than 1280x720 will be rejected by the
                server.</p>
            </div>
            <span>Select Grade:</span>
            <div class="row">
                @for ($i=1; $i <= 13; $i++)
                    <div class="form-check form-switch mb-1 ms-3 col-4 col-md-2">
                        <label class="form-check-label" for="flexSwitchCheckChecked">Grade {{ $i }}</label>
                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked name="grades[]" value="{{ $i }}">
                    </div>
                @endfor
            </div>
            <button type="button" class="btn btn-outline-primary mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal">Add News/Events</button>
          </div>
        </form>

          <div class="row mt-3 bg-secondary p-3 rounded">
            <h3 class="text-dark">Manage News</h3>
            <div class="col-12 col-md-10 offset-md-1">
              <!-- sample news container  start -->
              {{-- <div class="px-3 py-2 rounded row" style="border: 1px solid black;">
                <div class="col-2" style="border-right: 1px solid black;">
                  <img src="{{ Storage::url('public/news/64450d9c6b45d.png') }}" style="width: 100%;">
                </div>
                <div class="col-8" style="max-height: 80px; overflow: hidden;">
                  <h5 class="text-dark">This a Sample news Heading</h5>
                  <p style="text-align: justify;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore voluptates debitis dicta dolorum ullam minus perspiciatis error repellendus, quas voluptatibus?</p>
                </div>
                <div class="col-2 d-flex justify-content-center align-items-center">
                  <button class="btn btn-danger" type="button"><i class="bi bi-trash mx-1"></i>Remove</button>
                </div>
              </div> --}}
              <!-- sample news container  end -->
              <div class="alert alert-warning text-center">
                <span style="font-weight: bold">Attention :</span> If You add news now. Please Refresh And Try Again To Show It
              </div>
              @foreach ($news as $item)
              <div class="px-3 py-2 rounded row mt-1" style="border: 1px solid black;">
                <div class="col-2" style="border-right: 1px solid black;">
                  <img src="{{ Storage::url('public/news/' . $item->image_path) }}" style="width: 100%;">
                </div>
                <div class="col-8" style="max-height: 80px; overflow: hidden;">
                  <h5 class="text-dark">{{ $item->header }}</h5>
                  <p style="text-align: justify;">{{ $item->description }}</p>
                </div>
                <div class="col-2 d-flex justify-content-center align-items-center">
                  <form action="{{ route('remove.news') }}" method="post">
                    @csrf
                    @method("delete")
                    <input type="hidden" name="id" value="{{ $item->_id }}">
                    <button type="submit" class="btn btn-danger" type="button"><i class="bi bi-trash mx-1"></i>Remove</button>
                  </form>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5 text-dark" id="exampleModalLabel">Warning</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                Are you sure to add this news?
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn " data-bs-dismiss="modal" style="background: #006ee5; color: white;" id="submitButton">Upload</button>
              </div>
            </div>
          </div>
        </div>

          <!-- image modal start  -->
    <div class="modal fade" tabindex="-1" id="imageModal">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-dark">Modal title</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="container d-flex justify-content-center align-items-center" style="background-size: contain;">
              <canvas id="imageCanvas" style="width: 100%;">

              </canvas>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn" id="cropButton" style="background-color: #367beb; color: white;">Crop And Save</button>
          </div>
        </div>
      </div>
    </div>

    <!-- image modal end  -->


        @include('public_components.footer')
    </div>
    <!-- Content End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
  </div>

    @include('public_components.js')
  <script>
    hamburger("addNews");

    window.onbeforeunload = function() {
      windows.location = "{{ route('admin.news') }}";
    };

    var cropperImage = '';

    const SelectedImage = document.getElementById("newsImage");

    $("#newsImage").on("change", function() {
      var $canvas = $("#imageCanvas"),
        context = $canvas.get(0).getContext('2d');

      const userImg = document.getElementById("imageCanvas");
      var cropper;

      if (this.files && this.files[0]) {
        if (this.files[0].type.match(/^image\//)) {
          $("#imageModal").modal("show");
          var reader = new FileReader();

          reader.onload = function(e) {
            var img = new Image();

            img.onload = function() {
              context.canvas.width = img.width;
              context.canvas.height = img.height;
              context.drawImage(img, 0, 0);

              cropper = new Cropper(userImg, {
                aspectRatio: 16 / 9,
              });
            };

            img.src = e.target.result;
          };

          $("#cropButton").on("click", function() {
            var croppedCanvas = cropper.getCroppedCanvas();
            var cropped = croppedCanvas.toDataURL();

            cropperImage = cropped;
            $("#imageModal").modal("hide");
          });

          reader.readAsDataURL(this.files[0]);
        } else {
          SelectedImage.value = '';
          Swal.fire({
            icon: 'error',
            title: 'ERROR',
            text: 'You Must Select An Image File',
          })
        }
      }
    });

    const form = document.getElementById('news-form');
    const button = document.getElementById('submitButton');
    const newsHeader = document.getElementById('newsHeader');
    const newsDescription = document.getElementById('newsDescription');
    const newsImage = document.getElementById('newsImage');

    button.addEventListener('click', (event) => {
      event.preventDefault();

      if (newsHeader.value.trim() == '' | newsDescription.value.trim() == '' |
        newsImage.files[0] == '') {
        Swal.fire({
          icon: 'error',
          title: 'ERROR',
          text: 'You Must Fill All Text Fields Before Submitting',
        });
      } else {
        if (cropperImage == '') {
          Swal.fire({
            icon: 'error',
            title: 'ERROR',
            text: 'Invalid Image Size Please Crop And Try Again',
          });
        } else {
          const formData = new FormData(form);
          formData.append("base64", cropperImage);
          const xhr = new XMLHttpRequest();
          xhr.open('POST', '{{ route("add.news") }}');
          xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').content);
          xhr.onload = function() {
            if (this.status === 200) {
              var response = xhr.responseText;
              if(response == 'notSaveToDatabase') {
                Swal.fire({
                  icon: 'error',
                  title: 'ERROR',
                  text: 'Error While Add Details To Database',
                  footer: "<a href='http://wa.me/94701189971'>Contact Developers Here</a>"
                });
              } else if(response == 'imageNotSaved') {
                Swal.fire({
                  icon: 'error',
                  title: 'ERROR',
                  text: 'Error While Saving Image',
                  footer: "<a href='http://wa.me/94701189971'>Contact Developers Here</a>"
                });
              } else if(response == 'success') {
                Swal.fire({
                  position: 'top-end',
                  icon: 'success',
                  title: 'News Added Successfully',
                  showConfirmButton: false,
                  timer: 1500
                });
              }
            }
          };
          xhr.send(formData);
        }
      }
    });
  </script>
</body>

</html>