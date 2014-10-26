<?php

/* ==========================  L O C A L  ========================= */
$aliases['local'] = array(
  'env' => 'local',
  'root' => '/Users/bleen/Sites/dianemichellecakes.com/docroot',
  '%dump-dir' => '/tmp/php',
);


/* ===========================  P R O D  ========================== */
$aliases['prod'] = array(
  'env' => 'prod',
  'root' => '/home/fehder/sites/dianemichellecakes.com/docroot',
  'path-aliases' => array(
    '%dump-dir' => '/tmp',
  ),
  'remote-host' => 'dianemichellecakes.com',
  'remote-user' => 'fehder',
);
