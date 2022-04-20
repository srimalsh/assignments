<!-- <div class="content-header">
    <input type="button" id="addbtn" class="btn-2" value="Add New +">
    <h3>Manage Articles</h3>
</div> -->

<div class="content-header">
    <?php if($isEditMode): ?>
        <h3><?=$dataArray['title'];?></h3>
    <?php else: ?>
        <h3>Add New User</h3>
    <?php endif; ?>
</div>

<div class="content-box">
    <div class="form-wrapper-generic">

        <form action="#" id="testForm" method="post" enctype="multipart/form-data">
            <input type="hidden" name="service" value="saveUser">
            <input type="hidden" name="id" value="<?= isset($dataArray['userID']) ? $dataArray['userID'] : 0;?>">            

            <label for="displayname">Display Name:</label><br>
            <input type="text" id="displayname" name="displayname" class="width-half" value="<?= isset($dataArray['displayname']) ? $dataArray['displayname'] : '';?>"><br>

            <label for="username">Email:</label><br>
            <input type="text" id="username" name="username" class="width-half" value="<?= isset($dataArray['username']) ? $dataArray['username'] : '';?>"><br>

            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" class="width-half"><br>
            
            <label for="passwordConfirm">Confirm Password:</label><br>
            <input type="password" id="passwordConfirm" name="passwordConfirm" class="width-half"><br>

            <label for="passwordConfirm">User Type:</label><br>
            <select class="width-half" name="userType">
                <option>Admin</option>
                <option>Editor</option>
            </select>

            <br>
            
            <input type="submit" value="Save User">

            <a href="users.php" class="btn-2">Go Back</a>
        </form>

        <div class="content-header" id="responseHolder">
        </div>
    </div>
</div>

<? //isset($dataArray['articleContent']) ? htmlspecialchars($dataArray['articleContent']) : ''; ?>