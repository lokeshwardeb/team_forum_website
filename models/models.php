<?php
require_once __DIR__ . '/../config/conn.php';
$sql = new sql_info;

class sql_info extends connect{

    function show_all($table_name, $order_by_condition=''){
        $show_all_sql = "SELECT * FROM $table_name $order_by_condition;";
        $result = $this->connection()->query($show_all_sql);

        return $result;
    }
    function show_where($table_name, $where_conditions, $order_by_condition=''){
        $show_where_sql = "SELECT * FROM $table_name WHERE $where_conditions $order_by_condition;";
        $result = $this->connection()->query($show_where_sql);

        return $result;

    }
    function insert_all(){
        $insert_all_sql = "";
        $result = $this->connection()->query($insert_all_sql);

        return $result;

    }
    
    function insert_where($table_name, $table_rows, $table_rows_values){
        $insert_where_sql = "INSERT INTO `$table_name`($table_rows) VALUES ($table_rows_values)";
        $result = $this->connection()->query($insert_where_sql);

        return $result;

    }
    function update_all(){
        $update_all_sql = "";
        $result = $this->connection()->query($update_all_sql);

        return $result;

    }
    function update_where(){
        $update_where_sql = "";
        $result = $this->connection()->query($update_where_sql);

        return $result;

    }
    function delete_all(){
        $delete_all_sql = "";
        $result = $this->connection()->query($delete_all_sql);

        return $result;

    }
    function delete_where(){
        $delete_where_sql = "";
        $result = $this->connection()->query($delete_where_sql);

        return $result;

    }

    public function pure_data($data){
        $result = htmlspecialchars(mysqli_real_escape_string($this->connection(),$data), ENT_QUOTES);

        return $result;

    }

    public function check_table($table_name){
        $sql_check_exist = "SHOW TABLES LIKE '$table_name'";
        $result = $this->connection()->query($sql_check_exist);

        return $result;


    }



}


?>