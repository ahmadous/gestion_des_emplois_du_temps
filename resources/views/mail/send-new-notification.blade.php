<x-mail::message>
# Introduction
bonjour  <br>
vous avez recu une nouvelle notification de {{$data['name']}}
veillez cliquez sur le bouton ci-dessous pour plus de detail

<x-mail::button :url="'http://127.0.0.1:8000/notification'">
    cliquez ici
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
