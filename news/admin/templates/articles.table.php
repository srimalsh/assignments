
<?php if(!$isEditMode): ?>

<div class="table-wrapper-generic">
    <table>
        <tr>
            <th>Name</th>
            <th>Contact</th>
            <th>Country</th>
            <th>Action</th>
        </tr>

        <?php 

            if(is_array($dataArray)):

                foreach($dataArray as $k=>$row):

                    //print_r($row);

        ?>
     
        <tr>
            <td><a href="articles.php?action=edit&id=<?=$row['articleID'];?>" class="cool"><?=$row['title'];?></a></td>
            <td><?=$row['subTitle'];?></td>
            <td><?=$row['category'];?></td>
            <td><a href="#" class="warn">Delete</a></td>
        </tr>
        
        <?php
                endforeach;
            else:
        ?>

        <tr>
            <td colspan="4">No Data Available Yet</td>
        </tr>

        <?php
            endif;
        ?>
    </table>
</div>

<?php endif; ?>
