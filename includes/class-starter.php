<?php 
if ( ! defined( 'ABSPATH' ) ) {
    die('Nope.');
}

class Starter {

    public function __construct(){
        $this->includes();
        $this->init_hooks();
    }

    public function includes() {

        include_once( __DIR__ . '/constant.php' );
        include_once( __DIR__ . '/class-starter-autoloader.php' );
        include_once( __DIR__ . '/helper.php' );
        /* Do not change the include_once file above.. */

        // Put your code

    }

    public function init_hooks() {
        
        /* Common Class */
        new Starter_Image();
        new Starter_Upload();
        new Starter_Video();
        new Starter_Sidebar();
        new Starter_Post_View();
        new Starter_Script_Loader_Tag();

        /* Admin Area */
        new Starter_Admin_Dashboard(array(
            'remove_widget' => array('dashboard' => 'all')
        ));
        new Starter_Admin_Posttype_Support();
        new Starter_Admin_Notice(array('disable' => 'all'));
        new Starter_Admin_Update(array('disable' => 'all'));
        new Starter_Admin_Bar_Show(array(
            'roles' => 'all',
        ));
        new Starter_Admin_Bar_Menu(array(
            'howdy' => 'Hi,'
        ));
        new Starter_Metabox_Remove();

        /* Third-Party */
        new Starter_Third_Party_Cf7();
        // new Starter_Third_Party_Jetpack_Sharing();

        /* The class of the switch depends on the default theme. */
        switch (STARTER_SKIN) {
            case '':
                new Starter_Search_Form(); 
                break;
            case 'BOOTSTRAP4':
                new Starter_Bootstrap4_Search_Form(); 
                new Starter_Admin_Posttype_Support(array(
                    'remove_post_type_support' => array(
                        'template' => array(
                            'template-home.php' => array( 'all' => [''] ),
                            'bootstrap4-home.php' => array( 'all' => ['editor'] ),
                            'bootstrap4-blog.php' => array( 'all' => ['editor'] ),
                            'bootstrap4-news.php' => array( 'all' => ['editor'] ),
                            // 'bootstrap4-sitemap.php' => array( 'all' => ['editor'] ),
                        ),
                    ),
                ));
                break;
        }

        /**
         * Markup Validation Service
         * 
         * @link https://validator.w3.org
         */
        new Starter_W3();
    }

}

new Starter();