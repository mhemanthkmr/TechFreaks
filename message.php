<?php 
// session_start();

if(isset($_SESSION['flag']))
{
    if($_SESSION['flag'] == 1)
    {
            if(isset($_SESSION['message']))
            { ?>
            <div class="alert alert-success alert-dismissible fade show border-0" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button><div class="text-center">
					<?=$_SESSION['message'];?>
				</div>
			</div>
        <?php
            unset($_SESSION['message']);
            }
    }
    if($_SESSION['flag'] == 2)
    {
            if(isset($_SESSION['message']))
            { ?>
            <div class="alert alert-danger alert-dismissible fade show border-0" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button><div class="text-center">
					<?=$_SESSION['message'];?>
				</div>
			</div>
        <?php
            unset($_SESSION['message']);
            }
    }
}



?>