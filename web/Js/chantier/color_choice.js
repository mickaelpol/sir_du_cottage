$(document).ready(function() {

    _colors = $('._select_color_drop li');
    for (var i = _colors.length - 1; i >= 0; i--) {
        $(_colors[i]).click(function(){
            var ul = $(this).parent();
            var input = ul.parent().find('input');
            var color_text = $(this).find('span').attr('_text_display');
            var elemnt = $(this).closest('._select_color_drop').prev();
            elemnt.find('span.color').remove();
            $(this).find('span').clone().appendTo(elemnt);
            var contents = $(elemnt).contents();
            if (contents.length > 0) {
                if (contents.get(0).nodeType == Node.TEXT_NODE) {
                    $(elemnt).html(color_text).append(contents.slice(1));
                }
            }
            if($('[class=_color]').val() == undefined){
                elemnt.next().append("<input type='hidden' class='_color' value='"+color_text+"'>");
            }else{
                $(input).val(color_text)
                let color = $(this).children()[0].classList;
                let oldColor = ul.parent().parent().parent()[0].classList[0];
                ul.parent().parent().parent().removeClass(oldColor);
                ul.parent().parent().parent().addClass(color[1])
            }
        })
    };
})