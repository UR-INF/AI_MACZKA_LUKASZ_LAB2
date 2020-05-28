<table class="table">
    <tr style="font-size:16px;">
        <td>Lp</td>
        <td>Ikona</td>
        <td>Nazwa Pokemona</td>
        <td>Typ Pokemona</td>
        <td>Region Występowania</td>
        <td>Maksymalne CP</td>
        <td>Łapanie</td>
    </tr>
    <?php 
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "pokemony";

    $conn = mysqli_connect ($host, $dbusername, $dbpassword, $dbname);

    $query = mysqli_query($conn,"select * from pokemony");
    $i=0;
    while ($pokemony = mysqli_fetch_array($query)) {
        $i++;
        echo "<tr>";
        echo "<td>".$i."</td>";
        echo "<td><img src='../img/icons/".$pokemony["id_pokemona"].".png'/></td>";
        echo "<td>".$pokemony["nazwa_pokemona"]."</td>";
        echo "<td>".$pokemony["typ_pokemona"]."</td>";
        echo "<td>".$pokemony["region_wystepowania_pokemona"]."</td>";
        echo "<td>".$pokemony["max_Cp"]."</td>";
        echo '<td>
        <form method="POST" action="index.php?page=zlapano_pokemona">
        <input type="hidden" value="'.$pokemony['id_pokemona'].'" name="id_poksa"/>
        <input type="hidden" value="'.$pokemony['max_Cp'].'" name="max_cp"/>
        <input type="submit" value="Złap" name="zlap_pokemona" class="btn login_btn btn-block">
        </form></td>';      
        echo "</tr>";
    }
    ?>
</table>