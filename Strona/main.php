<?php 
if(!isset($_SESSION)) 
{ 
    session_start(); 
}?>
<div class="login_container">
    <div class="spacer"></div>
    <div class="row card_main_top" style="height:60px; width:100%"> 

        <div class="col card_main_top_element">
            Imię:<br>  <?php if(isset($_SESSION["imie"])){echo $_SESSION["imie"];} ?>    
        </div>
        <div class="col card_main_top_element">
            Nazwisko:<br>   <?php if(isset($_SESSION["nazwisko"])){echo $_SESSION["nazwisko"];} ?>     
        </div>
        <div class="col card_main_top_element">
            Level:<br>  <?php if(isset($_SESSION["level"])){echo $_SESSION["level"];} ?>     
        </div>
        <div class="col card_main_top_element">
            Drużyna:<br>    <?php if(isset($_SESSION["druzyna"])){
        echo ''.$_SESSION["druzyna"]." <img src='../img/items/".$_SESSION["druzyna"].".png' style='height:16px;width:16px;'/>";} ?>     
        </div>
        <div class="col card_main_top_element">
            Przedmiot:<br>  <?php if(isset($_SESSION["przedmiot"])){
    echo ''.$_SESSION["przedmiotek"]." <img src='../img/items/".$_SESSION["przedmiot"].".png' style='height:16px;width:16px;'/>";} ?>     
        </div>


        <div style="border-left:1px solid white; height: 100%; width: 0"></div>

        <div id="card_main_top_element_nick">
            Zalogowano: <center> 
            <?php if(isset($_SESSION["nick"])){echo $_SESSION["nick"];} ?>
            </center> 
        </div>
        <div id="card_main_top_element_button">
            <form action="index.php?page=main.php" method="post">
                <input type="submit" name="logout" value="Wyloguj się" class="btn logout_btn"/>
            </form>
        </div>
    </div>
    <div>
        <div class="col-md-3 col-xl-3 col-xs-3">
            <div class="card_main mb-sm-3 mb-md-0 ">
                <div class="card-header header_main">
                    Menu główne
                </div>

                <div class="card-body links" style="font-size:20px;">
                    <center>
                        <a href="index.php?page=lapanie_pokemona">Łapanie Pokemona</a><br><br>
                        <a href="index.php?page=zlapane_pokemony">Złapane Pokemony</a><br><br>
                        <a href="index.php?page=zaatakuj_areny">Zaatakuj Areny</a><br><br>
                        <a href="index.php?page=wybierz_druzyne">Wybierz Drużyne</a><br><br>
                        <a href="index.php?page=wybierz_przedmiot">Wybierz Przedmiot</a><br><br>
                        <a href="index.php?page=edytuj_profil">Edytuj Profil</a><br><br>
                    </center>


                </div>
            </div>
        </div>

        <div class="col-md-9 col-xl-9 col-xs-9 chat">
            <div class="card_main" style="overflow: auto;">
                <div class="card-body msg_card_body" style="padding:0px">
                    <?php
                    $current_page = isset($_GET['page']) ? $_GET['page'] : null; 

                    switch ($current_page) 
                    {
                        case 'lapanie_pokemona':
                        default;
                            include $_SERVER['DOCUMENT_ROOT'].'/main_podstrony/lapanie_pokemona.php';
                            break;

                        case 'zlapano_pokemona':
                            include $_SERVER['DOCUMENT_ROOT'].'/main_podstrony/zlapano_pokemona.php';
                            break;

                        case 'zlapane_pokemony':
                            include $_SERVER['DOCUMENT_ROOT'].'/main_podstrony/zlapane_pokemony.php';
                            break;

                        case 'usunieto_pokemona':
                            include $_SERVER['DOCUMENT_ROOT'].'/main_podstrony/usunieto_pokemona.php';
                            break;
                            
                        case 'zaatakuj_areny':
                            include $_SERVER['DOCUMENT_ROOT'].'/main_podstrony/zaatakuj_areny.php';
                            break;
                            
                        case 'atak_na_swoja_arene':
                            include $_SERVER['DOCUMENT_ROOT'].'/main_podstrony/atak_na_swoja_arene.php';
                            break;
                            
                        case 'za_niski_level':
                            include $_SERVER['DOCUMENT_ROOT'].'/main_podstrony/za_niski_level.php';
                            break;
                            
                        case 'przejeto_arene':
                            include $_SERVER['DOCUMENT_ROOT'].'/main_podstrony/przejeto_arene.php';
                            break;
                        
                        case 'wybierz_druzyne':
                            include $_SERVER['DOCUMENT_ROOT'].'/main_podstrony/wybierz_druzyne.php';
                            break;

                        case 'valor':
                            include $_SERVER['DOCUMENT_ROOT'].'/main_podstrony/valor.php';
                            break;

                        case 'mystic':
                            include $_SERVER['DOCUMENT_ROOT'].'/main_podstrony/mystic.php';
                            break;

                        case 'instinct':
                            include $_SERVER['DOCUMENT_ROOT'].'/main_podstrony/instinct.php';
                            break;

                        case 'wybierz_przedmiot':
                            include $_SERVER['DOCUMENT_ROOT'].'/main_podstrony/wybierz_przedmiot.php';
                            break;
                            
                        case 'wybrano_przedmiot':
                            include $_SERVER['DOCUMENT_ROOT'].'/main_podstrony/wybrano_przedmiot.php';
                            break;

                        case 'edytuj_profil':
                            include $_SERVER['DOCUMENT_ROOT'].'/main_podstrony/edytuj_profil.php';
                            break;
                            
                        case 'edycja_profilu':
                            include $_SERVER['DOCUMENT_ROOT'].'/main_podstrony/edycja_profilu.php';
                            break;
                            
                        case 'zmiana_hasla':
                            include $_SERVER['DOCUMENT_ROOT'].'/main_podstrony/zmiana_hasla.php';
                            break;
                            
                        case 'usun_konto':
                            include $_SERVER['DOCUMENT_ROOT'].'/main_podstrony/usun_konto.php';
                            break;
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['logout']))
{
    func();
}
function func()
{
    session_destroy();
    redirect('index.php?page=login');
    exit;    
}
function redirect($url)
{
    if (!headers_sent())
    {    
        header('Location: '.$url);
        exit;
    }
    else
    {  
        echo '<script type="text/javascript">';
        echo 'window.location.href="'.$url.'";';
        echo '</script>';
        echo '<noscript>';
        echo '<meta http-equiv="refresh" content="0;url='.$url.'" />';
        echo '</noscript>'; exit;
    }
}
?>
