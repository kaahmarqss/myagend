<?php

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Página de cadastro de viagens aéreas para empresas.">
    <title>Cadastro de Viagens Aéreas</title>
    <link rel="stylesheet" href="css/stylepage.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
        /* Responsividade simples */
        @media (max-width: 600px) {
            nav ul {
                flex-direction: column;
                gap: 0.75rem;
            }
            section.info-cards {
                flex-direction: column;
                padding: 1rem;
            }
            section.info-cards .card {
                flex: 1 1 100%;
            }
        }
    </style>
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

    <section class="info-cards">
        <img src="imagens/agenda.jpg" style = "width: 100%;" alt="">
    </section>

</body>


<!-- javascript para interagir no menu do sidebar -->
<script>
document.querySelectorAll(".submenu > a").forEach(link => {
    link.addEventListener("click", function(e) {
        e.preventDefault(); // Evita recarregar página
        this.parentElement.classList.toggle("open");
    });
});
</script>

</html> 