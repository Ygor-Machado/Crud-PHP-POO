<?php
    $mensagem = '';
    if(isset($_GET['status'])){
        switch ($_GET['status']) {
            case 'success':
                $mensagem = '<div class="alert alert-success">Ação executada com sucesso!</div>';
                break;
            case 'error':
                $mensagem = '<div class="alert alert-danger">Ação não executada!</div>';
                break;
        }
    }
?>

<main>
    <?= $mensagem ?>

    <section>
        <a href="cadastrar.php">
            <button class="btn btn-success">Cadastrar Vaga</button>
        </a>
    </section>

    <section>
        <table class="table bg-light mt-3">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Titulo</th>
                    <th>Descrição</th>
                    <th>Status</th>
                    <th>Data</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($vagas as $vaga) : ?>
                    <tr>
                        <td><?= $vaga->id ?></td>
                        <td><?= $vaga->titulo ?></td>
                        <td><?= $vaga->descricao ?></td>
                        <td><?= $vaga->ativo == 's' ? 'Ativo' : 'Inativo' ?></td>
                        <td><?= date('d/m/Y à\s H:i:s', strtotime($vaga->data)) ?></td>
                        <td>
                            <a href="editar.php?id=<?= $vaga->id ?>">
                                <button class="btn btn-primary">Editar</button>
                            </a>
                            <a href="excluir.php?id=<?= $vaga->id ?>">
                                <button class="btn btn-danger">Excluir</button>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>
</main>