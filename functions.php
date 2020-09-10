<?php
/*
 *  Author: Nate Arnold<hello@natearnold.me>
 *  Custom functions, support, custom post types and more.
 */

add_theme_support( "post-thumbnails" );

/*------------------------------------*\
	Remove Certain Admin Items
\*------------------------------------*/
function remove_menus() {
    remove_menu_page( "index.php" ); //Dashboard
    remove_menu_page( "jetpack" ); //Jetpack*
    remove_menu_page( "edit-comments.php" ); //Comments
}

add_action( "admin_menu", "remove_menus" );

function headless_admin_enqueue_scripts() {
	wp_register_script("admin-ui", get_template_directory_uri() . "/assets/js/admin-ui.js", array(), null, true); // Admin scripts
	wp_enqueue_script("admin-ui"); // Enqueue it!
}

add_action("acf/input/admin_enqueue_scripts", "headless_admin_enqueue_scripts");

// Remove Admin bar
// function remove_admin_bar()
// {
//     return false;
// }

/*------------------------------------*\
	Custom Post Types
\*------------------------------------*/
include_once("functions/custom-post-types.php");

/*------------------------------------*\
	Custom Shortcodes
\*------------------------------------*/
// include_once("functions/custom-shortcodes.php");

/*------------------------------------*\
	Custom Taxonomies
\*------------------------------------*/
// include_once("functions/custom-taxonomy.php");

/*--------------------------------------*\
	Custom Admin Menu Order
\*--------------------------------------*/
function headless_custom_menu_order( $menu_ord ) {
    if ( !$menu_ord ) return true;

    return array(
        "edit.php?post_type=page", // Pages
        "edit.php", // Posts
        "edit.php?post_type=custom_posts", // Custom Post Type
        "separator1", // First separator

        "upload.php", // Media
        "themes.php", // Appearance
        "plugins.php", // Plugins
        "users.php", // Users
        "separator2", // Second separator

        "tools.php", // Tools
        "options-general.php", // Settings
        "separator-last", // Last separator
    );
}
add_filter( "custom_menu_order", "headless_custom_menu_order", 10, 1 );
add_filter( "menu_order", "headless_custom_menu_order", 10, 1 );

function headless_disable_feed() {
    wp_die( __('No feed available, please visit our <a href="'. get_bloginfo("url") .'">homepage</a>!') );
}

add_action("do_feed", "headless_disable_feed", 1);
add_action("do_feed_rdf", "headless_disable_feed", 1);
add_action("do_feed_rss", "headless_disable_feed", 1);
add_action("do_feed_rss2", "headless_disable_feed", 1);
add_action("do_feed_atom", "headless_disable_feed", 1);
add_action("do_feed_rss2_comments", "headless_disable_feed", 1);
add_action("do_feed_atom_comments", "headless_disable_feed", 1);

if (!function_exists("acf_nullify_empty")) {
  /**
   * Return `null` if an empty value is returned from ACF.
   *
   * @param mixed $value
   * @param mixed $post_id
   * @param array $field
   *
   * @return mixed
   */
  function acf_nullify_empty($value, $post_id, $field) {
      if (empty($value)) {
          return null;
      }
      return $value;
  }
}

add_filter("acf/format_value", "acf_nullify_empty", 100, 3);