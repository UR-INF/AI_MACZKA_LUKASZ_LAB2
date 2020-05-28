<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
}
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "pokemony";

$conn = mysqli_connect ($host, $dbusername, $dbpassword, $dbname);

if (isset($_POST['usun_pokemona']))
{
    mysqli_query($conn,"DELETE FROM posiadanie WHERE id_posiadania = '".$_POST['id_poksa']."'");
}
?>
<div class="card-header header_main end_alert">
    Pokemon usunięty<br>
    <a href="index.php?page=zlapane_pokemony" class="btn logout_btn" style="width:auto;">Powrót do twoich pokemonów</a>
</div>