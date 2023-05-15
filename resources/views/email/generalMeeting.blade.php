<x-mail::message>
Dear {{ $data["student"]}},

We would like to invite you to a general meeting that will take place on {{$data["date"]}}at {{$data["time"]}}. The meeting will be held in {{$data["place"]}}, and the purpose of the meeting is to {{ $data["subject"] }}.
    
During this meeting. The meeting will last approximately least 2 hours.

Please make sure to arrive on time and bring any necessary materials or information. If you are unable to attend, please let us know as soon as possible so that we can make arrangements for you to receive the information that will be presented.
    
We look forward to seeing you at the meeting and working together to achieve our goals.
    
Sincerely,
    
{{$data["teacher"]}},
{{ env('SCHOOL_NAME') }}
</x-mail::message>
