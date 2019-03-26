@component('mail::message')
# Hello {{ $recipient->name }}

The post <strong>'{{ $post->title }}'</strong> was updated by {{ $sender->name }}.

@component('mail::button', ['url' => route('posts.show', $post)])
See updated version
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
