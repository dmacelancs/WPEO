# WPEO
WordPress Easy Options - easilly create WordPress theme options and automatically parse and add to CSS.

Theme functions.php File:
```
//INCLUDE CLASS
include 'WPEO/wp_easy_options.php';

//OPTIONS ARRAY 
$optionsArray = array(
	array('Global Font Name', 'global_font', 'Open Sans', 'text'),
	array('Global Text Colour', 'global_text', '#3b464e', 'color'),
	array('Link Font Weight', 'link_font_weight', 'bold', 'dropdown', array('normal' => 'Normal', 'bold' => 'Bold')),
);

//SETUP OPTIONS
$options = new wp_easy_options($optionsArray, get_bloginfo('stylesheet_url'));
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

*Note:* Don't include your stylesheet when using WPEO, there's a hook in the class that does it automatically!