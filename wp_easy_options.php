<?php

	class wp_easy_options {
		
		//Vars to store options, css
		public $options = array();
		public $css = "";

		public function wp_easy_options($custom){
			
			//run CSS build in head
			add_action( 'wp_head', array($this, 'getCSS'));
			
			//build options page
			add_action( 'customize_register', array($this, 'customizer'));
		}
		
		public function customizer($wp_customize){
			
			//Add WPEO Section
			$wp_customize->add_section( 'wpeo' , array(
				'title'      => __( 'WordPress Easy Options', 'wpeo' ),
				'priority'   => 30,
			) );
			
			foreach ($this->options as $key => $value) {
				
				//Add Setting
				$wp_customize->add_setting( $this->options[$key][1] , array(
					'default'     => $this->options[$key][2],
					'transport'   => 'refresh'
				));
				
				//Check for Color or Text
				if($this->options[$key][3] == 'color'){
					
					//Add Customizer Control
					$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $this->options[$key][1], array(
						'label'        => __( $this->options[$key][0], 'wpeo' ),
						'section'    => 'wpeo',
						'settings'   => $this->options[$key][1],
					)));
				} else if($this->options[$key][3] == 'dropdown'){
					
					//Add Customizer Control
					$wp_customize->add_control( new WP_Customize_Control( $wp_customize, $this->options[$key][1], array(
						'label'        => __( $this->options[$key][0], 'wpeo' ),
						'section'    => 'wpeo',
						'settings'   => $this->options[$key][1],
						'type'     => 'select',
						'choices'  => $this->options[$key][4],
					)));
				} else{
					
					//Add Customizer Control
					$wp_customize->add_control( new WP_Customize_Control( $wp_customize, $this->options[$key][1], array(
						'label'        => __( $this->options[$key][0], 'wpeo' ),
						'section'    => 'wpeo',
						'settings'   => $this->options[$key][1],
					)));
				}
			}
		}
		
		public function buildCSS(){
			
			//run through css and options
			foreach ($this->options as $key => $value) {
				
				$this->css = str_replace($this->options[$key][1], get_theme_mod($this->options[$key][1], $this->options[$key][2]), $this->css);
			}
		}
		
		public function getCSS(){
			
			//build the css
			$this->buildCSS();
			
			//echo the CSS
			echo '<style>';
			
			echo($this->css);
			
			echo '</style>';
		}
		
		public function setOptions($optionsArray){
			
			//set the options
			$this->options = $optionsArray;
		}
		
		public function loadCSS($cssURL){
			
			//set the options
			$this->css = file_get_contents($cssURL);
		}
	}

?>