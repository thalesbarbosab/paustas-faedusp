{{-- Intern Components Config --}}
@if (Session::has('report'))
    <script>
        function performReport() {
            return $(function() {
                $('#modal-report-download').modal({
                    show: true
                });
                $('.loading').show();
                $('.close-button').hide();
                $('.ready-to-download').hide();
                $('.error-to-download').hide();
                setTimeout(function() {
                    $('.loading').hide();
                    $('.ready-to-download').fadeIn('300');
                    $('.close-button').fadeIn('300');
                }, 2000);
            });
        }

        function performReportVerifingIfFileExists() {
            $(async function() {
                $('#modal-report-download').modal({
                    show: true
                });
                $('.loading').show();
                $('.close-button').hide();
                $('.ready-to-download').hide();
                $('.error-to-download').hide();
                setTimeout(async function() {
                    for (counter = 1; counter <= 30; counter++) {
                        await new Promise(r => setTimeout(r, 1500));
                        const file_exists = await doesFileExist(
                        '{{ Session::get('report_link') }}');
                        if (file_exists) {
                            setTimeout(function() {
                                $('.loading').hide();
                                $('.ready-to-download').fadeIn('300');
                                $('.close-button').fadeIn('300');
                            }, 800);
                            return;
                        }
                    }
                    $('.loading').hide();
                    $('.error-to-download').fadeIn('300');
                    $('.close-button').fadeIn('300');
                }, 5000)
            });
        }
        performReport();
    </script>
@endif
{{-- JS Functions --}}
<script>
    /* The doesFileExist function doesnt work in apis with cors enabled */
    async function doesFileExist(url_to_file) {
        const xhr = new XMLHttpRequest();
        xhr.open('HEAD', url_to_file, false);
        xhr.setRequestHeader('Access-Control-Allow-Origin', '*');
        xhr.send();
        if (xhr.status == "200") {
            return true;
        }
        return false;
    }
</script>
