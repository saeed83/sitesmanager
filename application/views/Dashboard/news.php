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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>



    <!-- Bootstrap core CSS -->
    <link href="<?= base_url(); ?>assets/dist/css/bootstrap.min.css" rel="stylesheet">

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
        <!-- Modal  -->
        <div class="modal fade" id="confirm-delete-modal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this article?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <a href="" id="delete-confirm-button" class="btn btn-danger">Delete</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- ------ -->
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
                    <h1 class="h2">All news</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group me-2">
                            <a href="<?= base_url() ?>add_news" class="btn btn-sm btn-outline-secondary">New</a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <?php
                    if (empty($all_news)) {
                    ?>
                        <h2>Table News is empty</h2>
                    <?php
                    } else {
                    ?>
                        <table class="table table-striped table-sm">
                            <thead>
                                <tr>
                                    <th scope="col">Title</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Created at</th>
                                    <th scope="col">-</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($all_news as $news) {
                                ?>
                                    <tr>
                                        <td><a href="<?= base_url() ?>news_view/<?= $news['id'] ?>"><?= $news['title'] ?></a></td>
                                        <td><?= ($news['aktiv'] == 1) ? 'Active' : 'Not Active' ?></td>
                                        <td><?= date('d-m-Y',strtotime($news['date']))?></td>
                                        <td><?= date('d-m-Y',strtotime($news['created_at']))?></td>
                                        <td>
                                            <a href="<?= base_url() ?>news_edit/<?= $news['id'] ?>"><i class="bi bi-pencil-square"></i></a>
                                            <a href="#" class="delete-button" data-id="<?= $news['id'] ?>"><i class="bi bi-trash3"></i></a>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    <?php
                    }
                    ?>
                </div>
            </main>
        </div>
    </div>

    <script src="<?= base_url(); ?>assets/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.delete-button').on('click', function(e) {
                e.preventDefault();

                var id = $(this).data('id'); // Get the data-id attribute of the clicked element

                var url = '<?= base_url() ?>news_delete/' + id; // Create the URL for your delete method

                $('#delete-confirm-button').attr('href', url); // Set the href attribute of the delete button in the modal

                $('#confirm-delete-modal').modal('show'); // Show the modal
            });
        });
    </script>
</body>

</html>