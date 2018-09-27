<?php
$queryString = "
    SELECT * FROM Book
";
$books = dbSelect($queryString);
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
        <? foreach ($books as $book) {?>
            <tr>
                <td><?=$book['title'];?></td>
                <td><?=$book['authors'];?></td>
            </tr>
        <? }?>
        </tbody>
    </table>
<? }else{?>
    <strong>No records</strong>
<? }?>
