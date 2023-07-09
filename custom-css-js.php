<?php
/**
 * Plugin Name:       Easy Custom Css and Js
 * Plugin URI:        https://wordpress.org/plugins/easy-custom-css-and-js/
 * Description:       This is a Custom Css Js plugin. You can add your desire code on your project. 
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Meheraj
 * Author URI:        https://developermeheraj.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       wpccj
 */


  // Plugin Admin Page Style
  add_action( "admin_enqueue_scripts", "wpccj_enqueue_admin_style" );
  function wpccj_enqueue_admin_style(){
    wp_enqueue_style('wpccj-codemirror', plugins_url('codemirror/css/codemirror.css', __FILE__));
    wp_enqueue_style('wpccj-dracula', plugins_url('codemirror/css/dracula.css', __FILE__));
    wp_enqueue_style('wpccj-admin-style', plugins_url('css/wpccj-admin-style.css', __FILE__));
  }

  // Including JavaScript
  add_action( "admin_enqueue_scripts", "wpccj_enqueue_scripts" );
  function wpccj_enqueue_scripts(){
    wp_enqueue_script( 'wpccj-codemirror', plugins_url('codemirror/js/codemirror-min.js', __FILE__), array(), '1.0.0', 'true');
    wp_enqueue_script( 'wpccj-css', plugins_url('codemirror/js/mode/javascript.js', __FILE__), array(), '1.0.0', 'true');
    wp_enqueue_script( 'wpccj-javascript', plugins_url('codemirror/js/mode/css.js', __FILE__), array(), '1.0.0', 'true');
    wp_enqueue_script( 'wpccj-closetag', plugins_url('codemirror/js/closetag.js', __FILE__), array(), '1.0.0', 'true');
    wp_enqueue_script( 'custom-admin', plugins_url('js/wpccj-admin-js.js', __FILE__), array(), '1.0.0', 'true');
  }
  

  // Plugin Option Page Function
  add_action( 'admin_menu', 'wpccj_add_theme_page' );
  function wpccj_add_theme_page(){
    add_menu_page('Custom Css Js', 'Custom Code', 'manage_options', 'wpccj-plugin-option', 'wpccj_create_page', 'dashicons-media-code', '102');
  }

// Plugin Callback
function wpccj_create_page(){
  ?>
    <div class="wpccj_area">
      <div class="wpccj_content_area area_common">
        <h2 id="title"><?php print esc_attr( 'Custom Code' ) ?></h2>
        
        <form action="options.php" method="post">
          <?php wp_nonce_field( 'update-options' ); ?>

          <!-- Css Editor -->
          <div class="custom_css">
            <div class="editor">
              <div class="editor-head">
                <h5>Style/Css</h5>
                <div class="apple-bar">
                  <span style="background-color: #ff596a;"></span>
                  <span style="background-color: #f3ff87;"></span>
                  <span style="background-color: #54ff62;"></span>
                </div>
              </div>
              <div class="edit-content">
                <textarea name="wpccj_css_editor" id="wpccj_css_editor" cols="30" rows="10" ><?php $my_options = get_option('wpccj_css_editor');
                echo esc_attr( $my_options ) ? $my_options : '/* Start Coding Here */' ?></textarea>
              </div>
            </div>
          </div>
          <!-- Js Editor -->
          <div class="javascript">
            <div class="editor">
              <div class="editor-head">
                <h5>JavaScript</h5>
                <div class="apple-bar">
                  <span style="background-color: #ff596a;"></span>
                  <span style="background-color: #f3ff87;"></span>
                  <span style="background-color: #54ff62;"></span>
                </div>
              </div>
              <div class="edit-content">
                <textarea name="wpccj_js_editor" id="wpccj_js_editor" cols="30" rows="10" ><?php $my_options = get_option('wpccj_js_editor');
                echo esc_attr( $my_options ) ? $my_options : '// Start Coding Here' ?></textarea>
              </div>
            </div>
          </div>

          <input type="hidden" name="action" value="update">
          <input type="hidden" name="page_options" value="wpccj_css_editor, wpccj_js_editor">

          <input type="submit" name="submit" class="button button-primary" value="<?php _e('Save Changes', 'wpccj'); ?>">
        </form>
      </div>
      
      <div class="wpccj_sidebar_area area_common">
        <h2 id="title"><?php print esc_attr( 'Author Info' ) ?></h2>
        <div class="author_card">
          <img src="<?php print plugin_dir_url( __FILE__ ) . 'img/meheraj.jpg' ?>" alt="Meheraj">
          <h3>Developer Meheraj</h3>
          <p>I'm a professional WordPress & Web Developer.</p>
          <ul class="social_link">
            <li><a target="_blank" href="https://developermeheraj.com/"><span class="dashicons dashicons-admin-site"></span></a></li>
            <li><a target="_blank" href="https://www.linkedin.com/in/meheraj185/"><span class="dashicons dashicons-linkedin"></span></a></li>
            <li><a target="_blank" href="https://www.instagram.com/meheraj1850/"><span class="dashicons dashicons-instagram"></span></a></li>
            <li><a target="_blank" href="link"><span class="dashicons dashicons-youtube"></span></a></li>
            <li><a target="_blank" href="https://www.facebook.com/meheraj185/"><span class="dashicons dashicons-facebook-alt"></span></a></li>
          </ul>
        </div>
        <div class="donation_link">
          <div class="donation_box">
            <h3>Donation For Meheraj</h3>
            <a href="https://bmc.link/meheraj185" ><img src="<?php print plugin_dir_url( __FILE__ ) . 'img/donation.png' ?>" alt="Buy me a coffee"></a>
          </div>
        </div>
      </div>
    </div>
  <?php
}

// Render Code on Site
function wpccj_css_code_render(){
?>
<style type="text/css">
  <?php print get_option('wpccj_css_editor'); ?>
</style>
<?php
}
add_action('wp_head', 'wpccj_css_code_render');

function wpccj_js_code_render(){
  ?>
  <script type="text/javascript">
    <?php print get_option('wpccj_js_editor'); ?>
  </script>
  <?php
}
add_action('wp_footer', 'wpccj_js_code_render');

?>