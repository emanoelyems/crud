<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create</title>
</head>
<body>
 
    {{ Form::open(array('url'=> '/produto/create')) }}
 
    {{ Form::label('nome', 'Nome') }}
    {{ Form::text('nome', null) }}
</br>
 
    {{ Form::label('descricao', 'Descrição') }}
    {{ Form::text('descricao', null) }}
</br>
 
    {{ Form::submit('Enviar') }}
 
    {{ Form::close() }}
 
    
 
 
</body>
</html>
