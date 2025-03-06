<?php
require "models/Model.php";

class Blog extends Model {
    protected static function getTableName(): string {
        return "posts";
    }

    public static function find($id) {
        self::init();
        $sql = "SELECT * FROM " . static::getTableName() . " WHERE id = :id";
        $record = self::$db->query($sql, ['id' => $id])->fetch();
        return $record;
    }

    public static function insert($data) {
        self::init();
        $sql = "INSERT INTO " . static::getTableName() . " (title, content) VALUES (:title, :content)";
        self::$db->query($sql, $data);
    }

    public static function update($id, $data) {
        self::init();
        $sql = "UPDATE " . static::getTableName() . " SET title = :title, content = :content WHERE id = :id";
        $data['id'] = $id;
        self::$db->query($sql, $data);
    }

    public static function delete($id) {
        self::init();
        $sql = "DELETE FROM " . static::getTableName() . " WHERE id = :id";
        self::$db->query($sql, ['id' => $id]);
    }
}
