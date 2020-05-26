
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
            Drużyna:<br>    <?php if(isset($_SESSION["druzyna"])){echo $_SESSION["druzyna"];} ?>     
        </div>
        <div class="col card_main_top_element">
            Przedmiot:<br>  <?php if(isset($_SESSION["przedmiot"])){echo $_SESSION["przedmiot"];} ?>     
        </div>


        <div style="border-left:1px solid white; height: 100%; width: 0"></div>

        <div id="card_main_top_element_nick">
            Zalogowano: <center> 
            <?php if(isset($_SESSION["nick"])){echo $_SESSION["nick"];} ?>
            </center> 
        </div>
        <div id="card_main_top_element_button">
            <form action="main.php" method="post">
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
                        <a href="index.php?page=wybierz_druzyne">Wybierz Druzyne</a><br><br>
                        <a href="index.php?page=wybierz_przedmiot">Wybierz Przedmiot</a><br><br>
                        <a href="index.php?page=edytuj_profil">Edytuj Profil</a><br><br>
                    </center>


                </div>
            </div>
        </div>

        <div class="col-md-9 col-xl-9 col-xs-9 chat">
            <div class="card_main">
                <div class="card-body msg_card_body" style="padding:0px">
                    <?php
                    $current_page = isset($_GET['page']) ? $_GET['page'] : null; 

                    switch ($current_page) 
                    {
                        case 'lapanie_pokemona':
                        default;
                            include $_SERVER['DOCUMENT_ROOT'].'/main_podstrony/lapanie_pokemona.php';
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
                            
                        case 'edytuj_profil':
                            include $_SERVER['DOCUMENT_ROOT'].'/main_podstrony/edytuj_profil.php';
                            break;
                        case 'edycja_profilu':
                            include $_SERVER['DOCUMENT_ROOT'].'/main_podstrony/edycja_profilu.php';
                            break;
                        case 'zmiana_hasla':
                            include $_SERVER['DOCUMENT_ROOT'].'/main_podstrony/zmiana_hasla.php';
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
    session_start();
    session_destroy();
    header( 'Location: index.php?page=login');
    exit;    
}
?>