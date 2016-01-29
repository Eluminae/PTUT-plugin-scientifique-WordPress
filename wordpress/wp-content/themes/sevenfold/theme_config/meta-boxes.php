<?php 
return array(
		'metaboxes'=>array(
			array(
			    'id'             => 'sidebar_',            // meta box id, unique per meta box
			    'title'          => 'Page Settings',   // meta box title
			    'post_type'      => array('page'),		// post types, accept custom post types as well, default is array('post'); optional
			    'taxonomy'       => array(),    // taxonomy name, accept categories, post_tag and custom taxonomies
			    'context'		 => 'normal',						// where the meta box appear: normal (default), advanced, side; optional
			    'priority'		 => 'low',						// order of meta box: high (default), low; optional
			    'input_fields'   => array(            			// list of meta fields 
			    	'sidebar_position'=>array(
			    		'name'=>'Sidebar Position',
			    		'type'=>'select',
			    		'values'=>array(
			    				'full_width'=>'No Sidebar/Full Width',
			    				'right'=>'Right',
			    				'left'=>'Left',
			    			),
			    		'std'=>'right'  //default value selected
		    		),
		    		'portfolio_columns' => array(
		    			'name'=>'Portfolio/Gallery Columns',
			    		'type'=>'select',
			    		'values'=>array(
			    				'1'=>'Full Width/1 Column',
			    				'2'=>'Two Columns',
			    				'3'=>'Three Columns',
			    				'4'=>'Four Columns'
			    			),
	    			),
		    		'show_breadcrumbs'=>array(
			    		'name'=>'Don\'t show title/breadcrumbs',
			    		'type'=>'checkbox'
		    		),
		    		'page_share'=>array(
			    		'name'=>'Show social sharing icons',
			    		'type'=>'checkbox'
		    		),
		    	),
			
			),
			array(
			    'id'             => 'video_featured',          // meta box id, unique per meta box
			    'title'          => 'Featured Video Embed',         // meta box title
			    'post_type'      => array('post'),
			    'priority'		 => 'low',
			    'context'		=> 'side',
			    'input_fields'   => array(            // list of meta fields (can be added by field arrays)
			    	'video_embed'=>array(
			    		'name'=>"Insert your embed code",
			    		'type'=>"textarea",
			    		)
			    	)
				),
		)
	);