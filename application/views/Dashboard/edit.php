<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Dashboard - <?= $title ?></title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/dashboard/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">


    <!-- Bootstrap core CSS -->
    <link href="<?= base_url(); ?>assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <!--  jQuery -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

    <!-- Bootstrap Date-Picker Plugin -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css" />


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

    <link href="<?= base_url(); ?>assets/css/dashboard.css" rel="stylesheet">
</head>

<body>

    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">IB-Lenhardt</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-nav">
            <div class="nav-item text-nowrap">
                <a class="nav-link px-3" href="<?= base_url() ?>Logout">Sign out</a>
            </div>
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="<?= base_url() ?>Dashboard">
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url() ?>News">
                                News
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2"><?= $title ?></h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group me-2">
                            <a href="<?= base_url() ?>add_news" class="btn btn-sm btn-outline-secondary">New</a>
                        </div>
                    </div>
                </div>

                <?php
                if (validation_errors() != '') {
                ?>
                    <div class="alert alert-primary" role="alert">
                        <?php echo validation_errors(); ?>
                    </div>

                <?php
                }
                if (!empty($error)) {
                ?>
                    <div class="alert alert-primary" role="alert">
                        <?php echo $error; ?>
                    </div>
                <?php
                }
                ?>
                <!--  -->
                <?php echo form_open_multipart('update_news'); ?>
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" id="title" value="<?= $news['title'] ?>">
                    <input type="hidden" name="id" class="form-control" id="id" value="<?= $news['id'] ?>">
                </div>
                <br>
                <div class="form-group">
                    <label for="body">Body</label>
                    <textarea class="form-control" name="body" id="body" rows="3"><?= $news['body'] ?></textarea>
                </div>
                <br>
                <div class="form-group">
                    <label for="body">Date</label>
                    <input class="form-control" id="date" name="date" placeholder="dd-mm-yyyy" value="<?= date('d-m-Y', strtotime($news['date'])) ?>" type="text" />
                </div>
                <br>
                <div class="form-group row">
                    <div class="col-md-2">
                        <img width="50%" src="<?= base_url() ?>assets/uploads/<?= $news['image'] ?>" alt="">
                    </div>
                    <div class="col-md-10">
                        <label for="body">Picture</label>
                        <input type="file" name="image" class="form-control-file" id="image">
                    </div>

                </div>
                <br>
                <div class="form-check">
                    <input class="form-check-input" name="aktiv" type="checkbox" <?= ($news['aktiv']) ? 'checked' : '' ?> value="1" id="aktiv">
                    <label class="form-check-label" for="aktiv">
                        Active
                    </label>
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit">Edit</button>

                <!--  -->
            </main>
        </div>
    </div>

    <script src="<?= base_url(); ?>assets/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function() {
            var date_input = $('input[name="date"]'); //our date input has the name "date"
            var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
            var options = {
                format: 'dd-mm-yyyy',
                container: container,
                todayHighlight: true,
                autoclose: true,
            };
            date_input.datepicker(options);
        })
    </script>
</body>

</html>