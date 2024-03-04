@component('mail::message')
    <h1>Novo contato via website</h1>
    <p>Nome: {{ $name }}</p>
    <p>E-mail: {{ $email }}</p>
    <p>Mensagem: {{ $message }}</p>
@endcomponent

