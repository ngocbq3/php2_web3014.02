<?php

namespace App\Models;

use PDO;
use PDOException;

class BaseModel
{
    protected $conn = null;
    protected $tableName = null;
    protected $primaryKey = 'id';
    protected $sqlBuilder;

    public function __construct()
    {
        try {
            $this->conn = new PDO("mysql:host=localhost; dbname=php2_web3014.01; charset=utf8; port=3306", "root", "");
        } catch (PDOException $e) {
            echo "Lỗi kết nối cơ sở dữ liệu: " . $e->getMessage();
        }
    }

    public static function all()
    {
        $model = new static;
        $model->sqlBuilder = "SELECT * FROM $model->tableName";
        $stmt = $model->conn->prepare($model->sqlBuilder);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }
}
