<h1>Editar Cliente</h1>

<form action="" method="post">
    <label for="name">Nome</label>
    <input value="<?php echo $data['name'] ?>" id="name" name="name" type="text" class="form-control mb-3">

    <label for="cpf">CPF</label>
    <input value="<?php echo $data['cpf'] ?>" id="cpf" name="cpf" type="text" class="form-control mb-3">

    <label for="email">Email</label>
    <input value="<?php echo $data['email'] ?>" id="email" name="email" type="text" class="form-control mb-3">

    <label for="telefone">Telefone</label>
    <input value="<?php echo $data['telefone'] ?>" id="telefone" name="telefone" type="text" class="form-control mb-3">

    <label for="endereco">Endereço</label>
    <input value="<?php echo $data['endereco'] ?>" id="endereco" name="endereco" type="text" class="form-control mb-3">
    
    <button class="btn btn-primary">Atualizar</button>
</form>