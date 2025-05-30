<?php

return [
    'name'          =>  'Manajemen',
    'description'   =>  'Modul manajemen untuk mLITE',
    'author'        =>  'Basoro',
    'category'      =>  'manajemen', 
    'version'       =>  '1.0',
    'compatibility' =>  '5.*.*',
    'icon'          =>  'dashboard',
    'install'       =>  function () use ($core) {
      $core->db()->pdo()->exec("INSERT INTO `mlite_settings` (`module`, `field`, `value`) VALUES ('manajemen', 'penjab_umum', 'UMU')");
      $core->db()->pdo()->exec("INSERT INTO `mlite_settings` (`module`, `field`, `value`) VALUES ('manajemen', 'penjab_bpjs', 'BPJ')");
    },
    'uninstall'     =>  function() use($core)
    {
      $core->db()->pdo()->exec("DELETE FROM `mlite_settings` WHERE `module` = 'manajemen'");
    }
];
