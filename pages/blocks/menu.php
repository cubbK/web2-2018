<a href="?module=books&action=list">List of Books</a>
<? if(!$_SESSION['authorized']) { ?>
<a href="?module=auth&action=login">Login</a>
<?} else { ?>
<a href="?module=auth&action=logout">Logout</a>
<?}?>
