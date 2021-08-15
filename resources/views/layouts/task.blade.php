<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{asset('style/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('style/style.css')}}" />
    <title>Task</title>
    <script>
    function fire(){
        var name = document.getElementById('name').value;
        $.ajax({
                type: 'post',
                url: "{{route('store')}}",
                data: {
                    'name': name
                },
                cache: false,
                success: function (data) {
                    var id = parseInt(document.getElementById('count').value);
                    id++;
                    document.getElementById('count').value = id;
                    $('#tbody').append('<tr> <td>'+ id +'</td> <td>'+ name + '</td> </tr>')
                }, error: function (reject) {
                }
            });
        return false;
    }
</script>
</head>
<body>
@include('includes.formInput')
@include('includes.table')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</body>
</html>
