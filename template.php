<?php
/**
 * shortnr - A PHP Simple URL shortener
 *
 * @package  shortnr
 * @version  1.0
 * @author   Marc Mascarell <marcmascarell@gmail.com>
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 */
?><!DOCTYPE html>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" href="static/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="static/css/style.css"/>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="static/js/jquery.slug.js"></script>
    <title>shortnr</title>
</head>
<body>

<img src="static/img/logo.png">

<form method="POST">

    <div>
        <?php
        if ($post) {
            print '<div class="notification">';
            if ($success) {
                print '<ul class="success">
                <li>Success!, you can now share your link!</li>
                <li><a href="'.$url_alias.'" target="_blank">'.$url_alias.'</a></li>
                </ul>';
            } else {
                print '<ul class="errors">';
                foreach ($errors as $error) {
                    print '<li>'.$error.'</li>';
                }
                print '</ul>';
            }
            print '</div>';
        }
        ?>
    </div>

    <label>Link</label>
    <input id="link" class="field" type="text" name="link" value="<?=$_POST['link']?>">

    <label>Alias <span id="autoslug">generate alias</span></label>
    <input class="alias field" type="text" name="alias" value="<?=$_POST['alias']?>">

    <input type="hidden" name="token" value="<?= $_SESSION['token']; ?>">

    <input class="submit" type="submit" value="CREATE">
</form>

<script type="text/javascript">
    $(document).ready(function(){
        $("#link").slug({
            slug:'alias', // class of input / span that contains the generated slug
            hide: false        // hide the text input, true by default
        });

        $("#autoslug").click(function(){
            $(".alias").val(autoslug('6'));
        });
    });

    function autoslug() {
        var letters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'.split('');
        var slug = '';
        for (var i = 0; i < 6; i++ ) {
            slug += letters[Math.round(Math.random() * 52)];
        }
        return slug;
    }
</script>

</body>
</html>
