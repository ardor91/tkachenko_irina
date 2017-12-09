<?php
class bus
{
    private $conn;
    private $table_name = "buses";

    public $bus_id;
    public $number;

    public function __construct($db){
        $this->conn = $db;
    }

    function search_all(){

        $query = "SELECT DISTINCT * FROM buses";

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $stmt;
    }

    public function search_by_id($keywords){

        $query = "SELECT * FROM buses WHERE bus_id=1";

        $stmt = $this->conn->prepare($query);

        $keywords=htmlspecialchars(strip_tags($keywords));
        $keywords = "%{$keywords}%";

        $stmt->bindParam(1, $keywords);

        $stmt->execute();

        return $stmt;
    }

    function search_by_number($keywords){

        $query = "SELECT DISTINCT * FROM buses WHERE number LIKE '%18%'";

        $stmt = $this->conn->prepare($query);

        $keywords=htmlspecialchars(strip_tags($keywords));
        $keywords = "%{$keywords}%";

        $stmt->bindParam(1, $keywords);

        $stmt->execute();

        return $stmt;
    }}
