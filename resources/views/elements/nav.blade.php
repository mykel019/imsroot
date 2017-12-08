<!-- top navigation -->
<style type="text/css">
    .border-red{
        border-color:red;
    }
</style>
<div class="top_nav">

    <div class="nav_menu">
        <nav class="" role="navigation">
            <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>
            <?php
                $user_details  = $controller->user_details();

                if(Auth::User()->position_id == 0){
                    $user_details->name = "Admin";

                }
            ?>


            <ul class="nav navbar-nav navbar-right">
                <li class="">
                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <img src="{{ asset('img/default.gif') }}" alt="">{{ Auth::User()->email }}
                        <span class=" fa fa-angle-down"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                        
                        <li style="cursor:pointer" data-toggle="modal" data-target="#profileModal"><a href="javascript:;">Profile</a></li>

                </li>
                        <li><a href="{{ URL::to('/auth/logout') }}"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>
    </div>

</div>

  <div class="modal fade profile-modal" tabindex="-1" role="dialog" id="profileModal" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
        <div class="modal-header">
            <span class="modal-title"><label>User Profile</label>
            </span>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12"> 
            </div>

            <div class="col-md-12">
              <div class="inner-panel col-md-12">
                  <div class="ip-title ">User Details</div>
                  <form method="POST" action="{{ url('/userdetails/update') }}" onsubmit="" id="form1">
                      <div class="ip-body  col-md-6" >
                          <div class="" style="height:330px">
                            <label>First Name</label><input type="text" class="form-control" id="fname" name = "fname" value="{{Auth::User()->fname}}"><br>
                            <center><span id="fname_error" style="display:none; color:red;">Required</span></center>
                            <label>Middle Name</label><input type="text" class="form-control" id="mname" name = "mname" value="{{Auth::User()->mname}}"><br> 
                            <center><span id="mname_error" style="display:none; color:red;">Required</span></center>
                            <label>Last Name</label><input type="text" class="form-control" id="lname" name = "lname" value="{{Auth::User()->lname}}"><br>
                            <center><span id="lname_error" style="display:none; color:red;">Required</span></center>
                            <label>Password</label><div class="password-wrapper"><button class="btn btn-info form-control change_pass">Change Password</button></div>
                            <center><span id="errormsg" style="display:none; color:red;">Required</span></center>
                          </div>
                      </div>
                       <div class="ip-body  col-md-6" >
                          <div class="" style="height:330px">
                            <label>Email:</label><input type="text" class="form-control" value="{{Auth::User()->email}}" style="cursor:not-allowed" readonly><br>
                            <label>Position:</label><input type="text" class="form-control" style="cursor:not-allowed" value="{{$user_details->name}}" readonly><br>
                            <label>Birthdate</label><input type="date" class="form-control" id="birthdate" name = "birthdate" value="{{Auth::User()->birthdate}}"><br>
                            <center><span id="bd_error" style="display:none; color:red;">Required</span></center>
                            <label>Contact Details:</label><input type="text" class="form-control" id="contact" name = "contact_details" value="{{Auth::User()->contact_details}}"><br>
                            <center><span id="contact_error" style="display:none; color:red;">Required</span></center>
                          </div>
                      </div>
                            <div class="col-md-12 update-wrapper"><button class="btn btn-success form-control update_details" style="width: 200px; height: 31px; margin-left: 155px;">Update</button></div>
                  </form>
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>
</div>

<script>
    $(".change_pass").click(function(){
        $(".password-wrapper").html('<input type="password" name="password" class="form-control" id="password">')
    })

    $(document).ready(function(){
            $('.update_details').click(function(){
                
                var pass = $("#password").val();
                var fname = $("#fname").val();
                var lname = $("#lname").val();
                var mname = $("#mname").val();
                var birthdate = $("#birthdate").val();
                var contact = $("#contact").val();

                if(pass == ""){

                    $("#password").focus();
                    $("#errormsg").show();
                    $("#password").addClass("border-red");

                    $("#password").on('keyup', function(){
                        $("#errormsg").hide();
                        $("#password").removeClass("border-red");
                    })

                    return false;

                } else if(fname == ""){
                    $("#fname").focus();
                    $("#fname_error").show();
                    $("#fname").addClass("border-red");

                    $("#fname").on('keyup', function(){
                        $("#fname_error").hide();
                        $("#fname").removeClass("border-red");
                    })

                    return false;

                } else if(lname == ""){
                    $("#lname").focus();
                    $("#lname_error").show();
                    $("#lname").addClass("border-red");

                    $("#lname").on('keyup', function(){
                        $("#lname_error").hide();
                        $("#lname").removeClass("border-red");
                    })

                    return false;

                } else if(mname == ""){
                    $("#mname").focus();
                    $("#mname_error").show();
                    $("#mname").addClass("border-red");

                    $("#mname").on('keyup', function(){
                        $("#mname_error").hide();
                        $("#mname").removeClass("border-red");
                    })

                    return false;

                } else if(birthdate == ""){
                    $("#birthdate").focus();
                    $("#bd_error").show();
                    $("#birthdate").addClass("border-red");

                    $("#birthdate").on('keyup', function(){
                        $("#bd_error").hide();
                        $("#birthdate").removeClass("border-red");
                    })

                    return false;

                } else if(contact == ""){
                    $("#contact").focus();
                    $("#contact_error").show();
                    $("#contact").addClass("border-red");

                    $("#contact").on('keyup', function(){
                        $("#contact_error").hide();
                        $("#contact").removeClass("border-red");
                    })
                    return false;

                } else {

                    $("#form1").ajaxForm({
                        
                        success:function(data){
                            par  =  JSON.parse(data);

                            if(par.status){
                                $('.alert-notification-success').show();
                                $('.notif-msg').html(par.response);
                                $('.alert-notification-failed').hide();
                                $('.alert').delay(2000).fadeOut(500)
                                // alert(par.response);     
                                $(".error-msg").remove();
                                $('input[type="text"], select').popover('destroy');

                                $('body').animate({
                                        scrollTop: $('.alert').offset().top - 130
                                    }, 500);
                                path = base_url+module;
                                window.location.href = path;
                            }else{
                                $('.alert-notification-success').hide();
                                $('.alert-notification-failed').show();
                                $('.notif-msg').html(par.response);
                                $(".error-msg").remove();
                                $('input[type="text"], select').popover('destroy');

                            }
                        }
                    });
                }

            });
    });
</script>
  



