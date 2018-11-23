<?php

class ET_Builder_Library {

	/**
	 * @var ET_Builder_Library
	 */
	private static $_instance;

	/**
	 * @var ET_Core_Data_Utils
	 */
	protected static $_;

	/**
	 * @var mixed[]
	 */
	protected static $_i18n;

	/**
	 * @var string
	 */
	protected static $_primary_category_key;

	/**
	 * @var string[]
	 */
	protected static $_standard_post_types = array( 'post', 'page', 'project' );

	/**
	 * @var ET_Builder_Post_Taxonomy_LayoutCategory
	 */
	public $layout_categories;

	/**
	 * @var ET_Builder_Post_Taxonomy_LayoutPack
	 */
	public $layout_packs;

	/**
	 * @var ET_Builder_Post_Taxonomy_LayoutType
	 */
	public $layout_types;

	/**
	 * @var ET_Builder_Post_Type_Layout
	 */
	public $layouts;

	/**
	 * ET_Builder_Library constructor.
	 */
	public function __construct() {
		$this->_instance_check();
		$this->_register_cpt_and_taxonomies();

		self::$_ = ET_Core_Data_Utils::instance();

		$this->_register_hooks();
		$this->_register_ajax_callbacks();

		self::$_i18n = require( ET_BUILDER_DIR . '/frontend-builder/i18n/library.php' );

		self::$_standard_post_types = self::_standard_post_types();
	}

	/**
	 * Gets a translated string from {@see self::$_i18n}.
	 *
	 * @param string $string The untranslated string.
	 * @param string $path   Optional path for nested strings.
	 *
	 * @return string The translated string if found, the original string otherwise.
	 */
	public static function __( $string, $path = '' ) {
		$path .= $path ? ".{$string}" : $string;

		return self::$_->array_get( self::$_i18n, $path, $string );
	}

	/**
	 * Dies if an instance already exists.
	 *
	 * @since 3.0.99
	 */
	protected function _instance_check() {
		if ( self::$_instance ) {
			et_error( 'Multiple instances are not allowed!' );
			wp_die();
		}
	}

	/**
	 * Get the name of a thumbnail image size used in the library UI.
	 *
	 * @since 3.0.99
	 *
	 * @param string $type The thumbnail type. Accepts 'thumbnail', 'screenshot'.
	 *
	 * @return string
	 */
	protected static function _get_image_size_name( $type ) {
		$names = array(
			'thumbnail'       => 'et-pb-portfolio-image',
			'thumbnail_small' => 'et-pb-portfolio-image',
			'screenshot'      => 'et-pb-portfolio-image-single',
		);

		$name = $names[ $type ];

		/**
		 * Filters the names of the registered image sizes to use for layout thumbnails. The
		 * dynamic portion of the filter name, '$type', refers to the layout image
		 * type ('thumbnail' or 'screenshot').
		 *
		 * @since 3.0.99
		 *
		 * @param string $name The name of the registered image size that should be used.
		 */
		return apply_filters( "et_builder_layout_{$type}_image_size_name", $name );
	}

	/**
	 * Returns a filtered short name for a layout.
	 *
	 * @since 3.0.99
	 *
	 * @param string  $long_name
	 * @param WP_Post $layout
	 *
	 * @return string
	 */
	protected function _get_layout_short_name( $long_name, $layout ) {
		/**
		 * Filters the short name for layouts that do not have one.
		 *
		 * @since 3.0.99
		 *
		 * @param string  $long_name
		 * @param WP_Post $layout
		 */
		return apply_filters( 'et_builder_library_layout_short_name', $long_name, $layout );
	}

	/**
	 * Processes layout categories for inclusion in the library UI layouts data.
	 *
	 * @since 3.0.99
	 *
	 * @param WP_POST $post              Unprocessed layout.
	 * @param object  $layout            Currently processing layout.
	 * @param int     $index             The layout's index position.
	 * @param array[] $layout_categories Processed layouts.
	 */
	protected function _process_layout_categories( $post, $layout, $index, &$layout_categories ) {
		if ( ! $terms = wp_get_post_terms( $post->ID, $this->layout_categories->name ) ) {
			$layout->category_slug = 'uncategorized';
			return;
		}

		foreach ( $terms as $category ) {
			$category_name = self::__( html_entity_decode( $category->name ), '@categories' );
			$category_name = et_intentionally_unescaped( $category_name, 'react_jsx' );

			if ( ! isset( $layout_categories[ $category->term_id ] ) ) {
				$layout_categories[ $category->term_id ] = array(
					'id'      => $category->term_id,
					'name'    => $category_name,
					'slug'    => $category->slug,
					'layouts' => array(),
				);
			}

			$layout_categories[ $category->term_id ]['layouts'][] = $index;

			$layout->categories[]   = $category_name;
			$layout->category_ids[] = $category->term_id;

			if ( ! isset( $layout->category_slug ) ) {
				$layout->category_slug = $category->slug;
			}

			if ( $id = get_post_meta( $post->ID, self::$_primary_category_key, true ) ) {
				// $id is a string, $category->term_id is an int.
				if ( $id == $category->term_id ) {
					// This is the primary category (used in the layout URL)
					$layout->category_slug = $category->slug;
				}
			}
		}
	}

	/**
	 * Processes layout packs for inclusion in the library UI layouts data.
	 *
	 * @since 3.0.99
	 *
	 * @param WP_POST $post         Unprocessed layout.
	 * @param object  $layout       Currently processing layout.
	 * @param int     $index        The layout's index position.
	 * @param array[] $layout_packs Processed layouts.
	 */
	protected function _process_layout_packs( $post, $layout, $index, &$layout_packs ) {
		if ( ! $terms = wp_get_post_terms( $post->ID, $this->layout_packs->name ) ) {
			return;
		}

		$pack      = array_shift( $terms );
		$pack_name = self::__( html_entity_decode( $pack->name ), '@packs' );
		$pack_name = et_intentionally_unescaped( $pack_name, 'react_jsx' );

		if ( ! isset( $layout_packs[ $pack->term_id ] ) ) {
			$layout_packs[ $pack->term_id ] = array(
				'id'      => $pack->term_id,
				'name'    => $pack_name,
				'slug'    => $pack->slug,
				'date'    => $layout->date,
				'layouts' => array(),
			);
		}

		if ( $layout->is_landing ) {
			$layout_packs[ $pack->term_id ]['thumbnail']     = $layout->thumbnail;
			$layout_packs[ $pack->term_id ]['screenshot']    = $layout->screenshot;
			$layout_packs[ $pack->term_id ]['description']   = et_intentionally_unescaped( html_entity_decode( $post->post_excerpt ), 'react_jsx' );
			$layout_packs[ $pack->term_id ]['category_slug'] = $layout->category_slug;
			$layout_packs[ $pack->term_id ]['landing_index'] = $index;
		}

		$layout_packs[ $pack->term_id ]['layouts'][] = $index;

		$layout_packs[ $pack->term_id ]['categories']   = $layout->categories;
		$layout_packs[ $pack->term_id ]['category_ids'] = $layout->category_ids;

		$layout->pack    = $pack_name;
		$layout->pack_id = $pack->term_id;

		print_r($layout_packs);
		exit;
	}

	/**
	 * Registers the Library's AJAX callbacks.
	 *
	 * @since 3.0.99
	 */
	protected function _register_ajax_callbacks() {
		add_action( 'wp_ajax_et_builder_library_get_layouts_data', array( $this, 'wp_ajax_et_builder_library_get_layouts_data' ) );
		add_action( 'wp_ajax_et_builder_library_get_layout', array( $this, 'wp_ajax_et_builder_library_get_layout' ) );
		add_action( 'wp_ajax_et_builder_library_update_account', array( $this, 'wp_ajax_et_builder_library_update_account' ) );
	}

	/**
	 * Registers the Library's custom post types and taxonomies.
	 *
	 * @since 3.0.99
	 */
	protected function _register_cpt_and_taxonomies() {
		if ( ! $files = glob( ET_BUILDER_DIR . 'post/*/Layout*.php' ) ) {
			return;
		}

		foreach ( $files as $file ) {
			require_once $file;
		}

		$this->layouts           = ET_Builder_Post_Type_Layout::instance();
		$this->layout_categories = ET_Builder_Post_Taxonomy_LayoutCategory::instance();
		$this->layout_packs      = ET_Builder_Post_Taxonomy_LayoutPack::instance();
		$this->layout_types      = ET_Builder_Post_Taxonomy_LayoutType::instance();

		ET_Builder_Post_Taxonomy_LayoutScope::instance();
		ET_Builder_Post_Taxonomy_LayoutWidth::instance();

		// We manually call register_all() now to ensure the CPT and taxonomies are registered
		// at exactly the same point during the request that they were in prior releases.
		ET_Builder_Post_Type_Layout::register_all( 'builder' );

		self::$_primary_category_key = "_yoast_wpseo_primary_{$this->layout_categories->name}";
	}

	/**
	 * Registers the Library's non-AJAX callbacks.
	 *
	 * @since 3.0.99
	 */
	public function _register_hooks() {
		add_action( 'admin_init', 'ET_Builder_Library::update_old_layouts' );
		add_action( 'admin_enqueue_scripts', array( $this, 'wp_hook_admin_enqueue_scripts' ), 4 );
	}

	/**
	 * Returns sorted layout category and pack IDs for use in library UI layouts data.
	 *
	 * @since 3.0.99
	 *
	 * @param array[] $categories
	 * @param array[] $packs
	 *
	 * @return array[] {
	 *
	 *     @type int[] $categories Layout category ids sorted alphabetically by category name.
	 *     @type int[] $packs      Layout pack ids sorted alphabetically by pack name.
	 * }
	 */
	protected static function _sort_builder_library_data( $categories, $packs ) {
		$categories = array_values( $categories );
		$packs      = array_values( $packs );
		$sorted     = array();

		foreach ( array( 'categories', 'packs' ) as $taxonomy ) {
			$sorted[ $taxonomy ] = array();

			$$taxonomy = self::$_->array_sort_by( $$taxonomy, 'slug' );

			foreach ( $$taxonomy as $term ) {
				$sorted[ $taxonomy ][] = $term['id'];
			}
		}

		return $sorted;
	}

	public static function _standard_post_types() {
		/**
		 * Filters the Divi Library's Standard Post Types.
		 *
		 * @since 3.0.99
		 *
		 * @param string[] $standard_post_types
		 */
		return apply_filters( 'et_pb_standard_post_types', self::$_standard_post_types );
	}

	/**
	 * Generates layouts data for the builder's library UI.
	 *
	 * @since 3.0.99
	 *
	 * @return array $data
	 */
	public function builder_library_layouts_data() {
		$layout_categories = array();
		$layout_packs      = array();
		$layouts           = array();
		$index             = 0;

		$thumbnail       = self::_get_image_size_name( 'thumbnail' );
		$thumbnail_small = self::_get_image_size_name( 'thumbnail_small' );
		$screenshot      = self::_get_image_size_name( 'screenshot' );

		$extra_layout_post_type = 'layout';

		$posts = $this->layouts
			->query()
			->not()->with_meta( '_et_pb_built_for_post_type', $extra_layout_post_type )
			->run();

		$posts = self::$_->array_sort_by( is_array( $posts ) ? $posts : array( $posts ), 'post_name' );

		foreach ( $posts as $post ) {
			$layout = new stdClass;

			setup_postdata( $post );

			$layout->id    = $post->ID;
			$layout->index = $index;
			$layout->date  = $post->post_date;

			if ( ! $types = wp_get_post_terms( $layout->id, $this->layout_types->name ) ) {
				continue;
			}

			$layout->type = $types[0]->name;

			// For the initial release of new library UI, only 'layouts' are needed.
			if ( 'layout' !== $layout->type ) {
				continue;
			}

			$title = html_entity_decode( $post->post_title );

			if ( ! $short_name = get_post_meta( $post->ID, '_et_builder_library_short_name', true ) ) {
				$short_name = $this->_get_layout_short_name( $title, $post );

				if ( $short_name !== $title ) {
					update_post_meta( $post->ID, '_et_builder_library_short_name', $short_name );
				}
			}

			$layout->name            = et_intentionally_unescaped( self::__( $title, '@layoutsLong' ), 'react_jsx' );
			$layout->short_name      = et_intentionally_unescaped( self::__( $short_name, '@layoutsShort' ), 'react_jsx' );
			$layout->slug            = $post->post_name;
			$layout->url             = esc_url( wp_make_link_relative( get_permalink( $post ) ) );

			$layout->thumbnail       = esc_url( get_the_post_thumbnail_url( $post->ID, $thumbnail ) );
			$layout->thumbnail_small = esc_url( get_the_post_thumbnail_url( $post->ID, $thumbnail_small ) );
			$layout->screenshot      = esc_url( get_the_post_thumbnail_url( $post->ID, $screenshot ) );

			$layout->categories      = array();
			$layout->category_ids    = array();

			$layout->is_global       = $this->layouts->is_global( $layout->id );
			$layout->is_landing      = ! empty( $post->post_excerpt );
			$layout->description     = '';

			$this->_process_layout_categories( $post, $layout, $index, $layout_categories );
			$this->_process_layout_packs( $post, $layout, $index, $layout_packs );

			wp_reset_postdata();

			$layouts[] = $layout;

			$index++;
		}

		/**
		 * Filters data for the 'My Saved Layouts' tab.
		 *
		 * @since 3.1
		 *
		 * @param array[] $saved_layouts_data {
		 *     Saved Layouts Data
		 *
		 *     @type array[]  $categories {
		 *         Layout Categories
		 *
		 *         @type $id mixed[] {
		 *             Category
		 *
		 *             @type int    $id      Id.
		 *             @type int[]  $layouts Id's of layouts in category.
		 *             @type string $name    Name.
		 *             @type string $slug    Slug.
		 *          }
		 *          ...
		 *     }
		 *     @type array[]  $packs {
		 *         Layout Packs
		 *
		 *         @type $id mixed[] {
		 *             Pack
		 *
		 *             @type string $category_ids  Category ids.
		 *             @type string $category_slug Primary category slug.
		 *             @type string $date          Published date.
		 *             @type string $description   Description.
		 *             @type int    $id            Id.
		 *             @type int[]  $layouts       Id's of layouts in pack.
		 *             @type string $name          Name.
		 *             @type string $screenshot    Screenshot URL.
		 *             @type string $slug          Slug.
		 *             @type string $thumbnail     Thumbnail URL.
		 *          }
		 *          ...
		 *     }
		 *     @type object[] $layouts {
		 *         Layouts
		 *
		 *         @type object {
		 *             Layout
		 *
		 *             @type int      $id ID
		 *             @type string[] $categories
		 *             @type int[]    $category_ids
		 *             @type string   $category_slug
		 *             @type int      $date
		 *             @type string   $description
		 *             @type int      $index
		 *             @type bool     $is_global
		 *             @type bool     $is_landing
		 *             @type string   $name
		 *             @type string   $screenshot
		 *             @type string   $short_name
		 *             @type string   $slug
		 *             @type string   $thumbnail
		 *             @type string   $thumbnail_small
		 *             @type string   $type
		 *             @type string   $url
		 *         }
		 *         ...
		 *     }
		 *     @type array[]  $sorted {
		 *         Sorted Ids
		 *
		 *         @type int[] $categories
		 *         @type int[] $packs
		 *     }
		 * }
		 */
		$saved_layouts_data = apply_filters( 'et_builder_library_saved_layouts', array(
			'categories' => $layout_categories,
			'packs'      => $layout_packs,
			'layouts'    => $layouts,
			'sorted'     => self::_sort_builder_library_data( $layout_categories, $layout_packs ),
		) );

		/**
		 * Filters custom tabs layout data for the library modal. Custom tabs must be registered
		 * via the {@see 'et_builder_library_modal_custom_tabs'} filter.
		 *
		 * @since 3.1
		 *
		 * @param array[] $custom_layouts_data {
		 *     Custom Layouts Data Organized By Modal Tab
		 *
		 *     @type array[] $tab_slug See {@see 'et_builder_library_saved_layouts'} for array structure.
		 *     ...
		 * }
		 * @param array[] $saved_layouts_data {@see 'et_builder_library_saved_layouts'} for array structure.
		 */
		$custom_layouts_data = apply_filters( 'et_builder_library_custom_layouts', array(), $saved_layouts_data );

		return array(
			'layouts_data'        => $saved_layouts_data,
			'custom_layouts_data' => $custom_layouts_data,
		);
	}

	/**
	 * Get custom tabs for the library modal.
	 *
	 * @param string $post_type
	 *
	 * @return array[] {
	 *     Custom Tabs
	 *
	 *     @type string $tab_slug Tab display name.
	 *     ...
	 * }
	 */
	public static function builder_library_modal_custom_tabs( $post_type ) {
		/**
		 * Filters custom tabs for the library modal.
		 *
		 * @since 3.1
		 *
		 * @param array[] $custom_tabs See {@self::builder_library_modal_custom_tabs()} return value.
		 */
		return apply_filters( 'et_builder_library_modal_custom_tabs', array(), $post_type );
	}

	/**
	 * Gets the post types that have existing layouts built for them.
	 *
	 * @since 3.1  Supersedes {@see et_pb_get_standard_post_types()}
	 *            Supersedes {@see et_pb_get_used_built_for_post_types()}
	 * @since 2.0
	 *
	 * @param string $type Accepts 'standard' or 'all'. Default 'standard'.
	 *
	 * @return string[] $post_types
	 */
	public static function built_for_post_types( $type = 'standard' ) {
		static $all_built_for_post_types;

		if ( 'standard' === $type ) {
			return self::$_standard_post_types;
		}

		if ( $all_built_for_post_types ) {
			return $all_built_for_post_types;
		}

		global $wpdb;

		$sql = "SELECT DISTINCT( meta_value ) FROM {$wpdb->postmeta} WHERE meta_key = %s AND meta_value > ''";
		$sql = $wpdb->prepare( $sql, '_et_pb_built_for_post_type' );

		return $all_built_for_post_types = $wpdb->get_col( $sql );
	}

	/**
	 * Get the class instance.
	 *
	 * @since 3.0.99
	 *
	 * @return ET_Builder_Library
	 */
	public static function instance() {
		if ( ! self::$_instance ) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}

	/**
	 * Performs one-time maintenance tasks on library layouts in the database.
	 * {@see 'admin_init'}
	 *
	 * @since 3.1  Relocated from `builder/layouts.php`. New task: create 'Legacy Layouts' category.
	 * @since 2.0
	 */
	public static function update_old_layouts() {
		$layouts = ET_Builder_Post_Type_Layout::instance();

		if ( 'yes' !== get_theme_mod( 'et_updated_layouts_built_for_post_types', 'no' ) ) {
			$posts = $layouts
				->query()
				->not()->with_meta( '_et_pb_built_for_post_type' )
				->run();

			foreach ( (array) $posts as $single_post ) {
				update_post_meta( $single_post->ID, '_et_pb_built_for_post_type', 'page' );
			}

			set_theme_mod( 'et_updated_layouts_built_for_post_types', 'yes' );
		}

		if ( ! et_get_option( 'et_pb_layouts_updated', false ) ) {
			$types = array(
				'section',
				'row',
				'module',
				'fullwidth_section',
				'specialty_section',
				'fullwidth_module',
			);

			$posts = $layouts
				->query()
				->not()->is_type( $types )
				->run();

			foreach ( (array) $posts as $single_post ) {
				if ( ! get_the_terms( $single_post->ID, 'layout_type' ) ) {
					wp_set_object_terms( $single_post->ID, 'layout', 'layout_type', true );
				}
			}

			et_update_option( 'et_pb_layouts_updated', true );
		}

		if ( ! et_get_option( 'library_removed_legacy_layouts', false ) ) {
			$posts = $layouts
				->query()
				->with_meta( '_et_pb_predefined_layout' )
				->run();

			foreach ( $posts as $post ) {
				if ( 'layout' === get_post_meta( $post->ID, '_et_pb_built_for_post_type', true ) ) {
					// Don't touch Extra's Category Builder layouts.
					continue;
				}

				// Sanity check just to be safe
				if ( get_post_meta( $post->ID, '_et_pb_predefined_layout', true ) ) {
					wp_delete_post( $post->ID, true );
				}
			}

			et_update_option( 'library_removed_legacy_layouts', true );
		}
	}

	/**
	 * AJAX Callback: Gets a layout by ID.
	 *
	 * @since 3.0.99
	 *
	 * @global $_POST['id']     The id of the desired layout.
	 * @global $_POST ['nonce'] Nonce: 'et_builder_library_get_layout'.
	 *
	 * @return string|void $layout JSON encoded. See return value of {@see et_pb_retrieve_templates()}
	 *                             for array structure.
	 */
	public function wp_ajax_et_builder_library_get_layout() {
		et_core_security_check( 'edit_posts', 'et_builder_library_get_layout', 'nonce' );

		if ( ! isset( $_POST['id'] ) ) {
			wp_send_json_error();
		}

		$id      = (int) $_POST['id'];
		$layouts = et_pb_retrieve_templates( 'layout', '', 'all', '0', 'all', 'all' );
		$result  = array();

		foreach ( $layouts as $layout ) {
			if ( $id === $layout['ID'] ) {
				$result = $layout;
				break;
			}
		}

		$result['savedShortcode'] = $result['shortcode'];

		if ( ! isset( $_POST['is_BB'] ) ) {
			$result['savedShortcode'] = et_fb_process_shortcode( $result['savedShortcode'] );
		}

		unset( $result['shortcode'] );

		$response = json_encode( array(
			'success' => true,
			'data'    => $result,
		) );

		echo $response;exit; 

		$tmp_file = tempnam( '/tmp', 'et' );

		@file_put_contents( $tmp_file, $response );

		header( 'Content-Length: ' . @filesize( $tmp_file ) );

		@unlink( $tmp_file );

		die( $response );
	}

	/**
	 * AJAX Callback: Gets layouts data for the builder's library UI.
	 *
	 * @since 3.0.99
	 *
	 * @global $_POST['nonce'] Nonce: 'et_builder_library_get_layouts_data'.
	 *
	 * @return string|void $layouts_data JSON Encoded.
	 */
	public function wp_ajax_et_builder_library_get_layouts_data() {
		et_core_security_check( 'edit_posts', 'et_builder_library_get_layouts_data', 'nonce' );
		wp_send_json_success( $this->builder_library_layouts_data() );
	}


	/**
	 * Enqueues library-related styles and scripts in the admin.
	 * {@see 'admin_enqueue_scripts'}
	 *
	 * @since 3.0.99
	 */
	public function wp_hook_admin_enqueue_scripts( $page ) {
		global $typenow;

		et_core_load_main_fonts();

		wp_enqueue_style( 'et-builder-notification-popup-styles', ET_BUILDER_URI . '/styles/notification_popup_styles.css' );

		if ( 'et_pb_layout' === $typenow ) {
			$new_layout_modal = et_pb_generate_new_layout_modal();

			wp_enqueue_style( 'library-styles', ET_BUILDER_URI . '/styles/library_pages.css', array( 'et-core-admin' ), ET_BUILDER_PRODUCT_VERSION );
			wp_enqueue_script( 'library-scripts', ET_BUILDER_URI . '/scripts/library_scripts.js', array(
				'jquery',
				'et_pb_admin_global_js'
			), ET_BUILDER_PRODUCT_VERSION );

			wp_localize_script( 'library-scripts', 'et_pb_new_template_options', array(
					'ajaxurl' => admin_url( 'admin-ajax.php' ),
					'et_admin_load_nonce' => wp_create_nonce( 'et_admin_load_nonce' ),
					'modal_output' => $new_layout_modal,
				)
			);
		} else {
			wp_enqueue_script( 'et-builder-failure-notice', ET_BUILDER_URI . '/scripts/failure_notice.js', array( 'jquery' ), ET_BUILDER_PRODUCT_VERSION );
		}
	}
}

ET_Builder_Library::instance();
