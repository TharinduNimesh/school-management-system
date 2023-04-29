<x-mail::message>
    Dear {{ $data["guardian_name"] }},

    I am writing to inform you that your child, {{ $data["student_name"] }}, was absent from school today, {{ $data["date"] }}. Our school uses a management system that allows us to keep track of attendance records for each student, and I wanted to let you know that your child was not present for all scheduled classes today.

    If your child was absent due to illness or other reasons, please provide us with a written excuse within three days of their return to school. We require written excuses for all absences, and failure to provide one may result in an unexcused absence being recorded.

    If you have any questions or concerns regarding your child's attendance record or the school's policies regarding absences, please contact to the school management team. We are always happy to help and provide any information you may need.

    Thank you for your cooperation in ensuring that your child attends school regularly and is able to benefit fully from their education.

    Thanks,<br>
    {{ env('SCHOOL_NAME') }} Management Team
</x-mail::message>
