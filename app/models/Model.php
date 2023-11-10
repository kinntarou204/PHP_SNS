<?php
class Model
{
    public $pdo;
    public string $table = "";
    public $value;
    public array $values = [];
    public array $errors = [];
    function __construct()
    {
        $db_connection = DB_CONNECTION;
        $db_name = DB_DATABASE;
        $db_host = DB_HOST;
        $db_port = DB_PORT;
        $db_user = DB_USERNAME;
        $db_password = DB_PASSWORD;

        $dsn = "{$db_connection}:dbname={$db_name};host={$db_host};charset=utf8;port={$db_port}";
        try {
            $this->pdo = new PDO($dsn, $db_user, $db_password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        } catch (PDOException $e) {
            echo "接続失敗: " . $e->getMessage();
            echo $dsn;
            exit;
        }
    }

    public function fetchBySQL(string $sql)
    {
        $value = $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
        $this->value = $value;
        return $value;
    }

    public function fetchAllBySQL(string $sql)
    {
        $value = $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        $this->value = $value;
        return $value;
    }

    public function get(int $limit = 20)
    {
        $sql = "SELECT * FROM {$this->table} LIMIT {$limit};";
        $values = $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        $this->values = $values;
        return $values;
    }

    public function find(int $id)
    {
        if (empty($id)) return;
        $sql = "SELECT * FROM {$this->table} WHERE id = {$id};";
        $this->value = $this->fetchBySQL($sql);
        return $this->value;
    }

    public function save(array $posts)
    {
        if (!$posts) return;
        $posts = check($posts);

        $column = implode(",", array_keys($posts));
        foreach ($posts as $post) {
            $values[] = "\"{$post}\"";
        }
        $value = implode(",", $values);
        $sql = "INSERT INTO {$this->table} ({$column}) VALUES ({$value});";
        return $this->pdo->query($sql);
    }

    public function delete($id)
    {
        $data['id'] = $id;
        $sql = "DELETE FROM {$this->table} WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute($data);
    }

    public function bind(array $data)
    {
        $data = check($data);
        $this->value = $data;
    }

}