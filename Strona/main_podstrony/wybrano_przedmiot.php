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

if (isset($_POST['wybierz_przedmiot']))
{
    mysqli_query($conn,"UPDATE trenerzy SET id_przedmiotu = '".$_POST['id_przedmiotu']."' WHERE id_trenera='".$_SESSION['id_trener']."' ;");
    $_SESSION["przedmiotek"] = $_POST['nazwa_przedmiotu'];
    $_SESSION["przedmiot"] = $_POST['id_przedmiotu'];
    
?>
<div class="card-header header_main end_alert_zlapano">
    Wyposazono: <b style="color:green;"><?php echo $_POST["nazwa_przedmiotu"] ; ?></b><?php echo "<img src='../img/items/".$_POST['id_przedmiotu'].".png' style='margin-bottom:7px;height:32px;width:32px;'/>";?><br>
    
    <a href="index.php?page=wybierz_przedmiot" class="btn logout_btn" style="width:auto;">Powrót do Przedmiotów</a>
    <a href="index.php?page=zlap_pokemona" class="btn logout_btn" style="width:auto;">Przejdź do Lapania</a>
</div>
<?php 
}
?>
<script>
    window.onload = function() {
        if(!window.location.hash) {
            window.location = window.location + '#thanks';
            window.location.reload();
        }
    }
</script>