<?php if ( !defined('DS')) { print 'No direct scripts allowed'; }
/**
 * shortnr - A PHP Simple URL shortener
 *
 * @package  shortnr
 * @version  1.0
 * @author   Marc Mascarell <marcmascarell@gmail.com>
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 */

require_once 'config.php';

function show_404()
{
    header('HTTP/1.0 404 Not Found');
    header('Status: 404 Not Found');
    print '<h1>Page not found</h1>';
    exit();
}

session_start();
$view = end(explode('/', $_SERVER['PHP_SELF']));
$post = false;

if ($view != '' && !in_array($view, $reserved_urls)) {

    require_once 'medoo.php';
    $database = new medoo(DB_NAME);
    $count = $database->count(DB_TABLE, array('alias' => $view));

    if ($count == 1) {
        $database->update(DB_TABLE, array("clicks[+]" => 1), array('alias' => $view));
        $link = $database->get(DB_TABLE, array('link'), array('alias' => $view));
        header('Location: '. $link['link'] . '');
        exit;
    } else {
        show_404();
    }
}

if (isset($_POST['alias'])) {

    $post = true;
    $errors = array();
    $success = false;

    $url_alias = 'http://' . $_SERVER[HTTP_HOST] . $_SERVER[REQUEST_URI] . $_POST['alias'];

    if (!filter_var($url_alias, FILTER_VALIDATE_URL)) {
        $errors[] = 'Sorry, alias <b>"'. $_POST['alias'] . '"</b> is not valid.';
    }

    if (!filter_var($_POST['link'], FILTER_VALIDATE_URL)) {
        $errors[] = 'Sorry, link <b>"'. $_POST['link'] . '"</b> is not valid.';
    }

    if ($_POST['token'] != $_SESSION['token']) {
        $errors[] = 'Sorry, there was a problem!';
    }

    require_once 'medoo.php';
    $database = new medoo(DB_NAME);
    $count = $database->count(DB_TABLE, array('alias' => $_POST['alias']));

    if ($count == 1) {
        $errors[] = 'Sorry, alias <b>"'. $_POST['alias'] . '"</b> is already taken.';
    } else {
        try {
            $database->insert(DB_TABLE, array(
                "alias" => $_POST['alias'],
                "link" => $_POST['link'],
                "clicks" => 0,
            ));
        } catch (Exception $e) {
            print_r($e);
            $errors[] = 'Sorry, there was a problem!';
        }

        if (count($errors) == 0) {
            $success = true;
            unset($_POST);
        }
    }
}

// Generate new token
$_SESSION['token'] = substr(md5(uniqid(rand(), true)) . md5(SALT), 0, 32);

require_once $paths['root']. DS .'template.php';