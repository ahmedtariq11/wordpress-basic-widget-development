<?php 
/*
Plugin Name: OWT WP Widget
Description: This is a sample plugin to learn custom widget development
Version: 1.0
Author: Online Web Tutor
*/

class OWT_WP_Widget extends WP_Widget{

	public function __construct(){
		// initialize widget name, id or other attributes
		parent::__construct("owt-wp-widget", "OWT WP Widget");

		add_action("widgets_init", function(){

			register_widget("OWT_WP_Widget");
		});
	}

	public function form($instance){
		// admin panel layout

		$title = !empty($instance['title']) ? $instance['title'] : "";
		$description = !empty($instance['description']) ? $instance['description'] : "";
		?>
		<p>
			<label for="<?php echo $this->get_field_id('txt_title') ?>">Widget Title</label>
			<input type="text" name="<?php echo $this->get_field_name('txt_title') ?>" id="<?php echo $this->get_field_id('txt_title') ?>" placeholder="Enter Widget Title" value="<?php echo $title; ?>" class="widefat" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('description') ?>">Description</label>
			<textarea class="widefat" id="<?php echo $this->get_field_id('description') ?>" name="<?php echo $this->get_field_name('description') ?>" placeholder="Description" ><?php echo $description; ?></textarea>
		</p>
		<?php
	}

	public function widget($args, $instance ){
		// front-end layout
		echo $args['before_title'];

		if(!empty($instance['title'])){
			echo $instance['title'];
		}

		echo $args['after_title'];

		//echo $args['before_widget'];

		echo "<h3>Sanjay Kumar</h3>";

		if(!empty($instance['description'])){
			echo $instance['description'];
		}

		echo $args['after_widget'];
	}

	public function update($new_instance, $old_instance){
		// save or update widget value to database
		$instance = array();

		$instance['title'] = isset($new_instance['txt_title']) ? strip_tags($new_instance['txt_title']) : "";

		$instance['description'] = isset($new_instance['description']) ? strip_tags($new_instance['description']) : "";

		return $instance;
	}
}

$owt_wp_widget = new OWT_WP_Widget();