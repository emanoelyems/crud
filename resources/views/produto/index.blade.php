<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listando Produtos</title>
</head>
<body>

    <!-- botao criar -->
    <a href="{{ URL::to('produto/create') }}"><h2>Criar</h2></a>

    <!--
    <!--
    abrir tabela
    colocar cabeçalho
    listar produtos
    fechar tabela
    -->

    <table class="table no-margin">
        <thead>
            <tr>
                <th>id</th>
                <th>nome</th>
                <th>descrição</th>
                <th></th>
            </tr>
        </thead>
        <tbody>

          @foreach($produtos as $key => $value)
            <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->nome }}</td>
                <td>{{ $value->descricao }}</td>
            </tr>
           @endforeach

        </tbody>
    </table>

    @if (Session::has('message'))
        <div> {{ Session::get('message') }} </div>      
    @endif


    
</body>
</html>