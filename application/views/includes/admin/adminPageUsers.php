
<div class="row">
    <div class="col-12">
        <a href="<?= base_url('register')?>" class="btn btn-success my-2">Add User</a>
    </div>

    <div class="col-12">
        <?php if(!empty($users)):?>
            <table class="table table-striped table-hover">
                <thead>
                    <th>User_id</th>
                    <th>name</th>
                    <th>surname</th>
                    <th>email</th>
                    <th>password</th>
                    <th>role</th>
                    <th>Options</th>
                </thead>
                <tbody>
                        <?php foreach($users as $user):?>
                            <tr>
                                <td><?= $user->user_id?></td>
                                <td><?= $user->name?></td>
                                <td><?= $user->surname?></td>
                                <td><?= $user->email?></td>
                                <td><?= $user->password?></td>
                                <td><?php echo ($user->user_role == 1) ? 'User' :'Admin'; ?></td>
                                <td>
                                    <a href="<?= base_url('getUpdateUser/').$user->user_id?>" class="btn btn-sm btn-primary">Update</a>
                                    <a href="<?= base_url('deleteUser/').$user->user_id?>" class="btn btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach;?>
                </tbody>
            </table>
        <?php endif;?>
    </div>
</div>