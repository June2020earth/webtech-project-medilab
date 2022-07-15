<tite>
    <style>
        table{
            width:1000px;
            margin-left:-200px;
        }
         th, td {
                max-width:300px;
                word-wrap:break-word;
                text-align:center;
                padding:5px 20px 5px 20px;
                text-align:justify;
            }
           
        </style>
</title>
<script src="service.js"></script>

<table>
    <tr>
        <th>Service ID</th>
        <th>Service Name</th>
        <th>Service Description</th>
        <th>Icon Name<a href="previewService.php" style="font-size=3px;"> Preview</a></th>
        <th>Display</th>
    </tr>
    <?php
                include('../../api/public/dbcon.php');

                $ref_table="service";
                $fetchdata = $database->getReference($ref_table)->getValue();

                if($fetchdata > 0)
                {
                    $i=1;
                    foreach($fetchdata as $key=>$row)
                    {
                        ?>
                        <tr>
                            <td><?=$i++;?></td>
                            <td><?=$row['name']?></td>
                            <td><?=$row['description']?></td>
                            <td><?=$row['icon']?></td>
                            <td>Display</td>
                            <td><a href="viewService.php?Mode=update&serviceID=<?=$key?>">Edit service</a></p> </td>
                            <td><a href="deleteService.php?serviceID=<?=$key?>">Delete service</a></p> </td>
                        </tr>
                        <?php
                    }
                }
                else{
                    ?>
                        <tr>
                            <td>No Record Found</td>
                        </tr>
                    <?php
                }
            ?>
            <tr>
                <form id="serviceFormS" onsubmit="registerService(event);"> 

                <td></td>
                <td><input type="text" name="sname" id="sname"></td>
                <td><textarea name="sdes" id="sdes" placeholder="Enter description "></textarea></td>
                <td><input type="text" name="icn" id="icn" placeholder="Enter icon class name">
                <td><input type="submit" value="Add"></td>
                </form>
                
                <form action="viewService.php" onsubmit="registerService(event);">
                <td><input type="submit" value="cancel"></td>
                </form>
                <td>
                </td>
            </tr>

</table>
