<?php

if (! function_exists('recursive_copy')) {
    /**
     * Copy directory content recursively
     *
     * @param string $src
     * @param string $dst
     */
    function recursive_copy(string $src, string $dst)
    {
        $dir = opendir($src);

        @mkdir($dst);

        while (false !== ($file = readdir($dir))) {
            if (($file != '.') && ($file != '..')) {
                if (is_dir($src . '/' . $file)) {
                    recursive_copy($src . '/' . $file, $dst . '/' . $file);
                } else {
                    copy($src . '/' . $file, $dst . '/' . $file);
                }
            }
        }

        closedir($dir);
    }
}
