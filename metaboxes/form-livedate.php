<div class="my_meta_control">
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript" src="/wp-content/themes/fotsn/includes/js/gmap3.js"></script>
<style type="text/css">
.ui-timepicker-div .ui-widget-header { margin-bottom: 8px; }
.ui-timepicker-div dl { text-align: left; }
.ui-timepicker-div dl dt { float: left; clear:left; padding: 0 0 0 5px; }
.ui-timepicker-div dl dd { margin: 0 10px 10px 40%; }
.ui-timepicker-div td { font-size: 90%; }
.ui-tpicker-grid-label { background: none; border: none; margin: 0; padding: 0; }
.ui-timepicker-div .ui_tpicker_unit_hide{ display: none; }

.ui-timepicker-rtl{ direction: rtl; }
.ui-timepicker-rtl dl { text-align: right; padding: 0 5px 0 0; }
.ui-timepicker-rtl dl dt{ float: right; clear: right; }
.ui-timepicker-rtl dl dd { margin: 0 40% 10px 10px; }

/* Shortened version style */
.ui-timepicker-div.ui-timepicker-oneLine { padding-right: 2px; }
.ui-timepicker-div.ui-timepicker-oneLine .ui_tpicker_time, 
.ui-timepicker-div.ui-timepicker-oneLine dt { display: none; }
.ui-timepicker-div.ui-timepicker-oneLine .ui_tpicker_time_label { display: block; padding-top: 2px; }
.ui-timepicker-div.ui-timepicker-oneLine dl { text-align: right; }
.ui-timepicker-div.ui-timepicker-oneLine dl dd, 
.ui-timepicker-div.ui-timepicker-oneLine dl dd > div { display:inline-block; margin:0; }
.ui-timepicker-div.ui-timepicker-oneLine dl dd.ui_tpicker_minute:before,
.ui-timepicker-div.ui-timepicker-oneLine dl dd.ui_tpicker_second:before { content:':'; display:inline-block; }
.ui-timepicker-div.ui-timepicker-oneLine dl dd.ui_tpicker_millisec:before,
.ui-timepicker-div.ui-timepicker-oneLine dl dd.ui_tpicker_microsec:before { content:'.'; display:inline-block; }
.ui-timepicker-div.ui-timepicker-oneLine .ui_tpicker_unit_hide,
.ui-timepicker-div.ui-timepicker-oneLine .ui_tpicker_unit_hide:before{ display: none; }
</style>


<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
<script type="text/javascript" src="/wp-content/themes/fotsn/includes/js/jquery-ui-timepicker-addon.js"></script>

<script>


//<![CDATA[

	///////////////////////////

	var geocoder;
	var map;
	var marker;
		
	///////////////////////////
		
	jQuery(document).ready(function() {
	 
					 
		jQuery("#get-location").click(function(){
			jQuery('#map').css({'height':'200px'})
			loadInitMap();
		  	var the_address = jQuery('#livedate-address').val();
			var geocoder = new google.maps.Geocoder();
			var latLng = geocoder.geocode({
				address: the_address
			},function(results, status) {
									
				if(status == google.maps.GeocoderStatus.OK) {
										
					lat = results[0].geometry.location.lat();
					lng = results[0].geometry.location.lng();
										
					jQuery('#livedate-lat').val(lat);
					jQuery('#livedate-lng').val(lng);

					jQuery(gMap).gmap3({
											
											get: {
												
												name: 'marker',
												all: true,
												callback: function(objs) {
													
													jQuery.each(objs, function(i, obj) {
														
														obj.setMap(null);
														
													})
													
												}
												
											},
											
											map: {
												
												options: {
												
													zoom: 14,
													center: new google.maps.LatLng(lat, lng)
												
												}
												
											},
											marker: {
												
												values: [{ latLng:[lat, lng] }],
												options: {
													
													draggable: true
													
												},
												events: {
													
													mouseup: function(marker, event, context) {
														
														//// GETS MARKER LATITUDE AND LONGITUDE
														var thePos = marker.getPosition();
														var theLat = thePos.lat();
														var theLng = thePos.lng();
														
														jQuery('#livedate-lat').val(theLat);
														jQuery('#livedate-lng').val(theLng);
														
													}
													
												}
												
											}
											
										});

				} else {

					alert('Could not find the latitude and longitude for the address '+the_address);
				
				}
									
			});
								
		}); 


     jQuery( "#datepicker,#datepicker2" ).datetimepicker({dateFormat: 'dd-mm-yy',controlType: 'select',
     oneLine: true,
     timeFormat: 'HH:mm'});

   

 	}); 

function loadInitMap() {
							
			
		if(typeof gMap == 'undefined') {
							
							
			//// CREATES A MAP
			gMap = jQuery('#map');
			
			gMap.gmap3({
				
				map: {
					
					options: {
						
						zoom: 2,
						mapTypeId: google.maps.MapTypeId.ROADMAP,
						mapTypeControl: true,
						mapTypeControlOptions: {
						  style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
						},
						navigationControl: true,
						scrollwheel: true,
						streetViewControl: false
						
					}
					
				}
				
			});
			
			//// IF LATITUDE AND LONGITUDE ARE SET
			var lat = jQuery('#livedate-lat').val();
			var lng = jQuery('#livedate-lng').val();
			
			if(lat != '' && lng != '') { if(!isNaN(lat) && !isNaN(lng)) {
				
				//// SET MAP
				jQuery(gMap).gmap3({
					
					map: {
						
						options: {
							
							zoom: 14,
							center: new google.maps.LatLng(lat, lng)
							
						}
						
					},
					
					marker: {
						
						values: [{ latLng:[lat, lng] }],
						options: {
							
							draggable: true
							
						},
						events: {
							
							mouseup: function(marker, event, context) {
								
								//// GETS MARKER LATITUDE AND LONGITUDE
								var thePos = marker.getPosition();
								var theLat = thePos.lat();
								var theLng = thePos.lng();
								
								jQuery('#livedate-lat').val(theLat);
								jQuery('#livedate-lng').val(theLng);
								
							}
							
						}
						
					}
					
				});
				
			} }
		
		}
		
	}

//]]>
</script>


<p><?php $mb->the_field('_fulldate'); ?>
<label>Date and Time</label>
<input type="text" id="datepicker" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" /></p>
		  <p>
		<?php $mb->the_field('summaryline'); ?>
                <label style="display:block" for="summaryline">Summary line (optional!)</label>
		<input type="text" id="summaryline" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" /> 
	</p>

 <p>
    <?php $mb->the_field('repeatingshow'); ?>
    <label for="repeatingshow">
    <input type="checkbox" onclick="toggle('.repeatingshowstuff', this)" id="repeatingshow" name="<?php $metabox->the_name(); ?>" value="1"<?php if ($metabox->get_the_value()) echo ' checked="checked"'; ?>/>  

    This is a repeating show at the same venue and I only want there to be one entry shown on the page
    </label>
  </p>	
  <div class="repeatingshowstuff"<?php if (!$metabox->get_the_value()): ?> style="display:none"<?php endif; ?>>
<p><?php $mb->the_field('_lastdate'); ?>
<label>OK - what is the last date?</label>
<input type="text" id="datepicker2" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" /></p>
<p>
		<?php $mb->the_field('shownotes'); ?>
                <label style="display:block" for="summaryline">Enter any extra info (e.g. 'no show on this day')</label>
		<input type="text" id="shownotes" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" /> 
	</p>  
</div>
 
 <h4>Show</h4>
  
	<?php $mb->the_field('show'); 
  $shows = new WP_Query(
    array(
	    'post_type' => 'show',
	    'post_status' => 'publish',
	    'orderby' => 'title',
	    'order' => 'ASC',
      'posts_per_page' => -1   
    )
  );
	
	while($shows->have_posts()): $shows->the_post();
    
  ?>
  <p>
  <label for="show_<?php the_id(); ?>">
	<input<?php if($post->ID == $mb->get_the_value()): ?> checked="checked"<?php endif; ?> type="radio" value="<?php the_id(); ?>" name="<?php $mb->the_name(); ?>" id="show_<?php the_id(); ?>" /><?php the_title(); ?></label>
	</p>
	<?php endwhile; wp_reset_postdata(); ?><br />
  <p>
		<?php $mb->the_field('ticketlink'); ?>
                <label style="display:block" for="ticketlink">Ticket Link (with HTTP etc)</label>
		<input type="text" id="ticketlink" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" /> 
	</p>
 <p>
    <?php $mb->the_field('sold_out'); ?>
    <label for="sold_out">Is this show sold out?</label>
    <input type="checkbox" id="sold_out" name="<?php $metabox->the_name(); ?>" value="1"<?php if ($metabox->get_the_value()) echo ' checked="checked"'; ?>/>
  
  </p>	
  <p>
		<?php $mb->the_field('fblink'); ?>
                <label style="display:block" for="fblink">Facebook Link (with HTTP etc)</label>
		<input type="text" id="fblink" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" /> 
	</p>
		  <p>
		<?php $mb->the_field('restrictions'); ?>
                <label style="display:block" for="restrictions">Restrictions (e.g. 18+ show)</label>
		<input type="text" id="restrictions" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" /> 
	</p>	
  	<p>
		<?php $mb->the_field('city'); ?>
    	<label style="display:block" for="livedate-city">City</label>
		<input type="text" id="livedate-city" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" /> 
	</p>
	
  	<p>
		<?php $mb->the_field('address'); ?>
    	<label style="display:block" for="livedate-address">Address</label>
		<input type="text" id="livedate-address" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" /> 
	</p>
	<button type="button" id="get-location" class="button">Get location</button>

	<p>
		<?php $mb->the_field('lat'); ?>
    	<label style="display:block" for="livedate-lat">Latitude</label>
		<input type="text" id="livedate-lat" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" /> 
	</p>
	<p>
		<?php $mb->the_field('lng'); ?>
    	<label style="display:block" for="livedate-lng">Longitude</label>
		<input type="text" id="livedate-lng" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" /> 
	</p>
  
	<input type="submit" class="button-primary" name="save" value="Save">
	<p>
	<strong>Type in your address to set pin. Pin is draggable.</strong>
	</p>

	<div id="map" style="width:100%;height:0px;"></div>

</div>
<script>
 function toggle(className, obj) {
    var $input = jQuery(obj);
    if ($input.prop('checked')) jQuery(className).show();
    else jQuery(className).hide();
	}
</script>