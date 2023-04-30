<x-mail::message>
Dear {{ $data["guardian_name"] }},

We are pleased to inform you that {{ $data["student_name"] }}'s subject marks for {{ $data["term"] }} are as follows:
    
Subject 1: {{ $data["marks"] }}

If you have any questions, please do not hesitate to contact us.

Thank you for your continued support.

Thanks,<br>
{{ env('SCHOOL_NAME') }} Management Team
</x-mail::message>
