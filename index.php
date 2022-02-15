<?php

require_once('country.php');

?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>Countries list app</title>
</head>
<body>
<div class="container">
    <canvas id="myChart" width="400" height="400"></canvas>
    <div id="countries">
        <input type="search" class="search form-control" placeholder="Live search from countries list"/>
        <button class="sort" id="btn_sort" data-sort="name">
            Sort by name
        </button>
        <table id="table" class="table table-hover">
            <thead">
            <tr>
                <th class="table_header">Country ID</th>
                <th class="table_header">Country name</th>
                <th class="table_header">Population</th>
                <th class="table_header">Country code</th>
                <th class="table_header"></th>
            </tr>
            </thead>
            <tbody class="list">
			<? if (!empty($row)) {
				foreach ($row as $value) :?>
                    <tr>
                        <th class="table_content id"><?= $value['id'] ?></th>
                        <td class="table_content name"><?= $value['name'] ?></td>
                        <td class="table_content population"><?= $value['population'] ?></td>
                        <td class="table_content code"><?= $value['country_code'] ?></td>
                        <td class="table_content"><a href="?delete=<?= $value['id'] ?>" class="link">Delete this
                                country</a></td>
                    </tr>
				<?endforeach;
			} ?>

            <p class="total">Total countries shown: <?= count($row) ?></p>
            </tbody>
        </table>
    </div>
	<? if (empty($row)) {
		echo "<h2 class='display-6'>Country list is empty</h2>";
	} ?>
    <div class="show">
        <button id="btn-control" class="btn btn-primary">Hide add form</button>
        <form id="form" class="form" action="" method="post">
            <p><input class="form-control first" id="name" type="text" name="name" placeholder="Country name"
                      maxlength="20" required></p>
            <p><input class="form-control" id="population" type="number" name="population" placeholder="Population"
                      min="0" required></p>
            <p><input class="form-control" id="code" maxlength="3" type="text" name="country_code"
                      placeholder="Country code" required></p>
            <input id="btn" class="btn btn-success" type="submit" value="Add country">
        </form>
    </div>
</div>
<script defer src="jquery-3.6.0.min.js"></script>
<script defer src="list.min.js"></script>
<script defer src="chart.js"></script>
<script defer src="jquery.validate.min.js"></script>
<script defer src="script.js"></script>
</body>
</html>
