<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.components.head')
    <style>
        .space {
            white-space: nowrap;
        }
    </style>
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        @include('public_components.spinner')
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        @include('admin.components.sidebar')
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            @include('admin.components.navbar')
            <!-- Navbar End -->

            <div style="min-height: 80vh">
                <!-- Sending Start -->
                <div class="container-fluid pt-4 px-4">
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h3 class="mb-4 text-dark">Request For Money</h3>
                            <form action="{{ route('request.payment') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row g-2">
                                    @if (!session('success') && !$errors->has('request'))
                                        <div class="alert alert-warning">
                                            <h4 class="alert-heading">Attention</h4>
                                            <hr>
                                            Please add file with pdf within all images that can prove your reason for
                                        </div>
                                    @endif
                                    @if ($errors->has('request'))
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->get('request') as $errors)
                                                    @foreach (json_decode($errors) as $item)
                                                        @foreach ($item as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    @endforeach
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    @if (session('success'))
                                        <div class="alert alert-success col-md-8 offset-md-2">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                    <div class="form-floating col-12 col-md-6">
                                        <input type="text" class="form-control bg-secondary text-dark" name="subject"
                                            placeholder="Subject" />
                                        <label for="">Subject</label>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <input class="form-control form-control-lg bg-secondary text-dark"
                                            name="file" type="file" accept=".pdf, .docx, .doc">
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-floating">
                                            <textarea class="form-control bg-secondary text-dark" placeholder="Description" name="description"></textarea>
                                            <label for="floatingTextarea">Description</label>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="d-grid gap-2 col-6 mx-auto mt-3">
                                            <button onclick="" type="submit"
                                                class="btn btn-primary col-sm-12 col-xl-12">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Sending End -->


                <!-- Table Start -->
                <div class="container-fluid pt-4 px-4">
                    <div class="row g-4">
                        <div class="col-sm-12 col-xl-12">
                            <div class="bg-secondary rounded h-100 p-4">
                                <h3 class="mb-4 text-dark">Money That Recieved</h3>
                                @if ($errors->has('add'))
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->get('add') as $errors)
                                            @foreach (json_decode($errors) as $item)
                                                @foreach ($item as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            @endforeach
                                        @endforeach
                                    </ul>
                                </div>

                                @elseif($errors->has('add_file'))
                                <div class="alert alert-danger">
                                    {{ $errors->get()->first('add_file') }}
                                </div>

                                @elseif(session('add_success'))
                                <div class="alert alert-success">
                                    {{ session('add_success') }}
                                </div>
                                @endif
                                <div class="table-responsive">
                                    <table class="table table-bordered align-middle">
                                        <thead class="table-dark">
                                            <tr>
                                                <th scope="col">Subject</th>
                                                <th scope="col">Description</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Amount</th>
                                                <th class="space">Remaining balance</th>
                                                <th colspan="2" scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($requests as $request)
                                                <tr>
                                                    <td class="space">{{ $request['subject'] }}</td>
                                                    <td class="space">{{ $request['description'] }}</td>
                                                    <td class="space">Requested at {{ $request['date'] }} and money
                                                        recieved at {{ $request['payed_at'] }}</td>
                                                    <td class="space">Rs. {{ $request['amount'] }}</td>
                                                    <td class="space">Rs. {{ $request['remaining'] }}</td>
                                                    <td class="space">
                                                        <button type="button" class="btn btn-success"
                                                            @php($id = $request['_id'])
                                                            onclick="showModal('{{ $id }}');">
                                                            <i class="bi bi-plus-circle-fill me-2"></i><span>Add
                                                                Record</span>
                                                        </button>
                                                    </td>
                                                    <td class="space">
                                                        <button type="button" class="btn btn-warning data"
                                                            data-bs-toggle="modal" data-bs-target="#viewModal">
                                                            <i class="bi bi-eye-fill me-2"></i><span>View Record</span>
                                                        </button>
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
                <!-- Table End -->


                <!-- Add Record Modal Start -->
                <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <form action="{{ route('add.payment.record') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5 text-dark" id="exampleModalLabel">Add
                                        Record</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="alert alert-danger">
                                        <h5 class="alert-heading">Attention </h5>
                                        <hr> 
                                        please include all billing records with <strong>pdf</strong> within all images that can prove payment details.
                                    </div>
                                    <div class="row g-2">
                                        <input type="hidden" name="id" id="record_id">
                                        <div class="col-12">
                                            <div class="form-floating">
                                                <textarea class="form-control bg-secondary text-dark" placeholder="Description" name="description"></textarea>
                                                <label for="floatingTextarea">Description</label>
                                            </div>
                                        </div>
                                        <div class="form-floating col-12 col-md-6">
                                            <input type="text" class="form-control bg-secondary text-dark"
                                                name="cost" placeholder="Cost" />
                                            <label for="floatingSelectGrid">Cost</label>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <input class="form-control form-control-lg bg-secondary text-dark"
                                                name="invoice" type="file">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success" onclick="">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Add Record Modal End -->


                <!-- History Modal Start -->
                <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5 text-dark" id="exampleModalLabel">History</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row g-2">
                                    <div class="col-12 col-md-6">
                                        <label for="floatingSelectGrid" class="form-label">Cost</label>
                                        <input type="text" class="form-control bg-secondary text-dark"
                                            id="cost" placeholder="Cost" disabled />
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label for="floatingSelectGrid" class="form-label">Date</label>
                                        <input type="text" class="form-control bg-secondary text-dark"
                                            id="date" placeholder="Date" disabled />
                                    </div>
                                    <div class="col-12">
                                        <label for="floatingSelectGrid" class="form-label">Subject</label>
                                        <input type="text" class="form-control bg-secondary text-dark"
                                            id="subject" placeholder="Subject" disabled />
                                    </div>
                                    <div class="col-12">
                                        <label for="floatingTextarea" class="form-label">Description</label>
                                        <textarea class="form-control bg-secondary text-dark" placeholder="Description" id="description" disabled></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- History Modal End -->
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
        function showModal(id) {
            document.getElementById('record_id').value = id;
            $('#addModal').modal('show');
        }
    </script>
</body>

</html>
