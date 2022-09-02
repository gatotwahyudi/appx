<?= $this->extend('shared/layout_main') ?>

<?= $this->section('content') ?>
<h3>Detail</h3>
<h6>Users</h6>
<div class="pt-3 row">
    <div class="col-md-3">
        <div class="card d-flex justify-content-center">
            <img name="profpic" src="<?= base_url('pics/' . $rec->profpic) ?>" width="200" class="card-img" />
        </div>
        <form method="POST" action="<?= base_url('users/upload/' . $rec->id) ?>" enctype="multipart/form-data">
            <input type="file" name="image" class="form-control my-2" />
            <button type="submit" class="btn btn-primary">Upload</button>
        </form>
    </div>
    <div class="col-md-9">
        <dl>
            <dt>Email</dt>
            <dd><?= $rec->email ?></dd>
            <dt>Full Name</dt>
            <dd>Administrator</dd>
            <dt>Role</dt>
            <dd>ADMIN</dd>
            <dt>Status</dt>
            <dd>Active</dd>
        </dl>
    </div>
</div>
<a href="<?= base_url('users') ?>" class="text-decoration-none">Back to Index</a>
<?= $this->endSection() ?>