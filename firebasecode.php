<?php

if(isset($_POST['light_off']))
{
    $updateData = [
        'appliance1' => 0,
        'appliance2' => 0,
        'appliance3' => 0,
        'appliance4' => 0
    ];
    $ref_table = "Appliances/";
    $updateData_ref = $database->getReference($ref_table)->update($updateData);

    if($updateData_ref)
    {
        $_SESSION['flag'] = 1;
        $_SESSION['status'] = "Contact Updated Successfully";
        header("Location: index.php");
        exit(0);
    }
    else 
    {
        $_SESSION['flag'] = 0;
        $_SESSION['status'] = "Contact not Updated ";
        header("Location: index.php");
        exit(0);
    }
}
?>