<x-mail::message>
Dear {{ $data["student_name"] }},
          
Please find below the details of the upcoming exams for the next month. Please make sure you are prepared and ready for each exam.

<div class="table-responsive">
<table>
    <thead>
        <tr>
            <th>Exam Name</th>
            <th>Exam Date</th>
            <th>Exam Time</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data["exams"] as $exam)
        <tr>
            <td>{{ $exam->exam_name }}</td>
            <td>{{ $exam->exam_date }}</td>
            <td>{{ $exam->exam_time }}</td>
        </tr>
        @endforeach
    </tbody>
</table> 
</div>     
Please remember to bring all necessary materials and arrive on time for each exam. Good luck and do your best!
    
Best regards,

{{$data["teacher"]}},
{{ env('SCHOOL_NAME') }}
</x-mail::message>
