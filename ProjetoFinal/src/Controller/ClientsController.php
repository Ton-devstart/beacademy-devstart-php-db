<?php

declare (strict_types=1);

namespace App\Controller;

use App\Connection\Connection;
use Dompdf\Dompdf;

class ClientsController extends AbstractController
{
    public function listAction(): void
    {
        $con = Connection::getConnection();

        $result = $con->prepare('SELECT * FROM clients');
        $result->execute();
        
        parent::render('clients/list', $result);
    }

    public function addAction(): void
    {
        $con = Connection::getConnection();

        if ($_POST) {
            $name = $_POST['name'];
            $cpf = $_POST['cpf'];
            $email = $_POST['email'];
            $telefone = $_POST['telefone'];
            $endereco = $_POST['endereco'];

            $query = "INSERT INTO clients (name, cpf, email, telefone, endereco) VALUES ('{$name}', '{$cpf}', '{$email}', '{$telefone}', '{$endereco}');";

            $result = $con->prepare($query);
            $result->execute();

            echo 'Cliente Adicionado';
        }

        $result = $con->prepare('SELECT * FROM clients');
        $result->execute();
        
        parent::render('clients/add', $result);
    }

    public function editAction(): void
    {
        $id = $_GET['id'];
        
        $con = Connection::getConnection();

        if ($_POST) {
            $name = $_POST['name'];
            $cpf = $_POST['cpf'];
            $email = $_POST['email'];
            $telefone = $_POST['telefone'];
            $endereco = $_POST['endereco'];
           
            $query = " UPDATE clients SET 
                    name='{$name}',
                    cpf='{$cpf}',
                    email='{$email}',
                    telefone='{$telefone}',
                    endereco='{$endereco}'
                WHERE id='{$id}'
            ";

            $resultUpdate = $con->prepare($query);
            $resultUpdate->execute();

            echo 'Cliente Atualizado';
        }

        $query = "SELECT * FROM clients WHERE id='{$id}'";

        $resultUpdate = $con->prepare($query);
        $resultUpdate->execute();

        $data = $resultUpdate->fetch(\PDO::FETCH_ASSOC);

        parent::render('clients/edit', $data);
    }

    
    public function removeAction(): void
    {

        $id = $_GET['id'];

        $con = Connection::getConnection();

        $result = $con->prepare("DELETE FROM clients WHERE id='{$id}'");
        $result->execute();

        parent::messageRemoveClient('Cliente Excluído');

    }

    public function reportAction(): void
    {

        $con = Connection::getConnection();

        $result = $con->prepare('SELECT id, name, cpf, email, telefone, endereco FROM clients');
        $result->execute();

        $content = '';

        while ($clients = $result->fetch(\PDO::FETCH_ASSOC)) {
            extract($clients);
            
            $content .= "
                <tr>
                    <td>$id</td>
                    <td>$name</td>
                    <td>$cpf</td>
                    <td>$email</td>
                    <td>$telefone</td>
                    <td>$endereco</td>
                <tr>
            ";
        }
        
        $html = "
            <h1>Relatório de Clientes</h1>
            
            <table border='1' width='100%'>
                <thead>
                    <tr>
                        <th>#ID</th>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>EMAIL</th>
                        <th>TELEFONE</th>
                        <th>ENDERECO</th>
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

