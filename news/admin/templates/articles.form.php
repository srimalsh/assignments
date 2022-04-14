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
            <div class="form-wrapper-inner">
                <label for="headImage" class="custom-file-upload">
                    Upload Header Image
                </label>
                <input id="headImage" name="headImage" type="file" />
                <span id="fileInfo"></span>
            </div><br>

            <label for="title">First name:</label><br>
            <input type="text" id="title" name="title" value="John"><br>
            <label for="subTitle">Last name:</label><br>
            <input type="text" id="subTitle" name="subTitle" value="Doe"><br>
            <label for="articleContent">Editor:</label><br><br>
            <textarea name="articleContent" id="editor">
                            &lt;p&gt;This is some sample content.&lt;/p&gt;
                        </textarea>
            <br>
            <input type="submit" value="Submit">
        </form>

        <div class="content-header" id="responseHolder">
        </div>
    </div>
</div>