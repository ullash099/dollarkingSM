<!-- Content Header (Page header) -->
<?php $this->load->view('template/admin/breadcrumb.php'); ?>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <?php $this->load->view('message/message_block.php'); ?>
            <div class="row">
                <div class="col-xs-6">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">Update Profile of <strong> <?php echo (isset($userProfile[0]))? $userProfile[0]->admin_name:''; ?></strong></h3>
                        </div>
                        <div class="box-body">
                            <?php
                            $attr = array(
                                'autocomplete'=>"off"
                            );
                            echo form_open('AdminProfile/updateProfile/'.$who.'/1',$attr); ?>
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="aname">Name<span style="color:red">*</span></label>
                                        <input required="required" type="text" class="form-control" id="aname" placeholder="Enter Username..." name="aname" value="<?php echo ($userProfile[0])? ucwords(str_replace('_', ' ', $userProfile[0]->admin_name)):''; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="userName">User Name<span style="color:red">*</span></label>
                                        <input required="required" type="text" class="form-control" id="userName" placeholder="Enter Username..." name="userName" value="<?php echo ($userProfile[0])? $userProfile[0]->user_name:''; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="emailAddres">Email address<span style="color:red">*</span></label>
                                        <input required="required" type="email" class="form-control" id="userEmail" placeholder="Enter email..." name="userEmail" value="<?php echo ($userProfile[0])? $userProfile[0]->admin_email:''; ?>">
                                    </div>
                                </div><!-- /.box-body -->
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">Update Password of <strong><?php echo (isset($userProfile[0]))? $userProfile[0]->admin_name:''; ?></strong></h3>
                        </div>
                        <div class="box-body">
                            <?php 
                            $attr = array(
                                'autocomplete'=>"off"
                            );
                            echo form_open('AdminProfile/updateProfile/'.$who.'/2',$attr); ?>
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="oldUserPass">Old Password<span style="color:red">*</span></label>
                                        <input required="required" type="password" class="form-control" id="userPass" placeholder="Enter User Password..." name="oldUserPass">
                                    </div>
                                    <div class="form-group">
                                        <label for="newUserPass">New Password<span style="color:red">*</span></label>
                                        <input required="required" type="password" class="form-control" id="newUserPass" placeholder="Enter New User Password..." name="newUserPass">
                                        <span class="help-block">Password Must Be Minimum 8 Characters Long</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="reenterUserPass">Reenter password<span style="color:red">*</span></label>
                                        <input required="required" type="password" class="form-control" id="reenterUserPass" placeholder="Reenter New User Password..." name="reenterUserPass">
                                    </div>
                                </div><!-- /.box-body -->
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>