<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Estudos em PHP</title>
</head>
<body>
    <header>
        <h1>Validador de CPF</h1>
    </header>
    <section>

        <form action="" method="POST">
            <label for="cpf">CPF:</label>
            <input type="text" name="cpf" id="cpf" placeholder="111.111.111-11" required onblur="this.form.submit()">
            <input type="submit" value="Verificar">
        </form>
        
        <?php

            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['cpf'])) {

                $CPF = $_POST['cpf'];
                include 'CpfTools.php';

                if(validaCPF($CPF) == 0)
                    echo "<p>O CPF $CPF é válido!</p>";
                else
                    echo "<p style='color:red;'>O CPF $CPF é inválido! Por favor, insira um CPF válido.</p>";
            }
        ?>
    </section>
</body>
</html>