<div class="col-sm-12">
    <section class="panel">
        <div class="panel-body">
            <!-- <a href="?page=event_add" title="Add Tourism" class="btn btn-compose" style="background-color: #26a69a"><i class="fa fa-plus"></i>Event Tourism</a> -->
            <h2 style="background-color: white; color: #26a69a; font-family: arial"><i class="fa fa-calendar"></i> <b>Event Tourism</b></h2>
            <br>

            <div class="box-body">
                <div class="form-group">
                    <table id="example2" class="table table-hover table-bordered table-striped">
                        <thead>
                            <tr >
                                <th style="text-align: left;">ID</th>
                                <!-- <th style="text-align: left;">Tourism ID</th> -->
                                <th style="text-align: left;">Tourism Name</th>
                                <th style="text-align: left;">Event</th>
                                <th style="text-align: left;">Date</th>
                                <!-- <th style="text-align: center;">Images</th> -->
                                <th style="text-align: left;">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php                       
                                $sql = mysqli_query($conn, "SELECT event_tourism.id_event ,event_tourism.tourism_id, event_tourism.nama_event, event_tourism.date_start, event_tourism.date_end, event_tourism.description, event_tourism.contact_person, tourism.name AS tourism_name 
                                        FROM event_tourism LEFT JOIN tourism ON tourism.id = event_tourism.tourism_id ORDER BY date_start ASC");

                                    while($data =  mysqli_fetch_array($sql))
                                    {
                                        $id_event = $data['id_event'];
                                        $tourism_id = $data['tourism_id'];
                                        $tourism_name = $data['tourism_name'];
                                        $event = $data['nama_event'];
                                        $date = $data['date_start'];
                                        // $images = $data['images']; //UBAH JADI IMAGES
                                ?>
                                <tr>
                                    <td style="text-align: left;"><?php echo "$id_event"; ?></td>
                                    <!-- <td style="text-align: left;"><?php echo "$tourism_id"; ?></td> -->
                                    <td style="text-align: left;"><?php echo "$tourism_name";?></td>
                                    <td style="text-align: left;"><?php echo "$event"; ?></td>
                                    <td style="text-align: left;"><?php echo "$date"; ?></td>
                                    
                                    <td style="text-align: left;">
                                        <div class="btn-group">
                    						<a href="?page=event_detail&id_event=<?php echo $id_event; ?>" title="Update" class="btn btn-sm btn-default" style="background-color: #2ad636; color: white" ><i class="fa fa-list"></i> </a>
                                        </div>
                                        <div class="btn-group">
                                            <a data-href="act/event_delete.php?id_event=<?php echo $id_event; ?>" title="Delete" data-toggle="modal" data-target="#confirm-delete" class="btn btn-sm btn-default" style="background-color: #e15b5b; color: white" onclick="modalDelete(this.getAttribute('data-href'));" ><i class="fa fa-trash-o"></i> </a>
                                        </div>                                                                    
                                    </td>
                                </tr>

                            <?php
                                } 
                            ?>
                            
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
<a href="?page=event_add" title="Add Tourism" style="color: white" class="act-btn">
    +
</a>