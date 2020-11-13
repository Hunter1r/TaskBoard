<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Title</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="../validation.js" ></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-between">
    <a class="navbar-brand" href="../index.php">To do list</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link active" href="../index.php">Home <span class="sr-only">(current)</span></a>
            </div>
    </div>
    <form action="../index.php" method="GET" class="form-inline">
        <button class="btn btn-outline-success mr-sm-2" type="submit" name="act" value="addTask">Add task</button>
        <?php if (isset($_COOKIE['name'])):?>
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="act" value="logout">Log out (<?=$_COOKIE['name']?>)</button>
        <?php else:?>
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="act" value="authorize">Authorize</button>
        <?php endif;?>
    </form>

</nav>

<div class="alert alert-success alert-dismissible fade show <?= $alertSuccess==0 ? "d-none" : ($alertSuccess==1 ? "" : "d-none") ?>" role="alert">
    Task is created.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<div class="alert alert-warning alert-dismissible fade show <?= $alertSuccess==2 ? "" : "d-none" ?>" role="alert">
    Task is not created.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<?=$content?>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="../jquery.js"></script>
<script src="../script.js"></script>
</body>
</html>