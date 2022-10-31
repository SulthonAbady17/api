<?php 

class Controller {
    public function model($model)
    {
        require_once '../api/models/' . $model . '.php';
        return new $model;
    }
}