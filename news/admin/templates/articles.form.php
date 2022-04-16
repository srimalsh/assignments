<div class="content-header">
    <h3>This is form Title</h3>
</div>

<div class="content-header">
    <input type="button" id="addbtn" class="btn-2" value="Add New +">
</div>

<div class="content-box">
    <div class="form-wrapper-generic">

        <form action="#" id="testForm" method="post" enctype="multipart/form-data">
            <input type="hidden" name="service" value="saveNews">
            <input type="hidden" name="id" value="<?= isset($dataArray['articleID']) ? $dataArray['articleID'] : 0;?>">

            <div class="form-wrapper-inner">
                <label for="headImage" class="custom-file-upload">
                    Upload Header Image
                </label>
                <input id="headImage" name="headImage" type="file" />
                <span id="fileInfo"></span>
            </div><br>

            <label for="title">First name:</label><br>
            <input type="text" id="title" name="title" value="<?= isset($dataArray['title']) ? $dataArray['title'] : '';?>"><br>
            <label for="subTitle">Last name:</label><br>
            <input type="text" id="subTitle" name="subTitle" value="<?= isset($dataArray['subTitle']) ? $dataArray['subTitle'] : '';?>"><br>
            <label for="articleContent">Editor:</label><br><br>
            <textarea name="articleContent" id="editor">
                    <!-- &lt;p&gt;This is some sample content.&lt;/p&gt;               -->
                    <?= isset($dataArray['articleContent']) ? htmlspecialchars($dataArray['articleContent']) : ''; ?>
            </textarea>
            <br>
            <input type="submit" value="Submit">
        </form>

        <div class="content-header" id="responseHolder">
        </div>
    </div>
</div>

<? //isset($dataArray['articleContent']) ? htmlspecialchars($dataArray['articleContent']) : ''; ?>