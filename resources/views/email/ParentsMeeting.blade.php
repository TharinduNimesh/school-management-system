<x-mail::message>
{{ $data["parent_name"] }},

We would like to invite you to a parent-teacher meeting to discuss your child's progress and academic performance at our school. This meeting will be held on {{$data["date"]}} at {{$data["time"]}} in {{$data["place"]}}.
    
During this meeting, you will have the opportunity to meet with your child's teacher and learn more about their academic achievements, classroom behavior, and any challenges they may be facing. We encourage all parents to attend, as this is an important opportunity to gain insight into your child's education and how we can work together to support their success.
    
If you are unable to attend this meeting, please let us know and we will arrange an alternative time for you to meet with your child's teacher.
    
Thank you for your continued support of our school and we look forward to meeting you soon.
    
Sincerely,
    
{{$data["teacher_name"]}},
</x-mail::message>

