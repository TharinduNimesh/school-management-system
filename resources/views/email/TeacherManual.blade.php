<x-mail::message>
# {{ $data['subject'] }}
Dear {{ $data["student_name"] }}, <br>

{{ $data["message"] }}

Thanks,<br>
{{ $data['teacher_name'] }}
</x-mail::message>
