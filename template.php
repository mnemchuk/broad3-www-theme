<?php
// $Id: template.php,v 1.17.2.1 2009/02/13 06:47:44 johnalbin Exp $

/**
 * @file
 * Contains theme override functions and preprocess functions for the theme.
 *
 * ABOUT THE TEMPLATE.PHP FILE
 *
 *   The template.php file is one of the most useful files when creating or
 *   modifying Drupal themes. You can add new regions for block content, modify
 *   or override Drupal's theme functions, intercept or make additional
 *   variables available to your theme, and create custom PHP logic. For more
 *   information, please visit the Theme Developer's Guide on Drupal.org:
 *   http://drupal.org/theme-guide
 *
 * OVERRIDING THEME FUNCTIONS
 *
 *   The Drupal theme system uses special theme functions to generate HTML
 *   output automatically. Often we wish to customize this HTML output. To do
 *   this, we have to override the theme function. You have to first find the
 *   theme function that generates the output, and then "catch" it and modify it
 *   here. The easiest way to do it is to copy the original function in its
 *   entirety and paste it here, changing the prefix from theme_ to STARTERKIT_.
 *   For example:
 *
 *     original: theme_breadcrumb()
 *     theme override: STARTERKIT_breadcrumb()
 *
 *   where STARTERKIT is the name of your sub-theme. For example, the
 *   zen_classic theme would define a zen_classic_breadcrumb() function.
 *
 *   If you would like to override any of the theme functions used in Zen core,
 *   you should first look at how Zen core implements those functions:
 *     theme_breadcrumbs()      in zen/template.php
 *     theme_menu_item_link()   in zen/template.php
 *     theme_menu_local_tasks() in zen/template.php
 *
 *   For more information, please visit the Theme Developer's Guide on
 *   Drupal.org: http://drupal.org/node/173880
 *
 * CREATE OR MODIFY VARIABLES FOR YOUR THEME
 *
 *   Each tpl.php template file has several variables which hold various pieces
 *   of content. You can modify those variables (or add new ones) before they
 *   are used in the template files by using preprocess functions.
 *
 *   This makes THEME_preprocess_HOOK() functions the most powerful functions
 *   available to themers.
 *
 *   It works by having one preprocess function for each template file or its
 *   derivatives (called template suggestions). For example:
 *     THEME_preprocess_page    alters the variables for page.tpl.php
 *     THEME_preprocess_node    alters the variables for node.tpl.php or
 *                              for node-forum.tpl.php
 *     THEME_preprocess_comment alters the variables for comment.tpl.php
 *     THEME_preprocess_block   alters the variables for block.tpl.php
 *
 *   For more information on preprocess functions and template suggestions,
 *   please visit the Theme Developer's Guide on Drupal.org:
 *   http://drupal.org/node/223440
 *   and http://drupal.org/node/190815#template-suggestions
 */


/*
 * Add any conditional stylesheets you will need for this sub-theme.
 *
 * To add stylesheets that ALWAYS need to be included, you should add them to
 * your .info file instead. Only use this section if you are including
 * stylesheets based on certain conditions.
 */
/* -- Delete this line if you want to use and modify this code
// Example: optionally add a fixed width CSS file.
if (theme_get_setting('STARTERKIT_fixed')) {
  drupal_add_css(path_to_theme() . '/layout-fixed.css', 'theme', 'all');
}
// */


/**
 * Implementation of HOOK_theme().
 */
function broad3_theme(&$existing, $type, $theme, $path) {
  $hooks = zen_theme($existing, $type, $theme, $path);
  $path = drupal_get_path('theme', 'broad3') . '/template';
  
  $hooks['broad3_node_images'] = array(
  	'path' => $path,
	'template' => 'node_images',
	'arguments' => array('node' => true, 'preset' => 'small'),
	'preprocess functions' => array('broad3_preprocess_node_images')
  );
  
  $hooks['broad3_node_images_first'] = array(
  	'path' => $path,
	'template' => 'node_images',
	'arguments' => array('node' => true, 'preset' => 'small'),
	'preprocess functions' => array('broad3_preprocess_node_images_first') 
  );

  $hooks['broad3_node_front_image'] = array(
  	'path' => $path,
	'template' => 'node_images',
	'arguments' => array('node' => true, 'preset' => 'small'),
	'preprocess functions' => array('broad3_preprocess_node_front_image') 
  );
  
  $hooks['broad3_share_this'] = array(
  	'path' => $path,
	'template' => 'share_this',
	'arguments' => array('title' => NULL, 'node_url' => NULL),
	'preprocess functions' => array('broad3_preprocess_share_this')  
  );
  
  $hooks['broad3_related_links'] = array(
  	'path' => $path,
	'template' => 'related_links',
	'arguments' => array('node' => NULL),
	'preprocess functions' => array('broad3_preprocess_related_links')  
  );
 
  return $hooks;
}
/*
function broad3_textfield(){
	die("<pre> hi there".print_r(func_get_args(), true));
}
*/
function broad3_preprocess_related_links(&$vars){
	$node = $vars['node'];	
	
	$vars['title'] = $node->field_sidebar_left_title[0]['safe'];
	$vars['links'] = $node->field_links;
	$vars['extra_info'] = $node->field_extra_info[0]['safe'];

}
function broad3_preprocess_share_this(&$vars){
	global $base_root;
	$title = $vars['title'];
	$url = $base_root.$vars['node_url'];
	
	$form = array(
		array(
			'href' => "mailto:?subject={$title}&body={$url}",
			'label' => '',
			'iconClass' => 'icon-email',
			'shareUrl'=> $url,
		),
		/*array(
			'href' => "http://www.facebook.com/sharer.php?u={$url}&amp;t={$title}",
			'label' => 'Facebook',
			'iconClass' => 'icon-facebook',
		),
		array(
			'href' => "http://delicious.com/save?url={$url}&amp;title={$title}",
			'label' => 'Delicious',
			'iconClass' => 'icon-delicious',
		),
		array(
			'href' => "http://digg.com/submit?url={$url}&amp;title={$title}",
			'label' => 'Digg',
			'iconClass' => 'icon-digg',
		),
		array(
			'href' => "http://www.stumbleupon.com/submit?url={$url}&amp;title={$title}",
			'label' => 'StumbleUpon',
			'iconClass' => 'icon-stumbleupon',
		),
		array(
		      'href' => "http://twitter.com/home?status=Currently+reading+{$url}", //should not have www, as it causes unescape problem mnemchuk
			'label' => 'Twitter',
			'iconClass' => 'icon-twitter',
			)	*/	
	);
	
	$vars['share_this_data'] = $form;
}

function broad3_preprocess_node_images_first($vars){
	$node = $vars['node'];
	$vars['images'] = array($node -> field_image[0]);
}

function broad3_preprocess_node_images($vars){
	$node = $vars['node'];
	$vars['images'] = $node -> field_image;
}

function broad3_preprocess_node_front_image($vars){
	$node = $vars['node'];
	$vars['images'] = $node -> field_front_image;
}


/////// here //////



function broad3_pager($tags = array(), $limit = 10, $element = 0,
                      $parameters = array(), $quantity = 7) {
    global $pager_page_array, $pager_total, $pager_total_items;

	if($tags == 'biblio'){//just for the biblio module
	    $page = $pager_page_array[0] + 1;
	    $first_no = $limit * $pager_page_array[0] + 1;
	    $last_no = ($limit * $page) > $pager_total_items[0] ? $pager_total_items[0] : $limit * $page;
	    $next_no = $pager_total_items[0] - ($page * $limit) > $limit ? 50 : $pager_total_items[0] - ($page * $limit);
	    $previous_no = $limit;

	    $li_text = 'Showing '.$first_no.'-'.$last_no.' of '. $pager_total_items[0].' Results';
	    $li_previous = theme('pager_previous', t('‹ previous @no',array('@no'=>$previous_no)), $limit, $element, 1, $parameters);
	    $li_next = theme('pager_next', t('next @no ›',array('@no'=>$next_no)), $limit, $element, 1, $parameters);

	 	$pager_middle = ceil($quantity / 2);
 		$pager_current = $pager_page_array[$element] + 1;
		$pager_first = $pager_current - $pager_middle + 1;
		$pager_last = $pager_current + $quantity - $pager_middle;
		$pager_max = $pager_total[$element];
	
		$i = $pager_first;
		if ($pager_last > $pager_max) {
		    $i = $i + ($pager_max - $pager_last);
		    $pager_last = $pager_max;
	    }
	    $pager_first = $i;
		if ($i <= 0) {
		    $pager_last = $pager_last + (1 - $i);
		    $i = 1;
		}
	
	    /*
	    if ($li_previous) {
		    $items[] = array(
		      'class' => 'pager-previous',
		      'data' => $li_previous,
		    );
		}
		*/
		if ($li_text) {
		    $items[] = array(
		      'class' => 'pager-text',
		      'data' => $li_text,
		    );
		}
		/*  
		if ($li_next) {
		    $items[] = array(
		      'class' => 'pager-next',
		      'data' => $li_next,
		    );
		}
		*/


		 if($pager_total[$element] > 1){
		    if($i != $pager_max){
		      for(; $i <= $pager_last && $i <= $pager_max; $i++){
		        if($i < $pager_current){
		     		 if ($pager_first > 1 && $i == $pager_first){
		  				$output = '...'.$i;
		 				$stopPreEllipsis = true;
		  			}else{
		  				$output = $i;
		  			}
		          	$items[] = array(
		            	'class' => 'pager-item',
		            	'data' => theme('pager_previous', $output, $limit, $element, ($pager_current - $i), $parameters),
		          	);
		        }
		        if($i == $pager_current){
		          $items[] = array(
		            'class' => 'pager-current',
		            'data' => $i,
		          );
		        }
		        if($i > $pager_current){
		      		if($pager_last < $pager_max && $i == $pager_last){
		  				$output = $i.'...';
		  			}else{
		  				$output = $i;
		  			}
					
		            $items[] = array(
		            	'class' => 'pager-item',
		           		'data' => theme('pager_next', $output, $limit, $element, ($i - $pager_current), $parameters),
		          	);
		        }
		      }
		    }
		 }
		return theme('item_list', $items, NULL, 'ul', array('class' => 'pager'));

	
	}else{
	    $maxPage = $pager_total[$element];
	    $currentPage = $pager_page_array[$element] + 1;
	    $firstPage = 1;
	    if($currentPage > 2){$firstPage = $currentPage - 2;}
	    $lastPage = $firstPage + 4;
	    if($lastPage > $maxPage){$lastPage = $maxPage;}
	
	    $items = array();
	
	    $liPrevious = theme('pager_previous', t('prev'), $limit, $element, 1, $parameters);
	
	    $liNext = theme('pager_next', 'next', $limit, $element, 1, $parameters);
	
	    if($pager_total[$element] > 1){
	        if($liPrevious){
	            $items[] = array(
	                'class' => 'pager-previous active',
	                'data'  => sprintf('<span class="pager-inner"><span class="arrow"></span>%s</span>', $liPrevious)
	            );
	        }else{
	            $items[] = array(
	                'class' => 'pager-previous inactive',
	                'data'  => '<span class="inactive">prev</span><span class="arrow"></span>'
	            );
	        }
	
	        for($i = $firstPage; $i <= $lastPage; $i++){
	            $class = '';
	            $data  = '';
	            if($i == $currentPage){
	                $class = 'pager-current inactive';
	                $data = '<span class="inactive">' . $i . '</span>';
	            }elseif($i > $currentPage){
	                $class = 'pager-item active';
	                $data = theme(
	                    'pager_next',
	                    $i,
	                    $limit,
	                    $element,
	                    $i - $currentPage,
	                    $parameters
	                );
	            }elseif($i < $currentPage){
	                $class = 'pager-item active';
	                $data = theme(
	                    'pager_previous',
	                    $i,
	                    $limit,
	                    $element,
	                    $currentPage - $i,
	                    $parameters
	                );
	            }
	            $items[] = array(
	                'class' => $class,
	                'data'  => sprintf('<span class="pager-inner">%s</span>', $data)
	            );
	        }
	
	        if($liNext){
	            $items[] = array(
	                'class' => 'pager-next active',
	                'data'  => sprintf('<span class="pager-inner">%s<span class="arrow"></span></span>', $liNext)
	            );
	        }else{
	            $items[] = array(
	                'class' => 'pager-next inactive',
	                'data'  => '<span class="inactive">next</span><span class="arrow"></span>'
	            );
	        }
	    }
	
	    $list = theme(
	        'item_list', $items, null, 'ul', array('class' => 'pager clear-block')
	    );
	    if($items)
	   	 return sprintf('<div class="broad-pager clear-block">%s</div>', $list);
		else
		  return '';	
	
	}


}


/**
 * Override or insert variables into all templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered (name of the .tpl.php file.)
 */
/* -- Delete this line if you want to use this function
function STARTERKIT_preprocess(&$vars, $hook) {
  $vars['sample_variable'] = t('Lorem ipsum.');
}
// */

/**
 * Override or insert variables into the page templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("page" in this case.)
 */
function broad3_preprocess_page(&$vars, $hook) {
//die("<pre>".htmlspecialchars(print_r($vars, true)));
  $primary = "menu_site-navigation";
  //$vars['top_nav_links'] = broad3_menu_navigation_links('menu-tree-nav-top-nav', 1);
  //$vars['quartiary_links'] = menu_navigation_links($primary, 3);
  if(isset($pager_page_array) && count($pager_page_array)){
	$vars['body_classes'] .= ' pagination';
  }
  if(isset($vars['node'])){
    $node = $vars['node'];

  	$vars['template_files'][] = 'page-node-'.$node->type;
	global $pager_page_array;
	//die("<pre>".print_r($node, true));
	if( (isset($node->field_links) && isset($node->field_links[0]['url'])) || (isset($node->field_extra_info) && $node->field_extra_info[0]['safe'] != '') ){
		$vars['left'] .= theme('broad3_related_links', $node);
	}
    if ($node->type == 'blog') {
        drupal_set_breadcrumb(array(
            l('Home', '<front>'),
            l('News & Publications', '<home>'),
			l('Blog', 'blog_roll'),
        ));
        $vars['breadcrumb'] = theme('breadcrumb', drupal_get_breadcrumb());
        menu_set_active_item('blog_roll');
		$vars['comments'] = $vars['comment_form'] = '';
		  if (module_exists('comment') && isset($vars['node'])) {
			$vars['comments'] = comment_render($vars['node']);
			$vars['comment_form'] = drupal_get_form('comment_form',
			array('nid' => $vars['node']->nid));
			
			$vars['content'] .= $vars['comment_form'];
			$vars['content'] .= $vars['comments'];
		  }

    }elseif ($node->type == 'biosketch') {                                                                                                                 
      drupal_set_breadcrumb(array(                                                                                                                       
				  l('Home', '<front>'),
				  l('What is Broad', 'node/1499'),
				  l('Who is Broad', 'node/1502'),
				  ));
      $vars['breadcrumb'] = theme('breadcrumb', drupal_get_breadcrumb());                                                                                
      menu_set_active_item('node/1502');   

    }elseif ($node->type == 'news') {
    	drupal_set_breadcrumb(array(
            l('Home', '<front>'),
            l('News & Publications', 'news-and-publications'),
			l('News & Multimedia', 'news')
	    ));
	    $vars['breadcrumb'] = theme('breadcrumb', drupal_get_breadcrumb());
		menu_set_active_item('news');
		// }elseif($node->type == 'bio'){
		//drupal_set_breadcrumb(array(
		//l('Home', '<front>'),
		//l('History & Leadership', 'history-and-leadership'),
		//l('Board of Directors', 'history/board-directors')
		//));
		//$vars['breadcrumb'] = theme('breadcrumb', drupal_get_breadcrumb());
		//menu_set_active_item('history/board-directors');
    }elseif($node->type == 'biblio'){
    	drupal_set_breadcrumb(array(
            l('Home', '<front>'),
            l('News & Publications', 'news-and-publications'),
	    l('Scientific Publications', 'publications-search')
	    ));
	    $vars['breadcrumb'] = theme('breadcrumb', drupal_get_breadcrumb());
	    $vars['template_files'][] = "page-publications-details";
	    menu_set_active_item('publications-search');
    
    
    } elseif(is_object($node)) {//item is not a specific page type
        $aliases = broad3_fetch_all_aliases();
        $pathSegments = explode('/', $node->path);
        array_pop($pathSegments);
        $rebuiltPath = '';
        $breadcrumb = array(
            l('Home', '<front>')
        );
		$itemCount = 0;
        foreach ($pathSegments as $segment) {
            $rebuiltPath .= $segment;
            if (isset($aliases[$rebuiltPath])) {
                $breadcrumb[] = l($aliases[$rebuiltPath], $rebuiltPath);
            }
			$itemCount++;
			/*
			if($itemCount == 2){//setup tabs for items that have three levels of nav
				menu_set_active_item('education/dnatrium');
			}
			*/
            $rebuiltPath .= '/';
        }
		//drupal_set_breadcrumb($breadcrumb);
       	//$vars['breadcrumb'] = theme('breadcrumb', drupal_get_breadcrumb());
        if (strstr($node->path, 'history-leadership/leadership/scientific-leadership/')) {
			menu_set_active_item('node/1497');
        }if (strstr($node->path, 'offices/academic-affairs')) {
			menu_set_active_item('node/3440');
        }
	if (strstr($node->path, 'scientific-community/') || strstr($node->path, 'science/')) {
			menu_set_active_item('scientific-community/science');
        }
        if (strstr($node->path, 'scientific-community/science/') || strstr($node->path, 'science/programs')) {
			menu_set_active_item('scientific-community/science');
        }
	if (strpos($node->path, 'scientific-community/software/') === 0) {
            menu_set_active_item('scientific-community/software');
        }
	if (strpos($node->path, 'high-school-educational-outreach') === 0) {
            menu_set_active_item('education/high-school-educational-outreach');
        }
	if (strpos($node->path, 'education/') === 0) {
            menu_set_active_item('node/635');
		}
	if (strstr($node->path, 'glossary/')) {
			drupal_set_breadcrumb(array(
            	l('Home', '<front>'),
            	l('Education', 'node/635'),
				l('Glossary', 'education/glossary')
	    	));
	    	$vars['breadcrumb'] = theme('breadcrumb', drupal_get_breadcrumb());
            menu_set_active_item('education/glossary');
        }
    }
	if($node->field_title_override[0]['value'] != ""){
		$vars['title'] = $node->field_title_override[0]['value'];
  	}
	$vars['archived'] = $node->field_archive[0]['value'];
        $vars['archivedmsg'] = $node->field_archivedmsg[0]['value'];
        
  } elseif ($vars['title'] == 'Search') {
    drupal_set_breadcrumb(array(
        l('Home', '<front>')
    ));
	
    $vars['breadcrumb'] = theme('breadcrumb', drupal_get_breadcrumb());
  }
  
  $googleCseBox = module_invoke('google_cse', 'block', 'view');
  $vars['google_search'] = $googleCseBox['content'];

  if($vars['is_front'] > 0 || in_array('page-scientific-community-science', $vars['template_files'])){
  	$path = path_to_theme().'/js/';
  	drupal_add_js($path.'homepage-highlight.js', 'theme');
	drupal_add_js('jQuery(function(){ new Drupal.HomepageHighlight("#spotlight span", "td .node"); });', 'inline');
	$vars['scripts'] = drupal_get_js();
  }
  if(in_array('page-scientific-community-science', $vars['template_files'])){	
	drupal_add_js('jQuery(function(){ new Drupal.JumpToSelect(".view-science-homepage select"); });', 'inline');
	$vars['scripts'] = drupal_get_js();
  }
  if(in_array('page-scientific-community-data', $vars['template_files']) || in_array('page-news', $vars['template_files']) || in_array('page-scientific-community-software', $vars['template_files']) || in_array('page-videos', $vars['template_files']) ){	
  	$path = path_to_theme().'/js/';
	drupal_add_js($path.'jquery.ui.autocomplete.js', 'theme');
	$vars['scripts'] = drupal_get_js();
  }
  if(in_array('page-publications', $vars['template_files'])){	
	drupal_set_breadcrumb(array(
    	l('Home', '<front>'),
    	l('News & Publications', 'news-and-publications')
	));
	$vars['breadcrumb'] = theme('breadcrumb', drupal_get_breadcrumb());
  }
  if(in_array('page-taxonomy', $vars['template_files'])){	
    drupal_set_breadcrumb(array(
        l('Home', '<front>'),
        l('News & Publications', '<home>'),
		l('Blog', 'blog_roll'),
    ));
    $vars['breadcrumb'] = theme('breadcrumb', drupal_get_breadcrumb());
    menu_set_active_item('blog_roll');
  }
  if(in_array('page-publications-search', $vars['template_files']) || in_array('page-publications', $vars['template_files'])){
    drupal_set_breadcrumb(array(
				l('Home', '<front>'),
				l('News & Publications', 'news-and-publications'),
				l('Scientific Publications', 'publications-search')
				));
    $vars['breadcrumb'] = theme('breadcrumb', drupal_get_breadcrumb());
    menu_set_active_item('publications-search');
  }

  if(isset($_REQUEST['ajax']) && $_REQUEST['ajax'] == 1){
        $vars['template_file'] = 'page-ajax';
  }
  

}
function broad3_find_glossary_term($term){
    $query = "SELECT n.nid, n.vid, n.title, c.field_definition_value FROM node n, content_type_glossary c WHERE n.type = 'glossary' AND (n.title = '".mysql_escape_string($term)."')  AND n.vid = c.vid";
    //$query = "SELECT n.nid, n.vid, n.title, c.field_definition_value FROM node n, content_type_glossary c, content_field_title_override cf WHERE n.type = 'glossary' AND (n.title = '".mysql_escape_string($term)."'  OR cf.field_title_override_value = '".mysql_escape_string($term)."' )  AND n.vid = c.vid AND n.nid = cf.nid";
    $result = db_query($query) or die('Error connecting to database');
    while ($row = db_fetch_array($result)) {
    	$obj = new stdClass();
		$obj->weight = "2";
		$obj->tid = $row["nid"];
		$obj->vid = $row["vid"];
		$obj->name = $row["title"];
		$obj->description = $row["field_definition_value"];
		$r[] = $obj;
    }
 	//title override
	$query = "SELECT n.nid, n.vid, cf.field_title_override_value as title, c.field_definition_value FROM node n, content_type_glossary c, content_field_title_override cf WHERE n.type = 'glossary' AND (cf.field_title_override_value = '".mysql_escape_string($term)."' )  AND n.vid = c.vid AND n.nid = cf.nid";
	$result = db_query($query) or die('Error connecting to database');
    while ($row = db_fetch_array($result)) {
    	$obj = new stdClass();
		$obj->weight = "20";
		$obj->tid = $row["nid"];
		$obj->vid = $row["vid"];
		$obj->name = $row["title"];
		$obj->description = $row["field_definition_value"];
		$r[] = $obj;
    }

    return $r;
}


function broad3_fetch_all_aliases() {
    $query = <<<SQL
SELECT
    url.dst,
    menu.link_title
FROM url_alias url
    INNER JOIN menu_links menu ON
        menu.link_path = url.src
UNION ALL
SELECT
    link_path,
    link_title
FROM menu_links
WHERE module = 'menu' AND
router_path NOT LIKE '%\%%' AND
router_path <> ''
SQL;
    $aliases = array();
    $result = db_query($query) or die('Error connecting to database');
    while ($row = db_fetch_array($result)) {
        $aliases[$row['dst']] = $row['link_title'];
    }
    return $aliases;
}



function broad3_preprocess_views_view(&$vars, $hook) {
    $view = $vars['view'];
    if (_onBlogScreen() && $view->name == 'blog_roll') {
        drupal_set_breadcrumb(array(
            l('Home', '<front>'),
            //l('What is Broad', 'node/1472'),
	    l('News & Publications', 'news-and-publications'),
        ));
    } elseif ($view->name == 'board') {
        drupal_set_breadcrumb(array(
            l('Home', '<front>'),
            l('History & Leadership', 'node/1496')
        ));
    } elseif ($view->name == 'core_members') {
        drupal_set_breadcrumb(array(
            l('Home', '<front>'),
            l('History & Leadership', 'node/1496')
        ));
		menu_set_active_item('node/1497');
    } elseif ($view->name == 'admin_leadership') {
        drupal_set_breadcrumb(array(
            l('Home', '<front>'),
            l('History & Leadership', 'node/1496')
        ));
        menu_set_active_item('node/1497');
    } elseif ($view->name == 'board_scientific_counselors') {
        drupal_set_breadcrumb(array(
            l('Home', '<front>'),
            l('History & Leadership', 'node/1496')
        ));
        //menu_set_active_item('node/1497');
	menu_set_active_item('history/board-scientific-counselors'); 
    } elseif ($view->name == 'program_platform_directors') {
        drupal_set_breadcrumb(array(
            l('Home', '<front>'),
            l('History & Leadership', 'node/1496')
        ));
        menu_set_active_item('node/1497');
   

    } elseif ($view->name == 'taxonomy_term') {
        drupal_set_breadcrumb(array(
            l('Home', '<front>'),
            //l('What is Broad', 'node/1472'),
	    l('News & Publications', 'news-and-publications'),
	    l('Blog', 'blog_roll')
        ));
    } elseif($view->name == 'news_view' || $view->name == 'press_view' || $view->name == 'news_view_keyword'){
		drupal_set_breadcrumb(array(
			l('Home', '<front>'),
            l('News & Publications', 'news-and-publications')
		));	
		if($view->name == 'press_view'){
			menu_set_active_item('news/for-journalists');
		}
	if($view->name == 'news_view_keyword'){
			menu_set_active_item('news');
		}




	} elseif ($view->name == 'diversity_queue_view') {
        drupal_set_breadcrumb(array(
			l('Home', '<front>'),
			l('Partnerships', 'node/4430'),
			l('Education', 'education')	
        ));
	} elseif ($view->name == 'education_queue_view') {
        drupal_set_breadcrumb(array(
			l('Home', '<front>'),
			l('Partnerships', 'node/4430'),
			l('Education', 'education')	
        ));
    } elseif ($view->name == 'software') {
        drupal_set_breadcrumb(array(
            l('Home', '<front>'),
            l('For the Scientific Community', 'scientific-community')
        ));
    } elseif ($view->name == 'data_view') {
        drupal_set_breadcrumb(array(
            l('Home', '<front>'),
            l('For the Scientific Community', 'scientific-community')
        ));
		menu_set_active_item('scientific-community/data');

    } elseif ($view->name == 'dogsdiseases') {
        drupal_set_breadcrumb(array(
            l('Home', '<front>'),
            l('For the Scientific Community', 'scientific-community'),
	    l('Projects','node/158'),
	    l('Mammals & Models','node/259'),
	    l('Dog','node/343')
        ));
	menu_set_active_item('node/343');


	} elseif ($view->name == 'glossary_queue_view') {
		drupal_set_breadcrumb(array(
        	l('Home', '<front>'),
        	l('Education', 'node/635')
    	));
        menu_set_active_item('education/glossary');
    }
	// add ' || $view->name == "data_autocomplete" ' to return full node information instead of a redirect to the "field_links" column (next If statement) 
	if($view->name == "news_view_ajax" || $view->name == "press_view_ajax"){
		print drupal_to_js($view->result);
		die();	
	}

	if($view->name == "videos_view_ajax"){                                                                                     
	  print drupal_to_js($view->result);                                                                                 
	  die();                                                                                                             
        }  


	if($view->name == "software_view_ajax" || $view->name == "data_autocomplete"){
		$res = $view->result;
		foreach($res as $item){
			$n = node_load($item->nid, NULL, TRUE);
			
			$result[] = array(
				"node_data_field_links_field_links_title"=>$n->title,
				"node_data_field_links_field_links_url"=>url($n->field_links[0]['url'])
				//mnemchuk does not work "node_data_field_links_field_links_url"=>rawurldecode($n->field_links[0]['url'], array('fragment'=>$n->field_links[0]['fragment']))
			);
		}
		//$vars['node_url'] = $node->field_links[0]['url'];
		$vars['node_url'] = $node->field_links[0]['display_url']; //mnemchuk fix missing name anchors
		
		print drupal_to_js($result);
		die();	
	}
	
}
// */

/* Fix for the taxonomy bug that does not allow you to specify a vocabulary */
function taxonomy_get_term_by_name_2($name, $vocabularies = null) {
    $vocabs = " AND t.vid = $vocabularies";
    $db_result = db_query("SELECT t.tid, t.* FROM term_data t WHERE LOWER(t.name) = LOWER('%s')" . $vocabs, trim($name));
    $result = array();
    while ($term = db_fetch_object($db_result)) {
        $result[] = $term;
    }
    return $result;
}

/**
 * Override or insert variables into the node templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("node" in this case.)
 */

function broad3_preprocess_node(&$vars, $hook) {
  static $science_homepage_counter = 0;
  
  $node = $vars['node'];
  
  if($vars['page'] == 0){
  	if(count($vars['template_files']) > 2){
		array_splice($vars['template_files'], 1, 0, 'node-'.$node->type.'-aggregate');
	}
	else
 		$vars['template_files'][] = 'node-'.$node->type.'-aggregate'; 
	//$vars['classes'] .= ' node-type-'. $node->type .'-aggregate';
  }
  // Full page
  elseif($vars['page'] == 1 ) {
    // Search for Glossary taxonomy before content is sent to client
    $dom = new DOMDocument();
    $dom->loadHTML($node->body);
    $xpath = new DOMXpath($dom);
    $glossary_terms = $xpath->query("//span[@class='glossary']");

    // Output this
    $glossary = array();
    $glossary_wrapper = array();
    // Add to array
    foreach($glossary_terms as $term) {
        //$temp = taxonomy_get_term_by_name_2($term->nodeValue, 8);
		$def = broad3_find_glossary_term($term->nodeValue);
		$glossary[$term->nodeValue] = $def[0];
       	array_push($glossary_wrapper, $glossary[$term->nodeValue]);
    }
    // Add to drupal settings
    drupal_add_js(array("glossary_taxonomy"=>$glossary_wrapper), "setting");
  }
  
  if($node->type == 'software'){  	
    $vars['node_url'] = $node->field_links[0]['display_url']; //mnemchuk fix missing name anchors
	//$vars['node_url'] = $node->field_links[0]['url'];
//	$tmp = node_teaser($vars['content'], NULL, 200);
//	$vars['content'] = $tmp;
  }
  else if($node->type == 'data'){
  	$vars['node_url'] = $node->field_links[0]['url'];
  }
  
 
  $author = user_load($node -> uid);
  //die("<Pre>".print_r($vars, true));
  if(isset($author->profile_first_name) && isset($author->profile_last_name))
  	$full_name = join(' ', array($author->profile_first_name, $author->profile_last_name));
  else
  	$full_name = $author -> name;
	
  $vars['full_name'] = $full_name;
  if($node -> type == 'news' && $node -> view -> name == 'home_featured_view' || $node -> view -> name == 'science_homepage'){
  	$science_homepage_map = array(
		'platforms',
		'programs',
		'resources',
		'team'
			);

	$type = $science_homepage_map[$science_homepage_counter];
	
	
	/* fix for missing FP images in cases where there is no main image */

	/*$vars['images'] = theme('broad3_node_images_first', $node, 'featured-home');
	 */

	if($node->field_front_image[0]['fid']){
	  $vars['images'] = theme('broad3_node_front_image', $node, 'featured-home');
	}else{
	  $vars['images'] = theme('broad3_node_images_first', $node, 'featured-home');
	}

	/**end of fix**/

	$contentNode = $node->field_front_page[0]['safe'];
	if($contentNode == ""){
		$contentNode = node_teaser($node->content['body']['#value'], NULL, 300);	
	}
	$vars['content'] = $contentNode;
	$vars['jump_menu'] = broad_tag_get_jump_menu($type);
	$science_homepage_counter++;
  } elseif($node -> view -> name == 'home_featured_view'){
	
	//$vars['images'] = theme('broad3_node_front_image', $node, 'featured-home');
	if($node->field_front_image){
		$vars['images'] = theme('broad3_node_front_image', $node, 'featured-home');
	}else{
		$vars['images'] = theme('broad3_node_images_first', $node, 'featured-home');	
	}
	$contentNode = $node->field_front_page[0]['safe'];
	if($contentNode == ""){
		$contentNode = node_teaser($node->content['body']['#value'], NULL, 300);	
	}
	$vars['content'] = $contentNode;
  
  } elseif($node->view->name == 'education_queue_view' || $node->view->name == 'diversity_queue_view'){
	if($node->field_image){
		$imgcounter = 0;
		foreach($node->field_image as $img){
			$node->field_image[$imgcounter]["data"]["description"] = "";
			$imgcounter++;
		}
	}
	if(is_array($node->field_front_image) && $node->field_front_image[0] != ""){
		$vars['images'] = theme('broad3_node_front_image', $node, 'diversity');
	}else{
		$vars['images'] = theme('broad3_node_images_first', $node, 'diversity');	
	}

  } elseif ($vars['page'] == 0) {
  	$vars['images'] = theme('broad3_node_images_first', $node, 'news-teaser');
  } else {
  	$vars['images'] = theme('broad3_node_images', $node, 'large');
  }
  if(empty($vars['images']))
  	unset($vars['images']);
  else
  	$vars['classes'] .= ' has-images';


  $title = rawurlencode($vars['title']);
  $url = rawurlencode($base_root . $vars['node_url']);
  $vars['share_this'] = theme('broad3_share_this', $title, $url);
  if($vars['type'] == 'section_page' && strpos($node->path, 'scientific-community/science/') === 0){
    $vars['show_share_this'] = true;
  }else{
    $vars['show_share_this'] = false;
  }
  if($node->field_share_this[0]['value'] == "1"){
  	$vars['show_share_this'] = true;
  }

  if(($node->type == "news" || $node->type == "blog") && $node->field_share_this[0]['value'] == ""){                                                  $vars['show_share_this'] = true;                                                                                                        }  

  $vars['node']->comment = 0;
  $vars['formatted_date'] = date('F jS, Y', $vars['created']);
}

function broad3_get_author_header($user_name){
	
	if($user_name != 'all'){
		$author = user_load(array('name' => $user_name)); 
		if(isset($author->profile_first_name) && isset($author->profile_last_name))
	  		$full_name = join(' ', array($author->profile_first_name, $author->profile_last_name));
	  	else
	  		$full_name = $author -> name;
	
	    $pictureName = '';
	    if ($author->picture) {
	        $pictureName = $author->picture;
	    } else {
	        $pictureName = drupal_get_path('theme', 'broad3') . '/img/gravatar_default.png';
	    }
	    $picture = theme(
	        'imagecache', 'blogger-profile-large', $pictureName, '', ''
	    );
	
		echo "<div class='blog-author-bio'><div class='inside-box'><div class='img'>".$picture."</div><div class='content-in'>";
		echo "<h2>".$full_name." <span class='title'>".$author->profile_title."</span></h2>";
		echo $author->profile_bio;
		echo "</div><div class='clear'></div></div></div>";
	}

}

function broad3_menu_item($link, $has_children, $menu = '', $in_active_trail = FALSE, $extra_class = NULL) {
  $class = ($menu ? 'expanded' : ($has_children ? 'collapsed' : 'leaf'));
  if (!empty($extra_class)) {
    $class .= ' '. $extra_class;
  }
  if ($in_active_trail) {
    $class .= ' active-trail';
  }
  return '<li class="'. $class .'">'. $link . $menu ."</li>\n";
}



// */

/**
 * Override or insert variables into the comment templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("comment" in this case.)
 */
/* -- Delete this line if you want to use this function
function STARTERKIT_preprocess_comment(&$vars, $hook) {
  $vars['sample_variable'] = t('Lorem ipsum.');
}
// */

/**
 * Override or insert variables into the block templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("block" in this case.)
 */
/* -- Delete this line if you want to use this function
function STARTERKIT_preprocess_block(&$vars, $hook) {
  $vars['sample_variable'] = t('Lorem ipsum.');
}
// */


function generateFooterNavMenu()
{
    $secondaryLinks = menu_tree_all_data('secondary-links');
    $primaryLinks = menu_tree_all_data('primary-links');
	$primaryLinks['49954 Careers 626']['below'] = false;	
    $links = array_merge($secondaryLinks, $primaryLinks);
    return menu_tree_output($links);
}

function broad3_breadcrumb($breadcrumb){
    if (!empty($breadcrumb)) {
        $breadcrumb[]  = drupal_get_title();
        $lastItem = "";
		foreach($breadcrumb as $bread){
			if($lastItem != ""){
				if(strstr($bread,"href")){
					$newCrumb[] = str_replace(":>", ":", preg_replace("/(>(.*)<\/a>)/i", ">".$lastItem.":$1", $bread));
				}else{
					$newCrumb[] = $lastItem.":".$bread;
				}
				$lastItem = "";
				continue;
			}
			if(strstr($bread,"What is Broad")){$lastItem = "What is Broad";}
			if(strstr($bread,"News & Publications") || strstr($bread,"News and Publications")|| strstr($bread,"News &amp; Publications")){$lastItem = "News & Publications";}
			if(strstr($bread,"For the Scientific Community")){$lastItem = "For the Scientific Community";}
			if($lastItem == ""){
				$newCrumb[] = $bread;	
			}
        }
		if($lastItem != ""){
			$newCrumb[] = str_replace(":>", ":", preg_replace("/(>(.*)<\/a>)/i", ">".$lastItem.":$1", $bread));
		}

		return '<div class="breadcrumb">' . implode ('<span class="separator">&gt;</span>', $newCrumb) . '</div>';
    }
}

function generateNavigationTabs(){
	/*
	$menu_name = variable_get('menu_site-navigation', 'secondary-links');
	//print menu_tree($menu_name);
	
    $links = menu_navigation_links('menu-site-navigation', 0);
	print_r($links);
	$links = menu_navigation_links('secondary-links', 1);
	print_r($links);
	//die();
	*/
	//die(print_r(menu_tree('menu-site-navigation')));
	//menu_set_active_item('category/5/10/68');
	
//    $links = broad3_menu_navigation_links('menu-site-navigation', 1);
	//print_r($links)
	//die();
	$links = menu_navigation_links('secondary-links', 1);
    if (!$links) {
    	$links = menu_navigation_links('primary-links', 1);
    }
    return theme('links', $links);
}

function broad3_comment_submitted($comment) {
    $name = '';
    if ($comment->uid) {
        $user = user_load($comment->uid);
        if ($user->profile_first_name) {
            $name = $user->profile_first_name . ' ' . $user->profile_last_name;
        } else {
            $name = $user->name;
        }
    } else {
        $name = $comment->name;
    }
    $date = date('F j, Y', $comment->timestamp);
    return sprintf('<span class="commenter">%s</span>, %s', $name, $date);
}

function broad3_preprocess_comment(&$variables) {
    global $base_root;
    $email = trim($variables['user']->mail);
    $emailHash = '';
    if ($email) {
        $emailHash = md5(strtolower($email));
    }
    $path = url(drupal_get_path('theme', 'broad3') . '/img/gravatar_default.png', array('absolute' => true));
    $grUrl = 'http://www.gravatar.com/avatar/' . $emailHash . '?d=' . rawurlencode($path);
    $variables['gravatar_url'] = $grUrl;
}

function broad3_recaptcha_custom_widget() {
    return <<<HTML
      <label for="recaptcha_response_field">Re-type the message in the box below (please note: message may consist of
										  numbers)
</label>
<input type="text" id="recaptcha_response_field" name="recaptcha_response_field" />
<div id="recaptcha_image"></div>
<a id="refresh-captcha" href="#">Refresh</a>
<a class="recaptcha_only_if_image" id="switch-to-audio-captcha" href="#">Listen</a>
<a class="recaptcha_only_if_audio" id="switch-to-image-captcha" href="#">Use Image</a>
<span class="using-recaptcha">ReCAPTCHA &copy;</span>
HTML;
}

function broad3_truncateNicely($text,  $count=30){
	$text = strip_tags($text, '<B>');
	$origTextLength = strlen($text);
	$text = $text." ";
    $text = substr($text,0,$count);
    $text = substr($text,0,strrpos($text,' '));
    if($text != "" && $text != " " && $count < $origTextLength){
		$text = $text."...";
	}
	return $text;		
}

function broad3_menu_navigation_links($menu_name, $level = 0) {
  // Don't even bother querying the menu table if no menu is specified.
	$vid = 5;  // Set the vid to the vocabulary id of the vocabulary you wish to list the terms from
	$pole = array();
	$items = array();
	$menu = menu_get_item();
	$node = $menu['page_arguments'][0]; 
	//print_r(menu_tree_page_data($menu_name, 1));


	print_r($node);
	//print_r(taxonomy_node_get_terms($node));
	//print_r($node->nid);
	//print_r(taxonomy_node_get_terms_by_vocabulary($node->nid, $vid));
	//print_r(taxonomy_get_term_by_name('node/'.$node->nid));
	//die();
	
	
	$menuT = $menu->page_arguments[0]->taxonomy;
	$terms = taxonomy_get_tree($vid, 202);
	print_r($terms);
	foreach ( $terms as $term ) {
  		//$count = db_result(db_query("SELECT COUNT(nid) FROM {term_node} WHERE tid = %d", $term->tid));
  		if($term->depth == $level){
  			print_r(drupal_get_path_alias(taxonomy_term_path($term->tid)));
			$pole[]=Array (l($term->name, "taxonomy/term/$term->tid"), $term->depth, $count, $term->tid);
		}
	}
  	$depth =-1;
  	foreach ($pole as $list) {
    	if($list[1] == $level){
		if ($list[1] > $depth) echo "\n<ul>";
    	if ($list[1] < $depth) echo "\n</li>\n</ul>\n</li>";
    	if ($list[1] == $depth) echo "</li>";
    	$poc++;
    	echo "\n<li>$list[0]";
    		
    	}
	print_r($list);
//	die();



    $depth=$list[1];
}
echo "</li>\n</ul>";
  die();
  

  if (empty($menu_name)) {
    return array();
  }



  // Get the menu hierarchy for the current page.
  $tree = menu_tree_all_data($menu_name);
  //print_r($tree);
//die();
  // Go down the active trail until the right level is reached.
  while ($level-- > 0 && $tree) {
    // Loop through the current level's items until we find one that is in trail.
    while ($item = array_shift($tree)) {
      //if ($item['link']['in_active_trail']) {
        // If the item is in the active trail, we continue in the subtree.
        $tree = empty($item['below']) ? array() : $item['below'];
        break;
      //}
    }
  }
//print_r($level);
//die();
  // Create a single level of links.
  $links = array();
  foreach ($tree as $item) {
  	print_r($item);
    if (!$item['link']['hidden']) {
      $class = '';
      $l = $item['link']['localized_options'];
       print_r(drupal_get_path_alias($item['link']['href']));
	   die();
	  $l['href'] = $item['link']['href'];
      $l['title'] = $item['link']['title'];
      if ($item['link']['in_active_trail']) {
        $class = ' active-trail';
      }
      // Keyed with the unique mlid to generate classes in theme_links().
      $links['menu-'. $item['link']['mlid'] . $class] = $l;
    }
  }
  //die();
  //print_r($links);

  return $links;
}

// Email styling for diversity forms 
 
function broad3_webform_mail_headers_3069($form_values, $node, $sid, $cid) {
  $headers = array(
		   'Content-Type'  => 'text/html; charset=UTF-8; format=flowed; delsp=yes',
		   'X-Mailer'      => 'Drupal Webform (PHP/'. phpversion() .')',
		   );
  return $headers;
}

function broad3_webform_mail_headers_2906($form_values, $node, $sid, $cid) {
  $headers = array(
		   'Content-Type'  => 'text/html; charset=UTF-8; format=flowed; delsp=yes',
		   'X-Mailer'      => 'Drupal Webform (PHP/'. phpversion() .')',
		   );
  return $headers;
}

function broad3_webform_mail_headers_4002($form_values, $node, $sid, $cid) {
  $headers = array(
		   'Content-Type'  => 'text/html; charset=UTF-8; format=flowed; delsp=yes',
		   'X-Mailer'      => 'Drupal Webform (PHP/'. phpversion() .')',
		   );
  return $headers;
}

