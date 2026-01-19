<!doctype html>
<html lang="pt">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Registar Conta</title>

        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
            rel="stylesheet"
        />
        <link rel="icon" type="image/png" href="Images/2307827.png" />
        <link rel="stylesheet" href="style.css" />
    </head>

    <body class="d-flex flex-column min-vh-100 text-white">
        <body class="d-flex flex-column min-vh-100">
        <header class="p-3 bg-dark text-white">
            <div class="container-fluid">
                <div
                    class="d-flex flex-wrap align-items-center justify-content-between"
                >
                    <a
                        href="/"
                        class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none"
                    >
                        <img
                            src="Images/2307827.png"
                            alt="Workout Planner Logo"
                            width="62"
                            height="60"
                            class="me-2"
                        />
                    </a>
                    <ul
                        class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0"
                    >
                        <li>
                            <a
                                href="index.html"
                                class="nav-link px-2 link-secondary"
                                ><u>Início</u></a
                            >
                        </li>
                        <li>
                            <a
                                href="funcoes.html"
                                class="nav-link px-2 text-white"
                                >Funções</a
                            >
                        </li>
                        <li>
                            <a
                                href="sobre.html"
                                class="nav-link px-2 text-white"
                                >Sobre</a
                            >
                        </li>
                    </ul>

                    <div class="text-end">
                        <a href="login.html" class="btn btn-outline-light me-2"
                            >Login</a
                        >
                        <a href="register.html" class="btn btn-warning me-2"
                            >Sign-up</a
                    </div>
                </div>
            </div>
        </header>

        <main
            class="flex-grow-1 d-flex align-items-center justify-content-center w-100"
        >
            <div
                class="card shadow-lg text-dark"
                style="width: 100%; max-width: 400px"
            >
                <div class="card-body p-4">
                    <form id="registerForm">
                        <h1 class="h3 mb-3 fw-normal text-center">
                            Criar Conta
                        </h1>

                        <div class="form-floating mb-2">
                            <input
                                type="nome"
                                class="form-control"
                                id="regNome"
                                placeholder="Nome e Apelido"
                                required
                            />
                            <label for="regNome">Nome</label>
                        </div>

                        <div class="form-floating mb-2">
                            <input
                                type="email"
                                class="form-control"
                                id="regEmail"
                                placeholder="nome@exemplo.com"
                                required
                            />
                            <label for="regEmail">Email</label>
                        </div>

                        <div class="form-floating mb-2">
                            <input
                                type="password"
                                class="form-control"
                                id="regPassword"
                                placeholder="Palavra-passe"
                                required
                            />
                            <label for="regPassword">Palavra-passe</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input
                                type="password"
                                class="form-control"
                                id="regConfirmPassword"
                                placeholder="Confirmar Palavra-passe"
                                required
                            />
                            <label for="regConfirmPassword"
                                >Confirmar Palavra-passe</label
                            >
                        </div>

                        <button
                            class="btn btn-success w-100 py-2"
                            type="submit"
                        >
                            Registar
                        </button>
                    </form>
                </div>
            </div>
        </main>

        <footer class="footer mt-auto p-3 py-3 text-white-50 text-center">
            Marcos Projeto PAP - Ano letivo 2025/2026
        </footer>
    <?php
    include('conexao.php');
    if(isset($_POST['submit'])) {
        $nome  = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['password']; 

        $sql_registo = "INSERT INTO utilizadores (nome, email, senha, tipo) 
                              VALUES ('$nome', '$email', '$senha', 'utilizador')";
        
        if(mysqli_query($conn, $sql_registo)) {
            echo "<script>alert('Conta criada!'); window.location='index.php';</script>";
        }
    }
    ?>
    </body>
</html>
