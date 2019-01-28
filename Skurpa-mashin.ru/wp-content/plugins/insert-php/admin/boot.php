<?php
/**
 * Admin boot
 * @author Alex Kovalev <alex.kovalevv@gmail.com>
 * @copyright Alex Kovalev 05.06.2018
 * @version 1.0
 */

/**
 * Enables/Disable safe mode, in which the php code will not be executed.
 */
function wbcr_inp_safe_mode() {
	if ( isset( $_GET['wbcr-php-snippets-safe-mode'] ) ) {
		WINP_Helper::enable_safe_mode();
	}
	if ( isset( $_GET['wbcr-php-snippets-disable-safe-mode'] ) ) {
		WINP_Helper::disable_safe_mode();
	}
}

add_action( 'init', 'wbcr_inp_safe_mode' );

/**
 * Admin warning notices
 */
function wbcr_inp_admin_conflict_notices_error( $notices, $plugin_name ) {
	if ( $plugin_name != WINP_Plugin::app()->getPluginName() ) {
		return $notices;
	}
	
	if ( WINP_Helper::is_safe_mode() ) {
		$disable_safe_mode_url = add_query_arg( array( 'wbcr-php-snippets-disable-safe-mode' => 1 ) );
		
		$safe_mode_notice = WINP_Plugin::app()->getPluginTitle() . ': ' . __( 'Running in safe mode. This mode your snippets will not be started.', 'insert-php' );
		$safe_mode_notice .= ' <a href="' . $disable_safe_mode_url . '" class="button button-default">Disable Safe Mode</a>';
		
		$notices[] = array(
			'id'              => 'inp_safe_mode',
			'type'            => 'success',
			'dismissible'     => false,
			'dismiss_expires' => 0,
			'text'            => '<p>' . $safe_mode_notice . '</p>'
		);
	}
	
	$create_notice_url = admin_url( 'edit.php?post_type=' . WINP_SNIPPETS_POST_TYPE );
	
	$upgrade_plugin_notice = '<b>' . WINP_Plugin::app()->getPluginTitle() . '</b>: ' . sprintf( __( 'Attention! If you have previously used version 1.3.0 of plugin Insert php. This new %s plugin version, we added the ability to insert php code using snippets. This is a more convenient and secure way than using shortcodes [insert_php] code execute [/ insert_php]. However, for compatibility reasons, we left support for [insert_php] shortcodes until March 2019, after that we will stop supporting shortcodes [insert_php].', 'insert-php' ), WINP_Plugin::app()->getPluginVersion() );
	
	$upgrade_plugin_notice .= '<br><br>' . __( 'We strongly recommend you to porting your php code to snippets and call them in your posts/pages and widgets using [wbcr_php_snippet id = "000"] shortcodes.', 'insert-php' );
	$upgrade_plugin_notice .= ' ' . sprintf( __( 'For more information on porting code and using snippets, see our plugin <a href="%s" target="_blank">documentation</a>', 'insert-php' ), 'http://woody-ad-snippets.webcraftic.com/getting-started-with-woody-ad-snippets/' );
	
	$upgrade_plugin_notice .= '<br><br><a href="' . $create_notice_url . '" class="button button-default">' . __( 'Create new php snippet', 'insert-php' ) . '</a> ';
	
	$upgrade_plugin_notice .= '<a href="https://downloads.wordpress.org/plugin/insert-php.1.3.zip" class="button button-default">' . __( 'Download old version', 'insert-php' ) . '</a><br><br>';
	$upgrade_plugin_notice .= sprintf( __( 'If you have issues with the plugin new version or any suggestions, please contact us on <a href="%s" target="_blank">our forum</a>.', 'insert-php' ), 'http://forum.webcraftic.com' );
	
	$notices[] = array(
		'id'              => 'inp_upgrade_plugin2',
		'type'            => 'warning',
		'dismissible'     => true,
		'dismiss_expires' => 0,
		'text'            => '<p>' . $upgrade_plugin_notice . '</p>'
	);
	
	/**
	 * Show error notification after saving snippet. We can also show this message when the snippet is activated.
	 * We must warn the user that we can not perform the spippet due to an error.
	 */
	if ( isset( $_GET['wbcr_inp_save_snippet_result'] ) && $_GET['wbcr_inp_save_snippet_result'] == 'code-error' ) {
		$post_id = isset( $_GET['post'] ) ? intval( $_GET['post'] ) : null;
		
		if ( $post_id ) {
			$error = WINP_Plugin::app()->getExecuteObject()->getSnippetError( $post_id );
			
			if ( false !== $error ) {
				$error_message = sprintf( '<p>%s</p><p><strong>%s</strong></p>', sprintf( __( 'The snippet has been deactivated due to an error on line %d:', 'insert-php' ), $error['line'] ), $error['message'] );
				$notices[]     = array(
					'id'              => 'inp_result_error',
					'where'           => array( 'post', 'post-new', 'edit' ),
					'type'            => 'error',
					'dismissible'     => false,
					'dismiss_expires' => 0,
					'text'            => $error_message
				);
			}
		}
	}
	
	if ( isset( $_GET['wbcr_inp_save_snippet_result'] ) && $_GET['wbcr_inp_save_snippet_result'] == 'editor-error' ) {
		$post_id = isset( $_GET['post'] ) ? intval( $_GET['post'] ) : null;
		
		if ( $post_id ) {
			$error_message = sprintf( '<div><p>%s</p></div>', __( 'You cannot save a snippet with a type of "Run everywhere". Enable the code editor or choose another type.', 'insert-php' ) );
			
			$notices[] = array(
				'id'              => 'inp_result_error',
				'where'           => array( 'post', 'post-new', 'edit' ),
				'type'            => 'error',
				'dismissible'     => false,
				'dismiss_expires' => 0,
				'text'            => $error_message
			);
		}
	}
	
	return $notices;
}

add_filter( 'wbcr_factory_notices_408_list', 'wbcr_inp_admin_conflict_notices_error', 10, 2 );

function wbcr_inp_admin_init() {
	
	$plugin = WINP_Plugin::app();
	
	// Register metaboxes
	require_once( WINP_PLUGIN_DIR . '/admin/metaboxes/base-options.php' );
	Wbcr_FactoryMetaboxes404::registerFor( new WINP_BaseOptionsMetaBox( $plugin ), WINP_SNIPPETS_POST_TYPE, $plugin );
	
	if ( current_user_can( 'install_plugins' ) && ! is_plugin_active( 'robin-image-optimizer/robin-image-optimizer.php' ) ) {
		require_once( WINP_PLUGIN_DIR . '/admin/metaboxes/info.php' );
		Wbcr_FactoryMetaboxes404::registerFor( new WINP_InfoMetaBox( $plugin ), WINP_SNIPPETS_POST_TYPE, $plugin );
	}
	
	$snippet_type = WINP_Helper::get_snippet_type();
	
	if ( $snippet_type !== WINP_SNIPPET_TYPE_PHP ) {
		require_once( WINP_PLUGIN_DIR . '/admin/metaboxes/view-options.php' );
		Wbcr_FactoryMetaboxes404::registerFor( new WINP_ViewOptionsMetaBox( $plugin ), WINP_SNIPPETS_POST_TYPE, $plugin );
	}
	
	// Upgrade up to new version
	$first_activation = get_option( $plugin->getOptionName( 'first_activation' ) );
	$is_upgraded      = get_option( $plugin->getOptionName( 'upgrade_up_to_201' ) );
	
	if ( ! $first_activation && ! $is_upgraded ) {
		$role = get_role( 'administrator' );
		
		if ( ! $role ) {
			return;
		}
		
		$role->add_cap( 'edit_' . WINP_SNIPPETS_POST_TYPE );
		$role->add_cap( 'read_' . WINP_SNIPPETS_POST_TYPE );
		$role->add_cap( 'delete_' . WINP_SNIPPETS_POST_TYPE );
		$role->add_cap( 'edit_' . WINP_SNIPPETS_POST_TYPE . 's' );
		$role->add_cap( 'edit_others_' . WINP_SNIPPETS_POST_TYPE . 's' );
		$role->add_cap( 'publish_' . WINP_SNIPPETS_POST_TYPE . 's' );
		$role->add_cap( 'read_private_' . WINP_SNIPPETS_POST_TYPE . 's' );
		
		update_option( $plugin->getOptionName( 'upgrade_up_to_201' ), 1 );
		update_option( $plugin->getOptionName( 'what_new_210' ), 1 );
		
		// Create a demo snippets with examples of use
		if ( ! get_option( $plugin->getOptionName( 'demo_snippets_created' ) ) ) {
			WINP_Helper::create_demo_snippets();
		}
		
		// Write information about the first activation of plugin
		if ( ! $first_activation ) {
			update_option( $plugin->getOptionName( 'first_activation' ), array(
				'version'   => $plugin->getPluginVersion(),
				'timestamp' => time()
			) );
		}
	}
	
	// If the user has updated the plugin or activated it for the first time,
	// you need to show the page "What's new?"
	
	if ( WINP_Helper::is_need_show_about_page() ) {
		try {
			$redirect_url = WINP_Plugin::app()->getPluginPageUrl( 'about', array( 'wbcr_inp_about_page_viewed' => 1 ) );
			wp_safe_redirect( $redirect_url );
		} catch( Exception $e ) {
		}
	}
	
	if ( isset( $_GET['wbcr_inp_about_page_viewed'] ) && WINP_Helper::is_need_show_about_page() ) {
		delete_option( $plugin->getOptionName( 'what_new_210' ) );
	}
}

add_action( 'admin_init', 'wbcr_inp_admin_init' );

// ---
// Editor
//

/**
 * Enqueue scripts
 */
function wbcr_inp_enqueue_scripts() {
	global $pagenow;
	
	$screen = get_current_screen();
	
	if ( ( 'post-new.php' == $pagenow || 'post.php' == $pagenow ) && WINP_SNIPPETS_POST_TYPE == $screen->post_type ) {
		wp_enqueue_script( 'wbcr-inp-admin-scripts', WINP_PLUGIN_URL . '/admin/assets/js/scripts.js', array(
			'jquery',
			'jquery-ui-tooltip'
		), WINP_Plugin::app()->getPluginVersion() );
	}
}

/**
 * Asset scripts for the tinymce editor
 *
 * @param string $hook
 */
function wbcr_inp_enqueue_tinymce_assets( $hook ) {
	$pages = array(
		'post.php',
		'post-new.php',
		'widgets.php'
	);
	
	if ( ! in_array( $hook, $pages ) || ! current_user_can( 'manage_options' ) ) {
		return;
	}
	
	wp_enqueue_script( 'wbcr-inp-tinymce-button-widget', WINP_PLUGIN_URL . '/admin/assets/js/tinymce4.4.js', array( 'jquery' ), WINP_Plugin::app()->getPluginVersion(), true );
}

add_action( 'admin_enqueue_scripts', 'wbcr_inp_enqueue_tinymce_assets' );
add_action( 'admin_enqueue_scripts', 'wbcr_inp_enqueue_scripts' );

/**
 * Adds js variable required for shortcodes.
 *
 * @see before_wp_tiny_mce
 * @since 1.1.0
 */
function wbcr_inp_tinymce_data( $hook ) {
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}
	
	// styles for the plugin shorcodes
	$shortcode_icon  = WINP_PLUGIN_URL . '/admin/assets/img/shortcode-icon5.png';
	$shortcode_title = __( 'Woody ad snippets', 'insert-php' );
	
	$result                  = WINP_Helper::get_shortcode_data();
	$shortcode_snippets_json = json_encode( $result );
	
	?>
    <!-- <?= WINP_Plugin::app()->getPluginTitle() ?> for tinymce -->
    <style>
        i.wbcr-inp-shortcode-icon {
            background: url("<?php echo $shortcode_icon ?>") center no-repeat;
        }
    </style>
    <script>
		var wbcr_inp_tinymce_snippets_button_title = '<?php echo $shortcode_title ?>';
		var wbcr_inp_post_tinymce_nonce = '<?php echo wp_create_nonce( 'wbcr_inp_tinymce_post_nonce' ) ?>';
		var wbcr_inp_shortcode_snippets = <?= $shortcode_snippets_json ?>;
    </script>
    <!-- /end <?= WINP_Plugin::app()->getPluginTitle() ?> for tinymce -->
	<?php
}

add_action( 'admin_print_scripts-post.php', 'wbcr_inp_tinymce_data' );
add_action( 'admin_print_scripts-post-new.php', 'wbcr_inp_tinymce_data' );
add_action( 'admin_print_scripts-widgets.php', 'wbcr_inp_tinymce_data' );

/**
 * Deactivate snippet on trashed
 *
 * @param $post_id
 *
 * @since 2.0.6
 */
function wbcr_inp_trash_post( $post_id ) {
	$post_type = get_post_type( $post_id );
	if ( $post_type == WINP_SNIPPETS_POST_TYPE ) {
		WINP_Helper::updateMetaOption( $post_id, 'snippet_activate', 0 );
	}
}

add_action( 'wp_trash_post', 'wbcr_inp_trash_post' );

/**
 * Removes the default 'new item' from the admin menu to add own page 'new item' later.
 *
 * @see menu_order
 *
 * @param $menu
 *
 * @return mixed
 */
function wbcr_inp_remove_new_item( $menu ) {
	global $submenu;
	
	if ( ! isset( $submenu[ 'edit.php?post_type=' . WINP_SNIPPETS_POST_TYPE ] ) ) {
		return $menu;
	}
	unset( $submenu[ 'edit.php?post_type=' . WINP_SNIPPETS_POST_TYPE ][10] );
	
	return $menu;
}

add_filter( 'custom_menu_order', '__return_true' );
add_filter( 'menu_order', 'wbcr_inp_remove_new_item' );

/**
 * If the user tried to get access to the default 'new item',
 * redirects forcibly to our page 'new item'.
 *
 * @see current_screen
 */
function wbcr_inp_redirect_to_new_item() {
	$screen = get_current_screen();
	
	if ( empty( $screen ) ) {
		return;
	}
	if ( 'add' !== $screen->action || 'post' !== $screen->base || WINP_SNIPPETS_POST_TYPE !== $screen->post_type ) {
		return;
	}
	if ( isset( $_GET['winp_item'] ) ) {
		return;
	}
	
	$url = admin_url( 'edit.php?post_type=' . WINP_SNIPPETS_POST_TYPE . '&page=new-item-' . WINP_Plugin::app()->getPluginName() );
	
	wp_safe_redirect( $url );
	
	exit;
}

add_action( 'current_screen', 'wbcr_inp_redirect_to_new_item' );