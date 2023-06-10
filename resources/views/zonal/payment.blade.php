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

            <div style="min-height: 80vh">
                <!-- Table Start -->
                <div class="container-fluid pt-4 px-4">
                    <div class="row g-4">
                        <div class="col-sm-12 col-xl-12">
                            <div class="bg-secondary rounded h-100 p-4">
                                <h3 class="mb-4 text-dark">Requests</h3>
                                @if ($errors->has('amount'))
                                    <div class="alert alert-danger" role="alert">
                                        <ul>
                                            @foreach ($errors->get('amount') as $errors)
                                                @foreach ($errors as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            @endforeach
                                        </ul>
                                    </div>
                                @elseif($errors->has('action'))
                                    <div class="alert alert-danger" role="alert">
                                        {{ $errors->first('action') }}
                                    </div>
                                @endif
                                <div class="table-responsive">
                                    <table class="table table-bordered text-center">
                                        <thead class="table-dark">
                                            <tr>
                                                <th scope="col">School</th>
                                                <th scope="col">Subject</th>
                                                <th scope="col">Description</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Prooves</th>
                                                <th colspan="2" scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (!$requests->isEmpty())
                                                @foreach ($requests as $request)
                                                    <tr>
                                                        <td class="space">{{ $request['school'] }}</td>
                                                        <td class="space">{{ $request['subject'] }}</td>
                                                        <td class="space">{{ $request['description'] }}</td>
                                                        <td class="space">{{ $request['date'] }}</td>
                                                        <td class="space">
                                                            <a type="button" class="btn btn-success"
                                                                href="{{ Storage::url('payments/proves/' . $request['proof']) }}">
                                                                <i class="bi bi-cloud-arrow-down-fill me-2"></i>
                                                                Download
                                                            </a>
                                                        </td>
                                                        <td class="space">
                                                            @if ($request['action_taken_at'] == null)
                                                                <form action="{{ route('school.payments.action') }}">
                                                                    <input type="hidden" name="id"
                                                                        value="{{ $request['_id'] }}">
                                                                    <button type="submit" class="btn btn-secondary"><i
                                                                            class="bi bi-check2-all me-2"></i> Action
                                                                        taken</button>
                                                                </form>
                                                            @else
                                                                Already Taken An Action By
                                                                {{ $request['action_taken_by'] }}
                                                                At {{ $request['action_taken_at'] }}.
                                                            @endif
                                                        </td>
                                                        <td class="space">
                                                            <form
                                                                action="{{ route('school.payments', ['school' => $request['_id']]) }}">
                                                                <div class="input-group" style="width: 280px;">
                                                                    <input type="text"
                                                                        class="form-control bg-secondary text-dark"
                                                                        placeholder="Amount" name="amount">
                                                                    <div class="input-group-append">
                                                                        <button class="btn btn-warning"
                                                                            type="submit">Submit</button>
                                                                    </div>
                                                                </div>
                                                            </form>

                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td colspan="7" class="bg-warning text-danger">There Aren't Any
                                                        Requests To Display</td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Table End -->


                <!-- Table Start -->
                <div class="container-fluid pt-4 px-4">
                    <div class="row g-4">
                        <div class="col-sm-12 col-xl-12">
                            <div class="bg-secondary rounded h-100 p-4">
                                <h3 class="mb-4 text-dark">History</h3>
                                <div class="table-responsive">
                                    <table class="table table-bordered text-center">
                                        <thead class="table-dark">
                                            <tr>
                                                <th class="space">School</th>
                                                <th class="space">Subject</th>
                                                <th class="space">Description</th>
                                                <th class="space">Returned</th>
                                                <th class="space">Amount</th>
                                                <th class="space">Remaining balance</th>
                                                <th class="space">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($returned as $record)
                                                <tr>
                                                    <td class="space">{{ $record['school'] }}</td>
                                                    <td class="space">{{ $record['subject'] }}</td>
                                                    <td class="space">{{ $record['description'] }}</td>
                                                    <td class="space">Request approved by
                                                        {{ $record['action_taken_by'] }}
                                                        at {{ $record['action_taken_at'] }} and money passed by
                                                        {{ $record['payed_by'] }} at {{ $record['payed_at'] }}.</td>
                                                    <td class="space">Rs. {{ $record['amount'] }}</td>
                                                    <td class="space">Rs. {{ $record['remaining'] }}</td>
                                                    <td class="space">
                                                        @php($id = $record['_id'])
                                                        <button 
                                                            type="button" 
                                                            class="btn btn-success"
                                                            onclick="showModel('{{ $id }}');"
                                                        >View</button>
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

                <!-- History Modal Start -->
                <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5 text-dark" id="exampleModalLabel">Add
                                    Record</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-striped">
                                        <thead class="table-dark">
                                            <tr>
                                                <th>Date</th>
                                                <th>Description</th>
                                                <th>Cost</th>
                                                <th>Invoice</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($returned as $items)
                                            @if(isset($items['records']))
                                            @foreach($items['records'] as $record)
                                            <tr id="{{ $items['_id'] }}" name="invoice-records">
                                                <td class="space">{{ $record['date'] }}</td>
                                                <td class="space">{{ $record['description'] }}</td>
                                                <td class="space">Rs. {{ $record['cost'] }}</td>
                                                <td class="space">
                                                    <a 
                                                        type="button" class="btn btn-success"
                                                        href="{{ Storage::url('payments/invoices/' . $record['invoice']) }}">
                                                        <i class="bi bi-cloud-arrow-down-fill me-2"></i>
                                                        Download
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                            @else
                                            <tr id="{{ $items['_id'] }}" name="invoice-records">
                                                <td colspan="4" class="bg-warning text-danger">There Aren't Any
                                                    Records To Display</td>
                                            </tr>
                                            @endif
                                            @endforeach
                                        </tbody>
                                    </table>
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
        function showModel(id) {
            allRecords = document.getElementsByName('invoice-records');
            allRecords.forEach(record => {
                if(record.id == id) {
                    record.style.display = 'table-row';
                } else {
                    record.style.display = 'none';
                }
            });
            $('#viewModal').modal('show');
        }
    </script>
</body>

</html>
