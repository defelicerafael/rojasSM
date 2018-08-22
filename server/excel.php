<?php
header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
//$dia = date('Y-m-d');
header("Content-Disposition: attachment; filename=Reporte_Stock.xls");  //File name extension was wrong
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Cache-Control: private",false);
/*
header("Pragma: public");
header("Expires: 0");
$dia = date('Y-m-d');
$filename = "Reporte_Stock_$dia.xls";
header("Content-type: application/x-msdownload");
header("Content-Disposition: attachment; filename=$filename");
header("Pragma: no-cache");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");*/
include_once 'class_sql.php';

$tabla = filter_input(INPUT_GET, 'tabla', FILTER_SANITIZE_ENCODED);
$filtro_por = filter_input(INPUT_GET, 'filtro_por', FILTER_SANITIZE_ENCODED);
$filtro = filter_input(INPUT_GET, 'filtro', FILTER_SANITIZE_URL);
$orden = filter_input(INPUT_GET, 'orden', FILTER_SANITIZE_ENCODED);
$limit = filter_input(INPUT_GET, 'limit', FILTER_SANITIZE_ENCODED);
$filtro2 = str_replace("&#34;", "'", $filtro);

$sql = new Sql;

$columnas = $sql->showColumnNames($tabla); 
if ($filtro==="no"){
   // echo "Filtro es igual a no";
    $select = $sql->selectTablaNew($tabla,'no',$filtro_por,$orden,$limit);     
}else{
    $array = json_decode($filtro, true);
    $select = $sql->selectTablaNew($tabla,$array,$filtro_por,$orden,$limit);    
}
$null = is_null($select);
if($null==true){
    echo "[]";
}else{
if (count($select) > 0): ?>
    <table>
        <thead>
            <tr>
                <th><?php echo implode('</th><th>', array_keys(current($select))); ?></th>
            </tr>
        </thead>
      <tbody>
    <?php foreach ($select as $row): array_map('htmlentities', $row); ?>
            <tr>
              <td><?php echo implode('</td><td>', $row); ?></td>
            </tr>
    <?php endforeach; ?>
      </tbody>
    </table>
<?php endif; 

}

