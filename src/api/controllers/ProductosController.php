<?php

class ProductosController
{
    private $model;

    public function __construct(ProductosModel $model)
    {
        $this->model = $model;
    }

    public function listar()
    {
        // Obtenemos todos los productos usando el modelo
        $productos = $this->model->obtenerTodos();

        // Enviamos la respuesta JSON
        header('Content-Type: application/json');
        echo json_encode(['data' => $productos]);
    }
}
