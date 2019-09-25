let url;
let to;
let replace_url = $('#replace').data('replace');
$('#button_url_coloris').click(function(){
    url = $(this).data('path');
    to = $(this).data('to');
    $('#notif_ajax').html('');
});

$('#modal_ajout_coloris').on('shown.bs.modal', function () {
    let modal = $(this);
    $.ajax(url, {
        success: function() {
            modal.find('.modal-body').html('<div class="text-center"><div class="loading-black"></div></div>');
        },
        error: function () {
            modal.find('.modal-body').html('Une erreur est survenue');
        },
        complete: function (data) {
            setTimeout(function () {
                modal.find('.modal-body').html(data.responseText);
            }, 500)
        }
    });
});