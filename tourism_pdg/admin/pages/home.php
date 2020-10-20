<div class="col-sm-12">  <!-- menampilkan list mosque-->
    <section class="panel">
        <div class="panel-body">
            <!-- <a href="?page=tourism_add" title="Add Tourism" class="btn btn-compose" style="background-color: #26a69a"><i class="fa fa-plus"></i>Add Tourism</a> -->
            <h2 style="background-color: white; color: #26a69a; font-family: arial"><i class="fa fa-bars"></i><b> List Tourism</b></h2>
            <br>

            <div class="box-body">
                <div class="form-group">
                    <table id="example2" class="table table-hover table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                        <?php                       
                            $sql = mysqli_query($conn, "SELECT * FROM tourism order by id ASC");
                            while($data =  mysqli_fetch_array($sql)){
                            $id = $data['id'];
                            $nama = $data['name'];
                            $alamat = $data['address'];
                        ?>
                        <tr>
                            <td><?php echo "$id"; ?></td>
                            <td><?php echo "$nama"; ?></td>
                            <td><?php echo "$alamat"; ?></td>
                            <td>
                                <div class="btn-group">
            						<a href="?page=tourism_detail&id=<?php echo $id; ?>" title="Detail" class="btn btn-sm btn-default" style="background-color: #2ad636; color: white" ><i class="fa fa-list"></i> </a>
                                </div>
                                <div class="btn-group">
                                    <a data-href="act/tourism_delete.php?id=<?php echo $id; ?>" title="Delete" data-toggle="modal" data-target="#confirm-delete" class="btn btn-sm btn-default" style="background-color: #e15b5b; color: white" onclick="modalDelete(this.getAttribute('data-href'));"><i class="fa fa-trash-o"></i> </a>
                                </div>                                                                    
                            </td>
                        </tr>
                        <?php } ?>
                        </tbody>    
                    </table> 

                    <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div style="background-color: #26a69a" class="modal-header">
                                    <h4 style="color: white">Confirm Delete</h4>
                                </div>
                                <div class="modal-body">
                                    <span>Do you want to delete this data ?</span>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                    <a id="delete_mod" class="btn btn-danger btn-ok">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                   
            </div>
        </div>
    </section>
</div>

<script>
    function modalDelete(hrev){
        // console.log(hrev);
        document.getElementById('delete_mod').setAttribute("href", hrev);
    }
    $(document).ready(function() {
        $('#confirm-delete').on('show.bs.modal', function(e) {
            // $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
            //console.log('gue');
        });
    });
</script>

<!-- TOMBOL ADD DI ADMIN (FLOATING BUTTON) -->
<a href="?page=tourism_add" title="Add Tourism" style="color: white" class="act-btn">
    +
</a>