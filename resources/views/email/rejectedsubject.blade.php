<x-mail::message>
Dear {{ $data["student_name"] }},

We regret to inform you that your selected subject(s) cannot be offered to you for the upcoming academic session due to the unavailability of seats in the desired subject(s).
    
We understand that this may come as disappointing news, and we apologize for any inconvenience caused. However, we would like to assure you that we have taken all necessary steps to ensure a fair and unbiased selection process. Unfortunately, due to the limited capacity and high demand for some subjects, we were unable to accommodate all students' preferences.
    
You can apply for another subject.
If you wish to select an alternative subject, please fill subject selection form whithin 72 hours indicating your preferred alternate subject(s) . This will ensure that you are enrolled in an appropriate subject for the upcoming academic session.
    
Click the button below to apply for another subject
    
<x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,<br>
{{ env('SCHOOL_NAME') }} Management Team
</x-mail::message>
