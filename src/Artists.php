<?php

namespace RalfHortt\CustomPostTypeArtists;

use Horttcore\CustomPostType\PostType;

/**
 *  Custom Post Type Produts.
 */
class Artists extends PostType
{
    protected $slug = 'artist';

    /**
     * Register post type.
     *
     * @return array Post type configuration
     */
    public function getConfig() : array
    {
        return [
            'public'              => true,
            'show_ui'             => true,
            'query_var'           => true,
            'menu_position'       => null,
            'menu_icon'           => 'dashicons-star-filled',
            'capability_type'     => 'post',
            'hierarchical'        => false,
            'supports'            => [
                'title',
                'editor',
                'thumbnail',
                'revisions',
            ],
            'has_archive'         => true,
            'rewrite'             => [
                'slug'       => _x('artists', 'Post Type Slug', 'custom-post-type-artists'),
                'with_front' => false,
            ],
            'show_in_rest'        => true,
            'rest_base'           => _x('artists', 'Post Type Slug', 'custom-post-type-artists'),
        ];
    }
    // END config

    /**
     * Labels.
     *
     * @return array
     **/
    public function getLabels() : array
    {
        return [
            'name'                  => _x('Artists', 'post type general name', 'custom-post-type-artists'),
            'singular_name'         => _x('Artist', 'post type singular name', 'custom-post-type-artists'),
            'add_new'               => _x('Add New', 'Artist', 'custom-post-type-artists'),
            'add_new_item'          => __('Add New Artist', 'custom-post-type-artists'),
            'edit_item'             => __('Edit Artist', 'custom-post-type-artists'),
            'new_item'              => __('New Artist', 'custom-post-type-artists'),
            'view_item'             => __('View Artist', 'custom-post-type-artists'),
            'view_items'            => __('View Artists', 'custom-post-type-artists'),
            'search_items'          => __('Search Artists', 'custom-post-type-artists'),
            'not_found'             => __('No Artists found', 'custom-post-type-artists'),
            'not_found_in_trash'    => __('No Artists found in Trash', 'custom-post-type-artists'),
            'parent_item_colon'     => __('Parent Artist', 'custom-post-type-artists'),
            'all_items'             => __('All Artists', 'custom-post-type-artists'),
            'archives'              => __('Artist Archives', 'custom-post-type-artists'),
            'attributes'            => __('Artist Attributes', 'custom-post-type-artists'),
            'insert_into_item'      => __('Insert into artist', 'custom-post-type-artists'),
            'uploaded_to_this_item' => __('Uploaded to this page', 'custom-post-type-artists'),
            'featured_image'        => __('Artist image', 'custom-post-type-artists'),
            'set_featured_image'    => __('Set Artist image', 'custom-post-type-artists'),
            'remove_featured_image' => __('Remove Artist image', 'custom-post-type-artists'),
            'use_featured_image'    => __('Use as Artist image', 'custom-post-type-artists'),
            'menu_name'             => _x('Artists', 'post type general name', 'custom-post-type-artists'),
            'filter_items_list'     => __('Artists', 'custom-post-type-artists'),
            'items_list_navigation' => __('Artists', 'custom-post-type-artists'),
            'items_list'            => __('Artists', 'custom-post-type-artists'),
        ];
    }

    /**
     * Update messages.
     *
     * @param WP_Post      $post     Post object
     * @param string       $postType Post type slug
     * @param WP_Post_Type $postType Post type slug
     *
     * @return array Update messages
     **/
    public function getPostUpdateMessages(\WP_Post $post, string $postType, \WP_Post_Type $postTypeObjects) : array
    {
        $messages = [
            0  => '', // Unused. Messages start at index 1.
            1  => __('Artist updated.', 'custom-post-type-artists'),
            2  => __('Custom field updated.'),
            3  => __('Custom field deleted.'),
            4  => __('Artist updated.', 'custom-post-type-artists'),
            5  => isset($_GET['revision']) ? sprintf(__('Artist restored to revision from %s', 'custom-post-type-artists'), wp_post_revision_title((int) $_GET['revision'], false)) : false,
            6  => __('Artist published.', 'custom-post-type-artists'),
            7  => __('Artist saved.', 'custom-post-type-artists'),
            8  => __('Artist submitted.', 'custom-post-type-artists'),
            9  => sprintf(__('Artist scheduled for: <strong>%1$s</strong>.', 'custom-post-type-artists'), date_i18n(__('M j, Y @ G:i', 'custom-post-type-artists'), strtotime($post->post_date))),
            10 => __('Artist draft updated.', 'custom-post-type-artists'),
        ];

        if (!$postTypeObjects->publicly_queryable) {
            return $messages;
        }

        $permalink = get_permalink($post->ID);
        $view_link = sprintf(' <a href="%s">%s</a>', esc_url($permalink), __('View artist', 'custom-post-type-artists'));
        $messages[1] .= $view_link;
        $messages[6] .= $view_link;
        $messages[9] .= $view_link;

        $preview_permalink = add_query_arg('preview', 'true', $permalink);
        $preview_link = sprintf(' <a target="_blank" href="%s">%s</a>', esc_url($preview_permalink), __('Preview artist', 'custom-post-type-artists'));
        $messages[8] .= $preview_link;
        $messages[10] .= $preview_link;

        return $messages;
    }
} // END class Artists
