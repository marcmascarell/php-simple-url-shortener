<?php if ( !defined('DS')) { print 'No direct scripts allowed'; }
/**
 * shortnr - A PHP Simple URL shortener
 *
 * @package  shortnr
 * @version  1.0
 * @author   Marc Mascarell <marcmascarell@gmail.com>
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 */

ini_set('display_errors', 0);
header('Content-Type: text/html; charset=UTF-8');

define('DB_TYPE',       'mysql');
define('DB_SERVER',     'localhost');
define('DB_NAME',       'mydatabase');
define('DB_TABLE',      'links');
define('DB_USERNAME',   'user');
define('DB_PASSWORD',   'password');

// Put a random string to generate csrf token
define('SALT', 'pS12-!se42Oy2v3$!.d2$45_');

$reserved_urls = array('index', 'home');