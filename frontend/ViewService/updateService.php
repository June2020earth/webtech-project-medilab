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
<?php

if(isset($_GET['serviceID']))
{
    $sid=$_GET['serviceID'];
    ?><table>
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
                        if($key==$sid)
                        {?>
                            <tr>
                            <form id="updateService" onsubmit="updateService(event);">
                            <tr>
                                <td><?=$i++;?></td>
                                <input type="text" name="sname" id="origkey" value="<?=$row['name'];?>" hidden>
                                <td><input type="text" name="sname" id="sname" value="<?=$row['name'];?>"></td>
                                <td><input name="sdes" id="sdes" value="<?=$row['description'];?>"></input></td>
                                <td><input type="text" name="icn" id="icn" value="<?=$row['icon']?>"></td>
                                <td>Display</td>
                                <td><input type='submit' value="save"></td>
                            </form>
                            <form action="viewService.php">
                                <td><input type='submit' value="Cancel"></td>
                            </form>
                            </tr>
                        <?php } else { ?>
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
                }
                else{
                    ?>
                        <tr>
                            <td>No Record Found</td>
                        </tr>
                    <?php
                }}
            ?></table>