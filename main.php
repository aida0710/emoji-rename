<?php

const FOLDER_PATH = "./emoji";

function get_svg_files($folder_path) : array {
    if (!is_dir($folder_path)) {
        return array();
    }
    $files = scandir($folder_path);
    $svg_files = array_filter($files, function($file) {
        return in_array(pathinfo($file, PATHINFO_EXTENSION), ["svg", "png"]);
    });
    return array_map(function($file) use ($folder_path) {
        return $folder_path . "/" . $file;
    }, $svg_files);
}

function rename_svg_to_emoji($svg_file) : void {
    if (!file_exists($svg_file)) {
        return;
    }
    $file_name = pathinfo($svg_file, PATHINFO_FILENAME);
    if (preg_match("/^([0-9a-f]{4,5})(-([0-9a-f]{4,5}))*$/i", $file_name, $matches)) {
        $codes = explode("-", $file_name);
        $emoji = "";
        foreach ($codes as $code) {
            $emoji .= mb_convert_encoding("&#".hexdec($code).";", "UTF-8", "HTML-ENTITIES");
        }
        $file_path = pathinfo($svg_file, PATHINFO_DIRNAME);
        $file_ext = pathinfo($svg_file, PATHINFO_EXTENSION);
        $new_file_name = $emoji . "." . $file_ext;
        $new_file_path = $file_path . "/" . $new_file_name;

        rename($svg_file, $new_file_path);
    }
}

$svg_files = get_svg_files(FOLDER_PATH);
var_dump($svg_files);

foreach ($svg_files as $svg_file) {
    rename_svg_to_emoji($svg_file);
}