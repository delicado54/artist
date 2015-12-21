jQuery.fn.liveUpdate = function(list){
	list = jQuery(list);

	if ( list.length ) {
		var rows = list.children('li'),
			cache = rows.map(function(){
				mytitle = jQuery(this).find('h3').html();
				//return mytitle.innerHTML.toLowerCase();
				//alert(mytitle);
				//console.log(mytitle);
				//console.log($(mytitle).get(0));
				//console.log($(mytitle).text().toLowerCase());
				//return mytitle.innerHTML.toLowerCase();
				groups = jQuery(this).attr('data-groups');
				

				//console.log(mytitle.toLowerCase() + groups.toLowerCase());				
				return mytitle.toLowerCase() + groups.toLowerCase();

			});
			
		this
			.keyup(filter).keyup()
			.parents('form').submit(function(){
				return false;
			});
	}
	
	return this;
		
	function filter(){
		var term = jQuery.trim( jQuery(this).val().toLowerCase() ), scores = [];
		searchterm = jQuery.trim( jQuery(this).val().toLowerCase() );
		var someresults = 0;
		jQuery("#nomatches").hide();

		if ( !term ) {
			rows.show();
		} else {
			rows.hide();
			cache.each(function(i){
				//console.log(cache);
				// new version score will be 1 or 0
				if (this.indexOf(searchterm) >= 0){
					score = 1;
					someresults +=1;
				}
				else{
					score = 0;
				}

				//var score = this.score(term);
				//console.log(score);
				if (score > 0) { scores.push([score, i]); }
			});

			jQuery.each(scores.sort(function(a, b){return b[0] - a[0];}), function(){
				jQuery(rows[ this[1] ]).show();
			});		
			if(someresults == 0){
				jQuery("#nomatches").show();
			}					
		}
			
	if(jQuery(this).val()!=''){
		jQuery('#clearfilter').css('display','block');
	}

	}
};
