<?php

return array(
	'portfolio' => array(
		'name' => 'Portfolio',
		'term' => 'Portfolio',
		'term_plural' => 'Items in portfolio',
		'order' => 'DESC',
		'has_single' => true,
		'post_options' => array('supports'=> array( 'title', 'editor' , 'comments'), 'taxonomies' => array('post_tag'),'has_archive'=>true),
		'taxonomy_options' => array('show_ui' => true),
		'options' => array(
			'cover_image' => array(
				'type' => 'image',
				'description' => 'Portfolio item cover/thumbnail (shown in the portfolio grids). If you use portfolio with columns you can upload smaller resolution images for the grid for a better website optimization',
				'title' => 'Cover',
				'default' => 'holder.js/240x240/auto'
			),
			'full_image' => array(
				'type' => 'image',
				'description' => 'Portfolio item full size image ( as big as you need - shown at zooming in )',
				'title' => 'Full Size',
				'default' => 'holder.js/940x799/auto'
			),
			'image_slider' => array(
				'type' => 'image',
				'description' => 'Select Related Images for this project',
				'title' => 'Project Image Slider (shown on the Single Project Page)',
				'default' => 'holder.js/455x531/auto',
				'multiple' => true
			),
			'size'=>array(
				'type'=>'radio',
				'description' => 'Select box size (1x or 2x) used in the mosaic portfolio grid',
				'title' => 'Box Size',
				'label' => array('1'=>'1x', '2'=>'2x'),
				'default' => '1'
			),
			'link'	=>	array(
				'title' => 'Link to',
	            'description' => 'Insert the URL of the page to which the grid item should be linked. Default is the single portfolio page.',
	            'type' => 'line',
	            'default' => ''
			),
		),
		'icon' => 'icons/favicon.ico',
		'output' => array(
			'main' => array(
				'shortcode' => 'tesla_portfolio',
				'view' => 'views/portfolio_view',
				'shortcode_defaults' => array(
					'title' => ''
				)
			),
			'single' => array(
				'view' => 'views/portfolio_single_view',
				'shortcode_defaults' => array(

				)
			),
			'latest' => array(
				'shortcode' => 'tesla_portfolio_latest',
				'view' => 'views/portfolio_view',
				'shortcode_defaults' => array(
					'no_filters'	=> '',
					'nr' => '',
					'class'=>'',
					'title' => ''
				)
			)
		)
	),
	'gallery' => array(
		'name' => 'Gallery',
		'term' => 'Gallery',
		'term_plural' => 'Items in gallery',
		'order' => 'ASC',
		'has_single' => false,
		'post_options' => array('supports'=> array( 'title')),
		'taxonomy_options' => array('show_ui' => true),
		'options' => array(
			'cover_image' => array(
				'type' => 'image',
				'description' => 'Gallery item cover (thumbnail)',
				'title' => 'Cover',
				'default' => 'holder.js/240x240/auto'
			),
			'full_image' => array(
				'type' => 'image',
				'description' => 'Gallery item full size ( as big as you need - shown at zooming in )',
				'title' => 'Full Size',
				'default' => 'holder.js/240x240/auto'
			),
			'link'	=>	array(
				'title' => 'Link to',
	            'description' => 'Insert the URL of the page to which the grid item should be linked.',
	            'type' => 'line',
	            'default' => '#'
			),
		),
		'icon' => 'icons/favicon.ico',
		'output' => array(
			'main' => array(
				'shortcode' => 'tesla_gallery',
				'view' => 'views/gallery_view',
				'shortcode_defaults' => array(
					'columns' => 4,
					'title' => '',
					'class'=>''
				)
			),
			'latest' => array(
				'shortcode' => 'tesla_gallery_latest',
				'view' => 'views/gallery_latest_view',
				'shortcode_defaults' => array(
					'columns' => 6,
					'class'=>'',
					'nr' => 15
				)
			)
		)
	),
	'services' => array(
		'name' => 'Services',
		'term' => 'service',
		'term_plural' => 'services',
		'order' => 'ASC',
		'has_single' => true,
		'post_options' => array('supports'=>array('title','editor')),
		'taxonomy_options' => array('show_ui'=>true),
		'options' => array(
			'icon'=>array(
				'title'=> 'Set Service Icon',
				'type'=>array(
					'def_icon' => array(
						'title' => 'Vector Icon',
			            'description' => 'Choose from one of the hundreds of vector icons and then apply a color for better performance on all devices.',
			            'type' => array(
							'icon_nr'	=>	array(
								'title' => 'Icon',
					            'description' => 'The nr of the vector icon. You can see all the numbers by hovering on icons on this page <a href="http://teslathemes.com/demo/wp/zeon/?p=498">Icons Set</a>.',
					            'type' => 'line',
					            'default' => '374'
							),
							'icon_color' => array(
								'type' => 'color',
								'description' => 'Choose icon color',
								'title' => 'Icon Color',
								'default' => '#191919'
							),
							'bg_color' => array(
								'type' => 'color',
								'description' => 'Choose icon\'s background color',
								'title' => 'Icon Background Color',
								'default' => ''
							)
						),
						'group' => true,
					),
					'custom_icon' => array(
						'title' => 'Custom Icon',
						'description' => 'Upload your own icon here.',
						'type' => 'image',
						'default' => 'holder.js/140x140/auto'
					)
				),
				'group'=>false
			),
			'title_color'	=> array(
				'type' => 'color',
				'description' => 'Choose service title color',
				'title' => 'Title Color',
				'default' => ''
			)
		),
		'icon' => 'icons/favicon.ico',
		'output_default' => 'main',
		'output' => array(
			'main' => array(
				'shortcode' => 'tesla_services',
				'view' => 'views/services-view',
				'shortcode_defaults' => array(
					'title' => 'SERVICES',
					'nr' => 0,
					'class'=>''
				)
			),
			'second'=>array(
				'shortcode' => 'tesla_services_2',
				'view' => 'views/services-2-view',
				'shortcode_defaults' => array(
					'title' => 'SERVICES',
					'nr' => 0,
					'class'=>''
				)
			)
		)
	),
	'testimonials' => array(
		'name' => 'Testimonials',
		'term' => 'testimonial',
		'term_plural' => 'testimonials',
		'order' => 'ASC',
		'has_single' => false,
		'post_options' => array('supports'=>array('title','editor','thumbnail')),
		'taxonomy_options' => array('show_ui'=>false),
		'options' => array(
			'stars'=>array(
				'type'=>'radio',
				'description' => 'Select rating for the testimonial (represented as stars)',
				'title' => 'Rate',
				'label' => array('1'=>'1', '2'=>'2', '3'=>'3','4'=>'4','5'=>'5'),
				'default' => '5'
				)
			),
		'icon' => 'icons/favicon.ico',
		'output_default' => 'main',
		'output' => array(
			'main' => array(
				'shortcode' => 'tesla_testimonials',
				'view' => 'views/testimonials-view',
				'shortcode_defaults' => array(
					'title' => 'Testimonials',
					'class'=>'',
				)
			)
		)
	),
	'clients' => array(
		'name' => 'Clients Slider',
		'term' => 'client',
		'term_plural' => 'clients',
		'order' => 'ASC',
		'has_single' => false,
		'post_options' => array('supports'=>array('title','thumbnail')),
		'taxonomy_options' => array('show_ui'=>false),
		'options' => array(
			'link' => array(
					'title' => 'Link to',
		            'description' => 'Insert the link to where should clicking on the image lead.',
		            'type' => 'line',
		            'default' => '#'
				)
			),
		'icon' => 'icons/favicon.ico',
		'output_default' => 'main',
		'output' => array(
			'main' => array(
				'shortcode' => 'tesla_clients_slider',
				'view' => 'views/clients-slider-view',
				'shortcode_defaults' => array(
					'title' => 'Our Brands',
					'class'=>'',
				)
			)
		)
	),
	'toggle' => array(
		'name' => 'Toggle List',
		'term' => 'Toggle list item',
		'term_plural' => 'Toggle list items',
		'order' => 'ASC',
		'has_single' => false,
		'post_options' => array('supports'=>array('title','editor')),
		'taxonomy_options' => array('show_ui'=>true),
		'options' => array(),
		'icon' => 'icons/favicon.ico',
		'output_default' => 'main',
		'output' => array(
			'main' => array(
				'shortcode' => 'tesla_toggle_list',
				'view' => 'views/toggle-list-view',
				'shortcode_defaults' => array(
					'title' => 'Why Choose Us',
					'class'=>'',
				)
			)
		)
	),
	'tabs' => array(
		'name' => 'Tabs',
		'term' => 'Tab',
		'term_plural' => 'Tabs',
		'order' => 'ASC',
		'has_single' => false,
		'post_options' => array('supports'=>array('title','editor')),
		'taxonomy_options' => array('show_ui'=>true),
		'options' => array(),
		'icon' => 'icons/favicon.ico',
		'output_default' => 'main',
		'output' => array(
			'main' => array(
				'shortcode' => 'tesla_tabs',
				'view' => 'views/tabs-view',
				'shortcode_defaults' => array(
					'class'=>'',
				)
			)
		)
	),
	'team' => array(
		'name' => 'Team',
		'term' => 'team member',
		'term_plural' => 'team members',
		'order' => 'ASC',
		'has_single' => false,
		'post_options' => array('supports'=>array('title','editor','thumbnail')),
		'taxonomy_options' => array('show_ui'=>true),
		'options' => array(
			'position' => array(
				'title' => 'Position',
				'description' => 'Enter the position of this team member.',
				'type' => 'line'
			),
			'social' => array(
				'title' => 'Social Icons',
				'description' => 'Add social icons for current team member.',
				'type' => array(
					'facebook' => array(
						'title' => 'Facebook',
						'description' => 'Set the full URL to the Facebook page.',
						'type' => 'line'
					),
					'twitter' => array(
						'title' => 'Twitter',
						'description' => 'Set the full URL to the Twitter page.',
						'type' => 'line'
					),
					'google' => array(
						'title' => 'Google+',
						'description' => 'Set the full URL to the Google+ page.',
						'type' => 'line'
					),
					'linkedin' => array(
						'title' => 'Linkedin',
						'description' => 'Set the full URL to the Linkedin page.',
						'type' => 'line'
					),
					'vimeo' => array(
						'title' => 'Vimeo',
						'description' => 'Set the full URL to the Vimeo page.',
						'type' => 'line'
					),
					'pinterest' => array(
						'title' => 'Pinterest',
						'description' => 'Set the full URL to the Pinterest page.',
						'type' => 'line'
					),
					'custom' => array(
						'title' => 'Custom icon',
						'description' => 'Set up an icon for a custom social platform.',
						'type' => array(
							'icon' => array(
								'title' => 'Icon',
								'description' => 'Set the icon for the social platform.',
								'type' => 'image',
								'default' => 'holder.js/20x20/auto/#fff:#000'
							),
							'url' => array(
								'title' => 'URL',
								'description' => 'Set the full URL to the custom social platform.',
								'type' => 'line'
							)
						)
					)
				),
				'group' => false,
				'multiple' => true
			)
		),
		'icon' => 'icons/favicon.ico',
		'output_default' => 'main',
		'output' => array(
			'main' => array(
				'shortcode' => 'tesla_team',
				'view' => 'views/team-view',
				'shortcode_defaults' => array(
					'title' => 'our team',
					'description' => '',
					'class'=>'',
				)
			),
			'second' => array(
				'shortcode' => 'tesla_team_2',
				'view' => 'views/team-view-2',
				'shortcode_defaults' => array(
					'title' => 'our team',
					'description' => '',
					'class'=>'',
				)
			),
			'third' => array(
				'shortcode' => 'tesla_team_3',
				'view' => 'views/team-view-3',
				'shortcode_defaults' => array(
					'title' => 'our team',
					'description' => '',
					'class'=>'',
				)
			)
		)
	),
	'pricing_tables' => array(
		'name' => 'Pricing Tables',
		'term' => 'Pricing table',
		'term_plural' => 'Pricing tables',
		'order' => 'ASC',
		'has_single' => false,
		'options' => array(
			'price' => array(
				'title' => 'Price',
				'description' => 'Set the price for current table.',
				'type' => 'line'
			),
			'link' => array(
				'title' => 'Link',
				'description' => 'Set the full URL for the buy button.',
				'type' => 'line'
			),
			'link_text' => array(
				'title' => 'Link Text',
				'description' => 'Text of the button.',
				'type' => 'line'
			),
			'outlined' => array(
				'title' => 'Outline',
				'type' => 'checkbox',
				'label' => array('outlined'=>'Outline this table (make it stand out)')
			),
			'features' => array(
				'title' => 'Options',
				'description' => 'Add options for current table.',
				'type' => 'line',
				'multiple' => true
			)
		),
		'icon' => 'icons/favicon.ico',
		'output_default' => 'main',
		'output' => array(
			'main' => array(
				'shortcode' => 'tesla_pricing_tables',
				'view' => 'views/price-view',
				'shortcode_defaults' => array(
					'size' => 4
				)
			)
		)
	),
	'skills' => array(
		'name' => 'Skills',
		'term' => 'skill',
		'term_plural' => 'skills',
		'order' => 'ASC',
		'has_single' => false,
		'post_options' => array('supports'=>array('title','editor')),
		'options' => array(
				'color' => array(
					'title' => 'Skill Color',
					'description' => 'Pick a color for the skill circle.',
					'type' => 'color',
					'default' => '#35a1f2'
				),
				'skill_level' => array(
					'title' => 'Skill Level',
		            'description' => 'The percentage of this skill. Insert a number.',
		            'type' => 'line',
		            'default' => '50'
				),
			),
		'icon' => 'icons/favicon.ico',
		'output_default' => 'main',
		'output' => array(
			'main' => array(
				'shortcode' => 'tesla_skills',
				'view' => 'views/skills-view',
				'shortcode_defaults' => array(
					'title' => 'Why we are good',
					'subtitle' => '',
					'class'=>'',
				)
			),
			'second' => array(
				'shortcode' => 'tesla_skills_2',
				'view' => 'views/skills-view-2',
				'shortcode_defaults' => array(
					'title' => 'our skills',
					'subtitle' => '',
					'class'=>'',
				)
			),
			'third' => array(
				'shortcode' => 'tesla_skills_3',
				'view' => 'views/skills-view-3',
				'shortcode_defaults' => array(
					'title' => 'our skills',
					'subtitle' => '',
					'class'=>'',
				)
			),
		)
	),
	'events' => array(
		'name' => 'Events',
		'term' => 'events',
		'term_plural' => 'Events',
		'order' => 'DESC',
		'orderby' => 'DATE',
		'has_single' => true,
		'post_options' => array('supports'=> array( 'title', 'editor' , 'comments'), 'taxonomies' => array('post_tag'),'has_archive'=>true),
		'taxonomy_options' => array('show_ui' => true),
		'options' => array(
			'cover_image' => array(
				'type' => 'image',
				'description' => 'Event cover/thumbnail (shown in the events grid).',
				'title' => 'Cover',
				'default' => 'holder.js/136x204/auto'
			),
			'full_image' => array(
				'type' => 'image',
				'description' => 'Event full size image ( as big as you need - shown on single page )',
				'title' => 'Full Size',
				'default' => 'holder.js/940x799/auto'
			),
			'small_description'	=>	array(
				'title' => 'Small Description',
	            'description' => 'Write a small description (excerpt) about the event that will appear in the events grid.',
	            'type' => 'line',
	            'default' => ''
			),
			'link'	=>	array(
				'title' => 'Link to',
	            'description' => 'Insert the URL of the page to which the event should be linked. Default is the single event page.',
	            'type' => 'line',
	            'default' => ''
			),
		),
		'icon' => 'icons/favicon.ico',
		'output' => array(
			'main' => array(
				'shortcode' => 'tesla_events',
				'view' => 'views/events_view',
				'shortcode_defaults' => array(
					'class'=>'',
				)
			),
			'single' => array(
				'view' => 'views/events_single_view',
				'shortcode_defaults' => array(

				)
			),
			'masonry' => array(
				'view' => 'views/events-masonry-view',
				'shortcode_defaults' => array(
					'class'=>'',
				)
			)
		)
	),

);