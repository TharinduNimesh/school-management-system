<x-mail::message>
Dear {{$data["student"]}},

We are excited to announce an upcoming excursion to {{ $data["firstPlace"] }} that will take place {{ $data["duration"] }} from {{ $data["date"] }}. The trip will depart from {{ $data["place"] }} at {{ $data["time"] }}. We will be visiting {{ $data["viewpoints"] }} during our {{ $data["duration"] }} stay.
    
To ensure that you have a safe and enjoyable trip, please make sure to bring the following items with you: {{ $data["things"] }}, and any other personal items you may need.
    
The cost of the trip is Rs {{ $data["amount"] }} per student, which includes transportation, accommodations, and admission to all planned activities. Payment should be made in cash to your class teacher no later than {{ $data["deadline"] }}. Please note that payment is required in order to reserve your place on the trip.
    
We ask that all students arrive at the designated meeting point no later than {{ $data["time"] }} to ensure that we can depart on schedule. Please let us know as soon as possible if you will be unable to attend or if you have any questions or concerns about the trip.
    
We look forward to sharing this exciting experience with you and making lasting memories together.
    
Sincerely,

{{$data["teacher"]}},
</x-mail::message>
