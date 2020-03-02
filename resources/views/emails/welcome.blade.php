@component('mail::message')

Vitaj na stránke code_blog
Sme radi, že ste sa k nám pridali.
Pre plnohodnotné využívanie blogu prosím aktivujte svoj mail kliknutím na tlačítko nižšie.

@component('mail::button', ['url' => ''])
Aktivovať mail
@endcomponent

Ďakujeme,<br>
{{ config('app.name') }}
@endcomponent
