<?php
/**
 * 加载网站静态文件
 * @param $params
 *  ['resources_dir'] [静态文件的主路径，默认为 RES_DIR = '/public/static']
 *  ['imgServer'] [静态文件路径，在 resources_dir 下，默认为 /public/static 下的静态文件]
 *
 * @param Smarty_Internal_Template $template
 * @return string
 */
function smarty_function_IMPORT_RESOURCES($params, Smarty_Internal_Template $template) {
    $res_dir = RES_DIR;

    if(!empty($params['resources_dir'])) {
        $res_dir = $params['resources_dir'];
    }

    $res_path = $res_dir.$params['imgServer'].'?'.time();

    return $res_path;
}