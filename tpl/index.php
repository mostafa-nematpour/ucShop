<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="<?= BASE_URL ?>assets/css/m_style.css" rel="stylesheet" type="text/css">
    <link rel="icon" href="<?= BASE_URL ?>assets/img/uc.png">
    <title>newStateUc | uc خرید سریع </title>
</head>

<body>
    <h1 class="title">newStateUc</h1>
    <div class="main">
        <br>
        <div id="err" class="t2">
        </div>
        <br>
        <h1 class="t1">:uc مقدار</h1>
        <br>
        <div class="d1">
            <div class="form-floating ">
                <select id="cars" class="form-select optionUc " id="floatingSelect" aria-label="Floating label select example">
                    <?php foreach ($products as $p) : ?>
                        <?php if ($p->state != "hide") : ?>
                            <option value=<?= htmlspecialchars($p->id) ?>><?= $p->name ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>
                <label for="floatingSelect" class="label1">.برای انتخاب کلیک کنید</label>
            </div>
        </div>
        <h1 class="t1">:اطلاعات اکانت</h1>
        <div>
            <form>
                <input name="ID" id="uId" type="number" required="required" placeholder="(ضروری) ID" />
                <input name="username" id="uName" type="text" placeholder="Username" />
                <h1 class="t1">:اطلاعات خریدار</h1>
                <input name="email" id="email" type="email" required="required" placeholder="(ضروری) ایمیل" />
                <input name="email" id="tel" type="tel" placeholder="شماره تلفن" />
                <input name="email" id="name" type="text" placeholder="نام" />
                <textarea class="textarea optionUc" name="email" id="dec" type="text" placeholder="توضیحات"></textarea>
                <button class="enterButton" id="continue" type="button" onclick="setAction()">ادامه خرید</button>
            </form>
            <br>
        </div>
    </div>
    <div class="footer">
        <h6 class="h6Class">
            تمامی حقوق مادی و معنوی مطلق به فلان هست
        </h6>
    </div>
    <script src='<?= BASE_URL ?>assets/js/ajax.js'></script>
    <script>
        function setAction() {
            $(document).ready(function() {
                document.getElementById("err").innerHTML = "";
                var uc = $('select#cars');
                var id = $('input#uId');
                var uName = $('input#uName');
                var name = $('input#name');
                var email = $('input#email');
                var tel = $('input#tel');
                var dec = $('textarea#dec');
                var err = "";
                if (id.val() == "") {
                    err += '<p>.نمی تواند خالی باشد ID</p><br>';
                }
                if (email.val() == "") {
                    err += '<p>.ایمیل نمی تواند خالی باشد</p>'
                }
                if (err == "") {
                    $("#continue").text("...صبر نمایید");
                    document.getElementById('continue').onclick = null;
                    $.ajax({
                        url: "process/ajaxHandler.php",
                        method: "post",
                        data: {
                            action: "checkproduct",
                            uc: uc.val(),
                            id: id.val(),
                            uName: uName.val(),
                            name: name.val(),
                            email: email.val(),
                            tel: tel.val(),
                            dec: dec.val(),
                            err: err
                        },
                        success: function(response) {
                            if (IsValidJSONString(response)) {
                                var obj = JSON.parse(response);
                                if (obj["response"] == true) {
                                    // location.reload();
                                    $("#continue").text("...درحال انتقال");
                                    setTimeout(pageRedirect(obj["id"]), 5000);
                                } else {
                                    document.getElementById("err").innerHTML = "مشکلی پیش آمده";
                                    $("html, body").animate({
                                        scrollTop: 0
                                    }, "slow");
                                    $("#continue").text("ادامه خرید");
                                    console.log(">>>" + response);
                                }
                            } else {
                                document.getElementById("err").innerHTML = "مشکلی پیش آمده";
                                $("html, body").animate({
                                    scrollTop: 0
                                }, "slow");
                                $("#continue").text("ادامه خرید");
                                console.log(response);
                            }
                        }
                    }).fail(function(jqXHR, textStatus, errorThrown) {
                        document.getElementById("err").innerHTML = "مشکلی در ارتباط پیش آمده";
                        $("html, body").animate({
                            scrollTop: 0
                        }, "slow");
                        $("#continue").text("ادامه خرید");
                    });
                    document.getElementById('continue').onclick = setAction;
                } else {
                    document.getElementById("err").innerHTML = err;
                    $("html, body").animate({
                        scrollTop: 0
                    }, "slow");
                }

                function pageRedirect(t) {
                    window.location = "<?= BASE_URL ?>preview.php?id=" + t;
                }

                function IsValidJSONString(str) {
                    try {
                        JSON.parse(str);
                    } catch (e) {
                        return false;
                    }
                    return true;
                }
            });
        }
    </script>
</body>

</html>