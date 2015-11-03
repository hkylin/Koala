<?php

require './includes/gestbook/setup.php';

$smarty = new Smarty_Setup();

$smarty->assign('name','Ned');

$smarty->display('index.tpl');