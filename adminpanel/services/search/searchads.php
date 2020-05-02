 <table class="table text-center table-dark table-hover table-bordered table-striped table-sm ">
     <thead class="thead-dark">
         <tr>
             <th>Number</th>
             <th>Website</th>
             <th>Clicks</th>
             <th>Status</th>
             <th>options</th>
         </tr>
     </thead>
     <tbody id="tablebody">
         <?php
            $limit = 8;
            require "./../connection.php";


            if ($_POST['query'])
                $searchText = mysqli_escape_string($connection, $_POST['query']);
            else
                $searchText = '';

            $allDocsQuery = "SELECT * FROM  advertisement  WHERE 
                    website LIKE '%$searchText%' ORDER BY date DESC";

            $resultAllDocs = mysqli_query($connection, $allDocsQuery);
            $totalDocs = mysqli_num_rows($resultAllDocs);
            $pages = ceil($totalDocs / $limit);
            $page = isset($_GET['page']) ? $_GET['page'] : $page = 1;

            if ($page > $pages || $page <= 0 || !is_numeric($page))
                $page = 1;

            $start = ($page - 1) * $limit;

            $query = "SELECT * FROM  advertisement  WHERE 
                    website LIKE '%$searchText%' ORDER BY date DESC LIMIT $start , $limit";

            $result = mysqli_query($connection, $query);
            $count = (($page - 1) * $limit);

            if ($totalDocs > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    $count++;
            ?>
                 <tr>
                     <td><?php echo $count; ?></td>
                     <td>
                         <a class="text-white" href="<?php echo $row['website']; ?>">
                             <?php echo $row['website']; ?>
                         </a>
                     </td>
                     <td>
                         <?php echo $row['clicks']; ?>
                     </td>
                     <td>
                         <?php if ($row['isActive'] == 1) { ?>
                             Active
                         <?php } else { ?>
                             Not Active
                         <?php } ?>
                     </td>
                     <td>
                         <a href="./addad.php?id=<?php echo $row['id']; ?>">
                             <img src="./../../assets/icons/pencil.png" />
                         </a>
                         <a href="./adsdetails.php?id=<?php echo $row['id']; ?>">
                             <img src="./../../assets/icons/eye.png" />
                         </a>
                         <a href="./../../usersfunctionality/deleteads.php?id=<?php echo $row['id']; ?>">
                             <img src="./../../assets/icons/rubbish.png" />
                         </a>
                     </td>
                 </tr>
             <?php
                }
            } else { ?>
             <tr>
                 <td colspan="5">No Records .</td>
             </tr>
         <?php } ?>
     </tbody>
 </table>
 <?php if ($pages > 0) { ?>
     <nav aria-label="Page navigation d-flex justify-content-end example">
         <ul class="pagination">
             <li class="page-item">
                 <a class="page-link" href="./allnews?page=<?php if ($page <= 1) echo  1;
                                                            else echo $page - 1 ?>" aria-label="Previous">
                     <span aria-hidden="true">&laquo;</span>
                     <span class="sr-only">Previous</span>
                 </a>
             </li>
             <?php
                for ($i = 0; $i < $pages; $i++) {
                ?>
                 <li class="page-item">
                     <a class="page-link" href="./allnews?page=<?php echo $i + 1 ?>">
                         <?php echo $i + 1 ?>
                     </a>
                 </li>
             <?php } ?>
             <li class="page-item ">
                 <a class="page-link" href="./allnews?page=<?php if ($page >= $pages) echo  1;
                                                            else echo $page + 1 ?>" aria-label="Next">
                     <span aria-hidden="true">&raquo;</span>
                     <span class="sr-only">Next</span>
                 </a>
             </li>
         </ul>
     </nav>
 <?php } ?>