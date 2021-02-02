<?php



class NameOfPlugin{

    private $plugin;

    /**
     * NameOfPlugin constructor.
     */
    private function __construct()
    {
        $this->plugin = "nameOfPlugin";
    }

    /**
     *
     */
    private function initPlugin(){
        /**
         * Add plugin in the left admin menu
         */
        add_action('admin_menu', array($this, 'add_admin_menu'));

        /**
         * Load script and css for public pages
         */
        add_action('wp_enqueue_scripts', array($this, 'enqueue_public'));

        /**
         * Load script and css for admin page
         */
        add_action('admin_enqueue_scripts', array($this, 'enqueue_private'));

        /**
         * Add shortcode if needed
         * In an article or page write [name_of_shortcode] to call it.
         */
        //add_shortcode("name_of_shortcode", array($this, 'function_of_shortcode'));

    }

    /**
     * Creation admin menu
     */
    public function add_admin_menu(){
        add_menu_page("$this->plugin  plugin", $this->plugin,'manage_options',
            "$this->plugin _plugin",
            array($this, 'admin_index'),
            'dashicons-media-spreadsheet', 110
        );
    }

    /**
     * Admin page of your plugin
     */
    public function admin_index(){
        require_once  plugin_dir_path(__FILE__) . '../template/adminPage.php';
    }

    /**
     * Load js and css files for public page
     */
    public function enqueue_public(){
        wp_enqueue_script('script', plugins_url('../js/public/script.js', __FILE__));
        wp_enqueue_script('style', plugins_url('../css/public/style.css', __FILE__));
    }

    /**
     * Load js and css files for admin page
     */
    public function enqueue_private(){
        wp_enqueue_style('style', plugins_url('../css/admin/style.css', __FILE__));
        wp_enqueue_script('script', plugins_url('../js/admin/script.js', __FILE__));
    }

    /**
     * Creation of short code
     */
    public function function_of_shortcode(){

        // include template that will shown by the template
        require_once  plugin_dir_path(__FILE__) . '../template/name_of_shortcode.php';
    }

    /**
     * Start plugin
     */
    public static function make(){
        (new self())->initPlugin();
    }
}