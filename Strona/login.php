<div class="login_container">
    <div class="d-flex justify-content-center h-100">
        <div class="card">
            <div class="card-header">
                <h3>Zaloguj się</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="index.php?page=logowanie">
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" name= "nick" class="form-control" placeholder="username" required>

                    </div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" name="haslo" class="form-control" placeholder="password" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Zaloguj" name="loguj" class="btn float-right login_btn">
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-center links">
                    Nie posiadasz konta?<a href="index.php?page=register">Zarejestruj się</a>
                </div>
                <div class="d-flex justify-content-center links">
                    <a href="index.php?page=password_forgot">Zapomniałeś hasła?</a>
                </div>
            </div>
        </div>
    </div>
</div>

