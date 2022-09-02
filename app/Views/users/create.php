<?= $this->extend('shared/layout_main') ?>

<?= $this->section('content') ?>
<h3>Create</h3>
<h6>Users</h6>
<div class="pt-3">
    <form method="POST" action="<?= base_url('users/create') ?>">
        <div class="card my-3">
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="firstName" class="form-label">Email</label>
                        <input type="text" class="form-control" name="email" placeholder="" value="" required="">
                        <div class="invalid-feedback">Required</div>
                    </div>
                    <div class="col-md-6">
                        <label for="fullname" class="form-label">Full Name</label>
                        <input type="text" class="form-control" name="fullname" placeholder="" value="" required="">
                        <div class="invalid-feedback">Required</div>
                    </div>
                    <div class="col-md-6">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="" value="" required="">
                        <div class="invalid-feedback">Required</div>
                    </div>
                    <div class="col-md-6">
                        <label for="repassword" class="form-label">Retype Password</label>
                        <input type="password" class="form-control" name="repassword" placeholder="" value="" required="">
                        <div class="invalid-feedback">Required</div>
                    </div>
                    <div class="col-md-3">
                        <label for="role" class="form-label">Role</label>
                        <select name="role" class="form-select">
                            <option value="">-- SELECT --</option>
                            <option value="A">ADMIN</option>
                            <option value="M">MEMBER</option>
                        </select>
                        <div class="invalid-feedback">Required</div>
                    </div>
                    <div class="col-md-3">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" class="form-select">
                            <option value="">-- SELECT --</option>
                            <option value="A">ACTIVE</option>
                            <option value="I">INACTIVE</option>
                        </select>
                        <div class="invalid-feedback">Required</div>
                    </div>
                </div>
            </div>
        </div>
        <input type="submit" value="Submit" class="btn btn-primary" />
        <a href="<?= base_url('users') ?>" class="text-decoration-none">Back to Index</a>
    </form>
</div>
<?= $this->endSection() ?>