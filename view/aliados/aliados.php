<div id="contenido" style="display: {{visible}};">
<section class="banner-postularse">
    
<div class="container">

    <div class="col-xs-12 hidden-lg hidden-md"><img class="img-responsive imagen_arriba" src="img/postularse-principal.jpg"></div>

    <div class="col-xs-5 text-center hidden-sm text_header_aliados">

    <div style="padding-top: 25%"></div>

    <h1>ÚNETE A NUESTRO EQUIPO <br> DE ALIADOS</h1>

    </div>

    <div class="col-md-3 div-registro">
    <div class="text-center div-titulo">Empieza Ya</div>

    <div class="alert alert-warning" role="alert" ng-show="vduplicado" >El correo ya se encuentra registrado.</div>
    <div class="alert alert-warning" role="alert" ng-show="vincorrecto" >Por favor verifique los datos introducidos.</div>

    <form name="MyForm" id="MyForm" role="form" >
        
        <input type="hidden" name="_token" value="{{ csrf_token() }}">


        <div class="col-sm-12" style="padding-top:10px">
             <div class="form-group">

                <div class="fg-line">
                <input type="text" class="form-control input-sm" name="nombre" id="nombre" placeholder="Nombre" ng-model="formInfo.Nombre">
                </div>
                
             </div>
             <span ng-show="nombreRequired">{{nombreRequired}}</span>
        </div>


            <br>

            <div class="col-sm-12">
             <div class="form-group">

                <div class="fg-line">
                <input type="text" class="form-control input-sm" name="nombre" id="apellido" placeholder="Apellido" ng-model="formInfo.Apellido">
                </div>
                
             </div>
             <span ng-show="apellidoRequired">{{apellidoRequired}}</span>
            </div>


            <br>

        
            <div class="col-sm-12">
             <div class="form-group">

                <div class="fg-line">
                <input type="email" class="form-control input-sm" name="email" id="email" placeholder="Correo electrónico" ng-model="formInfo.Email">
                </div>
                
             </div>
             <span ng-show="emailRequired">{{emailRequired}}</span>
            </div>


            <div class="col-sm-12">
             <div class="form-group">
                <div class="fg-line">
                <input type="email" class="form-control input-sm" name="email_confirmation" id="email_confirmation" placeholder="Repite correo electrónico" ng-model="formInfo.EmailConfirmation">
                </div>
                
             </div>
              <span ng-show="emailConfirmationRequired">{{emailConfirmationRequired}}</span>
             </div>


            <br>


           <br>

                    <div class="col-sm-12">
                      <div class="form-group">
                            <div class="fg-line">
                              <div class="select">
                                  <select class="form-control" id="pais_id" name="pais_id" placeholder="Seleccione>>" ng-model="formInfo.Pais">
                                  <option value="">Pais</option>
                                  <option value="1">Venezuela</option>
                                  <option value="2">Guatemala</option>
                                  <option value="3">Ecuador</option>
                                  <option value="4">Uruguay</option>
                                  <option value="5">Argentina</option>
                                  <option value="6">Chile</option>
                                  <option value="7">Perú</option>
                                  <option value="8">República dominicana</option>
                                  <option value="9">Brazil</option>
                                  <option value="10">México</option>
                                  <option value="11">Colombia</option>
                                  <option value="12">Honduras</option>
                                  <option value="13">Nicaragua</option>
                                  <option value="14">Bolivia</option>
                                  <option value="15">Costa rica</option>
                                  <option value="16">El salvador</option>
                                  <option value="17">Puerto rico</option>
                                  <option value="18">Paraguay</option>
                                  <option value="19">Panama</option>
                                  </select>
                                </div>
                            </div>
                        </div>
                        <span ng-show="paisRequired">{{paisRequired}}</span>
                    </div>

                    <div class="clearfix"></div>

                <div class="text-center">

                <br><br>

                   <button type="button" ng-show="enviando" class="btn btn-blanco-grande text-uppercase m-r-10 f-22 guardar" id="guardar" name ="guardar" ng-click="saveAliado()">Llévame</button>
                   <div class="alert alert-info" role="alert" ng-show="procesando" >Espere un momento estamos procesando</div>
                   <br>
                   
                </div>
                 <br>
            </form>


            </div>
        </div>

</section>


<section class="padding-top-bottom-50 fondo-gray">
   <div class="container">
    <div class="row">
        <div class="col-md-6 padding-top-10" style="padding-left: 25px">

            <h3>Ventajas</h3>

            <p class="padding-bottom-10">
                <p><i class="fa fa-check color-azul"></i> Más de 10 años de experiencia nos respaldan</p>
                <p><i class="fa fa-check color-azul"></i> Manuales de procedimientos por departamentos</p>
                <p><i class="fa fa-check color-azul"></i> Operatividad  fácil y sencilla</p>
                <p><i class="fa fa-check color-azul"></i> Personal cualificado  y en constante formación</p>
                <p><i class="fa fa-check color-azul"></i> Sistema de software único para academias de baile</p>
                <p><i class="fa fa-check color-azul"></i> Líderes en presencia de la web en el gremio del baile  con departamentos de Marketing digital y diseño</p>
            </p>            
        </div> 
        <div class="col-md-6 text-center padding-top-10">
            <img class="img-responsive w100" src="img/socios.jpg" style="margin: 0 auto">
        </div> 
        <div class="clearfix padding-bottom-40"></div>

        <div class="col-md-12 text-center">
            
            <a class="btn btn-azul-claro-grande btn-lg text-uppercase subir">Quiero Unirme</a> 

        </div>      
    </div>       
   </div>
</section>

<section class="fondo-clouds padding-top-bottom-50">
  <div class="container">
  <div class="row">
    <h3 class="text-center">Ofrecemos</h3>  
    <div class="col-md-4 padding-top-bottom-20 text-center">
        <img src="img/icono_crecimiento-08.png" class="img-circle img-responsive img-center img-150" alt="">
        <h4>CRECIMIENTO </h4>                    
        <p>Mantenemos un proceso de crecimiento de mejoramiento continuo.</p>
    </div>
    <div class="col-md-4 padding-top-bottom-20 text-center">
        <img src="img/icono_orzanizacion-07.png" class="img-circle img-responsive img-center img-150" alt="">
        <h4>ORGANIZACIÓN</h4>  
        <p>Somos apasionados por la planificacion y organización.</p>   
    </div>
    <div class="col-md-4 padding-top-bottom-20 text-center ">
        <img src="img/icono_h-tecnologicas-06.png" class="img-circle img-responsive img-center img-150" alt="">
        <h4>HERRAMIENTAS INNOVADORAS</h4>  
        <p>Contamos con herramientas de última tecnología para brindar crecimiento a nuestros aliados.</p> 
    </div>

     <div class="clearfix padding-bottom-40"></div>

    <div class="col-md-12 text-center">
        
        <a class="btn btn-azul-claro-grande btn-lg text-uppercase subir">Quiero más información</a> 

    </div>      
  </div>
  </div> 
</section>


</div>
<script type="text/javascript-lazy">
   loadjscssfile("js/function/cargar.js", "js");

   $(".subir").click(function(){

      $("html, body").animate({ scrollTop: 0 }, "slow");

   });
</script>