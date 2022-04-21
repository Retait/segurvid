<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
        <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
        }
        h5{
            font-size: 14px;
        }
        h6{
            font-size: 12px;
        }
        p{
            font-size: 11px;
            text-align: justify;
            line-height : 23px;
        }
        p.firm{
            line-height : 20px;
        }
    </style>
    </head>
<body>
    @foreach ($vior as $vo)    
    <div class="container">
        <div class="row">
            <div class="col-3 offset-9">
                <p class="text-sm text-secondary text-right">{{$vo->code_order}}
                    <br>
                    {{$vo->date_order}}
                </p>
            </div>
        </div>
        <div class="content">
            <div class="row justify-content-end">
                <div class="col-11 offset-1">
                    <div class="row mt-5 mb-5 pl-3">
                        <div class="col-12">
                            <h5 class="text-center"><u>CONTRATO DE PRESTACIÓN DE SERVICIOS</u></h5>
                            <br><br>
                            <p>
                                EN HUANCAYO SIENDO {{$d_order}} SE PRESENTAN LIBRE Y VOLUNTARIAMENTE LAS SIGUIENTES PARTES:</p>
                            <p>
                                LA EMPRESA <strong>{{$vo->user_company}}</strong> CON RUC <strong>{{$vo->code_company}}</strong> (ASESORES Y CONSULTORES), 
                                CON OFICINA LEGAL EN {{$vo->address_company}} DE LA CIUDAD DE {{$vo->city_company}},
                                QUIEN EN ADELANTE SE DENOMINARÁ <strong>EL ASESOR</strong>.
                            </p>                 
                            <p>
                                EL SR(A). <strong>{{$vo->name_customer}}</strong> CON DNI <strong>{{$vo->code_customer}}</strong>, 
                                DOMICILIADO EN {{$vo->address_customer}}, QUIEN REFIERE QUE SUFRIÓ UN ACCIDENTE DE TRÁNSITO, 
                                POR LO QUE EN ADELANTE SE LE DENOMINARÁ EL CLIENTE.
                            </p>
                            <h6>PRIMERO. ANTECEDENTES DEL ASESOR:</h6>
                            <p>
                                LA EMPRESA <strong>{{$vo->company_user}}</strong> CON RUC <strong>{{$vo->code_company}}</strong>, 
                                ES UNA EMPRESA DEDICADA AL RUBRO DEL ASESORAMIENTO Y GESTIÓN DOCUMENTARIA Y ADMINISTRATIVA PARA 
                                GENERAR LAS ÓRDENES DE PAGO POR ACCIDENTES DE TRÁNSITO O SUS INDEMNIZACIONES A NIVEL NACIONAL, 
                                PARA TAL EFECTO CUENTA CON UN GRUPO DE PROFESIONALES EXPERTOS EN LA MATERIA QUIENES ASESORAN Y 
                                REALIZAN LAS GESTIONES PERTINENTES PARA QUE NUESTROS CLIENTES PUEDAN COBRAR POR ESOS DERECHOS.  
                            </p>
                            <h6>SEGUNDO. ANTECEDENTES DEL CLIENTE:</h6>
                            <p>
                                EL CLIENTE <strong>{{$vo->name_customer}}</strong> IDENTIFICADO CON DNI <strong>{{$vo->code_customer}}</strong>, ES
                                UNA PERSONA NATURAL QUIEN REFIERE QUE SUFRIÓ UN ACCIDENTE DE TRÁNSITO ({{$vo->type_accident}}) EL 
                                PASADO {{$d_accident}}, 
                                @if ($vo->time_order)
                                    APROXIMADAMENTE A LAS {{$vo->time_order}} HRS.
                                @endif
                                EN {{$vo->location_accident}} SIENDO TRASLADADO A {{$vo->name_company}}.                  
                            </p>
                            <h6>TERCERO. DESCRIPCIÓN DEL SERVICIO:</h6>
                            <p>
                                EL CLIENTE, EN PLENO EJERCICIO USO DE SUS FACULTADES, SOLICITA NUESTROS SERVICIOS PROFESIONALES POR LO QUE, 
                                EL ASESOR REALIZARÁ TODAS LAS GESTIONES DOCUMENTARIAS PARA QUE REALICE EL COBRO DE <strong>{{$vo->name_service}}</strong>. 
                                EL PRESENTE CONTRATO ES DE PLAZO INDETERMINADO Y SE SUJETA LAS REGLAS DEL QUINTO Y SEXTO ÍTEM.
                            </p>
                            <br><br><br><br>
                            <h6>CUARTO. RETRIBUCIÓN:</h6>
                            <p>
                                EL BENEFICIARIO {{$vo->name_customer}}, IDENTIFICADO CON DNI {{$vo->code_customer}}, PAGARÁ AL ASESOR 
                                EL {{$vo->cost_order}}% DEL VALOR QUE PERCIBA, SIENDO PARA EL BENEFICIARIO EL {{100 - $vo->cost_order}}% 
                                DE {{$vo->name_service}}; EL MONTO CORRESPONDIENTE AL {{$vo->cost_order}}% SERÁ ENTREGADO AL ASESOR RESPONSABLE DEL CASO. 	
                            </p>
                            <h6>QUINTO. CONDICIONES.</h6>
                            <p>
                                QUE A EFECTOS DE GARANTIZAR EL CUMPLIMENTO DE LA OBLIGACIÓN GENERADA EN EL CUARTO ÍTEM, 
                                EL CLIENTE FIRMA E IMPRIME HUELLA DIGITAL EN EL PRESENTE CONTRATO DE PRESTACIÓN DE SERVICIOS 
                                EN RETRIBUCIÓN A LA ASESORÍA ASCENDIENTE AL {{$vo->cost_order}}% DEL VALOR COBRADO POR CONCEPTO 
                                DE {{$vo->name_service}}.
                            </p>                
                            <h6>SEXTO. PENALIDADES.</h6>
                            <p>
                                LAS PARTES ACUERDAN QUE, EN CASO DE INCUMPLIMIENTO DEL QUINTO ÍTEM DEL PRESENTE CONTRATO, 
                                EL ASESOR PODRÁ ACTIVAR LA VÍA LEGAL MÁS LOS INTERESES MORATORIOS Y COMPENSATORIOS QUE SE GENEREN, 
                                AÑADIÉNDOSE TAMBIÉN LOS CONCEPTOS DE COSTOS Y COSTAS DEL PROCESO.
                            </p>
                            <h6>SÉPTIMO. SOLUCIÓN DE CONTROVERSIAS:</h6>
                            <p>
                                TODOS LOS CONFLICTOS QUE DERIVEN DE LA EJECUCIÓN E INTERPRETACIÓN DEL PRESENTE CONTRATO, 
                                INCLUIDOS LOS QUE SE REFIERAN A SU NULIDAD E INVALIDEZ, SERÁN RESUELTOS EN EL ÁMBITO DEL PODER JUDICIAL.
                            </p>
                            <h6>OCTAVO. IMPOSIBILIDAD DE RESOLVER EL CONTRATO:</h6>
                            <p>
                                EL CONTRATO NO PODRÁ RESOLVERSE DESPUÉS DE QUE SE HAYAN REALIZADO LAS GESTIONES PERTINENTES, 
                                EN CASO LA CLIENTE YA NO DESEE LLEVAR EL CASO, DEBIDO A QUE POR SU NATURALEZA UNA VEZ CONCLUIDO 
                                EL PROCEDIMIENTO ADMINISTRATIVO (PRESTACIÓN DE SERVICIOS) LA EMISIÓN DE PAGO ES AUTOMÁTICA.
                                <br>
                                PARA DOTAR DE VALIDEZ JURÍDICA AL PRESENTE CONTRATO DE PRESTACIÓN DE SERVICIOS, LAS PARTES 
                                LEGALIZAN SUS FIRMAS E IMPRIMEN SUS HUELLAS DIGITALES EN LA CIUDAD DE HUANCAYO.
                            </p>
                        </div>  
                    </div>
                    <br>
                    <div class="row justify-content-center mt-5">
                        <div class="col-5 float-right">
                            <hr>
                            <p class="text-center firm"><strong>EL ASESOR</strong>
                                <br>{{$vo->name}}
                                <br>RUC {{$vo->code_company}}
                            </p>
                        </div>
                        <div class="col-5">
                            <hr>
                            <p class="text-center firm"><strong>EL CLIENTE</strong>
                            <br>{{$vo->name_customer}}
                            <br>DNI {{$vo->code_customer}}
                            </p>                
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</body>
</html>