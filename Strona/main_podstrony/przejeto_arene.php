<?php 
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "pokemony";

$conn = mysqli_connect ($host, $dbusername, $dbpassword, $dbname);
$result = mysqli_query($conn,"SELECT id_przedmiotu FROM przedmioty;");
$k=0;
while ($row = mysqli_fetch_row($result)) {
    $rows[] = $row;
}
$wylosowane=implode(', ', $rows[array_rand($rows)]);

$query = mysqli_query($conn,"INSERT INTO posiadanie_przedmiotu (id_przedmiotu, id_trenera) VALUES (".$wylosowane.",".$_SESSION["id_trener"].");");
$query2 =mysqli_query($conn,"SELECT * FROM przedmioty WHERE id_przedmiotu = ".$wylosowane.";");
$przedmiot = mysqli_fetch_array($query2);
?>
<div class="card-header header_main end_alert_zlapano">
    Przejęto Arene: <br><b style="color:green;">  <?php echo $_SESSION['nazwaarenki']; ?></b><br>
    Otrzymano Przedmiot: <b style="color:green;"><?php echo $przedmiot["nazwa_przedmiotu"]; ?></b>
    <?php echo "<img src='../img/items/".$wylosowane.".png' style='height:32px;width:32px;'/>" ?>
    <br>
    <a href="index.php?page=wybierz_przedmiot" class="btn logout_btn" style="width:auto;">Przejdź do Przedmiotów</a>
    <a href="index.php?page=zaatakuj_areny" class="btn logout_btn" style="width:auto;">Powrót do Aren</a>
</div>
