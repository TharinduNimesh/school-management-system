<x-mail::message>
# Introduction

Dear {{ $data["Teacher_Name"] }},

I am writing to provide you with the login details for your account on {{ env('SCHOOL_NAME') }}. You can use these details to access your account and begin using the platform or system.

Username: {{ $data["login"] }}
<br>
Password: {{ $data["password"] }}

Please note that this information is confidential and should not be shared with anyone. If you have any questions or concerns about your account, please contact me or the appropriate administrator.

Thank you for your cooperation, and we look forward to working with you on {{ env('SCHOOL_NAME') }}.

<x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,<br>
{{ env('SCHOOL_NAME') }} Management Team
</x-mail::message>
