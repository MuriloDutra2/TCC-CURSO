<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login C-Street</title>
    <link rel="stylesheet" href="assets/css/login.css">
</head>
<body>

    <?php if (isset($_GET['erro'])): ?>
    <p style="color: red; text-align: center;"><?php echo htmlspecialchars($_GET['erro']); ?></p>
<?php endif; ?>

    <div class="login-container">
        <div class="login-box">
            <div class="logo-placeholder">
                <img src="assets/imagem-real/LOGO.jfif" alt="Logo C-Street">
            </div>
            <h2>Entrar</h2>
            <p>Faça login para continuar</p>
            <form>
                <div class="input-group">
                    <label for="login">Login</label>
                    <input type="text" id="login" name="login" required>
                </div>
                <div class="input-group">
                    <label for="senha">Senha</label>
                    <input type="password" id="senha" name="senha" required>
                </div>
                <button class="login-button" type="submit">Entrar</button>
            </form>
            <!-- Nova seção de cadastro -->
            <div class="signup-section">
                <p>Não tem uma conta? <a href="cadastro.html">Cadastre-se aqui</a></p>
            </div>
        </div>
    </div>

    
</body>



</html>
