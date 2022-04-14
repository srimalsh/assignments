
<div class="table-wrapper-generic">
    <table>
        <tr>
            <th>Name</th>
            <th>Contact</th>
            <th>Country</th>
            <th>Action</th>
        </tr>

        <?php 

            if($tableData):

                foreach($tableData as $k=>$row):

        ?>
     
        <tr>
            <td><a href="#" class="cool"><?=$row['title'];?></a></td>
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
