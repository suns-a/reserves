<!DOCTYPE html>
<html lang="ja">
<head>
@vite(['resources/css/app.css', 'resources/js/app.js']) 
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>会議室予約</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div style="text-align: center; font-size:50px">会議室予約</div>
                <div class="col-md-11 offset-1 mt-5 mb-5">

                    <div id='calendar'>

                    </div>

                </div>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            var reserve = @json($events);
            
            $('#calendar').fullcalendar({
                header: {
                    'center': 'title'
                },
                events: reserve
            })
        });
    </script>
</body>
</html>