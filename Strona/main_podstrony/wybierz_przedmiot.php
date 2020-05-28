<table class="table">
    <tr style="font-size:16px;">
        <td>Lp</td>
        <td>Ikona</td>
        <td>Nazwa Przedmiotu</td>
        <td>Opis</td>
        <td>Typ</td>
        <td>Waga</td>
        <td>Cena</td>
        <td>Wyposaż przedmiot</td>
    </tr>
    <?php 
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "pokemony";

    $conn = mysqli_connect ($host, $dbusername, $dbpassword, $dbname);

    $query = mysqli_query($conn,"select p.id_posiadania_przedmiotu, prz.id_przedmiotu, prz.nazwa_przedmiotu, prz.opis_przedmiotu, prz.typ_przedmiotu, prz.waga_przedmiotu, prz.cena_przedmiotu from posiadanie_przedmiotu p join przedmioty prz on (p.id_przedmiotu=prz.id_przedmiotu) WHERE p.id_trenera = '".$_SESSION["id_trener"]."'");
    $i=0;
    while ($przedmioty = mysqli_fetch_array($query)) {
        $i++;
        echo "<tr>";
        echo "<td>".$i."</td>";
        echo "<td><img src='../img/items/".$przedmioty["id_przedmiotu"].".png' style='height:32px;width:32px;'/></td>";
        echo "<td>".$przedmioty["nazwa_przedmiotu"]."</td>";
        echo "<td>".$przedmioty["opis_przedmiotu"]."</td>";
        echo "<td>".$przedmioty["typ_przedmiotu"]."</td>";
        echo "<td>".$przedmioty["waga_przedmiotu"]."</td>";
        echo "<td>".$przedmioty["cena_przedmiotu"]."</td>";
        echo '<td>
        <form method="POST" action="index.php?page=wybrano_przedmiot">
        <input type="hidden" value="'.$przedmioty['id_przedmiotu'].'" name="id_przedmiotu"/>
        <input type="hidden" value="'.$przedmioty['nazwa_przedmiotu'].'" name="nazwa_przedmiotu"/>
        <input type="submit" value="Wyposaż" name="wybierz_przedmiot" class="btn login_btn btn-block">
        </form></td>';
        echo "</tr>";
    }
    ?>
</table>