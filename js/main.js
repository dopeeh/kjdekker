// Functie voor het verbergen van een stuk tekst.
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

// Jquery animaties
$(document).ready(function() {

    //de tab en de content-holder animaties
    $('#navigation')
        .on("mouseover", function() {
            $('.small-tab').addClass("small-tab-alt");
            $('.content-holder').addClass("content-holder-alt");
    })
        .on("mouseout", function(){
            $('.small-tab').removeClass("small-tab-alt");
            $('.content-holder').removeClass("content-holder-alt");
    });
    $('.small-tab')
        .on("click", function() {
            $('.small-tab').addClass("small-tab-alt");
            $('.content-holder').addClass("content-holder-alt");
    })
});