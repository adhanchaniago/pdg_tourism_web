<div class="col-sm-12">  <!-- menampilkan fasilitas-->
    <section class="panel">
        <div class="panel-body">
           <!--  <?php 
            $sql = mysqli_query($conn, "SELECT * FROM admin where username='$username'");
            $data = mysqli_fetch_array($sql); 

                if($data['role']=='P') { ?>
                    <a href="?page=user_add" class="btn btn-compose" title="Add Facility"><i class="fa fa-plus"></i>List </a>
                <?php 
                }     

            ?> --> 
<!--             <a href="?page=user_add" class="btn btn-compose" style="background-color: #26a69a" title="Add Facility"><i class="fa fa-plus"></i>List User</a> -->

            <h2 style="background-color: white; color: #26a69a; font-family: arial"><i class="fa fa-users"></i><b> List User</b></h2>
            <br>

            <div class="box-body">
                <div class="form-group">
                    <table id="example3" class="table table-hover table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>Name</th>
                                <th>Periode</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                        <?php
                            $sql = mysqli_query($conn, "SELECT name , stewardship_period, username from admin");
                            while($data =  mysqli_fetch_array($sql)){
                            //$id = $data['id'];
                            $username = $data['username'];
                            $nama = $data['name'];
                            $periode = $data['stewardship_period'];
                        ?>
                            <tr>
                                <td><?php echo "$username"; ?></td>
                                <td><?php echo "$nama"; ?></td>
                                <td><?php echo "$periode"; ?></td>
                                <td>
                                    <div class="btn-group">
                                        <a href="?page=user_update&username=<?php echo $username; ?>" class="btn btn-sm btn-default" style="background-color: #2ad636; color: white"title='Update'><i class="fa fa-edit"></i></a>
                            		</div>

                                    <div class="btn-group">
                                        <a data-href="act/delete_user.php?id=<?php echo $username; ?>" data-toggle="modal" data-target="#confirm-delete" class="btn btn-sm btn-default" style="background-color: #e15b5b; color: white" onclick="modalDelete(this.getAttribute('data-href'));" title='Delete'><i class="fa fa-trash-o"></i></a>
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

<script src="/../../assets/js/jquery.js"></script>
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
<a href="?page=user_add" title="Add Tourism" style="color: white" class="act-btn">
    +
</a>