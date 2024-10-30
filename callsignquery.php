<?php
/**
 * Plugin Name: Call Sign Query Widget
 * Plugin URI: http://www.mbse.eu/
 * Description: A simple Widget to query call sign information.
 * Version: 0.4
 * Date: 2014-02-13
 * Author: Michiel Broek
 * Author URI: http://www.mbse.eu
 * License: GPL2
 * Copyright: 2012-2014 by Michiel Broek
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 */

/**
 * Add function to widgets_init that'll load our widget.
 */
add_action( 'widgets_init', 'callsignquery_load_widgets' );

/**
 * Register our widget.
 * 'CallSignQuery_Widget' is the widget class used below.
 */
function callsignquery_load_widgets() {
    register_widget( 'CallSignQuery_Widget' );
}

/**
 * Call Sign Query Widget class.
 * This class handles everything that needs to be handled with the widget:
 * the settings, form, display, and update.  Nice!
 */
class CallSignQuery_Widget extends WP_Widget {

    /**
     * Widget setup.
     */
    function CallSignQuery_Widget() {
	/* Widget settings. */
	$widget_ops = array( 'classname' => 'callsignquery', 
	    'description' => __('A widget that asks the call sign and retrieves information about it from a remote site.', 
	    'callsignquery') );

	/* Widget control settings. */
	$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'callsignquery-widget' );

	/* Create the widget. */
	$this->WP_Widget( 'callsignquery-widget', __('Call Sign Query', 'callsignquery'), $widget_ops, $control_ops );
    }

    /**
     * How to display the widget on the screen.
     */
    function widget( $args, $instance ) {
	extract( $args );

	/* Our variables from the widget settings. */
	$dsc_title  = apply_filters('widget_title', $instance['dsc_title'] );
	$dsc_button = $instance['dsc_button'];
	$dsc_help   = $instance['dsc_help'];
	$dsc_url    = $instance['dsc_url'];
	$dsc_parm   = $instance['dsc_parm'];
		
	/* Before widget (defined by themes). */
	echo $before_widget;

	/* Display the widget title if one was input (before and after defined by themes). */
	if ( $dsc_title )
	    echo $before_title . $dsc_title . $after_title;

	/* Display search control from widget settings if button text is defined. */ ?>
<script type="text/javascript">
<!--
function callsignpop(myform, windowname) {
    if (! window.focus)
	return true;
    window.open('', windowname, 'height=800,width=1000,scrollbars=yes');
    myform.target=windowname;
    return true;
}
-->
</script>
<form method="get" action="<?php echo "$dsc_url" ?>" onsubmit="callsignpop(this, 'Call Sign Query');" >
 <p>
  <input type="text" name="<?php echo "$dsc_parm" ?>" size="8" title="<?php echo "$dsc_help" ?>" value="" />
  <input type="submit" value="<?php echo "$dsc_button" ?>" />
 </p>
</form>
<?php
	/* After widget (defined by themes). */
	echo $after_widget;
    }

    /**
     * Update the widget settings.
     */
    function update( $new_instance, $old_instance ) {
	$instance = $old_instance;

	/* Strip tags for title and name to remove HTML (important for text inputs). */
	$instance['dsc_title']  = strip_tags( $new_instance['dsc_title'] );
	$instance['dsc_button'] = strip_tags( $new_instance['dsc_button'] );
	$instance['dsc_help']   = strip_tags( $new_instance['dsc_help'] );
	$instance['dsc_url']    = strip_tags( $new_instance['dsc_url'] );
	$instance['dsc_parm']   = strip_tags( $new_instance['dsc_parm'] );

	return $instance;
    }

    /**
     * Displays the widget settings controls on the widget panel.
     * Make use of the get_field_id() and get_field_name() function
     * when creating form elements. This handles the confusing stuff.
     */
    function form( $instance ) {

	/* Set up some default widget settings. */
	$defaults = array( 'dsc_title' => __('Call Sign Query', 'callsignquery'), 
	                   'dsc_button' => __('Search', 'callsignquery'), 
			   'dsc_help' => __('Enter your Call Sign', 'callsignquery'),
			   'dsc_url' => __('http://www.qrz.com/db/', 'callsignquery'),
		           'dsc_parm' => __('callsign', 'callsignquery') );
	$instance = wp_parse_args( (array) $instance, $defaults ); ?>

    <!-- Widget Title: Text Input -->
    <p>
	<label for="<?php echo $this->get_field_id( 'dsc_title' ); ?>"><?php _e('Title:', 'callsignquery'); ?></label>
	<input id="<?php echo $this->get_field_id( 'dsc_title' ); ?>" name="<?php echo $this->get_field_name( 'dsc_title' ); ?>" value="<?php echo $instance['dsc_title']; ?>" style="width:100%;" />
    </p>

    <!-- Initial Search Value: Text Input -->
    <p>
	<label for="<?php echo $this->get_field_id( 'dsc_help' ); ?>"><?php _e('Search Help Text:', 'callsignquery'); ?></label>
	<input id="<?php echo $this->get_field_id( 'dsc_help' ); ?>" name="<?php echo $this->get_field_name( 'dsc_help' ); ?>" value="<?php echo $instance['dsc_help']; ?>" style="width:100%;" />
    </p>

    <!-- Search Button Text: Text Input -->
    <p>
	<label for="<?php echo $this->get_field_id( 'dsc_button' ); ?>"><?php _e('Search Button Text:', 'callsignquery'); ?></label>
	<input id="<?php echo $this->get_field_id( 'dsc_button' ); ?>" name="<?php echo $this->get_field_name( 'dsc_button' ); ?>" value="<?php echo $instance['dsc_button']; ?>" style="width:100%;" />
    </p>

    <!-- Search URL: Text Input -->
    <p>
	<label for="<?php echo $this->get_field_id( 'dsc_url' ); ?>"><?php _e('Search URL:', 'callsignquery'); ?></label>
	<input id="<?php echo $this->get_field_id( 'dsc_url' ); ?>" name="<?php echo $this->get_field_name( 'dsc_url' ); ?>" value="<?php echo $instance['dsc_url']; ?>" style="width:100%;" />
    </p>

    <!-- URL parameter name: Text Input -->
    <p>
	<label for="<?php echo $this->get_field_id( 'dsc_parm' ); ?>"><?php _e('URL parameter name:', 'callsignquery'); ?></label>
	<input id="<?php echo $this->get_field_id( 'dsc_parm' ); ?>" name="<?php echo $this->get_field_name( 'dsc_parm' ); ?>" value="<?php echo $instance['dsc_parm']; ?>" style="width:100%;" />
    </p>

    <?php
    }
}

?>
