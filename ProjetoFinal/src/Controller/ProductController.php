<?php

declare (strict_types=1);

namespace App\Controller;

use App\Connection\Connection;
use Dompdf\Dompdf;

class ProductController extends AbstractController
{
    public function listAction(): void
    {
        $con = Connection::getConnection();

        $result = $con->prepare('SELECT * FROM product');
        $result->execute();
        
        parent::render('product/list', $result);
    }

    public function addAction(): void
    {
        $con = Connection::getConnection();

        if ($_POST) {
            $name = $_POST['name'];
            $description = $_POST['description'];
            $valor = $_POST['valor'];
            $photo = $_POST['photo'];
            $quantity = $_POST['quantity'];
            $category = $_POST['category'];
            $created_at = date('Y-m-d H:i:s');

            $query = "INSERT INTO product (name, description, valor, photo, quantity, categoria_id, created_at) VALUES ('{$name}', '{$description}', '{$valor}', '{$photo}', '{$quantity}','{$category}', '{$created_at}');";

            $result = $con->prepare($query);
            $result->execute();

            echo 'Produto Adicionado';
        }

        $result = $con->prepare('SELECT * FROM category');
        $result->execute();
        
        parent::render('product/add', $result);
    }

    public function editAction(): void
    {
        $id = $_GET['id'];
        
        $con = Connection::getConnection();

        $categories = $con->prepare('SELECT * FROM category');
        $categories->execute();

        if ($_POST) {
            $name = $_POST['name'];
            $description = $_POST['description'];
            $valor = $_POST['valor'];
            $photo = $_POST['photo'];
            $quantity = $_POST['quantity'];
           
            $query = "
                UPDATE product SET 
                    name='{$name}',
                    description='{$description}',
                    valor='{$valor}',
                    photo='{$photo}',
                    quantity='{$quantity}'
                WHERE id='{$id}'
            ";

            $resultUpdate = $con->prepare($query);
            $resultUpdate->execute();

            echo 'Produto Atualizado';
        }

        $product = $con->prepare("SELECT * FROM product WHERE id='{$id}'");
        $product->execute();
        
        parent::render('product/edit', [
            'product' => $product->fetch(\PDO::FETCH_ASSOC),
        ]);
    }

    public function removeAction(): void
    {

        $id = $_GET['id'];

        $con = Connection::getConnection();

        $result = $con->prepare("DELETE FROM product WHERE id='{$id}'");
        $result->execute();

        // $message = 'Produto Excluído';

        // include dirname(__DIR__).'/View/_partials/message.php';
        
        // parent::render('product/edit');

        parent::renderMessage('Produto Excluído');

    }

    public function reportAction(): void
    {

        $con = Connection::getConnection();

        $result = $con->prepare('SELECT prod.id, prod.name, prod.quantity, cat.name as category FROM product prod INNER JOIN category cat ON categoria_id = cat.id');
        $result->execute();

        $content = '';

        while ($product = $result->fetch(\PDO::FETCH_ASSOC)) {
            extract($product);
            
            $content .= "
                <tr>
                    <td>$id</td>
                    <td>$name</td>
                    <td>$quantity</td>
                    <td>$category</td>
                <tr>
            ";
        }
        
        $html = "
            <h1>Relatório de Estoque</h1>
            
            <table border='1' width='100%'>
                <thead>
                    <tr>
                        <th>#ID</th>
                        <th>Nome</th>
                        <th>Quantidade</th>
                        <th>Categoria</th>
                    <tr>
                </thead>
                <tbody>
                    {$content}
                </tbody>
            </table

        ";


        $pdf = new Dompdf();
        $pdf->loadhtml($html);
        $pdf->render();
        $pdf->stream();

    }

}

