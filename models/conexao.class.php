<?php
class Conexao {
    private static $db;

    private function __construct(){}

    public static function getInstancia() {
        if (empty(self::$db)) {
            try {
                $host = 'localhost';
                $dbname = 'alugacar';  

                $dsn = "mysql:host={$host};dbname={$dbname};charset=utf8mb4";
                $usuario = 'root';  
                $senha = '';        

                self::$db = new PDO($dsn, $usuario, $senha);
                self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "Erro na conexão: {$e->getCode()}<br>Mensagem: {$e->getMessage()}";
                die();
            }
        }
        return self::$db;
    }
}
?>

