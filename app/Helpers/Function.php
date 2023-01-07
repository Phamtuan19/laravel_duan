<?php

function uploadFile($upload_path = null, $files = [])
{
    $image = [];
    if (is_array($files) && !empty($files)) {

        foreach ($files as $key => $file) {
            $ext = strtolower($file->getClientOriginalExtension()); // lấy đôi của file
            $image_name = md5(rand(1000, 10000));
            $image_full_name = $image_name . '.' . $ext;
            $file->move($upload_path, $image_full_name);

            $img_url = $upload_path . $image_full_name;
            $image[$key] = $img_url;
        }

        return $image;
    }
}

function deleteFilePublic($files = [])
{
    foreach ($files as $key => $file) {
        if (file_exists($file)) {
            unlink($file);
        }
        unset($files[$key]);
    }
    return $files;
}