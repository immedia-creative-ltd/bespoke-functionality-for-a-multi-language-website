<?php 


// display message before 'buy now' button
//function action_woocommerce_review_order_before_submit(  ) { 
//echo("<p>To pay by credit or debit card click the PayPal button. A PayPal account is not required.</p>");
//}; 
        


// add the action 
//add_action( 'woocommerce_review_order_before_submit', 'action_woocommerce_review_order_before_submit', 10, 0 ); 


add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );

function enqueue_parent_styles() {

    wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );

}

//filter to allow cf7 to read values pushed from the page
add_filter( 'shortcode_atts_wpcf7', 'custom_shortcode_atts_wpcf7_filter', 10, 3 );
function custom_shortcode_atts_wpcf7_filter( $out, $pairs, $atts ) {
  $my_attr = 'destination-email';
 
  if ( isset( $atts[$my_attr] ) ) {
    $out[$my_attr] = $atts[$my_attr];
  }
  return $out;
}

//remove the woocommerce company name field
add_filter( 'woocommerce_checkout_fields' , 'remove_company_name' );

function remove_company_name( $fields ) {
     unset($fields['billing']['billing_company']);
     return $fields;
}

add_action('wp_enqueue_scripts', 'enqueue_child_js');

function enqueue_child_js() {
	
	wp_enqueue_script('custom_script', get_stylesheet_directory_uri() . '/js/custom.js', array('jquery'), '1.0.0', true);
	wp_localize_script('custom_script', 'get_state_ajax', array( 'ajaxurl' => admin_url('admin-ajax.php')));

}



//Add ability to click parent menu items

function immedia_get_navwalker() {

       	require get_stylesheet_directory() . '/inc/wp_bootstrap_navwalker.php';

    }

add_action('after_setup_theme', 'immedia_get_navwalker');



//Change mobile nav to work at 991 rather than 768

 function immedia_get_verticalnav() {

 	   $verticalNav = esc_attr( get_option( 'vertical_nav' ) );

		if($verticalNav == 'On'){

			//includes change @media to 991 and custom css to call nav hamburger earlier

			wp_enqueue_style( 'immedia-vertical-nav-css', get_stylesheet_directory_uri() . '/inc/vertical-nav/vertical-nav.css' );

			wp_enqueue_script( 'immedia-vertical-nav-js', get_stylesheet_directory_uri() . '/inc/vertical-nav/vertical-nav.js', array(), '20151215', true );

		}

    }

	add_action('wp_enqueue_scripts', 'immedia_get_verticalnav');

	

//Fetch match height js library

 function match_height() {

			wp_enqueue_script( 'match-heught-js', get_stylesheet_directory_uri() . '/js/jquery-match-height/jquery.matchHeight.js', array(), '20151215', true );

    }

	add_action('wp_enqueue_scripts', 'match_height');

	

// Owl slider

 function owl_slider() {

			wp_enqueue_script( 'owl-slider-js', get_stylesheet_directory_uri() . '/js/owlcarousel/owl.carousel.min.js', array(), '20151215', true );

			wp_enqueue_style( 'owl-slider-css', get_stylesheet_directory_uri() . '/js/owlcarousel/owl.carousel.min.css' );

			wp_enqueue_style( 'owl-slider-theme', get_stylesheet_directory_uri() . '/js/owlcarousel/owl.theme.default.min.css' );

    }

	add_action('wp_enqueue_scripts', 'owl_slider');
	
	
//Popper JS

 /*function popper_js() {

			wp_enqueue_script( 'popper', get_stylesheet_directory_uri() . '/js/popper.min.js', array(), true );

    }

	add_action('wp_enqueue_scripts', 'popper_js');*/

	

// Counter up

 function counter_up() {

	 		wp_enqueue_script( 'counterup-js', get_stylesheet_directory_uri() . '/js/jquery.counterup/jquery.counterup.min.js' );

		wp_enqueue_script( 'waypoints-js', get_stylesheet_directory_uri() . '/js/waypoints/lib/jquery.waypoints.min.js' );

}

	add_action('wp_enqueue_scripts', 'counter_up');

	

// Shopify css extension

 function shopify_css() {

	 	wp_enqueue_style( 'shopify-css', get_stylesheet_directory_uri() . '/css/shopify.css' );

}

	add_action('wp_enqueue_scripts', 'shopify_css');

	

//Register custom sidebars

function immedia_widget_init() {

	register_sidebar( array(

		'name'          => ( 'CTA Bar' ),

		'id'            => 'cta-bar',

		'before_widget' => '',

		'after_widget'  => '',

	) );

	

	register_sidebar( array(

		'name'          => ( 'Testimonial Head' ),

		'id'            => 'testimonial-head',

		'before_widget' => '',

		'after_widget'  => '',

	) );

	

	register_sidebar( array(

		'name'          => ( 'News Head' ),

		'id'            => 'news-head',

		'before_widget' => '',

		'after_widget'  => '',

	) );

	

	register_sidebar( array(

		'name'          => ( 'Search Head' ),

		'id'            => 'search-head',

		'before_widget' => '',

		'after_widget'  => '',

	) );

	

	register_sidebar( array(

		'name'          => ( 'Main Modal' ),

		'id'            => 'main-modal',

		'before_widget' => '',

		'after_widget'  => '',

	) );

		register_sidebar( array(

		'name'          => ( 'CTA for HCP' ),

		'id'            => 'cta-for-hcp',

		'before_widget' => '',

		'after_widget'  => '',

	) );

		register_sidebar( array(

		'name'          => ( 'Watch more success stories' ),

		'id'            => 'watch-more-success-stories',

		'before_widget' => '',

		'after_widget'  => '',

	) );
	
		register_sidebar( array(

		'name'          => ( 'Userguide Head' ),

		'id'            => 'userguide-head',

		'before_widget' => '',

		'after_widget'  => '',

	) );
	
		register_sidebar( array(

		'name'          => ( 'Chapter Head' ),

		'id'            => 'chapter-head',

		'before_widget' => '',

		'after_widget'  => '',

	) );

}

add_action( 'widgets_init', 'immedia_widget_init' );



// add new menu location

function register_menu() {

register_nav_menu('top-bar-menu',__( 'Top bar menu' ));

}

add_action( 'init', 'register_menu' );



//remove top bar wigdet area as is being used for menu

add_action( 'after_setup_theme', 'parent_override' );

function parent_override() {

    unregister_sidebar('top-bar'); 

}





// add post-formats

add_action( 'after_setup_theme', 'wpsites_child_theme_posts_formats', 11 );

function wpsites_child_theme_posts_formats(){

 add_theme_support( 'post-formats', array(

    'video',

    ) );

}



//Add image size for service box

add_image_size( 'service-image', 558, 312, array( 'middle', 'top' ) );



// add search shortcode

function wpbsearchform( $form ) {

 

    $form = '<form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '">

	<div class="input-group">

	<input type="text" value="' . get_search_query() . '" name="s" id="s" class="form-control" placeholder="Search">

	<span class="input-group-btn"><button class="btn" type="submit" id="searchsubmit" value="Search"><i class="fa fa-search"></i></button></span>

	</div>

	</form>';

 

    return $form;



}

 

add_shortcode('wpbsearch', 'wpbsearchform');



// Search remove vc

/** add this to your function.php child theme to remove ugly shortcode on excerpt */

 

if(!function_exists('remove_vc_from_excerpt'))  {

  function remove_vc_from_excerpt( $excerpt ) {

    $patterns = "/\[[\/]?vc_[^\]]*\]/";

    $replacements = "";

    return preg_replace($patterns, $replacements, $excerpt);

  }

}

 

/** * Original elision function mod by Paolo Rudelli */

 

if(!function_exists('kc_excerpt')) {

 

/** Function that cuts post excerpt to the number of word based on previosly set global * variable $word_count, which is defined below */

 

  function kc_excerpt($excerpt_length = 60) {

 

    global $word_count, $post;

 

    $word_count = isset($word_count) && $word_count != "" ? $word_count : $excerpt_length;

 

    $post_excerpt = $post->post_excerpt != "" ? $post->post_excerpt : strip_tags($post->post_content); $clean_excerpt = strpos($post_excerpt, '...') ? strstr($post_excerpt, '...', true) : $post_excerpt;

 

    /** add by PR */

 

    $clean_excerpt = strip_shortcodes(remove_vc_from_excerpt($clean_excerpt));

 

    /** end PR mod */

 

    $excerpt_word_array = explode (' ',$clean_excerpt);

 

    $excerpt_word_array = array_slice ($excerpt_word_array, 0, $word_count);

 

    $excerpt = implode (' ', $excerpt_word_array).''; echo ''.$excerpt.'';

 

  }

 

}



// Turn off big image filer WP 5.3

add_filter( 'big_image_size_threshold', '__return_false' );



//custom woocommerce template support



function mytheme_add_woocommerce_support() {

  add_theme_support( 'woocommerce' );
  add_theme_support( 'wc-product-gallery-slider' );
  add_theme_support( 'wc-product-gallery-zoom' );
  //add_theme_support( 'wc-product-gallery-lightbox' );
}

add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );




//function my_extra_lines() {

// $thiscontent .= the_field('price_including_vat');
// $thiscontent .= '<br />';
// echo $thiscontent ;
//}
//add_action( 'woocommerce_after_shop_loop_item_title', 'my_extra_lines' );

// adds acf extra line to archive such as 'The box contains the device control unit and your first mouthpiece'
function my_extra_line() {
$mycontent .= get_field('price_including_vat');
$mycontent .= '<br /><br />';
echo $mycontent;
}

//add_action( 'woocommerce_after_shop_loop_item_title', 'my_extra_line' );



//add custom message below title on single page


add_action( 'woocommerce_single_product_summary', 'custom_prod_message', 6 );
function custom_prod_message( $price ) {
 $thiscontent .= the_field('extra_line');
  $thiscontent .= '<br /></div>';
	return  $thiscontent;
}

//add custom message below title on archive page
add_action( 'woocommerce_shop_loop_item_title', 'woocommerce_shop_loop_item_subtitle', 20 );
function woocommerce_shop_loop_item_subtitle() {
    global $product;
$mysub = get_field('extra_line');
    echo '<p style="color:#000!important;">' . $mysub . '</p>';
}



// Change number or products per row to 2



add_filter('loop_shop_columns', 'loop_columns', 999);

if (!function_exists('loop_columns')) {

	function loop_columns() {

		return 2; // 2 products per row

	}

}

// Add coupon code to the admin email.

// The email function hooked that display the text
add_action( 'woocommerce_email_order_details', 'display_applied_coupons', 10, 4 );
function display_applied_coupons( $order, $sent_to_admin, $plain_text, $email ) {

    // Only for admins and when there at least 1 coupon in the order
 
if ( $sent_to_admin && count($order->get_items('coupon') ) > 0 ){
			foreach( $order->get_items('coupon') as $coupon ){
				$coupon_codes[] = $coupon->get_code();
			}
			// For one coupon
			if( count($coupon_codes) == 1 ){
				$coupon_code = reset($coupon_codes);
				echo '<p>'.__( 'Coupon Used: ').$coupon_code.'<p>';
			} 
			// For multiple coupons
			else {
				$coupon_codes = implode( ', ', $coupon_codes);
				echo '<p>'.__( 'Coupons Used: ').$coupon_codes.'<p>';
			}
}
}


// Disable 'related products' display

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);

//Add support to breadcrumbs and remove Home

add_filter( 'wpseo_breadcrumb_links', 'unbox_yoast_seo_breadcrumb_append_link' );
 function unbox_yoast_seo_breadcrumb_append_link( $links ) {
     global $post;
     if( is_singular('userguide')|| is_post_type_archive('userguide')) {
		 
			if ( $links[0]['text'] == 'Home' ) {
			// remove first element of array (home)
			array_shift($links);
		  }
		 
         $breadcrumb = array(
         'url' => site_url( '/support-hub/' ),
         'text' => 'Support hub',
       );
       array_unshift($links, $breadcrumb); 
     }
     return $links;
 }
 
add_filter('F4/WCSF/get_salutation_options', function($options, $settings) {
    // Change label
    $options['mr'] = 'Mr';

    // Add new labels
    $options['ms'] = 'Ms.';
    $options['dr'] = 'Dr.';
    $options['prof'] = 'Prof.';

    return $options;
}, 10, 2);

//Added Cookies to accept hcpid

function set_hcpid_cookie() {
	if (isset($_GET['hcpid'])){
	$parameterHcpidID = $_GET['hcpid'];
	setcookie('cbs_hcpid', $parameterHcpidID, time()+1209600, COOKIEPATH, COOKIE_DOMAIN, false);
	}
}

add_action( 'init', 'set_hcpid_cookie'); 

//if cbs_hcpid cookie exists,add it to order notes 

add_action( 'woocommerce_new_order', 'add_engraving_notes',  1, 1  );




function add_engraving_notes( $order_id ) {
  
  if(isset($_COOKIE['cbs_hcpid'])) {
// I already have the ID from the hook I am using.
 $order = new WC_Order( $order_id ); 
 
 //creates metaname hcpid, and attaches meta value from  the cookie
 update_post_meta( $order->get_id(), "hcpid", $_COOKIE['cbs_hcpid'] );
 

 // The text for the note field (the old way replaced by the )
 //$note1 = __("hcpid from cookie=".$_COOKIE['cbs_hcpid']);
 //$order->add_order_note( $note1 );
 
  }
}


 add_action( 'woocommerce_checkout_before_customer_details', 'big_red_hcp_message' );
//this function just displays instruction to hcp at checkout .
function big_red_hcp_message(){ 
$user = wp_get_current_user();
if ( in_array( 'hcp', (array) $user->roles ) ) {
echo ("<div class='woo-sc-box alert' style='background:#ffe6e5; border:solid 1px #ffc5c2;'>IMPORTANT: Please enter your billing details in the 'Billing details' fields below and enter your patients delivery details by clicking the tick box next to 'Deliver to a different address?'</div>");
}
}
 
 add_action( 'woocommerce_admin_order_data_after_shipping_address', 'edit_woocommerce_checkout_page', 10, 1 );

function edit_woocommerce_checkout_page($order){
	//this function just displays the hcpid on the order field for reference.
    global $post_id;
    $order = new WC_Order( $post_id );
    echo '<p><strong>'.__('HCPID').':</strong> ' . get_post_meta($order->get_id(), 'hcpid', true ) . '</p>';
}

function wc_contact_form_func( $atts ){
	ob_start();
	?>
<script src="https://www.google.com/recaptcha/api.js"></script>
<script>
 function timestamp() { var response = document.getElementById("g-recaptcha-response"); if (response == null || response.value.trim() == "") {var elems = JSON.parse(document.getElementsByName("captcha_settings")[0].value);elems["ts"] = JSON.stringify(new Date().getTime());document.getElementsByName("captcha_settings")[0].value = JSON.stringify(elems); } } setInterval(timestamp, 500); 
</script>
<div class="st-form-error">
</div>
<div class="st-form-error-state">
</div>
	<form class="sf-form" action="https://webto.salesforce.com/servlet/servlet.WebToCase?encoding=UTF-8" method="POST">

<input type=hidden name='captcha_settings' value='{"keyname":"ExciteOSA","fallback":"true","orgId":"00D3z000002KGQg","ts":""}'>
<input type="hidden" name="orgid" value="00D3z000002KGQg">
<input type="hidden" name="retURL" value="https://uk.exciteosa.com">

<!--  ----------------------------------------------------------------------  -->
<!--  NOTE: These fields are optional debugging elements. Please uncomment    -->
<!--  these lines if you wish to test in debug mode.                          -->
<!--  <input type="hidden" name="debug" value=1>                              -->
<!--  <input type="hidden" name="debugEmail"                                  -->
<!--  value="tahneet.afroz@consleague.com">                                   -->
<!--  ----------------------------------------------------------------------  -->

<div class="row">
	<div class="col-md-6">
		<label for="first_name" class="hidden">First Name</label><input  id="00N3z00000CzSeU" maxlength="40" name="00N3z00000CzSeU" size="20" type="text" placeholder="First name" required/>
	</div>
	<div class="col-md-6">
		<label for="last_name" class="hidden">Last Name</label><input  id="00N3z00000CzSeZ" maxlength="80" name="00N3z00000CzSeZ" size="20" type="text" placeholder="Last name" required/>
	</div>
</div>

<label for="email" class="hidden">Email</label><input  id="email" maxlength="80" name="email" size="20" type="text" placeholder="Email" required/>

<label for="phone" class="hidden">Phone</label><input  id="phone" maxlength="40" name="phone" size="20" type="text" placeholder="Phone number (e.g. +44.......)" />
		
		<?php
	global $wpdb;
	$aCountries = $wpdb->get_results( "SELECT id, name FROM ".$wpdb->prefix."countries" );
	?>
	<div class="select-wrap">
	<select class="countries" name="00N3z00000CzSeP" id="00N3z00000CzSeP">
	<option value="">--<?php _e('Select Country'); ?>--</option>
	<?php foreach ($aCountries as $country) {
		   ?>
		<option value="<?php echo $country->name; ?>" data-id="<?php echo $country->id; ?>" <?php echo ($country->name == 'United Kingdom')? 'selected' : ''; ?>><?php echo $country->name; ?></option>
		<?php
	} ?>
	</select>
	</div>

<!-- <label for="country" class="hidden">Country</label><input  id="country" maxlength="40" name="country" size="20" type="text"  placeholder="Country" /> 

-->
<div class = "state_div select-wrap">
	
       
       </div> 
<label for="company" class="hidden">Company</label><input id="company" maxlength="40" name="company" size="20" type="text"  placeholder="Company" />

<!-- <label for="city" class="hidden">City</label><input  id="city" maxlength="40" name="city" size="20" type="text" placeholder="City" /> -->

		
      
<!-- <label for="state" class="hidden">State/Province</label><input id="state" maxlength="20" name="state" size="20" type="text" placeholder="State/Province" /> -->

<div>Nature Of Inquiry:</div>
<div class="select-wrap">
<select  id="subject" name="subject" title="NatureOfInquiry">
<option value="">--None--</option>
<option value="Prospective user">Prospective user</option>
<option value="Healthcare professional">Healthcare professional</option>
<option value="Press and media">Press and media</option>
<option value="Other">Other</option>
</select>
</div>

<label for="message" class="hidden">Message</label><textarea id="description" name="description" cols="40" rows="10" type="text" wrap="soft" placeholder="Message"></textarea>


<input type="hidden" id="lead_source" name="lead_source" value="Web Enquiry">
		<div class="g-recaptcha" data-sitekey="6Le0kPcaAAAAACeYQsxjlGd19jzX0xgAlzpKNBj6"></div>
			<span class="captcha-error" style="color:red;"></span>
<p>By submitting this form I acknowledge that the data I provide will be transferred to eXciteOSA's Mailchimp account for the purpose of keeping me informed of eXciteOSA® news.</p>

<button class="vc_general vc_btn3 vc_btn3-size-md vc_btn3-shape-round vc_btn3-style-flat vc_btn3-icon-right vc_btn3-color-blue">Get in touch <i class="vc_btn3-icon fas fa-chevron-right" aria-hidden="true"></i></button>

</form>


	<?php
	return ob_get_clean();
}
add_shortcode( 'wc-contact-form', 'wc_contact_form_func' );

add_action('wp_ajax_get_states_by_ajax', 'get_states_by_ajax_callback');
add_action('wp_ajax_nopriv_get_states_by_ajax', 'get_states_by_ajax_callback');

/*function get_states_by_ajax_callback() {
	global $wpdb;
    $country = sanitize_text_field($_POST["country"]);
	$states = $wpdb->get_results( $wpdb->prepare( "SELECT id, name FROM ".$wpdb->prefix."state WHERE country_id = %d", $country ) );
    echo json_encode($states);
    wp_die();
}*/


function get_states_by_ajax_callback() {
	global $wpdb;
    $country = sanitize_text_field($_POST["country"]);
	$states = $wpdb->get_results( $wpdb->prepare( "SELECT id, name FROM ".$wpdb->prefix."state WHERE country_id = %d", $country ) );
	$html = '';
	if(!empty($states)){
		$html .= '<select class="states" id="00N3z00000CzSee" name="00N3z00000CzSee" required><option value="">Select State</option>';
		$ar = array();
		foreach ($states as $st) {
		$ar = $st;
       
		$html .= '<option data-id="'.$ar->id.'" value="'.$ar->name.'">'.$ar->name.'</option>';
		}
    	$html .= '</select>';
	}
	
	

    echo json_encode($html);
    wp_die();
}

//block popup if popblock is a url variable

function popblocker() {

if (isset($_GET['popblock'])){

if (!isset($_COOKIE['wow-modal-id-4'])) {

setcookie('wow-modal-id-4', 'yes', time()+1209600, COOKIEPATH, COOKIE_DOMAIN, false);

}
}
}

//Design2021 style, enqueues new styles for design 2021 page template.

function enqueue_design2021() {
  if ( is_page_template( 'design2021.php' ) ) {
	  
    wp_enqueue_style( 'design2021' , get_stylesheet_directory_uri() . '/css/design2021.css');
	
  }
}
add_action( 'wp_enqueue_scripts', 'enqueue_design2021' );

function enqueue_design2021_2() {
  if ( is_page_template( 'design2021_2.php' ) || is_page_template( 'healthcare-professionals-design2021_2.php' ) ) {
	  
    wp_enqueue_style( 'design2021_2' , get_stylesheet_directory_uri() . '/css/design2021_2.css');
	
  }
}
add_action( 'wp_enqueue_scripts', 'enqueue_design2021_2' );


//add 30 days as an option on the subscriptions drop down in woocommerce back end

function eg_extend_subscription_period_intervals( $intervals ) {

	$intervals[30] = sprintf( __( 'every %s', 'my-text-domain' ), WC_Subscriptions::append_numeral_suffix( 30 ) );

	return $intervals;
}
add_filter( 'woocommerce_subscription_period_interval_strings', 'eg_extend_subscription_period_intervals' );

//add 30 days as an option on the subscriptions drop down in back end




// MP subscription paid - New status for MP subscription order process flow
function register_subscription_paid_order_status() {
    register_post_status( 'wc-subscription-paid', array(
        'label'                     => 'MP Subscription Paid',
        'public'                    => true,
        'exclude_from_search'       => false,
        'show_in_admin_all_list'    => true,
        'show_in_admin_status_list' => true,
        'label_count'               => _n_noop( 'MP Subscription Paid (%s)', 'MP Subscription Paid (%s)' )
    ) );
}
add_action( 'init', 'register_subscription_paid_order_status' );

// Add to list of WC Order statuses
function add_subscription_paid_to_order_statuses( $order_statuses ) {
 
    $new_order_statuses = array();
 
    // add new order status after processing
    foreach ( $order_statuses as $key => $status ) {
 
        $new_order_statuses[ $key ] = $status;
 
        if ( 'wc-processing' === $key ) {
            $new_order_statuses['wc-subscription-paid'] = 'MP Subscription Paid';
        }
    }
 
    return $new_order_statuses;
}
add_filter( 'wc_order_statuses', 'add_subscription_paid_to_order_statuses' );


//if app sends id then hide header and footer
//set cookie 'fromapp'
//this will be used by the hide_header_app function
/*
add_action('init', 'set_app_cookie');

function set_app_cookie(){
	if (isset($_GET['fromapp'])){
		if (!isset($_COOKIE['fromapp'])) {
	setcookie('fromapp', 'yes');
}
}
}
*/

//Send refunded order email to additional addresses
add_filter( 'woocommerce_email_headers', 'order_refunded_email_add_cc_bcc', 9999, 3 );
  
function order_refunded_email_add_cc_bcc( $headers, $email_id, $order ) {
    if ( 'customer_refunded_order' == $email_id ) {
        //$headers .= "Cc: Sales <sales@ourcompany.com>" . "\r\n"; // del if not needed
        $headers .= "\r\n";
        $headers .= "Bcc: Accounts<accounts@signifiermedical.com>" . "\r\n"; // del if not needed
		$headers .= "Bcc: Sales<sales.uk@signifiermedical.com>" . "\r\n"; // del if not needed
    }
    return $headers;
}


