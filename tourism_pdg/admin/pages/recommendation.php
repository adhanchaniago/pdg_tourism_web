<div class="col-sm-12">  <!-- menampilkan list mosque-->
    <section class="panel">
        <div class="panel-body">
            <!-- <a href="?page=tourism_add" title="Add Tourism" class="btn btn-compose" style="background-color: #26a69a"><i class="fa fa-plus"></i>Add Recommendation</a> -->

            <h2 style="background-color: white; color: #26a69a; font-family: arial"><i class="fa fa-image"></i><b> Recommendation</b></h2>
            <br>

            <div class="box-body">
                <div class="form-group">
                    <table id="example2" class="table table-hover table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tourism</th>
                                <th>Categories</th>
                                <th>Images</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                        <?php                       
                            $sql = mysqli_query($conn, "SELECT * FROM event order by id ASC");
                            while($data =  mysqli_fetch_array($sql)){
                            $id = $data['id'];
                            $tourism = $data['tourism'];
                            $kategori = $data['kategori'];
                            $image = $data['image'];
                        ?>
                        <tr>
                            <td><?php echo "$id"; ?></td>
                            <td><?php echo "$tourism"; ?></td>
                            <td><?php echo "$kategori"; ?></td>
                            <td><?php echo "$image"; ?></td>
                            <td>
                                <div class="btn-group">
            						<a href="?page=recommendation_detail&id=<?php echo $id; ?>" title="Detail" class="btn btn-sm btn-default" style="background-color: #2ad636; color: white" ><i class="fa fa-list"></i> </a>
                                </div>
                                <div class="btn-group">
                                    <a href="act/recommendation_delete.php?id=<?php echo $id; ?>" title="Delete" class="btn btn-sm btn-default" style="background-color: #e15b5b; color: white" ><i class="fa fa-trash-o"></i> </a>
                                </div>                                                                    
                            </td>
                        </tr>
                        <?php } ?>
                        </tbody>    
                    </table> 
                </div>                   
            </div>
        </div>
    </section>
</div>

<!-- TOMBOL ADD DI ADMIN (FLOATING BUTTON) -->
<a href="?page=tourism_add" title="Add Tourism" style="color: white" class="act-btn">
    +
</a>