<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
	    <!-- font awesome cdn link  -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
	
    <!--Jquery-------------------->
    <script type="text/javascript" src="js/Jquery.js"></script>
	<style type="text/css">

section{
   padding:5rem 10%;
}
.footer{
   text-align: center;
   background:#000000;
   padding-bottom: 0.5rem;
}

.footer{
   text-align: center;
   background:#000000/*#1F1F1F*/;
   padding-bottom: 1rem;
}

.footer .icons-container{
   display: grid;
   grid-template-columns: repeat(auto-fit, minmax(2rem, 1fr));
   gap:1rem;
}

.footer .icons-container .icons{
   text-align:center;
   padding:1rem 0.5rem;
	text-transform: capitalize;
}

.footer .icons-container .icons i{
   height: 4rem;
   width: 4rem;
   border-radius: 50%;
   background:#782375;
   color:#ffff;
   margin-bottom: .5rem;
   line-height: 3.8rem;
   font-size: 1.5rem;
}

.footer .icons-container .icons h3{
   font-size: 1.3rem;
   color:#ffff;
   padding:0.5rem 0;
}

.footer .icons-container .icons p{
   line-height: 1.5;
   font-size: 1rem;
   color:antiquewhite;
   text-transform: none;
	margin: 5px;
}

.footer .social{
   margin: 0;
}

.footer .social a{
   height: 4rem;
   width: 4rem;
   line-height: 5.8rem;
   color:#ffff;
   margin:0 .3rem;
   font-size: 1.5rem;
}  

.footer .social a:hover{
	opacity: 0.7;
	color: #782375;
}

@media (min-width:320px) and (max-width:768px) {
    .footer-logo-block {
        margin-bottom: 25px
    }
}
	
	</style>
</head>

<body>
	        <!-- start: FOOTER -->
<section class="footer">

   <div class="icons-container">

      <div class="icons">
         <i class="fas fa-clock"></i>
         <h3>opening hours</h3>
         <p>0900 to 2200</p>
      </div>

      <div class="icons">
         <i class="fas fa-phone"></i>
         <h3>phone</h3>
         <p>+123-456-7890</p>
         <p>+456-666-8888</p>
      </div>

      <div class="icons">
         <i class="fas fa-envelope"></i>
         <h3>email</h3>
         <p>xinrou@gmail.com</p>
         <p>zoe0506@gmail.com</p>
      </div>

      <div class="icons">
         <i class="fas fa-map"></i>
         <h3>address</h3>
         <p>Kuala Lumpur, Malaysia</p>
      </div>

   </div>

   <div class="social">
      <a href="#" class="fab fa-facebook-f"></a>
      <a href="#" class="fab fa-twitter"></a>
      <a href="#" class="fab fa-instagram"></a>
   </div>

</section>
</body>
</html>