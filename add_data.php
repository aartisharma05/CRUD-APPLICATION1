<?php
error_reporting(E_ALL);
  
  if (isset($_POST['submit'])) {

	$username = $_POST['username[]'];
	$email = $_POST['email[]'];
	$mobile = $_POST['mobile[]'];
    $address = $_POST['address[]'];
	$qty = $_POST['qty[]'];
    $unitprc = $_POST['unitprc[]'];
    $total = $_POST['total[]'];
    $option_val = $_POST['option[]'];
    
   
    // echo '<pre>';
    // print_r($total);
    // exit;


	}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Data</title>
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
        <script src="app.js"></script>

    <style>
        .button {
            margin: 10px;
        }
        #container {
            padding: 15px;
            margin: 11px;
        }
    </style>
    <script>
 let data = [];
        function totalmul(v) {
            
            let parenttd = v.parent().parent();
            
            // console.log(parenttd,"parenttd");
            var qty = parenttd.find('.qty').val();
            // console.log(qty,"qty");
            var unitprice = parenttd.find('.unitprice').val();
            var username = parenttd.find('.username').val();
            var email = parenttd.find('.email').val();
            var mobile = parenttd.find('.mobile').val();
            var address = parenttd.find('.address').val();
         
              var total = qty*unitprice;
            //   console.log(total,"total");
              parenttd.find('.total').val(total);
             
        
            data.push({parent_id : parenttd ,username: username,email: email,mobile:mobile ,address:address ,qty : qty,unitprice: unitprice,total:total});
            // console.log(data);
        }

    </script>
</head>

<body>
    <h1 style="text-align:center">Add New Data</h1>
    <a class="btn btn-primary" href="saved_data1.php" role="button">Saved Data</a>
    <a class="btn btn-success add_div" id="parent_row_add" role="button">Add</a>

    <form action="saved_data.php" method="post" id="addData" autocomplete="off">
        <div id="container" class= "parent_div">
        <!-- <input type="hidden" id="option_value" value="1" name="option[]"> -->
            <div id="parentdiv">          
                <table class="table table-bordered" id="table" style="width:100%">
                    <thead>
                        <tr>
                            <td style="width:5%">Action</td>
                            <td style="width:10%">Name</td>
                            <td style="width:10%">Email</td>
                            <td style="width:10%">Mobile</td>
                            <td style="width:20%">Address</td>
                            <td style="width:10%">Qty</td>
                            <td style="width:10%">Unit Price</td>
                            <td style="width:10%">Total</td>
                        </tr>
                    </thead>
                    <tbody id="show_row">
                        <tr id="row">
                            <td><a class="btn btn-success addrow" role="button">+</a>
                    
                            <input type="hidden" name="option[]" value="1" id="option_value" >
                            <td><input type="text" name="username[]" id="uname" class="username" placeholder="username"></td>
                            <td><input type="text" name="email[]" id="emil" class="email" placeholder="email"></td>
                            <td><input type="tel" name="mobile[]" id="mobile" class="mobile" placeholder="mobile"></td>
                            <td><input type="text" name="address[]" id="address" class="address" placeholder="address"></td>
                            <td><input type="text" name="qty[]" id="qty" class="qty" onkeyup="totalmul($(this))" required></td>
                            <td><input type="text" name="unitprc[]" id="unitprice" class="unitprice" onkeyup="totalmul($(this))" 
                                    required></td>
                            <td><input type="text" name="total[]" id="total" class="total" readonly></td>
                            

                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
        <input type="submit" id ="submit" name="submit" value="submit">
        <a href="home.php" class="btn btn-danger" name="submit">Cancel</a>

    </form>

</body>
</html>

