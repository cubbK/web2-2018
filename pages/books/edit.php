<?
if(!$_SESSION["authorized"]) {
    include "pages/error/403.php";
    die();
}

$bookId = $_GET["bookId"];

if(count($_POST) > 0) {
    $bookTitle = $_POST["bookTitle"];
    $updateQuery = "
      UPDATE Book
SET title='{$bookTitle}'
WHERE id = $bookId;
    ";
    if(mysqli_query($APP['connections']['default'], $updateQuery)) {
        $message = 'Update success';
    }else{
        $message = 'Update error';
    }
}



$queryString = "
    SELECT Book.id, Author.name as authorName, Book.title as bookTitle FROM Book_Author
    INNER JOIN Author on Author.id = Book_Author.author_id
    INNER JOIN Book on Book.id = Book_Author.book_id
    WHERE Book.id = {$bookId}
";
$bookArray = dbSelect($queryString);
$bookGrouped = [];
foreach ($bookArray as $book) {
    if(!$bookGrouped["authors"]) {
        $bookGrouped["id"] = $book["id"];
        $bookGrouped["bookTitle"] = $book["bookTitle"];
        $bookGrouped["authors"] = [];
    }
    array_push($bookGrouped["authors"], $book["authorName"]);
}







?>
authorized

<form action="?module=books&action=edit&bookId=<?=$bookId?>" method="post">
    <div class="form-group">
        <label for="bookTitle">Book Title</label>
        <input type="text" class="form-control" id="bookTitle" value="<?=$bookGrouped["bookTitle"]?>" name="bookTitle">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
<?=$message?>