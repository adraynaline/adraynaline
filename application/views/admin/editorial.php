<nav id="myNavbar" class="navbar navbar-default" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">ADMINISTRATION</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="<?php echo base_url(); ?>adminhome">Home</a></li>
                    <li><a href="<?php echo base_url(); ?>profile">Profile</a></li>
                    <li><a href="<?php echo base_url(); ?>editorial">Editorials</a></li>
                    <li><a href="<?php echo base_url(); ?>campaign">Campaigns</a></li>
                    <li><a href="<?php echo base_url(); ?>test">Tests</a></li>
                    <li><a href="<?php echo base_url(); ?>autre">Autres</a></li>
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle"><?php echo $username; ?> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="manageadmin">Manage admin</a></li>
                            <li><a href="#"></a></li>
                            <li><a href="#"></a></li>
                            <li class="divider"></li>
                            <li><a href="#"></a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle"> QUICK ADD <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">ADD PHOTOGRAPHER </button></li>
                            <li><button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal2">ADD EDITORIAL</button></li>
                            <li><button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal3">ADD CAMPAIGN</button></li>
                            <li><button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal4">ADD IMG</button></li>
                            <li class="divider"></li>
                            
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div>
    </nav>


<?php 
if ($this->session->flashdata('result') != ''): 
  echo '<p id="mr">';
    echo $this->session->flashdata('result'); 
    echo '</p>';
endif;
 ?>


 <?php echo validation_errors(); 
        $attributes = array('class' => 'form-horizontal');
        echo form_open('editorial/add_editorial',$attributes); ?>
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Name Mag</label>
          <div class="col-sm-10">
            <input type="text" size="20" id="name_edito" name="name_edito" class="form-control"/>
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Name Edito</label>
          <div class="col-sm-10">
            <input type="text" size="20" id="name_serie" name="name_serie" class="form-control"/>
          </div>
        </div>
        <div class="form-group">  
          <label for="inputEmail3" class="col-sm-2 control-label">Photographer</label>
          <div class="col-sm-10">         
            <select id="id_ph" name="id_ph" class="form-control">
              <?php foreach($ph  as $p): ?>
              <option value="<?php echo $p->id; ?>"><?php echo $p->name_ph; ?></option>
            <?php endforeach; ?>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Hair</label>
          <div class="col-sm-10">
            <input type="text" size="20" id="hair" name="hair" class="form-control"/>
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Make up</label>
          <div class="col-sm-10">
            <input type="text" size="20" id="makeup" name="makeup" class="form-control"/>
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Autres</label>
          <div class="col-sm-10">
            <textarea type="text" size="20" id="autres" name="autres" class="form-control"></textarea>
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Published date</label>
          <div class="col-sm-10">
            <input type="date" max="2010-01-00" min="2011-08-13" name="date_publication">
          </div>
        </div>
      </div>
     
      <button type="submit" class=" btn btn-default">Add Editorial</button>
      </form>

  <br/>
  <div class="table-responsive">

      <table class="table">
        <tr>
          <td>ID</td>
          <td>Name</td>
          <td>Photographer</td>
          <td>Hair</td>
          <td>Mzake Up</td>
          <td>Show</td>
          <td>Edit</td>
          
          <td>Delete</td>
         
        </tr>
        <?php foreach($editorial  as $edito): ?>
        <tr>
          <td><?php echo $edito->id_edito; ?><input type="hidden" id="id_edito" value="<?php echo $edito->id_edito; ?>"></td>
          <td><?php echo $edito->name_edito; ?></td>
          <td><?php echo $edito->id_ph; ?><input type="hidden" id="id_ph" value="<?php echo $edito->id_ph; ?>"></td>
          <td><?php echo $edito->hair; ?></td>
          <td><?php echo $edito->makeup; ?></td>
          <td><button class="btn btn-default"><a href='editorial/show/<?php echo $edito->id_edito; ?>'>Show</a></td>
          <td><button class="btn btn-default"><a href='photographer/edit/<?php echo $p->id; ?>'>Edit</a></button></td>
          
          <td>
            <button class="btn btn-default">
              <?php 
                echo anchor('editorial/delete/'.$edito->id_edito, 'Delete', array('onClick' => "return confirm('Are you sure you want to delete?')"));
              ?>
            </button>
          </td>
        </tr>       
        <?php endforeach; ?>
      </table>
    </div>




