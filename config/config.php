<?php
/**
 * Pico Configuration
 *
 *  This is the configuration file for Pico. It comes loaded with the
 *  default values, which can be found in the get_config() method of
 *  the Pico class (lib/pico.php).
 *
 * @author Gilbert Pellegrom
 * @link http://picocms.org
 * @license http://opensource.org/licenses/MIT
 * @version 0.9
 */

/*
 * BASIC
 */
$config['site_title'] = 'Tinman Electronics';
//$config['base_url'] = '';      // Override base URL (e.g. http://example.com)
//$config['rewrite_url'] = null; // A boolean indicating forced URL rewriting

/*
 * THEME
 */
$config['theme'] = 'tinman';      // Set the theme (defaults to "default")
//$config['twig_config'] = array( // Twig settings
//'cache' => false,	              // To enable Twig caching change this to CACHE_DIR
//'autoescape' => false,          // Autoescape Twig vars
//'debug' => false                // Enable Twig debug
//);

/*
 * CONTENT
 */
$config['date_format'] = '%F';       // Set the PHP date format
$config['pages_order_by'] = 'date';  // Order pages by "alpha" or "date"
$config['pages_order'] = 'desc';     // Order pages "asc" or "desc"
$config['excerpt_length'] = 50;
$config['content_dir'] = 'content/';
$config['content_ext'] = '.md';

/*
 * TIMEZONE
 */
// date_default_timezone_set('UTC'); // Timezone may be reqired by your php install

/*
 * CUSTOM
 */
//$config['pages_order_by'] = 'placing'; // Defines placing order for navigation

return $config;
