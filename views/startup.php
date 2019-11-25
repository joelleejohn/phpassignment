<?php session_start(); $this->layout('default', ['title' => 'A title yo']);	?>

<table id="tbl" class="display">
    <thead>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Link</th>
        </tr>
    </thead>
    <tbody>
<?php
$jsonData = json_decode(file_get_contents('data/employees-final.json'));
$_SESSION["employees"] = $jsonData;
?>
<?php foreach($jsonData as $data): ?>
    <tr>
        <td><?=$data->firstname?></td>
        <td><?=$data->lastname?></td>
        <td><a href="/site/employee/<?=$data->id?>">View</a></td>
    </tr>
    

<?php endforeach; ?>
</tbody>
</table>