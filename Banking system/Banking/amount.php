<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>Customer</title>
</head>

<body background="image/amount.jpg">
    <?php
    include 'connection.php';
    $rid = $_GET['rid'];
    $sql = "SELECT * FROM users WHERE id=$rid";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    ?>
    <div class="row">
        <div class="col col-md-4 offset-4">
            <ul class="list-group mt-5">
                <li class="list-group-item active text-center" aria-current="true">Pay To</li>
                <li class="list-group-item">Name : <?php echo $row["name"] ?></li>
                <li class="list-group-item">ID : <?php echo $row["id"] ?></li>
                <li class="list-group-item">Email : <?php echo $row["email"] ?></li>
                <li class="list-group-item">Mobile : <?php echo $row["mobile"] ?></li>
                <li class="list-group-item text-center">
                    <form action="pay.php" method="get">
                        <input type="hidden" name="pid" value="<?php echo $_GET['pid'] ?>">
                        <input type="hidden" name="rid" value="<?php echo $_GET['rid'] ?>">
                        <input type="number" name="amount" placeholder="Enter Amount" required>
                        <button type="submit" class="btn btn-success">Pay</button>
                    </form>
                </li>
            </ul>
        </div>
        <div class="col col-md-2"></div>
    </div>
    <?php
    $conn->close();
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>

</html>