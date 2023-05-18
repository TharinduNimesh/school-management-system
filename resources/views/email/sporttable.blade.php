<x-mail::message>
Dear {{ $data["student_name"] }},

Our school uses a management system that allows us to keep track of sports schedules, practices, and games for each student, and I wanted to let you know about the details for the following:
    
{{ $data["Sport"] }} practice on {{ $data["Day"] }} at {{ $data["Start_Time"] }} To {{ $data["End_Time"] }} at {{ $data["Place"] }}.
    
{{ $data["Description"] }}

Please ensure that you arrive on time and are prepared for each practice or game. Sports are an important part of your school experience and participating in them helps you to develop important skills such as teamwork and leadership.
    
Thanks,<br>
{{ env('SCHOOL_NAME') }}
</x-mail::message>
