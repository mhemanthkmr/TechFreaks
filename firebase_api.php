<?php 
include('firebasecon.php');

if($_SERVER['PATH_INFO'] == '/1/on')
{
    $light = 1;
    $updateData = [
        'appliance'.$light => "0"
    ];
    $ref_table = "Appliances/";
    $updateData_ref = $database->getReference($ref_table)->update($updateData);
    // echo "Updated SuccessFully";
}
if(isset($_GET['light_off_get']))
{
    $light = $_GET['light'];
    $updateData = [
        'appliance'.$light => "1"
    ];
    $ref_table = "Appliances/";
    $updateData_ref = $database->getReference($ref_table)->update($updateData);
    echo "Updated SuccessFully";
}