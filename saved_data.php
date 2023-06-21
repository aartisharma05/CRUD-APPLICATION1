<?php
// echo '<pre>';
// print_r($_POST);
// print_r("Here");
// die();
$con = mysqli_connect("localhost", "root", "", "assignmentdb");

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];   
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];
    $option = $_POST['option'];
    $qty = $_POST['qty'];
    $unitprice = $_POST['unitprc'];
    $total = $_POST['total'];
    if($option!=''){
    for ($i = 0; $i < count($total); $i++) {
        $u_name = $username[$i];
        $mail = $email[$i];
        $s_phone = $mobile[$i];
        $addr = $address[$i];
        $qty_new = $qty[$i];
        $untprce = $unitprice[$i];
        $ttl = $total[$i];
        $opt_val = $option[$i];

        $query = "INSERT INTO userinfo (username, email, mobile, address, qty, price, total, option_val)
         VALUES ('$u_name', '$mail', '$s_phone', '$addr', '$qty_new', '$untprce', '$ttl', '$opt_val')";
        // echo $query . '\n';
        $query_run = mysqli_query($con, $query);
    }
}
    $_POST = [];
    header("Location:action.php");
    exit();
  
}

$sql = "SELECT DISTINCT option_val FROM userinfo";
$result = mysqli_query($con, $sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <script src="jquery.js"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1 style="text-align:center">Saved Data</h1>
    <a class="btn btn-primary" href="add_data.php" role="button">Add Data</a>
    <?php
    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {
            $optionValue = $row['option_val'];
            $sql = "SELECT * FROM userinfo WHERE option_val = '$optionValue'";
            $dataResult = mysqli_query($con, $sql);
            if (mysqli_num_rows($dataResult) > 0) {
                echo "<h6>Option: $optionValue </h6>";
    ?>
                <div id="saveparentdiv">
                    <table class="table table-bordered striped-table" id="savetable" style="width:100%">
                        <thead>
                            <tr>
                                <td>Name</td>
                                <td>Email</td>
                                <td>Mobile</td>
                                <td>Address</td>
                                <td>Qty</td>
                                <td>Unit Price</td>
                                <td>Total</td>
                                <td>Option</td>
                            </tr>
                        </thead>
                        <tbody id="save_show_row">
                            <?php
                            while ($dataRow = mysqli_fetch_assoc($dataResult)) {
                            ?>
                                <tr id="save_row">
                                    <td><?= $dataRow['username']; ?></td>
                                    <td><?= $dataRow['email']; ?></td>
                                    <td><?= $dataRow['mobile']; ?></td>
                                    <td><?= $dataRow['address']; ?></td>
                                    <td><?= $dataRow['qty']; ?></td>
                                    <td><?= $dataRow['price']; ?></td>
                                    <td><?= $dataRow['total']; ?></td>
                                    <td><?= $dataRow['option_val']; ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
    <?php
            }
        }
    } else {
        echo "No data found.";
    }
    ?>
</body>

</html>
