<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="<?= BASE_URL ?>assets/css/m_style.css" rel="stylesheet" type="text/css">

    <link rel="icon" href="<?= BASE_URL ?>assets/img/uc.png">
    <title> newStateUc | پیگیری سفارشات </title>
</head>

<body>
    <h1 class="title">newStateUc</h1>

    <div class="main">
        <br>
        <div>
            <form>
                <img src="<?= BASE_URL ?>assets/img/checked.svg" class="rounded mx-auto d-block" alt="success" style="width: 25%;">
                <br>
                <?php if ($result["result"]) : ?>
                    <p style="text-align: center; padding: 15px; line-height: 20px;">با تشکر از حسن انتخاب شما<br><br> .خرید شما با موفقیت ثبت و به زودی انجام می پذیرد</p>
                    <br>
                    <p style="text-align: center; padding: 15px;">شماره تراكنش <?= $result["zResult"]["data"]["ref_id"] ?></p>
                    <br>
                    <p style="text-align: center; padding: 15px;">شماره پیگیری <?= $result["plId"] ?></p>
                <?php endif; ?>
                <br>
                <button type="button" class="btn-lg enterButton" style="padding: 15px;" onclick="pageRedirectToTraking()">پیگیری سفارش</button>
            </form>
            <br>
        </div>
    </div>
    <div class="footer">
        <h6 class="h6Class">
            تمامی حقوق مادی و معنوی مطلق به فلان هست
        </h6>
    </div>
    <script>
        function pageRedirectToTraking() {
            window.open("<?= BASE_URL ?>tracking.php?id=<?= $result["plId"] ?>", "blank ");
        }
    </script>
</body>

</html>