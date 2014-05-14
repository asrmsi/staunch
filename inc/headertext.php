<?php
/**
 * Globals 
 */
register_activation_hook(__FILE__, 'CurrentStatus_Init');
add_action('admin_menu', 'CurrentStatus_Admin');

/**
 * initial setup, this function will run on the activation of the plugin
 *
 * @return TRUE
 */
function CurrentStatus_Init() {
	add_option('CurrentStatus_Structure', 'Enter your special crap here.');
	return TRUE;
}


/**
 * admin settings
 *
 */
function CurrentStatus_Admin() {
  add_options_page('Header Site-Wide Text', 'Header Text', 8, __FILE__, 'CurrentStatus_Options');
}

/**
 * admin panel options
 *
 */
function CurrentStatus_Options() {

	
	if($_POST['update'] == 'TRUE' ) {
        update_option('CurrentStatus_Structure', $_POST['CurrentStatus_Structure']);
		
?>
		<div class="updated">
		 <p><strong>Updated!</strong></p>
		</div>
<?php
	}
?>
	<div class="wrap">
		<p>Enter the information you want to appear in the header alongside the cart totals here (html, etc is fine):</p>
	 <form name="form1" method="post" action="<?php _e(str_replace('%7E', '~', $_SERVER['REQUEST_URI'])); ?>">
	  <input type="hidden" name="update" value="TRUE">
	   <table>
		
		<tr><td>
		 <p><textarea name="CurrentStatus_Structure" rows="10" cols="40"><?php _e(str_replace('\\', '' , get_option('CurrentStatus_Structure'))) ?></textarea></p>
		</td></tr>

		<tr><td>
		 <p class="submit">
		  <input type="submit" name="Submit" value="Update" />
		 </p>
		</td></tr>
	   </table>
	  </form>
	 </div>
<?php
}

/**
 * admin panel options
 *
 * @return status text
 */
function CurrentStatus_GetStatus() {
	return get_option('CurrentStatus_Status');
}


/**
 * admin panel options
 *
 * @return formatted status and mood
 */
function CurrentStatus_GetCurrentStatus() {
	$structure = get_option('CurrentStatus_Structure');

	return str_replace($replace, $with, $structure);
}

?>