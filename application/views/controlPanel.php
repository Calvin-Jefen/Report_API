<!DOCTYPE html>
<html>

<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro|Trocchi" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
</head>

<body class="bg-dark">
    <nav class="navbar navbar-light bg-light fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="<?php echo base_url('/assets/image/logo.png') ?> " alt="" width="30" height="24" class="d-inline-block align-text-top">
                Parental Control - Anti Porn Control Panel
            </a>
            <a class="btn btn-danger" type="button" href="<?= base_url('auth/logout') ?>">Logout</a>
        </div>

    </nav>
    <div class="container-xxl shadow p-2 mb-2 mt-1 rounded " style="height: 100%;padding-top:30px; background-color:darkgray">
        <div class="card bg-dark bg-gradient border-dark shadow p-2 mb-2 rounded" style="margin-bottom: 5px;margin-top:4%;">
            <div class="row">
                <div class="col text-center">
                    <h2 style="color:white ;">Account Info & Report</h2>
                </div>
            </div>
        </div>
        <div class="card border-dark" style="background-color: rgba(255, 255, 255, .15);  
    backdrop-filter: blur(5px);">
            <div class="row" style="margin-top: 10px; margin-left:28%;">
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">
                        <h5>Username :</h5>
                    </label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $USER_NAME ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">
                        <h5>User ID :</h5>
                    </label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $USER_ID ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">
                        <h5>User Email :</h5>
                    </label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext" id="DynamicEmail" value="<?= $USER_EMAIL ?>">
                    </div>
                </div>
            </div>
        </div>

        <div class="card border-dark" style="margin-top: 5px;background-color: rgba(255, 255, 255, .15);  
    backdrop-filter: blur(5px);">
            <form method="POST" id="form-Data">
                <div class="row" style=" margin-left:28%;">
                    <div class="mb-3 row">
                        <label for="inputFwords" class="col-sm-3 col-form-label">
                            <h5>Forbidden words list :</h5>
                        </label>
                    </div>
                </div>
                <div class="col-sm-6" style="margin-left:29%;">
                    <div class="table-responsive">
                        <table class="table table-light table-bordered">
                            <thead>
                                <tr>
                                    <th class="col-1" style="text-align: center">No.</th>
                                    <th style="text-align: center">Forbidden words</th>
                                    <th class="col-4" style="text-align: center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($FWORDS) {
                                    $i = 1;
                                    foreach ($FWORDS as $row) { ?>
                                        <tr>
                                            <td style="text-align: center"><?= $i ?>.</td>
                                            <td><?= $row['fwords'] ?></td>
                                            <td style="text-align: center"><a href="<?= base_url('pcap/Controlpanel/deleteFwords/' . $row['no']); ?>" class="btn btn-danger" id="delete">Delete</a></td>
                                        </tr>
                                <?php $i++;
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <input type="hidden" name="inputFwords" id="inputFwords" style="margin-top: 2%;" value="">
                    <div class="text-end" style="margin-top: 1%; padding-bottom:2%;">
                        <button class="btn btn-primary " type="button" id="btnInsert">Insert new Forbidden word</button>
                    </div>
                </div>
            </form>
        </div>

        <div class=" card border-dark" style="margin-top: 5px; padding-bottom: 2%; background-color: rgba(255, 255, 255, .15);  
    backdrop-filter: blur(5px);">
            <form method="POST" action="<?= base_url('pcap/controlpanel') ?>">
                <div class="row" style="margin-top: 10px; margin-left:48%;">
                    <div class="mb-3 row" style="margin-top: 10px;">
                        <label for="inputPassword" class="col-sm-3 col-form-label">
                            <h5>User's Report</h5>
                        </label>
                    </div>
                </div>
                <div class="row " style="margin-top: 10px; margin-left:28%;margin-bottom:10px;">
                    <div class="col-2" style="padding-top: 7px;margin-right:-70px;">
                        <h5>From :</h5>
                    </div>
                    <div class="col-3" style="margin-right:-50px;">
                        <input type="date" class="form-control" style="margin-bottom: 5px;width:80%;" name="reportDateFR" value="<?= ($this->input->post('reportDateFR') != NULL) ? $this->input->post('reportDateFR') : '' ?>">
                    </div>
                    <div class="col-2" style="padding-top: 7px;margin-right:-100px;">
                        <h5>To :</h5>
                    </div>
                    <div class="col-3">
                        <input type="date" class="form-control" style="margin-bottom: 5px; width:80%;" name="reportDateTO" value="<?= ($this->input->post('reportDateTO') != NULL) ? $this->input->post('reportDateTO') : '' ?>">
                    </div>
                    <div class="col-3" style="margin-left:-30px;">
                        <div class="d-grid gap-2 col-6 mx-end">
                            <input class="btn btn-dark" type="submit" value="SEARCH"></input>
                        </div>
                    </div>
                </div>

            </form>

            <div class="col-sm-6" style="width:50%;margin-left:29%;">
                <textarea class="form-control" id="inputReport" disabled style="height: 300px;"><?php
                                                                                                if ($REPORT) {
                                                                                                    $i = 1;
                                                                                                    foreach ($REPORT as $row) {
                                                                                                        echo $i, ". ", $row['report_date'], " -- ", $row['report'], "\r\n", "\r\n";
                                                                                                        $i++;
                                                                                                    }
                                                                                                } else
                                                                                                    echo "\r\n \n\n\n\n\n                                  NO REPORT TODAY, SELECT FROM DATE FILTER"

                                                                                                ?>
                </textarea>

            </div>
        </div>
    </div>


    <script type="text/javascript">
        $('#btnInsert').on('click', function() {
            swal("Write new forbidden words:", {
                    content: "input",
                    closeOnClickOutside: true
                })
                .then((value) => {
                    if (`${value}`) {
                        swal({
                            title: "Add forbidden words",
                            text: "Are you sure to add this word (" + `${value}` + ") ?",
                            buttons: [true, "Insert"],
                            icon: "warning",
                        }).then((success) => {
                            if (success) {
                                $.ajax({
                                    url: '<?= base_url('pcap/Controlpanel/insertFwords'); ?>',
                                    data: {
                                        'inputFwords': `${value}`
                                    },
                                    type: 'POST',
                                    success: function(e) {
                                        if (e == "success") {
                                            swal({
                                                title: "Success",
                                                text: "Forbidden word inserted",
                                                icon: "success"
                                            }).then(function() {
                                                window.location = '<?= base_url('pcap/Controlpanel'); ?>';
                                            });
                                        } else if (e == "exist") {
                                            swal({
                                                title: "Failed",
                                                text: "Forbidden words already exist !",
                                                icon: "error"
                                            });
                                        } else {
                                            swal({
                                                title: "Failed",
                                                text: "Forbidden word insert failed !",
                                                icon: "error"
                                            });
                                        }
                                    }
                                });
                                return false;
                            } else {
                                swal({
                                    title: "Adding Canceled",
                                    icon: "warning"
                                });
                            }
                        });
                    } else {
                        swal.stopLoading();
                        swal.close();
                    }
                });
        })
    </script>

</body>


</html>