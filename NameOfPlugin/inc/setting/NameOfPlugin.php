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
         * Add plugin in the lef admin menu
         */
        add_action('admin_menu', array($this, 'add_admin_menu'));

        /**
         * Load script for public pages
         */
        add_action('wp_enqueue_scripts', array($this, 'enqueue_public'));

        /**
         * Load script for admin page
         */
        add_action('admin_enqueue_scripts', array($this, 'enqueue_private'));

    }

    /**
     *
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
        wp_enqueue_script('script', plugins_url('../js/script.js', __FILE__));
        wp_enqueue_script('style', plugins_url('../css/style.css', __FILE__));
    }

    /**
     * Load js and css files for admin page
     */
    public function enqueue_private(){
        wp_enqueue_style('style', plugins_url('../css/style.css', __FILE__));
        wp_enqueue_script('script', plugins_url('../js/script.js', __FILE__));
    }

    /**
     * Start plugin
     */
    public static function make(){
        (new self())->initPlugin();
    }
}