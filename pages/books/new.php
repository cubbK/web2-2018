<?
if(!$_SESSION["authorized"]) {
    include "pages/error/403.php";
    die();
}
if(count($_POST) > 0) {
    $bookTitle = $_POST["bookTitle"];
    $queryString = "INSERT INTO Book (title)
    VALUES ('{$bookTitle}')";

    if(mysqli_query($APP['connections']['default'], $queryString)) {
        $message = 'Update success';
    }else{
        $message = 'Update error';
    }
}
?>

<form action="?module=books&action=new" method="post">
    <div class="form-group">
        <label for="bookTitle">Book Title</label>
        <input type="text" class="form-control" id="bookTitle" value="" name="bookTitle">
    </div>
</form>
<?=$message?>
