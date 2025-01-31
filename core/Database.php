<?php
namespace core;
use PDO;
use Exception;
//connect to our mysql database
class Database
{
    public $connection;
    //public $statement; // Remeber it needs to be protected


    public function __construct($config,$username = 'root',$password = '')
    {
        
        $dsn = 'mysql:'.http_build_query($config,'',';'); // 3rd arg ; indicate seprater

        //below is traditional way for dsn
        //$dsn = "host={$config['host']};port={$config['port']};dbname={$config['dbname']};charset={$config['charset']}";
        $this -> connection = new PDO($dsn,$username,$password,[
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }
    public function query_Sta(string $quey,array $params=[])
    {
        $statement = $this -> connection->prepare($quey);
        try{
            $statement->execute($params);
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
        return $statement;
    }
}

?>
