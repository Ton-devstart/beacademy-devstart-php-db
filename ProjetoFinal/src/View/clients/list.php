<h1>Listar Clientes</h1>

<div class="mb-3 text-end">
    <a href="/clientes/novo" class="btn btn-outline-primary">Novo Cliente</a>
    <a href="/clientes/relatorio" class="btn btn-dark">Gerar PDF</a>
</div>

<table class="table table-hover table-striped">
    <thead class="table-dark">
        <tr>
            <th>#ID</th>
            <th>Nome</th>
            <th>CPF</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>Endereço</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php
            while ($clients = $data->fetch(\PDO::FETCH_ASSOC)) {
               extract($clients);

                echo '<tr>';
                    echo "<td>{$id}</td>";
                    echo "<td>{$name}</td>";
                    echo "<td>{$cpf}</td>";
                    echo "<td>{$email}</td>";
                    echo "<td>{$telefone}</td>";
                    echo "<td>{$endereco}</td>";
                    echo "<td>
                        <a href='/clientes/editar?id={$id}' class='btn btn-warning btn-sm'>Editar</a>
                        <a href='/clientes/excluir?id={$id}' class='btn btn-danger btn-sm'>Excluir</a>
                    </td>";
                echo '</tr>';
            }
        ?>
    </tbody>
</table>