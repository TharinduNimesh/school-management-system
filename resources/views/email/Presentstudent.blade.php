<x-mail::message>
Dear {{ $data["guardian_name"] }},

I am writing to inform you about your child's attendance for today, {{ $data["date"] }}. As you may know, our school uses a management system that allows us to keep track of attendance records for each student.
    
I am pleased to report that your child, {{ $data["student_name"] }}, was present for all scheduled classes today. 
    
If you have any questions or concerns regarding your child's attendance record, please contact to the school management team. We are always happy to help and provide any information you may need.
    
Thank you for your cooperation in ensuring that your child attends school regularly and is able to benefit fully from their education.

Thanks,<br>
{{ env('SCHOOL_NAME') }} Management Team
</x-mail::message>