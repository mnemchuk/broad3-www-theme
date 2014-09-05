(function($) {
    $(document).ready(function() {
        $('#secondary li.expanded').hover(
            function() {
                $('#secondary li.expanded').removeClass('subnav-shown');
                $('#secondary a').removeClass('secondary-hover-anchor');
                $(this).addClass('subnav-shown');
                $(this).children('a').addClass('secondary-hover-anchor');
            },
            function() {
                $(this).removeClass('subnav-shown');
                $(this).children('a').removeClass('secondary-hover-anchor');
            }
        );


        $('#edit-search-theme-form-1').focus(function() {
          if ($(this).val() == 'Search...')  {
            $(this).val('');
          }
        }).blur(function() {
          if (this.value.length == 0) {
            $(this).val('Search...');
          }
        });
        
        $('.share-this-link').bind('click', function() {
            var me = $(this);

            var list = $('.share-this-outer', me.parent());
            list.toggle();

            //var pos = me.offset();
			//list.css('top', pos.top - list.height() - 8 + 'px');
            //list.css('left', pos.left + 8 + 'px');

            return false;
        });

        $('.close-share-this').bind('click', function() {
            $(this).closest('.share-this-outer').hide();
        });
        
        // Glossary module
        var glossary = function() {
            var terms = Drupal.settings.glossary_taxonomy;
           
            return {
                'find': function(_name) {
        	 alert("Name="+_name);   
		 alert(terms.length);
	         for(var i=0; i <= terms.length; i++) {
						   //alert("term1="+terms[i].name); 
						 alert("i="+i+" term2="+terms[i].name);   
						if (terms[i]!=null) {
							alert("i="+i+" term2="+terms[i].name);
							if (terms[i].name.toLowerCase() === _name.toLowerCase()){ 								
								alert("match "+terms[i].name.toLowerCase()+" "+_name.toLowerCase());	
								return terms[i];
							}
						}
                    }
                    
                    return null;
                },
                'show': function(_term) {
                    return $("<div/>").attr("id", "glossary-term").html("<h1>"+_term.name+"</h1><p>"+_term.description+" <br/><A href='"+DATA_SERVER+"node/"+_term.tid+"'>View full definition</a></p><div class='outer-triangle'></div>");
                },
                'hide': function() {
                    //$("#glossary-term").remove();
					setTimeout(function(){
						$("#glossary-term").fadeOut('fast', function(){
							$(this).remove();
						});
					}, 2500);
                }
            }
        }();
        
        // Display glossary terms on hover
        $("span[class='glossary']").hover(
        //$("span[class='glossary']").mouseover(
            function() {
                var $this = $(this); //,
			//var term;
                   // term = glossary.find($this.text());
			
			
			if ($this.attr('id') == "" || $this.attr('id') == null) {	
			alert("match by text="+$this.text());
		    	term = glossary.find($this.text());
			}else{
			alert("ID="+$this.attr('id'));
			term = glossary.find($this.attr('id'));
			alert("return");	
			}
               	    //alert($this.text());
		    //alert($this.attr('id'));
		    alert(term.name);   
                if(term !== null) {
                    var $display = glossary.show(term).appendTo("body");
                    $display.css({
                        'top': ( $this.offset().top - ($display.outerHeight()+10) ) + "px",
                        'left': ( $this.offset().left - ($display.outerWidth()/2) ) + "px"
                    });
                }
            },
            function() {
                glossary.hide();
            }
        );

        $('#primary').corner('15px');
        $('#refresh-captcha').click(function() {
            Recaptcha.reload();
            return false;
        });
        $('#switch-to-audio-captcha').click(function() {
            Recaptcha.switch_type('audio');
            return false;
        });
        $('#switch-to-image-captcha').click(function() {
            Recaptcha.switch_type('image');
            return false;
        });
    });
})(jQuery);
