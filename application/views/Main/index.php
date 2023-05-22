<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title><?= $title ?></title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/navbar-static/">
    <!-- Bootstrap core CSS -->
    <link href="<?= base_url() ?>assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="navbar-top.css" rel="stylesheet">
</head>

<body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">IB-Lenhardt</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?= base_url() ?>Login">Admin</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <main class="container">
        <?php
        foreach ($all_news as $news) {
        ?>
            <div class="row mb-2">
                <div class="col-md-12">
                    <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                        <div class="col-auto d-none d-lg-block">
                            <img width="200" height="250" src="<?=base_url()?>assets/uploads/<?=$news['image']?>">
                        </div>
                        <div class="col p-4 d-flex flex-column position-static">
                            <h3 class="mb-0"><?=$news['title']?></h3>
                            <div class="mb-1 text-muted"><?=date('d-m-Y',strtotime($news['created_at'])) ?></div>
                            <p class="card-text mb-auto"><?=$news['body']?></p>
                        </div>

                    </div>
                </div>

            </div>
        <?php
        }

        ?>
    </main>


    <script src="<?= base_url(); ?>assets/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>