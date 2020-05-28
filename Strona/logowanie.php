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

if (isset($_POST['loguj']))
{
    $nick = filtruj($_POST['nick']);
    $haslo = filtruj($_POST['haslo']);

    // sprawdzamy czy login i hasło są dobre
    if (mysqli_num_rows(mysqli_query($conn, "SELECT nick_trenera, haslo_trenera FROM trenerzy WHERE nick_trenera = '".$nick."' AND haslo_trenera = '".md5($haslo)."';")) > 0)
    {
        $query=mysqli_query($conn,"SELECT * FROM trenerzy WHERE nick_trenera = '".$nick."';");
        
        $row=mysqli_fetch_array($query);
        
        $id_trener=$row['id_trenera'];
        $imie=$row['imie_trenera'];
        $nazwisko=$row['nazwisko_trenera'];
        $level=$row['level_trenera'];
        $druzyna=$row['id_druzyny'];
        $przedmiot=$row['id_przedmiotu'];
        
        if($druzyna == null){
            $druzyna = "Nie wybrano";
        }elseif($druzyna == 1){
            $druzyna = "Valor";
        }elseif($druzyna == 2){
            $druzyna = "Mystic";
        }elseif($druzyna == 3){
            $druzyna = "Instinct";
        }
        
        if($przedmiot == null){
            $przedmiot = "Brak przedmiotu";
        }
        $_SESSION["id_trener"] = $id_trener;
        $_SESSION["imie"] = $imie;
        $_SESSION["nazwisko"] = $nazwisko;
        $_SESSION["level"] = $level;
        $_SESSION["druzyna"] = $druzyna;
        $_SESSION["przedmiot"] = $przedmiot;

        $_SESSION["zalogowany"] = true;
        $_SESSION["nick"] = $nick;
        header('Location: index.php?page=main');
    }
    else{
?>
<div class="login_container">
    <div class="d-flex justify-content-center h-100">
        <div class="registered_card">
            Wpisano złe dane
        </div>
    </div>
</div>

<?php    
        header( "refresh:2;url=index.php?page=login");
    }
}
?>