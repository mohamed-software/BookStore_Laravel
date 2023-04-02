
<html>
<head>
<title>Home</title>
<link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.rtl.min.css" integrity="sha384-WJUUqfoMmnfkBLne5uxXj+na/c7sesSJ32gI7GfCk4zO4GthUKhSEGyvQ839BC51" crossorigin="anonymous">
<link href="css/style.css" rel="stylesheet" >
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    
    <a class="navbar-brand" href="{{url('list')}}">Book Store</a>
    <a class="navbar-brand" href="{{url('home')}}">Home</a>
    <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button> -->
  
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
  
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
  
            <!--  Books -->
              @if(Auth::check())
              <li class="nav-link ">
                <a class="btn btn-outline-success" aria-current="page" href="{{url('list')}}"> Books </a>
              </li>
  
              <!-- Add Book -->
              @if(Auth::user()->is_admin)
              <li class="nav-link ">
                <a class="btn btn-outline-success" aria-current="page" href="{{url('books/create')}}">Add Book </a>
              </li>
  
              @endif
              <!-- logout -->
              <!-- <li class="nav-item active">
          <a class="nav-link" href="home.blade.php">Home <span class="sr-only">(current)</span></a>
          </li> -->
              <li class="nav-link ">
                <a class="btn btn-danger" aria-current="page" href="{{url('users/logout')}}"> LogOut </a>
              </li>
  
              @else
                          <!-- Register -->
              <li class="nav-link ">
                <a class="btn btn-outline-success" margin="20px" aria-current="page" href="{{url('users/register')}}">Register </a>
              </li>
                     <!-- Login -->
              <li class="nav-link ">
            <a class="btn btn-outline-success" aria-current="page" href="{{url('users/login')}}">Login</a>
            </li>
            @endif
  
          </ul>
      </div>
        <!-- <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form> -->
    </div>
  </nav>
  <header>
	<img src="images/bookStore.jpg" alt="">
	<div class="hero">
		<p><span>welcome</span> to our store</p>
	</div>
</header>


<section id="projects">
	<div class="container">
		<h2> All Books</h2>
		<hr>
		<div class="parent">
			<div class="child">
				<img src="images/ahmedKhled.jpg" alt="">
				<span>Ahmed Khaled Tawfiq</span>
			</div>
			<div class="child">
				<img src="images/dady.jpg" alt="">
				<span>الاب الغنى والاب الفقير</span>
			</div>
			<div class="child">
				<img src="images/sa7ab.jpg" alt="">
				<span>صاحب الظل الطويل</span>
			</div>
			<div class="child">
				<img src="images/img.svg" alt="">
				<span>كتب غيرت العالم</span>
			</div>
			<div class="clear"></div>
		</div>

		<div class="parent">
			<div class="child">
				<img src="images/img1.jpg" alt="">
				<span>الراجل من المريخ</span>
			</div>
			<div class="child">
				<img src="images/img2.jpg" alt="">
				<span>اولاد حارتنا</span>
			</div>
			<div class="child">
				<img src="images/img3.jpg" alt="">
				<span>مارك مانسون</span>
			</div>
			<div class="child">
				<img src="images/img5.jpg" alt="">
				<span>رسائل من أعماق الأرض</span>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</section>   

<article>
	<div class="container">
	<div class="map">
		<img src="images/map.jpg" width="100%">
	</div>
</div>
</article>
<!-- end article 2 -->
<!--start footer  -->
<footer>
<p>Mohamed Salah Amer <a href="https://linktr.ee/mohamedsala" class="power"> My info  </a></p>
</footer>
<!-- end foter -->

</body>
</html>


