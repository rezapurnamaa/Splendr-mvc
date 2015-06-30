<div class="container">    
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                <div class="panel-heading">
                    <div class="panel-title">Einloggen</div>
                    <!-- <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Forgot password?</a></div> -->
                </div>     

                <div style="padding-top:30px" class="panel-body" >

                    <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                    
                    <form id="loginform" class="form-horizontal" role="form" action="<?= DIR ?>users/getLogin" method="POST">
                                
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input id="login-username" type="text" class="form-control" name="username" value="" placeholder="Benutzername oder Email" required="required">
                        </div>
                            
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input id="login-password" type="password" class="form-control" name="password" placeholder="Passwort" required="required">
                        </div>
                        
                        <div class="input-group">
                            <div class="checkbox">
                                <label>
                                  <input id="login-remember" type="checkbox" name="remember" value="1"> Remember me
                                </label>
                            </div>
                        </div>

                        <div style="margin-top:10px" class="form-group">
                            <!-- Button -->
                            <div class="col-sm-12 controls">
                              <a id="btn-login" type="submit" class="btn btn-success">Einloggen</a>
                              <!-- <a id="btn-fblogin" href="#" class="btn btn-primary">Login mit Facebook</a> -->
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 control">
                                <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                    Ich habe kein Konto! 
                                    <a href="#" onClick="$('#loginbox').hide(); $('#signupbox').show()">
                                    Hier anmelden
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>                     
            </div>  
        </div>

        <div id="signupbox" style="display:none; margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="panel-title">Anmelden</div>
                    <div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="#" onclick="$('#signupbox').hide(); $('#loginbox').show()">Einloggen</a></div>
                </div>

                <div class="panel-body" >
                    <form id="signupform" class="form-horizontal" data-toggle="Validator" role="form">
                        
                        <div id="signupalert" style="display:none" class="alert alert-danger">
                            <p>Error:</p>
                            <span></span>
                        </div>
                           
                        <div class="form-group">
                            <label class="control-label col-md-3" for="email">Emailadresse</label>
                            <div class="col-md-9">
                              <input type="email" class="form-control" id="email" placeholder="Enter email" data-error="That email address is invalid" required>
                            </div>
                        </div>
                            
                        <div class="form-group">
                            <label for="firstname" class="col-md-3 control-label">Vorame</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="firstname" placeholder="First Name">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="lastname" class="col-md-3 control-label">Nachname</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="lastname" placeholder="Last Name">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-md-3 control-label">Kennwort</label>
                            <div class="col-md-9">
                                <input type="password" class="form-control" name="passwd" placeholder="Password">
                            </div>
                        </div>
                                                       
                        <div class="form-group">
                            <!-- Button -->
                            <div class="col-md-offset-3 col-md-9">
                                <button id="btn-signup" type="submit" class="btn btn-info"><i class="icon-hand-right"></i> &nbsp Anmelden</button>
                                <!-- <span style="margin-left:8px; margin-right:8px">or</span>  -->
                                <!-- <button id="btn-fbsignup" type="button" class="btn btn-primary"><i class="icon-facebook"></i>   Sign Up with Facebook</button> -->
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>

    </div>
    <hr>