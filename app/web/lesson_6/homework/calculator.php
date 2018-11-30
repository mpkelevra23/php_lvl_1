<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="script/jquery-3.3.1.min.js"></script>
    <script>
        function send(math) {
            var num_1 = $("#num_1").val();
            var num_2 = $("#num_2").val();
            var str = "num_1=" + num_1 + "&num_2=" + num_2 + "&math=" + math;
            $.ajax({
                type: "POST",
                url: "models/count.php",
                data: str,
                success: function (msg) {
                    $("#answer").html('Ответ = ' + msg);
                }
            })
        }
    </script>
</head>
<body>
<div>
    Введите первое число <input type="text" name="num_1" id="num_1"><br>
    Введите второе число <input type="text" name="num_2" id="num_2"><br>
    Выберите тип операции <br>
    <input type="button" name="math" value="*" id="multiplication" onclick="send('multiplication')">
    <input type="button" name="math" value="÷" id="division" onclick="send('division')">
    <input type="button" name="math" value="+" id="addition" onclick="send('addition')">
    <input type="button" name="math" value="-" id="subtraction" onclick="send('subtraction')"><br>
</div>
<div><h1 id="answer"></h1></div>
</body>
</html>