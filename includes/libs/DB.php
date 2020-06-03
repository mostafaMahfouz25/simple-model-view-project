<?php 



class DB 
{
    /**
     * 
     * connection variable
     */
    private $conn;
    // put result data in this result array 
    private $result = [];
    private $stmt;


    // connect to database 
    public function __construct()
    {
       $this->conn = new mysqli(HOST,USER,PASSWORD,DBNAME);
        if ($this->conn->connect_errno) 
        {
            printf("Connect failed: %s\n", $this->conn->connect_error);
            exit();
        }
    }


    // get all data from table 
    public function getAll($table)
    {
        $query = "SELECT * FROM {$table}";
        $this->stmt = $this->conn->query($query);
        if($this->affected_rows() > 0)
        {
            $this->result = (object) $this->stmt->fetch_all(MYSQLI_ASSOC);
        }
        return $this->result;
    }



    // get all data from table according to condition  
    public function getWhere($table,$where)
    {
        $query = "SELECT * FROM {$table} {$where}";
        $this->stmt = $this->conn->query($query);
        if($this->affected_rows() > 0)
        {
            $this->result = $this->stmt->fetch_all(MYSQLI_ASSOC);
        }
        return $this->result;
    }



    // free query   
    public function query($query)
    {
        $this->stmt = $this->conn->query($query);
        if($this->affected_rows() > 0)
        {
            $this->result = $this->stmt->fetch_all(MYSQLI_ASSOC);
        }
        return $this->result;
    }



    // insert 
    public function insert($table,array $data)
    {
        // setup some variables for fields and values
    	$fields  = '';
        $values = '';
        // populate them
        foreach ($data as $f => $v)
        {
            $fields  .= "`$f`,";
            $values .= ( is_numeric( $v ) && ( intval( $v ) == $v ) ) ? $v."," : "'$v',";
        }

        

        // remove our trailing ,
    	$fields = substr($fields, 0, -1);
    	// remove our trailing ,
        $values = substr($values, 0, -1);
        
        
    	
        $querystring = "INSERT INTO `{$table}` ({$fields}) VALUES ({$values})";

        //Check If Row Inserted
        if($this->conn->query($querystring)) 
            return TRUE;
        
        return FALSE;
    }


    public function update($table,$data,$where='')
    {
        //set $key = $value :)
        
        $query  = '';
        foreach ($data as $f => $v) {
           (is_numeric($v) && intval($v) == $v || is_float($v))? $v."," : "'$v' ,";
            $query  .= "`$f` = '{$v}' ,";
        }
        
        //Remove trailing ,
        $query = substr($query, 0,-1);
        
        $querystring = "UPDATE `{$table}` SET {$query} {$where}";
        // echo $querystring;
        // exit();
        //echo $querystring;
        $update = $this->conn->query($querystring);
        if($update)
            return TRUE;
        
        return FALSE;
    }



    // delete 
    public function delete($table,$where)
    {
        $query = "DELETE FROM `{$table}`  {$where} ";
        if($this->conn->query($query)) 
            return TRUE;
        return FALSE;

    }




    private function affected_rows()
    {
        return $this->conn->affected_rows;
    }

    public function __destruct()
    {
        $this->conn->close();
    }
}