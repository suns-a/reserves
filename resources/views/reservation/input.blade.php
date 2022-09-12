<title>会議室予約</title>
{{ Form::open(['url' => '/reserve', 'method' => 'post']) }}
<div style="text-align: center; font-size:50px">会議室予約</div>
    事業部
    <p>{{ Form::select('division', $divisions, 
        null, 
       ['placeholder' => '選択してください'])}}
    </p>
    
    <p>予約者名<br />
        {{ Form::select('name', $users,
        null, 
       ['placeholder' => '選択してください'])}}
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
    <p>{{ Form::select('usage', $usages, 
        null, 
       ['placeholder' => '選択してください'])}}
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
</form>
@csrf

<?php
date_default_timezone_set('Asia/Tokyo');

if (isset($_GET['ym'])) {
    $ym = $_GET['ym'];
} else {
    $ym = date('Y-m');
}

$timestamp = strtotime($ym . '-01');
if ($timestamp === false) {
    $ym = date('Y-m');
    $timestamp = strtotime($ym . '-01');
}

$today = date('Y-m-j');

$html_title = date('Y年n月', $timestamp);

$prev = date('Y-m', strtotime('-1 month', $timestamp));
$next = date('Y-m', strtotime('+1 month', $timestamp));

$day_count = date('t', $timestamp);

$youbi = date('w', $timestamp);

$weeks = [];
$week = '';

$week .= str_repeat('<td></td>', $youbi);

for ($day = 1; $day <= $day_count; $day++, $youbi++) {
    $date = $ym . '-' . $day;

    if ($today == $date) {
        $week .= '<td class="today">' . $day;
    } else {
        $week .= '<td>' . $day;
    }
    $week .= '</td>';

    if ($youbi % 7 == 6 || $day == $day_count) {
        if ($day == $day_count) {
            $week .= str_repeat('<td></td>', 6 - ($youbi % 7));
        }

        $weeks[] = '<tr>' . $week . '</tr>';

        $week = '';
    }
}

?>



<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>会議室予約</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans" rel="stylesheet">
    <style>
      .container {
        font-family: 'Noto Sans', sans-serif;
          margin-top: 80px;
      }
        h3 {
            margin-bottom: 30px;
        }
        th {
            height: 30px;
            text-align: center;
        }
        td {
            height: 100px;
        }
        .today {
            background: orange;
        }
        th:nth-of-type(1), td:nth-of-type(1) {
            color: red;
        }
        th:nth-of-type(7), td:nth-of-type(7) {
            color: blue;
        }
    </style>
</head>
<body>
    <div class="container">
        <h3><a href="?ym=<?php echo $prev; ?>">&lt;</a><?php echo $html_title; ?><a href="?ym=<?php echo $next; ?>">&gt;</a></h3>
        <table class="table table-bordered">
            <tr>
                <th>日</th>
                <th>月</th>
                <th>火</th>
                <th>水</th>
                <th>木</th>
                <th>金</th>
                <th>土</th>
            </tr>
             <?php
                foreach ($weeks as $week) {
                    echo $week;
                }
?>
        </table>
    </div>
</body>
</html>