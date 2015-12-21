/* Author:

*/


        jQuery(document).ready(function() {
            
            if(jQuery("#filter").length > 0) { 
               jQuery('#q').liveUpdate('#grid').focus();            
               jQuery('#filter a').click(function (e) {
                    // TODO - do this only if screen is larger than 675
                    e.preventDefault();                     

                    // fill the #q element with the string from the data group attribute
                    jQuery('#q').val(jQuery(this).attr('data-group'));
                    // run liveupdate
                    jQuery('#q').liveUpdate('#grid').blur();
                    jQuery('#q').blur();

                    // set active class
                    jQuery('#filter a').removeClass('active');
                    jQuery(this).addClass('active');
                                
               });
            }
        });



