<style>
.wrapper {
    display:flex;
    justify-content: center;
    width: 164.25px;
    height: 42.9px;
    border-radius: 12px;
    /* position: absolute; */
    background: linear-gradient(45deg,#F17C58, #E94584, #24AADB , #27DBB1);
    background-size: 200% 200%;
    animation: gradient 10s linear infinite;
    animation-direction: alternate;
    text-align: center;
    align-items: center;
}
/* @keyframes gradient {
    0% {background-position: 0%}
    100% {background-position: 100%}
} */


@keyframes gradient {
	0% {
		background-position: 0% 50%;
	}
	50% {
		background-position: 100% 50%;
	}
	100% {
		background-position: 0% 50%;
	}
}
</style>
<div style="position:absolute; z-index:20; top:0;margin-right:0; margin-left:0; width:100%; justify-content:space-between; padding:18px 24px;  display:flex;">

    <a class="dropdown-toggle btn btn-secondary my-2 my-sm-0 wrapper" style=" border:none;margin-right:20px; margin-left:10px;" >UPES Insight</a>
    <div class="dropdown-menu" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(35px, 85px);" data-popper-placement="bottom-start">
      <a class="dropdown-item" href="./index.php">Home</a>
      <a class="dropdown-item" href="./posts.php">Posts</a>
      <a class="dropdown-item" href="./about.php">About</a>
        <?php if(isset($_SESSION['user'])) :?>
        <a href="/myaccount.php"  class="dropdown-item">My Account</a>
        <a href="/logout.php"  class="dropdown-item" >Log Out</a>
            <?php else:?>
            <a href="/login.php?q=login" class="dropdown-item">Log In</a>
            <?php endif;?>
    
    </div>
</div>

<script>
  document.querySelector(".dropdown-toggle").addEventListener('click',toggleMenu);

  function toggleMenu(){
    if(document.querySelector(".dropdown-menu").classList.contains('show')){
        console.log("show");
        document.querySelector(".dropdown-menu").classList.remove("show");  
    }else{
      console.log('hide');
    document.querySelector(".dropdown-menu").classList.add("show");
  }
  
  }

</script>