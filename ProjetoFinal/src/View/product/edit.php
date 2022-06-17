<h1>Editar Produto</h1>

<?php

    extract($data);

?>

<form action="" method="post">
    <label for="name">Nome</label>
    <input value="<?php echo $product['name']; ?>" id="name" name="name" type="text" class="form-control mb-3">

    <label for="description">Descrição</label>
    <textarea id="description" name="description" type="text" class="form-control mb-3"><?php echo $product['description']; ?></textarea>

    <label for="valor">Preço</label>
    <input id="valor" name="valor" value="<?php echo $product['valor']; ?>" type="text" class="form-control mb-3">

    <label for="quantity">Quantidade</label>
    <input id="quantity" name="quantity" value="<?php echo $product['quantity']; ?>" type="text" class="form-control mb-3">

    <label for="photo">Foto</label>
    <input id="photo" name="photo" value="<?php echo $product['photo']; ?>" type="text" class="form-control mb-3">

    <button class="btn btn-primary">Atualizar</button>
</form>