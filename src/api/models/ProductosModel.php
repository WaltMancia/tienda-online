<?php

class ProductosModel
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function obtenerTodos()
    {
        try {
            //--- EXPLICACIÓN DE SEGURIDAD (OWASP Top 10) ---
            // A03: Inyección (Injection). Esta consulta es segura porque no usa
            // entrada del usuario. Más adelante, cuando usemos parámetros,
            // usaremos sentencias preparadas para prevenir ataques.

            $stmt = $this->pdo->prepare("SELECT * FROM productos");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // En un entorno profesional, registraríamos el error en un log
            // para su posterior análisis. Nunca mostraríamos el error al cliente.
            error_log("Error en ProductosModel::obtenerTodos: " . $e->getMessage());
            return [];
        }
    }
}
