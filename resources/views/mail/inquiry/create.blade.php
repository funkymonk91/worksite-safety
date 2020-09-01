@component('mail::message')
# New Inuiry

**{{ $inquiry->name }}** (<a href="mailto:{{ $inquiry->email }}">{{ $inquiry->email }}</a>) has submitted an inquiry!

@component('mail::panel')
{{ $inquiry->message }}
@endcomponent
@endcomponent