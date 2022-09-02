<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APP ONE</title>
    <link rel="stylesheet" href="<?= base_url('/bs5/bootstrap.min.css') ?>" />
</head>

<body>
    <nav class="py-2 bg-light border-bottom">
        <div class="container d-flex flex-wrap">
            <ul class="nav me-auto">
                <li class="nav-item"><a href="<?= base_url('/')?>" class="nav-link link-dark px-2 active" aria-current="page">Home</a></li>
                <li class="nav-item"><a href="<?= base_url('users')?>" class="nav-link link-dark px-2">Users</a></li>
                <li class="nav-item"><a href="#" class="nav-link link-dark px-2">About</a></li>
            </ul>
            <ul class="nav">
                <?php if (session()->get('logged_in') === TRUE) { ?>
                    <li class="nav-item"><a href="<?= base_url('auth/logout')?>" class="btn btn-smm btn-outline-danger">Logout</a></li>
                <?php } else { ?>
                    <li class="nav-item"><a href="<?= base_url('auth/login')?>" class="nav-link link-dark px-2">Login</a></li>
                    <li class="nav-item"><a href="#" class="nav-link link-dark px-2">Sign up</a></li>
                <?php } ?>
            </ul>
        </div>
    </nav>
    <header class="py-3 mb-4 border-bottom">
        <div class="container d-flex flex-wrap justify-content-center">
            <a href="/" class="d-flex align-items-center mb-3 mb-lg-0 me-lg-auto text-dark text-decoration-none">
                <img class="me-2" src="<?= base_url('bs5/bootstrap-logo.svg') ?>" alt="" width="48" height="40">
                <span class="fs-4">App One</span>
            </a>
            <div class="col-12 col-lg-auto pt-1">
                <span class="fst-italic">Flash Track Workshop</span>
            </div>
        </div>
    </header>

    <main>
        <div class="container">
            <?= $this->renderSection('content') ?>
        </div>
    </main>

    <footer>

    </footer>
    <script src="<?= base_url('/bs5/bootstrap.min.js') ?>"></script>
</body>

</html>