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

if (isset($_POST['edytuj_profil']))
{
    $imie = filtruj($_POST['imie']);
    $nazwisko = filtruj($_POST['nazwisko']);
    $nick = filtruj($_POST['nick']);
    $level = filtruj($_POST['level']);

    // sprawdzamy czy nie podano pustych danych
    if (
        (isset($imie)&&strlen($imie)!=0&&strlen($imie)<=32 ) && 
        (isset($nazwisko)&&strlen($nazwisko)!=0&&strlen($nazwisko)<=64 )  && 
        (isset($nick)&&strlen($nick)!=0&&strlen($nick)<=32 )  && 
        (isset($level)&&strlen($level)!=0 )
    ){
        // sprawdzamy czy login nie jest już w bazie
        if (mysqli_num_rows(mysqli_query($conn,"SELECT nick_trenera FROM trenerzy WHERE nick_trenera = '".$nick."';")) == 0)
        {
            $sql = "UPDATE trenerzy SET imie_trenera='".$imie."', nazwisko_trenera='".$nazwisko."', nick_trenera='".$nick."', level_trenera='".$level."' WHERE nick_trenera='".$_SESSION["nick"]."'";

            if ($conn->query($sql) === TRUE) {
                $_SESSION["imie"] = $imie;
                $_SESSION["nazwisko"] = $nazwisko;
                $_SESSION["level"] = $level;

                $_SESSION["nick"] = $nick;
?>
<div class="card-body links"> 
    <div class="card-header header_main">
        Dane zostały zmienione!<br>
        <a href="index.php?page=edytuj_profil">Powrót</a>
    </div>
</div>
<?php
            } else {
                echo "Error updating record: " . $conn->error;
            }
        }
        else {
            if($nick==$_SESSION["nick"]){
                $sql = "UPDATE trenerzy SET imie_trenera='".$imie."', nazwisko_trenera='".$nazwisko."', level_trenera='".$level."' WHERE nick_trenera='".$_SESSION["nick"]."'";

                if ($conn->query($sql) === TRUE) {
                    $_SESSION["imie"] = $imie;
                    $_SESSION["nazwisko"] = $nazwisko;
                    $_SESSION["level"] = $level;

?>
<div class="card-body links"> 
    <div class="card-header header_main">
        Dane zostały zmienione!<br>
        <a href="index.php?page=edytuj_profil">Powrót</a>
    </div>
</div>
<?php
                }else {
                    echo "Error updating record: " . $conn->error;
                }
    }else{        
?>
                <div class="card-header header_main">
                    Podany nick jest zajęty!<br>
                    <a href="index.php?page=edytuj_profil">Powrót</a>
                    </div>
                    <?php    
            }
        }
        }else {
?>
<div class="card-header header_main">
    Przekroczono limit znaków!<br>
    <a href="index.php?page=edytuj_profil">Powrót</a>
</div>
<?php
        }

}
?>