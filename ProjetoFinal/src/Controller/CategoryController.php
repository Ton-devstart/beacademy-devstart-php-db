<?php

declare (strict_types=1);

namespace App\Controller;

//use App\Controller\AbstractController;
use App\Connection\Connection;

class CategoryController extends AbstractController
{
    public function listAction(): void
    {
        $con = Connection::getConnection();

        $result = $con->prepare('SELECT * FROM category');
        $result->execute();

        parent::render('category/list', $result);
    }

    public function addAction(): void
    {
        if ($_POST) {
            $name = $_POST['name'];
            $description = $_POST['description'];

            $query = "INSERT INTO category (name, description) VALUES ('{$name}', '{$description}')";

            $con = Connection::getConnection();

            $result = $con->prepare($query);
            $result->execute();

            echo 'Categoria Inserida';
        }
        
        parent::render('category/add');
    }

    public function removeAction(): void
    {
        $con = Connection::getConnection();

        $id = $_GET['id'];

        $query = "DELETE FROM category WHERE id=?";

        $result = $con->prepare($query);
            $result->execute([$id]);

        echo 'Categoria Excluída';
    }
    
    public function updateAction(): void
    {
        $id = $_GET['id'];

        $con = Connection::getConnection();

        if ($_POST) {
            $newName = $_POST['name'];
            $newDescription = $_POST['description'];
            
            $queryUpdate = "UPDATE category SET name='{$newName}', description='{$newDescription}' WHERE id='{$id}'";

            $result = $con->prepare($queryUpdate);
            $result->execute();

            echo 'Categoria Atualizada';
        }


        $query = "SELECT * FROM category WHERE id='{$id}'";

        $result = $con->prepare($query);
            $result->execute();

        $data = $result->fetch(\PDO::FETCH_ASSOC);

        parent::render('category/edit', $data);
    }

}