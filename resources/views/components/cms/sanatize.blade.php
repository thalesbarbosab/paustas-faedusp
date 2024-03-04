@php
    //Sanatize inputs
@endphp
<script type="text/javascript">
    $(document).ready(function($) {
    //sanatize inputs with the default class
        $('.moeda').mask('#0.00', {reverse: true});
        $('.cpf').mask('000.000.000-00', {reverse: true,clearIfNotMatch: true});
        $('.cnpj').mask('00.000.000/0000-00', {reverse: true,clearIfNotMatch: true});
        $('.date').mask('00/00/0000');
        $('.cep').mask('00000-000');
        $('.phone_with_ddd').mask('(00) 0000-0000',{clearIfNotMatch: true});
        $('.celphone_with_ddd').mask('(00) 00000-0000',{clearIfNotMatch: true});
        $('.money').mask('000.000.000.000.000,00', {reverse: true});
        $('.money2').mask("#.##0,00", {reverse: true});
    });
</script>
