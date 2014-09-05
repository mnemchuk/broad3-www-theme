//this is not the stock jquery autocomplete plugin (obviously)

var currentTimer;
$(document).ready(function() {
	$('input.broad-autocomplete').parent().append('<img id="auto-complete-spinner" src="'+DATA_SERVER+'sites/all/themes/broad3/img/ajax-loader.gif" border="0"/>')
	var pos = $("input.broad-autocomplete").offset();  
  	$("#autocomplete-results").css( { "left": (pos.left) + "px", "top":(pos.top+25) + "px" } );
	
	$('input.broad-autocomplete').attr("autocomplete", "off");
	$('input.broad-autocomplete').keyup(function(e) {
		var term = $(this).val();
		if (e.keyCode != 13 && term.length >= 3) {
			clearTimeout(currentTimer);
			currentTimer = setTimeout(function() { searchForMatch(term) }, 250);
		} else {
			if(e.keyCode == 13){
				
			}
			$('#autocomplete-results').hide();
		}
	});
	$('input.broad-autocomplete').blur(function(){
		$('#autocomplete-results').fadeOut(1500);
	});
});

function searchForMatch(term) {
	$('#auto-complete-spinner').show();
	destination = $('#broad-tag-view-search-form').attr("action");
	destination = destination.replace("software", "software_ajax");
	destination = destination.replace("data", "data_ajax");
        destination = destination.replace("videos", "videos_ajax"); 
	destination = destination.replace("news.html", "news_ajax");
	//must only match "/news" and not /news
	destination = destination.replace(/news(?!-)/, "news_ajax");
	destination = destination.replace("press", "press_ajax");
	$.post(destination, { 'ajax': "1", 'criteria': term }, displayMatches, 'json');
}

function displayMatches(data) {
	response = "No items matched your search.";
	if (data != undefined) {
		if (data.length != undefined && data.length != 0) {
			response = "";
			for (var x = 0; x < data.length; x++) {
				var item = data[x];
				
				if (item.node_title != "" && item.node_title != undefined) {
					response += "<div><a href='" + DATA_SERVER + "node/" + item.nid + "'>" + item.node_title + "</a></div>";
				} else {
				
					response += "<div><a href='" + item.node_data_field_links_field_links_url + "'>" + item.node_data_field_links_field_links_title + "</a></div>";
				}
			}
		}
	}
	$('#autocomplete-results').html(response).show();
	$('#auto-complete-spinner').hide();
}
