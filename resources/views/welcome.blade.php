<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Home - Segurvid</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('neutral/css/open-iconic-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('neutral/css/animate.css')}}">
    
    <link rel="stylesheet" href="{{ asset('neutral/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset('neutral/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{ asset('neutral/css/magnific-popup.css')}}">

    <link rel="stylesheet" href="{{ asset('neutral/css/aos.css')}}">

    <link rel="stylesheet" href="{{ asset('neutral/css/ionicons.min.css')}}">

    <link rel="stylesheet" href="{{ asset('neutral/css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{ asset('neutral/css/jquery.timepicker.css')}}">
    
    <link rel="stylesheet" href="{{ asset('neutral/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{ asset('neutral/css/icomoon.css')}}">
    <link rel="stylesheet" href="{{ asset('neutral/css/style.css')}}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
	  
	  
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light site-navbar-target" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.html">Segurvid</a>
	      <button class="navbar-toggler js-fh5co-nav-toggle fh5co-nav-toggle" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav nav ml-auto">
                <li class="nav-item"><a href="#home-section" class="nav-link"><span>Inicio</span></a></li>
                <li class="nav-item"><a href="#about-section" class="nav-link"><span>Nosotros</span></a></li>
                <li class="nav-item"><a href="#practice-section" class="nav-link"><span>Servicios</span></a></li>
                <li class="nav-item"><a href="#attorneys-section" class="nav-link"><span>Asesores</span></a></li>
                {{-- <li class="nav-item"><a href="#blog-section" class="nav-link"><span>Blog</span></a></li> --}}
                <li class="nav-item"><a href="#contact-section" class="nav-link"><span>Contacto</span></a></li>
                @if (Auth::check())
                    <li class="nav-item cta mr-2"><a href="{{url('/dashboard')}}" class="nav-link">Dashboard</a></li>
					<form action="{{route('logout')}}" method="POST">
					@csrf
                    	<li class="nav-item cta">
							<button type="submit" class="nav-link"><i class="fa fa-power-off"></i></button>
						</li>
					</form>
				@else
                    <li class="nav-item cta"><a href="{{route('login')}}" class="nav-link">Iniciar sesión</a></li>
                @endif
	        </ul>
	      </div>
	    </div>
	  </nav>

	  <section class="hero-wrap js-fullheight" style="background-image: url('{{asset('neutral/images/bg_1.jpg')}}');" data-section="home">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-end" data-scrollax-parent="true">
          <div class="col-md-6 ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
            <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Reputación, Respecto, Resultados</h1>
            <p class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Por que tu salud y bienestar es nuestro objetivo trabajamos para gestionar tu caso en el menor tiempo posible logrando obtener el mejor resultado para ti.</p>            
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section ftco-counter ftco-no-pt ftco-no-pb img" id="section-counter">
    	<div class="container">
    		<div class="row d-md-flex align-items-center justify-content-end">
    			<div class="col-lg-12">
    				<div class="ftco-counter-wrap">
	    				<div class="row no-gutters d-md-flex align-items-center align-items-stretch">
			          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
			            <div class="block-18">
			              <div class="text">
			              	<div class="icon d-flex justify-content-center align-items-center">
			              		<span class="flaticon-house"></span>
			              	</div>
			                <strong class="number" data-number="5">0</strong>
			                <span>Años de experiencia</span>
			              </div>
			            </div>
			          </div>
			          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
			            <div class="block-18">
			              <div class="text">
			              	<div class="icon d-flex justify-content-center align-items-center">
			              		<span class="flaticon-handshake"></span>
			              	</div>
			                <strong class="number" data-number="200">0</strong>
			                <span>Clientes Satisfechos</span>
			              </div>
			            </div>
			          </div>
			          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
			            <div class="block-18">
			              <div class="text">
			              	<div class="icon d-flex justify-content-center align-items-center">
			              		<span class="flaticon-lawyer"></span>
			              	</div>
			                <strong class="number" data-number="20">0</strong>
			                <span>Hospitales Socios</span>
			              </div>
			            </div>
			          </div>
			          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
			            <div class="block-18">
			              <div class="text">
			              	<div class="icon d-flex justify-content-center align-items-center">
			              		<span class="flaticon-medal"></span>
			              	</div>
			                <strong class="number" data-number="150000">0</strong>
			                <span>Indemnizaciones</span>
			              </div>
			            </div>
			          </div>
		          </div>
		        </div>
          </div>
        </div>
    	</div>
    </section>

    <section class="ftco-about ftco-no-pt ftco-no-pb img ftco-section bg-light" id="about-section">
    	<div class="container">
    		<div class="row d-flex">
    			<div class="col-md-6 col-lg-6 d-flex order-md-last">
    				<div class="img-about img d-flex align-items-stretch">
	    				<div class="img d-flex align-self-stretch align-items-end" style="background-image:url({{asset('neutral/images/about.jpg')}});">
	    					<a href="https://vimeo.com/45830194" class="icon-video popup-vimeo d-flex justify-content-center align-items-center mr-3">
	    						<span class="ion-ios-play play mr-2"></span>
	    						<span class="watch">Watch Video</span>
	    					</a>
	    				</div>
    				</div>
    			</div>
    			<div class="col-md-6 col-lg-6 pr-lg-5 py-3 py-lg-5">
    				<div class="row justify-content-start py-3 py-lg-5">
		          <div class="col-md-12 heading-section ftco-animate">
		          	<span class="subheading">Bienvenido</span>
		            <h2 class="mb-4" style="font-size: 44px; text-transform: capitalize;">Bienvenido a Segurvid</h2>
		            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
		            <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
		          </div>
		        </div>
	        </div>
        </div>
    	</div>
    </section>

    <section class="ftco-about ftco-no-pt ftco-no-pb img ftco-section bg-light">
    	<div class="container">
    		<div class="row d-flex">
    			<div class="col-md-6 col-lg-6 d-flex">
    				<div class="img-about img d-flex align-items-stretch">
	    				<div class="img d-flex align-self-stretch align-items-end" style="background-image:url({{asset('neutral/images/about-2.jpg')}});">
	    				</div>
    				</div>
    			</div>
    			<div class="col-md-6 col-lg-6 pl-lg-5 py-5">
    				<div class="row justify-content-start pb-3">
		          <div class="col-md-12 heading-section ftco-animate pb-5">
		          	<span class="subheading">Testimonios</span>
		            <h2 class="mb-4" style="font-size: 44px; text-transform: capitalize;">Nuestras historias</h2>
		          </div>
		          <div class="col-md-12 testimony-section">
								<div class="owl-carousel carousel-testimony">
									<div class="item">
										<div class="testimony-wrap">
				          		<div class="text mb-5">
				          			<div class="icon">
				          				<span class="icon-quote-left"></span>
				          			</div>
				          			<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
				          		</div>
				          		<div class="d-flex">
				          			<div class="user-img img mr-3" style="background-image: url({{asset('neutral/images/person_1.jpg')}});"></div>
				          			<div>
				          				<p class="name mb-0">Luis Fox</p>
			                    <span class="position">Businessman</span>
				          			</div>
				          		</div>
				          	</div>
									</div>
									<div class="item">
										<div class="testimony-wrap">
				          		<div class="text mb-5">
				          			<div class="icon">
				          				<span class="icon-quote-left"></span>
				          			</div>
				          			<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
				          		</div>
				          		<div class="d-flex">
				          			<div class="user-img img mr-3" style="background-image: url({{asset('neutral/images/person_2.jpg')}});"></div>
				          			<div>
				          				<p class="name mb-0">Luis Fox</p>
			                    <span class="position">Businessman</span>
				          			</div>
				          		</div>
				          	</div>
									</div>
									<div class="item">
										<div class="testimony-wrap">
				          		<div class="text mb-5">
				          			<div class="icon">
				          				<span class="icon-quote-left"></span>
				          			</div>
				          			<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
				          		</div>
				          		<div class="d-flex">
				          			<div class="user-img img mr-3" style="background-image: url({{asset('neutral/images/person_3.jpg')}});"></div>
				          			<div>
				          				<p class="name mb-0">Luis Fox</p>
			                    <span class="position">Businessman</span>
				          			</div>
				          		</div>
				          	</div>
									</div>
								</div>
		          </div>
		        </div>
	        </div>
        </div>
    	</div>
    </section>

    <section class="ftco-section ftco-no-pb ftco-services" id="practice-section">
      <div class="container">
      	<div class="row justify-content-center pb-5">
          <div class="col-md-10 heading-section text-center ftco-animate">
          	<span class="subheading">Servicios</span>
            <h2 class="mb-4">Servicios</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
          </div>
        </div>
        <div class="row no-gutters">
          <div class="col-md-5 col-lg-5 ftco-animate py-4 nav-link-wrap">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
              <a class="nav-link px-4 py-1 active" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true"><span class="mr-3 flaticon-ideas"></span>Asesoría</a>

              <a class="nav-link px-4 py-1" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2" role="tab" aria-controls="v-pills-2" aria-selected="false"><span class="mr-3 flaticon-flasks"></span>Reembolso por gastos médicos</a>

              <a class="nav-link px-4 py-1" id="v-pills-3-tab" data-toggle="pill" href="#v-pills-3" role="tab" aria-controls="v-pills-3" aria-selected="false"><span class="mr-3 flaticon-analysis"></span>Reembolso de fondo de pensión</a>

              <a class="nav-link px-4 py-1" id="v-pills-4-tab" data-toggle="pill" href="#v-pills-4" role="tab" aria-controls="v-pills-4" aria-selected="false"><span class="mr-3 flaticon-web-design"></span>Remuneración de seguro de vida ley</a>


              <a class="nav-link px-4 py-1" id="v-pills-5-tab" data-toggle="pill" href="#v-pills-5" role="tab" aria-controls="v-pills-5" aria-selected="false"><span class="mr-3 flaticon-innovation"></span>Indemnización por incapacidad temporal</a>

              <a class="nav-link px-4 py-1" id="v-pills-6-tab" data-toggle="pill" href="#v-pills-6" role="tab" aria-controls="v-pills-6" aria-selected="false"><span class="mr-3 flaticon-idea"></span>Indemnización por incapacidad permanente</a>

              <a class="nav-link px-4 py-1" id="v-pills-7-tab" data-toggle="pill" href="#v-pills-7" role="tab" aria-controls="v-pills-7" aria-selected="false"><span class="mr-3 flaticon-idea"></span>Indemnización por invalidez temporal</a>

              <a class="nav-link px-4 py-1" id="v-pills-8-tab" data-toggle="pill" href="#v-pills-8" role="tab" aria-controls="v-pills-8" aria-selected="false"><span class="mr-3 flaticon-idea"></span>Indemnización por fallecimiento</a>

              <a class="nav-link px-4 py-1" id="v-pills-9-tab" data-toggle="pill" href="#v-pills-9" role="tab" aria-controls="v-pills-9" aria-selected="false"><span class="mr-3 flaticon-idea"></span>Reembolso por gastos de sepelio</a>

              <a class="nav-link px-4 py-1" id="v-pills-10-tab" data-toggle="pill" href="#v-pills-10" role="tab" aria-controls="v-pills-10" aria-selected="false"><span class="mr-3 flaticon-ux-design"></span> Property Law</a>
            </div>
          </div>
          <div class="col-md-7 col-lg-7 ftco-animate p-4 p-md-5 d-flex align-items-center">
            
            <div class="tab-content pl-lg-4" id="v-pills-tabContent">

              <div class="tab-pane fade show active py-0 py-lg-5" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-1-tab">
              	<div class="d-lg-flex">
	              	<div class="icon-law mr-md-4 mr-lg-5">
		                <span class="icon mb-3 d-block flaticon-family"></span>
		              </div>
		              <div class="text">
		                <h2 class="mb-4">Family Law</h2>
		                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt voluptate, quibusdam sunt iste dolores consequatur</p>
		                <p>Inventore fugit error iure nisi reiciendis fugiat illo pariatur quam sequi quod iusto facilis officiis nobis sit quis molestias asperiores rem, blanditiis! Commodi exercitationem vitae deserunt qui nihil ea, tempore et quam natus quaerat doloremque.</p>
		                <p><a href="#" class="btn btn-primary px-4 py-3">Learn More</a></p>
	                </div>
                </div>
              </div>

              <div class="tab-pane fade py-0 py-lg-5" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-2-tab">
              	<div class="d-lg-flex">
	              	<div class="icon-law mr-md-4 mr-lg-5">
		                <span class="icon mb-3 d-block flaticon-auction"></span>
		              </div>
		              <div class="text">
		                <h2 class="mb-4">Business Law</h2>
		                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt voluptate, quibusdam sunt iste dolores consequatur</p>
		                <p>Inventore fugit error iure nisi reiciendis fugiat illo pariatur quam sequi quod iusto facilis officiis nobis sit quis molestias asperiores rem, blanditiis! Commodi exercitationem vitae deserunt qui nihil ea, tempore et quam natus quaerat doloremque.</p>
		                <p><a href="#" class="btn btn-primary px-4 py-3">Learn More</a></p>
	                </div>
                </div>
              </div>

              <div class="tab-pane fade py-0 py-lg-5" id="v-pills-3" role="tabpanel" aria-labelledby="v-pills-3-tab">
              	<div class="d-lg-flex">
	              	<div class="icon-law mr-md-4 mr-lg-5">
		                <span class="icon mb-3 d-block flaticon-shield"></span>
	                </div>
	                <div class="text">
		                <h2 class="mb-4">Insurance Law</h2>
		                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt voluptate, quibusdam sunt iste dolores consequatur</p>
		                <p>Inventore fugit error iure nisi reiciendis fugiat illo pariatur quam sequi quod iusto facilis officiis nobis sit quis molestias asperiores rem, blanditiis! Commodi exercitationem vitae deserunt qui nihil ea, tempore et quam natus quaerat doloremque.</p>
		                <p><a href="#" class="btn btn-primary px-4 py-3">Learn More</a></p>
	                </div>
                </div>
              </div>

              <div class="tab-pane fade py-0 py-lg-5" id="v-pills-4" role="tabpanel" aria-labelledby="v-pills-4-tab">
              	<div class="d-lg-flex">
	              	<div class="icon-law mr-md-4 mr-lg-5">
		                <span class="icon mb-3 d-block flaticon-handcuffs"></span>
	                </div>
	                <div class="text">
		                <h2 class="mb-4">Criminal Law</h2>
		                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt voluptate, quibusdam sunt iste dolores consequatur</p>
		                <p>Inventore fugit error iure nisi reiciendis fugiat illo pariatur quam sequi quod iusto facilis officiis nobis sit quis molestias asperiores rem, blanditiis! Commodi exercitationem vitae deserunt qui nihil ea, tempore et quam natus quaerat doloremque.</p>
		                <p><a href="#" class="btn btn-primary px-4 py-3">Learn More</a></p>
	                </div>
                </div>
              </div>

              <div class="tab-pane fade py-0 py-lg-5" id="v-pills-5" role="tabpanel" aria-labelledby="v-pills-5-tab">
              	<div class="d-lg-flex">
	              	<div class="icon-law mr-md-4 mr-lg-5">
		                <span class="icon mb-3 d-block flaticon-employee"></span>
	                </div>
	                <div class="text">
		                <h2 class="mb-4">Employment Law</h2>
		                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt voluptate, quibusdam sunt iste dolores consequatur</p>
		                <p>Inventore fugit error iure nisi reiciendis fugiat illo pariatur quam sequi quod iusto facilis officiis nobis sit quis molestias asperiores rem, blanditiis! Commodi exercitationem vitae deserunt qui nihil ea, tempore et quam natus quaerat doloremque.</p>
		                <p><a href="#" class="btn btn-primary px-4 py-3">Learn More</a></p>
	                </div>
                </div>
              </div>

              <div class="tab-pane fade py-0 py-lg-5" id="v-pills-6" role="tabpanel" aria-labelledby="v-pills-6-tab">
              	<div class="d-lg-flex">
	              	<div class="icon-law mr-md-4 mr-lg-5">
		                <span class="icon mb-3 d-block flaticon-fire"></span>
	                </div>
	                <div class="text">
		                <h2 class="mb-4">Fire Accident</h2>
		                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt voluptate, quibusdam sunt iste dolores consequatur</p>
		                <p>Inventore fugit error iure nisi reiciendis fugiat illo pariatur quam sequi quod iusto facilis officiis nobis sit quis molestias asperiores rem, blanditiis! Commodi exercitationem vitae deserunt qui nihil ea, tempore et quam natus quaerat doloremque.</p>
		                <p><a href="#" class="btn btn-primary px-4 py-3">Learn More</a></p>
	                </div>
                </div>
              </div>

              <div class="tab-pane fade py-0 py-lg-5" id="v-pills-7" role="tabpanel" aria-labelledby="v-pills-7-tab">
              	<div class="d-lg-flex">
	              	<div class="icon-law mr-md-4 mr-lg-5">
		                <span class="icon mb-3 d-block flaticon-money"></span>
	                </div>
	                <div class="text">
		                <h2 class="mb-4">Financial Law</h2>
		                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt voluptate, quibusdam sunt iste dolores consequatur</p>
		                <p>Inventore fugit error iure nisi reiciendis fugiat illo pariatur quam sequi quod iusto facilis officiis nobis sit quis molestias asperiores rem, blanditiis! Commodi exercitationem vitae deserunt qui nihil ea, tempore et quam natus quaerat doloremque.</p>
		                <p><a href="#" class="btn btn-primary px-4 py-3">Learn More</a></p>
	                </div>
                </div>
              </div>

              <div class="tab-pane fade py-0 py-lg-5" id="v-pills-8" role="tabpanel" aria-labelledby="v-pills-8-tab">
              	<div class="d-lg-flex">
	              	<div class="icon-law mr-md-4 mr-lg-5">
		                <span class="icon mb-3 d-block flaticon-medicine"></span>
	                </div>
	                <div class="text">
		                <h2 class="mb-4">Drug Offenses</h2>
		                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt voluptate, quibusdam sunt iste dolores consequatur</p>
		                <p>Inventore fugit error iure nisi reiciendis fugiat illo pariatur quam sequi quod iusto facilis officiis nobis sit quis molestias asperiores rem, blanditiis! Commodi exercitationem vitae deserunt qui nihil ea, tempore et quam natus quaerat doloremque.</p>
		                <p><a href="#" class="btn btn-primary px-4 py-3">Learn More</a></p>
	                </div>
                </div>
              </div>

              <div class="tab-pane fade py-0 py-lg-5" id="v-pills-9" role="tabpanel" aria-labelledby="v-pills-9-tab">
              	<div class="d-lg-flex">
	              	<div class="icon-law mr-md-4 mr-lg-5">
		                <span class="icon mb-3 d-block flaticon-handcuffs"></span>
	                </div>
	                <div class="text">
		                <h2 class="mb-4">Sexual Offenses</h2>
		                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt voluptate, quibusdam sunt iste dolores consequatur</p>
		                <p>Inventore fugit error iure nisi reiciendis fugiat illo pariatur quam sequi quod iusto facilis officiis nobis sit quis molestias asperiores rem, blanditiis! Commodi exercitationem vitae deserunt qui nihil ea, tempore et quam natus quaerat doloremque.</p>
		                <p><a href="#" class="btn btn-primary px-4 py-3">Learn More</a></p>
	                </div>
                </div>
              </div>

              <div class="tab-pane fade py-0 py-lg-5" id="v-pills-10" role="tabpanel" aria-labelledby="v-pills-10-tab">
              	<div class="d-lg-flex">
	              	<div class="icon-law mr-md-4 mr-lg-5">
		                <span class="icon mb-3 d-block flaticon-house"></span>
	                </div>
	                <div class="text">
		                <h2 class="mb-4">Property Law</h2>
		                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt voluptate, quibusdam sunt iste dolores consequatur</p>
		                <p>Inventore fugit error iure nisi reiciendis fugiat illo pariatur quam sequi quod iusto facilis officiis nobis sit quis molestias asperiores rem, blanditiis! Commodi exercitationem vitae deserunt qui nihil ea, tempore et quam natus quaerat doloremque.</p>
		                <p><a href="#" class="btn btn-primary px-4 py-3">Learn More</a></p>
	                </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
		
    <section class="ftco-section bg-light" id="attorneys-section">
    	<div class="container">
    		<div class="row justify-content-center pb-5">
          <div class="col-md-10 heading-section text-center ftco-animate">
          	<span class="subheading">About Us</span>
            <h2 class="mb-4">Our Legal Attorneys</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
          </div>
        </div>
        <div class="row">
					<div class="col-md-6 col-lg-3 ftco-animate">
						<div class="staff">
							<div class="img-wrap d-flex align-items-stretch">
								<div class="img align-self-stretch" style="background-image: url({{asset('neutral/images/staff-5.jpg')}});"></div>
							</div>
							<div class="text d-flex align-items-center pt-3 text-center">
								<div>
									<h3 class="mb-2">Lloyd Wilson</h3>
									<span class="position mb-4">CEO, Founder</span>
									<div class="faded">
										<ul class="ftco-social text-center">
			                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
			                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
			                <li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a></li>
			                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
			              </ul>
		              </div>
		            </div>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-3 ftco-animate">
						<div class="staff">
							<div class="img-wrap d-flex align-items-stretch">
								<div class="img align-self-stretch" style="background-image: url({{asset('neutral/images/staff-6.jpg')}});"></div>
							</div>
							<div class="text d-flex align-items-center pt-3 text-center">
								<div>
									<h3 class="mb-2">Rachel Parker</h3>
									<span class="position mb-4">Business Lawyer</span>
									<div class="faded">
										<ul class="ftco-social text-center">
			                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
			                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
			                <li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a></li>
			                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
			              </ul>
		              </div>
		            </div>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-3 ftco-animate">
						<div class="staff">
							<div class="img-wrap d-flex align-items-stretch">
								<div class="img align-self-stretch" style="background-image: url({{asset('neutral/images/staff-7.jpg')}});"></div>
							</div>
							<div class="text d-flex align-items-center pt-3 text-center">
								<div>
									<h3 class="mb-2">Ian Smith</h3>
									<span class="position mb-4">Insurance Lawyer</span>
									<div class="faded">
										<ul class="ftco-social text-center">
			                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
			                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
			                <li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a></li>
			                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
			              </ul>
		              </div>
		            </div>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-3 ftco-animate">
						<div class="staff">
							<div class="img-wrap d-flex align-items-stretch">
								<div class="img align-self-stretch" style="background-image: url({{asset('neutral/images/staff-8.jpg')}});"></div>
							</div>
							<div class="text d-flex align-items-center pt-3 text-center">
								<div>
									<h3 class="mb-2">Alicia Henderson</h3>
									<span class="position mb-4">Criminal Law</span>
									<div class="faded">
										<ul class="ftco-social text-center">
			                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
			                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
			                <li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a></li>
			                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
			              </ul>
		              </div>
		            </div>
							</div>
						</div>
					</div>
				</div>
    	</div>
    </section>
{{--
    <section class="ftco-section" id="blog-section">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-5">
          <div class="col-md-10 heading-section text-center ftco-animate">
            <span class="subheading">Blog</span>
            <h2 class="mb-4">Our Blog</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
          </div>
        </div>
        <div class="row d-flex">
          <div class="col-md-4 d-flex ftco-animate">
          	<div class="blog-entry justify-content-end">
          		<div class="text">
          			<h3 class="heading"><a href="single.html">All you want to know about industrial laws</a></h3>
          		</div>
              <a href="single.html" class="block-20" style="background-image: url('{{asset('neutral/images/image_1.jpg')}}');">
              </a>
              <div class="text mt-3 float-right d-block">
                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                <div class="d-flex align-items-center mt-4 meta">
	                <p class="mb-0"><a href="#" class="btn btn-primary">Read More <span class="ion-ios-arrow-round-forward"></span></a></p>
	                <p class="ml-auto mb-0">
	                	<a href="#" class="mr-2">Admin</a>
	                	<a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a>
	                </p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4 d-flex ftco-animate">
          	<div class="blog-entry justify-content-end">
          		<div class="text">
          			<h3 class="heading"><a href="single.html">All you want to know about industrial laws</a></h3>
          		</div>
              <a href="single.html" class="block-20" style="background-image: url('{{asset('neutral/images/image_2.jpg')}}');">
              </a>
              <div class="text mt-3 float-right d-block">
                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                <div class="d-flex align-items-center mt-4 meta">
	                <p class="mb-0"><a href="#" class="btn btn-primary">Read More <span class="ion-ios-arrow-round-forward"></span></a></p>
	                <p class="ml-auto mb-0">
	                	<a href="#" class="mr-2">Admin</a>
	                	<a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a>
	                </p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4 d-flex ftco-animate">
          	<div class="blog-entry">
          		<div class="text">
          			<h3 class="heading"><a href="single.html">All you want to know about industrial laws</a></h3>
          		</div>
              <a href="single.html" class="block-20" style="background-image: url('{{asset('neutral/images/image_3.jpg')}}');">
              </a>
              <div class="text mt-3 float-right d-block">
                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                <div class="d-flex align-items-center mt-4 meta">
	                <p class="mb-0"><a href="#" class="btn btn-primary">Read More <span class="ion-ios-arrow-round-forward"></span></a></p>
	                <p class="ml-auto mb-0">
	                	<a href="#" class="mr-2">Admin</a>
	                	<a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a>
	                </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
--}}
    <section class="ftco-section contact-section ftco-no-pb bg-light" id="contact-section">
      <div class="container">
      	<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-10 heading-section text-center ftco-animate">
            <span class="subheading">Contacto</span>
            <h2 class="mb-4">Contáctanos</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
          </div>
        </div>
        <div class="row d-flex contact-info mb-5">
          <div class="col-md-6 col-lg-3 d-flex ftco-animate">
          	<div class="align-self-stretch box p-4 text-center">
          		<div class="icon d-flex align-items-center justify-content-center">
          			<span class="icon-map-signs"></span>
          		</div>
          		<h3 class="mb-4">Dirección</h3>
	            <p>198 West 21th Street, Suite 721 New York NY 10016</p>
	          </div>
          </div>
          <div class="col-md-6 col-lg-3 d-flex ftco-animate">
          	<div class="align-self-stretch box p-4 text-center">
          		<div class="icon d-flex align-items-center justify-content-center">
          			<span class="icon-phone2"></span>
          		</div>
          		<h3 class="mb-4">Número de contact</h3>
	            <p><a href="tel://1234567920">+51 987 65 43 21</a></p>
	          </div>
          </div>
          <div class="col-md-6 col-lg-3 d-flex ftco-animate">
          	<div class="align-self-stretch box p-4 text-center">
          		<div class="icon d-flex align-items-center justify-content-center">
          			<span class="icon-paper-plane"></span>
          		</div>
          		<h3 class="mb-4">Dirección de correo</h3>
	            <p><a href="mailto:hola@segurvid.com">hola@segurvid.com</a></p>
	          </div>
          </div>
          <div class="col-md-6 col-lg-3 d-flex ftco-animate">
          	<div class="align-self-stretch box p-4 text-center">
          		<div class="icon d-flex align-items-center justify-content-center">
          			<span class="icon-globe"></span>
          		</div>
          		<h3 class="mb-4">Sitio Web</h3>
	            <p><a href="#">segurvid.com</a></p>
	          </div>
          </div>
        </div>
        {{--
        <div class="row no-gutters block-9">
          <div class="col-md-6 order-md-last d-flex">
            <form action="#" class="bg-primary p-5 contact-form">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Your Name">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Your Email">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Subject">
              </div>
              <div class="form-group">
                <textarea name="" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
              </div>
              <div class="form-group">
                <input type="submit" value="Send Message" class="btn btn-darken py-3 px-5">
              </div>
            </form>          
          </div>
        
          <div class="col-md-6 d-flex">
          	<div id="map" class="bg-white"></div>
          </div>
          --}}
        </div>
      </div>
    </section>
		

    <footer class="ftco-footer ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Acerca&nbsp;<span>Segurvid</span></h2>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-4">
              <h2 class="ftco-heading-2">Links</h2>
              <ul class="list-unstyled">
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Inicio</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Nosotros</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Servicios</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Asesores</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Blog</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Contacto</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Servicios</h2>
              <ul class="list-unstyled">
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Family Law</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Business Law</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Insurance Law</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Criminal Law</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Drug Offenses</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Property Law</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Employment Law</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">¿Aún tienes dudas?</h2>
            	<div class="block-23 mb-0">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+51 987 65 43 21</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">hola@segurvid.com</span></a></li>
	              </ul>
	            </div>
	            <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-4">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://retait.net" target="_blank">RETAIT SS</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <!-- Modal -->
    <div class="modal fade" id="modalAppointment" tabindex="-1" role="dialog" aria-labelledby="modalAppointmentLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalAppointmentLabel">Appointment</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="#">
              <div class="form-group">
                <label for="appointment_name" class="text-black">Full Name</label>
                <input type="text" class="form-control" id="appointment_name">
              </div>
              <div class="form-group">
                <label for="appointment_email" class="text-black">Email</label>
                <input type="text" class="form-control" id="appointment_email">
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="appointment_date" class="text-black">Date</label>
                    <input type="text" class="form-control" id="appointment_date">
                  </div>    
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="appointment_time" class="text-black">Time</label>
                    <input type="text" class="form-control" id="appointment_time">
                  </div>
                </div>
              </div>
              

              <div class="form-group">
                <label for="appointment_message" class="text-black">Message</label>
                <textarea name="" id="appointment_message" class="form-control" cols="30" rows="10"></textarea>
              </div>
              <div class="form-group">
                <input type="submit" value="Send Message" class="btn btn-primary">
              </div>
            </form>
          </div>
          
        </div>
      </div>
    </div>


  <script src="{{ asset('neutral/js/jquery.min.js')}}"></script>
  <script src="{{ asset('neutral/js/jquery-migrate-3.0.1.min.js')}}"></script>
  <script src="{{ asset('neutral/js/popper.min.js')}}"></script>
  <script src="{{ asset('neutral/js/bootstrap.min.js')}}"></script>
  <script src="{{ asset('neutral/js/jquery.easing.1.3.js')}}"></script>
  <script src="{{ asset('neutral/js/jquery.waypoints.min.js')}}"></script>
  <script src="{{ asset('neutral/js/jquery.stellar.min.js')}}"></script>
  <script src="{{ asset('neutral/js/owl.carousel.min.js')}}"></script>
  <script src="{{ asset('neutral/js/jquery.magnific-popup.min.js')}}"></script>
  <script src="{{ asset('neutral/js/aos.js')}}"></script>
  <script src="{{ asset('neutral/js/jquery.animateNumber.min.js')}}"></script>
  <script src="{{ asset('neutral/js/bootstrap-datepicker.js')}}"></script>
  <script src="{{ asset('neutral/js/jquery.timepicker.min.js')}}"></script>
  <script src="{{ asset('neutral/js/scrollax.min.js')}}"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="{{ asset('neutral/js/google-map.js')}}"></script>
  
  <script src="{{ asset('neutral/js/main.js')}}"></script>
    
  </body>
</html>