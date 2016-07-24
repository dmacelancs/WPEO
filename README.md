# WPEO
WordPress Easy Options - easilly create WordPress theme options and automatically parse and add to CSS.

Theme functions.php File:
```
//INCLUDE AND INIT
include 'WPEO/wp_easy_options.php';
$options = new wp_easy_options();

//SET OPTIONS
$options->setOptions(
	array(
		array('Global Font Name', 'global_font', 'Open Sans', 'text'),
		array('Global Text Colour', 'global_text', '#3b464e', 'color'),
		array('Link Font Weight', 'link_font_weight', 'bold', 'dropdown', array('normal' => 'Normal', 'bold' => 'Bold')),
	)
);

//LOAD CSS
$options->loadCSS(get_bloginfo('stylesheet_url'));
```

Theme CSS File:

```
body{
	
	font-family: global_font;
	color: global_text;
}

a{
	
	font-weight: link_font_weight;
}
```