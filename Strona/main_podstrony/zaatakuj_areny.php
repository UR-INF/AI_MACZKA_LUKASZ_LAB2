<?php 
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "pokemony";

$conn = mysqli_connect ($host, $dbusername, $dbpassword, $dbname);

$query = mysqli_query($conn,"SELECT id_areny, nick_trenera, level_trenera, nazwa_areny, opis_areny, miejscowosc FROM trenerzy t JOIN areny a WHERE a.id_trenera=t.id_trenera UNION 
SELECT id_areny, a.id_trenera, a.id_trenera, nazwa_areny, opis_areny, miejscowosc FROM areny a JOIN trenerzy t WHERE a.id_trenera IS NULL;;");


while ($areny = mysqli_fetch_array($query)) {
    if($areny["nick_trenera"]==NULL){
        echo '
        <form method="POST" action="">
        <div class="areny wolna"><h4>Nazwa Areny:</h4><p style="margin-left: 10px;"> '.$areny["nazwa_areny"].'</p>
    <h4>Opis: </h4><p style="margin-left: 10px;">'.$areny["opis_areny"].'</p>
    <h4>Miejscowość: </h4><p style="margin-left: 10px;">'.$areny["miejscowosc"].'</p>
    <h4>Przejęta przez:</h4> <p style="color:green; margin-left: 10px;">Nikogo</p>
    <input type="hidden" value="'.$areny["id_areny"].'" name="idareny">
    <input type="hidden" value="'.$areny["nazwa_areny"].'" name="nazwa_arenki">
    <input type="hidden" value="'.$areny["nick_trenera"].'" name="nicktrenera">
    <input type="submit" value="Przejmij" name="przejmij" class="btn login_btn btn-block bottom_of"></form></div>';       
    }else{
        echo '
        <form method="POST" action="">
        <div class="areny przejeta"><h4>Nazwa Areny:</h4><p style="margin-left: 10px;"> '.$areny["nazwa_areny"].'</p>
    <h4>Opis: </h4><p style="margin-left: 10px;">'.$areny["opis_areny"].'</p>
    <h4>Miejscowość: </h4><p style="margin-left: 10px;">'.$areny["miejscowosc"].'</p>
    <h4>Przejęta przez: </h4>';
    if($areny["nick_trenera"]==$_SESSION["nick"]){
        echo '<p style="color:green;';
    }else{
        echo '<p style="color:red;';
    }  
    echo ' margin-left: 10px;">'.$areny["nick_trenera"].'('.$areny["level_trenera"].')</p>
    <input type="hidden" value="'.$areny["id_areny"].'" name="idareny">
    <input type="hidden" value="'.$areny["nazwa_areny"].'" name="nazwa_arenki">
    <input type="hidden" value="'.$areny["nick_trenera"].'" name="nicktrenera">
    <input type="hidden" value="'.$areny["level_trenera"].'" name="leveltrenera">
    <input type="submit" value="Atakuj" name="atakuj" class="btn login_btn btn-block bottom_of">
    </form></div>'; 
    }


}
?>
<div class="areny nowa">
    <form method="POST" action="index.php?page=zaatakuj_areny">
        <center><h3>Stwórz arenę</h3>
            <h4>Nazwa Areny:</h4>
            <input type="text"  placeholder="Wpisz nazwę areny" name="arena_nazwa" maxlength="32" style="width:98%;color:black;">
            <h4>Opis: </h4>
            <input type="text"  placeholder="Opisz arenę" name="arena_opis" maxlength="256" style="width:98%;color:black;">
            <h4>Miejscowość: </h4>
            <input type="text"  placeholder="Wpisz miejscowość" name="arena_miejscowosc" maxlength="64" style="width:98%;color:black;">
        </center>
        <input type="submit" value="Stwórz" name="stworz" class="btn login_btn btn-block bottom_of">
    </form>

</div>
<?php
if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['stworz'])){
    dodanie_areny();
}
if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['przejmij'])){
    przejecie_areny();
}
if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['atakuj'])){
    atakuj_arene();
}
function dodanie_areny(){
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "pokemony";

    $conn = mysqli_connect ($host, $dbusername, $dbpassword, $dbname);

    $sql="INSERT INTO areny (nazwa_areny, opis_areny, miejscowosc) VALUES ('".$_POST['arena_nazwa']."','".$_POST['arena_opis']."','".$_POST['arena_miejscowosc']."');";
    mysqli_query($conn, $sql);


    redirect('index.php?page=zaatakuj_areny');   
}
function przejecie_areny(){
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "pokemony";

    $conn = mysqli_connect ($host, $dbusername, $dbpassword, $dbname);

    $sql="UPDATE areny SET id_trenera='".$_SESSION["id_trener"]."' WHERE id_areny='".$_POST["idareny"]."';";
    $_SESSION['nazwaarenki'] = $_POST["nazwa_arenki"];
    mysqli_query($conn, $sql);


    redirect('index.php?page=przejeto_arene');
}
function atakuj_arene(){
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "pokemony";

    $conn = mysqli_connect ($host, $dbusername, $dbpassword, $dbname);

    if($_POST["nicktrenera"] == $_SESSION["nick"]){
        redirect('index.php?page=atak_na_swoja_arene');
    }else{
        if($_POST["leveltrenera"] >= $_SESSION["level"]){
            $_SESSION['wymagany'] = $_POST["leveltrenera"] + 1;
            redirect('index.php?page=za_niski_level');
        }else{
            $sql="UPDATE areny SET id_trenera='".$_SESSION["id_trener"]."' WHERE id_areny='".$_POST["idareny"]."';";
            $_SESSION['nazwaarenki'] = $_POST["nazwa_arenki"];
            mysqli_query($conn, $sql);
            redirect('index.php?page=przejeto_arene');
        }

    }
}
?>