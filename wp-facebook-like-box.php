<?php
/*
 Plugin Name: Facebook Like Box Widget
 Plugin URI: https://wordpress.org/plugins/wpchandra-fb-like-box-widgets/
 Description: Using Facebook like box widget easy and quick in your blog. This Plugin support you to customize facebook like box in easy way.
 Version: 2.0       
 Author: Chandrakesh Kumar      
 Author URI: http://www.wpchandra.com/                    
 License: GPL3                  
 */           
class Wpchandra_Facebook_Like_Box extends WP_Widget {   
	function __construct() {   
		parent::__construct(     
			'wp_fb_like_box', // Base ID 
			__( 'Facebook Likebox', 'wpchandra-fb-like-box' ), // Name
			array( 'description' => __( 'WPChandra FB Likebox Widget!', 'wpchandra-fb-like-box' ), ) // Args
		); 
		add_action('wp_head', array(&$this, 'wpchandra_add_fb_script_to_head'));  
	}
	
	//add script to head
	function wpchandra_add_fb_script_to_head(){

		echo '<div id="fb-root"></div><script>(function(d, s, id) {var js, fjs = d.getElementsByTagName(s)[0];if (d.getElementById(id)) return;js = d.createElement(s); js.id = id;js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=&version=v2.0";fjs.parentNode.insertBefore(js, fjs);}(document, "script", "facebook-jssdk"));</script>';
	
	}
	  
	public function form( $instance ) {
        if ( isset( $instance['title'] ) ) {
            $title = $instance['title'];
        } else {
            $title = __( 'Facebook Like Box', 'wpchandra-fb-like-box' );
        }
		
		if ( isset( $instance['width'] ) ) {
            $width = $instance['width'];
        }
		else{
			$width="300";
		}
		
		if ( isset( $instance['height'] ) ) {
            $height = $instance['height'];
        }
		else{
			$height="280";
		}
 
        if ( isset( $instance['page_username'] ) ) {
            $page_username = $instance['page_username'];
        }
		else{
			$page_username='https://www.facebook.com/WPChandra-To-Start-for-Web-Development-325741047605388/';
		}
		
        if ( isset( $instance['show_friends_faces'] ) ) {
            $show_friends_faces = $instance['show_friends_faces'];
        } else {
            $show_friends_faces = 'on';
        }
 
        if ( isset( $instance['show_Header'] ) ) {
            $show_Header = $instance['show_Header'];
        } else {
            $show_Header = 'on';
        }
 
        if ( isset( $instance['show_border'] ) ) {
            $show_border = $instance['show_border'];
        } else {
            $show_border = 'on';
        }
 
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title' ); ?>:</label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>"
                   name="<?php echo $this->get_field_name( 'title' ); ?>" type="text"
                   value="<?php echo esc_attr( $title ); ?>">
        </p>
 
        <p>
            <label
                for="<?php echo $this->get_field_id( 'page_username' ); ?>"><?php _e( 'Facebook Page URL' ); ?>:</label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'page_username' ); ?>"
                   name="<?php echo $this->get_field_name( 'page_username' ); ?>" type="text"
                   value="<?php echo esc_attr( $page_username ); ?>">
        </p>
 
        <p>
            <input class="widefat" id="<?php echo $this->get_field_id( 'show_friends_faces' ); ?>"
                   name="<?php echo $this->get_field_name( 'show_friends_faces' ); ?>" type="checkbox"
                   value="on" <?php checked( $show_friends_faces, 'on' ); ?>>
            <label
                for="<?php echo $this->get_field_id( 'show_friends_faces' ); ?>"><?php _e( 'Show Friends\' Faces' ); ?></label>
        </p>
 
        <p>
            <input class="widefat" id="<?php echo $this->get_field_id( 'show_Header' ); ?>"
                   name="<?php echo $this->get_field_name( 'show_Header' ); ?>" type="checkbox"
                   value="on" <?php checked( $show_Header, 'on' ); ?>>
            <label for="<?php echo $this->get_field_id( 'show_Header' ); ?>"><?php _e( 'Show Header' ); ?></label>
        </p>
 
        <p>
            <input class="widefat" id="<?php echo $this->get_field_id( 'show_border' ); ?>"
                   name="<?php echo $this->get_field_name( 'show_border' ); ?>" type="checkbox"
                   value="on" <?php checked( $show_border, 'on' ); ?>>
            <label for="<?php echo $this->get_field_id( 'show_border' ); ?>"><?php _e( 'Show Border' ); ?></label>
        </p>
        
         <p>
            <label
                for="<?php echo $this->get_field_id( 'width' ); ?>"><?php _e( 'Width:' ); ?>:</label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'width' ); ?>"
                   name="<?php echo $this->get_field_name( 'width' ); ?>" type="text"
                   value="<?php echo esc_attr( $width ); ?>">
        </p>
        
        <p>
            <label
                for="<?php echo $this->get_field_id( 'height' ); ?>"><?php _e( 'Height' ); ?>:</label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'height' ); ?>"
                   name="<?php echo $this->get_field_name( 'height' ); ?>" type="text"
                   value="<?php echo esc_attr( $height ); ?>">
        </p>
        
        <p>
        	 <label><?php _e( 'Shortcode' ); ?>:</label><br />
 			 <code>[wpchandra-likebox url="https://www.facebook.com/WPChandra-To-Start-for-Web-Development-325741047605388/" width="340" height="500" show_faces="true" show_Header="true" show_border="false" ]</code>
    <?php
    }



public function update( $new_instance, $old_instance ) {
        $instance                       = array();
        $instance['title']              = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['page_username']      = ( ! empty( $new_instance['page_username'] ) ) ? strip_tags( $new_instance['page_username'] ) : '';
        $instance['show_friends_faces'] = ( ! empty( $new_instance['show_friends_faces'] ) ) ? strip_tags( $new_instance['show_friends_faces'] ) : '';
        $instance['show_Header']        = ( ! empty( $new_instance['show_Header'] ) ) ? strip_tags( $new_instance['show_Header'] ) : '';
        $instance['show_border']        = ( ! empty( $new_instance['show_border'] ) ) ? strip_tags( $new_instance['show_border'] ) : '';
		$instance['width']        = ( ! empty( $new_instance['width'] ) ) ? strip_tags( $new_instance['width'] ) : '';
		$instance['height']        = ( ! empty( $new_instance['height'] ) ) ? strip_tags( $new_instance['height'] ) : '';
		$instance['fb_api_key']        = ( ! empty( $new_instance['fb_api_key'] ) ) ? strip_tags( $new_instance['fb_api_key'] ) : '';
		
 
        return $instance;
    }


public function widget( $args, $instance ) {
        $title              = apply_filters( 'widget_title', $instance['title'] );
        $page_username      = $instance['page_username'];
        $show_friends_faces = $instance['show_friends_faces'];
        $show_Header        = $instance['show_Header'];
        $show_border        = $instance['show_border'];
		$width        = $instance['width'];
		$height        = $instance['height'];
		$fb_api_key        = $instance['fb_api_key'];
 
 
 
        echo $args['before_widget'];
        if ( ! empty( $title ) ) {
            echo $args['before_title'] . $title . $args['after_title'];
        }
 
        if ( empty( $page_username ) ) {
            echo "Facebook Page Url is missing in Widget settings.";
        }
		 else {
            ?>
                 <div class="fb-like-box" data-href="<?php echo $page_username; ?>" data-colorscheme="light" data-width="<?php echo $width; ?>" data-height="<?php echo $height; ?>" data-show-faces="<?php echo ( $show_friends_faces == 'on' ) ? 'true' : 'false'; ?>" data-header="<?php echo ( $show_Header == 'on' ) ? 'true' : 'false'; ?>" data-stream="false" data-show-border="<?php echo ( $show_border == 'on' ) ? 'true' : 'false'; ?>"></div>
 
        <?php
        }
 
        echo $args['after_widget'];
    }

}

// register Foo_Widget widget
function register_wpchandra_fb_likebox_widget() {
    register_widget( 'Wpchandra_Facebook_Like_Box' );
}
add_action( 'widgets_init', 'register_wpchandra_fb_likebox_widget' );

// Register Shortcode
function WPChandra_Facebook_Like_Box_add_shortcode( $atts ) {
	
	extract( shortcode_atts(
		array(
			'url' 			=> 'https://www.facebook.com/WPChandra-To-Start-for-Web-Development-325741047605388/',
			'width' 		=> '380',
			'height' 		=> '500',
			'show_faces' 	=> 'true',
			'show_Header' 	=> 'true',
			'show_border' 	=> 'false'
		), $atts )
	);
	
	$html='<div class="fb-like-box" data-href="'.$url.'" data-colorscheme="light" data-width="'.$width.'" data-height="'.$height.'"  data-show-faces="'.$show_faces.'" data-header="'.$show_Header.'" data-stream="false" data-show-border="'.$show_border.'"></div>';
	return $html;
}
add_shortcode( 'wpchandra-likebox', 'WPChandra_Facebook_Like_Box_add_shortcode' );

