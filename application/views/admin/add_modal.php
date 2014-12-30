<!-- BEGIN MODAL TO ADD MAIN IMG EDITORIAL-->
<div class="modal fade" id="myModal5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Main Img</h4>
      </div>
      <div class="modal-body">
      <h1>Upload File</h1>
   <form method="post" action="" id="upload_files">
        <label for="title">Title</label>

        <input type="text" name="title" id="title" value="" />
 
        <label for="userfile">File</label>
        <input type="file" name="userfile" id="userfile" size="20" />
 
        <input type="hidden" name="type" id="type" value="1">
        <input type="hidden" name="id_type" id="id_type" value="<?php echo $editorial['id_edito']; ?>">
        <input type="text" name="id_photographer" id="id_photographer" value="<?php echo $editorial['id_ph']; ?>">
        <input type="hidden" name="main" id="main" value="1"> 
       
       
        <input type="submit" name="submit" id="submit" />
    </form>
   
      </div>
       
    </div>
  </div>
</div>
<!-- END MODAL TO ADD MAIN IMG EDITO-->
<!-- BEGIN MODAL TO ADD OTHER IMG EDITORIAL-->
<!--<div class="modal fade" id="myModal6" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Other Img</h4>
      </div>
      <div class="modal-body">
      <h1>Upload File</h1>
   <form method="post" action="" id="upload_files_other">
        <label for="title">Title</label>
        
        <input type="text" name="title" id="title" value="" />
 
        <label for="userfile">File</label>
        <input type="file" name="userfile" id="userfile" size="20" />
 
        <input type="hidden" name="type" id="type" value="1">
        <input type="hidden" name="id_type" id="id_type" value="<?php echo $editorial['id_edito']; ?>">
        <input type="text" name="id_photographer" id="id_photographer" value="<?php echo $editorial['id_ph']; ?>">
        <input type="hidden" name="main" id="main" value="0"> 
       
       
        <input type="submit" name="submit" id="submit" />
    </form>

   
      </div>
       
    </div>
  </div>
</div>-->
<!-- END MODAL TO ADD MAIN IMG EDITO-->
<!-- BEGIN MODAL TO ADD PHOTOTGRAPHER-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Photographer</h4>
      </div>
      <div class="modal-body">
        <?php echo validation_errors(); 
        $attributes = array('class' => 'form-horizontal');
        echo form_open('photographer/add_photographer',$attributes); ?>
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
          <div class="col-sm-10">
            <input type="text" size="20" id="name" name="name" class="form-control"/>
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Website</label>
          <div class="col-sm-10">
            <input type="text" size="20" id="website" name="website" class="form-control"/>
          </div>
        </div>
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class=" btn btn-default">Add Photographer</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- END MODAL TO ADD PHOTOTGRAPHER-->
<!-- BEGIN MODAL TO ADD EDITORIAL-->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Editorial</h4>
      </div>
      <div class="modal-body">
        <?php echo validation_errors(); 
        $attributes = array('class' => 'form-horizontal');
        echo form_open('editorial/add_editorial',$attributes); ?>
          name <br> 
          <input type="text" name="name" id="name"><br>
          Photographer <br>
          <select name="id_ph" id="id_ph">

            <option></option>
          </select>
          Hair <br>
          <input type="text" name="hair" id="hair"><br>
          MAke up<br>
          <input type="text" name="makeup" id="makeup"><br>
          Autre <br>
          <input type="text" name="autre" id="autre"><br>
          date <br>
          <input type="text" name="date" id="date"><br><br>   
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class=" btn btn-default">Add Editorial</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- END MODAL TO ADD EDITORIAL-->
<!-- BEGIN MODAL TO ADD CAMPAIGN-->
<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Campaign</h4>
      </div>
      <div class="modal-body">
        <form>
          name <br> 
          <input type="text" name="name" id="name"><br>
          websitz <br>
          <input type="text" name="website" id="website"> <br><br>
          <button type="submit" class=" btn btn-default">Add Campaign</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class=" btn btn-default">Add Campaign</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- END MODAL TO ADD CAMPAIGN-->
<!-- BEGIN MODAL TO ADD IMG-->
<div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Img</h4>
      </div>
      <div class="modal-body">
      <h1>Upload File</h1>
    <form method="post" action="" id="upload_file">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" value="" />
 
        <label for="userfile">File</label>
        <input type="file" name="userfile" id="userfile" size="20" />
 
         <label for="type">Type</label>
          <select name="type" id="type">
            <option value="1">edito</option>
            <option value="2">campaign</option>
            <option value="3">test</option>
            <option value="4">autre</option>
          </select>
         <br>
        <label for="id_type" >
              Select the title attach to
        </label>
        <select name="id_type" id="id_type"></select>
        if its not in the fiels over add it on the form below
       
       
        <input type="submit" name="submit" id="submit" />
    </form>
    <h2>Files</h2>
    <div id="files"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- END MODAL TO ADD IMG-->