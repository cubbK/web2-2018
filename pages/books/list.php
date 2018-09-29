<?php
$queryString = "
    SELECT Book.id, Author.name as authorName, Book.title as bookTitle FROM Book_Author
INNER JOIN Author on Author.id = Book_Author.author_id
INNER JOIN Book on Book.id = Book_Author.book_id
";
$books = dbSelect($queryString);
$booksGrouped = [];

// Best spaghetti in the town!

foreach ($books as $book) {
    $bookId = $book["id"];
    if(!$booksGrouped[$bookId]) {
        $booksGrouped[$bookId]["title"] = $book["bookTitle"];
        $booksGrouped[$bookId]["authors"] = [];
    }
    array_push($booksGrouped[$bookId]["authors"], $book["authorName"]);
}

?>


<? if(count($books)){?>
    <table class="table">
        <thead>
        <tr>
            <th>Title</th>
            <th>Authors</th>
        </tr>
        </thead>
        <tbody>
        <? foreach ($booksGrouped as $key => $book) {
            $id = $key;
            $title = $book["title"];
            $authorsString = getAuthorsString($book["authors"]);
            ?>
            <tr>
                <td><?=$title;?></td>
                <td><?=$authorsString;?></td>
                <? if($_SESSION["authorized"]) { ?>
                <td><a href="?module=books&action=edit&bookId=<?=$id?>">Edit</a></td>
                <?}?>
            </tr>
        <? }?>
        </tbody>
    </table>
<? }else{?>
    <strong>No records</strong>
<? }?>
