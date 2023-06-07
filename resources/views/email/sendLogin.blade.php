<x-mail::message>
Dear {{ $data["role"] }},

We are excited to provide you with the login details for the School Management System. Please find your login credentials below:

Username: {{ $data["login"] }}
<br>
Password: {{ $data["password"] }}

To access the School Management System, please visit {{ $data["Website"] }} and enter your username and password.

Thanks,<br>
{{ env('SCHOOL_NAME') }}
</x-mail::message>