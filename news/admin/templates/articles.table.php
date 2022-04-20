<div class="content-header">
<form action="articles.php" method="get">
<input type="hidden" name="action" value="filter">
<label>From : </label>
<input type="date" id="searchFrom" name="searchFrom" value="<?= isset($_GET['searchFrom']) ? $_GET['searchFrom'] : '';?>">

<label>To : </label>
<input type="date" id="searchTo" name="searchTo" value="<?= isset($_GET['searchTo']) ? $_GET['searchTo'] : '';?>">

<input type="submit" class="btn-1" value="Filter" >

<?php if($_GET['searchFrom']!='' || $_GET['searchTo']!='') : ?>
<a class="btn-2" href="articles.php">Reset Filter</a>
<?php endif; ?>

</form>
</div>



<?php if(!$isEditMode): ?>

<div class="content-box">
    <div class="table-wrapper-generic">
        <table>
            <tr>
                <th>Title</th>
                <th>Sub Title</th>
                <th>Category</th>
                <th>Published Date</th>
                <th>Actions</th>
            </tr>

            <?php 

            if(is_array($dataArray)):

                foreach($dataArray as $k=>$row):

                    //print_r($row);

        ?>

            <tr>
                <td><a href="articles.php?action=edit&id=<?=$row['articleID'];?>" class="cool"><?=$row['title'];?></a>
                </td>
                <td><?=$row['subTitle'];?></td>
                <td>abc</td>
                <td><?= date("Y-m-d",strtotime($row['publishedDate'])); ?></td>
                <td><a href="#" class="warn deleteRaw" rowid="<?=$row['articleID'];?>">Delete</a></td>
            </tr>

            <?php
                endforeach;
            else:
        ?>

            <tr>
                <td colspan="5">No Data Available Yet</td>
            </tr>

            <?php
            endif;
        ?>
        </table>

        <!-- <br/><br/>
    <div class="content-header" id="responseHolder">asdasdasd</div> -->

    </div>
</div>

<?php endif; ?>