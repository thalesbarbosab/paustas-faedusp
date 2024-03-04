{{-- Plugins Config --}}
<script>
    $(document).ready(function($){
        // $('.select2').select2({
        //     language: {
        //         noResults: function(){
        //             return "Nenhum resultado encontrado"
        //         }
        //     }
        // });
        $('.summernote').summernote({
            height: 200,
            placeholder: "Informe aqui o conteúdo desejado.",
            lang: "pt-BR",
            toolbar: [
                ['font', ['bold', 'underline', 'clear']],
                ['fontname', ['fontname']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['codeview', 'help']]
            ],
            callbacks: {
                onImageUpload: function(files) {
                    alert("Não é possível selecionar arquivos!")
                }
            }
        })
    })
</script>
{{-- // --}}
