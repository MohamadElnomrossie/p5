<?php
if (isset($_POST['productsCount'])) {
    $table = drawTable($_POST['productsNo']);
}

if (isset($_POST['productsCalculate'])) {
    $bill = drawBill($_POST['productsNo']);
}

function drawBill($productsNo)
{
    $total = 0;

    $table = "<table class='table'>
                <tbody>  
                    <thead>
                            <tr>
                                <th >Product Name</th>
                                <th >Product Price</th>
                                <th >Product Quantity</th>
                                <th >SubTotal</th>
                            </tr>
                    </thead>";


    for ($i = 0; $i < $productsNo; $i++) {
        $subTotal = $_POST["productPrice$i"] * $_POST["productQuantity$i"];
        $table .= "  <tr>
                    <td>  " . $_POST["productName$i"] . "  </td>
                    <td>  " . $_POST["productPrice$i"] . "  </td>
                    <td>  " . $_POST["productQuantity$i"] . " </td>
                    <td class='text-right'>   " . $subTotal . " </td>
                </tr>";
        $total += $subTotal;
    }


    $discountArray = calculateDiscount($total);
    $delivery = calculateDelivery($_POST['city']);
    $netTotal = $delivery + $discountArray[1];


    $table .= " <tr>
                    <th> Cilent Name </th>
                    <td colspan=3> ".$_POST['username']."  </td> 
                <tr>
                <tr>
                    <th> City </th>
                    <td colspan=3> ".$_POST['city']."  </td> 
                <tr>
                <tr>
                    <th> Total </th>
                    <td colspan=3> ".$total ."  EGP</td> 
                <tr>
                <tr>
                    <th> discount </th>
                    <td colspan=3> ".$discountArray[0] ."  EGP</td> 
                <tr>
                <tr>
                    <th> Total After Discount </th>
                    <td colspan=3> ".$discountArray[1] ." EGP </td> 
                <tr>
                <tr>
                    <th> Delivery </th>
                    <td colspan=3> ". $delivery ." EGP </td> 
                <tr>
                <tr class='text-danger'>
                    <th> NET TOTAL </th>
                    <td colspan=3 class='text-right'> ". $netTotal ." EGP </td> 
                <tr>

        </tbody></table>";
    return $table;
}

function calculateDiscount($total)
{
    if($total < 1000){
        $discount = 0;
    }elseif($total >=1000 && $total < 3000){
        $discount = 0.1;
    }elseif($total >= 3000 && $total < 4500){
        $discount = 0.15;
    }else{
        $discount = 0.2;
    }
    $discountValue = ($total * $discount);
    $totalAfterDiscout = $total - ($total * $discount);
    return [$discountValue,$totalAfterDiscout];
}

function calculateDelivery($city)
{
    switch ($city) {
        case 'Cairo':
            $delivery = 0;
            break;
        case 'Giza':
            $delivery = 30;
            break;
        case 'Alex':
            $delivery = 50;
            break;
        case 'Others':
            $delivery = 100;
            break;
        default:
            $delivery = 0;
            break;
    }
    return $delivery;
}

function drawTable($productsNo)
{
    $table = "<table class='table'><tbody>";
    for ($i = 0; $i < $productsNo; $i++) {
        $table .= "  <tr>
                        <td>    <input type='text' class='form-control' name='productName$i'></td>
                        <td>    <input type='text' class='form-control' name='productPrice$i'></td>
                        <td>    <input type='text' class='form-control' name='productQuantity$i'></td>
                    </tr>";
    }
    $table .= "</tbody></table><button type='submit' name='productsCalculate' class='btn btn-dark form-control'>Calculate</button>";
    return $table;
}
?>

<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="row">
        <div class="col-12 text-center my-5">
            <p class="display-4 text-dark ">SuperMarket</p>
        </div>
        <div class="col-6 offset-3">
            <form method="POST">
                <div class="form-group">
                    <label for="exampleInputEmail1">User Name</label>
                    <input type="text" class="form-control" name="username" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo (isset($_POST['username']) ?  $_POST['username'] : '') ?>">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">City</label>
                    <select name="city" id="" class="form-control">
                        <option <?php if (isset($_POST['city']) and $_POST['city'] == 'Cairo') {
                                    echo "selected";
                                } ?> value="Cairo">Cairo</option>
                        <option <?php if (isset($_POST['city']) and $_POST['city'] == 'Alex') {
                                    echo "selected";
                                } ?> value="Alex">Alex</option>
                        <option <?php if (isset($_POST['city']) and $_POST['city'] == 'Giza') {
                                    echo "selected";
                                } ?> value="Giza">Giza</option>
                        <option <?php if (isset($_POST['city']) and $_POST['city'] == 'Others') {
                                    echo "selected";
                                } ?> value="Others">Others</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Enter Products Number</label>
                    <input type="number" name="productsNo" class="form-control" id="exampleInputPassword1" value="<?php echo (isset($_POST['productsNo']) ?  $_POST['productsNo'] : '') ?>">
                    <!--   -->
                </div>
                <button type="submit" name="productsCount" class="btn btn-dark form-control">Enter Products</button>
                <?php
                if (isset($table)) {
                    echo $table;
                }

                if (isset($bill)) {
                    echo $bill;
                }
                ?>



            </form>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>