<?php
// $_POST superglobal assoiciative array
// "",0,[],object[],null,false


// if($_POST){
//     // true if the array has data 
// }

// if($_POST['firstNumber']){
//     // has any data except restrictions
// }

// if(empty($_POST)){
//     // if $_POST is empty
// }

// if(!empty($_POST)){
//     // if $_POST has data 
// }

// if(isset($_POST)){
//    // ifaya bla hadf 
// }

// if(isset($_POST['firstNumber'])){
//     // check if key is exists or not in the current array
// }


// if($x){
//     // if has any data except res
// }

// if(isset($x)){
//     // if x is defiend and has any value;
// }



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
<?php
if(isset($_POST['operation'])){
$errors = [];
if(!$_POST['firstNumber']){
    $errors['firstNumber'] = "<div class='alert alert-danger'> First number is required </div>";
}

if(!$_POST['secondNumber']){
    $errors['secondNumber']= "<div class='alert alert-danger'> Second number is required </div>";
}

function cal ($firstNumber,$secondNumber,$operation){
    switch($operation){
        case '+': 
            return $firstNumber + $secondNumber;
            break;
        case '-':
            return $firstNumber - $secondNumber;
            break;
        case '*':
            return $firstNumber * $secondNumber;
            break;
        case '/':
            return $firstNumber / $secondNumber;
            break;
        default:
            return 'this operation is not supported';
    }
}

$result = cal($_POST['firstNumber'],$_POST['secondNumber'],$_POST['operation']);

}

if(isset($_POST['cancel'])){
    $msg = "<div class='alert alert-danger'> Your Operation is Cancelled </div>";
}

?>
<body>
    <div class="row  my-5">
        <div class="col-12 text-center text-dark">
            <p class="display-4"> HTML Froms </p>
        </div>
        <div class=" offset-4 col-4">
            <div>
                <form method="POST">
                    <div class="form-group">
                        <label for="exampleInputEmail1">First Number</label>
                        <input type="number" name="firstNumber" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php if(isset($_POST['firstNumber'])){echo $_POST['firstNumber'];} ?>">
                    </div>
                    <div class="form-group">
                        <?php 
                            if(isset($errors['firstNumber'])){
                                echo $errors['firstNumber'];
                            }
                        ?>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Second Number</label>
                        <input type="number" name="secondNumber" class="form-control" id="exampleInputPassword1" value="<?php echo(isset($_POST['secondNumber']) ? $_POST['secondNumber'] : "") ?>">
                    </div>
                    <div class="form-group">
                        <?php
                            
                            if(isset($errors['secondNumber'])){
                                echo $errors['secondNumber'];
                            }
                        ?>
                    </div>

                    <button type="submit" name="operation" value="+" class="btn btn-primary rounded  w-25"> + </button>
                    <button type="submit" name="operation" value="-" class="btn btn-danger rounded  w-25"> - </button>
                    <button type="submit" name="operation" value="/" class="btn btn-warning rounded w-25"> / </button>
                    <button type="submit" name="operation" value="*" class="btn btn-dark rounded w-25"> * </button>
                    <button type="submit" name="cancel" value="cancel" class="btn btn-success"> Cancel</button>
                </form>

            </div>
        </div>
        <div class="offset-4 col-4">
            <?php if(isset($result)) { ?>
                   <div class="alert alert-success text-center">
                        <?php echo $result ?>
                    </div> 
            <?php } 
                if(isset($msg)){
                    echo $msg;
                }
            ?>

        </div>
        
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>