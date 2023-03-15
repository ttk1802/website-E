<section id="form">
    <!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1">
                <h3><?php
                         $session=session();
                         if(!empty($session->get('email'))){
                            echo "Xin chào " . $session->get('email');
                         }
                         ?></h3>

                <div class="login-form">
                    <!--login form-->
                    <h2>Login to your account</h2>
                    <form method="post" action="<?=base_url()?>/act_login_user"
                        onsubmit="alert('Bạn đăng nhập thành công')">
                        <input type="email" placeholder="Email Address" name="email" />
                        <input type="password" placeholder="Password" name="password" />
                        <span>
                            <input type="checkbox" class="checkbox">
                            Keep me signed in
                        </span>
                        <button type="submit" class="btn btn-default">Login</button>
                    </form>
                </div>
                <!--/login form-->
            </div>
            <div class="col-sm-1">
                <h2 class="or">OR</h2>
            </div>
            <div class="col-sm-4">
                <div class="signup-form">
                    <!--sign up form-->
                    <h2>New User Signup!</h2>
                    <form id="myForm"  action="<?php echo base_url('/sign_up_user') ?> "
                        method="post">
                        <input name="fname" type="text" placeholder="Fisrt Name" />
                        <input name="lname" type="text" placeholder="Last Name" />
                        <input name="email" type="email" placeholder="Email Address" />
                        <input name="phone" type="text" placeholder="Phone" />
                        <input id="pw" name="pw" type="password" placeholder="Password" />
                        <input id="pwcf" name="pwcf" type="password" placeholder="Confirm Password" onkeyup="validate_password()" />
						<span id="wrong_pass_alert"></span>						
                    </form>
					<button style="margin-left: -0px ; padding : 6px 20px 6px 20px " id="create"  onclick="wrong_pass_alert()"  class="btn btn-default cart">Signup</button>
                    <script>
                    function validate_password() {
                        var pass = document.getElementById('pw').value;
                        var confirm_pass = document.getElementById('pwcf').value;
                        if (pass != confirm_pass) {
                            document.getElementById('wrong_pass_alert').style.color = 'red';
                            document.getElementById('wrong_pass_alert').innerHTML = '☒ Use same password';
                            document.getElementById('create').disabled = true;
                            document.getElementById('create').style.opacity = (0.4);
                        } else {
                            document.getElementById('wrong_pass_alert').style.color = 'green';
                            document.getElementById('wrong_pass_alert').innerHTML =
                                '🗹 Password Matched';
                            document.getElementById('create').disabled = false;
                            document.getElementById('create').style.opacity = (1);
                        }
                    }
                    function wrong_pass_alert() {
						
                        if (document.getElementById('pw').value != "" &&
                            document.getElementById('pwcf').value != "") {
                            alert("Bạn đăng ký thành công");
							document.getElementById("myForm").submit();
                        } else {
                            alert("Hãy nhập dữ liệu");
							document.getElementById("myForm").reset();
                        }
                    }
                    </script>
                </div>
                <!--/sign up form-->
            </div>
        </div>
    </div>
</section>
<!--/form-->