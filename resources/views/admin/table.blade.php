<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.components.head')
</head>

<body class="bg-secondary">
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Period</th>
                    <th>Monday</th>
                    <th>Tuesday</th>
                    <th>Wednesday</th>
                    <th>Thursday</th>
                    <th>Friday</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($classes as $period => $days)
                    <tr>
                        <td>{{ $period }}</td>
                        @foreach (['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'] as $day)
                            <td>
                                @if (isset($days[$day]))
                                    @foreach ($days[$day] as $subject)
                                        {{ $subject['subject'] }}<br>
                                        {{ $subject['teacher_name'] ?? 'N/A' }}<br>
                                        {{ $subject['teacher_nic'] ?? 'N/A' }}<br><br>
                                    @endforeach
                                @endif
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
