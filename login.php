<!DOCTYPE html>
<html lang="pt-br">

<head>
<meta charset="UTF-8" />
    <title>Deligência</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="img/logo.png" type="image/x-icon" />
	<meta name="theme-color" content="#f9f9f9">
  <link rel="apple-touch-icon" href="/images/icons/icon-192x192.png">
  <link rel="manifest" href="manifest.json" />  
  <link rel="canonical" href="http://gmfrutal.com/gm_gestao/login.php">


	<!-- Fonts and icons -->
	<script src="js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {
				"families": ["Lato:300,400,700,900"]
			},
			custom: {
				"families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"],
				urls: ['css/fonts.min.css']
			},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/atlantislogin.css">

</head>

<body class="login">
<script>
  if ('serviceWorker' in navigator) {
    navigator.serviceWorker.register('sw.js')
      .then(function () {
        console.log('service worker registered');
      })
      .catch(function () {
        console.warn('service worker failed');
      });
  }
</script>
	<div class="wrapper wrapper-login wrapper-login-full p-0">
		<div class="login-aside w-50 d-flex flex-column align-items-center justify-content-center text-center bg-secondary-gradient">
			<img src="img/logo1.png">
			<p class="subtitle text-white op-7">Sistema de Deligência</p>
		</div>
		<div class="login-aside w-50 d-flex align-items-center justify-content-center bg-white">
			<div class="container container-login container-transparent animated fadeIn">
				<h3 class="text-center">Seja bem-vindo!</h3>
				<div class="login-form">
					<div class="form-group">
					<form action="dao/valida.php" method="POST">
						<label for="username" class="placeholder"><b>Usuário</b></label>
						<input id="username" name="user" type="text" class="form-control" required onkeyup="mascara('###.###.###-####',this,event,true)">
					</div>
					<div class="form-group">
						<label for="password" class="placeholder"><b>Senha</b></label>
						<div class="position-relative">
							<input id="password" name="senha" type="password" class="form-control" required>
						</div>
						<a href="solicita.php">Esqueceu sua senha?</a>
					</div>
					<div class="form-group form-action-d-flex mb-3">
					<input type="submit" class="btn btn-secondary col-md-5 float-right mt-3 mt-sm-0 fw-bold" value="Entrar">
					</div>
					</form>
				</div>
			</div>
			 <!-- Modal -->
			 <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
			  <h4 class="modal-title">Esqueceu a senha?</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              </div>
              <form action="./recuperar.php" method="post">
              <div class="modal-body">
                <p>Entre com o seu e-mail para resetar sua senha.</p>
                <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">
              </div>
              <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Cancelar</button>
                <button class="btn btn-theme" type="submit" type="button">Enviar</button>
			  </div>
			  </form>
            </div>
          </div>
        </div>
        <!-- modal -->

			<div class="container container-signup container-transparent animated fadeIn">
				<h3 class="text-center">Sign Up</h3>
				<div class="login-form">
					<div class="form-group">
						<label for="fullname" class="placeholder"><b>Fullname</b></label>
						<input id="fullname" name="fullname" type="text" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="email" class="placeholder"><b>Email</b></label>
						<input id="email" name="email" type="email" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="passwordsignin" class="placeholder"><b>Password</b></label>
						<div class="position-relative">
							<input id="passwordsignin" name="passwordsignin" type="password" class="form-control" required>
							<div class="show-password">
								<i class="icon-eye"></i>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="confirmpassword" class="placeholder"><b>Confirm Password</b></label>
						<div class="position-relative">
							<input id="confirmpassword" name="confirmpassword" type="password" class="form-control" required>
							<div class="show-password">
								<i class="icon-eye"></i>
							</div>
						</div>
					</div>
					<div class="row form-sub m-0">
						<div class="custom-control custom-checkbox">
							<input type="checkbox" class="custom-control-input" name="agree" id="agree">
							<label class="custom-control-label" for="agree">I Agree the terms and conditions.</label>
						</div>
					</div>
					<div class="row form-action">
						<div class="col-md-6">
							<a href="#" id="show-signin" class="btn btn-danger btn-link w-100 fw-bold">Cancel</a>
						</div>
						<div class="col-md-6">
							<a href="#" class="btn btn-secondary w-100 fw-bold">Sign Up</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="js/mascaras.js"></script>
	<!--   Core JS Files   -->
	<script src="js/core/jquery.3.2.1.min.js"></script>
	<script src="js/core/popper.min.js"></script>
	<script src="js/core/bootstrap.min.js"></script>

	<!-- jQuery UI -->
	<script src="js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

	<!-- Atlantis JS -->
	<script src="js/atlantis.min.js"></script>
	<script src="js/atlantislogin.min.js"></script>
</body>

</html>
