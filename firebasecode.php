<?php
include('firebasecon.php');
if(isset($_POST['light_off']))
{
    $light = $_POST['light'];
    $updateData = [
        'appliance'.$light => "0"
    ];
    $ref_table = "Appliances/";
    $updateData_ref = $database->getReference($ref_table)->update($updateData);
}
if(isset($_POST['light_on']))
{
    $light = $_POST['light'];
    $updateData = [
        'appliance'.$light => "1"
    ];
    $ref_table = "Appliances/";
    $updateData_ref = $database->getReference($ref_table)->update($updateData);
}
?>