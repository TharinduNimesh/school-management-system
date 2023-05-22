<!DOCTYPE html>
<html lang="en">

<head>
    @include('student.components.head')

    <style>
        .space {
            white-space:nowrap;
        }
    </style>
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        @include('public_components.spinner')

        @include('student.components.hamburger')

        <div class="content">
            @include('student.components.navbar')


            <!-- Widget Start -->
            <div class="container-fluid pt-4 px-4" style="min-height: 80vh;">
                <div class="row g-4 bg-secondary p-3 mt-3">
                    <div class="col-12 ">
                        <h3 class="font-weight-bold text-dark">Submit Assignments</h3>
                        <div class="col-12 table-responsive">
                            <table class="table table-hover table-bordered">
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col" class="space">Subject Name</th>
                                        <th scope="col">Duration</th>
                                        <th scope="col" class="space">Assignment Document</th>
                                        <th scope="col" class="space">Assignment Submit</th>
                                        <th scope="col" class="space">Marks</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($assignments != null)
                                    @foreach($assignments as $key => $assignment)
                                        <tr>
                                            <th scope="row">{{ $key + 1 }}</th>
                                            <td>{{ $assignment->subject }}</td>
                                            <td class="space">{{ $assignment->start_date }} - {{ $assignment->end_date }}</td>
                                            <td>
                                                @php
                                                    $file = "assignments/" . $assignment->file;
                                                    $url = Storage::url($file);
                                                @endphp
                                                <a class="btn btn-success" href="{{ asset($url) }}">Download</a>
                                            </td>
                                            <td>
                                                <form action="{{ route('submit.assignment') }}" method="post" enctype="multipart/form-data">
                                                    @if($assignment->marks == "Not Submited")
                                                        <div class="input-group">
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{ $assignment['_id'] }}"/>
                                                            <input required type="file" name="file" accept=".pdf,.doc,.docx" class="form-control bg-secondary text-dark" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                                                            <button class="btn btn-warning" type="submit" id="inputGroupFileAddon04">Submit</button>
                                                        </div>
                                                    @else 
                                                        Submitted
                                                    @endif
                                                </form>
                                            </td>
                                            <td class="space">{{ $assignment->marks }}</td>
                                        </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Widget End -->

            @include('public_components.footer')
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    @include('public_components.js')
    <script>
        hamburger('assignments')
    </script>
</body>

</html>