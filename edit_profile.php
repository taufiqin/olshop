<!DOCTYPE html>
<html>

  <head>
    <title>Olshop | Olshopin Aja !</title>
    
    <link rel="shortcut icon" type="images/x-icon" href="images/favi.png">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="<?php echo BASE_URL."css/style.css"; ?>" type="text/css" rel="stylesheet" />
    <link href="<?php echo BASE_URL."css/banner.css"; ?>" type="text/css" rel="stylesheet" />
    <link href="<?php echo BASE_URL."css/bootstrap.min.css"; ?>" type="text/css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  
    <script src="<?php echo BASE_URL."js/jquery-3.2.1.min.js"; ?>"></script>
    <script src="<?php echo BASE_URL."js/Slides-SlidesJS-3/source/jquery.slides.min.js"; ?>"></script>
  </head>
  
  <body>
<div class="container">
    <h1>Edit Profile</h1>
  	<hr>
	<div class="row">
    
      <div class="col-md-3">
        <div class="text-center">
          <img src="//placehold.it/100" class="avatar img-circle" alt="avatar">
          <h6>Upload photo...</h6>
          
          <input type="file" class="form-control">
        </div>
      </div>
      
      
      <div class="col-sm-9 personal-info">
        <h3>Personal info</h3>
        
        <form class="form-horizontal" role="form">
          <div class="form-group">
            <label class="col-sm-3 control-label">First name:</label>
            <div class="col-sm-8">
              <input class="form-control" type="text" placeholder="Masukan Nama Depan">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label">Last name:</label>
            <div class="col-sm-8">
              <input class="form-control" type="text" placeholder="Masukan Nama Belakang">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label">Email:</label>
            <div class="col-sm-8">
              <input class="form-control" type="text" placeholder="Masukan Email">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Username:</label>
            <div class="col-md-8">
              <input class="form-control" type="text" placeholder="Type Password">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Password:</label>
            <div class="col-md-8">
              <input class="form-control" type="password" placeholder="ReType Password">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Confirm password:</label>
            <div class="col-md-8">
              <input class="form-control" type="password" placeholder="Konfirm Password">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
              <input type="button" class="btn btn" value="Save Changes">
              <span></span>
              <input type="reset" class="btn btn-default" value="Cancel">
            </div>
          </div>
        </form>
      </div>
  </div>
</div>
<hr>
</body>
</html>