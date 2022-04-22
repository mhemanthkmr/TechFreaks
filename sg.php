<?php

include('firebasecon.php');

$updateData = [
        'appliance1' => "1",
        'appliance2' => "1",
        'appliance3' => "1",
        'appliance4' => "1"
    ];
    $ref_table = "Appliances/";
    $updateData_ref = $database->getReference($ref_table)->update($updateData);

?>