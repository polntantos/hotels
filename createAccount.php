<div>
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
        <form action="createUser.php" method="POST">
            <label for="inputEmail1" class="form-label">Name</label>
            <div class="mb-3">
                <input class="form-control" id="fname" type="text" name="fname" value="" />
            </div>
            <label for="inputEmail1" class="form-label">Last Name</label>
            <div class="mb-3">
                <input class="form-control" id="lname" type="text" name="lname" value="" />
            </div>
            <label for="inputEmail1" class="form-label">Email</label>
            <div class="mb-3">
                <input class="form-control" id="email" type="email" name="email" value="" />
            </div>
            <label for="inputEmail1" class="form-label">Password</label>
            <div class="mb-3">
                <input class="form-control" id="passwd" type="password" name="passwd" value="" />
            </div>
            <label for="inputEmail1" class="form-label">Confirm Password</label>
            <div class="mb-3">
                <input class="form-control" id="confirmpswd" type="password" name="confirmpswd" value="" />
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
            <a href="index.php?page=createAccount.php"> or Login</a>
        </form>
    </div>
</div>