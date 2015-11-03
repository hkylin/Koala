<?php
// load Smarty const
require($_SERVER['DOCUMENT_ROOT'] . '/includes/gestbook/smarty_const.php');
// load Smarty library
require($_SERVER['DOCUMENT_ROOT'] . '/includes/gestbook/libs/Smarty.class.php');

// The setup.php file is a good place to load
// required application library files, and you
// can do that right here. An example:
// require('guestbook/guestbook.lib.php');

class Smarty_Setup extends Smarty {

    function __construct(){

        // Class Constructor.
        // These automatically get set with each new instance.
        parent::__construct();

        $this->setTemplateDir(TPL_DIR);
        $this->setCompileDir(TPL_C);

        // $this->caching = Smarty::CACHING_LIFETIME_CURRENT;
        $this->caching = 0;
        $this->assign('app_name', '树袋熊');
        $this->assign('res_dir', RES_DIR);
    }

}
