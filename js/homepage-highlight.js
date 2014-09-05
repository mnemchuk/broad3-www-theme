Drupal.HomepageHighlight = function(textSelector, elementSelector){
	
	function handleMouseOver(e){
		var index = this.index;
		index = findIndex(index);
		if(!elementCollection[index])
			return false;
		
		var element = elementCollection.eq(index);
		
		element.addClass("active");
		
	}
	
	function handleMouseOut(e){
		var index = this.index;
		index = findIndex(index);
		if(!elementCollection[index])
			return false;
		
		var element = elementCollection.eq(index);
		
		element.removeClass("active");
		
	}

	function handleMouseClick(e){
		var index = this.index;
		index = findIndex(index);

		/*
		if(!textCollection[index])
			return false;
		var element = textCollection.eq(index);
		dest = $(element).attr("rel");
		if(dest){
			window.location = dest;
		}else{
			return false;
		}
		*/
		if(!elementCollection[index])
			return false;
		
		var element = elementCollection.eq(index);
		dest = $(element).find('a').attr('href');
		if(dest){
			window.location = dest;
		}else{
			return false;
		}
		
	}

	function findIndex(index){
		if(!textCollection[index])
			return false;
		var element = textCollection.eq(index);
		newIndex = $(element).attr("rel");
		if(newIndex){
			return newIndex-1;
		}else{
			return index;
		}

	}

		
	function prepareIndex(index){
		this.index = index;//this is the element	
	}	
	
	var textCollection = jQuery(textSelector);
	var elementCollection = jQuery(elementSelector);
	textCollection.each(prepareIndex);
	textCollection.mouseover(handleMouseOver);
	textCollection.mouseout(handleMouseOut);
	textCollection.click(handleMouseClick);
	
};

$(document).ready(function(){
	$('.node-teaser').find('h2.title a').mouseover(function(){
		$(this).parent().parent().parent().addClass("active");
	}).mouseout(function(){
		$(this).parent().parent().parent().removeClass("active");
	});
});
