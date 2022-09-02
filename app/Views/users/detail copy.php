<?= $this->extend('shared/layout_main') ?>

<?= $this->section('content') ?>
<h3>Detail</h3>
<h6>Users</h6>
<div class="pt-3">
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
    <a href="<?= base_url('users') ?>" class="text-decoration-none">Back to Index</a>
</div>
<?= $this->endSection() ?>