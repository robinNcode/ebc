<?= $this->extend('Layout') ?>

<!-- Custom Style -->
<?= $this->section('style') ?>
<?= $this->endSection() ?>

<!-- Main Content -->
<?= $this->section('content') ?>
<div></div>
<fieldset>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-info text-light">
                <i class="fa fa-info"></i> This Month Bills
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Previous Unit</th>
                        <th>Present Unit</th>
                        <th>Total Bill</th>
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</fieldset>
<?= $this->endSection() ?>
<!-- Custom Style -->
<?= $this->section('script') ?>

<?= $this->endSection() ?>


