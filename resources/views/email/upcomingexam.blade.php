<x-mail::message>
Dear {{ $data["student_name"] }},
          
Please find below the details of the upcoming {{ $data["category"] }}. Please make sure you are prepared and ready for each exam.

<x-mail::table>
| Subject       | Date          | Start Time  | End Time    |
| ------------- |:-------------:| -----------:| -----------:|
@foreach ($data["subjects"] as $key => $subject )
| {{ $subject }}      | {{ $data["dates"][$key] }}      | {{ $data["startTimes"][$key] }}         | {{ $data["endTimes"][$key] }}            |
@endforeach
</x-mail::table>

Please remember to bring all necessary materials and arrive on time for each exam. Good luck and do your best!
    
Best regards,

{{$data["teacher_name"]}},
</x-mail::message>
