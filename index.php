<?
session_start();
require_once 'admin/config.php';
require_once 'admin/functions.php';
dbConnect();
?>

<?


if (!empty($_POST['username']) && !empty($_POST['password'])) {
    $_SESSION['authorized'] = (
        $_POST['username'] === $APP['admin_panel_access']['username']
        &&
        $_POST['password'] === $APP['admin_panel_access']['password']
    );
}
if ($_GET['module'] === 'auth' && $_GET['action'] === 'logout') {
    unset($_SESSION);
}

?>

<!doctype html>
<html>
<head>
    <title></title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
<?
include 'pages/blocks/menu.php';
?>
<hr>
<?

$module = $_GET['module'] ?: 'default';
$action = $_GET['action'] ?: 'home';

if (file_exists("pages/{$module}/{$action}.php"))
    include "pages/{$module}/{$action}.php";
else
    include "pages/error/404.php";
?>
</body>
</html>