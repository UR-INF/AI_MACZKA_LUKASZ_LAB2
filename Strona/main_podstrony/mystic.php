<?php
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "pokemony";

$conn = mysqli_connect ($host, $dbusername, $dbpassword, $dbname);

$sql = "UPDATE trenerzy SET id_druzyny='2' WHERE nick_trenera='".$_SESSION["nick"]."'";

if ($conn->query($sql) === TRUE) {
    $_SESSION["druzyna"] = "Mystic";
}
?>
<div class="team_mystic team_thanks">
    <?php
    $query=mysqli_query($conn,"SELECT * FROM druzyny WHERE nazwa_druzyny = '".$_SESSION["druzyna"]."';");

    $row=mysqli_fetch_array($query);
    $opis_druzyny=$row['opis_druzyny'];
    echo $opis_druzyny;
    ?>
</div>
<script>
    window.onload = function() {
        if(!window.location.hash) {
            window.location = window.location + '#thanks';
            window.location.reload();
        }
    }
</script>