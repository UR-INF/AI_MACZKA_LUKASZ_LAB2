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

if (isset($_POST['zlap_pokemona']))
{
    $_SESSION["level"]++;
    mysqli_query($conn,"UPDATE trenerzy SET level_trenera = '".$_SESSION["level"]."' WHERE id_trenera='".$_SESSION['id_trener']."';");
    $posiadane_cp = rand(10,$_POST['max_cp']);
    $sql="INSERT INTO posiadanie (id_trenera, id_pokemona, posiadane_cp) VALUES ('".$_SESSION['id_trener']."','".$_POST['id_poksa']."','".$posiadane_cp."');";

    if (mysqli_query($conn, $sql)) {
        $last_id = mysqli_insert_id($conn);
        $query = mysqli_query($conn,"select p.id_posiadania, pok.id_pokemona, pok.nazwa_pokemona, pok.typ_pokemona, pok.region_wystepowania_pokemona, pok.max_Cp, p.posiadane_cp from posiadanie p join trenerzy t on (p.id_trenera=t.id_trenera) join pokemony pok on (p.id_pokemona=pok.id_pokemona) WHERE p.id_trenera= '".$_SESSION['id_trener']."' AND p.id_posiadania='".$last_id."'");
        $zlapany = mysqli_fetch_array($query)
?>
<div class="card-header header_main end_alert_zlapano">
    Złapano: <b style="color:green;"><?php echo $zlapany["nazwa_pokemona"] ; ?></b><?php echo "<img src='../img/icons/".$zlapany['id_pokemona'].".png' style='margin-bottom:7px;'/>";?><br>
    Typ Pokemona: <b style="color:green;"><?php echo $zlapany["typ_pokemona"]; ?></b><br>
    Region: <b style="color:green;"><?php echo $zlapany["region_wystepowania_pokemona"]; ?></b><br>
    Wylosowane CP (10-<?php echo $zlapany["max_Cp"] ?>): <b style="color:green;"><?php echo $posiadane_cp; ?> CP</b>
    <br>
    
    <a href="index.php?page=lapanie_pokemona" class="btn logout_btn" style="width:auto;">Złap kolejnego</a>
    <a href="index.php?page=zlapane_pokemony" class="btn logout_btn" style="width:auto;">Zobacz swoją kolekcję</a>
</div>
<?php

    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

}
?>
