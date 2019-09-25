$('#form_suppression_ajax').submit(function (e) {
    e.preventDefault();

    let $form2 = $(e.target);
    let modal2 = $('#modal_suppression_bien');

    let $submitButton2 = $form2.find('button[type=submit]');
    $submitButton2.removeClass('btn-primary').addClass('btn btn-raised btn-secondary');
    $submitButton2.html('<div class="loading"></div>')
    $submitButton2.prop('disabled', true);

    $.ajax({
        type: "POST",
        url: to_form_suppression_bien,
        data: $form2.serialize(),
        success: function (data, dataType) {
            /**/
            setTimeout(function () {
                $submitButton2.removeClass('btn-secondary').addClass('btn btn-raised btn-primary');
                $submitButton2.html('valider')
                $submitButton2.prop('disabled', false);
                $('#notif_suppression_ajax').html(data.data).addClass(`bg-${data.label} text-center text-light`);
                setTimeout(() => {
                    modal2.modal('toggle');
                }, 1800);
                setTimeout(() => {
                    window.location.replace(replace_url);
                }, 1900);
            }, 2000)
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            setTimeout(function () {
                $submitButton2.removeClass('btn-secondary').addClass('btn btn-raised btn-primary');
                $submitButton2.html('valider')
                $submitButton2.prop('disabled', false);
                $('#notif_suppression_ajax').html(textStatus).addClass('bg-danger text-center text-light');
                setTimeout(() => {
                    modal2.modal('toggle');
                }, 1800);
            }, 2000)
        },
        complete: function (data) {
            modal2.find('.modal-body').html('<div class="text-center"><div class="loading-black"></div></div>');
        }
    });
})