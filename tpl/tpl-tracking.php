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
        <div id="err" class="t2">
        </div>
        <br>


        <div>
            <form>
                <?php if (isset($trackList)) : ?>
                
                <?php foreach ($trackList as $t) : ?>

                    <p style="text-align: center;"><?= $t ?></p>
                    <br>
                <?php endforeach; ?>
                <?php endif; ?>
                <input name="id" id="uId" type="number" required="required" placeholder="شماره پیگیری" value="<?= isset($id) ? $id : "" ?>" />
                <br>
                <button class="enterButton" id="continue" type="submit"> جستجو </button>

            </form>
            <br>
        </div>


    </div>

    <div class="footer">
        <h6 class="h6Class">
            تمامی حقوق مادی و معنوی مطلق به فلان هست
        </h6>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</body>

</html>