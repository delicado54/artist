/* Author:

*/


        jQuery(document).ready(function() {
            
            if(jQuery("#filter:not(.subnav)").length > 0) { 
               jQuery('#q').liveUpdate('#grid').focus();            
               jQuery('#filter a').click(function (e) {
                    e.preventDefault();                     

                    // fill the #q element with the string from the data group attribute
                    jQuery('#q').val(jQuery(this).attr('data-group'));
                    // run liveupdate
                    jQuery('#q').liveUpdate('#grid').blur();
                    jQuery('#q').blur();
                    //alert('balls');
                    // set active class
                    jQuery('#filter a').removeClass('active');                    
                    jQuery(this).addClass('active');
                                
               });
            }

            jQuery( "#filter li a.active" ).trigger( "click" );

        });



