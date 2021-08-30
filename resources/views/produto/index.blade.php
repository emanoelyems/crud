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
                <th></th>
                <th></th>
            </tr>

        </thead>
        <tbody>

          @foreach($produtos as $key => $value)
            <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->nome }}</td>
                <td>{{ $value->descricao }}</td>

                <td>
                    <a href="{{ URL::to('produto/' . $value->id) }}">Visualizar</a>
                </td>

                <td>
                    <a href="{{ URL::to('produto/' . $value->id . '/edit') }}">Editar</a>
                </td>

                <td>
                                    
                    {{ Form::open(array('url' => 'produto/' . $value->id, 'onsubmit' => 'return ConfirmeDelete()')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Excluir', array('class' => 'btn btn-danger')) }}
                    {{ Form::close() }}
                </td>

            </tr>
           @endforeach

        </tbody>
    </table>

    @if (Session::has('message'))
        <div> {{ Session::get('message') }} </div>      
    @endif

    <script>
        function ConfirmDelete(){
            return confirm('Tem certeza que deseja excluir este registro?');
        }
    </script>


    
</body>
</html>