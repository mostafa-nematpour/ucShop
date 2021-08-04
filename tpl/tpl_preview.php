<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?= BASE_URL ?>assets/css/m_style.css" rel="stylesheet" type="text/css">
    <link rel="icon" href="<?= BASE_URL ?>assets/img/uc.png">
    <title>newStateUc | پیش\200uنمایش </title>
</head>

<body>
    <h1 class="title">newStateUc</h1>
    <div class="main">
        <div class="maindiv">
            <br>
            <h1 class="pert1">پیش نمایش خرید</h1>
            <hr>
            <div class="perdiv1">
                <div class="par">
                    <div class="cool">uc مقدار</div>
                    <div class="cool2"><?= htmlspecialchars(getUcvalue($order->product)); ?></div>
                </div>
                <div class="par">
                    <div class="cool">اکانت ID</div>
                    <div class="cool2"><?= htmlspecialchars($order->userid) ?></div>
                </div>
                <?php if (!empty($order->username)) : ?>
                    <div class="par">
                        <div class="cool">اکانت username</div>
                        <div class="cool2"><?= htmlspecialchars($order->username) ?></div>
                    </div>
                <?php endif ?>
                <hr style="width: 80%;">
                <?php if (!empty($order->name)) : ?>
                    <div class="par">
                        <div class="cool">نام</div>
                        <div class="cool2"><?= htmlspecialchars($order->name) ?></div>
                    </div>
                <?php endif ?>
                <div class="par">
                    <div class="cool">ایمیل</div>
                    <div class="cool2"><?= htmlspecialchars($order->email) ?></div>
                </div>
                <?php if (!empty($order->number)) : ?>
                    <div class="par">
                        <div class="cool">شماره تلفن</div>
                        <div class="cool2"><?= htmlspecialchars($order->number) ?></div>
                    </div>
                <?php endif ?>
                <?php if (!empty($order->description)) : ?>
                    <div class="par">
                        <p style="text-align: right;">:توضیحات</p>
                        <br>
                        <div><?= htmlspecialchars($order->description) ?></div>
                        <br>
                    </div>
                <?php endif ?>
            </div>
            <br>
            <hr>
        </div>
        <button class="enterButton" id="continue" type="Submit" onclick="setAction()"> ( <?= number_format($price / 10)  ?> ) پرداخت نهایی</button>
        <br>
    </div>
    </div>
    <div class="footer">
        <h6 class="h6Class">
            تمامی حقوق مادی و معنوی مطلق به فلان هست
        </h6>
    </div>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
    <script>
        function setAction() {
            $(document).ready(function() {
                pageRedirect("l");
            });

            function pageRedirect(t) {
                window.location = "<?= BASE_URL ?>pardakht.php";
            }
        }
    </script>
</body>

</html>