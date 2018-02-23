<style>
    .user-rights label{display: inline-block};
</style>
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-1">
                <h3 class="content-header-title"><?php echo (empty($userId)?'Add':'Edit');?> Users</h3>
            </div>
        </div>
        <div class="content-body">
            <section class="inputmask" id="inputmask">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-xl-12 col-lg-12">
                                            <form action="add-users">
                                                <?php echo (!empty($userId)?'<input type="hidden" name="userId" value="'.$userId.'" />':''); ?>
                                                <fieldset>
                                                    <h5>Name</h5>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="name"  name="name" placeholder="Enter Name" value="<?php echo (!empty($userdata['u_name'])?$userdata['u_name']:''); ?>" />
                                                    </div>
                                                </fieldset>
                                                <fieldset>
                                                    <h5>Email</h5>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email" value="<?php echo (!empty($userdata['u_email'])?$userdata['u_email']:''); ?>" />
                                                    </div>
                                                </fieldset>
                                                <fieldset>
                                                    <h5><?php echo (!empty($userId)?'New ':''); ?> Password</h5>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="password" name="password" placeholder="Enter<?php echo (!empty($userId)?' New':''); ?> Password" value="" />
                                                    </div>
                                                </fieldset>

                                                <fieldset>
                                                    <h5>Rights</h5>
                                                    <div class="form-group">
                                                        <fieldset class="user-rights" style="">
                                                            <label class="custom-control custom-radio">
                                                                <input id="usertype" name="usertype" type="radio" class="custom-control-input" value="1" <?php echo ($userdata['is_admin']!='' && $userdata['is_admin']=='1'?'checked':''); ?>>
                                                                <span class="custom-control-indicator"></span>
                                                                <span class="custom-control-description">Admin</span>
                                                            </label>

                                                            <label class="custom-control custom-radio">
                                                                <input id="usertype" name="usertype" type="radio" class="custom-control-input" value="0" <?php echo ($userdata['is_admin']!='' && $userdata['is_admin']=='0'?'checked':''); ?><?php echo (empty($userId)?'checked':''); ?>>
                                                                <span class="custom-control-indicator"></span>
                                                                <span class="custom-control-description">User</span>
                                                            </label>
                                                        </fieldset>
                                                    </div>
                                                </fieldset>
                                                
                                                <div class="text-right">
                                                    <button type="button" class="btnSubmit btn btn-success">Submit <i class="fa fa-thumbs-o-up position-right"></i></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>