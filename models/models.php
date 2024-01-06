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
    function join_show_all($select_conditions, $first_table_and_short_name, $second_table_and_short_name, $on_conditions, $order_by_table_name_and_conditions = '', $where_conditions = '1'){
        // $sql = "SELECT a.article_id, a.title, c.catagory_id, c.catagory_name FROM `article` a  JOIN  catagory c  ON a.catagory_id = c.catagory_id WHERE c.catagory_name = 'UI/UX DESIGN'";
        $sql = "SELECT $select_conditions FROM $first_table_and_short_name  JOIN  $second_table_and_short_name  ON $on_conditions WHERE $where_conditions $order_by_table_name_and_conditions";
        $result = $this->connection()->query($sql);

        return $result;
    }
    function join_2_show_all($first_select_conditions, $first_table_and_short_name, $second_table_and_short_name, $first_on_conditions, $third_table_and_short_name, $second_on_conditions, $order_by_table_name_and_conditions = '', $where_conditions = '1'){
        // $sql = "SELECT a.article_id, a.title, c.catagory_id, c.catagory_name FROM `article` a  JOIN  catagory c  ON a.catagory_id = c.catagory_id WHERE c.catagory_name = 'UI/UX DESIGN'";
        $sql = "SELECT $first_select_conditions FROM $first_table_and_short_name JOIN $second_table_and_short_name ON $first_on_conditions JOIN $third_table_and_short_name ON $second_on_conditions WHERE $where_conditions $order_by_table_name_and_conditions;";
        $result = $this->connection()->query($sql);

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
    function update_where($table_name, $update_rows_and_values, $grab_point_and_grab_point_values = '1'){
        $update_where_sql = "UPDATE `$table_name` SET $update_rows_and_values WHERE $grab_point_and_grab_point_values";
        $result = $this->connection()->query($update_where_sql);

        return $result;

    }
    function delete_all(){
        $delete_all_sql = "";
        $result = $this->connection()->query($delete_all_sql);

        return $result;

    }
    function delete_where($table_name, $grab_point_and_values){
        $delete_where_sql = "DELETE FROM `$table_name` WHERE `$table_name`.$grab_point_and_values";
        $result = $this->connection()->query($delete_where_sql);

        return $result;

    }

    public function pure_data($data){
        $result = htmlspecialchars(mysqli_real_escape_string($this->connection(),$data), ENT_QUOTES);

        return $result;

    }
  
    function sanitizeBlogContent($content) {

        // using the htmlspecialchars for the conversion of the htmlspecial chars and now the sanitizedBlogContent function is the main of them for publishing the bloga
        $new_con = htmlspecialchars($content);


    // Then, handle the normalization of multiple backslashes before \r or \n
    $cleanedContent = preg_replace('/(?<!\\\\)(\\\\{2})(\\\\r|\\\\n)(?<!\\\\)/', '\\\\$2', $new_con);

    return $cleanedContent;
    }



//     public function article_data($data){
//         // $encodedData = htmlspecialchars($data); // Encode special characters
//         $encodedData = nl2br($data); // Preserve line breaks
    
//         // $result = mysqli_real_escape_string($this->connection(), $encodedData);

//         // $result = $encodedData;

//         $decodedData = str_replace("<br>", "\n", $data);
// $decodedData = strip_tags($decodedData);

//         return $data;

//     }

    public function show_blog_data($article){
        // $result = htmlspecialchars_decode($article);

        // replacing the \r\n with the br tag when it is showing the data
        // $result = str_replace("\r\n", "<br>", $article);;

        $string = "thin\\r\\ntjk"; // Your string with escaped characters

// Replace the escape sequences with their respective characters
$result = str_replace(array("\\r", "\\n"), array("\r", "\n"), $string);

// echo $convertedString;

        

        return $result;
    }

    function convertToBr($string) {
        // Replace escaped sequences with actual newlines, then convert newlines to <br> tags
        $convertedString = nl2br(str_replace(array("\\r", "\\n"), array("\r", "\n"), $string));
        
        return $convertedString;
    }
    // function convertEscapedAndNewlinesToBr($text) {
    //     // Replace escaped sequences "\\r" and "\\n" with their corresponding characters
    //     $text = str_replace(array("\\r", "\\n"), array("\r", "\n"), $text);
        
    //     // Convert newlines to <br> tags
    //     $text = nl2br($text);

    //     $result = str_replace(" \ ", " ", $text);
    
    //     // return $text;
    //     return $result;
    // }

    // function convertEscapedAndNewlinesToBr($text) {
    //     // Decode HTML entities
    //     $text = htmlspecialchars_decode($text, ENT_QUOTES);
    
    //     // Replace escaped sequences "\\r" and "\\n" with their corresponding characters
    //     $text = str_replace(array("\\r", "\\n"), array("\r", "\n"), $text);
    
    //     // Convert newlines to <br> tags
    //     $text = nl2br($text);
    
    //     return $text;
    // }

    function convertTextToBr($text) {

        // the convertTextToBr function is the main function for showing the blogs data and this is the main and primary funciton for showing and displaying the blogs data

        // Replace escaped sequences "\\r" and "\\n" with their corresponding characters
        $text = str_replace(array("\\r", "\\n"), array("\r", "\n"), $text);
    
        // Convert newlines to <br> tags
        $text = nl2br($text);
    
        return $text;
    }

    public function read_article_data($data){
        // $result = str_replace("<br/>", "", $data);

        $result = nl2br(htmlspecialchars(mysqli_real_escape_string($this->connection(), $data), ENT_QUOTES));


        return $result;
    }


    public function check_table($table_name){
        $sql_check_exist = "SHOW TABLES LIKE '$table_name'";
        $result = $this->connection()->query($sql_check_exist);

        return $result;


    }



}


?>