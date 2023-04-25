<x-mail::message>
#  Rejection of Leave Request

Dear {{ $data["teacher_name"] }},

I regret to inform you that your leave request on our school management system has been reviewed and rejected. After careful consideration, we have determined that your absence during the requested period would create an undue burden on the school and your students.

Please note that your leave request for the following dates has been rejected:

<span style="font-weight: bold">Date:{{ $data["date"] }}</span>

Please log in to the school management system to view the details of your rejected leave and ensure that any necessary arrangements have been made for your classes during the requested period.

If you have any questions about the rejection process or would like to discuss alternative leave arrangements, please contact the appropriate administrator.

Thank you for your understanding, and we appreciate your commitment to our students and school.

Thanks,<br>
{{ env('SCHOOL_NAME') }} Management Team
</x-mail::message>
