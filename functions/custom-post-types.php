<?php
  /*------------------------------------*\
    Custom Post Types
  \*------------------------------------*/

  add_action( "init", "create_custom_post_type" );

  function create_custom_post_type() {
    register_post_type("custom_posts", // Register Custom Post Type
      array(
        "labels" => array(
          "name"                => "Custom Posts", // Rename these to suit
          "singular_name"       => "Custom Post",
          "add_new"             => "Add New",
          "add_new_item"        => "Add New Custom Post",
          "edit"                => "Edit",
          "edit_item"           => "Edit Custom Post",
          "new_item"            => "New Custom Post",
          "view"                => "View Custom Post",
          "view_item"           => "View Custom Post",
          "search_items"        => "Search Custom Posts",
          "not_found"           => "No Custom Posts found",
          "not_found_in_trash"  => "No Custom Posts found in Trash"
        ),
        "menu_position"         => 5,
        "menu_icon"             => "dashicons-awards",
        "public"                => true,
        "show_in_rest"          => true,
        "show_ui"               => true,
        "show_in_menu"          => true,
        "publicly_queryable"    => true,
        "capability_type"       => "page",
        "hierarchical"          => false,
        "has_archive"           => true,
        "supports"              => array("title","thumbnail","editor","revisions","excerpt","author"), // Other Options: trackbacks, custom-fields, page-attributes, comments, post-formats
        "can_export"            => true, // Allows export in Tools > Export
        "taxonomies"            => array(), // Add supported taxonomies,
        "show_in_graphql"       => true,
        "graphql_single_name"   => "CustomPost",
        "graphql_plural_name"   => "CustomPosts",
      )
    );
  }
?>