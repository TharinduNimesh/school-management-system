<x-mail::message>
# Approval of Leave Request

Dear {{ $data["teacher_name"] }},

I am writing to inform you that your leave request on our school management system has been reviewed and approved. Your absence during the requested period has been noted and your classes have been appropriately reassigned.

Please note that your leave has been approved for the following dates:

<span style="font-weight: bold">Date:{{ $data["date"] }}</span>

Please log in to the school management system to view the details of your approved leave and ensure that any necessary preparations have been made for your absence.

If you need to make any changes to your leave request or if you have any questions about the approval process, please contact the appropriate administrator.

Thank you for your cooperation, and we wish you a productive and restful time away from work.

Thanks,<br>
{{ env('SCHOOL_NAME') }} Management Team
</x-mail::message>
