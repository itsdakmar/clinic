$(document).ready(function () {

    $(".sex").change(function() {
        if(this.checked) {
            $('.sex_error').hide();
        }
    });

    $(".race").change(function() {
        if(this.checked) {
            $('.race_error').hide();
        }
    });

    $("#datePicker").change(function() {
        $(this).css({"border-color": ""});
        $('.birth_error').hide();
    });


    $('#datePicker').pickadate({
        format: 'dd/mm/yyyy',
        selectMonths: true,
        selectYears: 90
    });
    $('.userType').on('change', function () {
        $('.student_staff').hide();
        $(($(this).val() == 1) ? '#student' : '#staff').show();
    });

    $("#input_state").on('change', function () {
        let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        let url = $(this).data('href');
        $.ajax({
            url: url,
            type: 'POST',
            data: {_token: CSRF_TOKEN, stateId: $("#input_state").val()},
            dataType: 'JSON',
            success: function (data) {
                $('#input_city').find('option').remove().end().append($('<option>', {
                    value: '',
                    text: 'Please select your city'
                }));
                $.each(data, function (i, datum) {
                    $('#input_city')
                        .append($('<option>', {
                            value: datum.id,
                            text: datum.name
                        }));
                });
            }
        });
    });

    $('.needs-validation').on('submit', function (e) {
        if (!this.checkValidity()) {
            e.preventDefault();
            e.stopPropagation();

            if (!$(".sex").is(':checked')) {
                $('.sex_error').show();
            }
            if (!$(".race").is(':checked')) {
                $('.race_error').show();
            }

            if (!$('#datePicker').is(':valid')) {
                $('.birth_error').show();
                $('#datePicker').css({"border-color": "#f44336"});
            }
        }
        $(this).addClass('was-validated');

        if ($('.userType').is(':checked')) {
            let userType = $('input[name="userType"]:checked').val();
            if (userType === 'staff' && $('#input_staffNo').val() === '') {
                e.preventDefault();
                e.stopPropagation();
                $('#input_staffNo').css({"border-color": "#f44336"});
                $('#input_staffNo').next().next().show();
            }

            if (userType === 'student' && $('#input_matricNo').val() === '') {
                e.preventDefault();
                e.stopPropagation();
                $('#input_matricNo').css({"border-color": "#f44336"});
                $('#input_matricNo').next().next().show();
            }
        }

    });
});