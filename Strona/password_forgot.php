<div class="login_container">
	<div class="d-flex col-xs-12 col-sm-12 col-md-10 col-sm-offset-1 col-md-offset-1 justify-content-center h-100">
		<div class="register_card">
			<div class="card-header">
				<center><h3>Resetuj hasło</h3></center>
			</div>
			<div class="card-body">
				<form method="POST" action="index.php?page=password_reset">
					<div class="row">
                            <div class="col-xs-4 col-sm-4 col-md-4 col-xs-offset-4 col-sm-offset-4 col-md-offset-4">
                                   <div class="form-group">
			    				        <input type="text" name="nick" id="register_form" class="form-control input-md" placeholder="Nick" required>
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
				        <center><h3 style="color:white">Dla potwierdzenia wpisz swój level</h3></center>
                    <div class="row">
                            <div class="col-xs-4 col-sm-4 col-md-4 col-xs-offset-4 col-sm-offset-4 col-md-offset-4">
			    				<div class="form-group">
			    					<input type="number" name="level" id="register_form" class="form-control input-md" placeholder="Twój level" required>
			    				</div>
			    			</div>
			    	</div>
			    			
			    	    <input type="submit" value="Resetuj" name="resetuj"
                             class="btn login_btn btn-block">
                    <br>
                    <div class="d-flex justify-content-center links">
					   <a href="index.php?page=login">Powrót do logowania</a>
				    </div>
				</form>
			</div>
			
		</div>
	</div>
</div>