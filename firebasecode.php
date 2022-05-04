<?php
include('firebasecon.php');
// print_r($_GET);
if(isset($_POST['light_off']))
{
    $light = $_POST['light'];
    $updateData = [
        'appliance'.$light => "1"
    ];
    $ref_table = "Appliances/";
    $updateData_ref = $database->getReference($ref_table)->update($updateData);
}
if(isset($_POST['light_on']))
{
    $light = $_POST['light'];
    $updateData = [
        'appliance'.$light => "0"
    ];
    $ref_table = "Appliances/";
    $updateData_ref = $database->getReference($ref_table)->update($updateData);
}
if(isset($_POST['light_all_on']))
{
    $light = $_POST['light'];
    $updateData = [
        'appliance1' => "0",
        'appliance2' => "0",
        'appliance3' => "0",
        'appliance4' => "0",
        'appliance5' => "0"
    ];
    $ref_table = "Appliances/";
    $updateData_ref = $database->getReference($ref_table)->update($updateData);
}
if(isset($_POST['light_all_off']))
{
    $light = $_POST['light'];
    $updateData = [
        'appliance1' => "1",
        'appliance2' => "1",
        'appliance3' => "1",
        'appliance4' => "1",
        'appliance5' => "1"
    ];
    $ref_table = "Appliances/";
    $updateData_ref = $database->getReference($ref_table)->update($updateData);
}
?>