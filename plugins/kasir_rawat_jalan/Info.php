<?php

return [
    'name'          =>  'Kasir Rawat Jalan',
    'description'   =>  'Modul kasir rawat jalan untuk mLITE',
    'author'        =>  'Basoro',
    'category'      =>  'keuangan', 
    'version'       =>  '1.0',
    'compatibility' =>  '5.*.*',
    'icon'          =>  'money',
    'install'       =>  function () use ($core) {
      if (!is_dir(UPLOADS."/invoices")) {
          mkdir(UPLOADS."/invoices", 0777);
      }
    },
    'uninstall'     =>  function() use($core)
    {
    }
];
