<?php
	
	global $post;
		
	// get options
	$location = $this->get_acf_location($post->ID);
	
	// create temp field from creating inputs
	$temp_field = new stdClass();
?>

<a class="help" href="javascript:;"></a>

<div class="help_box_mask">
<div class="help_box">
	<h4>Enter values in the fields below to add this ACF to an edit screen</h4>
	<ul>
		<li>The values you enter bellow will be used to match against edit screens.</li>
		<li>If any of the values match the edit screen, this ACF will be used </li>
		<li>Blank fields will be ignored</li>
		<li>Use the override to remove all previous ACF's form an edit screen. This is useful for creating an ACF for all normal pages, and then creating a custom ACF for a home page (page title = 'Home'). Please note that the home page ACF needs a higher page order to remove ACF's before it.</li>
	</ul>
</div>
</div>

<input type="hidden" name="location_meta_box" value="true" />
<input type="hidden" name="ei_noncename" id="ei_noncename" value="<?php echo wp_create_nonce('ei-n'); ?>" />

<table class="acf_input" id="acf_location">
	<tr>
		<td class="label">
			<label for="post_type">Post Type's</label>
		</td>
		<td>
			<?php 
			
			$post_types = array();
			
			foreach (get_post_types() as $post_type ) {
			  $post_types[$post_type] = $post_type;
			}
			
			unset($post_types['attachment']);
			unset($post_types['nav_menu_item']);
			unset($post_types['revision']);
			unset($post_types['acf']);
			
			
			$temp_field->type = 'select';
			$temp_field->input_name = 'acf[location][post_types]';
			$temp_field->input_class = '';
			$temp_field->input_id = 'post_types';
			$temp_field->value = $location->post_types;
			$temp_field->options = array(
				'choices' => $post_types, 
				'multiple' => '1'
			);
			
			$this->create_field($temp_field); 
			
			?>
			<p class="description">Selecting a post type here will add this ACF to all edit screens of that post type.<br />(if your custom post type does not appear, make sure it is publicly query-able)<br /><br />
			Tip: Unselect post types and use the options below to customise your ACF location!<br />
			(command+click)</p>
		</td>
	</tr>
	<tr>
		<td class="label">
			<label for="page_title">Page Title's</label>
		</td>
		<td>
			<?php 
			
			$temp_field->type = 'text';
			$temp_field->input_name = 'acf[location][page_titles]';
			$temp_field->input_class = '';
			$temp_field->input_id = 'page_titles';
			$temp_field->value = implode(', ',$location->page_titles);
			$temp_field->options = array();			
			
			$this->create_field($temp_field); 
			
			?>
			<p class="description">eg. Home, About Us</p>
		</td>
	</tr>
	<tr>
		<td class="label">
			<label for="page_slug">Page Slug's</label>
		</td>
		<td>
			<?php 
			
			$temp_field->type = 'text';
			$temp_field->input_name = 'acf[location][page_slugs]';
			$temp_field->input_class = '';
			$temp_field->input_id = 'page_slugs';
			$temp_field->value = implode(', ',$location->page_slugs);
			$temp_field->options = array();			
			
			$this->create_field($temp_field); 
			
			?>
			<p class="description">eg. home, about-us</p>
		</td>
	</tr>
	<tr>
		<td class="label">
			<label for="post_id">Post ID's</label>
		</td>
		<td>
			<?php 
			
			$temp_field->type = 'text';
			$temp_field->input_name = 'acf[location][post_ids]';
			$temp_field->input_class = '';
			$temp_field->input_id = 'post_ids';
			$temp_field->value = implode(', ',$location->post_ids);
			$temp_field->options = array();			
			
			$this->create_field($temp_field); 
			
			?>
			<p class="description">eg. 1, 2, 3</p>
		</td>
	</tr>
	<tr>
		<td class="label">
			<label for="template_name">Page Template's</label>
		</td>
		<td>
			<?php 
			
			$temp_field->type = 'text';
			$temp_field->input_name = 'acf[location][page_templates]';
			$temp_field->input_class = '';
			$temp_field->input_id = 'page_templates';
			$temp_field->value = implode(', ',$location->page_templates);
			$temp_field->options = array();			
			
			$this->create_field($temp_field); 
			
			?>
			<p class="description">eg. home_page.php</p>
		</td>
	</tr>
	<tr>
		<td class="label">
			<label for="page_parent">Page Parent ID's</label>
		</td>
		<td>
			<?php 
			
			$temp_field->type = 'text';
			$temp_field->input_name = 'acf[location][page_parents]';
			$temp_field->input_class = '';
			$temp_field->input_id = 'page_parents';
			$temp_field->value = implode(', ',$location->page_parents);
			$temp_field->options = array();			
			
			$this->create_field($temp_field); 
			
			?>
			<p class="description">eg. 1, 2, 3</p>
		</td>
	</tr>
	<tr>
		<td class="label">
			<label for="page_parent">Overrides</label>
		</td>
		<td>
			<?php 
			
			$temp_field->type = 'true_false';
			$temp_field->input_name = 'acf[location][ignore_other_acfs]';
			$temp_field->input_class = '';
			$temp_field->input_id = 'ignore_other_acfs';
			$temp_field->value = $location->ignore_other_acfs;
			$temp_field->options = array(
				'message' => 'Ignore all other Advanced Custom Field\'s'
			);
			
			$this->create_field($temp_field); 
			
			?>
			<p class="description">Tick this box to remove all other ACF's <br />(from the edit screen where this ACF appears)</p>
		</td>
	</tr>
</table>