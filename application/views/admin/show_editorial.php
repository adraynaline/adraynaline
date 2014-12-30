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
<?php if( $editorial['main_exist'] === '1'){ 
       echo  '<td><button class="btn btn-default" data-toggle="modal" data-target="#myModal7">Replace Main Pic</button></td>';
 }
      else {
        echo '<td><button class="btn btn-default" data-toggle="modal" data-target="#myModal5">Add Main Pic</button></td>';
      }
 ?>
<td><button class="btn btn-default" id="button_add_other_pic">Add Other Pic</button></td>

<div id="formAddOtherPic">
   
    <form method="post" action="" id="upload_files_other">
        <p>Add an Other Pic to the editorial</p>
        <label for="title">Title</label>
        
        <input type="text" name="title" id="title" value="" class="form-control"/><br>
 
        <label for="userfile">File</label>
        <input type="file" name="userfile" id="userfile" form-control size="20" />
 
        <input type="hidden" name="type" id="type" value="1">
        <input type="hidden" name="id_type" id="id_type" value="<?php echo $editorial['id_edito']; ?>">
        <input type="hidden" name="id_photographer" id="id_photographer" value="<?php echo $editorial['id_ph']; ?>">
        <input type="hidden" name="main" id="main" value="0"> <br>
       
       
        <input type="submit" class="btn btn-default" name="submit" id="submit" />
    </form>
</div>
<br>
Magazine <?php echo $editorial['name_edito']; ?> <br>
Editorial : <?php echo $editorial['name_serie']; ?> <br>
<?php 
$ph = $editorial['id_ph'];
$data['photographer'] = $this->editorial_model->get_ph_show($ph);
 ?>
Photographer : <?php echo $data['photographer']['name_ph']; ?> <br>
<?php 
    if($editorial['hair'] != ''){
        echo 'Hair : '.$editorial['hair'].'<br>';
    }
    if($editorial['makeup'] != ''){
        echo 'Make-up : '.$editorial['makeup'].'<br>';
    }
    if($editorial['autres'] != ''){
        echo 'Make-up : '.$editorial['autres'].'<br>';
    }
?>
<img width="200px" src="<?php echo base_url(); ?>files/<?php echo $img['filename']; ?>">
<br><br>
<p>    IMAGES</p>
<br>
<?php foreach($other_img as $oi): ?>
    
   <img src="<?php echo base_url(); ?>files/<?php echo $oi->filename; ?>"><br>
<?php endforeach; ?>

