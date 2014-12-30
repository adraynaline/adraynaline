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
                    <li><a href="adminhome">Home</a></li>
                    <li><a href="profile">Profile</a></li>
                    <li><a href="editorial">Editorials</a></li>
                    <li><a href="campaign">Campaigns</a></li>
                    <li><a href="test">Tests</a></li>
                    <li><a href="autre">Autres</a></li>
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
        echo form_open('photographer/add_photographer',$attributes); ?>
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
          <div class="col-sm-10">
            <input type="text" size="20" id="name_ph" name="name_ph" class="form-control"/>
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Website</label>
          <div class="col-sm-10">
            <input type="text" size="20" id="website" name="website" class="form-control"/>
          </div>
        </div>
          
      </div>
     
      <button type="submit" class=" btn btn-default">Add Photographer</button>
      </form>

  <br/>
  <div class="table-responsive">
      <table class="table">
        <tr>
          <td>Name</td>
          <td>Website</td>
          <td>Edit</td>
          <td>Delete</td>
         
        </tr>
        <?php foreach($phph  as $p): ?>
        <tr>
          <td><?php echo $p->name_ph; ?></td>
        <td><?php echo $p->website; ?></td>
        
        
        <td><button class="btn btn-default"><a href='photographer/edit/<?php echo $p->id; ?>'>Edit</a></button></td>
        <td>
          <button class="btn btn-default">
          <?php 
            echo anchor('photographer/delete/'.$p->id, 'Delete', array('onClick' => "return confirm('Are you sure you want to delete?')"));
          ?>
          </button>
        </td>
      </tr>

       
      <?php endforeach; ?>
      </table>
    </div>
  <table>



