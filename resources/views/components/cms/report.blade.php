@if(Session::has('report'))
    <div class="modal fade" id="modal-report-download" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-default">
                <div class="modal-header">
                    <h4 class="modal-title">{{Session::get('report_name')}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body ">
                    <div class="loading text-center">
                        <div class="spinner"></div>
                        <br>
                        <strong>Aguarde, seu relatório esta sendo preparado para download.</strong>
                    </div>
                    <div class="container error-to-download">
                        <i class="fas fa-exclamation-triangle"></i> <strong>Ops. Houve um problema ao buscar o relatório para download.</strong>
                    </div>
                    <div class="container ready-to-download">
                        <i class="far fa-check-circle"></i> <strong>Relatório gerado com sucesso!</strong>
                        <br><br>
                        <a type="button" class="btn btn-primary" href="{{Session::get('report_link')}}" target='download'><i class="fas fa-cloud-download-alt"></i> Download do relatório</a>
                    </div>
                </div>
                <div class="modal-footer justify-content-between close-button">
                    <button type="button" class="btn btn-outline-primary float-right" data-dismiss="modal">fechar</button>
                </div>
            </div>
        </div>
    </div>
@endif

