<?php
/**
 * shortnr - A PHP Simple URL shortener
 *
 * @package  shortnr
 * @version  1.0
 * @author   Marc Mascarell <marcmascarell@gmail.com>
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 */

// --------------------------------------------------------------
// The path to the lib directory.
// --------------------------------------------------------------
$paths['lib'] = 'lib';

// --------------------------------------------------------------
// The path to the static directory.
// --------------------------------------------------------------
$paths['static'] = 'static';

// --------------------------------------------------------------
// The path to the img directory.
// --------------------------------------------------------------
$paths['img'] = 'static/img';

// --------------------------------------------------------------
// The path to the js directory.
// --------------------------------------------------------------
$paths['js'] = 'static/js';

// --------------------------------------------------------------
// The path to the css directory.
// --------------------------------------------------------------
$paths['css'] = 'static/css';


// --------------------------------------------------------------
// The path to the path_root directory.
// --------------------------------------------------------------
$paths['root'] = __DIR__;

// --------------------------------------------------------------
// Define the directory separator for the environment.
// --------------------------------------------------------------
if ( ! defined('DS'))
{
    define('DS', DIRECTORY_SEPARATOR);
}

require_once $paths['lib']. DS .'logic.php';