<?php
$queryString = "
    SELECT Author.name as authorName, Book.title as bookTitle FROM Book_Author
INNER JOIN Author on Author.id = Book_Author.author_id
INNER JOIN Book on Book.id = Book_Author.book_id
";
$books = dbSelect($queryString);
$booksGrouped = [];

// Best spaghetti in the town!

foreach ($books as $book) {
    $bookTitle = $book["bookTitle"];
    if(!$booksGrouped[ $bookTitle]) {
        $booksGrouped[ $bookTitle] = [];
    }
    array_push($booksGrouped[$bookTitle], $book["authorName"]);
}

//var_dump($booksGrouped);

    function getAuthorsString ($authors) {
        $authorsString = array_reduce($authors, function($carry, $item) {
            return $item . ", " . $carry ;
        });
        return $authorsString;
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
            $authorsString = getAuthorsString($book);
            ?>
            <tr>
                <td><?=$key;?></td>
                <td><?=$authorsString;?></td>
            </tr>
        <? }?>
        </tbody>
    </table>
<? }else{?>
    <strong>No records</strong>
<? }?>
