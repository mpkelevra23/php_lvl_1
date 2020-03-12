<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script
            src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous">
    </script>
    <title>ajax</title>
</head>
<body>
<!--<form method="post" action="#">-->
<p>
    <label>Имя
        <input class="firstName" type="text" name="firstName">
    </label>
</p>
<p>
    <label>Фамилия
        <input class="secondName" type="text" name="secondName">
    </label>
</p>
<p>
    <label>Телефон
        <input class="telephone" type="tel" name="telephone">
    </label>
</p>
<p>
    <input class="button" type="submit" value="Сохранить">
</p>
<!--</form>-->
<script>
    $(document).ready(function () {
        $('input.button').on('click', function () {
            var firstName = $('input.firstName').val();
            var secondName = $('input.secondName').val();
            var telephone = $('input.telephone').val();
            $.ajax({
                method: "POST",
                url: "Save.php",
                data: {
                    firstName: firstName,
                    secondName: secondName,
                    telephone: telephone,
                }
            }).done(function (msg) {
                alert(msg);
            });
        });
    });
</script>
</body>
</html>
