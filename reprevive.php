<?php
/*
 * Plugin Name: RenegadeWorks Feedback & Review Us Tab
 * Version: 1.2
 * Plugin URI: https://renegadeworks.com/
 * Description: This plugin adds a floating tab to the side of your website. You can link it to your RenegadeWorks location page, a website form or a review site profile. The full version of RenegadeWorks combines customer feedback, online reputation management, customer referrals and other tools to drive new and repeat business. <a href="https://renegadeworks.com/" target=_blank><strong>Learn More Here</strong></a>. 
 * Author: RenegadeWorks
 * Author URI: https://renegadeworks.com/
 * Requires at least: 4.0
 * Tested up to: 4.5.3
 *
 * @package RenegadeWorks
 * @author RenegadeWorks
 * @since 1.0.0
 */
 
 //do nothing if location page url is not set
 if ( esc_attr( get_option('reprevive_location_page_url' ))  == '' ) {
     
 }

 //if both account id and location page url are set then proceed
 else {
    add_action( 'wp_head', 'reprevive_header' );
    function reprevive_header() {
        
        //light theme css
        if (esc_attr( get_option('reprevive_feedback_tab_theme') == 'light')) {
            $text = '#000';
            $background = '220,220,220';
        }
        
        //blue theme css
        elseif (esc_attr( get_option('reprevive_feedback_tab_theme') == 'blue')) {
            $text = '#fff';
            $background = '0,64,128';
        }
        
        //green theme css
        elseif (esc_attr( get_option('reprevive_feedback_tab_theme') == 'green')) {
            $text = '#fff';
            $background = '0,128,0';
        }
        
        //orange theme css
        elseif (esc_attr( get_option('reprevive_feedback_tab_theme') == 'orange')) {
            $text = '#fff';
            $background = '255,128,0';
        }
        
        //pink theme css
        elseif (esc_attr( get_option('reprevive_feedback_tab_theme') == 'pink')) {
            $text = '#fff';
            $background = '255,0,128';
        }
        
        //red theme css
        elseif (esc_attr( get_option('reprevive_feedback_tab_theme') == 'red')) {
            $text = '#fff';
            $background = '200,0,0';
        }
        
        //dark theme (default) css
        else {
            $text = '#fff';
            $background = '0,0,0';
        }
        
        //check if location is set to right, else default to left
        if ( esc_attr( get_option('reprevive_feedback_tab_location') == 'right')) {
            
            ?>
            
                <style>
                    #feedbackTabOuter {
                	position: fixed;
                	right: 0;
                	bottom: 0;
                	height: 250px;
                	margin-left: -3px;
                	margin-bottom: -3px;
                }
                
                #feedbackTabInner {
                	float: left;
                	color: <?php echo $text ?>;
                	font: 20px arial, sans-serif; 
                	cursor: pointer;
                	text-align: center;
                	width: 120px;
                	height: 42px;
                	background: rgb(169,169,169); /* fallback for browsers that don't support rgba */
                    background: rgba(<?php echo $background ?>,0.5);
                	margin-top: 60px;
                	margin-right: -42px;
                	padding-top: 5px;
                	-moz-border-radius: 3px;
                	-webkit-border-radius: 3px;
                	border-radius: 3px;
                	-webkit-transform: rotate(270deg);
                	-moz-transform: rotate(270deg);
                	-ms-transform: rotate(270deg);
                	-o-transform: rotate(270deg);
                	transform: rotate(270deg);
                }
                
                #feedbackTabInner:hover {
                	background: rgb(192,192,192); /* fallback for browsers that don't support rgba */
                    background: rgba(<?php echo $background ?>,0.4);
                }
                </style>
                
            <?php
        }
        
        //css for left (default) tab location
        else {
            
            ?>
            
                <style>
                    #feedbackTabOuter {
                    	position: fixed;
                    	left: 0;
                    	bottom: 0;
                    	height: 250px;
                    	margin-left: -3px;
                    	margin-bottom: -3px;
                    }
                    
                    #feedbackTabInner {
                    	float: right;
                    	color: <?php echo $text ?>;
                    	font: 20px arial, sans-serif; 
                    	cursor: pointer;
                    	text-align: center;
                    	width: 120px;
                    	height: 42px;
                        background: rgb(169,169,169); /* fallback for browsers that don't support rgba */
                    	background: rgba(<?php echo $background ?>,0.5);
                    	margin-top: 60px;
                    	margin-left: -42px;
                    	padding-top: 16px;
                    	-moz-border-radius: 3px;
                    	-webkit-border-radius: 3px;
                    	border-radius: 3px;
                    	-webkit-transform: rotate(270deg);
                    	-moz-transform: rotate(270deg);
                    	-ms-transform: rotate(270deg);
                    	-o-transform: rotate(270deg);
                    	transform: rotate(270deg);
                    }
                    
                    #feedbackTabInner:hover {
                        background: rgb(192,192,192); /* fallback for browsers that don't support rgba */
                    	background: rgba(<?php echo $background ?>,0.4);
                    }
                </style> 
                
            <?php
        }
    }
    
    add_action( 'wp_footer', 'reprevive_footer' );
    function reprevive_footer() {
        
        //set location page url
        $locationUrl = esc_attr( get_option('reprevive_location_page_url'));
        
        //set feedback default tab text if not yet set
        if ( esc_attr( get_option('reprevive_feedback_tab_text') == '' )) {
            $tabText = 'Feedback';
        }
        
        //set feedback tab text based on existing setting
        else {
            $tabText = esc_attr( get_option('reprevive_feedback_tab_text'));
        }
        
        //add link if give credit is set to yes
        if ( esc_attr( get_option('reprevive_credit')) == 'yes' && is_front_page() ) {
            ?>
                <div style="text-align:right;float:right; margin: 3px 8px 3px 8px;"><a href="https://wordpress.org/plugins/feedback-tab-review-us-button-by-reprevive/" target=_blank>WordPress Floating Tab Button</a> by <a href="https://renegadeworks.com/" rel="nofollow" target=_blank>RenegadeWorks</a></div>
            <?php
        }
        
        ?>

            <div id="feedbackTabOuter"><a href="<?php echo $locationUrl; ?>" rel="nofollow" target=_blank><div id="feedbackTabInner"><?php echo $tabText; ?></div></a></div>
            
        <?php
    }
 }
 
 //menu item under settings for admin
 add_action( 'admin_menu', 'reprevive_admin_actions' );
 function reprevive_admin_actions () {
    //menu item options
    add_options_page( 'RenegadeWorks Floating Tab', 'Floating Tab', 'manage_options', 'reprevive', 'reprevive_settings_page' );
    //call register settings function
    add_action( 'admin_init', 'reprevive_settings' );
 }
 
 //register settings
 function reprevive_settings() {
	register_setting( 'reprevive-settings-group', 'reprevive_location_page_url' );
	register_setting( 'reprevive-settings-group', 'reprevive_feedback_tab_location' );
    register_setting( 'reprevive-settings-group', 'reprevive_feedback_tab_text' );
	register_setting( 'reprevive-settings-group', 'reprevive_feedback_tab_theme' );
	register_setting( 'reprevive-settings-group', 'reprevive_credit' );
 }

 //admin settings page
 function reprevive_settings_page () {
    ?>
    <div class="wrap">
        
        <h1>RenegadeWorks Floating Tab Settings</h1>
        
        <form method="post" action="options.php">
            <?php settings_fields( 'reprevive-settings-group' ); ?>
            <?php do_settings_sections( 'reprevive-settings-group' ); ?>
            <table class="form-table">
                 
                <tr valign="top">
                <th scope="row">Landing Page URL (required)</th>
                <td>
                    <input type="url" name="reprevive_location_page_url" value="<?php echo esc_attr( get_option('reprevive_location_page_url') ); ?>" required />
                </td>
                <td>
                     Include http://. Usually your RenegadeWorks location page, but can be anything you want, like a feedback form, contact page or review site profile.
                </td>
                </tr>
                
                <tr valign="top">
                <th scope="row">Floating Tab Location</th>
                <td>
                    <select name="reprevive_feedback_tab_location">
                        <option value="left" <?php if (esc_attr( get_option('reprevive_feedback_tab_location') == 'left' ) ) { echo  'selected';} ?> >Left (default)</option>
                        <option value="right" <?php if (esc_attr( get_option('reprevive_feedback_tab_location') == 'right' ) ) { echo  'selected';} ?> >Right</option>
                    </select>
                </td>
                <td>
                </td>
                </tr>
                
                <tr valign="top">
                <th scope="row">Floating Tab Text</th>
                <td>
                    <select name="reprevive_feedback_tab_text">
                        <option value="Feedback" <?php if (esc_attr( get_option('reprevive_feedback_tab_text') == 'Feedback' ) ) { echo  'selected';} ?> >Feedback (default)</option>
                        <option value="Apply Now" <?php if (esc_attr( get_option('reprevive_feedback_tab_text') == 'Apply Now' ) ) { echo  'selected';} ?> >Apply Now</option>
                        <option value="Contact Us" <?php if (esc_attr( get_option('reprevive_feedback_tab_text') == 'Contact Us' ) ) { echo  'selected';} ?> >Contact Us</option>
                        <option value="Rate Us" <?php if (esc_attr( get_option('reprevive_feedback_tab_text') == 'Rate Us' ) ) { echo  'selected';} ?> >Rate Us</option>
                        <option value="Review Us" <?php if (esc_attr( get_option('reprevive_feedback_tab_text') == 'Review Us' ) ) { echo  'selected';} ?> >Review Us</option>
                        <option value="Sales" <?php if (esc_attr( get_option('reprevive_feedback_tab_text') == 'Sales' ) ) { echo  'selected';} ?> >Sales</option>
                        <option value="Support" <?php if (esc_attr( get_option('reprevive_feedback_tab_text') == 'Support' ) ) { echo  'selected';} ?> >Support</option>
                    </select>
                </td>
                <td>
                </td>
                </tr>
                
                <tr valign="top">
                <th scope="row">Floating Tab Color Theme</th>
                <td>
                    <select name="reprevive_feedback_tab_theme">
                        <option value="dark" <?php if (esc_attr( get_option('reprevive_feedback_tab_theme') == 'dark' ) ) { echo  'selected';} ?> >Dark (default)</option>
                        <option value="light" <?php if (esc_attr( get_option('reprevive_feedback_tab_theme') == 'light' ) ) { echo  'selected';} ?>>Light</option>
                        <option value="blue" <?php if (esc_attr( get_option('reprevive_feedback_tab_theme') == 'blue' ) ) { echo  'selected';} ?>>Blue</option>
                        <option value="green" <?php if (esc_attr( get_option('reprevive_feedback_tab_theme') == 'green' ) ) { echo  'selected';} ?>>Green</option>
                        <option value="orange" <?php if (esc_attr( get_option('reprevive_feedback_tab_theme') == 'orange' ) ) { echo  'selected';} ?>>Orange</option>
                        <option value="pink" <?php if (esc_attr( get_option('reprevive_feedback_tab_theme') == 'pink' ) ) { echo  'selected';} ?>>Pink</option>
                        <option value="red" <?php if (esc_attr( get_option('reprevive_feedback_tab_theme') == 'red' ) ) { echo  'selected';} ?>>Red</option>
                    </select>
                </td>
                <td>
                </td>
                </tr>
                
                <tr valign="top">
                <th scope="row">Give Credit (we appreciate it!)</th>
                <td>
                    <select name="reprevive_credit">
                        <option value="yes" <?php if (esc_attr( get_option('reprevive_credit') == 'yes' ) ) { echo  'selected';} ?> >Yes</option>
                        <option value="no" <?php if (esc_attr( get_option('reprevive_credit') == 'no' ) ) { echo  'selected';} ?> >No</option>
                    </select>
                </td>
                <td>
                    This will place a small link at the bottom of the homepage. No other pages are affected.
                </td>
                </tr>
                
            </table>
            
            <?php submit_button(); ?>
        
        </form>
        
    </div>
    <?php
 }
 
?>