<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
    <!--<title> Multiple Options Select Menu </title>-->

    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="<?= base_url('css/search.css'); ?>">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

</head>

<body>
    <div class="container">


        <form class="form-group mb-3" method="GET" action="#">
            <div class="row">

                <div class="col-md-6">

                    <div class="select-btn">
                        <span class="btn-text">Select Location</span>
                        <span class="arrow-dwn">
                            <i class="fa-solid fa-chevron-down"></i>
                        </span>
                    </div>

                    <ul class="list-items">
                        <li class="item-seach">
                            <input type="text" style="width: 100%;padding: 8px 10px;border:none"
                                onkeyup="filterFunction()" id="myInput" placeholder="Search...">
                        </li>
                        <?php foreach($options as $value) : ?>
                        <li class="item" onclick="getValue('<?= $value['location'] ?>')">
                            <span class="checkbox">
                                <i class="fa-solid fa-check check-icon"></i>
                            </span>
                            <span class="item-text"><?= $value['location'] ?></span>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="col-md-3">

                    <button type="submit" class="btn btn-primary btn-block btn-lg"> Search </button>
                </div>
            </div>


            <input type="hidden" name="location" id="location" />

        </form>

        <div class="table-responsive">
            <table class="table table-striped table-bordered" style="font-size:12px;">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Model</th>
                        <th>Type</th>
                        <th>Location</th>
                        <th>Year</th>
                        <th>CC</th>
                        <th>Transmission</th>
                        <th>Price</th>
                        <th>Fuel</th>
                        <th>Notes</th>
                        <th>Type Vehicle</th>
                        <th>Url</th>
                        <th>Concrate</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($mobil as $key => $value) : ?>
                    <tr>
                        <td> <?= $value['name'] ?> </td>
                        <td> <?= $value['model'] ?> </td>
                        <td> <?= $value['type'] ?> </td>
                        <td> <?= $value['location'] ?> </td>
                        <td> <?= $value['year'] ?> </td>
                        <td> <?= $value['cc'] ?> </td>
                        <td> <?= $value['transmission'] ?> </td>
                        <td> <?= $value['price'] ?> </td>
                        <td> <?= $value['fuel'] ?> </td>
                        <td> <?= $value['notes'] ?> </td>
                        <td> <?= $value['type_vehicle'] ?> </td>
                        <td> <?= $value['url'] ?> </td>
                        <td> <?= $value['concate'] ?> </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <?= $pager->links("mobil","bootstrap_pagination"); ?>
        </div>

    </div>

    <!-- JavaScript -->
    <!--<script src="js/script.js"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
        integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="<?= base_url('js/search.js'); ?>"></script>
</body>

</html>