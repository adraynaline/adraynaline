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
                    <li><a href="photographer">Photographers</a></li>
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
        echo form_open('manageadmin/add_user',$attributes); ?>
    <div class="form-group">
      <label for="inputEmail3" class="col-sm-2 control-label">Username</label>
      <div class="col-sm-10">
        <input type="text" size="20" id="username" name="username" class="form-control"/>
      </div>
    </div>
    <div class="form-group">
      <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
      <div class="col-sm-10">
        <input type="password" size="20" id="passowrd" name="password" class="form-control"/>
      </div>
    </div>
    
    <div class="form-group">
      <label for="inputPassword3" class="col-sm-2 control-label">Mail</label>
      <div class="col-sm-10">
        <input type="mail" size="20" id="mail" name="mail" class="form-control"/>
      </div>
    </div>
     <div class="form-group">
      <label for="inputPassword3" class="col-sm-2 control-label">Master</label>
      <div class="col-sm-10">
        <select name="master" id="master">
          <option value="2486">YES</option>
          <option value="0">NO</option>
        </select>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Add</button>
      </div>
    </div>
  </form>

  <br/>
  <div class="table-responsive">
      <table class="table">
        <tr>
          <td>User</td>
          <td>Password</td>
          <td>Mail</td>
          <td>Master</td>
          <td>Edit</td>
          <td>Delete</td>
         
        </tr>
        <?php foreach($result  as $r): ?>
        <tr>
          <td><?php echo $r->username; ?></td>
        <td><?php echo $r->password; ?></td>
        
        <td><?php echo $r->mail; ?></td>
        <td>
          <?php 
              if($r->master == 0 ){ 
                echo 'NO';
              }
              else {
                echo 'YES';
              }
          ?>
        </td>
        <td><button class="btn btn-default"><a href='manageadmin/edit/<?php echo $r->id; ?>'>Edit</a></button></td>
        <td>
          <button class="btn btn-default">
          <?php 
            echo anchor('manageadmin/delete/'.$r->id, 'Delete', array('onClick' => "return confirm('Are you sure you want to delete?')"));
          ?>
          </button>
        </td>
      </tr>

       
      <?php endforeach; ?>
      </table>
    </div>
  <table>



