<?php

if(isset($_POST['data']['agregar']) && $_POST['data']['agregar']=='agregarInteresado'){


    $correo= isset($_POST['data']['Email']) ? trim($_POST['data']['Email']) : "";
    $nombre= isset($_POST['data']['Nombre']) ? trim($_POST['data']['Nombre']) : "";
    $apellido= isset($_POST['data']['Apellido']) ? trim($_POST['data']['Apellido']) : "";
    $pais= isset($_POST['data']['Pais']) ? trim($_POST['data']['Pais']) : "";


    if(!empty($correo) && !empty($nombre) && !empty($apellido) && !empty($pais)){

        require_once ('../class/class_db_interesado.php');
        $DBInteresado = new DBInteresado();

        $status=$DBInteresado->verificar_correo_aliado($correo);

        $arraydata=array();

        if(count($status)>0){

            $arraydata=array("estado"=>"duplicado", "mensaje"=>"duplicado" );

            header('Content-type: application/json; charset=utf-8');
            echo json_encode($arraydata);
            exit();

        }else{

            $data=array('correo'=>$correo, 'nombre'=>$nombre, 'apellido'=>$apellido, 'pais'=>$pais);
            $status=$DBInteresado->agregarAliado($data);
            $envio=true;

            if($status['mensaje']=="agregado" && $envio==true){
                $pais=$DBInteresado->getPais($pais);
                $de='tuclasedebaileoficial@gmail.com';
                $asunto='Aliado tu clase de baile';

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
                                                <strong style="font-size:20px;" >Aliado</strong>
                                                <p><strong:>Nombre: </strong> '.$nombre.' '.$apellido.'</p>
                                                <p><strong:>Correo: </strong> '.$correo.'</p>
                                                <p><strong:>Pais: </strong> '.$pais.'</p>
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
                $cabeceras .= 'To: TuClaseDeBaile '.' <'.$de.'>' . "\r\n";
                $cabeceras .= 'From: Tu Clase de Baile <'.$de.'>' . "\r\n";

                $copia = 'alejandrogarcia15@gmail.com';

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
                                                <font style="font-size:16px;line-height:18px;color:#000000;font-weight:bold;"> Acabas de dar el primer paso, te acompañaremos  

                                                <p>en el logro de tus objetivos</p><br>
                                                </font>
                                            </td>
                                            </tr>

                                            <tr style="width:100%">
                                              <td valign="top" style="text-align: justify; padding-right:20px; line-height:28px">
                                                <p>
                                                  Ante todo reciba un cordial saludo de parte del equipo de socios  de tu clase de baile, el motivo por el cual  dirigimos la siguiente misiva, es para invitarle a formar parte de nuestras acciones como nuevo inversionista de un proyecto que se avizora con una alta proyección comercial y crecimiento económico. Nuestra academia en menos de un año, ha venido acumulando logros importantes con una cartera de clientes que promedia los 150 alumnos mensuales.</p>

                                                  <p>
                                                  Para el próximo año, tenemos  como  objetivo  principal incrementar y mejorar las condiciones de nuestro local y de esa forma ofrecer un mejor servicio a nuestra cartera de clientes, por tal motivo, deseamos  ofrecer parte de las acciones de la empresa, hoy día valoradas por un costos de 100.000.000 de pesos distribuidos entre:</p>

                                                  • Activos físicos <br>
                                                  • GoodWill  (nombre y reconocimiento de la empresa)<br>
                                                  • Reconocimientos y proyección de la academia<br>
                                                  • Experiencia y procesos del equipo. <br>
                                                  <p>
                                                  Nuestra meta para el próximo año 2017  es arribar para el mes de abril a una población de 300 alumnos activos y mantenerlos como  promedio mensual. Para lograr estos objetivos estaremos desarrollando importantes mejoras a nuestra academia, tales como:</p>
                                                  • Piso de madera <br>
                                                  • Iluminación profesional <br>
                                                  • Sala de venta <br>
                                                  • Cámaras de seguridad <br>
                                                  • Lockers <br>
                                                  • Inversión publicitaria <br>
                                                  • Diseños gráficos internos <br>
                                                  • Departamento de venta <br>
                                                  • Material pop y herramientas de trabajo. <br>
                                                  <p>
                                                  Por tal motivo le mostramos la  oportunidad de unirse a nuestro equipo de socios y que vea esta oportunidad de inversión  que sin duda le generará ganancias importantes en un lapso no mayor a 8 meses.</p>
                                                  <p>
                                                  <b>“Denme Un Punto De Apoyo Y Moveré El Mundo”……… Arquímedes</b></p>
                                                  <br><br>
                                                </font>
                                              </td>
                                            </tr>

                                            </table> <!-- PRIMERA TABLA -->


                                            
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

                  $cabeceras_cliente  = 'MIME-Version: 1.0' . "\r\n";
                  $cabeceras_cliente .= 'Content-type: text/html; charset=utf-8' . "\r\n";
                  // Cabeceras adicionales
                  $cabeceras_cliente .= 'To: '.$nombre.' '.' <'.$correo.'>' . "\r\n";
                  $cabeceras_cliente .= 'From: Tu Clase de Baile <'.$de.'>' . "\r\n";
                  $cabeceras_cliente .= 'Bcc: '.$copia.' ' . "\r\n";

                  if(mail($correo, $asunto, $cuerpo_cliente, $cabeceras_cliente)){
                      $mensajeStatus = true;
                  }else{
                      $mensajeStatus = false;
                  }

                $arraydata=array("estado"=>"bien", "mensaje"=>"Se ha agregado satisfactoriamente" );
            }

        }
    }else{
        $arraydata=array("estado"=>"mal", "mensaje"=>"Los campos se encuentra vacios");
    }

    header('Content-type: application/json; charset=utf-8');

    echo json_encode($arraydata);

    exit();

}

?>
