<x-mail::message>
# Introduction

Dear {{ $data["student_name"] }},

Welcome to {{ env('SCHOOL_NAME') }}'s management system, powered by Eversoft IT Solutions! We are excited to have you onboard and look forward to providing you with a seamless experience as you embark on your academic journey.

Your login credentials are as follows:

index number: {{ $data["login"] }}
<br>
Password: {{ $data["password"] }}

Please keep these details safe and secure, and do not share them with anyone. If you encounter any issues with your login or have any questions, please reach out to our technical support team at {{ env('SCHOOL_MOBILE') }}.

Our management system is designed to provide you with easy access to important information, such as your class schedules, academic progress, and campus news. You can also use the system to communicate with your teachers and peers, submit assignments, and access learning resources.

We encourage you to explore the system and take advantage of its features. We are confident that it will help you stay organized and on top of your studies, and we are always looking for ways to improve our offerings.

Thank you for choosing {{ env('SCHOOL_NAME') }}, and we wish you a successful academic year!

<a href="{{ env('APP_URL') }}">
<x-mail::button :url="''">
Visit Now
</x-mail::button>
</a>

Thanks,<br>
{{ env('SCHOOL_NAME') }} Management Team
</x-mail::message>
