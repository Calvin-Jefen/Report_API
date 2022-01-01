<div class="container-xxl shadow p-2 mb-2 rounded " style="background-color:darkgray; margin-top:15%; width:50%">
    <div class="card bg-dark bg-gradient border-dark shadow p-2 mb-2 rounded" style="margin-bottom: 5px;">
        <div class="row">
            <div class="col text-center">
                <h2 style="color:white ;">PCAP CONTROL PANEL LOGIN</h2>
            </div>
        </div>
    </div>
    <form id="login" class="user" method="POST" action="<?= base_url('auth') ?>">
        <div class="card border-dark" style="margin-top: 5px;background-color: rgba(255, 255, 255, .15);  
            backdrop-filter: blur(5px);">
            <?= $this->session->flashdata('message'); ?>
            <div class="row" style="margin-top: 10px; margin-left:28%;">
                <div class="mb-3 row" style="margin-top: 10px;">
                    <label for="inputPassword" class="col-sm-3 col-form-label">
                        <h5>User Email :</h5>
                    </label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="inputEmail" name="email" style="margin-top: 1%;" value="<?= set_value('email') ?> ">
                        <small class="text-danger"><?= form_error('email') ?></small>
                    </div>
                </div>

                <div class="mb-3 row" style="margin-top: 10px;">
                    <label for="inputPassword" class="col-sm-3 col-form-label">
                        <h5>Password :</h5>
                    </label>
                    <div class="col-sm-5">
                        <input type="password" class="form-control" id="inputPassword" name="password" style="margin-top: 1%;" value="">
                        <small class="text-danger"><?= form_error('password') ?></small>
                        <div class="d-grid gap-2 d-md-block text-start" style="margin-top: 10%; padding-bottom:2%;">
                            <input class="btn btn-primary" type="submit" id="btnlogin" value="LOGIN"></input>
                        </div>
                    </div>
                </div>
    </form>
    <div class="mb-3 row" style="margin-top: 10px;">
        <div class="col-sm-4 text-center" style="margin-left: 100px;">
            <h6>Didn't have an account ?</h6>
            <a href="<?php echo base_url() ?>auth/registration">Register here !</a>
        </div>


    </div>
</div>

<script type="text/javascript">
    // $('#login').on('submit', function(e) {
    //     e.preventDefault();
    //     if (checkemail(true) && checkpass(true)) {
    //         ajaxsubmit();
    //     }

    // });

    // function checkemail() {
    //     var email = document.getElementById('inputEmail').value;
    //     if (email == "" || email == null) {
    //         checkpass()
    //         document.getElementById("email_rmd").style.display = "block";
    //         return false;
    //     } else {
    //         checkpass()
    //         document.getElementById("email_rmd").style.display = "none";
    //         return true;
    //     }
    // }

    // function checkpass() {
    //     var password = document.getElementById('inputPassword').value;
    //     if (password == "" || password == null) {
    //         document.getElementById("pass_rmd").style.display = "block";
    //         document.getElementById("pass_tot").style.display = "none";
    //         return false;
    //     } else {
    //         document.getElementById("pass_rmd").style.display = "none";
    //         if (password.length < 6) {
    //             document.getElementById("pass_tot").style.display = "block";
    //             return false;
    //         } else {
    //             document.getElementById("pass_tot").style.display = "none";
    //             return true;
    //         }
    //     }

    // }


    // function ajaxsubmit() {
    //     $email = $('#inputEmail').val();
    //     $password = $('#inputPassword').val();
    //     $.ajax({
    //         url: '<?= base_url('api/user'); ?>',
    //         type: 'get',
    //         headers: {
    //             'keyapipenjualan': 'p3nju4l4n'
    //         },
    //         data: {
    //             'user_email': $email,
    //             'password': $password
    //         },
    //         dataType: 'json',
    //         success: function(result) {
    //             console.log(result);
    //             if (result.status == true) {
    //                 window.location = '<?= base_url('pcap/controlpanel'); ?>'
    //             } else {
    //                 console.log(result.data.response)
    //             }
    //         },
    //         error: function(xhr, ajaxOptions, thrownError) {
    //             console.log(thrownError)
    //         }
    //     });
    // }
</script>


</body>


</html>