<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Visualizar</title>
</head>
<body>
    
    <h2>Visualizar</h2>
<ul>
    <li>ID:                   {{ $produto->id }}        </li>
    <li>Nome:                 {{ $produto->nome }}      </li>
    <li>Descrição:            {{ $produto->descricao }} </li>
    <li>Criação:              {{ Carbon\Carbon::parse($produto->create_at)->format('d/m/Y H:i') }} </li>
    <li>Última modificação:   {{ Carbon\Carbon::parse($produto->update_at)->format('d/m/Y H:i') }} </li>
</ul>
 
 
</body>
</html>
