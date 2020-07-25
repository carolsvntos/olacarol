<?php
$pageTitle = 'Projetos';
include 'header.php';
?>
<div class="container o-content">
	<div class="row">
		<div class="col-6">
			<h2>Projetos</h2>
		</div>
		<div class="col-6 o-job-filter">
			<!--<select>
				<option>Todas as categorias</option>
				<option>Design gráfico</option>
				<option>Identidade visual</option>
				<option>Ilustração</option>
				<option>Web</option>
			</select>-->
			<div class="dropdown">
				<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Filtrar
				</button>
				<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
					<button class="dropdown-item" onclick="filterSelection('all')">Todas as categorias</button>
					<button class="dropdown-item" onclick="filterSelection('design')">Design gráfico</button>
					<button class="dropdown-item" onclick="filterSelection('identidade')">Identidade visual</button>
					<button class="dropdown-item" onclick="filterSelection('ilustracao')">Ilustração</button>
					<button class="dropdown-item" onclick="filterSelection('web')">Web</button>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<p>Veja abaixo alguns exemplos de trabalhos em design gráfico, identidade visual, ilustração e web da designer Carol Santos em São Paulo, SP.</p>
		</div>
	</div>
	<div class="row o-job-list">
		<div class="col">
			<a href="d-va" class="filterDiv ilustracao">
				<img src="https://olacarol.com.br/blog/wp-content/uploads/2018/08/dvaavatar-1170x1170.jpg">
				<p>
					<span>Ilustração</span><br />
					D.Va, Hana Song
				</p>
			</a>
			<a href="oceana" class="filterDiv web">
				<img src="https://olacarol.com.br/blog/wp-content/uploads/2018/08/home-avatar-1170x1170.jpg">
				<p>
					<span>Web</span><br />
					Oceana
				</p>
			</a>
			<a href="coletum" class="filterDiv web">
				<img src="../images/coletum-thumb.jpg">
				<p>
					<span>Web</span><br />
					Coletum
				</p>
			</a>
			<a href="dn-assessoria" class="filterDiv identidade">
				<img src="https://olacarol.com.br/blog/wp-content/uploads/2017/06/18920213_415373625516573_4599602564023401118_n-1170x1170.png">
				<p>
					<span>Identidade visual</span><br />
					DN Assessoria
				</p>
			</a>
			<a href="boom-inteligencia-digital" class="filterDiv identidade">
				<img src="https://olacarol.com.br/blog/wp-content/uploads/2017/05/avatar-1170x1170.jpg">
				<p>
					<span>Identidade visual</span><br />
					Boom Inteligência Digital
				</p>
			</a>
			<a href="junta-7" class="filterDiv identidade">
				<img src="https://olacarol.com.br/blog/wp-content/uploads/2016/06/13255950_1330404993642087_6729721687026519349_n-1170x1170.jpg">
				<p>
					<span>Identidade visual</span><br />
					Junta 7
				</p>
			</a>
			<a href="projeto-luz-e-amor" class="filterDiv identidade">
				<img src="https://olacarol.com.br/blog/wp-content/uploads/2016/06/luzeamor-thumbnail-1170x1170.jpg">
				<p>
					<span>Identidade visual</span><br />
					Projeto Luz & Amor
				</p>
			</a>
			<a href="scaffold-platform" class="filterDiv web">
				<img src="../images/scaffold-thumb.jpg">
				<p>
					<span>Web</span><br />
					Scaffold Platform
				</p>
			</a>
			<a href="inquisitora" class="filterDiv ilustracao">
				<img src="https://olacarol.com.br/blog/wp-content/uploads/2016/06/ilustra-thumbnail-1170x1170.jpg">
				<p>
					<span>Ilustração</span><br />
					Inquisitora
				</p>
			</a>
			<a href="auxilium" class="filterDiv web identidade">
				<img src="/images/auxilium-thumb.jpg">
				<p>
					<span>Web</span><br />
					Auxilium
				</p>
			</a>
			<a href="ilustracao-tatuagem" class="filterDiv ilustracao">
				<img src="https://olacarol.com.br/blog/wp-content/uploads/2016/06/tat-miniatura-1170x1170.jpg">
				<p>
					<span>Ilustração</span><br />
					Ilustração para Tatuagem
				</p>
			</a>
			<a href="womansplaining" class="filterDiv identidade">
				<img src="https://olacarol.com.br/blog/wp-content/uploads/2015/06/womansplaining1-1170x1170.jpg">
				<p>
					<span>Identidade visual</span><br />
					Womansplaining
				</p>
			</a>
			<a href="diagramacao" class="filterDiv design">
				<img src="https://olacarol.com.br/blog/wp-content/uploads/2015/06/banner-diagramacao-1024x512-440x320-1170x1170.jpg">
				<p>
					<span>Design gráfico</span><br />
					Diagramação
				</p>
			</a>
			<a href="lettore" class="filterDiv web">
				<img src="/images/lettore-app-thumb.jpg">
				<p>
					<span>Web</span><br />
					Aplicativo Lettore
				</p>
			</a>
			<a href="lettore-identidade-visual" class="filterDiv identidade">
				<img src="/images/lettore-logo-thumb.jpg">
				<p>
					<span>Identidade visual</span><br />
					Lettore
				</p>
			</a>
			<a href="camplearning-loja" class="filterDiv web">
				<img src="/images/camplearning-thumb.jpg">
				<p>
					<span>Web</span><br />
					E-Commerce CampLearning
				</p>
			</a>
			<a href="plena-voz" class="filterDiv identidade">
				<img src="https://olacarol.com.br/blog/wp-content/uploads/2015/02/thumbnails-plenavoz-1170x1170.jpg">
				<p>
					<span>Identidade visual</span><br />
					Plena Voz
				</p>
			</a>
			<a href="aonde-nao-ir" class="filterDiv identidade">
				<img src="https://olacarol.com.br/blog/wp-content/uploads/2015/06/thumbnails-aondenaoir-1170x1170.jpg">
				<p>
					<span>Identidade visual</span><br />
					Aonde Não Ir
				</p>
			</a>
			<a href="projeto-tcc" class="filterDiv identidade">
				<img src="https://olacarol.com.br/blog/wp-content/uploads/2015/06/thumbnails-aria2-1170x1170.jpg">
				<p>
					<span>Identidade visual</span><br />
					Projeto de TCC
				</p>
			</a>
			<a href="cartaz-premio-excelencia-grafica" class="filterDiv identidade">
				<img src="https://olacarol.com.br/blog/wp-content/uploads/2013/05/thumbnails-premio-1170x1170.jpg">
				<p>
					<span>Identidade visual</span><br />
					Cartaz Prêmio Excelência Gráfica
				</p>
			</a>
		</div>
	</div>
</div>
<script>
	filterSelection("all")
function filterSelection(c) {
  var x, i;
  x = document.getElementsByClassName("filterDiv");
  if (c == "all") c = "";
  for (i = 0; i < x.length; i++) {
    w3RemoveClass(x[i], "show");
    if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
  }
}
function w3AddClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    if (arr1.indexOf(arr2[i]) == -1) {element.className += " " + arr2[i];}
  }
}
function w3RemoveClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    while (arr1.indexOf(arr2[i]) > -1) {
      arr1.splice(arr1.indexOf(arr2[i]), 1);     
    }
  }
  element.className = arr1.join(" ");
}
// Add active class to the current button (highlight it)
var btnContainer = document.getElementById("myBtnContainer");
var btns = btnContainer.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function(){
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}
</script>
<?php
include('footer.php');
?>