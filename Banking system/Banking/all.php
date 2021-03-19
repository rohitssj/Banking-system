<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>All Customers</title>
</head>

<body background="image/all.jpg">

    <div class="row">
        <div class="col col-md-4 offset-4 mt-5">
            <div class="card" style="width: 25rem;">
                <div class="card-header">
                    <h3 class="text-center">All Customers</h3>
                </div>
                <div class="card-body">
                    <table class="table ">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">View</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include 'connection.php';
                            $sql = "SELECT id, name FROM users";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                // output data of each row
                                while ($row = $result->fetch_assoc()) {
                            ?>

                                    <tr>
                                        <th scope="row"><?php echo $row['id'] ?></th>
                                        <td><?php echo $row['name'] ?></td>
                                        <td>
                                            <form action="view.php" method="get">
                                                <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                                <button type="submit" class="btn btn-success">View</button>
                                            </form>
                                        </td>
                                    </tr>

                            <?php
                                }
                            } else {
                                echo "0 results";
                            }
                            $conn->close();
                            ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>

</html>