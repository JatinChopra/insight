<nav class="navbar navbar-expand-lg navbar-dark bg-dark"
    style="position:fixed; top:0;margin-right:0; margin-left:0; width:100%;"
>
  <div class="container-fluid">
    <a class="navbar-brand" href="#">UPESInsight</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor02">

      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link active" href="/index.php">Home 
            <span class="visually-hidden">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Features</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Pricing</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About</a>
        </li>
         <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Dropdown</a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <a class="dropdown-item" href="#">Something else here</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Separated link</a>
          </div>
        </li>
      </ul>
        <form class="d-flex">
         <?php if(isset($_SESSION['user'])) :?>
        <a href="/myaccount.php"  class="btn btn-secondary my-2 my-sm-0" style=" margin-left:20px;">My Account</a>
        <a href="/logout.php"  class="btn btn-secondary my-2 my-sm-0" style="margin-right:20px; margin-left:20px;">Log Out</a>
            <?php else:?>
            <a href="/login.php?q=login" style="margin-right:20px; margin-left:20px;" class="btn btn-secondary my-2 my-sm-0">Log In</a>
            <?php endif;?>
            
      </form>
    </div>
  </div>
</nav>