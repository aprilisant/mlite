<?php

return [
    'name'          =>  'Laboratorium',
    'description'   =>  'Modul Laboratorium untuk mLITE',
    'author'        =>  'Basoro',
    'category'      =>  'layanan', 
    'version'       =>  '1.0',
    'compatibility' =>  '5.*.*',
    'icon'          =>  'flask',
    'install'       =>  function () use ($core) {
        if (!is_dir(UPLOADS."/laboratorium")) {
            mkdir(UPLOADS."/laboratorium", 0777);
        }
    },
    'uninstall'     =>  function() use($core)
    {
    }
];
