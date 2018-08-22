<?php
date_default_timezone_set('America/Argentina/Buenos_Aires');

class Sql
{
    
    public $servername;
    public $username;
    public $password;
    public $dbname;
    public $connection;
    public $select;
    public $nombre;
    public $email;
    public $telefono;
    public $columns;
    public $hoy;
    public $meses;
    
    function setMeses($numero){
        $this->meses = date("Y-m-d",mktime(0,0,0, date("m")+$numero, date("d"),   date("Y")));
    }
    function getMeses(){
        return $this->meses;
    }
    
    function setHoy(){
        $this->hoy = date("Y-m-d"); 
    }
    function getHoy(){
        return $this->hoy;
    }
    function getMal(){
        return $this->mal;
    }
    
    function connect(){
    
    /*$this->servername = "localhost";
    $this->username = "desdetul_us";
    $this->password = "tulugar2014";
    $this->dbname = "desdetul_bd";*/
    
    /*$this->servername = "localhost";
    $this->username = "futbolcarta.com.";
    $this->password = "WOJmeyK";
    $this->dbname = "futbolcarta_com_ar";*/
    
    $this->servername = "localhost";
    $this->username = "root";
    $this->password = "manjarlo1";
    $this->dbname = "terrazas_de_mayo";
        
     // Create connection
    $this->connection = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
    // Check connection
    if ($this->connection->connect_error) {
     die("Connection failed: " . $this->connection->connect_error);
        }

    }
    
    public function endKey( $array ){

    //Aqu� utilizamos end() para poner el puntero
    //en el �ltimo elemento, no para devolver su valor
    end( $array );

    return key( $array );

    }
    
    public function showColumnNames($tabla){
        $this->connect();
        $sql = "SHOW COLUMNS FROM $tabla";
      //  echo $sql;
        $result = $this->connection->query($sql);
        while($row = $result->fetch_assoc()) {
                    $this->columns[] = $row["Field"];
                    
                }
        return $this->columns;        
    }
   
    public function selectTablaNew($tabla,$filtro,$filtro_por,$orden,$limit){
        $this->connect();
            if($filtro==="no"){
                $sql = "Select * FROM $tabla";
            }else{
                $sql = "SELECT * FROM $tabla WHERE ";
                
                
                foreach($filtro as $dato=>$filtrar){
                        if ($dato === $this->endKey($filtro)) {
                            $sql .= "$dato = '$filtrar'";
                        }else{
                            $sql .= "$dato = '$filtrar' AND ";
                        }
                }
            }
        $sql .= " ORDER BY $filtro_por $orden ";
        $sql .= " LIMIT $limit"; 
        //echo $sql;    
        $result = $this->connection->query($sql);
        $columnas = $this->showColumnNames($tabla);
        //$rows = $result->num_rows;
            
            while($row = $result->fetch_assoc()) {
                for($i=0;$i<count($columnas);$i++){
                    $dato = $columnas[$i];
                    $array[$dato] = $row[$dato];
                  
                }
                $this->select[] = $array;
            }
            
      return $this->select;  
    }
    
    public function selectTabla($tabla,$filtro){
        $this->connect();
            if($filtro==="no"){
                $sql = "Select * FROM $tabla";
            }else{
                $sql = "SELECT * FROM $tabla WHERE ";
                
                
                foreach($filtro as $dato=>$filtrar){
                        if ($dato === $this->endKey($filtro)) {
                            $sql .= "$dato = '$filtrar'";
                        }else{
                            $sql .= "$dato = '$filtrar' AND ";
                        }
                }
            }
         
         //echo $sql;    
        $result = $this->connection->query($sql);
        $columnas = $this->showColumnNames($tabla);
        //$rows = $result->num_rows;
            
            while($row = $result->fetch_assoc()) {
                for($i=0;$i<count($columnas);$i++){
                    $dato = $columnas[$i];
                    $array[$dato] = $row[$dato];
                  
                }
                $this->select[] = $array;
            }
            
      return $this->select;  
    }
    
    public function selectBetween($tabla,$filtro,$orden,$limit){
        
        $this->setHoy();
        $this->setMeses(6);
        $mes = $this->getMeses();
        //echo "mes: $mes";
        $this->connect();
            if($filtro==="no"){
                $sql = "Select * FROM $tabla WHERE (fecha BETWEEN '$this->hoy' AND '$mes')";
            }else{
                $sql = "Select * FROM $tabla WHERE (fecha BETWEEN '$this->hoy' AND '$mes') AND ";
                
                
                foreach($filtro as $dato=>$filtrar){
                        if ($dato === $this->endKey($filtro)) {
                            $sql .= "$dato = '$filtrar'";
                        }else{
                            $sql .= "$dato = '$filtrar' AND ";
                        }
                }
            }
        $sql .= " ORDER BY fecha $orden ";
        $sql .= " LIMIT $limit";
        //echo $sql;    
        $result = $this->connection->query($sql);
        $columnas = $this->showColumnNames($tabla);
        $rows = $result->num_rows;
        if($rows>0){
            
            while($row = $result->fetch_assoc()) {
                for($i=0;$i<count($columnas);$i++){
                    $dato = $columnas[$i];
                    $array[$dato] = $row[$dato];
                  
                }
                $this->select[] = $array;
            }
        }else{
           $this->select = 0; 
        }
            
      return $this->select;  
    }
    
    public function selectTablaUnDato($columna,$tabla,$filtro){
        $this->connect();
            if($filtro==="no"){
                $sql = "Select $columna FROM $tabla";
            }else{
                $sql = "SELECT $columna FROM $tabla WHERE ";
                
                
                foreach($filtro as $dato=>$filtrar){
                        if ($dato === $this->endKey($filtro)) {
                            $sql .= "$dato = '$filtrar'";
                        }else{
                            $sql .= "$dato = '$filtrar' AND ";
                        }
                }
            }
         
        //echo $sql;    
        $result = $this->connection->query($sql);
        while($row = $result->fetch_assoc()) {
        $this->select = $row[$columna];
        }    
            
      return $this->select;  
    }
    
    
    
     public function jsonConverter($array){
         $json = json_encode($array);
         echo $json;
         
     }

    public function getId($tabla){
        $this->connect();
        switch ($tabla) {
        case "instituciones":
        $id_tabla = "id_instituciones";
        break;
        case "necesidades":
        $id_tabla = "id_necesidades";
        break;
    
   
        default:
        $id_tabla = "id";
        }
        
        return $id_tabla; 
    }
    
    public function edit($tabla,$item,$dato,$id_tabla,$id){
        $this->connect();
        $sql = "UPDATE $tabla
                SET $item = '$dato'
                WHERE $id_tabla = '$id'";
        $result = $this->connection->query($sql);
        echo $sql;
            if ($result === TRUE) {
        //    echo "New record created successfully <br/>";
            $this->connection->close();  
            } else {
        //    echo "Error: " . $sql . "<br>" . $this->connection->error;
            $this->connection->close();  
            }
        }
        
        
        
     public function insert($tabla,$variable,$variable_tabla){
        $this->connect();
        $sql = "INSERT INTO $tabla (id,$variable_tabla)";
        $sql .=" VALUES ('null','$variable')";
        $result = $this->connection->query($sql);
        //echo $sql;
            if ($result === TRUE) {
        //    echo "Proyecto creado con &eacute;xito <br/>";
            $this->connection->close();  
            } else {
        //    echo "Error: " . $sql . "<br>" . $this->connection->error;
            $this->connection->close();  
            }
        }
        
        
        public function insert_necesidades($tabla,$variable,$variable_tabla){
        $this->connect();
        $sql = "INSERT INTO $tabla (id_necesidades,$variable_tabla)";
        $sql .=" VALUES ('null','$variable')";
        $result = $this->connection->query($sql);
        //echo $sql;
            if ($result === TRUE) {
        //    echo "Proyecto creado con &eacute;xito <br/>";
            $this->connection->close();  
            } else {
        //    echo "Error: " . $sql . "<br>" . $this->connection->error;
            $this->connection->close();  
            }
        }
        public function insert_idnecesidades($tabla,$variable){
        $this->connect();
        $sql = "INSERT INTO $tabla (id_necesidades)";
        $sql .=" VALUES ('$variable')";
        $result = $this->connection->query($sql);
        //echo $sql;
            if ($result === TRUE) {
        //    echo "Proyecto creado con &eacute;xito <br/>";
            $this->connection->close();  
            } else {
        //    echo "Error: " . $sql . "<br>" . $this->connection->error;
            $this->connection->close();  
            }
        }
    public function getlastId($tabla){
        $this->connect();
        $sql = "SELECT id FROM $tabla ORDER BY id DESC LIMIT 1";
        $result = $this->connection->query($sql);
            if ($result->num_rows > 0) {
            // output data of each row
                while($row = $result->fetch_assoc()) {
                    $this->id = $row["id"];
                }
            } else {
        //        echo "0 results";
                $this->connection->close(); 
            }
            return $this->id;
             
    }
    
   public function editNew($tabla,$item,$dato,$where,$id){
        $this->connect();
        
        $sql = "UPDATE $tabla
                SET $item='$dato'
                WHERE $where = '$id'";
        //echo $sql;
        $result = $this->connection->query($sql);
        
            if ($result === TRUE) {
                
                $this->connection->close();  
            } else {
                $this->mal++;
                $this->connection->close();  
            }
                
        }
    
    public function getlastIdNecesidades(){
        $this->connect();
        $sql = "SELECT id_necesidades FROM necesidades ORDER BY id_necesidades DESC LIMIT 1";
        $result = $this->connection->query($sql);
            if ($result->num_rows > 0) {
            // output data of each row
                while($row = $result->fetch_assoc()) {
                    $this->id = $row["id_necesidades"];
                }
            } else {
            //    echo "0 results LASTID";
                $this->connection->close(); 
            }
            return $this->id;
             
    }
    public function select($tabla,$variable,$variable_tabla){
        
        $this->connect();
        
        if (!empty($tabla)&&(!empty($variable))&&(!empty($variable_tabla))){
            $sql = "SELECT * FROM $tabla WHERE $variable_tabla = '$variable'";
        }
        if (!empty($tabla)&&(empty($variable))&&(empty($variable_tabla))){
            $sql = "SELECT * FROM $tabla ";
        }
        //echo $sql;
        $result = $this->connection->query($sql);
        $rows = $result->num_rows;
       
        if ($rows > 0) {
                if ($tabla=="necesidades"){
                    
                    while($row = $result->fetch_assoc()) {
                        $this->select[] = array(
                            "id_necesidades"=>$row["id_necesidades"],
                            "id_instituciones"=>$row["id_instituciones"],
                            "nombre_proyecto"=>$row["nombre_proyecto"],
                            "tipo"=>$row["tipo"],
                            "lugar"=>$row["lugar"],
                            "arreglar"=>$row["arreglar"],
                            "objetos"=>$row["objetos"],
                            "electricidad"=>$row["electricidad"],
                            "pintar"=>$row["pintar"],
                            "ordenar"=>$row["ordenar"],
                            "limpiar"=>$row["limpiar"],
                            "albanileria"=>$row["albanileria"],
                            "fecha"=>$row["fecha"],
                            "si_arreglar"=>$row["si_arreglar"],
                            "si_objetos"=>$row["si_objetos"],
                            "si_electricidad"=>$row["si_electricidad"],
                            "si_pintar"=>$row["si_pintar"],
                            "si_ordenar"=>$row["si_ordenar"],
                            "si_limpiar"=>$row["si_limpiar"],
                            "si_albanileria"=>$row["si_albanileria"]
                            
                        );
                    }
                }
                if ($tabla=="foto_necesidades"){
                    
                    while($row = $result->fetch_assoc()) {
                        $this->select[] = array(
                            "id_necesidades"=>$row["id_necesidades"],
                            "id_instituciones"=>$row["id_instituciones"],
                            "id"=>$row["id"],
                            "img"=>$row["img"]
                            
                        );
                    }
                }
            } else {
            //    echo "0 results";
            }
            return $this->select;
            $this->connection->close();
        
    }
    public function select2($tabla,$variable,$variable_tabla,$variable2,$variable_tabla2){
        $this->connect();
        
            $sql = "SELECT * FROM $tabla WHERE $variable_tabla = '$variable' AND $variable_tabla2 = '$variable2'";
        
        //echo $sql;
        $result = $this->connection->query($sql);
       
        if ($result->num_rows > 0) {
                if ($tabla=="necesidades"){
                    
                    while($row = $result->fetch_assoc()) {
                        $this->select[] = array(
                            "id_necesidades"=>$row["id_necesidades"],
                            "id_instituciones"=>$row["id_instituciones"],
                            "nombre_proyecto"=>$row["nombre_proyecto"],
                            "tipo"=>$row["tipo"],
                            "lugar"=>$row["lugar"],
                            "arreglar"=>$row["arreglar"],
                            "objetos"=>$row["objetos"],
                            "electricidad"=>$row["electricidad"],
                            "pintar"=>$row["pintar"],
                            "ordenar"=>$row["ordenar"],
                            "limpiar"=>$row["limpiar"],
                            "albanileria"=>$row["albanileria"],
                            "fecha"=>$row["fecha"],
                            "si_arreglar"=>$row["si_arreglar"],
                            "si_objetos"=>$row["si_objetos"],
                            "si_electricidad"=>$row["si_electricidad"],
                            "si_pintar"=>$row["si_pintar"],
                            "si_ordenar"=>$row["si_ordenar"],
                            "si_limpiar"=>$row["si_limpiar"],
                            "si_albanileria"=>$row["si_albanileria"]
                            
                        );
                    }
                }
                if ($tabla=="foto_necesidades"){
                    
                    while($row = $result->fetch_assoc()) {
                        $this->select[] = array(
                            "id"=>$row["id"],
                            "id_instituciones"=>$row["id_instituciones"],
                            "id_necesidades"=>$row["id_necesidades"],
                            "img"=>$row["img"]
                            
                        );
                    }
                }
                
            } else {
             //   echo "0 results";
            }
            return $this->select;
            $this->connection->close();
        
    }
      public function selectUnion($tabla,$id){
        $this->connect();
            $sql = "SELECT * FROM necesidades INNER JOIN foto_necesidades ON necesidades.id_necesidades = foto_necesidades.id_necesidades";
        
        //echo $sql;
        $result = $this->connection->query($sql);
       
        if ($result->num_rows > 0) {
               
                    
                    while($row = $result->fetch_assoc()) {
                        $this->select[] = array(
                            "id_necesidades"=>$row["id_necesidades"],
                            "id_instituciones"=>$row["id_instituciones"],
                            "nombre_proyecto"=>$row["nombre_proyecto"],
                            "tipo"=>$row["tipo"],
                            "lugar"=>$row["lugar"],
                            "arreglar"=>$row["arreglar"],
                            "objetos"=>$row["objetos"],
                            "electricidad"=>$row["electricidad"],
                            "pintar"=>$row["pintar"],
                            "ordenar"=>$row["ordenar"],
                            "limpiar"=>$row["limpiar"],
                            "albanileria"=>$row["albanileria"],
                            "fecha"=>$row["fecha"],
                            "img"=>$row["img"]
                            
                        );
                    }
               
            } else {
            //    echo "0 results";
            }
            return $this->select;
            $this->connection->close();
        
    }
    
        public function selectContactoId($id){
        $this->connect();
            $sql = "SELECT nombre,email,telefono FROM instituciones WHERE id_instituciones = '$id'";
        $result = $this->connection->query($sql);
       
        if ($result->num_rows > 0) {
               
                    
                    while($row = $result->fetch_assoc()) {
                        $this->select = array('nombre'=>$row["nombre"],'email'=>$row["email"],'telefono'=>$row["telefono"]);
                    }
            } else {
             //   echo "0 results";
            }
            return $this->select;
            $this->connection->close();
        }
        
        public function selectNombreId($id){
        $this->connect();
            $sql = "SELECT nombre FROM instituciones WHERE id_instituciones = '$id'";
        $result = $this->connection->query($sql);
       
        if ($result->num_rows > 0) {
               
                    
                    while($row = $result->fetch_assoc()) {
                        $this->nombre = $row["nombre"];
                    }
            } else {
             //   echo "0 results";
            }
            return $this->nombre;
            $this->connection->close();
        }
        function delete_foto($tabla,$foto_base,$nombre){
        $this->connect();
        $sql = "DELETE FROM $tabla WHERE $foto_base = '$nombre'";
               
        echo $sql;
        $result = $this->connection->query($sql); 
        if ($result === TRUE) {
        //echo "Record DELETE successfully $tabla, $nombre";
        } else {
       // echo "Error DELETING record: " . $this->connection->error ."<br>";
        }
        
    }
    function delete($tabla, $item, $dato){
        $this->connect();
        //echo "dato: $dato";
        $sql = "DELETE FROM $tabla WHERE $item = '$dato'";
               
        //echo $sql;
        $result = $this->connection->query($sql); 
        if ($result === TRUE) {
        //echo "Record DELETE successfully $tabla, $dato";
        } else {
     //   echo "Error DELETING record: " . $this->connection->error ."<br>";
        }
        
        }
        function delete2($tabla, $item, $dato,$and,$andDato){
            $this->connect();
            $sql = "DELETE FROM $tabla WHERE $item = '$dato' AND $and = '$andDato'";

            echo $sql;
            $result = $this->connection->query($sql); 
            if ($result === TRUE) {
        //    echo "Record DELETE successfully $tabla, $dato";
            } else {
        //    echo "Error DELETING record: " . $this->connection->error ."<br>";
            }
        
        }
        
        function deleteDirectory($dir) {
            if(!$dh = @opendir($dir)) return;
            while (false !== ($current = readdir($dh))) {
                if($current != '.' && $current != '..') {
                    echo 'Se ha borrado el archivo '.$dir.'/'.$current.'<br/>';
                    if (!@unlink($dir.'/'.$current)) 
                        deleteDirectory($dir.'/'.$current);
                }       
            }
            closedir($dh);
            echo 'Se ha borrado el directorio '.$dir.'<br/>';
            @rmdir($dir);
    }
    
        public function insert_array($tabla,$array){
            $this->connect();
            $todos = "";
            $values = "";
            $sql = "INSERT INTO $tabla (id,";
        foreach($array as $dato=>$filtrar){
                        if ($dato === $this->endKey($array)) {
                            $todos .= "$dato";
                            $values .= "'$filtrar'";
                        }else{
                            $sql .= "$dato,";
                            $values .= "'$filtrar',";
                        }
                }
        $sql .= $todos;
        $sql .=") VALUES ('null',";
        $sql .= $values;
        $sql .=")";
        //echo $sql;
        $result = $this->connection->query($sql);
       // echo $sql;
            if ($result === TRUE) {
            echo "Hemos podido ingresar el dato en la base";
            $this->connection->close();  
            } else {
            echo "Error: " . $sql . "<br>" . $this->connection->error;
            $this->connection->close();  
            }
        }
}









