<?php
class Route{
    private $conn;
    private $table_name = "routes";

    public $route_id;
    public $number;

    public function __construct($db){
        $this->conn = $db;
    }

    // search routes
    function search($keywords){

        $query = "SELECT DISTINCT * FROM routes";

        $stmt = $this->conn->prepare($query);

        $keywords=htmlspecialchars(strip_tags($keywords));
        $keywords = "%{$keywords}%";

        $stmt->bindParam(1, $keywords);
        $stmt->bindParam(2, $keywords);
        $stmt->bindParam(3, $keywords);

        $stmt->execute();

        return $stmt;
    }
}