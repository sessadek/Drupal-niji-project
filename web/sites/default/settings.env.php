<?php

// phpcs:ignoreFile

/**
 * @file
 * Settings.
 */

use Drupal\Core\Installer\InstallerKernel;

$settings['extension_discovery_scan_tests'] = TRUE;
$settings['file_chmod_directory'] = 0775;
$settings['file_chmod_file'] = 0664;
$settings['hash_salt'] = getenv('APP_HASH_SALT');

// Redis cache.
if (!InstallerKernel::installationAttempted() && extension_loaded('redis')) {
  $settings['container_yamls'][] = 'modules/contrib/redis/redis.services.yml';

  $settings['redis.connection']['interface'] = 'PhpRedis';
  $settings['redis.connection']['host'] = getenv('REDIS_HOST');
  $settings['cache_prefix'] = '_';
  $settings['cache']['default'] = 'cache.backend.redis';

  $settings['cache']['bins']['bootstrap'] = 'cache.backend.chainedfast';
  $settings['cache']['bins']['discovery'] = 'cache.backend.chainedfast';
  $settings['cache']['bins']['config'] = 'cache.backend.chainedfast';
}

// Databases.
$databases['default']['default'] = [
  'driver' => 'mysql',
  'database' => getenv('DB_NAME'),
  'username' => getenv('DB_USER'),
  'password' => getenv('DB_PASSWORD'),
  'host' => getenv('DB_HOST'),
  'port' => 3306,
  'prefix' => '',
  'collation' => 'utf8mb4_general_ci',
  'namespace' => 'Drupal\\Core\\Database\\Driver\\mysql',
  'init_commands' => [
    'isolation_level' => 'SET SESSION TRANSACTION ISOLATION LEVEL READ COMMITTED',
  ],
];

$config['system.performance']['cache']['page']['use_internal'] = FALSE;
$config['system.performance']['css']['preprocess'] = TRUE;
$config['system.performance']['css']['gzip'] = TRUE;
$config['system.performance']['js']['preprocess'] = TRUE;
$config['system.performance']['js']['gzip'] = TRUE;
$config['system.performance']['response']['gzip'] = TRUE;
$config['views.settings']['ui']['show']['sql_query']['enabled'] = FALSE;
$config['views.settings']['ui']['show']['performance_statistics'] = FALSE;
$config['system.logging']['error_level'] = 'none';
$config['system.performance']['cache.page.max_age'] = 31536000;


$settings['trusted_host_patterns'] = [
  '^.*' . getenv('APP_DOMAIN') . '$',
];

// Config directories.
$settings["config_sync_directory"] = getcwd() . '/../config/';

$config['config_split.config_split.config_dev']['status'] = FALSE;

$settings['reverse_proxy'] = TRUE;
$settings['reverse_proxy_addresses'] = [$_SERVER['REMOTE_ADDR']];

// Config vite assets loading @see https://git.drupalcode.org/project/vite.
$settings['vite'] = [
  'useDevServer' => FALSE,
  'overrides' => [
    'default' => [
      'enabled' => TRUE,
      'baseUrl' => '/themes/custom/default/dist/',
    ],
  ],
];
