<?php
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "pokemony";

$conn = mysqli_connect ($host, $dbusername, $dbpassword, $dbname);

function filtruj($zmienna)
{
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "pokemony";

    $conn = mysqli_connect ($host, $dbusername, $dbpassword, $dbname);

    if(get_magic_quotes_gpc())
        $zmienna = stripslashes($zmienna); // usuwamy slashe

    // usuwamy spacje, tagi html oraz niebezpieczne znaki
    return mysqli_real_escape_string($conn, htmlspecialchars(trim($zmienna)));
}

if (isset($_POST['zmien_haslo']))
{
    $haslo_stare = filtruj($_POST['haslo_stare']);
    $haslo1 = filtruj($_POST['haslo1']);
    $haslo2 = filtruj($_POST['haslo2']);
    
        $query=mysqli_query($conn,"SELECT haslo_trenera FROM trenerzy WHERE nick_trenera = '".$_SESSION["nick"]."';");
        $row=mysqli_fetch_array($query);
        $haslo_z_bazy=$row['haslo_trenera'];
        if($haslo_z_bazy==md5($haslo_stare)){
            if($haslo1==$haslo2){
                    $sql = "UPDATE trenerzy SET haslo_trenera='".md5($haslo1)."' WHERE nick_trenera='".$_SESSION["nick"]."'";

                    if ($conn->query($sql) === TRUE) {
                    ?>
<div class="card-header header_main">
    Hasło zostało zmienione!<br>
    <a href="index.php?page=edytuj_profil">Powrót</a>
</div>
                    <?php
                    } else {
                        echo "Error updating record: " . $conn->error;
                    }
            }else{
?>
<div class="card-header header_main">
    Hasła się nie zgadzają!<br>
    <a href="index.php?page=edytuj_profil">Powrót</a>
</div>
<?php
            }
        }else{
?>
<div class="card-header header_main">
    Podano błędne stare hasło!<br>
    <a href="index.php?page=edytuj_profil">Powrót</a>
</div>
<?php
        }
}
?>