<?php 
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "pokemony";

$conn = mysqli_connect ($host, $dbusername, $dbpassword, $dbname);

$query = mysqli_query($conn,"SELECT nick_trenera, nazwa_areny, opis_areny, miejscowosc FROM trenerzy t JOIN areny a WHERE a.id_trenera=t.id_trenera UNION
SELECT id_trenera, nazwa_areny, opis_areny, miejscowosc FROM areny a WHERE a.id_trenera IS NULL;");


while ($areny = mysqli_fetch_array($query)) {
    if($areny["nick_trenera"]==NULL){
        echo '<div class="areny wolna"><h4>Nazwa Areny:</h4><p style="margin-left: 10px;"> '.$areny["nazwa_areny"].'</p>
    <h4>Opis: </h4><p style="margin-left: 10px;">'.$areny["opis_areny"].'</p>
    <h4>Miejscowość: </h4><p style="margin-left: 10px;">'.$areny["miejscowosc"].'</p>
    <h4>Przejęta przez:</h4> <p style="color:green; margin-left: 10px;">Nikogo</p>
    <input type="submit" value="Przejmij" name="przejmij" class="btn login_btn btn-block bottom_of"></div>';       
    }else{
        echo '<div class="areny przejeta"><h4>Nazwa Areny:</h4><p style="margin-left: 10px;"> '.$areny["nazwa_areny"].'</p>
    <h4>Opis: </h4><p style="margin-left: 10px;">'.$areny["opis_areny"].'</p>
    <h4>Miejscowość: </h4><p style="margin-left: 10px;">'.$areny["miejscowosc"].'</p>
    <h4>Przejęta przez: </h4><p style="color:red; margin-left: 10px;">'.$areny["nick_trenera"].'</p>
    <input type="submit" value="Atakuj" name="atakuj" class="btn login_btn btn-block bottom_of"></div>'; 
    }


}
?>
