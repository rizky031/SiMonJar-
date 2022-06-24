<div class="content-wrapper mt-5">
<div class="content-header">
    <div class="container-fuild">
                <div class="col-lg-12">
                    <form action="<?=site_url('Address/saveUpdateAddress')?>" method="POST">
                            <div class="modal-body">
                            <div class="form-group">
                                    <label for="id">ID</label>
                                    <input name="id" class="form-control" value="<?= $address['.id']?>">
                                </div>
                                <div class="form-group">
                                    <label for="address">IP Address</label>
                                    <input type="text" name="address" class="form-control" autocomplete="off" value="<?= $address['address']?>" id="address" required>
                                </div>
                                <div class="form-group">
                                    <label for="interface">Interface</label>
                                    <select class="custom-select rounded-0" name="interface" value="<?= $address['interface']?>" id="interface" required>   
                                    <option>ether1</option>
                                    <option>ether2</option>
                                    <option>ether3</option>
                                    <option>ether4</option>
                                    <option>wlan1</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="comment">Comment</label>
                                    <input type="text" name="comment" class="form-control" autocomplete="off" value="<?= $address['comment']?>" id="comment">
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