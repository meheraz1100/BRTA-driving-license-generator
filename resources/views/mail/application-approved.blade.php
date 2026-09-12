<x-mail::message>
# Application Approved

Dear {{ $application->name_english }},

কংগ্রাচুলেশন. আপনি আপনার নকল ড্রাইভিং লাইসেন্স পেয়ে গেছেন। 
সাবধান ঃ রাস্তা-ঘাঁটে পুলিশকে ভুলেও দেখাবেন না। ডান্ডার বাড়ি একটাও মাটিতে পড়বে না। 

**Application Number:** {{ $application->application_no }}

**Status:** Approved

Your Fake BRTA license PDF is attached to this email.

Please keep the attached PDF for your records.

Thanks,<br>
BRTA Fake License Team
</x-mail::message>