<?php
class Route{
    private $conn;
    private $table_name = "routes";

    public $route_id;
    public $number;

    public function __construct($db){
        $this->conn = $db;
    }

    function search_all(){

        $query = "SELECT DISTINCT * FROM routes";

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $stmt;
    }

    function search_by_id($keywords){

        $query = "SELECT * FROM routes WHERE route_id=1";

        $stmt = $this->conn->prepare($query);

        $keywords=htmlspecialchars(strip_tags($keywords));
        $keywords = "%{$keywords}%";

        $stmt->bindParam(1, $keywords);

        $stmt->execute();

        return $stmt;
    }

    function search_by_number($keywords){

        $query = "SELECT * FROM routes WHERE  number LIKE '%18%'";

        $stmt = $this->conn->prepare($query);

        $keywords=htmlspecialchars(strip_tags($keywords));
        $keywords = "%{$keywords}%";

        $stmt->bindParam(1, $keywords);

        $stmt->execute();

        return $stmt;
    }
}
