<?= $this->extend('Layout') ?>

<!-- Custom Style -->
<?= $this->section('style') ?>
<?= $this->endSection() ?>

<!-- Main Content -->
<?= $this->section('content') ?>
<fieldset>
    <form class="form mt-5 contact-form" action="<?= base_url('bill/create') ?>"
          accept-charset="UTF-8" method="post" spellcheck="false" autocomplete="off">
        <?= csrf_field() ?>
        <div class="container">
            <div class="card">
                <div class="card-header bg-info text-light">
                    Bill Create Form
                </div>
                <div class="card-body">
                    <!-- Message section starts here -->
                        <?php
                        $msg = session('msg');
                        $msgClr = session('msgClr');

                        if(!empty($msg) && !empty($msgClr)):?>
                            <div class="bg-white">
                                <h6 class="text-<?= $msgClr ?> ">*** <?= $msg ?></h6>
                            </div>
                        <?php endif; ?>

                    <!-- User section starts here -->
                    <div class="row form-group">
                        <label class="col-sm-4 col-md-4" for="userId"><h6>User : <span class="text-danger">*</span></h6></label>
                        <div class="col-sm-8 col-md-8">
                            <select class="form-control" id="userId" name="user_id" required>
                                <option value="">Select an User</option>
                                <?php if (!empty($users)) : ?>
                                    <?php foreach ($users as $user) : ?>
                                        <option value="<?= $user['id'] ?>"><?= esc($user['name']) ?> (<?= esc($user['floor']) ?> floor)</option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                            <div class="invalid-feedback"><?= session('errors.user_id') ?></div>
                        </div>
                    </div>

                    <!-- Month section starts here -->
                    <div class="row form-group">
                        <label class="col-sm-2 col-md-4" for="monthId"><h6>Month : <span class="text-danger">*</span></h6></label>
                        <div class="col-sm-4 col-md-8">
                            <input class="form-control" type="text" id="monthId" name="month" value="<?= date('m-Y') ?>"  required>
                            <div class="invalid-feedback"><?= session('errors.month') ?></div>
                        </div>
                    </div>

                    <!-- Unit section starts here -->
                    <div class="row form-group">
                        <label class="col-sm-2 col-md-4" for="unitId"><h6>Unit : <span class="text-danger">*</span></h6></label>
                        <div class="col-sm-4 col-md-8">
                            <input class="form-control" type="number" id="unitId" name="unit" maxlength="10" minlength="2" required>
                            <div class="invalid-feedback"><?= session('errors.unit') ?></div>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-success"><i class="fa fa-arrow-left"></i> Save</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </form>
</fieldset>
<?= $this->endSection() ?>
<!-- Custom Style -->
<?= $this->section('script') ?>

<?= $this->endSection() ?>
