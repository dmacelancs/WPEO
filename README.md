# WPEO
WordPress Easy Options - easilly create WordPress theme options and automatically parse and add to CSS.

Basically, do this: 
```
//INCLUDE AND INIT
include 'WPEO/wp_easy_options.php';
$options = new wp_easy_options();

//SET OPTIONS
$options->setOptions(
	array(
		array('Global Font Name', 'global_font', 'Open Sans', 'text'),
		array('Global Text Colour', 'global_text', '#3b464e', 'color'),
		array('Global Link Colour', 'global_link', '#1b5633', 'color'),
		
		array('Header BG', 'header_bg', '#269e9f', 'color'),
		array('Header FG', 'header_fg', '#ffffff', 'color'),
		
		array('Widget Title BG', 'wt_bg', '#269e9f', 'color'),
		array('Widget Title FG', 'wt_fg', '#ffffff', 'color'),
		

		array('Navbar BG', 'navbar_bg', '#000000', 'color'),
		array('Navbar FG', 'navbar_fg', '#fff', 'color'),
		array('Navbar Active FG', 'navbar_active_fg', '#6ca01b', 'color'),
		array('Navbar Hover BG', 'navbar_hover_bg', '#6ca01b', 'color'),
		array('Navbar Hover FG', 'navbar_hover_fg', '#ffffff', 'color'),
		array('Navbar Text Style', 'navbar_text_style', 'none', 'dropdown', array('Uppercase' => 'Uppercase', 'None' => 'None')),
		array('Navbar Font Weight', 'navbar_font_weight', 'normal', 'dropdown', array('normal' => 'Normal', 'bold' => 'Bold')),
		
		array('Footer BG', 'footer_bg', '#000000', 'color'),
		array('Footer FG', 'footer_fg', '#ffffff', 'color'),
		array('Footer Link FG', 'footer_a', '#269e9f', 'color'),
		
		array('Button BG', 'button_bg', '#269e9f', 'color'),
		array('Button FG', 'button_fg', '#fff', 'color'),
	)
);

//LOAD CSS
$options->loadCSS(get_bloginfo('stylesheet_url'));
```