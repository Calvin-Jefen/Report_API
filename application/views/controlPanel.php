<!DOCTYPE html>
<html>

<head>
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro|Trocchi" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
</head>

<body class="bg-dark">
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="<?php echo base_url('/assets/image/logo.png') ?> " alt="" width="30" height="24" class="d-inline-block align-text-top">
                Parental Control - Anti Porn Control Panel
            </a>
        </div>
    </nav>
    <div class="container-xxl shadow p-2 mb-2 mt-2 rounded " style="height: 100%;padding-top:10px; background-color:darkgray">
        <div class="card bg-dark bg-gradient border-dark shadow p-2 mb-2 rounded" style="margin-bottom: 5px;">
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
        <!-- <div class="card border-dark" style="margin-top: 5px;background-color: rgba(255, 255, 255, .15);  
 backdrop-filter: blur(5px);">
            <div class="row" style="margin-top: 10px; margin-left:28%;">
                <div class="mb-3 row" style="margin-top: 10px;">
                    <label for="inputPassword" class="col-sm-2 col-form-label">
                        <h5>Password :</h5>
                    </label>
                    <div class="col-sm-4">
                        <input type="password" class="form-control" id="inputPassword" style="margin-top: 1%;" value="" disabled>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">
                        <h5>Reporting time :</h5>
                    </label>
                    <div class="col-sm-4">
                        <input type="time" class="form-control" id="inpRepTime" style="margin-top: 5%;" value="<?= $REPORT_TIME ?>" disabled>
                        <div class="d-grid gap-2 d-md-block text-end" style="margin-top: 4%; padding-bottom:2%;">
                            <button class="btn btn-secondary " type="button" id="btnEdit">Edit</button>
                            <button class="btn btn-primary" type="button" id="btnSave" disabled>Save</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" style=" margin-left:28%;">
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-3 col-form-label">
                        <h5>Blaclisted words list :</h5>
                    </label>
                </div>
            </div>
            <div class="col-sm-6" style="width:50%;margin-left:29%;">
                <textarea class="form-control" id="inputBLwords" disabled style="height: 100px;"></textarea>
                <div class="d-grid gap-2 d-md-block text-end" style="margin-top: 2%; padding-bottom:2%;">
                    <button class="btn btn-secondary " type="button" id="btnEdit">Edit</button>
                    <button class="btn btn-primary" type="button" id="btnSave" disabled>Save</button>
                </div>
            </div>
        </div> -->

        <div class="card border-dark" style="margin-top: 5px; padding-bottom: 2%; background-color: rgba(255, 255, 255, .15);  
 backdrop-filter: blur(5px);">
            <form method="POST" action="<?= base_url('pcap/controlpanel') ?>">
                <div class="row" style="margin-top: 10px; margin-left:45%;">
                    <div class="mb-3 row" style="margin-top: 10px;">
                        <label for="inputPassword" class="col-sm-3 col-form-label">
                            <h5>User's Report :</h5>
                        </label>
                    </div>
                </div>
                <div class="row " style="margin-top: 10px; margin-left:28%;">
                    <div class="col-3" style="padding-top: 7px;margin-right:1%;">
                        <h5>Choose report date ! :</h5>
                    </div>
                    <div class="col-3" style="margin-right:2%;">
                        <input type="date" class="form-control" style="margin-bottom: 5px;" name="reportDate" value="<?= ($this->input->post('reportDate') != NULL) ? $this->input->post('reportDate') : '' ?>">
                    </div>
                    <div class="col-4">
                        <div class="d-grid gap-2 col-6 mx-left">
                            <input class="btn btn-dark" type="submit" value="SEARCH"></input>
                        </div>
                    </div>
                </div>
            </form>

            <div class="col-sm-6" style="width:50%;margin-left:29%;">
                <textarea class="form-control" id="inputReport" disabled style="height: 300px;"><?php
                                                                                                if ($REPORT) {
                                                                                                    foreach ($REPORT as $row) {
                                                                                                        echo "- ", $row['report_date'], " -- ", $row['report'], "

";
                                                                                                    }
                                                                                                }
                                                                                                ?>
                </textarea>

                <div class="d-grid gap-2 d-md-block text-center" style="margin-top: 10%; padding-bottom:2%;">
                    <a class="btn btn-danger" type="button" href="<?= base_url('auth/logout') ?>">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $('#btnEdit').on('click', function() {
            $('#inputPassword').attr("disabled", false);
            $('#inpRepTime').attr("disabled", false);
            $('#inputBLwords').attr("disabled", false);
            $('#btnSave').attr('disabled', false);


        });
        $('#btnSave').on('click', function() {
            $('#inputPassword').attr('disabled', true);
            $('#inpRepTime').attr('disabled', true);
            $('#inputBLwords').attr('disabled', true);
            $('#btnSave').attr('disabled', true);


        });
    </script>

</body>


</html>