

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagamento - C-Street</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #F0F0F2;
            color: #0D0D0D;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: 50px auto;
            background-color: white;
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #D93223;
            margin-bottom: 30px;
        }

        .checkout {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
        }

        .details {
            width: 48%;
        }

        .details h2 {
            border-bottom: 2px solid #D93223;
            padding-bottom: 10px;
            margin-bottom: 20px;
            font-size: 24px;
            color: #A62F24;
        }

        .details .info {
            margin-bottom: 20px;
        }

        .details label {
            display: block;
            margin-bottom: 5px;
            color: #0D0D0D;
            font-weight: bold;
        }

        .details input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 2px solid #ababab;
            border-radius: 5px;
            font-size: 16px;
        }

        .summary {
            width: 48%;
        }

        .summary h2 {
            border-bottom: 2px solid #D93223;
            padding-bottom: 10px;
            margin-bottom: 20px;
            font-size: 24px;
            color: #A62F24;
        }

        .summary ul {
            list-style-type: none;
            padding: 0;
        }

        .summary ul li {
            margin-bottom: 10px;
            font-size: 18px;
        }

        .summary ul li span {
            float: right;
        }

        .summary .total {
            font-size: 22px;
            font-weight: bold;
            border-top: 2px solid #D93223;
            padding-top: 10px;
        }

        .payment-options {
            display: flex;
            justify-content: space-around;
            margin-top: 20px;
        }

        .payment-options button {
            background-color: #A62F24;
            color: white;
            padding: 15px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            width: 22%;
        }

        .payment-options button:hover {
            background-color: #D93223;
        }

        .success-message {
            display: none;
            text-align: center;
            margin-top: 30px;
            color: green;
            font-size: 18px;
        }

    </style>
</head>
<body>
    <div class="container">
        <h1>Confirmação de Pagamento</h1>

        <!-- Formulário com Nome e Email -->
        <div class="checkout">
            <div class="details">
                <h2>Detalhes do Pagamento</h2>
                <div class="info">
                    <label>Email:</label>
                    <input type="email" id="user-payment-email" placeholder="Insira seu email" required>
                </div>
                <div class="info">
                    <label>Nome:</label>
                    <input type="text" id="user-name" placeholder="Insira seu nome" required>
                </div>
            </div>

            <!-- Resumo da Compra -->
            <div class="summary">
                <h2>Resumo da Compra</h2>
                <ul>
                    <li>Filme: <span id="summary-movie"></span></li>
                    <li>Assentos: <span id="summary-seats"></span></li>
                    <li class="total">Total: R$ <span id="summary-price"></span></li>
                </ul>
            </div>
        </div>

        <!-- Opções de Pagamento -->
        <div class="payment-options">
            <button onclick="finalizarCompra('Débito')">Débito</button>
            <button onclick="finalizarCompra('Crédito')">Crédito</button>
            <button onclick="finalizarCompra('Pix')">Pix</button>
            <button onclick="finalizarCompra('Boleto')">Boleto</button>
        </div>

        <!-- Mensagem de sucesso -->
        <div class="success-message" id="successMessage">Compra efetuada com sucesso!</div>
    </div>

    <script>
        // Função para obter dados do LocalStorage
        function loadCheckoutData() {
            const selectedSeats = JSON.parse(localStorage.getItem('selectedSeats')) || [];
            const movieTitle = localStorage.getItem('selectedFilm') || 'Filme não selecionado';
            const totalPrice = localStorage.getItem('totalPrice') || '0,00';

            // Atualiza os elementos HTML com os dados do LocalStorage
            document.getElementById('summary-seats').textContent = selectedSeats.join(', ');
            document.getElementById('summary-movie').textContent = movieTitle;
            document.getElementById('summary-price').textContent = totalPrice.replace('.', ',');
        }

        // Função para finalizar a compra e enviar a solicitação de email
        function finalizarCompra(metodoPagamento) {
            const email = document.getElementById('user-payment-email').value;
            const nome = document.getElementById('user-name').value;

            if (email && nome) {
                // Envia uma requisição para o servidor PHP enviar o email
                const xhr = new XMLHttpRequest();
                xhr.open("POST", "processa_pagamento.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.onload = function() {
                    if (xhr.status === 200) {
                        // Exibe a mensagem de sucesso
                        document.getElementById('successMessage').style.display = "block";
                        
                        // Redireciona para index.php após 3 segundos
                        setTimeout(() => {
                            window.location.href = "../index.php";
                        }, 3000);
                    }
                };
                xhr.send(`email=${encodeURIComponent(email)}&nome=${encodeURIComponent(nome)}&metodo=${encodeURIComponent(metodoPagamento)}`);
            } else {
                alert("Por favor, insira seu nome e email.");
            }
        }

        // Carregar dados no carregamento da página
        window.onload = loadCheckoutData;
    </script>
</body>
</html>
