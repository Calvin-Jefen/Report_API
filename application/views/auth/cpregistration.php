<div class="container-xxl shadow p-2 mb-2 rounded " style="background-color:darkgray; margin-top:15%; width:50%">
    <div class="card bg-dark bg-gradient border-dark shadow p-2 mb-2 rounded" style="margin-bottom: 5px;">
        <div class="row">
            <div class="col text-center">
                <h2 style="color:white ;">PCAP REGISTRATION</h2>
            </div>
        </div>
    </div>
    <form class="user" method="post" action="<?= base_url('auth/registration') ?>">
        <div class="card border-dark" style="margin-top: 5px;background-color: rgba(255, 255, 255, .15);  
            backdrop-filter: blur(5px);">
            <div class="row" style="margin-top: 10px; margin-left:18%;">
                <div class="mb-3 row" style="margin-top: 10px;">
                    <label for="username" class="col-sm-3 col-form-label">
                        <h5>Username :</h5>
                    </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="username" name="username" style="margin-top: 1%;" value=" <?= set_value('username') ?> ">
                        <small class="text-danger"><?= form_error('username') ?></small>
                    </div>
                </div>
                <div class="mb-3 row" style="margin-top: 10px;">
                    <label for="inputemail" class="col-sm-3 col-form-label">
                        <h5>Your active email :</h5>
                    </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="inputEmail" name="email" style="margin-top: 1%;" value=" <?= set_value('email') ?> ">
                        <small class="text-danger"><?= form_error('email') ?></small>
                    </div>
                </div>

                <!-- <div class="mb-3 row" style="margin-top: 10px;">
                    <label for="inputTime" class="col-sm-3 col-form-label">
                        <h5>Reporting Time:</h5>
                    </label>
                    <div class="col-sm-6">
                        <input type="time" class="form-control" id="inputTime" name="time" style="margin-top: 1%;">
                        <p id="timeNotes" style="display: none;">- This is the time that you desired for the report to be sent to your email.<br> - You can set it later or leave it blank if you do not want to receive email report</p>

                    </div>
                </div> -->

                <div class="mb-3 row" style="margin-top: 10px;">
                    <label for="inputPassword" class="col-sm-3 col-form-label">
                        <h5>Password :</h5>
                    </label>
                    <div class="col-sm-3">
                        <input type="password" class="form-control" id="inputPassword" name="password" style="margin-top: 1%;">
                        <small class="text-danger"><?= form_error('password') ?></small>
                    </div>
                    <div class="col-sm-3">
                        <input type="password" class="form-control" id="inputPassword2" name="password2" style="margin-top: 1%;">
                    </div>
                    <div class="row text-center" style="margin-left: 17%; margin-top:2%;">
                        <div class="col col-lg-6">
                            <input class="btn btn-primary" type="submit" id="btnregister" value="REGISTER"></input>
                        </div>
                    </div>
                </div>
    </form>
    <div class="mb-3 row" style="margin-top: 10px;">
        <div class="col-sm-4 text-center" style="margin-left: 25%;">
            <h6>Already have an account ?</h6>
            <a href="<?php echo base_url() ?>">Login here !</a>
        </div>


    </div>
</div>

<script type="text/javascript">
    // $('#inputTime').focusin(function(e) {
    //     document.getElementById("timeNotes").style.display = "block";
    // });
    // $('#inputTime').focusout(function(e) {
    //     document.getElementById("timeNotes").style.display = "none";
    // });

    // $('#register').on('submit', function(e) {
    //     e.preventDefault();
    //     if (checkuname(true) && checkemail(true) && checkpass(true)) {
    //         // ajaxsubmit();
    //     }

    // });

    // function checkuname() {
    //     var uname = document.getElementById('inputUsername').value;
    //     if (uname == "" || uname == null) {
    //         checkemail()
    //         checkpass()
    //         document.getElementById("username_rmd").style.display = "block";
    //         return false;
    //     } else {
    //         checkemail()
    //         checkpass()
    //         document.getElementById("username_rmd").style.display = "none";
    //         return true;
    //     }
    // }

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
    //         type: 'post',
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