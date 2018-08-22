<?php
$anio = date('Y');
$mes = date('n');
$dia = date('d');
$hoy_fecha = date('Y-m-d');
$meses = ["january","February","March","April","May","June","July","August","September","October","November","December"];


/*SEMANA PASADA*/
$lunes= date("Y-m-d", strtotime ("last Monday"));
$domingo = date("Y-m-d", strtotime ("last Sunday"));

/* MESES */
for($i=0;$i<(count($meses));$i++){        
    $fecha = date_create();
    $fecha->modify('first day of '.$meses[$i].' '.$anio);
    $pdia = $fecha->format('Y-m-d').'<br/>';
    
    $fecha2 = date_create();
    $fecha2->modify('last day of '.$meses[$i].' '.$anio);
    $fdia = $fecha2->format('Y-m-d').'<br/>';
    
    $fechasMes[$i+1] = array($pdia,$fdia);
}
echo "<pre>";
print_r($fechasMes[$mes]);
echo "</pre>";
