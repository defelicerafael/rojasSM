<?php

class Sql
{
    
    public $servername;
    public $username;
    public $password;
    public $dbname;
    public $connection;
    public $select;
    public $nombre;
    public $columns;
    public $login;
    public $mal;
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
    
    function setMal(){
        $this->mal = 0;
    }
    
    function getLogin(){
        return $this->login;
    }
    
    function connect(){
    
    $this->servername = "localhost";
    $this->username = "root";
    $this->password = "manjarlo1";
    $this->dbname = "dtl";
    /*$this->servername = "localhost";
    $this->username = "c0120329_rafael";
    $this->password = "Manjarlo1";
    $this->dbname = "c0120329_berrydesign";*/
    
        
     // Create connection
    $this->connection = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
    // Check connection
    if ($this->connection->connect_error) {
     die("Connection failed: " . $this->connection->connect_error);
        }/*else{
            echo "conexion realizada";
        }*/

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
        $result = $this->connection->query($sql);
        while($row = $result->fetch_assoc()) {
                    $this->columns[] = $row["Field"];
                    
                }
        return $this->columns;        
    }
   
    public function login($user,$pass,$tabla){
      $this->connect();
        $sql = "SELECT * FROM $tabla WHERE usuario = '$user' AND pass = '$pass'";
        $result = $this->connection->query($sql);
        $rows = $result->num_rows;
        if ($rows===1){
            $this->login = "true";
        }else{
            $this->login = "false";
        }
        return $this->login;
    }
    
    public function selectTabla($tabla,$filtro,$orden,$asc,$limit){
        //print_r($filtro);
       
        $this->connect();
            if($filtro==="no"){
                $sql = "Select * FROM $tabla ";
            }else{
                $sql = "Select * FROM $tabla WHERE ";
                
                
                foreach($filtro as $dato=>$filtrar){
                        if ($dato === $this->endKey($filtro)) {
                            $sql .= "$dato = '$filtrar'";
                        }else{
                            $sql .= "$dato = '$filtrar' AND ";
                        }
                }
            }
        $sql .= " ORDER BY $orden $asc ";
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
           // echo "se fue";
           $this->select = 0; 
        }
            
      return $this->select;  
    }
    
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    public function selectId($tabla,$id){
        $this->connect();
            $sql = "Select * FROM $tabla WHERE id = '$id'";
            
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
    
    
    
     public function jsonConverter($array){
         $json = json_encode($array);
         echo $json;
         
     }

    
    
    public function edit($tabla,$item,$dato,$id,$modelo,$mascara){
        $this->connect();
        
        $sql = "UPDATE $tabla
                SET $item='$dato'
                WHERE id_user = '$id' AND id_modelo = '$modelo' AND mascara = '$mascara'";
        //echo $sql;
        $result = $this->connection->query($sql);
        
            if ($result === TRUE) {
                
                $this->connection->close();  
            } else {
                $this->mal++;
                $this->connection->close();  
            }
                
        }
        
        public function edit_dato($tabla,$item,$dato,$where,$whereDato){
        $this->connect();
        
        $sql = "UPDATE $tabla
                SET $item='$dato'
                WHERE $where = '$whereDato'";
        //echo $sql;
        $result = $this->connection->query($sql);
        
            if ($result === TRUE) {
                
                $this->connection->close();  
            } else {
                $this->mal++;
                $this->connection->close();  
            }
                
        }
        
        public function edit_dato2($tabla,$item,$dato,$where,$whereDato,$and,$andDato){
        $this->connect();
        
        $sql = "UPDATE $tabla
                SET $item='$dato'
                WHERE $where = '$whereDato' AND $and = '$andDato'";
        //echo $sql;
        $result = $this->connection->query($sql);
        
            if ($result === TRUE) {
                
                $this->connection->close();  
            } else {
                $this->mal++;
                $this->connection->close();  
            }
                
        }
      
        public function insert($tabla,$variable,$variable_tabla){
        $this->connect();
        $sql = "INSERT INTO $tabla (id,$variable_tabla)";
        $sql .=" VALUES (NULL,'$variable')";
        $result = $this->connection->query($sql);
        echo $sql;
            if ($result === TRUE) {
           // echo "New record created successfully <br/>";
            $this->connection->close();  
            } else {
          //  echo "Error: " . $sql . "<br>" . $this->connection->error;
            $this->connection->close();  
            }
        }
     public function insert_array($tabla,$id,$array){
            $this->connect();
            $todos = "";
            $values = "";
            $sql = "INSERT INTO $tabla ($id,";
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
       // echo $sql;
        $result = $this->connection->query($sql);
       // echo $sql;
            if ($result === TRUE) {
         //   echo "New record created successfully <br/>";
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
            //    echo "0 results";
                $this->connection->close(); 
            }
            return $this->id;
             
    }
    
    
       
        function delete($tabla, $item, $dato){
        $this->connect();
        $sql = "DELETE FROM $tabla WHERE $item = '$dato'";
               
        echo $sql;
        $result = $this->connection->query($sql); 
        if ($result === TRUE) {
     //   echo "Record DELETE successfully $tabla, $dato";
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
        
       /* function innerJoin($tabla1,$tabla2,$table1_column,$table2_column,$array){
            $this->connect();
            $sql = "SELECT *
                    FROM $tabla1
                    INNER JOIN $tabla2
                    ON $table1_column = $table2_column  ;"; 
            
        }*/
}

/*
$s = new Sql;
$s->connect();
*/




?>
