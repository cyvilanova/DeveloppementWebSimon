$(function () {
    $('.chk').click(function () {
        if ($(this).attr('checked') === undefined) {
            $(this).attr('checked', "");
            $(this).removeAttr('unchecked');
            $(this).html('X');
            $('input[type=checkbox]').prop('checked', true);
        } else {
            $(this).removeAttr('checked');
            $(this).attr('unchecked', "");
            $(this).html('');
            $('input[type=checkbox]').prop('checked', false);
        }
    });
});
