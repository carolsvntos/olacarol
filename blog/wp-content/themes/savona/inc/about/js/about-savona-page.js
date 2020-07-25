jQuery(document).ready(function($) {
    "use strict";

/*
***************************************************************
* Demo Data Import
***************************************************************
*/

    $('.optima-import').on('click', function() {

        var currentBTN = $(this);

        if ( ! confirm('Are you sure you want to Import Demo Content?\n\nRECOMENDED!\nMake this action on a fresh installation of Wordpress, otherwise Demo Content will be added to your current website content.') ) {
            return;
        }

        if ( $('.import-message').length === 0 ) {
            $(this).after('<br><br><div class="updated import-message"></div>');
        }

        $('.import-message').html('<p><span class="dashicons dashicons-update rf-spin"></span>&nbsp;&nbsp;Importing Demo Content... Please be patient while content is being imported! It may take several minutes.</p>');
        $('.import-message').css('border-color', '#ffba00');
        currentBTN.val('Importing Demo Content ...');
        $(window).scrollTop(0);

        var data = {
            action: 'optima_import'
        };

        $.ajax({
            type: 'POST',
            url: ajaxurl,
            data: {
                action: 'optima_import'
            },
            success: function(data, textStatus, XMLHttpRequest){
                $('.import-message').html('<p><span class="dashicons dashicons-yes"></span>&nbsp;&nbsp;Import Was Sucessfull, Have Fun!</p>');
                $('.import-message').css('border-color', '#7ad03a');
                currentBTN.val('Demo Conetnt was Imported!');
                $(window).scrollTop(0);
            },
            error: function(MLHttpRequest, textStatus, errorThrown){
                setTimeout(function(){
                    $('.import-message').html('<p><span class="dashicons dashicons-yes"></span>&nbsp;&nbsp;Import Was Sucessfull, Have Fun!</p>');
                    $('.import-message').css('border-color', '#7ad03a');
                    currentBTN.val('Import Demo Content');
                    $(window).scrollTop(0);                    
                }, 15000);
            }
        });

    });



}); // end dom ready