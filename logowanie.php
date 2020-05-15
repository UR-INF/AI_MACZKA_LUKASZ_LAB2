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