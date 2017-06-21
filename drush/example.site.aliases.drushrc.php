<?php

/**
 * @file
 * Drush environment aliases drush/sites.aliases.drushrc.php
 */

if (!isset($drush_major_version)) {
  $drush_version_components = explode('.', DRUSH_VERSION);
  $drush_major_version = $drush_version_components[0];
}

// VDD.
$aliases['vdd'] = array(
  'env' => 'vdd',
  'uri' => 'PROJECT.dev',
  'root' => '/var/www/vhosts/PROJECT.dev/docroot',
  'path-aliases' => array(
    '%drush-script' => '/var/www/vhosts/PROJECT.dev/vendor/bin/drush',
  ),
);

if (!file_exists('/var/www/vhosts/PROJECT.dev/docroot')) {
  $aliases['vdd']['remote-host'] = 'dev.local';
  $aliases['vdd']['remote-user'] = 'vagrant';
}

$aliases['docker'] = array(
  'env' => 'docker',
  'uri' => 'localhost',
  'root' => '/var/www/html/docroot',
  'path-aliases' => array(
    '%drush-script' => '/var/www/html/vendor/bin/drush',
  ),
);

if (!file_exists('/var/www/html')) {
  // You will need to add an entry to your hosts file as follows:
  // 127.0.0.1 docker.local
  $alias['docker']['remote-host'] = 'docker.local';
  $alias['docker']['remote-user'] = 'www-data';
  $alias['docker']['ssh-options'] = '-p 2223';
}