<?php
  function headless_taxonomy() {
    $labels = array(
      "name"                       => "Taxonomies",
      "singular_name"              => "Taxonomy",
      "menu_name"                  => "Taxonomies",
      "all_items"                  => "All Taxonomies",
      "parent_item"                => "Parent Taxonomy",
      "parent_item_colon"          => "Parent Taxonomy:",
      "new_item_name"              => "New Taxonomy",
      "add_new_item"               => "Add Taxonomy",
      "edit_item"                  => "Edit Taxonomy",
      "update_item"                => "Update Taxonomy",
      "view_item"                  => "View Taxonomy",
      "separate_items_with_commas" => "Separate Taxonomies with commas",
      "add_or_remove_items"        => "Add or remove Taxonomies",
      "choose_from_most_used"      => "Choose from the most used",
      "popular_items"              => "Popular Taxonomies",
      "search_items"               => "Search Taxonomies",
      "not_found"                  => "Not Found",
      "no_terms"                   => "No Taxonomies",
      "items_list"                 => "Taxonomies list",
      "items_list_navigation"      => "Taxonomies list navigation",
    );
    $args = array(
      "labels"                     => $labels,
      "hierarchical"               => false,
      "public"                     => true,
      "show_ui"                    => true,
      "show_in_quick_edit"         => false,
      "meta_box_cb"                => false,
      "show_admin_column"          => false,
      "show_in_nav_menus"          => false,
      "show_tagcloud"              => false,
      "show_in_rest"               => true,
      "show_in_graphql"            => true,
      "graphql_single_name"        => "Taxonomy",
      "graphql_plural_name"        => "Taxonomies",
    );

    register_taxonomy( "taxonomy", array( "page" ), $args );
  }

  add_action( "init", "headless_taxonomy", 0 );
?>