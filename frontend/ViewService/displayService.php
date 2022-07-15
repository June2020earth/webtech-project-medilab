<head>
    <style>
        table{
            width:1000px;
            margin-left:-200px;
        }
         th, td {
                max-width:300px;
                word-wrap:break-word;
                text-align:left;
                padding:5px 20px 5px 20px;
                
            }
           
        </style>
</head>

          <table >
            <tr>
                <th>Service ID</th>
                <th>Service Name</th>
                <th>Service Description</th>
                <th>Icon Name <a href="previewService.php" style="font-size=3px;">preview</a></th>
                <th>Display</th>
            </tr>
            <tr>
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

              </tr>
                    <tr>
                        <td colspan="3"><a href="viewService.php?Mode=<?php echo "insert";?> ">Insert new service</a></td>
                </tr>
</table>

