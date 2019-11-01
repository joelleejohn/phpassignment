<?php $this->layout('default', ['title' => 'A title yo']);	?>

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

foreach($jsonData as $data){

    echo '<tr>';
    $firstnameD = $data->firstname;
    $lastnameD = $data->lastname;
    $idD = $data->id;

    echo '<td>'.$firstnameD.'</td>';
    echo '<td>'.$lastnameD.'</td>';
    echo '<td><a href="/phpassignment/employee/'.$idD.'">View</a></td>';
    echo '</tr>';
}
?>
    </tbody>
</table>