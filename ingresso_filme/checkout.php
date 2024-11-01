<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagamento - C-Street</title>
    <link rel="shortcut icon" sizes="32x32" href="../assets/imagem-real/logo-favicon.png" type="image/x-icon">
    <style>
        /* Estilos principais */
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

        .details,
        .summary {
            width: 48%;
        }

        .details h2,
        .summary h2 {
            border-bottom: 2px solid #D93223;
            padding-bottom: 10px;
            margin-bottom: 20px;
            font-size: 24px;
            color: #A62F24;
        }

        .details .info,
        .summary ul li {
            margin-bottom: 20px;
            font-size: 18px;
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

        .summary ul {
            list-style-type: none;
            padding: 0;
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

        /* Media Queries */
        @media (max-width: 1024px) {
            .container {
                width: 90%;
            }

            .details,
            .summary {
                width: 100%;
                margin-bottom: 20px;
            }

            .checkout {
                flex-direction: column;
            }

            .payment-options button {
                width: 40%;
                margin: 10px;
            }
        }

        @media (max-width: 768px) {
            h1 {
                font-size: 24px;
            }

            .details h2,
            .summary h2 {
                font-size: 20px;
            }

            .details input,
            .payment-options button {
                padding: 12px;
                font-size: 14px;
            }

            .summary ul li {
                font-size: 16px;
            }

            .summary .total {
                font-size: 20px;
            }

            .payment-options {
                flex-direction: column;
                align-items: center;
            }

            .payment-options button {
                width: 60%;
            }
        }

        @media (max-width: 575px) {
            .container {
                width: 100%;
                padding: 20px;
            }

            .details h2,
            .summary h2 {
                font-size: 18px;
            }

            .details input,
            .payment-options button {
                font-size: 14px;
                padding: 10px;
            }

            .summary ul li {
                font-size: 14px;
            }

            .payment-options button {
                width: 80%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Confirmação de Pagamento</h1>

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

            <div class="summary">
                <h2>Resumo da Compra</h2>
                <ul>
                    <li>Filme: <span id="summary-movie"></span></li>
                    <li>Assentos: <span id="summary-seats"></span></li>
                    <li class="total">Total: R$ <span id="summary-price"></span></li>
                </ul>
            </div>
        </div>

        <div class="payment-options">
            <button onclick="finalizarCompra('Débito')">Débito</button>
            <button onclick="finalizarCompra('Crédito')">Crédito</button>
            <button onclick="finalizarCompra('Pix')">Pix</button>
            <button onclick="finalizarCompra('Boleto')">Boleto</button>
        </div>

        <div class="success-message" id="successMessage">Compra efetuada com sucesso!</div>
    </div>

    <script>
    function loadCheckoutData() {
        const selectedSeats = JSON.parse(localStorage.getItem('selectedSeats')) || [];
        const movieTitle = localStorage.getItem('selectedFilm') || 'Filme não selecionado';
        const totalPrice = localStorage.getItem('totalPrice') || '0,00';

        document.getElementById('summary-seats').textContent = selectedSeats.join(', ');
        document.getElementById('summary-movie').textContent = movieTitle;
        document.getElementById('summary-price').textContent = totalPrice.replace('.', ',');
    }

    function finalizarCompra(metodoPagamento) {
    console.log("Início da função finalizarCompra"); // Log inicial
    
    const email = document.getElementById('user-payment-email').value;
    const nome = document.getElementById('user-name').value;
    const filme = document.getElementById('summary-movie').textContent;
    const assentos = document.getElementById('summary-seats').textContent;
    const total = document.getElementById('summary-price').textContent;

    if (email && nome) {
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "../processa_pagamento.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        // Log dos dados enviados
        console.log(`Dados enviados: email=${email}, nome=${nome}, metodo=${metodoPagamento}, filme=${filme}, assentos=${assentos}, total=${total}`);

        xhr.onload = function() {
            if (xhr.status === 200) {
                console.log("Requisição enviada com sucesso:", xhr.responseText); // Verifique a resposta
                document.getElementById('successMessage').style.display = "block";
                setTimeout(() => {
                    window.location.href = "../index.php";
                }, 3000);
            } else {
                console.error("Erro na requisição:", xhr.status, xhr.statusText);
            }
        };
        
        xhr.onerror = function() {
            console.error("Erro de rede ou URL incorreta.");
        };

        xhr.send(`email=${encodeURIComponent(email)}&nome=${encodeURIComponent(nome)}&metodo=${encodeURIComponent(metodoPagamento)}&filme=${encodeURIComponent(filme)}&assentos=${encodeURIComponent(assentos)}&total=${encodeURIComponent(total)}`);
    } else {
        alert("Por favor, insira seu nome e email.");
        console.warn("Campos de email e nome não preenchidos.");
    }
}

    

    window.onload = loadCheckoutData


    
    </script>
</body>
</html>