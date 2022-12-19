<title>会議室予約</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<html>
    <head>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @foreach($reserves as $recode)
                {{$recode->user_id}}
                {{$recode->division_id}}
                {{$recode->usage_id}}
                {{$recode->date}}
                {{$recode->starts_at}}
                {{$recode->ends_at}}
        @endforeach
    </head>
<body>
    <script>
        
    </script>
    <div id='calendar'></div>
    
</body>
</html>