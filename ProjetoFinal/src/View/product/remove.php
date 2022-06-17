<h1>Deseja realmente Excluir esse produto?</h1>

<table class="table table-hover table-striped">
    <thead class="table-dark">
        <tr>
            <th>#ID</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Imagem</th>
            <th>Preço</th>
            <th>Quantidade</th>
            <th>Data de Cadsatro</th>
            </tr>
    </thead>
    <tbody>
        <?php
            while ($product = $data->fetch(\PDO::FETCH_ASSOC)) {
               extract($product);

                echo "
                    <tr>
                        <td>{$id}</td>
                        <td>{$name}</td>
                        <td>{$description}</td>
                        <td> <img width='100px' src='{$photo}'> </td>
                        <td>R$ {$valor}</td>
                        <td>{$quantity}</td>
                        <td>{$created_at}</td>
                        <td>
                    </tr>
                ";
            }
        ?>
    </tbody>
</table>

<form action="" method="post">
    <button class="btn btn-primary">Confirmar</button>
</form>


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