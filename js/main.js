function tldr(id) {
    if(!$('#' + id).hasClass('hidden')) {
        $('#' + id).addClass('hidden');
        $('.tldr-message').removeClass('hidden');
        $('.tldr-button').html('Meer lezen..');
    } else {
        $('#' + id).removeClass('hidden');
        $('.tldr-message').addClass('hidden');
        $('.tldr-button').html('TL:DR');
    }
}