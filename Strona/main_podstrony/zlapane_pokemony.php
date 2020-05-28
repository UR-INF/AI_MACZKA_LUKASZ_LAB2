<table class="table">
    <tr style="font-size:16px;">
        <td>Lp</td>
        <td>Ikona</td>
        <td>Nazwa Pokemona</td>
        <td>Typ Pokemona</td>
        <td>Region Wystepowania</td>
        <td>Posiadane CP</td>
        <td>Usun</td>
    </tr>
    <?php 
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "pokemony";

    $conn = mysqli_connect ($host, $dbusername, $dbpassword, $dbname);

    $query = mysqli_query($conn,"select p.id_posiadania, pok.id_pokemona, pok.nazwa_pokemona, pok.typ_pokemona, pok.region_wystepowania_pokemona, p.posiadane_cp from posiadanie p join trenerzy t on (p.id_trenera=t.id_trenera) join pokemony pok on (p.id_pokemona=pok.id_pokemona) WHERE p.id_trenera= '".$_SESSION['id_trener']."'");
    $i=0;
    while ($pokemony = mysqli_fetch_array($query)) {
        $i++;
        echo "<tr>";
        echo "<td>".$i."</td>";
        echo "<td><img src='../img/icons/".$pokemony["id_pokemona"].".png'/></td>";
        echo "<td>".$pokemony["nazwa_pokemona"]."</td>";
        echo "<td>".$pokemony["typ_pokemona"]."</td>";
        echo "<td>".$pokemony["region_wystepowania_pokemona"]."</td>";
        echo "<td>".$pokemony["posiadane_cp"]."</td>";
        echo '<td>
        <form method="POST" action="index.php?page=usunieto_pokemona">
        <input type="hidden" value="'.$pokemony["id_posiadania"].'" name="id_poksa"/>
        <input type="submit" value="Usuń" name="usun_pokemona" class="btn login_btn btn-block">
        </form>
        </td>'; 
        echo "</tr>";
    }
    ?>
</table>