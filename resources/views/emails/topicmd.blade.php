@component('mail::message')
# Introduction

The body of your message.{{ $title }}

@component('mail::button', ['url' => 'www.imshuai.cn'])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
