<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?= BASE_URL ?>assets/img/uc.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>admin | uc خرید سریع </title>
</head>

<body>
    <div style="width: 95%; margin: auto;">
        <br>
        <div class="alert alert-info" role="alert" style="width: 30%; margin: auto; text-align: center;">
            لیست کار
        </div>
        <div class="table-responsive">
            <table class="table table-striped table align-middle table-borderless">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>stat</th>
                        <th>uc</th>
                        <th>userid</th>
                        <th>operation</th>
                        <th>username</th>
                        <th>email</th>
                        <th>number</th>
                        <th>data</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($list as $l) : ?>
                        <tr>
                            <td><?= htmlspecialchars($l->id) ?></td>
                            <td><?= htmlspecialchars( $l->state) ?></td>
                            <td><?= htmlspecialchars( $l->uc) ?></td>
                            <td><?= htmlspecialchars( $l->userid) ?></td>
                            <td><a href="<?= site_url("admin.php?id={$l->id}") ?>">operat</a></td>
                            <td><?= htmlspecialchars( $l->username) ?></td>
                            <td><?= htmlspecialchars( $l->email) ?></td>
                            <td><?= htmlspecialchars( $l->number )?></td>
                            <td><?php
                                $data = json_decode($l->data, true)["data"];
                                $data["card_hash"] = 0;
                                echo ("code:" . $data["code"]);
                                echo (" ref_id:" . $data["ref_id"]); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <hr />
        <br>
        <div class="alert alert-primary" role="alert" style="width: 20%; margin: auto; text-align: center;">
            تاریخچه
        </div>
        <br>
        <div class="table-responsive">
            <table class="table table-striped table align-middle table-borderless">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>stat</th>
                        <th>uc</th>
                        <th>userid</th>
                        <th>operation</th>
                        <th>username</th>
                        <th>email</th>
                        <th>number</th>
                        <th>data</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($lastList as $l) : ?>
                        <tr>
                            <td><?= htmlspecialchars( $l->id) ?></td>
                            <td><?= htmlspecialchars( $l->state )?></td>
                            <td><?= htmlspecialchars( $l->uc) ?></td>
                            <td><?= htmlspecialchars( $l->userid )?></td>
                            <td><a href="<?= site_url("admin.php?id={$l->id}") ?>">operat</a></td>
                            <td><?= htmlspecialchars( $l->username) ?></td>
                            <td><?= htmlspecialchars( $l->email )?></td>
                            <td><?= htmlspecialchars( $l->number) ?></td>
                            <td><?php
                                $data = json_decode($l->data, true)["data"];
                                $data["card_hash"] = 0;
                                echo ("code:" . $data["code"]);
                                echo (" ref_id:" . $data["ref_id"]); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>



    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <?php if (isset($id)) : ?>
        <div class="modal fade" id="exampleModalFullscreenMd" tabindex="-1" aria-labelledby="exampleModalFullscreenMdLabel" aria-hidden="true" data-bs-backdrop="static">
            <div class="modal-dialog modal-xl modal-fullscreen-md-down modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title h4" id="exampleModalFullscreenMdLabel"><?= htmlspecialchars( 'id: ' . $paid->id )?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-break">
                        <?php $data2 = json_decode($paid->data, true); ?>
                        <p><?= htmlspecialchars( 'UC ordered: ' . $paid->uc) ?></p>
                        <p><?= htmlspecialchars( 'Player Id: ' . $paid->userid )?></p>
                        <p><?= htmlspecialchars( 'Player UserName: ' . $paid->username) ?></p>
                        <p><?= htmlspecialchars( 'Player email: ' . $paid->email) ?></p>
                        <p><?= htmlspecialchars( 'Player email: ' . $paid->number )?></p>
                        <p><?= htmlspecialchars( 'Player Name: ' . $paid->name) ?></p>
                        <hr>
                        <p><?= htmlspecialchars( 'Message: ' . json_decode($paid->data, true)["data"]["message"]) ?></p>
                        <p><?= htmlspecialchars( 'Card Pan: ' . json_decode($paid->data, true)["data"]["card_pan"] )?></p>
                        <p><?= htmlspecialchars( 'ref id: ' . json_decode($paid->data, true)["data"]["ref_id"] )?></p>
                        <p><?= htmlspecialchars( 'Created At: ' . $paid->created_at )?></p>
                        <hr>
                        <p>Description: </p>
                        <p><?= htmlspecialchars( $paid->description )?></p>
                    </div>
                    <div class="modal-footer" style="display: block;">
                        <button type="button" class="btn btn-danger" onclick="alertTODelete()">حذف</button>
                        <!-- Modal -->
                        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body" style="text-align: right;">
                                        حذف شود؟
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">بستن</button>
                                        <button type="button" class="btn btn-primary" onclick="pageRedirectTodelete()">بله</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php if ($paid->state == "unpaid") : ?>
                            <button type="button" class="btn btn-primary" onclick="alertTOPaid()"> پرداخت </button>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body" style="text-align: right;">
                                            پرداخت شود؟
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">بستن</button>
                                            <button type="button" class="btn btn-primary" onclick="pageRedirectToPaid()">بله</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if ($paid->state == "paid") : ?>
                            <button type="button" class="btn btn-secondary" onclick="alertTOPaid()"> بازگرداندن </button>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body" style="text-align: right;">
                                            بازگردانده شود؟
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">بستن</button>
                                            <button type="button" class="btn btn-primary" onclick="pageRedirectToUnPaid()">بله</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="float: right;">Close</button>
                    </div>
                </div>
            </div>
        </div>



        <script>
            document.addEventListener('DOMContentLoaded', function(event) {
                var myModal = new bootstrap.Modal(document.getElementById('exampleModalFullscreenMd'), {
                    keyboard: false
                });
                myModal.show();
                var myModalEl = document.getElementById('exampleModalFullscreenMd')
                myModalEl.addEventListener('hidden.bs.modal', function(event) {
                    pageRedirectToAdmin();
                    a
                })

            })
        </script>
        <script>
            function alertTOPaid() {
                var myModal = new bootstrap.Modal(document.getElementById('exampleModal'), {
                    keyboard: false
                });
                myModal.show();
            }

            function pageRedirectToAdmin() {
                window.location = "<?= BASE_URL ?>admin.php";
            }

            function pageRedirectToPaid() {
                window.location = "<?= BASE_URL ?>admin.php?id=<?= $id ?>&state=paid";
            }

            function pageRedirectToUnPaid() {
                window.location = "<?=  BASE_URL ?>admin.php?id=<?=  $id ?>&state=unpaid";
            }

            function pageRedirectTodelete() {
                window.location = "<?= BASE_URL ?>admin.php?id=<?=  $id ?>&state=delete";
            }

            function alertTODelete() {
                var myModal = new bootstrap.Modal(document.getElementById('deleteModal'), {
                    keyboard: false
                });
                myModal.show();
            }
        </script>
    <?php endif; ?>

</body>

</html>