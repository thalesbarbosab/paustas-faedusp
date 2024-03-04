@extends('components.cms.layout')
@section('title', 'Inicio')
@section('pagina', 'Inicio')
@section('content')
    <style>
        .data {
            margin-top: 5px;
            font-size: 15px;
        }

        .tempo {
            margin-top: 5px;
            font-size: 12px;
        }

        .products-list .product-info {
            margin-left: 30%;
        }
    </style>
    <br>
    <h5 id="data">-</h5>
    <h3 id="saudacao">-</h3>
    <div class="row">
        <div class="col-sm-5 col-md-3">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-mouse-pointer mr-1"></i>
                        Ir para o website
                    </h3>
                </div>
                <div class="card-body">
                    <a href="/">
                        <img src="/storage/default/go-to-website.png" class="w-50"><br>
                        Clique para ir ao website
                    </a>
                </div>
            </div>
        </div>
        @if(env('GOOGLE_ANALYTICS_URL_DASHBOARD'))
            <div class="col-sm-5 col-md-3">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-chart-pie mr-1"></i>
                            Google Analytics
                        </h3>
                    </div>
                    <div class="card-body">
                        <a href="{{ env('GOOGLE_ANALYTICS_URL_DASHBOARD') }}" target="_blank">
                            <img src="/storage/default/ga.jpg" class="w-100"><br>
                            Clique para ver a mensuração
                        </a>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
@section('custom-js')
    <script>
        $(document).ready(function() {
            $('#btn-collapse-card-futuro').click();
            // $('#btn-collapse-card-antigo').click();
            $('#btn-collapse-card-ultimos-10-lancamentos').click();

            var dataCompleta = new Date();
            var hora = dataCompleta.getHours();
            var minutos = dataCompleta.getMinutes();
            var dia = dataCompleta.getDate();
            var mes = dataCompleta.getMonth() + 1;
            var ano = dataCompleta.getFullYear();
            var semana = null;
            var nomeMes = null;

            function obterTempoDia(dataCompleta) {
                let _horaAtual = dataCompleta.getHours();
                let _tempo = 'Olá';
                if (_horaAtual >= 0 && _horaAtual < 6) {
                    _tempo = "Boa noite";
                }
                if (_horaAtual >= 6 && _horaAtual < 12) {
                    _tempo = "Bom dia";
                }
                if (_horaAtual >= 12 && _horaAtual < 18) {
                    _tempo = "Boa tarde";
                }
                if (_horaAtual >= 18 && _horaAtual <= 23) {
                    _tempo = "Boa noite";
                }
                tempo = _tempo;
            }

            function obterDiaSemana(dataCompleta) {
                let _semana = ["domingo", "segunda-feira", "terça-feira", "quarta-feira", "quinta-feira",
                    "sexta-feira", "sábado"
                ];
                semana = _semana[dataCompleta.getDay()];
            }

            function obterNomeMes(dataCompleta) {
                let _meses = ["janeiro", "fevereiro", "março", "abril", "maio", "junho", "julho", "agosto",
                    "setembro", "outubro", "novembro", "dezembro"
                ];
                nomeMes = _meses[dataCompleta.getMonth()];
            }
            obterDiaSemana(dataCompleta);
            obterTempoDia(dataCompleta);
            obterNomeMes(dataCompleta);
            $('#data').text(semana + ", " + dia + " de " + nomeMes + " de " + ano)
            $('#saudacao').text(tempo + ", " + "{{ Auth::user()->getFirstName() }}")
        });
    </script>
@endsection
