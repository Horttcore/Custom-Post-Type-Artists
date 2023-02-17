<?php
/**
 * Plugin Name: Custom Post Type Artists
 * Plugin URI: https://ralfhortt.dev
 * Description: Manage artists
 * Version: 0.1
 * Author: Ralf Hortt
 * Author URI: https://ralfhortt.dev““”¡„„
 * Text Domain: custom-post-type-artists
 * Domain Path: /languages/
 * License: GPL2
 */
namespace RalfHortt\CustomPostTypeArtists;

use RalfHortt\Plugin\PluginFactory;
use RalfHortt\CustomPostTypeArtists\Artists;
use RalfHortt\TranslatorService\Translator;

// ------------------------------------------------------------------------------
// Prevent direct file access
// ------------------------------------------------------------------------------
if (!defined('WPINC')) :
    die;
endif;

// ------------------------------------------------------------------------------
// Autoloader
// ------------------------------------------------------------------------------
$autoloader = dirname(__FILE__).'/vendor/autoload.php';

if (is_readable($autoloader)) :
    require_once $autoloader;
endif;

// ------------------------------------------------------------------------------
// Bootstrap
// ------------------------------------------------------------------------------
PluginFactory::create()
    ->addService(Translator::class, 'custom-post-type-artists', dirname(plugin_basename(__FILE__)).'/languages/')
    ->addService(Artists::class)
    ->boot();
