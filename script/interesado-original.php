<?php 
class Interesado
{
    public function index(){
        header("location: http://tuclasedebaile.com.co");
    } 

     
    public function agregar() {
        //print_r($_POST);
        //print_r($_SERVER);

        //$vPost = json_decode(file_get_contents('php://input'), true);
        //print_r($vPost);
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

                print_r($_POST);

                /*$vLimpiar= new InputFilter();
                $correo=$vLimpiar->process($correo);
                $clave=$vLimpiar->process($clave);
                $nombre=$vLimpiar->process($nombre);
                $apellido=$vLimpiar->process($apellido);
                $telefono=$vLimpiar->process($telefono);
                $cargo=$vLimpiar->process($cargo);*/
                
                if(!empty($correo) && !empty($clave)  && !empty($nombre)  && !empty($apellido) && 
                    !empty($telefono) && !empty($cargo) && !empty($academia) && !empty($direccion) && 
                    !empty($telefono_local)  && !empty($telefono_movil) && !empty($pais) && !empty($estado) && 
                    !empty($entero)){

                    print_r($_POST);
                
                    $data=array('correo'=>$correo, 'clave'=>$clave, 'nombre'=>$nombre, 'apellido'=>$apellido, 'telefono'=>$telefono, 'cargo'=>$cargo,
                        'academia'=>$academia, 'direccion'=>$direccion, 'telefono_local'=>$telefono_local, 'telefono_movil'=>$telefono_movil, 'pais'=>$pais, 'estado'=>$estado, 'entero'=>$entero);
                    require_once ('../class/class_db_interesado.php');
                    $DBInteresado = new DBInteresado();
                    $estado=$DBInteresado->agregar($data);
                    //echo json_encode($estado);
                    //$estado=DBInteresado::insert($data);
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
       // print_r($_POST);
       //print_r($_SERVER);
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
                        //enviar($correo);

                        $para=$correo;
                        $copia='alejandrogarcia15@gmail.com';
                        $cuerpo='';
                        $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
                        $cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";
                        // Cabeceras adicionales
                        $cabeceras .= 'To: '.$nombre.' <'.$para.'>' . "\r\n";
                        $cabeceras .= 'From: Confirmaci??n de correo <'.$copia.'>' . "\r\n";
                        $cabeceras .= 'Bcc: '.$copia.' ' . "\r\n";

                        if(mail(para, $asunto, $cuerpo, $cabeceras)){ 
                            $mensajeStatus = true;
                        }else{
                            $mensajeStatus = false;
                        }
                        //Suponiendo que el correo fue enviado correctamente
                        if ($mensajeStatus) {
                            //print 1;
                        } else {
                            
                        }

                    }else{ 
                        $arraydata=array("estado"=>"mal", "mensaje"=>"Se ocurrido se ha ejecutado la operacion");
                    } 
                    //print_r($_POST);
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
        //Suponiendo que el correo fue enviado correctamente
        if ($mensajeStatus) {
            print 1;
        } else {
            
        }
         
    
    }
}
?>
<?php
    //print_r($_POST);
    if(isset($_POST['data']['agregar']) && $_POST['data']['agregar']=='agregarInteresado'){
        //$operacion = new Interesado();
        //$operacion->agregar();
        //print_r($_POST);

       
                
                $correo= isset($_POST['data']['Email']) ? trim($_POST['data']['Email']) : ""; 
                $nombre= isset($_POST['data']['Nombre']) ? trim($_POST['data']['Nombre']) : "";                                
                $sexo= isset($_POST['data']['Sexo']) ? trim($_POST['data']['Sexo']) : "";

                          
                $telefono_local= isset($_POST['data']['Telefono']) ? trim($_POST['data']['Telefono']) : "";
                $telefono_movil= isset($_POST['data']['Celular']) ? trim($_POST['data']['Celular']) : "";
                $entero= isset($_POST['data']['ComoNosConociste']) ? trim($_POST['data']['ComoNosConociste']) : "";

                //print_r($_POST);               
                
                if(!empty($correo) && !empty($nombre) && !empty($sexo) 
                    && !empty($telefono_local)  && !empty($telefono_movil) && !empty($entero)){

                    //print_r($_POST);
require_once ('../class/class_db_interesado.php');
$DBInteresado = new DBInteresado();
$status=$DBInteresado->verificar_correo($correo);
		

		
		$arraydata=array();
		if(count($status)>0){
                         
                         $arraydata=array("estado"=>"duplicado", "mensaje"=>"duplicado" );

			 header('Content-type: application/json; charset=utf-8'); 
        
                         echo json_encode($arraydata);    

                         exit(); 
		}else{
			
                    //$clave = base64_encode($clave);
                    $data=array('correo'=>$correo, 'nombre'=>$nombre, 'telefono_local'=>$telefono_local, 'telefono_movil'=>$telefono_movil, 'entero'=>$entero, 'sexo'=>$sexo);
                    
                    
                    $status=$DBInteresado->agregar($data);



                    //print_r($status);
                    //echo json_encode($estado);
                    //$estado=DBInteresado::insert($data);

                    //$codigo=$status['codigo'];
                    //print_r($codigo);
                    //$md5=md5($codigo);
                    $envio=true;
                    if($status['mensaje']=="agregado" && $envio==true){
                        $arraydata=array("estado"=>"bien", "mensaje"=>"Se ha agregado satisfactoriamente" );
                         $para=$correo;
                         $de='tuclasedebaileoficial@gmail.com';
$asunto='Confirmaci??n de correo';
                        $copia='alejandrogarcia15@gmail.com';

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
                            <table border="0" cellpadding="0" cellspacing="0" width="510">
                              <tbody><tr>
                                <td style="font-size:2px" height="10">
                                </td>
                              </tr>
                                 
                              <tr>
                                <td align="center" valign="top"> <a href="http://tuclasedebaile.com.co" target="_blank"><img class="CToWUd" alt="Tu Clase de Baile" src="http://tuclasedebaile.com.co/img/logo.png" width="120"></a>
                                </td>
                              </tr>
                              <tr>
                                <td style="font-size:2px" height="30">
                                </td>
                              </tr>
			<tr>
                                <td valign="top" style="text-align:center;">
                                  <font style="font-family:Helvetica Neue,Arial,Helvetica,sans-serif;font-size:16px;line-height:18px;color:#000000;font-weight:bold;"> ESTAMOS MUY FELICES DE TENERTE A BORDO <br><br>
                                  </font>
                              </td></tr><tr>
			</tr><tr>
                                <td valign="top">
                                  <font style="font-family:HelveticaNeue,Arial,Helvetica,sans-serif;font-size:13px;line-height:18px;color:#000000">
                                    Hola <b> '.$nombre.' </b> estamos muy contentos que te hayas unido a nuestra comunidad del baile</font>
                                </td>
                              </tr>
                       
                             
                              <tr>
                                <td style="font-size:2px" height="20">
                                </td>
                              </tr>
                              
                              <tr>
                                <td style="font-size:2px" height="20">
                                </td>
                              </tr>
                              
                              <tr>
                                
                                <td style="font-family:Helvetica Neue,Helvetica,Arial,sans-serif;font-size:15px;font-weight:bold" align="center">
            
              <a href="http://tuclasedebaile.com.co/#/confirmacion/'.base64_encode($para).'" style="background-color:#4094CC;border-radius:2px;color:#ffffff;display:inline-block;line-height:40px;text-align:center;text-decoration:none;width:160px" target="_blank">Confirma tu correo</a>
            </td>
                              </tr>

                              <tr>
                                <td style="font-size:2px" height="20">
                                </td>
                              </tr>
                              
                                 
                              <tr>
                                <td style="font-size:2px" height="20">
                                </td>
                              </tr>
                              
                              <tr>
                                <td valign="top">
                                  <font style="font-family:Helvetica Neue,Arial,Helvetica,sans-serif;font-size:13px;line-height:18px;color:#000000">
                                    Si no has solicitado informaci??n de Tu Clase de Baile, simplemente ignora este mensaje. Si tienes alguna duda o pregunta, ponte en contacto con nosotros en <a href="mailto:tuclasedebaileoficial@gmail.com" target="_blank">tuclasedebaileoficial@gmail.com</a>. </font>
                                </td>
                              </tr>
                              
                              <tr>
                                <td style="font-size:2px" height="20">
                                </td>
                              </tr>                              
                              
                              <tr>
                                <td style="font-size:2px" height="24">
                                </td>
                              </tr>
                            </tbody></table>
                          </td>
                          <td width="36">
                            &nbsp;</td>
                        </tr>
                      </tbody></table>
                    </td>
                  </tr>
                    
                    <tr>
                        <td align="center" valign="top">
                            <table style="height:57px;table-layout:fixed" border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tbody><tr>
                                    <td style="height:57px;width:27px" valign="top">
                                        <img class="CToWUd" alt="" src="http://tuclasedebaile.com.co/img/correos/footerimg-leftspacer@2x.png?v=2" style="width:27px;min-height:57px" border="0">
                                    </td>
                                    <td style="font-size:1px;line-height:1px;font-family:Helvetica Neue,Helvetica,arial,sans-serif;color:#ffffff;text-align:left;height:57px;width:104px" align="left" valign="top">
                                        <a href="http://tuclasedebaile.com.co" style="color:#ffffff;font-weight:normal;text-decoration:underline" target="_blank"><img class="CToWUd" alt="" src="http://tuclasedebaile.com.co/prueba/img/correos/logo_gris.png?v=2" style="width:104px;min-height:57px" border="0"></a>
                                    </td>
                                    <td style="font-size:1px;height:57px;line-height:1px;width:277px" height="57" valign="top" width="277">
                                        <img class="CToWUd" alt="" src="http://tuclasedebaile.com.co/img/correos/footerimg-middlespacer@2x.png?v=2" style="width:277px;min-height:57px" border="0">
                                    </td>
                                    <td style="font-size:1px;line-height:1px;font-family:Helvetica Neue,Helvetica,arial,sans-serif;color:#ffffff;text-align:left;height:57px;width:29px" align="left" valign="top">
                                        <a href="http://tuclasedebaile.com.co/#/noticias" style="color:#ffffff;font-weight:normal;text-decoration:underline" target="_blank">
                                            <img class="CToWUd" alt="Blog" src="http://tuclasedebaile.com.co/img/correos/footerimg-blog@2x.png" style="width:29px;min-height:57px" border="0">
                                        </a>
                                    </td>
                                    <td style="font-size:1px;line-height:1px;font-family:Helvetica Neue,Helvetica,arial,sans-serif;color:#ffffff;text-align:left;height:57px;width:40px" align="left" valign="top">
                                        <img class="CToWUd" alt="" src="http://tuclasedebaile.com.co/img/correos/footerimg-divider@2x.png?v=2" style="width:40px;min-height:57px" border="0">
                                    </td>
                                    <td style="font-size:1px;line-height:1px;font-family:Helvetica Neue,Helvetica,arial,sans-serif;color:#ffffff;text-align:left;height:57px;width:26px" align="left" valign="top">
                                        <a href="https://instagram.com/tuclasedebaileoficial/" target="_blank">
                                            <img class="CToWUd" alt="Twitter" src="http://tuclasedebaile.com.co/img/correos/footerimg-twitter@2x.png?v=2" style="width:26px;min-height:57px" border="0">
                                        </a>
                                    </td>
                                    <td style="font-size:1px;line-height:1px;font-family:Helvetica Neue,Helvetica,arial,sans-serif;color:#ffffff;text-align:left;height:57px;width:40px" align="left" valign="top">
                                        <img class="CToWUd" alt="" src="http://tuclasedebaile.com.co/img/correos/footerimg-divider@2x.png?v=2" style="width:40px;min-height:57px" border="0">
                                    </td>
                                    <td style="font-size:1px;line-height:1px;font-family:Helvetica Neue,Helvetica,arial,sans-serif;color:#ffffff;text-align:left;height:57px;width:10px" align="left" valign="top">
                                        <a href="https://www.facebook.com/Mi-Clase-de-Baile-960537544002431/" style="color:#ffffff;font-weight:normal;text-decoration:underline" target="_blank">
                                            <img class="CToWUd" alt="Facebook" src="http://tuclasedebaile.com.co/img/correos/footerimg-facebook@2x.png?v=2" style="width:10px;min-height:57px" border="0">
                                        </a>
                                    </td>
                                    <td style="height:57px;width:27px" valign="top">
                                        <img class="CToWUd" alt="" src="http://tuclasedebaile.com.co/img/correos/footerimg-rightspacer@2x.png?v=2" style="width:27px;min-height:57px" border="0">
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
                        $cabeceras .= 'To: '.$nombre.' '.' <'.$para.'>' . "\r\n";
                        $cabeceras .= 'From: Tu Clase de Baile <'.$de.'>' . "\r\n";
                        $cabeceras .= 'Bcc: '.$copia.' ' . "\r\n";

                        if(mail(para, $asunto, $cuerpo, $cabeceras)){ 
                            $mensajeStatus = true;
                        }else{
                            $mensajeStatus = false;
                        }
                        //Suponiendo que el correo fue enviado correctamente
                        if ($mensajeStatus) {
                           // print 1;
                        } else {
                            
                        }
                    }else{ 
                        $arraydata=array("estado"=>"mal", "mensaje"=>"ha ocurrido un error no se ha ejecutado la operacion");
                    }
                  } 
                }else{
                    $arraydata=array("estado"=>"mal", "mensaje"=>"Los campos se encuentra vacios");
                }   
                header('Content-type: application/json; charset=utf-8');  
        
                echo json_encode($arraydata);    

                exit();    

            
                
           
    }

	if(isset($_POST['confirmar']) && $_POST['confirmar']=='confirmar'){
	    //print_r($_POST);
        require_once ('../class/class_db_interesado.php');
        $DBInteresado = new DBInteresado();
        $correo= isset($_POST['correo'])? trim($_POST['correo']) : "";
        $status=$DBInteresado->verificar_correo($correo);
		
		//print_r($status);
		$arraydata=array();
		if(count($status)>0){
			//$arraydata=array('mensaje'=>'encontrado');
			$resul= $DBInteresado->activar_cuenta($correo);
			//print_r($resul);
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
	
      /*if($vPost['operacion']=='agregar'){
    	require_once ('../class/class_db_curso.php');
    	$DB_Curso = new Curso();
    	$vVerificar_Curso_Nombre=$DB_Curso->verificar_nombre($vPost['InputNombre']);
        //echo $vVerificar_Usuario_Cedula;
    	if(count($vVerificar_Curso_Nombre)>0){ $vErrorNombre=5; }
        if($vErrorNombre==0){
    	  	$vInsert_Curso=$DB_Curso->agregar($vPost['InputNombre'], $vPost['InputDescripcion'], $vPost['InputEspecialidad'], $vPost['inlineRadioOptions'] );
    		$vRespuesta=array('vrespuesta'=>$vInsert_Curso);
    	  }else{
             $vError=$vErrorNombre;
             $vRespuesta=array('vrespuesta'=>$vError);
    	  }
          echo json_encode($vRespuesta);
        }*/
?>