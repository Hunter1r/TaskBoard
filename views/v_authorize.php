
<h1><?=$title?></h1>

<div class="alert alert-danger alert-dismissible fade show <?= $alertSuccess==3 ? "" : "d-none"  ?>" role="alert">
    Name user or password incorrect.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<div class="container-fluid">

    <form action="../index.php" method="POST">
        <div class="form-group">
            <label for="exampleInputName">Name</label>
            <input name="login" type="text" class="form-control" id="exampleInputName" placeholder="Put on your name">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword">Password</label>
            <input name="pass" type="password" class="form-control" id="exampleInputPassword" placeholder="Password">
        </div>
        <nav class="nav justify-content-end">
        <button type="submit" class="btn btn-primary">Log in</button>
        </nav>
    </form>

</div>


