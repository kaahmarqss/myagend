<?php

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Página de cadastro de viagens aéreas para empresas.">
    <title>Cadastro de Viagens Aéreas</title>
    <link rel="stylesheet" href="css/stylehome.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <!-- Header -->
    <aside class= "sidebar">
            <h1>SUA AGENDA</h1>
            <nav>
               <ul>
                    <li><a href="page.php">Início</a></li>

                    <li class="submenu">
                        <a href="">Cadastros</a>
                        <ul class="submenu-items">
                            <li><a href="cadastros_contatos.php"><i class= "fa fa-calendar"> |Contatos</i></a></li>
                            <!-- <li><a href="cadastro_passageiros.php"></a></li>
                            <li><a href="cadastro_voos.php"></a></li> -->
                        </ul>
                    </li>

                    <li><a href="consultas_gerais.php">Consultar</a></li>
                    <li><a href="../index.php">Sair</a></li>
                </ul>
            </nav>
    </aside>

    <!-- Formulário de Cadastro de Viagem -->
    <section class="formulario">
        <div class="container">
            <h2>Registrar Novo Contato</h2>
           <form id="formCadastroSetor" method="POST" action="">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" id="nome" name="nome" placeholder="Nome do Contato" required>
                </div>

                <div class="form-group">
                    <label for="telefone">Telefone</label>
                    <input type="text" id="telefone" name="telefone" placeholder="Telefone do Contato" required>
                </div>

                <div class="form-group">
                    <label for="emai">E-mail do Contato</label>
                    <input type="text" id="email" name="email" placeholder="Responsável pelo Setor" required>
                </div>

                <div class="form-group">
                    <label for="endereço">Endereço</label>
                    <input type="text" id="endereço" name="endereço" placeholder="Localização do Setor">
                </div>

                <div class="col-md-12">
                    <div class="row">
                        <div class="col-6">
                            <label for="bairro">Bairro</label>
                            <input type="text" id="bairro" name="bairro" placeholder="Email do Setor" class="form-control">
                        </div>
                        <div class="col-6">
                            <label for="cidade/Estado">Cidade/Estado</label>
                            <input type="text" id="cidade/Estado" name="cidade/Estado" placeholder="Cidade/Estado do Contato" class="form-control">
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <label for="descricao">Descrição (Opcional)</label>
                    <textarea id="descricao" name="descricao" placeholder="Observações"></textarea>
                </div>

                <button type="submit" name="submit">Cadastrar Contato</button>
            </form>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <p>&copy; 2025 Agenda de Contatos. Todos os direitos reservados pela Kaima.</p>
        </div>
    </footer>

    <!-- Scripts -->
<script src="script.js"></script>

<?php if (isset($_GET['alert'])): ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
let alertType = "<?php echo $_GET['alert']; ?>";

let alerts = {
    success: { icon: 'success', title: '✅ Contato cadastrado com sucesso!', timer: 2000 },
    error:   { icon: 'error',   title: '❌ Erro ao cadastrar o contato.',   timer: 2000 },
    warning: { icon: 'warning', title: '⚠️ Por favor, preencha todos os campos obrigatórios!', timer: 2500 }
};

if (alerts[alertType]) {
    Swal.fire({
        icon: alerts[alertType].icon,
        title: alerts[alertType].title,
        showConfirmButton: false,
        timer: alerts[alertType].timer
    }).then(() => {
        // Remove o parâmetro da URL sem recarregar
        window.history.replaceState(null, null, window.location.pathname);
    });
}
</script>
<?php endif; ?>

</body>
</html>