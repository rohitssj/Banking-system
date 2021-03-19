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

<body background="image/pay.jpg">

    <?php
    include 'connection.php';
    $pid = $_GET['pid'];
    $rid = $_GET['rid'];
    $amount = $_GET['amount'];

    $psql = "SELECT * FROM users WHERE id=$pid";
    $presult = $conn->query($psql);
    $prow = $presult->fetch_assoc();



    if ($amount <= $prow['balance']) {

        $rsql = "UPDATE users SET balance = balance + $amount  WHERE id=$rid";
        $psql = "UPDATE users SET balance = balance - $amount  WHERE id=$pid";


        if ($conn->query($rsql) === TRUE and $conn->query($psql) === TRUE) {
            $conn->close();
            include 'connection.php';
            $psql = "SELECT * FROM users WHERE id=$pid";
            $presult = $conn->query($psql);
            $prow = $presult->fetch_assoc();

            $rsql = "SELECT * FROM users WHERE id=$rid";
            $rresult = $conn->query($rsql);
            $rrow = $presult->fetch_assoc();
            $tsql = "INSERT INTO transfer (s_id, r_id, amount)
            VALUES ($pid, $rid, $amount);";
            $conn->query($tsql);
    ?>

            <div class="row">
                <div class="col col-md-4 offset-4">
                    <div class="alert alert-success mt-5 text-center" role="alert">
                        <h3>Payment Successful!</h3>
                    </div>
                    <ul class="list-group mt-1">
                        <li class="list-group-item">
                            UPDATE: INR <?php echo $_GET['amount'] ?> Debited from id <?php echo $_GET['pid'] ?>
                        </li>
                        <li class="list-group-item">
                            Your current Balance is : INR <?php echo $prow['balance'] ?>
                        </li>
                        <li class="list-group-item text-center mt-5">
                            <form action="index.php" method="get">
                                <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                <button type="submit" class="btn btn-primary">Go To home</button>
                            </form>
                        </li>
                    </ul>
                </div>
                <div class="col col-md-2"></div>
            </div>
        <?php
        } else {
            echo "Error updating record: " . $conn->error;
        }
    } else {
        ?>
        <div class="row">
            <div class="col col-md-4 offset-4">
                <div class="alert alert-danger mt-5 text-center" role="alert">
                    <h3>Insufficient Balance!</h3>
                </div>
            </div>
            <div class="col col-md-2"></div>
        </div>
    <?php
    }
    $conn->close();
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>

</html>