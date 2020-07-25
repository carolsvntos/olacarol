<?php
$pageTitle = 'Contato';
include 'header.php';
?>
<div class="container o-content">
	<div class="row">
		<div class="col">
			<h2>Contato</h2>
			<p>
				<ul class="o-social-networks">
					<li><a href="" target="_blank"><i class="fab fa-facebook"></i></a></li>
					<li><a href="" target="_blank"><i class="fab fa-instagram"></i></a></li>
					<li><a href="" target="_blank"><i class="fab fa-dribbble"></i></a></li>
					<li><a href="" target="_blank"><i class="fab fa-github"></i></a></li>
					<li><a href="" target="_blank"><i class="fab fa-linkedin"></i></a></li>
				</ul>
			</p>
			<p>Use o formulário abaixo para entrar em contato comigo. Podemos conversar sobre seu futuro projeto! Você também pode entrar em contato via e-mail, telefone ou pelas redes sociais acima.</p>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<form id="contato" action="/mail.php" method="POST">
				<div class="form-group">
					<label for="name">Nome</label>
					<input type="text" id="name" name="name" class="form-control" required>
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<input type="email" id="email" name="email" class="form-control" required>
				</div>
				<div class="form-group email2">
					<label for="email2">Email2</label>
					<input type="email" id="email2" name="email2" class="form-control">
				</div>
				<div class="form-group">
					<label for="message">Mensagem</label>
					<textarea type="text" id="message" name="message" class="form-control" rows="3" required></textarea>
				</div>
				<div class="form-group">
				    <div class="g-recaptcha" data-sitekey="6Ld5uKsZAAAAAPDU8VsK57xHW46mMNw7HedcwbRK"></div>
                </div>
				<button type="submit" class="o-btn">Entrar em contato</button>
			</form>
		</div>
	</div>
</div>
<?php
include('footer.php');
?>