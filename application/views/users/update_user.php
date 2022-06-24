<div class="content-wrapper mt-5">
<div class="content-header">
    <div class="container-fuild">
                <div class="col-lg-12">
                    <form action="<?=site_url('Users/saveUpdateUser')?>" method="POST">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="id">ID</label>
                                    <input name="id" class="form-control" value="<?= $user['.id']?>">
                                </div>
                                <div class="form-group">
                                    <label for="user">Name</label>
                                    <input type="text" name="name" class="form-control" autocomplete="off" value="<?= $user['name']?>" id="name" required>
                                </div>
                                <div class="form-group">
                                <label for="group">Group</label>
                                    <select class="custom-select rounded-0" name="group" id="group" required>
                                    <option><?= $user['group']?></option>
                                    <?php foreach ($group as $data) { ?>
                                    <option><?= $data['name'] ?></option>
                                    <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control" value="<?= $user['password']?>" id="password">
                                </div>
                                <div class="form-group">
                                    <label for="confirm-password">Confirm Password</label>
                                    <input type="password" name="confirm-password" class="form-control" value="<?= $user['password']?>" id="confirm-password">
                                </div>
                                <div class="form-group">
                                    <label for="comment">Comment</label>
                                    <input type="text" name="comment" class="form-control" autocomplete="off" value="<?= $user['comment']?>" id="comment">
                                </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="submit" class="btn btn-outline-light" id="submit">Save</button>
                            </div>
                    </form>
                </div>
        </div>
    </div>
</div>