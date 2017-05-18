<div id="contenido" style="display: {{visible}};">
<section class="margin-top-60">
&nbsp;</section>
<section>
    <div class="container" ng-init="confirmado=false;sinconfirmar=false;" >
		<div class="row">
                        <div class="col-lg-1"></div>
			<div class="col-lg-10" ng-show="confirmado" >
				<h2 class="text-center tam-2-5">¡Felicidades!</h2>
                <hr>
				<p class="text-center" >
				Tu correo electrónico fue confirmado.</p>    
				<hr>	
				<div class="text-center">
					<!--<a class="btn btn-violeta btn-lg text-center" >Confirmar correo</a>-->
				</div>
				<p class="text-center">Visita nuestra pagina principal de <a href="http://tuclasedebaile.com.co" >Tu Clase de Baile</a></p>
                <!--<h2 class="text-center tam-3">Espéralo 2016</h2>-->
                
			</div>
			<div class="col-lg-10" ng-show="sinconfirmar">
				<h2 class="text-center tam-2-5">¡ Lo Sentimos !</h2>
                <hr>
				<p class="text-center" >
				Tu correo electrónico no se encuentra en nuestra base de datos te invitamos a que te registres.</p>    
				<hr>	
				<div class="text-center">
					<a href="#/empezar" class="btn btn-violeta btn-lg text-center" >Registrate</a>
				</div>
                <!--<h2 class="text-center tam-3">Espéralo 2016</h2>-->
                
			</div>
		</div>
	</div>    
<section class="margin-top-60">
&nbsp;</section>
</div>
<script type="text/javascript-lazy">
   loadjscssfile("js/function/cargar.js", "js");
</script>

