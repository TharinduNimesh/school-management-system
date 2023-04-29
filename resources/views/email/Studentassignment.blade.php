<x-mail::message>
    Dear {{ $data["guardian_Name"] }},

    I am writing to inform you about your child's assigned homework for today, {{ $data["date"] }}. Our school uses a management system that allows us to keep track of assignments and grades for each student, and I wanted to let you know that your child has been assigned the following homework:
    
    {{$data["url"]  }}

    Please ensure that your child completes the assigned homework by the due date indicated in the system. Completing homework on time is an important part of your child's academic success and helps them to stay on track with their learning goals.
    
    If your child needs any assistance in completing the homework or has any questions about the assignment, please encourage them to reach out to their teacher for support.
    
    Thank you for your cooperation in ensuring that your child stays on track with their academic progress.
        
Thanks,<br>
{{ env('SCHOOL_NAME') }} Management Team
</x-mail::message>
