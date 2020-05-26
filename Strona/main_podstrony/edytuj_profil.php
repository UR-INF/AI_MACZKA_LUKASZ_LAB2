<div class="login_container">
    <div class="d-flex col-xs-12 col-sm-12 col-md-10 col-sm-offset-1 col-md-offset-1 justify-content-center h-100">
        <div class="edit_profile_card">
            <div class="card-header">
                <center><h3>Edytuj Profil</h3></center>
            </div>
            <div class="card-body">
                <form method="POST" action="index.php?page=edycja_profilu">
                    <div class="row">
                        <div class="col-xs-4 col-sm-4 col-md-4">
                            <div class="form-group">
                                <input type="text" name="imie" id="register_form" class="form-control input-md" placeholder="Imię" value="<?php if(isset($_SESSION["imie"])){echo $_SESSION["imie"];} ?>" required>
                            </div>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4">
                            <div class="form-group">
                                <input type="text" name="nazwisko" id="register_form" class="form-control input-md" placeholder="Nazwisko" value="<?php if(isset($_SESSION["imie"])){echo $_SESSION["nazwisko"];} ?>" required>
                            </div>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4">
                            <div class="form-group">
                                <input type="text" name="nick" id="register_form" class="form-control input-md" placeholder="Nick" value="<?php if(isset($_SESSION["imie"])){echo $_SESSION["nick"];} ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 col-sm-4 col-md-4 col-xs-offset-4 col-sm-offset-4 col-md-offset-4">
                            <div class="form-group">
                                <input type="number" name="level" id="register_form" class="form-control input-md" placeholder="Level" value="<?php if(isset($_SESSION["imie"])){echo $_SESSION["level"];} ?>" required>
                            </div>
                        </div>
                    </div>

                    <input type="submit" value="Zapisz zmiany" name="edytuj_profil"
                           class="btn login_btn btn-block">
                </form>
                <br><br>
                <form method="POST" action="index.php?page=zmiana_hasla">
                    <div class="row">
                        <div class="col-xs-4 col-sm-4 col-md-4 col-xs-offset-4 col-sm-offset-4 col-md-offset-4">
                            <div class="form-group">
                                <input type="password" name="haslo_stare" id="register_form" class="form-control input-md" placeholder="Stare hasło" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 col-sm-4 col-md-4 col-xs-offset-2 col-sm-offset-2 col-md-offset-2">
                            <div class="form-group">
                                <input type="password" name="haslo1" id="register_form" class="form-control input-md" placeholder="Nowe hasło" required>
                            </div>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4">
                            <div class="form-group">
                                <input type="password" name="haslo2" id="register_form" class="form-control input-md" placeholder="Potwierdź hasło" required>
                            </div>
                        </div>
                    </div>
                    <input type="submit" value="Zmień hasło" name="zmien_haslo"
                           class="btn login_btn btn-block">
                </form>
            </div>

        
    </div>
</div>