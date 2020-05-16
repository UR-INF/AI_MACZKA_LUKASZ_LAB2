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

if (isset($_POST['rejestruj']))
{
    $imie = filtruj($_POST['imie']);
    $nazwisko = filtruj($_POST['nazwisko']);
    $nick = filtruj($_POST['nick']);
    $haslo1 = filtruj($_POST['haslo1']);
    $haslo2 = filtruj($_POST['haslo2']);
    $level = filtruj($_POST['level']);
    
    // sprawdzamy czy nie podano pustych danych
    if (
        (isset($imie)&&strlen($imie)!=0&&strlen($imie)<=32 ) && 
        (isset($nazwisko)&&strlen($nazwisko)!=0&&strlen($nazwisko)<=64 )  && 
        (isset($nick)&&strlen($nick)!=0&&strlen($nick)<=32 )  && 
        (isset($haslo1)&&strlen($haslo1)!=0 )  && 
        (isset($haslo2)&&strlen($haslo2)!=0 )  && 
        (isset($level)&&strlen($level)!=0 )
    ){
        // sprawdzamy czy login nie jest już w bazie
        if (mysqli_num_rows(mysqli_query($conn,"SELECT nick_trenera FROM trenerzy WHERE nick_trenera = '".$nick."';")) == 0)
        {
            if ($haslo1 == $haslo2) // sprawdzamy czy hasła takie same
            {
            
                mysqli_query($conn,"INSERT INTO `trenerzy` (`imie_trenera`,     `nazwisko_trenera`, `nick_trenera`, `haslo_trenera`, `level_trenera`)
                VALUES ('".$imie."', '".$nazwisko."', '".$nick."', '".md5($haslo1)."', '".$level."');");
                
                ?>
<div class="login_container">
	<div class="d-flex justify-content-center h-100">
		<div class="registered_card">
			Konto zostało utworzone!<br>
			Przekierowanie na stronę logowania nastąpi za: <span id="countdowntimer">5 </span> sekundy.
		</div>
	</div>
</div>

                    <script type="text/javascript">
                    var timeleft = 5;
                    var downloadTimer = setInterval(function(){
                    timeleft--;
                    document.getElementById("countdowntimer").textContent = timeleft;
                    if(timeleft <= 0)
                        clearInterval(downloadTimer);
                    },1000);
                    </script>
                <?php    
                header( "refresh:5;url=index.php?page=login");
            }
            else {
                ?>
                <div class="login_container">
	               <div class="d-flex justify-content-center h-100">
		              <div class="registered_card">
			             Hasła się nie zgadzają
		              </div>
	               </div>
                </div>

                <?php    
                header( "refresh:2;url=index.php?page=register");
            }
        }
        else {
                ?>
                <div class="login_container">
	               <div class="d-flex justify-content-center h-100">
		              <div class="registered_card">
			             Podany nick już jest zajęty
		              </div>
	               </div>
                </div>

                <?php    
                header( "refresh:2;url=index.php?page=register");
            }
    }
    else {
                ?>
                <div class="login_container">
	               <div class="d-flex justify-content-center h-100">
		              <div class="registered_card">
			             Przekroczono limit znaków <br>
                              
		              </div>
	               </div>
                </div>

                <?php    
                header( "refresh:2;url=index.php?page=register");
            }
    
}
?>