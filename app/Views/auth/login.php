<?= $this->extend('shared/layout_main') ?>

<?= $this->section('content') ?>
<h3>Login</h3>
<div class="pt-3">
    <?php $error = session()->getFlashdata('error');
    if ($error) { ?>
        <div class="alert alert-danger">
            <?= $error; ?>
        </div>
    <?php } ?>

    <form method="POST" action="<?= base_url('auth/login') ?>">
        <div class="col-md-6 my-2">
            <label for="firstName" class="form-label">Email</label>
            <input type="text" class="form-control <?= ($v->hasError('email') ? 'is-invalid' : '') ?>" name="email" placeholder="Enter email" value="">
            <div class="invalid-feedback"> <?= $v->getError('email') ?></div>
        </div>
        <div class="col-md-6 my-2">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control <?= ($v->hasError('password') ? 'is-invalid' : '') ?>" name="password" placeholder="Enter password" value="">
            <div class="invalid-feedback"> <?= $v->getError('password') ?></div>
        </div>
        <input type="submit" value="Login" class="btn btn-primary" />
    </form>
</div>
<?= $this->endSection() ?>