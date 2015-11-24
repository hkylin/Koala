<?php
/**
 * Class img_url_handle
 * 这个类集成了所有图片处理相关的方法
 */
class img_url_handle {
    /**
     * 处理图片 url 字符串, [增加图片参数 `_200_100`/加密图片文件名]
     * @param $url [图片地址]
     * @param $add_str [需要添加的后缀  ex. $add_str = '100_100'  http://www.example.com/a.jpg => http://www.example.com/a_100_100.jpg]
     * @param $encrypt [是否加密文件名]
     * @return string
     */
    public function add_img_prams($url, $add_str, $encrypt = false) {
        $pattern = '/.(jpg|jpeg|gif|png)/i';
        preg_match_all($pattern, $url, $matches);
        $suffix = end($matches[0]);

        $pos = strpos($url, $suffix);

        $path_url = substr($url, 0, $pos); // 图片[完整]路径
        $filename = end(explode('/', $path_url)); // 图片文件名
        $path = str_replace($filename, '', $path_url); // 图片父路径
        // 加密文件名
        $sup = $encrypt ? md5($filename) : $filename;

        $url = $path . $sup . $add_str . $suffix; // 拼接图片加密后的路径
        return $url;
    }


    /**
     * 处理掉图片路径带有的 _200_200 这种参数
     * @param $url [需要处理的 url]
     * @return string [返回去掉 _200_300 这种参数的 url]
     */
    function remove_img_prams($url) {
        $pattern = '/((_[0-9]+){2})(_(g|t|b|c|))?.(jpg|jpeg|gif|png|JPG|PNG|GIF|JPEG)/';
        preg_match_all($pattern, $url, $matches);
        $prams = end($matches[0]);
        $mime = '.' . end($matches)[0];

        $url = str_replace($prams, '', $url).$mime;

        return $url;
    }


    /**
     * 裁剪图片
     * @param $source_path [图片源]
     * @param $target_width [图片裁剪宽度]
     * @param $target_height [图片裁剪高度]
     * @param $dest_dir [图片输出路径]
     * @return bool
     */
    public function imagecropper($source_path, $target_width, $target_height, $dest_dir = '')
    {
        $source_info = getimagesize($source_path);
        $source_width = $source_info[0];
        $source_height = $source_info[1];
        $source_mime = $source_info['mime'];
        $source_ratio = $source_height / $source_width;
        if (empty($target_width)) {
            $target_width = $source_width;
        }
        if (empty($target_height)) {
            $target_height = $source_height;
        }
        $target_ratio = $target_height / $target_width;

        // 源图过高
        if ($source_ratio > $target_ratio) {
            $cropped_width = $source_width;
            $cropped_height = $source_width * $target_ratio;
            $source_x = 0;
            $source_y = ($source_height - $cropped_height) / 2;
        } // 源图过宽
        elseif ($source_ratio < $target_ratio) {
            $cropped_width = $source_height / $target_ratio;
            $cropped_height = $source_height;
            $source_x = ($source_width - $cropped_width) / 2;
            $source_y = 0;
        } // 源图适中
        else {
            $cropped_width = $source_width;
            $cropped_height = $source_height;
            $source_x = 0;
            $source_y = 0;
        }

        switch ($source_mime) {
            case 'image/gif':
                $source_image = imagecreatefromgif($source_path);
                break;

            case 'image/jpeg':
                $source_image = imagecreatefromjpeg($source_path);
                break;

            case 'image/png':
                $source_image = imagecreatefrompng($source_path);
                break;

            default:
                return false;
                break;
        }

        imagesavealpha($source_image,true); //这里很重要,意思是不要丢了 $source_image 图像的透明色;

        $target_image = imagecreatetruecolor($target_width, $target_height);
        imagealphablending($target_image,false); //这里很重要,意思是不合并颜色,直接用$img图像颜色替换,包括透明色;
        imagesavealpha($target_image,true); //这里很重要,意思是不要丢了 $target_image 图像的透明色;

        $cropped_image = imagecreatetruecolor($cropped_width, $cropped_height);
        imagealphablending($cropped_image,false); //这里很重要,意思是不合并颜色,直接用$img图像颜色替换,包括透明色;
        imagesavealpha($cropped_image,true); //这里很重要,意思是不要丢了 $cropped_image 图像的透明色;

        // 裁剪
        imagecopy($cropped_image, $source_image, 0, 0, $source_x, $source_y, $cropped_width, $cropped_height);
        // 缩放
        imagecopyresampled($target_image, $cropped_image, 0, 0, 0, 0, $target_width, $target_height, $cropped_width, $cropped_height);


        switch ($source_mime) {
            case 'image/gif':
                $dest_dir ? imagegif($target_image, $dest_dir) : imagegif($target_image);
                break;

            case 'image/jpeg':
                $dest_dir ? imagejpeg($target_image, $dest_dir) : imagejpeg($target_image);
                break;

            case 'image/png':
                $dest_dir ? imagepng($target_image, $dest_dir) : imagepng($target_image);
                break;

            default:
                return false;
                break;
        }
        // 如果有路径,输出到路径内,如果没有则直接显示
        // $dest_dir ? imagejpeg($target_image, $dest_dir) : imagejpeg($target_image);

        imagedestroy($source_image);
        imagedestroy($target_image);
        imagedestroy($cropped_image);

        return true;
    }


    /**
     * 图片文件上传
     * @param $file_name [上传文件的 name, 即 `<input type="file" name="avatar"/>` 中的 `avatar`]
     * @param string $type [上传的类型, 分为 `media` 和 `avatar`]
     * @return string [返回文件上传成功后的路径]
     */
    public function media_upload($file_name, $type = 'media')
    {
        $user_id = get_user_id($_SESSION['valid_user']);
        $json = null;
        $size = $type === 'media' ? '5000000' : '3000000';
        // 没有上传文件 或者上传文件格式不对 或者大小超过 3M
        if (empty($_FILES[$file_name]['name'])
            || (($_FILES[$file_name]["type"] != "image/gif")
                && ($_FILES[$file_name]["type"] != "image/jpeg")
                && ($_FILES[$file_name]["type"] != "image/png"))
            || ($_FILES[$file_name]["size"] > $size)
        ) {
            $json = array('data' => array(
                'msg' => '文件上传出错',
                'code' => 0,
                'error' => error_get_last()
            ));
            echo json_encode($json);
            exit;
        }

        $upload_dir = DOMROOT . '/public/upload/';

        if (!file_exists($upload_dir)) {
            if (!mkdir($upload_dir)) {
                $json = array('data' => array(
                    'msg' => '无法建立上传文件夹',
                    'code' => 0
                ));
                echo json_encode($json);
                exit;
            }
        }
        // 建立此用户文件夹
        if (!file_exists($upload_dir . $user_id)) {
            if (!mkdir($upload_dir . $user_id)) {
                $json = array('data' => array(
                    'msg' => '无法建立上传文件夹',
                    'code' => 0
                ));
                echo json_encode($json);
                exit;
            }
        }
        // 建立用户头像文件夹
        if (!file_exists($upload_dir . $user_id . '/' . $type)) {
            if (!mkdir($upload_dir . $user_id . '/' . $type)) {
                $json = array('data' => array(
                    'msg' => '无法建立上传文件夹',
                    'code' => 0
                ));
                echo json_encode($json);
                exit;
            }
        }

        // 重命名文件
        $_FILES[$file_name]['name'] = img_url_handle::add_img_prams($_FILES[$file_name]['name'], '', true);
        $media = basename($_FILES[$file_name]['name']);
        $dest_dir = $upload_dir . $user_id . '/' . $type . '/' . $media;

        // 储存文件
        if (!@move_uploaded_file($_FILES[$file_name]['tmp_name'], $dest_dir)) {
            $json = array('data' => array(
                'msg' => '上传失败',
                'code' => 0
            ));
            echo json_encode($json);
            exit;
        }

        // 头像文件需要处理一下
        if ($type === 'avatar') {
            $media = img_url_handle::add_img_prams($media, '_200_200', false);
        }

        // 媒体文件储存地址
        $media_addr = '/public/upload/' . $user_id . '/' . $type . '/' . $media;

        return $media_addr;
    }

}