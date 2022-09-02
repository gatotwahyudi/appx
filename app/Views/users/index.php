<?= $this->extend('shared/layout_main') ?>

<?= $this->section('content') ?>
<h3>Index</h3>
<h6>Users</h6>
<div class="pt-3">
    <form method="GET" action="<?= base_url('users') ?>">
        <div class="input-group mb-2">
            <input type="text" class="form-control" placeholder="" name="key" value="<?= isset($qs['key']) ? $qs['key'] : "" ?>">
            <button class="btn btn-outline-primary px-4" type="submit" title="Search">Search</button>
        </div>
    </form>
</div>
<div class="">
    <table class="table table-striped">
        <thead>
            <tr>
                <th width="40">#</th>
                <th>Email</th>
                <th>Full Name</th>
                <th>Role</th>
                <th>Status</th>
                <th width="120" class="text-end">
                    <a href="<?= base_url('users/create') ?>" class="btn btn-sm btn-outline-success">+</a>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php
            $counter = 1;
            foreach ($items as $item) { ?>
                <tr>
                    <td><?= $counter++ ?></td>
                    <td>
                        <a href="<?= base_url('users/detail/' . $item->id) ?>"><?= $item->email ?></a>
                    </td>
                    <td><?= $item->fullname ?></td>
                    <td><?= $item->role ?></td>
                    <td><?= $item->status ?></td>
                    <td>
                        <a href="<?= base_url('users/edit/' . $item->id) ?>">Edit</a> |
                        <a href="<?= base_url('users/delete/' . $item->id) ?>">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<?= $this->endSection() ?>