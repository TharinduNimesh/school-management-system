<x-mail::message>
Dear {{ $data["student_name"] }},

We hope this email finds you well. We would like to inform you that the subject selection process for the upcoming academic year has been completed, and we are pleased to inform you that your chosen subjects have been approved.
    
The subjects that you have been approved for are as follows:
    
{{ $data["approved_subjects"] }}
    
Please note that you are expected to attend all classes and complete all assignments related to these subjects. If you have any questions or concerns about the subjects you have been approved for, please do not hesitate to contact us.

Thanks,<br>
{{ env('SCHOOL_NAME') }} Management Team
</x-mail::message>
