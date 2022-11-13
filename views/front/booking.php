<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
    $(function() {
        $("#datepicker").datepicker();
    });
    </script>
</head>

<body>
    <form action="" method="POST">
        <p>
            <input type="checkbox" name="service" id="">Cat toc
            <input type="checkbox" name="service" id="">Goi dau
            <input type="checkbox" name="service" id="">Matxa
        </p>
        <p>
            <input type="radio" name="combo" id=""> Cat toc + Goi dau
            <input type="radio" name="combo" id=""> Cat toc + Matxa
        </p>
        <p>
        <div class="input-box">
            <div class="formkit-outer" data-family="text" data-type="datetime-local" data-complete="true">
                <div class="formkit-wrapper">
                    <div class="formkit-inner">
                        <input class="formkit-input" type="datetime-local" name="datetime-local_1" id="input_0"
                            aria-describedby="help-input_0">
                    </div>
                </div>
            </div>
        </div>
        </p>
        <p>
        <p>
            stylelist
        </p>
        <p>
            <input type="radio" name="stylelist" id=""> duong beo
            <input type="radio" name="stylelist" id=""> tuan
        </p>
        </p>
        <p>
            <input type="submit" value="Send">
        </p>
    </form>
</body>

</html>