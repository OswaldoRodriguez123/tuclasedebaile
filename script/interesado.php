<?php
class Interesado
{
    public function index(){
        header("location: http://tuclasedebaile.com.co");
    }

    public function agregar() {

      if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
      {
        print_r($_POST);

        if($_SERVER['HTTP_REFERER'] == "http://tuclasedebaile.com.co"){
            print_r($_POST);

            if(isset($_POST['data']['agregar']) && $_POST['data']['agregar']=='agregarInteresado'){

                $correo= isset($_POST['data']['correo']) ? trim($_POST['data']['correo']) : "";
                $clave= isset($_POST['data']['password']) ? trim($_POST['data']['password']) : "";
                $nombre= isset($_POST['data']['nombre']) ? trim($_POST['data']['nombre']) : "";
                $apellido= isset($_POST['data']['apellido']) ? trim($_POST['data']['apellido']) : "";
                $telefono= isset($_POST['data']['telefono']) ? trim($_POST['data']['telefono']) : "";
                $cargo= isset($_POST['data']['cargo']) ? trim($_POST['data']['cargo']) : "";

                $academia= isset($_POST['data']['academia']) ? trim($_POST['data']['academia']) : "";
                $direccion= isset($_POST['data']['direccion']) ? trim($_POST['data']['direccion']) : "";
                $telefono_local= isset($_POST['data']['telefonolocal']) ? trim($_POST['data']['telefonolocal']) : "";
                $telefono_movil= isset($_POST['data']['telefonomovil']) ? trim($_POST['data']['telefonomovil']) : "";
                $pais= isset($_POST['data']['pais']) ? trim($_POST['data']['pais']) : "";
                $estado= isset($_POST['data']['estado']) ? trim($_POST['data']['estado']) : "";
                $entero= isset($_POST['data']['entero']) ? trim($_POST['data']['entero']) : "";
                $region= isset($_POST['data']['region']) ? trim($_POST['data']['region']) : "";

                if(!empty($correo) && !empty($clave)  && !empty($nombre)  && !empty($apellido) &&
                    !empty($telefono) && !empty($cargo) && !empty($academia) && !empty($direccion) && !empty($telefono_movil) && !empty($pais) && !empty($estado) &&
                    !empty($entero) && !empty($region)){

                    $data=array('correo'=>$correo, 'clave'=>$clave, 'nombre'=>$nombre, 'apellido'=>$apellido, 'telefono'=>$telefono, 'cargo'=>$cargo,
                        'academia'=>$academia, 'direccion'=>$direccion, 'telefono_local'=>$telefono_local, 'telefono_movil'=>$telefono_movil, 'pais'=>$pais, 'estado'=>$estado, 'entero'=>$entero, 'region'=>$region);
                    require_once ('../class/class_db_interesado.php');
                    $DBInteresado = new DBInteresado();
                    $estado=$DBInteresado->agregar($data);

                    $codigo=$estado['codigo'];
                    $md5=md5($codigo);
                    if($estado['mensaje']=="agregado"){
                        $arraydata=array("estado"=>"bien", "mensaje"=>"Se ha agregado satisfactoriamente", "token"=>$md5.'-'.base64_encode($codigo) );

                    }else{
                        $arraydata=array("estado"=>"mal", "mensaje"=>"Se ocurrido se ha ejecutado la operacion");
                    }
                }else{
                    $arraydata=array("estado"=>"mal", "mensaje"=>"Los campos se encuentra vacios");
                }
                header('Content-type: application/json; charset=utf-8');

                echo json_encode($arraydata);

                exit();

            }else{

                $arraydata=array("estado"=>"mal", "mensaje"=>"solicitud no procesada");
                header('Content-type: application/json; charset=utf-8');
                echo json_encode($arraydata);
                exit();

            }
        }else{
           $arraydata=array("estado"=>"mal", "mensaje"=>"La solicitud no fue procesada");
           header('Content-type: application/json; charset=utf-8');
           echo json_encode($arraydata);
           exit();
        }
      }else{
        $arraydata=array("estado"=>"mal", "mensaje"=>"La solicitud no fue procesada");
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($arraydata);
        exit();
      }
    }

    public function academia() {

      if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
      {
        if($_SERVER['HTTP_REFERER'] == "http://tuclasedebaile.com.co"){
             if(isset($_POST['data']['agregar']) && $_POST['data']['agregar']=='agregarAcademia'){


                $academia= isset($_POST['data']['academia']) ? trim($_POST['data']['academia']) : "";
                $direccion= isset($_POST['data']['direccion']) ? trim($_POST['data']['direccion']) : "";
                $telefono_local= isset($_POST['data']['telefonolocal']) ? trim($_POST['data']['telefonolocal']) : "";
                $telefono_movil= isset($_POST['data']['telefonomovil']) ? trim($_POST['data']['telefonomovil']) : "";
                $pais= isset($_POST['data']['pais']) ? trim($_POST['data']['pais']) : "";
                $estado= isset($_POST['data']['estado']) ? trim($_POST['data']['estado']) : "";
                $entero= isset($_POST['data']['entero']) ? trim($_POST['data']['entero']) : "";

                $vLimpiar= new InputFilter();
                $academia=$vLimpiar->process($academia);
                $direccion=$vLimpiar->process($direccion);
                $telefono_local=$vLimpiar->process($telefono_local);
                $telefono_movil=$vLimpiar->process($telefono_movil);
                $pais=$vLimpiar->process($pais);
                $estado=$vLimpiar->process($estado);
                $entero=$vLimpiar->process($entero);

                if(!empty($academia) && !empty($direccion)  && !empty($telefono_local)  && !empty($telefono_movil) && !empty($pais) && !empty($estado) && !empty($entero)){

                    $data=array('academia'=>$academia, 'direccion'=>$direccion, 'telefono_local'=>$telefono_local, 'telefono_movil'=>$telefono_movil, 'pais'=>$pais, 'estado'=>$estado, 'entero'=>$entero);
                    $estado=DBInteresado::insertAcademia($data);
                    $codigo=$estado['codigo'];
                    $md5=md5($codigo);
                    if($estado['mensaje']=="agregado"){
                        $arraydata=array("estado"=>"bien", "mensaje"=>"Se ha agregado satisfactoriamente" );

                        $para=$correo;
                        $copia='alejandrogarcia15@gmail.com';
                        $cuerpo='';
                        $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
                        $cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";
                        // Cabeceras adicionales
                        $cabeceras .= 'To: '.$nombre.' <'.$para.'>' . "\r\n";
                        $cabeceras .= 'From: Confirmación de correo <'.$copia.'>' . "\r\n";
                        $cabeceras .= 'Bcc: '.$copia.' ' . "\r\n";

                        if(mail(para, $asunto, $cuerpo, $cabeceras)){
                            $mensajeStatus = true;
                        }else{
                            $mensajeStatus = false;
                        }
        
                    }else{
                        $arraydata=array("estado"=>"mal", "mensaje"=>"Se ocurrido se ha ejecutado la operacion");
                    }
                }else{
                    $arraydata=array("estado"=>"mal", "mensaje"=>"Los campos se encuentra vacios");
                }
                header('Content-type: application/json; charset=utf-8');

                echo json_encode($arraydata);

                exit();

             }else{
               $arraydata=array("estado"=>"mal", "mensaje"=>"La solicitud no fue procesada");
               header('Content-type: application/json; charset=utf-8');
               echo json_encode($arraydata);
               exit();
            }
        }else{
            $arraydata=array("estado"=>"mal", "mensaje"=>"La solicitud no fue procesada");
            header('Content-type: application/json; charset=utf-8');
            echo json_encode($arraydata);
            exit();
        }
      }else{
        $arraydata=array("estado"=>"mal", "mensaje"=>"La solicitud no fue procesada");
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($arraydata);
        exit();
      }

    }

    private function enviar($correo){
        $para=$correo;
        $copia='coliseodelasalsa@gmail.com';
        $cuerpo='<table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable">
                    <tr>
                        <td align="center" valign="top">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%" id="emailContainer">
                                <tr>
                                    <td align="center" valign="top">
                                        <table border="0" cellpadding="10" cellspacing="0" width="100%" id="emailHeader-New">
                                            <tr>
                                                <td align="center" valign="top" style="text-align:center;font-size:24px;color:#626262;">
                                                    <strong>La Elite</strong> <br>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" valign="top">
                                        <table border="0" cellpadding="30" cellspacing="0" width="100%" id="emailBody">
                                            <tr>
                                                <td align="center" valign="top" style="text-align:center;font-size:16px;background-color: #eaeaea;color:#7b7777;">

                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" valign="top">
                                        <table border="0" cellpadding="10" cellspacing="0" width="100%" id="emailBody_v2">
                                            <tr>
                                                <td align="center" valign="top" style="text-align:center;font-size:16px;background-color: #cbcbcb;color:#838181;font-weight:bold;">
                                                    Datos de Contacto<br>
                                                    Nombre:  <br>
                                                    Correo:  <br>
                                                    Enviado desde www.mielite.com.ve
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" valign="top">
                                        <table border="0" cellpadding="10" cellspacing="0" width="100%" id="emailFooter">
                                            <tr>
                                                <td align="center" valign="top" style="">
                                                   &nbsp;&nbsp;
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>';
        $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
        $cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";
        // Cabeceras adicionales
        $cabeceras .= 'To: La Elite <'.$para.'>' . "\r\n";
        $cabeceras .= 'From: Contacto La Elite <'.$copia.'>' . "\r\n";
        $cabeceras .= 'Bcc: '.$copia.' ' . "\r\n";

        if(mail(para, $asunto, $cuerpo, $cabeceras)){
            $mensajeStatus = true;
        }else{
            $mensajeStatus = false;
        }
    }
}

?>
<?php

    if(isset($_POST['data']['agregar']) && $_POST['data']['agregar']=='agregarInteresado'){



                $correo= isset($_POST['data']['Email']) ? trim($_POST['data']['Email']) : "";
                $nombre= isset($_POST['data']['Nombre']) ? trim($_POST['data']['Nombre']) : "";
                $sexo= isset($_POST['data']['Sexo']) ? trim($_POST['data']['Sexo']) : "";


                $telefono_local= isset($_POST['data']['Telefono']) ? trim($_POST['data']['Telefono']) : "";
                $telefono_movil= isset($_POST['data']['Celular']) ? trim($_POST['data']['Celular']) : "";
                $entero= isset($_POST['data']['ComoNosConociste']) ? trim($_POST['data']['ComoNosConociste']) : "";
                $region= isset($_POST['data']['Region']) ? trim($_POST['data']['Region']) : "";

  

                if(!empty($correo) && !empty($nombre) && !empty($sexo)
                    && !empty($telefono_local)  && !empty($telefono_movil) && !empty($entero) && !empty($region)){

                    require_once ('../class/class_db_interesado.php');
                    $DBInteresado = new DBInteresado();

                    $arraydata=array();

                    $data=array('correo'=>$correo, 'nombre'=>$nombre, 'telefono_local'=>$telefono_local, 'telefono_movil'=>$telefono_movil, 'entero'=>$entero, 'region'=>$region, 'sexo'=>$sexo);

                    $status=$DBInteresado->agregar($data);

                    $envio=true;
                    if($status['mensaje']=="agregado" && $envio==true){
                        $arraydata=array("estado"=>"bien", "mensaje"=>"Se ha agregado satisfactoriamente" );
                        $para=$correo;

                        if($region == 1){
                            $sede = 'tuclasedebaileoficial@gmail.com';
                            $numero = '300 645 4271';
                        }else if($region == 2){
                            $sede = 'tuclasedebailevzla@gmail.com';
                            $numero = '04246352596 / 04146215928';
                        }else if($region == 3){
                            $sede = 'helmer.morcillo@cfcya.co';
                            $numero = '313 737 1279';
                        }else{
                            $sede = 'henryfuenmayor13@gmail.com';
                            $numero = '300 645 4271';
                        }

                        $de='tuclasedebaileoficial@gmail.com';
                        $asunto='Registro tu clase de baile';
                        $asunto_cliente='Información tu clase de baile';
                        $copia='alejandrogarcia15@gmail.com';
                        $correo_principal='alejandrogarcia15@gmail.com';

                        $cuerpo='<table style="table-layout:fixed" bgcolor="#efefef" border="0" cellpadding="0" cellspacing="0" width="100%">
                          <tbody><tr>
                            <td valign="top">
                              <table align="center" bgcolor="#efefef" border="0" cellpadding="0" cellspacing="0" width="600">
                                <tbody><tr>
                                  <td width="11">
                                    &nbsp;</td>
                                  <td valign="top" width="579">
                                    <table border="0" cellpadding="0" cellspacing="0" width="579">
                                      <tbody><tr>
                                        <td style="font-size:2px" height="5">
                                        </td>
                                      </tr>

                                      <tr>
                                        <td style="font-size:2px" height="12">
                                        </td>
                                      </tr>
                                      <tr>
                                        <td height="14" valign="top">
                                          <table style="line-height:0" height="14" border="0" cellpadding="0" cellspacing="0" width="579">
                                            <tbody><tr height="14">
                                              <td height="14" valign="top">
                                                <img class="CToWUd" alt="" src="https://ci4.googleusercontent.com/proxy/_fDpSAmiJ3_gqrJKi9c14Gm_FeFo-f0j8HnvVEOtLOy430VDXYHjoZiNTkDJAw6DTA_PNK58gjoJ-uuViWYZlt_mmafNNpsG52G1f6UcBv3P=s0-d-e1-ft#http://pkt-emails.s3.amazonaws.com/rounded_top-original.gif" border="0">
                                              </td>
                                            </tr>
                                          </tbody></table>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td bgcolor="#FFFFFF" valign="top">
                                          <table border="0" cellpadding="0" cellspacing="0" width="579">
                                            <tbody><tr>
                                              <td width="33">
                                                &nbsp;</td>
                                              <td valign="top" width="510">
                                                <table border="0" cellpadding="0" cellspacing="0" width="510"> <!-- PRIMERA TABLA -->
                                                  <tbody><tr>
                                                    <td style="font-size:2px" height="10">
                                                    </td>
                                                  </tr>

                                                  <tr>
                                                    <td align="center" valign="top"><img class="CToWUd" alt="Pocket-logo-email-original" src="http://tuclasedebaile.easydancelatino.com/img/logo.png" width="120">
                                                    </td>
                                                  </tr>

                                                  <tr>
                                                    <td style="font-size:2px" height="30">
                                                    </td>
                                                  </tr>


                                                  <tr>
                                                    <td align="center" valign="top"><img class="CToWUd" alt="Pocket-logo-email-original" src="http://oi65.tinypic.com/otf8s5.jpg" height="200" width="500">
                                                    </td>
                                                  </tr>

                                                  <tr>
                                                    <td style="font-size:2px" height="30">
                                                    </td>
                                                  </tr>

                                                       <tr style="width:100%">
                                                    <td valign="top" style="text-align:center">
                                                      <font style="font-size:16px;line-height:18px;color:#000000;font-weight:bold;">
                                                        <strong style="font-size:20px;" >Registro</strong>
                                                        <p><strong:>Nombre: </strong> '.$nombre.'</p>
                                                        <p><strong:>Correo: </strong> '.$para.'</p>
                                                        <p><strong:>Sexo: </strong> '.$sexo.'</p>
                                                        <p><strong:>Teléfono Móvil: </strong> '.$telefono_movil.'</p>
                                                        <p><strong:>Teléfono Local: </strong> '.$telefono_local.'</p>
                                                        <br>
                                                      </font>
                                                  </td>
                                                  </tr>




                                                  </table> <!-- PRIMERA TABLA -->


                                                   <!-- SEGUNDA TABLA -->

                                                   <!-- TERCERA TABLA -->
                                              </td>
                                              <td width="36">
                                                &nbsp;</td>
                                            </tr>
                                          </tbody></table>
                                        </td>

                                      </tr> <!-- FINAL -->

                                        <tr>
                                            <td align="center" valign="top">
                                                <table style="height:57px;table-layout:fixed" border="0" cellpadding="0" cellspacing="0" width="100%">
                                                    <tbody><tr>
                                                        <td style="height:57px;width:27px" valign="top">
                                                            <img class="CToWUd" alt="" src="http://easydancelatino.com/img/correos/footerimg-leftspacer@2x.png?v=2" style="width:27px;min-height:57px" border="0">
                                                        </td>
                                                        <td style="font-size:1px;line-height:1px;font-family:Helvetica Neue,Helvetica,arial,sans-serif;color:#ffffff;text-align:left;height:57px;width:104px" align="left" valign="top">
                                                            <a href="http://tuclasedebaile.com.co/" style="color:#ffffff;font-weight:normal;text-decoration:underline" target="_blank"><img class="CToWUd" alt="" src="http://oi65.tinypic.com/2ewfspf.jpg" style="width:104px;max-height:57px" border="0"></a>
                                                        </td>
                                                        <td style="font-size:1px;height:57px;line-height:1px;width:277px" height="57" valign="top" width="277">
                                                            <img class="CToWUd" alt="" src="http://easydancelatino.com/img/correos/footerimg-middlespacer@2x.png?v=2" style="width:277px;min-height:57px" border="0">
                                                        </td>
                                                        <td style="font-size:1px;line-height:1px;font-family:Helvetica Neue,Helvetica,arial,sans-serif;color:#ffffff;text-align:left;height:57px;width:29px" align="left" valign="top">
                                                            <a href="https://tuclasedebaile.wordpress.com/" style="color:#ffffff;font-weight:normal;text-decoration:underline" target="_blank">
                                                                <img class="CToWUd" alt="Blog" src="http://easydancelatino.com/img/correos/footerimg-blog@2x.png" style="width:29px;min-height:57px" border="0">
                                                            </a>
                                                        </td>
                                                        <td style="font-size:1px;line-height:1px;font-family:Helvetica Neue,Helvetica,arial,sans-serif;color:#ffffff;text-align:left;height:57px;width:40px" align="left" valign="top">
                                                            <img class="CToWUd" alt="" src="http://easydancelatino.com/img/correos/footerimg-divider@2x.png?v=2" style="width:40px;min-height:57px" border="0">
                                                        </td>
                                                        <td style="font-size:1px;line-height:1px;font-family:Helvetica Neue,Helvetica,arial,sans-serif;color:#ffffff;text-align:left;height:57px;width:26px" align="left" valign="top">
                                                            <a href="https://twitter.com/tuclasedebaile" target="_blank">
                                                                <img class="CToWUd" alt="Twitter" src="http://easydancelatino.com/img/correos/footerimg-twitter@2x.png?v=2" style="width:26px;min-height:57px" border="0">
                                                            </a>
                                                        </td>
                                                        <td style="font-size:1px;line-height:1px;font-family:Helvetica Neue,Helvetica,arial,sans-serif;color:#ffffff;text-align:left;height:57px;width:40px" align="left" valign="top">
                                                            <img class="CToWUd" alt="" src="http://easydancelatino.com/img/correos/footerimg-divider@2x.png?v=2" style="width:40px;min-height:57px" border="0">
                                                        </td>
                                                        <td style="font-size:1px;line-height:1px;font-family:Helvetica Neue,Helvetica,arial,sans-serif;color:#ffffff;text-align:left;height:57px;width:10px" align="left" valign="top">
                                                            <a href="https://www.facebook.com/Tuclasedebaileoficial/" style="color:#ffffff;font-weight:normal;text-decoration:underline" target="_blank">
                                                                <img class="CToWUd" alt="Facebook" src="http://easydancelatino.com/img/correos/footerimg-facebook@2x.png?v=2" style="width:10px;min-height:57px" border="0">
                                                            </a>
                                                        </td>
                                                        <td style="height:57px;width:27px" valign="top">
                                                            <img class="CToWUd" alt="" src="http://easydancelatino.com/img/correos/footerimg-rightspacer@2x.png?v=2" style="width:27px;min-height:57px" border="0">
                                                        </td>
                                                    </tr>
                                                </tbody></table>
                                            </td>
                                        </tr>

                                      <tr>
                                        <td valign="top">
                                          <table border="0" cellpadding="0" cellspacing="0" width="579">
                                            <tbody><tr>
                                              <td style="font-size:2px" height="24">
                                              </td>
                                            </tr>
                                            <tr>
                                              <td style="font-size:2px" height="22">
                                              </td>
                                            </tr>
                                          </tbody></table>
                                        </td>
                                      </tr>
                                    </tbody></table>
                                  </td>
                                  <td width="10">
                                    &nbsp;</td>
                                </tr>
                              </tbody></table>
                            </td>
                          </tr>
                        </tbody></table>';

                        $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
                        $cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";
                        // Cabeceras adicionales
                        $cabeceras .= 'To: TuClaseDeBaile '.' <'.$sede.'>' . "\r\n";
                        $cabeceras .= 'From: Tu Clase de Baile <'.$de.'>' . "\r\n";
                        $cabeceras .= 'Bcc: '.$copia.' ' . "\r\n";

                        if(mail($copia, $asunto, $cuerpo, $cabeceras)){
                            $mensajeStatus = true;
                        }else{
                            $mensajeStatus = false;
                        }

                        $cuerpo_cliente='<table style="table-layout:fixed" bgcolor="#efefef" border="0" cellpadding="0" cellspacing="0" width="100%">
                          <tbody><tr>
                            <td valign="top">
                              <table align="center" bgcolor="#efefef" border="0" cellpadding="0" cellspacing="0" width="600">
                                <tbody><tr>
                                  <td width="11">
                                    &nbsp;</td>
                                  <td valign="top" width="579">
                                    <table border="0" cellpadding="0" cellspacing="0" width="579">
                                      <tbody><tr>
                                        <td style="font-size:2px" height="5">
                                        </td>
                                      </tr>

                                      <tr>
                                        <td style="font-size:2px" height="12">
                                        </td>
                                      </tr>
                                      <tr>
                                        <td height="14" valign="top">
                                          <table style="line-height:0" height="14" border="0" cellpadding="0" cellspacing="0" width="579">
                                            <tbody><tr height="14">
                                              <td height="14" valign="top">
                                                <img class="CToWUd" alt="" src="https://ci4.googleusercontent.com/proxy/_fDpSAmiJ3_gqrJKi9c14Gm_FeFo-f0j8HnvVEOtLOy430VDXYHjoZiNTkDJAw6DTA_PNK58gjoJ-uuViWYZlt_mmafNNpsG52G1f6UcBv3P=s0-d-e1-ft#http://pkt-emails.s3.amazonaws.com/rounded_top-original.gif" border="0">
                                              </td>
                                            </tr>
                                          </tbody></table>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td bgcolor="#FFFFFF" valign="top">
                                          <table border="0" cellpadding="0" cellspacing="0" width="579">
                                            <tbody><tr>
                                              <td width="33">
                                                &nbsp;</td>
                                              <td valign="top" width="510">
                                                <table border="0" cellpadding="0" cellspacing="0" width="510"> <!-- PRIMERA TABLA -->
                                                  <tr>
                                                    <td style="font-size:2px" height="10">
                                                    </td>
                                                  </tr>

                                                  <tr>
                                                    <td align="center" valign="top"><img class="CToWUd" alt="Pocket-logo-email-original" src="http://tuclasedebaile.com.co/img/logo.png" width="120">
                                                    </td>
                                                  </tr>

                                                  <tr>
                                                    <td style="font-size:2px" height="30">
                                                    </td>
                                                  </tr>


                                                  <tr>
                                                    <td align="center" valign="top"><img class="CToWUd" alt="Pocket-logo-email-original" src="http://tuclasedebaile.com.co/img/correo_principal.jpg" height="200" width="500">
                                                    </td>
                                                  </tr>

                                                  <tr>
                                                    <td style="font-size:2px" height="30">
                                                    </td>
                                                  </tr>

                                                 <tr style="width:100%">
                                                    <td valign="top" style="text-align:center">
                                                    <font style="font-size:16px;line-height:18px;color:#000000;font-weight:bold;"> Acabas de dar el primer paso, te acompañaremos

                                                    <p>en el logro de tus objetivos</p><br><br>
                                                    </font>
                                                  </td>
                                                  </tr>




                                                  </table> <!-- PRIMERA TABLA -->


                                                  <table border="0" cellpadding="0" cellspacing="0" width="510"> <!-- SEGUNDA TABLA -->

                                                  <tr style="height:150px"> <!-- INICIO PRIMERA IMAGEN -->
                                                    <td align="left" valign="top" style=" width:50%">

                                                    <font style="font-size:13px;color:#000000; text-align:justify">
                                                    <span style="padding-bottom:10px; font-weight:bold">Tecnología</span>

                                                    <p style="padding-right:20px; line-height:22px">
                                                          Sabemos lo mucho que significa para nuestros alumnos que puedan disfrutar de una planificación y organización de altura, por esa razón en nuestra compañía de baile, ponemos a disposición de nuestros alumnos la aplicación web Easy Dance (plataforma tecnológica para el baile).</p></font>
                                                      </td>

                                                      <td align="center" valign="top" style="width:50%">

                                                        <img class="CToWUd" alt="Pocket-logo-email-original" src="http://tuclasedebaile.com.co/img/tecnologia.jpg" style="width:100%; height:230px">
                                                      </td>
                                                  </tr><!-- FINAL PRIMERA IMAGEN -->


                                                  <tr>
                                                    <td style="font-size:2px" height="20">
                                                    </td>
                                                  </tr>


                                                  <tr style="height:150px"> <!-- INICIO SEGUNDA IMAGEN -->

                                                    <td valign="top" style="width:50%">

                                                        <img class="CToWUd" alt="Pocket-logo-email-original" src="http://tuclasedebaile.com.co/img/insignias.jpg" style="width:100%; height:230px">
                                                      </td>

                                                    <td align="right" valign="top" style="width:50%">
                                                      <font style="font-size:13px;color:#000000;  text-align:justify">
                                                      <span style="padding-bottom:10px; font-weight:bold">Certificación</span>
                                                      <p style="padding-left:20px; line-height:22px">
                                                           Nos encanta que nuestros alumnos logren sus metas, por esa razón, les reconocemos su esfuerzo en cada nivel superado, en nuestra academia de baile los niveles corresponden a la siguiente escala. Básico – Intermedio / Intermedio – Avanzado / Avanzado – Master.</p></font>
                                                      </td>


                                                  </tr> <!-- FINAL SEGUNDA IMAGEN -->

                                                  <tr>
                                                    <td style="font-size:2px" height="20">
                                                    </td>
                                                  </tr>

                                                  <tr style="height:150px"> <!-- INICIO TERCERA IMAGEN -->

                                                    <td valign="top" style=" height:200px; width:50%;">

                                                    <font style="font-size:13px;color:#000000;  text-align:justify">

                                                    <span style="padding-bottom:10px; font-weight:bold">Eventos</span>

                                                    <p style="padding-right:20px; line-height:22px">
                                                          Nos caracterizamos por crear grandes eventos de talla regional, nacional e internacional, con experiencia en montaje de grandes escenarios, bailarines de diversas partes de Latinoamérica y artistas de muy alta talla. Nuestros alumnos participan en eventos poniendo a prueba lo que han aprendido durante el año. </p></font>
                                                      </td>

                                                      <td valign="top" style="width:50%">

                                                        <img class="CToWUd" alt="Pocket-logo-email-original" src="http://tuclasedebaile.com.co/img/eventos.jpg" style="width:100%; height:230px">
                                                      </td>
                                                  </tr> <!-- FINAL TERCERA IMAGEN -->

                                                  <tr>
                                                    <td style="font-size:2px" height="20">
                                                    </td>
                                                  </tr>

                                                  <tr>
                                                    <td style="font-size:2px" height="20">
                                                    </td>
                                                  </tr>

                                                  </table><!-- SEGUNDA TABLA -->

                                                  <table border="0" cellpadding="0" cellspacing="0" width="510"> <!-- TERCERA TABLA -->
                                                  <tr style="width:100%">
                                                  <span style="padding-bottom:10px; font-weight:bold">Tenemos mucho que ofrecerte</span>

                                                  <font style="font-size:13px;color:#000000;  text-align:justify">
                                                  <p style="padding-right:20px; line-height:22px">Espera un mensaje informativo de nuestro asesor de servicios, en un lapso no mayor a 72 horas nos comunicaremos contigo, o si prefieres puedes comunicarte a través de WhatsApp al '.$numero.' y con gusto te atenderemos. </p></font>

                                                  <span style="padding-bottom:10px; font-weight:bold">Importante</span>

                                                  <font style="font-size:13px;color:#000000;  text-align:justify">

                                                  <p style="padding-right:20px; line-height:22px">Si eres menor de edad por favor pídele a tus padres que entren en contacto con nosotros.</p></font>
                                                   </tr>
                                                  <tr>
                                                    <td style="font-size:2px" height="20">
                                                    </td>
                                                  </tr>

                                                  <tr>
                                                    <td style="font-size:2px" height="24">
                                                    </td>
                                                  </tr>
                                                </table><!-- TERCERA TABLA -->
                                              </td>
                                              <td width="36">
                                                &nbsp;</td>
                                            </tr>
                                          </tbody></table>
                                        </td>

                                      </tr> <!-- FINAL -->

                                        <tr>
                                            <td align="center" valign="top">
                                                <table style="height:57px;table-layout:fixed" border="0" cellpadding="0" cellspacing="0" width="100%">
                                                    <tbody><tr>
                                                        <td style="height:57px;width:27px" valign="top">
                                                            <img class="CToWUd" alt="" src="http://easydancelatino.com/img/correos/footerimg-leftspacer@2x.png?v=2" style="width:27px;min-height:57px" border="0">
                                                        </td>
                                                        <td style="font-size:1px;line-height:1px;font-family:Helvetica Neue,Helvetica,arial,sans-serif;color:#ffffff;text-align:left;height:57px;width:104px" align="left" valign="top">
                                                            <a href="http://tuclasedebaile.com.co/" style="color:#ffffff;font-weight:normal;text-decoration:underline" target="_blank"><img class="CToWUd" alt="" src="http://tuclasedebaile.com.co/img/footer.jpg" style="width:104px;max-height:57px" border="0"></a>
                                                        </td>
                                                        <td style="font-size:1px;height:57px;line-height:1px;width:277px" height="57" valign="top" width="277">
                                                            <img class="CToWUd" alt="" src="http://easydancelatino.com/img/correos/footerimg-middlespacer@2x.png?v=2" style="width:277px;min-height:57px" border="0">
                                                        </td>
                                                        <td style="font-size:1px;line-height:1px;font-family:Helvetica Neue,Helvetica,arial,sans-serif;color:#ffffff;text-align:left;height:57px;width:29px" align="left" valign="top">
                                                            <a href="https://tuclasedebaile.wordpress.com/" style="color:#ffffff;font-weight:normal;text-decoration:underline" target="_blank">
                                                                <img class="CToWUd" alt="Blog" src="http://easydancelatino.com/img/correos/footerimg-blog@2x.png" style="width:29px;min-height:57px" border="0">
                                                            </a>
                                                        </td>
                                                        <td style="font-size:1px;line-height:1px;font-family:Helvetica Neue,Helvetica,arial,sans-serif;color:#ffffff;text-align:left;height:57px;width:40px" align="left" valign="top">
                                                            <img class="CToWUd" alt="" src="http://easydancelatino.com/img/correos/footerimg-divider@2x.png?v=2" style="width:40px;min-height:57px" border="0">
                                                        </td>
                                                        <td style="font-size:1px;line-height:1px;font-family:Helvetica Neue,Helvetica,arial,sans-serif;color:#ffffff;text-align:left;height:57px;width:26px" align="left" valign="top">
                                                            <a href="https://twitter.com/tuclasedebaile" target="_blank">
                                                                <img class="CToWUd" alt="Twitter" src="http://easydancelatino.com/img/correos/footerimg-twitter@2x.png?v=2" style="width:26px;min-height:57px" border="0">
                                                            </a>
                                                        </td>
                                                        <td style="font-size:1px;line-height:1px;font-family:Helvetica Neue,Helvetica,arial,sans-serif;color:#ffffff;text-align:left;height:57px;width:40px" align="left" valign="top">
                                                            <img class="CToWUd" alt="" src="http://easydancelatino.com/img/correos/footerimg-divider@2x.png?v=2" style="width:40px;min-height:57px" border="0">
                                                        </td>
                                                        <td style="font-size:1px;line-height:1px;font-family:Helvetica Neue,Helvetica,arial,sans-serif;color:#ffffff;text-align:left;height:57px;width:10px" align="left" valign="top">
                                                            <a href="https://www.facebook.com/Tuclasedebaileoficial/" style="color:#ffffff;font-weight:normal;text-decoration:underline" target="_blank">
                                                                <img class="CToWUd" alt="Facebook" src="http://easydancelatino.com/img/correos/footerimg-facebook@2x.png?v=2" style="width:10px;min-height:57px" border="0">
                                                            </a>
                                                        </td>
                                                        <td style="height:57px;width:27px" valign="top">
                                                            <img class="CToWUd" alt="" src="http://easydancelatino.com/img/correos/footerimg-rightspacer@2x.png?v=2" style="width:27px;min-height:57px" border="0">
                                                        </td>
                                                    </tr>
                                                </tbody></table>
                                            </td>
                                        </tr>

                                      <tr>
                                        <td valign="top">
                                          <table border="0" cellpadding="0" cellspacing="0" width="579">
                                            <tbody><tr>
                                              <td style="font-size:2px" height="24">
                                              </td>
                                            </tr>
                                            <tr>
                                              <td style="font-size:2px" height="22">
                                              </td>
                                            </tr>
                                          </tbody></table>
                                        </td>
                                      </tr>
                                    </tbody></table>
                                  </td>
                                  <td width="10">
                                    &nbsp;</td>
                                </tr>
                              </tbody></table>
                            </td>
                          </tr>
                        </tbody></table>';


                        $cabeceras_cliente  = 'MIME-Version: 1.0' . "\r\n";
                        $cabeceras_cliente .= 'Content-type: text/html; charset=utf-8' . "\r\n";
                        // Cabeceras adicionales
                        $cabeceras_cliente .= 'To: '.$nombre.' '.' <'.$para.'>' . "\r\n";
                        $cabeceras_cliente .= 'From: Tu Clase de Baile <'.$de.'>' . "\r\n";
                        $cabeceras_cliente .= 'Bcc: '.$copia.' ' . "\r\n";

                        if(mail($para, $asunto_cliente, $cuerpo_cliente, $cabeceras_cliente)){
                            $mensajeStatus = true;
                        }else{
                            $mensajeStatus = false;
                        }


                    }else{
                        $arraydata=array("estado"=>"mal", "mensaje"=>"ha ocurrido un error no se ha ejecutado la operacion");
                    }
                }else{
                    $arraydata=array("estado"=>"mal", "mensaje"=>"Los campos se encuentra vacios");
                }
                header('Content-type: application/json; charset=utf-8');

                echo json_encode($arraydata);

                exit();




    }

    if(isset($_POST['confirmar']) && $_POST['confirmar']=='confirmar'){

        require_once ('../class/class_db_interesado.php');
        $DBInteresado = new DBInteresado();
        $correo= isset($_POST['correo'])? trim($_POST['correo']) : "";
        $status=$DBInteresado->verificar_correo($correo);

        $arraydata=array();
        if(count($status)>0){
            $resul= $DBInteresado->activar_cuenta($correo);
            if($resul=='1'){
                $arraydata=array('mensaje'=>'confirmado');
            }else{
                $arraydata=array('mensaje'=>'sin confirmar');
            }
        }else{
            $arraydata=array('mensaje'=>'no existe');
        }
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($arraydata);
        exit();
    }

?>
