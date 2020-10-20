<div class="col-sm-12"> <!-- menampilkan form add facility-->
  <section class="panel">
    <div class="panel-body">
      <!-- <a class="btn btn-compose" style="background-color: #26a69a">Add Facility</a> -->
      <h2 style="background-color: white; color: #26a69a; font-family: arial"><i class="fa fa-caret-square-o-down"></i> <b>Add Facility</b></h2>
      <br>

      <div class="box-body" >
        <form role="form" action="act/fasilitas_add.php" method="post">
          <a class="btn btn-default btn-sm" style="background-color: #2ad636; color: white" onclick="add()"><i class="fa fa-plus"></i></a>
          <a class="btn btn-default btn-sm" style="background-color: #e15b5b; color: white" onclick="rem()"><i class="fa fa-times"></i></a><br>
          <div class="form-group" style="clear:both" id="l_form">
            <br>
            <label for="nama_fasilitas">Facility</label>
            <input type="text" class="form-control" name="fasilitas[]" value="" style="margin-bottom:3px;" autofocus required>
          </div>
          <button type="submit" class="btn btn-primary pull-right" style=" color: white">Save <i class="fa fa-floppy-o"></i></button>
        </form>
      </div>
    </div>
  </section>
</div>