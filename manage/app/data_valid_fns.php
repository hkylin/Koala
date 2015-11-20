<?php
/**
 * 检查表单是否填写完整
 * @param $form_vars [$_POST 数组]
 * @return bool
 */
function filled_out($form_vars) {
    foreach($form_vars as $key => $value) {
        if(!isset($key) || (trim($value) == '')) {
            return false;
        }
    }
    return true;
}
