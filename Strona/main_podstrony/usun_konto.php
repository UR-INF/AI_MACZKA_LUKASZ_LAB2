<?php
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "pokemony";

$conn = mysqli_connect ($host, $dbusername, $dbpassword, $dbname);

if (isset($_POST['usun_konto']))
{
    mysqli_query($conn,"DELETE FROM trenerzy WHERE id_trenera='".$_SESSION["id_trener"]."';");
    func();
    
    function func()
    {
        session_destroy();
        exit;    
    }
}
?>
<div class="card-header header_main end_alert">
    Konto zostało usunięte<br>
    <a href="index.php?page=login" class="btn logout_btn" style="width:auto;">Powrót do logowania</a>
</div>
