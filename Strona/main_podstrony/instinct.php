<?php
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "pokemony";

$conn = mysqli_connect ($host, $dbusername, $dbpassword, $dbname);

$sql = "UPDATE trenerzy SET id_druzyny='3' WHERE nick_trenera='".$_SESSION["nick"]."'";

if ($conn->query($sql) === TRUE) {
    $_SESSION["druzyna"] = "Instinct";
}
?>
<div class="team_instinct team_thanks">
    <div class="team_text team_thanks" style="height:auto;color:yellow;">
        <div style="font-size:35px;">Dziękujemy za wybór drużyny Instinct!</div>
        <br>
        <?php
        $query=mysqli_query($conn,"SELECT * FROM druzyny WHERE nazwa_druzyny = '".$_SESSION["druzyna"]."';");

        $row=mysqli_fetch_array($query);
        $opis_druzyny=$row['opis_druzyny'];
        echo $opis_druzyny;
        ?>
        <br>
        <a href="index.php?page=wybierz_druzyne" class="btn logout_btn" style="width:auto;">Zmień wybór drużyny</a>
        <a href="index.php?page=zlapane_pokemony" class="btn logout_btn" style="width:auto;">Powrót do swojej kolekcji</a>
    </div>
</div>
<script>
    window.onload = function() {
        if(!window.location.hash) {
            window.location = window.location + '#thanks';
            window.location.reload();
        }
    }
</script>