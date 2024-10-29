<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login C-Street</title>
    <link rel="stylesheet" href="assets/css/login.css">
    <link rel="shortcut icon" sizes="32x32" href="assets/imagem-real/logo-favicon.png" type="image/x-icon">
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
            <form action="processa_login.php" method="POST">
                <div class="input-group">
                    <label for="login">Login</label>
                    <input type="text" id="login" name="login" required>
                </div>
                <div class="input-group">
                    <label for="senha">Senha</label>
                    <input type="password" id="senha" name="senha" required>
                </div>
                
                <!-- Checkbox de aceitação dos Termos de Uso -->
                <div class="checkbox-group">
                    <input type="checkbox" id="agree-terms" name="agree_terms" required>
                    <label for="agree-terms">Concorda com nossos <a href="assets/imagem-real/termosdeuso.pdf" target="_blank">termos de uso</a>?</label>
                </div>
                
                <button class="login-button" type="submit">Entrar</button>
            </form>
            
            <div class="signup-section">
                <p>Não tem uma conta? <a href="cadastro.html">Cadastre-se aqui</a></p>
            </div>
        </div>
    </div>
    
</body>
</html>
