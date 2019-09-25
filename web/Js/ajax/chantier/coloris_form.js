$('#form_ajax').submit(function (e) {
    e.preventDefault();

    let $form = $(e.target);
    let modal = $('#modal_ajout_coloris');

    let $submitButton = $form.find('button[type=submit]');
    $submitButton.removeClass('btn-primary').addClass('btn btn-raised btn-secondary');
    $submitButton.html('<div class="loading"></div>')
    $submitButton.prop('disabled', true);

    $.ajax({
        type: "POST",
        url: to,
        data: $form.serialize(),
        success: function (data, dataType) {
            setTimeout(function () {
                $submitButton.removeClass('btn-secondary').addClass('btn btn-raised btn-primary');
                $submitButton.html('valider')
                $submitButton.prop('disabled', false);
                $('#notif_ajax').html(data.data).addClass('bg-success text-center text-light');
                setTimeout(() => {
                    modal.modal('toggle');
                }, 1800);
                setTimeout(() => {
                    window.location.replace(replace_url);
                }, 1900);
            }, 2000)
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            setTimeout(function () {
                $submitButton.removeClass('btn-secondary').addClass('btn btn-raised btn-primary');
                $submitButton.html('valider')
                $submitButton.prop('disabled', false);
                $('#notif_ajax').html(textStatus).addClass('bg-danger text-center text-light');
                setTimeout(() => {
                    modal.modal('toggle');
                }, 1800);
            }, 2000)
        }
    });
})