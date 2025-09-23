@component('mail.html.message')
    # Mensagem de Contato

    **Nome**: {{ $data['nome'] }}
    **E-mail**: {{ $data['email'] }}
    **Telefone**: {{ $data['telefone'] }}
    **Assunto**: {{ $data['assunto'] }}
    **Mensagem**: {{ $data['mensagem'] }}

    Obrigado por entrar em contato!

    @component('mail.html.button', ['url' => 'https://auriweb.com.br'])
        Visite nosso site
    @endcomponent

    Atenciosamente,
    {{ config('app.name') }}
@endcomponent
