<x-mail::message>
    Dear {{ $data["student_name"] }},

    I am writing to inform you about the homework assigned to you between start date {{$data["start_date"]}} and end date {{$data["end_date"]}}. Our school uses a management system that allows us to keep track of assignments and grades for each student, and I wanted to let you know that you have been assigned the following homework:

        @php
            $url = $data["url"];
        @endphp
        <x-mail::button :url="$url">
        Visit Now
        </x-mail::button>

    Please ensure that you complete the assigned homework by the due date indicated in the system. Completing homework on time is an important part of your academic success and helps you to stay on track with your learning goals.

    If you need any assistance in completing the homework or have any questions about the assignment, please do not hesitate to reach out to your teacher for support.

    If you have any questions or concerns regarding your homework or the school's policies regarding assignments, please feel free to contact me or the school management team. We are always happy to help and provide any information you may need.

    Thank you for your cooperation in ensuring that you stay on track with your academic progress.
        
Thanks,<br>
{{ env('SCHOOL_NAME') }} Management Team
</x-mail::message>
