
<div class="login_container">
    <div class="row" style="height:200px; width:100%">
            <div class="col-xs-1 col-sm-2 col-md-2 col-xs-offset-9 col-sm-offset-8 col-md-offset-8">
                Zalogowano jako:<center><?php echo $_SESSION["nick"]; ?></center> 
            </div>
        
            <div class="col-xs-1 col-sm-1 col-md-1" style="padding:0px; width:200px !important;"><center>
                <form action="main.php" method="post">
                    <input type="submit" name="logout" value="Wyloguj się" class="btn logout_btn"/>
                </form>
            </center></div>
    </div>
</div>







<?php

    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['logout']))
    {
        func();
    }
    function func()
    {
        session_start();
        session_destroy();
        header( 'Location: index.php?page=login');
        exit;    
    }
?>