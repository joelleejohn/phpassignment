<?php
$this->layout('default', ['title' => 'Employees']);	
?>

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
// Check if the employees have been loaded, if not load the employees into the session.
if (!isset($_SESSION["employees"])){
    $_SESSION["employees"] = json_decode(file_get_contents('data/employees-final.json'));
}
?>
<?php foreach($_SESSION["employees"] as $data): ?>
    <tr>
        <td><?=$data->firstname?></td>
        <td><?=$data->lastname?></td>
        <td><a href="/site/employee/<?=$data->id?>">View Details</a></td>
    </tr>
    

<?php endforeach; ?>
</tbody>
</table>