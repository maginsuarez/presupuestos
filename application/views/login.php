<div class="container">
	<div class="jumbotron">
    <h2>Presupuestos <strong>E</strong>-Commerce</h2>
    </br>
    <?php echo $modal; ?>
    <div class="row">
	<div class="col-sm-6 col-md-4 col-md-offset-4">
	<div class="account-wall">
	  <form class="form-signin" action="<?php echo base_url(); ?>index.php/presupuesto/buscar_nuevo" method="post">
	    <input type="text" class="form-control input_text_personalizado" placeholder="Email" id="username" name="username" required>
	    <input type="password" class="form-control pass_text_personalizado" placeholder="Password" id="passowrd" name="password" required>
	    <button class="btn btn-lg btn-primary btn-block boton_login_personalizado" type="submit" value="Login"> Ingresar </button>
	  </form>
	</div>
	</div>
	</div>
  </div>
</div>
