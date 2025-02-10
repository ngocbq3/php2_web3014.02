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

    /**
     * method create: dùng để thêm dữ liệu
     * @$data: dữ liệu bao gồm có key và value, trong đó key là tên cột trong bảng dữ liệu và value tương ứng
     */
    public static function create($data)
    {
        $model = new static;
        $sql = "INSERT INTO $model->tableName(";
        $values = " VALUES( ";

        foreach ($data as $column => $val) {
            $sql .= "`$column`, ";
            $values .= ":$column, ";
        }

        $sql = rtrim($sql, ', ') . ") " . rtrim($values, ', ') . ")";
        // dd($sql);
        $stmt = $model->conn->prepare($sql);
        $stmt->execute($data);

        return $model->conn->lastInsertId();
    }

    /**
     * phương thức update: để cập nhật dữ liệu theo id
     * @data: dữ liệu bao gồm có key và value, trong đó key là tên cột trong bảng dữ liệu và value tương ứng
     */
    public static function update($data, $id)
    {
        $model = new static;
        $sql = "UPDATE $model->tableName SET ";
        foreach ($data as $column => $val) {
            $sql .= "`$column`=:$column, ";
        }

        $sql = rtrim($sql, ", ") . " WHERE $model->primaryKey=:$model->primaryKey";
        // dd($sql);
        //Thêm primary vào cho data
        $data["$model->primaryKey"] = $id;

        $stmt = $model->conn->prepare($sql);
        $stmt->execute($data);
    }
}
