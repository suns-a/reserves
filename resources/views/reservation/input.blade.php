<title>会議室予約</title>
{{ Form::open(['url' => '/api/reserve', 'method' => 'post']) }}
<div style="color: #ff1493; padding:10px; font-size:30px">会議室</div>
    <div style="padding:10px">事業部
    <p>
        {{ Form::select('division', $divisions, null, ['placeholder' => '選択してください'])}}
    </p>
    
    <p>予約者名<br />
        {{ Form::select('name', $users, null, ['placeholder' => '選択してください'])}}
    </p>

    <p>日付<br />
        {{ Form::date('date', '', ['id' => 'date']) }}
    </p>

    </p>開始時間<br />
        {{ Form::time('starts_at', '', ['id' => 'starts_at']) }}
    </p>

    </p>終了時間<br />
        {{ Form::time('ends_at', '', ['id' => 'ends_at']) }}
    </p>

    </p>内容<br />
    <p>
        {{ Form::select('usage', $usages, null, ['placeholder' => '選択してください'])}}
    </p>
    <br>
        <p>{{ Form::button('リセット', ['class' => 'btn btn-outline-success btn-lg', 'type' => 'reset']) }}</p>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <p>{{ Form::button('予約', ['name' => 'regist', 'class' => 'btn btn-success btn-lg', 'type' => 'submit']) }}</p>
@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
{{ Form::close() }}
@csrf

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Noto+Sans" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!doctype html>
    <head>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
<body>
{{-- ... --}}
    <div id='calendar'></div>
</body>
</!doctype>

