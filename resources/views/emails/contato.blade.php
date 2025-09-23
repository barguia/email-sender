<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Novo Contato</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f9f9f9;
            padding: 20px;
            color: #333;
        }
        .container {
            max-width: 1000px;
            margin: auto;
            background: #ffffff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        }
        h2 {
            color: #2c3e50;
            margin-bottom: 20px;
        }
        .field {
            margin-bottom: 15px;
        }
        .label {
            font-weight: bold;
            color: #555;
        }
        .value {
            margin-top: 5px;
            padding: 10px;
            background: #f3f3f3;
            border-radius: 4px;
        }
        .mensagem {
            white-space: pre-line; /* mantém quebras de linha do texto */
        }
    </style>
</head>
<body>
<div class="container">
    <h2>📩 Novo contato recebido</h2>

    <div class="field">
        <div class="label">Nome:</div>
        <div class="value">{{ $dados['nome'] ?? 'Não informado' }}</div>
    </div>

    <div class="field">
        <div class="label">E-mail:</div>
        <div class="value">{{ $dados['email'] ?? 'Não informado' }}</div>
    </div>

    <div class="field">
        <div class="label">Telefone:</div>
        <div class="value">{{ $dados['telefone'] ?? 'Não informado' }}</div>
    </div>

    <div class="field">
        <div class="label">Assunto:</div>
        <div class="value">{{ $dados['assunto'] ?? 'Sem assunto' }}</div>
    </div>

    <div class="field">
        <div class="label">Mensagem:</div>
        <div class="value mensagem">
            <pre>
                {{ $dados['mensagem'] ?? 'Sem mensagem' }}
            </pre>
        </div>
    </div>
</div>
</body>
</html>
