

<h1><?=$title?></h1>

<div class="container-fluid">

    <form class="needs-validation" novalidate method="post" action="../index.php">
        <div class="form-group">
            <label for="exampleInputName">Name</label>
            <input type="text" name="task[name]" class="form-control" id="exampleInputName" placeholder="Enter your name" required>
            <div class="valid-feedback">
                Ok!
            </div>
            <div class="invalid-feedback">
                Please input your Name
            </div>
        </div>


        <div class="form-group">
            <label for="exampleInputEmail1">E-mail</label>
            <input type="email" name="task[mail]" class="form-control" id="exampleInputEmail1" placeholder="Enter your email" required>
            <div class="valid-feedback">
                Ok!
            </div>
            <div class="invalid-feedback">
                Please input your E-mail
            </div>
        </div>

        <div class="form-group">
            <label for="exampleFormControlTextarea1">Task</label>
            <textarea class="form-control" name="task[text]" id="exampleFormControlTextarea1" rows="3" placeholder="Task description" required></textarea>
            <div class="valid-feedback">
                Ok!
            </div>
            <div class="invalid-feedback">
                Please input task description
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>


</div>
