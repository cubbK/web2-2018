<?php
if(!empty($_GET['delete'])){
    $queryString = "DELETE FROM students WHERE id = {$_GET['id']}";
    if(mysqli_query($APP['connections']['default'], $queryString)) {
        $message = 'Delete success';
    }else{
        $message = 'Delete error';
    }
}
?>
<?php

$students = dbSelect("
    SELECT
        students.id,
        CONCAT(first_name, ' ', last_name) AS student_name,
        groups.name AS group_name
    FROM
        students
        JOIN groups ON groups.id = students.group_id
");
?>


<strong><?=$message;?></strong>

<? if(count($students)){?>
<table border="1">
    <thead>
        <tr>
            <th>Name</th>
            <th>Group</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <? foreach ($students as $student) {?>
        <tr>
            <td><?=$student['student_name'];?></td>
            <td><?=$student['group_name'];?></td>
            <td>
                <a href="?module=students&action=list&delete=1&id=<?=$student['id'];?>" onclick="return confirm('Delete this record?')">X</a>
                <a href="?module=students&action=update&id=<?=$student['id'];?>">U</a>
            </td>
        </tr>
        <? }?>
    </tbody>
</table>
<? }else{?>
    <strong>No records</strong>
<? }?>
