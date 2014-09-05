<div id="cse-broad-branding-box"></div>
<div id="cse-result-bar">
	<div class="result-count-box">
		<div class="result-count"></div>
		<div class="result-count-text">Results found for '<?php echo $_REQUEST['query']?>'</div>
	</div>
	<div class="result-pager-box">
		
	</div>
</div>


<div id="cse" style="width: 100%;">Loading</div>
<script src="http://www.google.com/jsapi" type="text/javascript"></script>
<script type="text/javascript">
  google.load('search', '1', {language : 'en'});
  google.setOnLoadCallback(function() {
    var customSearchControl = new google.search.CustomSearchControl('<?php echo variable_get('google_cse_cx', '');?>');
    customSearchControl.setResultSetSize(google.search.Search.FILTERED_CSE_RESULTSET);
	customSearchControl.setSearchCompleteCallback(this, OnSearchComplete);
    
	customSearchControl.draw('cse');
	customSearchControl.execute('<?php echo $_REQUEST['query']?>');
	
	google.search.Search.getBranding(document.getElementById("cse-broad-branding-box"));
	var customSearchBox = new google.search.Search();
	//customSearchBox.getBranding($('#cse-branding-box'));
  }, true);
  
  
  OnSearchComplete = function(sc, searcher){
  	//searcher.getBranding($('#cse-branding-box'));
	currentPage = (searcher.cursor.currentPageIndex+1);
  	$('#cse-result-bar .result-count').html(searcher.cursor.estimatedResultCount);
	$('.result-pager-box').html('Displaying '+(currentPage*10-9)+" to "+(currentPage*10)+" of "+searcher.cursor.estimatedResultCount+" Results");
  };
    
  
</script>
