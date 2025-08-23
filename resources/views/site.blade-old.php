<!DOCTYPE html>

<html lang="en">

<head>
	<title>Metronic - The World's #1 Selling Tailwind CSS & Bootstrap Admin Template by KeenThemes</title>
	<meta charset="utf-8" />
	<meta name="description" content="The most advanced Tailwind CSS & Bootstrap 5 Admin Theme with 40 unique prebuilt layouts on Themeforest trusted by 100,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js, Node.js, Flask, Symfony & Laravel versions. Grab your copy now and get life-time updates for free." />
	<meta name="keywords" content="tailwind, tailwindcss, metronic, bootstrap, bootstrap 5, angular, VueJs, React, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js, Node.js, Flask, Symfony & Laravel starter kits, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta property="og:locale" content="en_US" />
	<meta property="og:type" content="article" />
	<meta property="og:title" content="Metronic - The World's #1 Selling Tailwind CSS & Bootstrap Admin Template by KeenThemes" />
	<meta property="og:url" content="https://keenthemes.com/metronic" />
	<meta property="og:site_name" content="Metronic by Keenthemes" />
	<link rel="canonical" href="http://preview.keenthemes.comlanding.html" />
	<link rel="shortcut icon" href="assets/media/logos/favicon.ico" />

	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />


	<link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />

	<script>
		// Frame-busting to prevent site from being loaded within a frame without permission (click-jacking) if (window.top != window.self) { window.top.location.replace(window.self.location.href); }
	</script>
</head>


<body id="kt_body" data-bs-spy="scroll" data-bs-target="#kt_landing_menu" class="bg-body position-relative app-blank">

	<script>
		var defaultThemeMode = "light";
		var themeMode;
		if (document.documentElement) {
			if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
				themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
			} else {
				if (localStorage.getItem("data-bs-theme") !== null) {
					themeMode = localStorage.getItem("data-bs-theme");
				} else {
					themeMode = defaultThemeMode;
				}
			}
			if (themeMode === "system") {
				themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
			}
			document.documentElement.setAttribute("data-bs-theme", themeMode);
		}
	</script>


	<div class="d-flex flex-column flex-root" id="kt_app_root">

		<div class="mb-0" id="home">

			<div class="bgi-no-repeat bgi-size-contain bgi-position-x-center bgi-position-y-bottom landing-dark-bg" style="background-image: url(assets/media/svg/illustrations/landing.svg)">

				<div class="landing-header" data-kt-sticky="true" data-kt-sticky-name="landing-header" data-kt-sticky-offset="{default: '200px', lg: '300px'}">

					<div class="container">

						<div class="d-flex align-items-center justify-content-between">

							<div class="d-flex align-items-center flex-equal">

								<button class="btn btn-icon btn-active-color-primary me-3 d-flex d-lg-none" id="kt_landing_menu_toggle">
									<i class="ki-outline ki-abstract-14 fs-2hx"></i>
								</button>


								<a href="landing.html">
									<img alt="Logo" src="assets/media/logos/landing.svg" class="logo-default h-25px h-lg-30px" />
									<img alt="Logo" src="assets/media/logos/landing-dark.svg" class="logo-sticky h-20px h-lg-25px" />
								</a>

							</div>


							<div class="d-lg-block" id="kt_header_nav_wrapper">
								<div class="d-lg-block p-5 p-lg-0" data-kt-drawer="true" data-kt-drawer-name="landing-menu" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="200px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_landing_menu_toggle" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav_wrapper'}">

									<div class="menu menu-column flex-nowrap menu-rounded menu-lg-row menu-title-gray-600 menu-state-title-primary nav nav-flush fs-5 fw-semibold" id="kt_landing_menu">

										<div class="menu-item">

											<a class="menu-link nav-link active py-3 px-4 px-xxl-6" href="#kt_body" data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Home</a>

										</div>


										<div class="menu-item">

											<a class="menu-link nav-link py-3 px-4 px-xxl-6" href="#how-it-works" data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">How it Works</a>

										</div>


										<div class="menu-item">

											<a class="menu-link nav-link py-3 px-4 px-xxl-6" href="#achievements" data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Achievements</a>

										</div>


										<div class="menu-item">

											<a class="menu-link nav-link py-3 px-4 px-xxl-6" href="#team" data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Team</a>

										</div>


										<div class="menu-item">

											<a class="menu-link nav-link py-3 px-4 px-xxl-6" href="#portfolio" data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Portfolio</a>

										</div>


										<div class="menu-item">

											<a class="menu-link nav-link py-3 px-4 px-xxl-6" href="#pricing" data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Pricing</a>

										</div>

									</div>

								</div>
							</div>


							<div class="flex-equal text-end ms-1">
								<a href="authentication/layouts/corporate/sign-in.html" class="btn btn-success">Sign In</a>
							</div>

						</div>

					</div>

				</div>


				<div class="d-flex flex-column flex-center w-100 min-h-350px min-h-lg-500px px-9">

					<div class="text-center mb-5 mb-lg-10 py-10 py-lg-20">

						<h1 class="text-white lh-base fw-bold fs-2x fs-lg-3x mb-15">Build An Outstanding Solutions
							<br />with
							<span style="background: linear-gradient(to right, #12CE5D 0%, #FFD80C 100%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">
								<span id="kt_landing_hero_text">The Best Theme Ever</span>
							</span>
						</h1>


						<a href="index.html" class="btn btn-primary">Try Metronic</a>

					</div>


					<div class="d-flex flex-center flex-wrap position-relative px-5">

						<div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip" title="Fujifilm">
							<img src="assets/media/svg/brand-logos/fujifilm.svg" class="mh-30px mh-lg-40px" alt="" />
						</div>


						<div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip" title="Vodafone">
							<img src="assets/media/svg/brand-logos/vodafone.svg" class="mh-30px mh-lg-40px" alt="" />
						</div>


						<div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip" title="KPMG International">
							<img src="assets/media/svg/brand-logos/kpmg.svg" class="mh-30px mh-lg-40px" alt="" />
						</div>


						<div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip" title="Nasa">
							<img src="assets/media/svg/brand-logos/nasa.svg" class="mh-30px mh-lg-40px" alt="" />
						</div>


						<div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip" title="Aspnetzero">
							<img src="assets/media/svg/brand-logos/aspnetzero.svg" class="mh-30px mh-lg-40px" alt="" />
						</div>


						<div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip" title="AON - Empower Results">
							<img src="assets/media/svg/brand-logos/aon.svg" class="mh-30px mh-lg-40px" alt="" />
						</div>


						<div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip" title="Hewlett-Packard">
							<img src="assets/media/svg/brand-logos/hp-3.svg" class="mh-30px mh-lg-40px" alt="" />
						</div>


						<div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip" title="Truman">
							<img src="assets/media/svg/brand-logos/truman.svg" class="mh-30px mh-lg-40px" alt="" />
						</div>

					</div>

				</div>

			</div>


			<div class="landing-curve landing-dark-color mb-10 mb-lg-20">
				<svg viewBox="15 12 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M0 11C3.93573 11.3356 7.85984 11.6689 11.7725 12H1488.16C1492.1 11.6689 1496.04 11.3356 1500 11V12H1488.16C913.668 60.3476 586.282 60.6117 11.7725 12H0V11Z" fill="currentColor"></path>
				</svg>
			</div>

		</div>


		<div class="mb-n10 mb-lg-n20 z-index-2">

			<div class="container">

				<div class="text-center mb-17">

					<h3 class="fs-2hx text-gray-900 mb-5" id="how-it-works" data-kt-scroll-offset="{default: 100, lg: 150}">How it Works</h3>


					<div class="fs-5 text-muted fw-bold">Save thousands to millions of bucks by using single tool
						<br />for different amazing and great useful admin
					</div>

				</div>


				<div class="row w-100 gy-10 mb-md-20">

					<div class="col-md-4 px-5">

						<div class="text-center mb-10 mb-md-0">

							<img src="assets/media/illustrations/sketchy-1/2.png" class="mh-125px mb-9" alt="" />


							<div class="d-flex flex-center mb-5">

								<span class="badge badge-circle badge-light-success fw-bold p-5 me-3 fs-3">1</span>


								<div class="fs-5 fs-lg-3 fw-bold text-gray-900">Jane Miller</div>

							</div>


							<div class="fw-semibold fs-6 fs-lg-4 text-muted">Save thousands to millions of bucks
								<br />by using single tool for different
								<br />amazing and great
							</div>

						</div>

					</div>


					<div class="col-md-4 px-5">

						<div class="text-center mb-10 mb-md-0">

							<img src="assets/media/illustrations/sketchy-1/8.png" class="mh-125px mb-9" alt="" />


							<div class="d-flex flex-center mb-5">

								<span class="badge badge-circle badge-light-success fw-bold p-5 me-3 fs-3">2</span>


								<div class="fs-5 fs-lg-3 fw-bold text-gray-900">Setup Your App</div>

							</div>


							<div class="fw-semibold fs-6 fs-lg-4 text-muted">Save thousands to millions of bucks
								<br />by using single tool for different
								<br />amazing and great
							</div>

						</div>

					</div>


					<div class="col-md-4 px-5">

						<div class="text-center mb-10 mb-md-0">

							<img src="assets/media/illustrations/sketchy-1/12.png" class="mh-125px mb-9" alt="" />


							<div class="d-flex flex-center mb-5">

								<span class="badge badge-circle badge-light-success fw-bold p-5 me-3 fs-3">3</span>


								<div class="fs-5 fs-lg-3 fw-bold text-gray-900">Enjoy Nautica App</div>

							</div>


							<div class="fw-semibold fs-6 fs-lg-4 text-muted">Save thousands to millions of bucks
								<br />by using single tool for different
								<br />amazing and great
							</div>

						</div>

					</div>

				</div>


				<div class="tns tns-default">

					<div data-tns="true" data-tns-loop="true" data-tns-swipe-angle="false" data-tns-speed="2000" data-tns-autoplay="true" data-tns-autoplay-timeout="18000" data-tns-controls="true" data-tns-nav="false" data-tns-items="1" data-tns-center="false" data-tns-dots="false" data-tns-prev-button="#kt_team_slider_prev1" data-tns-next-button="#kt_team_slider_next1">

						<div class="text-center px-5 pt-5 pt-lg-10 px-lg-10">
							<img src="assets/media/preview/demos/demo1/light-ltr.png" class="card-rounded shadow mh-lg-650px mw-100" alt="" />
						</div>


						<div class="text-center px-5 pt-5 pt-lg-10 px-lg-10">
							<img src="assets/media/preview/demos/demo2/light-ltr.png" class="card-rounded shadow mh-lg-650px mw-100" alt="" />
						</div>


						<div class="text-center px-5 pt-5 pt-lg-10 px-lg-10">
							<img src="assets/media/preview/demos/demo4/light-ltr.png" class="card-rounded shadow mh-lg-650px mw-100" alt="" />
						</div>


						<div class="text-center px-5 pt-5 pt-lg-10 px-lg-10">
							<img src="assets/media/preview/demos/demo5/light-ltr.png" class="card-rounded shadow mh-lg-650px mw-100" alt="" />
						</div>

					</div>


					<button class="btn btn-icon btn-active-color-primary" id="kt_team_slider_prev1">
						<i class="ki-outline ki-left fs-2x"></i>
					</button>


					<button class="btn btn-icon btn-active-color-primary" id="kt_team_slider_next1">
						<i class="ki-outline ki-right fs-2x"></i>
					</button>

				</div>

			</div>

		</div>


		<div class="mt-sm-n10">

			<div class="landing-curve landing-dark-color">
				<svg viewBox="15 -1 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M1 48C4.93573 47.6644 8.85984 47.3311 12.7725 47H1489.16C1493.1 47.3311 1497.04 47.6644 1501 48V47H1489.16C914.668 -1.34764 587.282 -1.61174 12.7725 47H1V48Z" fill="currentColor"></path>
				</svg>
			</div>


			<div class="pb-15 pt-18 landing-dark-bg">

				<div class="container">

					<div class="text-center mt-15 mb-18" id="achievements" data-kt-scroll-offset="{default: 100, lg: 150}">

						<h3 class="fs-2hx text-white fw-bold mb-5">We Make Things Better</h3>


						<div class="fs-5 text-gray-700 fw-bold">Save thousands to millions of bucks by using single tool
							<br />for different amazing and great useful admin
						</div>

					</div>


					<div class="d-flex flex-center">

						<div class="d-flex flex-wrap flex-center justify-content-lg-between mb-15 mx-auto w-xl-900px">

							<div class="d-flex flex-column flex-center h-200px w-200px h-lg-250px w-lg-250px m-3 bgi-no-repeat bgi-position-center bgi-size-contain" style="background-image: url('assets/media/svg/misc/octagon.svg')">

								<i class="ki-outline ki-element-11 fs-2tx text-white mb-3"></i>


								<div class="mb-0">

									<div class="fs-lg-2hx fs-2x fw-bold text-white d-flex flex-center">
										<div class="min-w-70px" data-kt-countup="true" data-kt-countup-value="700" data-kt-countup-suffix="+">0</div>
									</div>


									<span class="text-gray-600 fw-semibold fs-5 lh-0">Known Companies</span>

								</div>

							</div>


							<div class="d-flex flex-column flex-center h-200px w-200px h-lg-250px w-lg-250px m-3 bgi-no-repeat bgi-position-center bgi-size-contain" style="background-image: url('assets/media/svg/misc/octagon.svg')">

								<i class="ki-outline ki-chart-pie-4 fs-2tx text-white mb-3"></i>


								<div class="mb-0">

									<div class="fs-lg-2hx fs-2x fw-bold text-white d-flex flex-center">
										<div class="min-w-70px" data-kt-countup="true" data-kt-countup-value="80" data-kt-countup-suffix="K+">0</div>
									</div>


									<span class="text-gray-600 fw-semibold fs-5 lh-0">Statistic Reports</span>

								</div>

							</div>


							<div class="d-flex flex-column flex-center h-200px w-200px h-lg-250px w-lg-250px m-3 bgi-no-repeat bgi-position-center bgi-size-contain" style="background-image: url('assets/media/svg/misc/octagon.svg')">

								<i class="ki-outline ki-basket fs-2tx text-white mb-3"></i>


								<div class="mb-0">

									<div class="fs-lg-2hx fs-2x fw-bold text-white d-flex flex-center">
										<div class="min-w-70px" data-kt-countup="true" data-kt-countup-value="35" data-kt-countup-suffix="M+">0</div>
									</div>


									<span class="text-gray-600 fw-semibold fs-5 lh-0">Secure Payments</span>

								</div>

							</div>

						</div>

					</div>


					<div class="fs-2 fw-semibold text-muted text-center mb-3">
						<span class="fs-1 lh-1 text-gray-700">“</span>When you care about your topic, you’ll write about it in a
						<br />
						<span class="text-gray-700 me-1">more powerful</span>, emotionally expressive way
						<span class="fs-1 lh-1 text-gray-700">“</span>
					</div>


					<div class="fs-2 fw-semibold text-muted text-center">
						<a href="account/security.html" class="link-primary fs-4 fw-bold">Marcus Levy,</a>
						<span class="fs-4 fw-bold text-gray-600">KeenThemes CEO</span>
					</div>

				</div>

			</div>


			<div class="landing-curve landing-dark-color">
				<svg viewBox="15 12 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M0 11C3.93573 11.3356 7.85984 11.6689 11.7725 12H1488.16C1492.1 11.6689 1496.04 11.3356 1500 11V12H1488.16C913.668 60.3476 586.282 60.6117 11.7725 12H0V11Z" fill="currentColor"></path>
				</svg>
			</div>

		</div>


		<div class="py-10 py-lg-20">

			<div class="container">

				<div class="text-center mb-12">

					<h3 class="fs-2hx text-gray-900 mb-5" id="team" data-kt-scroll-offset="{default: 100, lg: 150}">Our Great Team</h3>


					<div class="fs-5 text-muted fw-bold">It’s no doubt that when a development takes longer to complete, additional costs to
						<br />integrate and test each extra feature creeps up and haunts most of us.
					</div>

				</div>


				<div class="tns tns-default" style="direction: ltr">

					<div data-tns="true" data-tns-loop="true" data-tns-swipe-angle="false" data-tns-speed="2000" data-tns-autoplay="true" data-tns-autoplay-timeout="18000" data-tns-controls="true" data-tns-nav="false" data-tns-items="1" data-tns-center="false" data-tns-dots="false" data-tns-prev-button="#kt_team_slider_prev" data-tns-next-button="#kt_team_slider_next" data-tns-responsive="{1200: {items: 3}, 992: {items: 2}}">

						<div class="text-center">

							<div class="octagon mx-auto mb-5 d-flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center" style="background-image:url('assets/media/avatars/300-1.jpg')"></div>


							<div class="mb-0">

								<a href="#" class="text-gray-900 fw-bold text-hover-primary fs-3">Paul Miles</a>


								<div class="text-muted fs-6 fw-semibold mt-1">Development Lead</div>

							</div>

						</div>


						<div class="text-center">

							<div class="octagon mx-auto mb-5 d-flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center" style="background-image:url('assets/media/avatars/300-2.jpg')"></div>


							<div class="mb-0">

								<a href="#" class="text-gray-900 fw-bold text-hover-primary fs-3">Melisa Marcus</a>


								<div class="text-muted fs-6 fw-semibold mt-1">Creative Director</div>

							</div>

						</div>


						<div class="text-center">

							<div class="octagon mx-auto mb-5 d-flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center" style="background-image:url('assets/media/avatars/300-5.jpg')"></div>


							<div class="mb-0">

								<a href="#" class="text-gray-900 fw-bold text-hover-primary fs-3">David Nilson</a>


								<div class="text-muted fs-6 fw-semibold mt-1">Python Expert</div>

							</div>

						</div>


						<div class="text-center">

							<div class="octagon mx-auto mb-5 d-flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center" style="background-image:url('assets/media/avatars/300-20.jpg')"></div>


							<div class="mb-0">

								<a href="#" class="text-gray-900 fw-bold text-hover-primary fs-3">Anne Clarc</a>


								<div class="text-muted fs-6 fw-semibold mt-1">Project Manager</div>

							</div>

						</div>


						<div class="text-center">

							<div class="octagon mx-auto mb-5 d-flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center" style="background-image:url('assets/media/avatars/300-23.jpg')"></div>


							<div class="mb-0">

								<a href="#" class="text-gray-900 fw-bold text-hover-primary fs-3">Ricky Hunt</a>


								<div class="text-muted fs-6 fw-semibold mt-1">Art Director</div>

							</div>

						</div>


						<div class="text-center">

							<div class="octagon mx-auto mb-5 d-flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center" style="background-image:url('assets/media/avatars/300-12.jpg')"></div>


							<div class="mb-0">

								<a href="#" class="text-gray-900 fw-bold text-hover-primary fs-3">Alice Wayde</a>


								<div class="text-muted fs-6 fw-semibold mt-1">Marketing Manager</div>

							</div>

						</div>


						<div class="text-center">

							<div class="octagon mx-auto mb-5 d-flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center" style="background-image:url('assets/media/avatars/300-9.jpg')"></div>


							<div class="mb-0">

								<a href="#" class="text-gray-900 fw-bold text-hover-primary fs-3">Carles Puyol</a>


								<div class="text-muted fs-6 fw-semibold mt-1">QA Managers</div>

							</div>

						</div>

					</div>


					<button class="btn btn-icon btn-active-color-primary" id="kt_team_slider_prev">
						<i class="ki-outline ki-left fs-2x"></i>
					</button>


					<button class="btn btn-icon btn-active-color-primary" id="kt_team_slider_next">
						<i class="ki-outline ki-right fs-2x"></i>
					</button>

				</div>

			</div>

		</div>


		<div class="mb-lg-n15 position-relative z-index-2">

			<div class="container">

				<div class="card" style="filter: drop-shadow(0px 0px 40px rgba(68, 81, 96, 0.08))">

					<div class="card-body p-lg-20">

						<div class="text-center mb-5 mb-lg-10">

							<h3 class="fs-2hx text-gray-900 mb-5" id="portfolio" data-kt-scroll-offset="{default: 100, lg: 250}">Our Projects</h3>

						</div>


						<div class="d-flex flex-center mb-5 mb-lg-15">

							<ul class="nav border-transparent flex-center fs-5 fw-bold">
								<li class="nav-item">
									<a class="nav-link text-gray-500 text-active-primary px-3 px-lg-6 active" href="#" data-bs-toggle="tab" data-bs-target="#kt_landing_projects_latest">Latest</a>
								</li>
								<li class="nav-item">
									<a class="nav-link text-gray-500 text-active-primary px-3 px-lg-6" href="#" data-bs-toggle="tab" data-bs-target="#kt_landing_projects_web_design">Web Design</a>
								</li>
								<li class="nav-item">
									<a class="nav-link text-gray-500 text-active-primary px-3 px-lg-6" href="#" data-bs-toggle="tab" data-bs-target="#kt_landing_projects_mobile_apps">Mobile Apps</a>
								</li>
								<li class="nav-item">
									<a class="nav-link text-gray-500 text-active-primary px-3 px-lg-6" href="#" data-bs-toggle="tab" data-bs-target="#kt_landing_projects_development">Development</a>
								</li>
							</ul>

						</div>


						<div class="tab-content">

							<div class="tab-pane fade show active" id="kt_landing_projects_latest">

								<div class="row g-10">

									<div class="col-lg-6">

										<a class="d-block card-rounded overlay h-lg-100" data-fslightbox="lightbox-projects" href="assets/media/stock/600x600/img-23.jpg">

											<div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-lg-100 min-h-250px" style="background-image:url('assets/media/stock/600x600/img-23.jpg')"></div>


											<div class="overlay-layer card-rounded bg-dark bg-opacity-25">
												<i class="ki-outline ki-eye fs-3x text-white"></i>
											</div>

										</a>

									</div>


									<div class="col-lg-6">

										<div class="row g-10 mb-10">

											<div class="col-lg-6">

												<a class="d-block card-rounded overlay" data-fslightbox="lightbox-projects" href="assets/media/stock/600x600/img-22.jpg">

													<div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px" style="background-image:url('assets/media/stock/600x600/img-22.jpg')"></div>


													<div class="overlay-layer card-rounded bg-dark bg-opacity-25">
														<i class="ki-outline ki-eye fs-3x text-white"></i>
													</div>

												</a>

											</div>


											<div class="col-lg-6">

												<a class="d-block card-rounded overlay" data-fslightbox="lightbox-projects" href="assets/media/stock/600x600/img-21.jpg">

													<div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px" style="background-image:url('assets/media/stock/600x600/img-21.jpg')"></div>


													<div class="overlay-layer card-rounded bg-dark bg-opacity-25">
														<i class="ki-outline ki-eye fs-3x text-white"></i>
													</div>

												</a>

											</div>

										</div>


										<a class="d-block card-rounded overlay" data-fslightbox="lightbox-projects" href="assets/media/stock/600x400/img-20.jpg">

											<div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px" style="background-image:url('assets/media/stock/600x600/img-20.jpg')"></div>


											<div class="overlay-layer card-rounded bg-dark bg-opacity-25">
												<i class="ki-outline ki-eye fs-3x text-white"></i>
											</div>

										</a>

									</div>

								</div>

							</div>


							<div class="tab-pane fade" id="kt_landing_projects_web_design">

								<div class="row g-10">

									<div class="col-lg-6">

										<a class="d-block card-rounded overlay h-lg-100" data-fslightbox="lightbox-projects" href="assets/media/stock/600x600/img-11.jpg">

											<div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-lg-100 min-h-250px" style="background-image:url('assets/media/stock/600x600/img-11.jpg')"></div>


											<div class="overlay-layer card-rounded bg-dark bg-opacity-25">
												<i class="ki-outline ki-eye fs-3x text-white"></i>
											</div>

										</a>

									</div>


									<div class="col-lg-6">

										<div class="row g-10 mb-10">

											<div class="col-lg-6">

												<a class="d-block card-rounded overlay" data-fslightbox="lightbox-projects" href="assets/media/stock/600x600/img-12.jpg">

													<div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px" style="background-image:url('assets/media/stock/600x600/img-12.jpg')"></div>


													<div class="overlay-layer card-rounded bg-dark bg-opacity-25">
														<i class="ki-outline ki-eye fs-3x text-white"></i>
													</div>

												</a>

											</div>


											<div class="col-lg-6">

												<a class="d-block card-rounded overlay" data-fslightbox="lightbox-projects" href="assets/media/stock/600x600/img-21.jpg">

													<div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px" style="background-image:url('assets/media/stock/600x600/img-21.jpg')"></div>


													<div class="overlay-layer card-rounded bg-dark bg-opacity-25">
														<i class="ki-outline ki-eye fs-3x text-white"></i>
													</div>

												</a>

											</div>

										</div>


										<a class="d-block card-rounded overlay" data-fslightbox="lightbox-projects" href="assets/media/stock/600x400/img-20.jpg">

											<div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px" style="background-image:url('assets/media/stock/600x600/img-20.jpg')"></div>


											<div class="overlay-layer card-rounded bg-dark bg-opacity-25">
												<i class="ki-outline ki-eye fs-3x text-white"></i>
											</div>

										</a>

									</div>

								</div>

							</div>


							<div class="tab-pane fade" id="kt_landing_projects_mobile_apps">

								<div class="row g-10">

									<div class="col-lg-6">

										<div class="row g-10 mb-10">

											<div class="col-lg-6">

												<a class="d-block card-rounded overlay" data-fslightbox="lightbox-projects" href="assets/media/stock/600x600/img-16.jpg">

													<div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px" style="background-image:url('assets/media/stock/600x600/img-16.jpg')"></div>


													<div class="overlay-layer card-rounded bg-dark bg-opacity-25">
														<i class="ki-outline ki-eye fs-3x text-white"></i>
													</div>

												</a>

											</div>


											<div class="col-lg-6">

												<a class="d-block card-rounded overlay" data-fslightbox="lightbox-projects" href="assets/media/stock/600x600/img-12.jpg">

													<div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px" style="background-image:url('assets/media/stock/600x600/img-12.jpg')"></div>


													<div class="overlay-layer card-rounded bg-dark bg-opacity-25">
														<i class="ki-outline ki-eye fs-3x text-white"></i>
													</div>

												</a>

											</div>

										</div>


										<a class="d-block card-rounded overlay" data-fslightbox="lightbox-projects" href="assets/media/stock/600x400/img-15.jpg">

											<div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px" style="background-image:url('assets/media/stock/600x600/img-15.jpg')"></div>


											<div class="overlay-layer card-rounded bg-dark bg-opacity-25">
												<i class="ki-outline ki-eye fs-3x text-white"></i>
											</div>

										</a>

									</div>


									<div class="col-lg-6">

										<a class="d-block card-rounded overlay h-lg-100" data-fslightbox="lightbox-projects" href="assets/media/stock/600x600/img-23.jpg">

											<div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-lg-100 min-h-250px" style="background-image:url('assets/media/stock/600x600/img-23.jpg')"></div>


											<div class="overlay-layer card-rounded bg-dark bg-opacity-25">
												<i class="ki-outline ki-eye fs-3x text-white"></i>
											</div>

										</a>

									</div>

								</div>

							</div>


							<div class="tab-pane fade" id="kt_landing_projects_development">

								<div class="row g-10">

									<div class="col-lg-6">

										<a class="d-block card-rounded overlay h-lg-100" data-fslightbox="lightbox-projects" href="assets/media/stock/600x600/img-15.jpg">

											<div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-lg-100 min-h-250px" style="background-image:url('assets/media/stock/600x600/img-15.jpg')"></div>


											<div class="overlay-layer card-rounded bg-dark bg-opacity-25">
												<i class="ki-outline ki-eye fs-3x text-white"></i>
											</div>

										</a>

									</div>


									<div class="col-lg-6">

										<div class="row g-10 mb-10">

											<div class="col-lg-6">

												<a class="d-block card-rounded overlay" data-fslightbox="lightbox-projects" href="assets/media/stock/600x600/img-22.jpg">

													<div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px" style="background-image:url('assets/media/stock/600x600/img-22.jpg')"></div>


													<div class="overlay-layer card-rounded bg-dark bg-opacity-25">
														<i class="ki-outline ki-eye fs-3x text-white"></i>
													</div>

												</a>

											</div>


											<div class="col-lg-6">

												<a class="d-block card-rounded overlay" data-fslightbox="lightbox-projects" href="assets/media/stock/600x600/img-21.jpg">

													<div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px" style="background-image:url('assets/media/stock/600x600/img-21.jpg')"></div>


													<div class="overlay-layer card-rounded bg-dark bg-opacity-25">
														<i class="ki-outline ki-eye fs-3x text-white"></i>
													</div>

												</a>

											</div>

										</div>


										<a class="d-block card-rounded overlay" data-fslightbox="lightbox-projects" href="assets/media/stock/600x400/img-14.jpg">

											<div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px" style="background-image:url('assets/media/stock/600x600/img-14.jpg')"></div>


											<div class="overlay-layer card-rounded bg-dark bg-opacity-25">
												<i class="ki-outline ki-eye fs-3x text-white"></i>
											</div>

										</a>

									</div>

								</div>

							</div>

						</div>

					</div>

				</div>

			</div>

		</div>


		<div class="mt-sm-n20">

			<div class="landing-curve landing-dark-color">
				<svg viewBox="15 -1 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M1 48C4.93573 47.6644 8.85984 47.3311 12.7725 47H1489.16C1493.1 47.3311 1497.04 47.6644 1501 48V47H1489.16C914.668 -1.34764 587.282 -1.61174 12.7725 47H1V48Z" fill="currentColor"></path>
				</svg>
			</div>


			<div class="py-20 landing-dark-bg">

				<div class="container">

					<div class="d-flex flex-column container pt-lg-20">

						<div class="mb-13 text-center">
							<h1 class="fs-2hx fw-bold text-white mb-5" id="pricing" data-kt-scroll-offset="{default: 100, lg: 150}">Clear Pricing Makes it Easy</h1>
							<div class="text-gray-600 fw-semibold fs-5">Save thousands to millions of bucks by using single tool for different
								<br />amazing and outstanding cool and great useful admin
							</div>
						</div>


						<div class="text-center" id="kt_pricing">

							<div class="nav-group landing-dark-bg d-inline-flex mb-15" data-kt-buttons="true" style="border: 1px dashed #2B4666;">
								<a href="#" class="btn btn-color-gray-600 btn-active btn-active-success px-6 py-3 me-2 active" data-kt-plan="month">Monthly</a>
								<a href="#" class="btn btn-color-gray-600 btn-active btn-active-success px-6 py-3" data-kt-plan="annual">Annual</a>
							</div>


							<div class="row g-10">

								<div class="col-xl-4">
									<div class="d-flex h-100 align-items-center">

										<div class="w-100 d-flex flex-column flex-center rounded-3 bg-body py-15 px-10">

											<div class="mb-7 text-center">

												<h1 class="text-gray-900 mb-5 fw-boldest">Startup</h1>


												<div class="text-gray-500 fw-semibold mb-5">Best Settings for Startups</div>


												<div class="text-center">
													<span class="mb-2 text-primary">$</span>
													<span class="fs-3x fw-bold text-primary" data-kt-plan-price-month="99" data-kt-plan-price-annual="999">99</span>
													<span class="fs-7 fw-semibold opacity-50" data-kt-plan-price-month="/ Mon" data-kt-plan-price-annual="/ Ann">/ Mon</span>
												</div>

											</div>


											<div class="w-100 mb-10">

												<div class="d-flex flex-stack mb-5">
													<span class="fw-semibold fs-6 text-gray-800 text-start pe-3">Up to 10 Active Users</span>
													<i class="ki-outline ki-check-circle fs-1 text-success"></i>
												</div>


												<div class="d-flex flex-stack mb-5">
													<span class="fw-semibold fs-6 text-gray-800 text-start pe-3">Up to 30 Project Integrations</span>
													<i class="ki-outline ki-check-circle fs-1 text-success"></i>
												</div>


												<div class="d-flex flex-stack mb-5">
													<span class="fw-semibold fs-6 text-gray-800">Keen Analytics Platform</span>
													<i class="ki-outline ki-cross-circle fs-1"></i>
												</div>


												<div class="d-flex flex-stack mb-5">
													<span class="fw-semibold fs-6 text-gray-800">Targets Timelines & Files</span>
													<i class="ki-outline ki-cross-circle fs-1"></i>
												</div>


												<div class="d-flex flex-stack">
													<span class="fw-semibold fs-6 text-gray-800">Unlimited Projects</span>
													<i class="ki-outline ki-cross-circle fs-1"></i>
												</div>

											</div>


											<a href="#" class="btn btn-primary">Select</a>

										</div>

									</div>
								</div>


								<div class="col-xl-4">
									<div class="d-flex h-100 align-items-center">

										<div class="w-100 d-flex flex-column flex-center rounded-3 bg-primary py-20 px-10">

											<div class="mb-7 text-center">

												<h1 class="text-white mb-5 fw-boldest">Business</h1>


												<div class="text-white opacity-75 fw-semibold mb-5">Best Settings for Business</div>


												<div class="text-center">
													<span class="mb-2 text-white">$</span>
													<span class="fs-3x fw-bold text-white" data-kt-plan-price-month="199" data-kt-plan-price-annual="1999">199</span>
													<span class="fs-7 fw-semibold text-white opacity-75" data-kt-plan-price-month="/ Mon" data-kt-plan-price-annual="/ Ann">/ Mon</span>
												</div>

											</div>


											<div class="w-100 mb-10">

												<div class="d-flex flex-stack mb-5">
													<span class="fw-semibold fs-6 text-white opacity-75 text-start pe-3">Up to 10 Active Users</span>
													<i class="ki-outline ki-check-circle fs-1 text-white"></i>
												</div>


												<div class="d-flex flex-stack mb-5">
													<span class="fw-semibold fs-6 text-white opacity-75 text-start pe-3">Up to 30 Project Integrations</span>
													<i class="ki-outline ki-check-circle fs-1 text-white"></i>
												</div>


												<div class="d-flex flex-stack mb-5">
													<span class="fw-semibold fs-6 text-white opacity-75 text-start pe-3">Keen Analytics Platform</span>
													<i class="ki-outline ki-check-circle fs-1 text-white"></i>
												</div>


												<div class="d-flex flex-stack mb-5">
													<span class="fw-semibold fs-6 text-white opacity-75 text-start pe-3">Targets Timelines & Files</span>
													<i class="ki-outline ki-check-circle fs-1 text-white"></i>
												</div>


												<div class="d-flex flex-stack">
													<span class="fw-semibold fs-6 text-white opacity-75">Unlimited Projects</span>
													<i class="ki-outline ki-cross-circle fs-1 text-white"></i>
												</div>

											</div>


											<a href="#" class="btn btn-color-primary btn-active-light-primary btn-light">Select</a>

										</div>

									</div>
								</div>


								<div class="col-xl-4">
									<div class="d-flex h-100 align-items-center">

										<div class="w-100 d-flex flex-column flex-center rounded-3 bg-body py-15 px-10">

											<div class="mb-7 text-center">

												<h1 class="text-gray-900 mb-5 fw-boldest">Enterprise</h1>


												<div class="text-gray-500 fw-semibold mb-5">Best Settings for Enterprise</div>


												<div class="text-center">
													<span class="mb-2 text-primary">$</span>
													<span class="fs-3x fw-bold text-primary" data-kt-plan-price-month="999" data-kt-plan-price-annual="9999">999</span>
													<span class="fs-7 fw-semibold opacity-50" data-kt-plan-price-month="/ Mon" data-kt-plan-price-annual="/ Ann">/ Mon</span>
												</div>

											</div>


											<div class="w-100 mb-10">

												<div class="d-flex flex-stack mb-5">
													<span class="fw-semibold fs-6 text-gray-800 text-start pe-3">Up to 10 Active Users</span>
													<i class="ki-outline ki-check-circle fs-1 text-success"></i>
												</div>


												<div class="d-flex flex-stack mb-5">
													<span class="fw-semibold fs-6 text-gray-800 text-start pe-3">Up to 30 Project Integrations</span>
													<i class="ki-outline ki-check-circle fs-1 text-success"></i>
												</div>


												<div class="d-flex flex-stack mb-5">
													<span class="fw-semibold fs-6 text-gray-800 text-start pe-3">Keen Analytics Platform</span>
													<i class="ki-outline ki-check-circle fs-1 text-success"></i>
												</div>


												<div class="d-flex flex-stack mb-5">
													<span class="fw-semibold fs-6 text-gray-800 text-start pe-3">Targets Timelines & Files</span>
													<i class="ki-outline ki-check-circle fs-1 text-success"></i>
												</div>


												<div class="d-flex flex-stack">
													<span class="fw-semibold fs-6 text-gray-800 text-start pe-3">Unlimited Projects</span>
													<i class="ki-outline ki-check-circle fs-1 text-success"></i>
												</div>

											</div>


											<a href="#" class="btn btn-primary">Select</a>

										</div>

									</div>
								</div>

							</div>

						</div>

					</div>

				</div>

			</div>


			<div class="landing-curve landing-dark-color">
				<svg viewBox="15 12 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M0 11C3.93573 11.3356 7.85984 11.6689 11.7725 12H1488.16C1492.1 11.6689 1496.04 11.3356 1500 11V12H1488.16C913.668 60.3476 586.282 60.6117 11.7725 12H0V11Z" fill="currentColor"></path>
				</svg>
			</div>

		</div>


		<div class="mt-20 mb-n20 position-relative z-index-2">

			<div class="container">

				<div class="text-center mb-17">

					<h3 class="fs-2hx text-gray-900 mb-5" id="clients" data-kt-scroll-offset="{default: 125, lg: 150}">What Our Clients Say</h3>


					<div class="fs-5 text-muted fw-bold">Save thousands to millions of bucks by using single tool
						<br />for different amazing and great useful admin
					</div>

				</div>


				<div class="row g-lg-10 mb-10 mb-lg-20">

					<div class="col-lg-4">

						<div class="d-flex flex-column justify-content-between h-lg-100 px-10 px-lg-0 pe-lg-10 mb-15 mb-lg-0">

							<div class="mb-7">

								<div class="rating mb-6">
									<div class="rating-label me-2 checked">
										<i class="ki-outline ki-star fs-5"></i>
									</div>
									<div class="rating-label me-2 checked">
										<i class="ki-outline ki-star fs-5"></i>
									</div>
									<div class="rating-label me-2 checked">
										<i class="ki-outline ki-star fs-5"></i>
									</div>
									<div class="rating-label me-2 checked">
										<i class="ki-outline ki-star fs-5"></i>
									</div>
									<div class="rating-label me-2 checked">
										<i class="ki-outline ki-star fs-5"></i>
									</div>
								</div>


								<div class="fs-2 fw-bold text-gray-900 mb-3">This is by far the cleanest template
									<br />and the most well structured
								</div>


								<div class="text-gray-500 fw-semibold fs-4">The most well thought out design theme I have ever used. The codes are up to tandard. The css styles are very clean. In fact the cleanest and the most up to standard I have ever seen.</div>

							</div>


							<div class="d-flex align-items-center">

								<div class="symbol symbol-circle symbol-50px me-5">
									<img src="assets/media/avatars/300-1.jpg" class="" alt="" />
								</div>


								<div class="flex-grow-1">
									<a href="#" class="text-gray-900 fw-bold text-hover-primary fs-6">Paul Miles</a>
									<span class="text-muted d-block fw-bold">Development Lead</span>
								</div>

							</div>

						</div>

					</div>


					<div class="col-lg-4">

						<div class="d-flex flex-column justify-content-between h-lg-100 px-10 px-lg-0 pe-lg-10 mb-15 mb-lg-0">

							<div class="mb-7">

								<div class="rating mb-6">
									<div class="rating-label me-2 checked">
										<i class="ki-outline ki-star fs-5"></i>
									</div>
									<div class="rating-label me-2 checked">
										<i class="ki-outline ki-star fs-5"></i>
									</div>
									<div class="rating-label me-2 checked">
										<i class="ki-outline ki-star fs-5"></i>
									</div>
									<div class="rating-label me-2 checked">
										<i class="ki-outline ki-star fs-5"></i>
									</div>
									<div class="rating-label me-2 checked">
										<i class="ki-outline ki-star fs-5"></i>
									</div>
								</div>


								<div class="fs-2 fw-bold text-gray-900 mb-3">This is by far the cleanest template
									<br />and the most well structured
								</div>


								<div class="text-gray-500 fw-semibold fs-4">The most well thought out design theme I have ever used. The codes are up to tandard. The css styles are very clean. In fact the cleanest and the most up to standard I have ever seen.</div>

							</div>


							<div class="d-flex align-items-center">

								<div class="symbol symbol-circle symbol-50px me-5">
									<img src="assets/media/avatars/300-2.jpg" class="" alt="" />
								</div>


								<div class="flex-grow-1">
									<a href="#" class="text-gray-900 fw-bold text-hover-primary fs-6">Janya Clebert</a>
									<span class="text-muted d-block fw-bold">Development Lead</span>
								</div>

							</div>

						</div>

					</div>


					<div class="col-lg-4">

						<div class="d-flex flex-column justify-content-between h-lg-100 px-10 px-lg-0 pe-lg-10 mb-15 mb-lg-0">

							<div class="mb-7">

								<div class="rating mb-6">
									<div class="rating-label me-2 checked">
										<i class="ki-outline ki-star fs-5"></i>
									</div>
									<div class="rating-label me-2 checked">
										<i class="ki-outline ki-star fs-5"></i>
									</div>
									<div class="rating-label me-2 checked">
										<i class="ki-outline ki-star fs-5"></i>
									</div>
									<div class="rating-label me-2 checked">
										<i class="ki-outline ki-star fs-5"></i>
									</div>
									<div class="rating-label me-2 checked">
										<i class="ki-outline ki-star fs-5"></i>
									</div>
								</div>


								<div class="fs-2 fw-bold text-gray-900 mb-3">This is by far the cleanest template
									<br />and the most well structured
								</div>


								<div class="text-gray-500 fw-semibold fs-4">The most well thought out design theme I have ever used. The codes are up to tandard. The css styles are very clean. In fact the cleanest and the most up to standard I have ever seen.</div>

							</div>


							<div class="d-flex align-items-center">

								<div class="symbol symbol-circle symbol-50px me-5">
									<img src="assets/media/avatars/300-16.jpg" class="" alt="" />
								</div>


								<div class="flex-grow-1">
									<a href="#" class="text-gray-900 fw-bold text-hover-primary fs-6">Steave Brown</a>
									<span class="text-muted d-block fw-bold">Development Lead</span>
								</div>

							</div>

						</div>

					</div>

				</div>


				<div class="d-flex flex-stack flex-wrap flex-md-nowrap card-rounded shadow p-8 p-lg-12 mb-n5 mb-lg-n13" style="background: linear-gradient(90deg, #20AA3E 0%, #03A588 100%);">

					<div class="my-2 me-5">

						<div class="fs-1 fs-lg-2qx fw-bold text-white mb-2">Start With Metronic Today,
							<span class="fw-normal">Speed Up Development!</span>
						</div>


						<div class="fs-6 fs-lg-5 text-white fw-semibold opacity-75">Join over 100,000 Professionals Community to Stay Ahead</div>

					</div>


					<a href="https://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?irgwc=1&clickid=Qb1XFm3dIxyIUCez3ZXf1X0mUks0kb3cC2sEUQ0&iradid=275988&irpid=1330466&iradtype=ONLINE_TRACKING_LINK&irmptype=mediapartner&mp_value1=&utm_campaign=af_impact_radius_1330466&utm_medium=affiliate&utm_source=impact_radius" class="btn btn-lg btn-outline border-2 btn-outline-white flex-shrink-0 my-2">Purchase on Themeforest</a>

				</div>

			</div>

		</div>


		<div class="mb-0">

			<div class="landing-curve landing-dark-color">
				<svg viewBox="15 -1 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M1 48C4.93573 47.6644 8.85984 47.3311 12.7725 47H1489.16C1493.1 47.3311 1497.04 47.6644 1501 48V47H1489.16C914.668 -1.34764 587.282 -1.61174 12.7725 47H1V48Z" fill="currentColor"></path>
				</svg>
			</div>


			<div class="landing-dark-bg pt-20">

				<div class="container">

					<div class="row py-10 py-lg-20">

						<div class="col-lg-6 pe-lg-16 mb-10 mb-lg-0">

							<div class="rounded landing-dark-border p-9 mb-10">

								<h2 class="text-white">Would you need a Custom License?</h2>


								<span class="fw-normal fs-4 text-gray-700">Email us to
									<a href="https://keenthemes.com/support" class="text-white opacity-50 text-hover-primary">support@keenthemes.com</a></span>

							</div>


							<div class="rounded landing-dark-border p-9">

								<h2 class="text-white">How About a Custom Project?</h2>


								<span class="fw-normal fs-4 text-gray-700">Use Our Custom Development Service.
									<a href="pages/user-profile/overview.html" class="text-white opacity-50 text-hover-primary">Click to Get a Quote</a></span>

							</div>

						</div>


						<div class="col-lg-6 ps-lg-16">

							<div class="d-flex justify-content-center">

								<div class="d-flex fw-semibold flex-column me-20">

									<h4 class="fw-bold text-gray-500 mb-6">More for Metronic</h4>


									<a href="https://keenthemes.com/faqs" class="text-white opacity-50 text-hover-primary fs-5 mb-6">FAQ</a>


									<a href="https://preview.keenthemes.com/html/metronic/docs" class="text-white opacity-50 text-hover-primary fs-5 mb-6">Documentaions</a>


									<a href="https://www.youtube.com/c/KeenThemesTuts/videos" class="text-white opacity-50 text-hover-primary fs-5 mb-6">Video Tuts</a>


									<a href="https://preview.keenthemes.com/html/metronic/docs/getting-started/changelog" class="text-white opacity-50 text-hover-primary fs-5 mb-6">Changelog</a>


									<a href="https://devs.keenthemes.com/" class="text-white opacity-50 text-hover-primary fs-5 mb-6">Support Forum</a>


									<a href="https://keenthemes.com/blog" class="text-white opacity-50 text-hover-primary fs-5">Blog</a>

								</div>


								<div class="d-flex fw-semibold flex-column ms-lg-20">

									<h4 class="fw-bold text-gray-500 mb-6">Stay Connected</h4>


									<a href="https://www.facebook.com/keenthemes" class="mb-6">
										<img src="assets/media/svg/brand-logos/facebook-4.svg" class="h-20px me-2" alt="" />
										<span class="text-white opacity-50 text-hover-primary fs-5 mb-6">Facebook</span>
									</a>


									<a href="https://github.com/KeenthemesHub" class="mb-6">
										<img src="assets/media/svg/brand-logos/github.svg" class="h-20px me-2" alt="" />
										<span class="text-white opacity-50 text-hover-primary fs-5 mb-6">Github</span>
									</a>


									<a href="https://twitter.com/keenthemes" class="mb-6">
										<img src="assets/media/svg/brand-logos/twitter.svg" class="h-20px me-2" alt="" />
										<span class="text-white opacity-50 text-hover-primary fs-5 mb-6">Twitter</span>
									</a>


									<a href="https://dribbble.com/keenthemes" class="mb-6">
										<img src="assets/media/svg/brand-logos/dribbble-icon-1.svg" class="h-20px me-2" alt="" />
										<span class="text-white opacity-50 text-hover-primary fs-5 mb-6">Dribbble</span>
									</a>


									<a href="https://www.instagram.com/keenthemes" class="mb-6">
										<img src="assets/media/svg/brand-logos/instagram-2-1.svg" class="h-20px me-2" alt="" />
										<span class="text-white opacity-50 text-hover-primary fs-5 mb-6">Instagram</span>
									</a>

								</div>

							</div>

						</div>

					</div>

				</div>


				<div class="landing-dark-separator"></div>


				<div class="container">

					<div class="d-flex flex-column flex-md-row flex-stack py-7 py-lg-10">

						<div class="d-flex align-items-center order-2 order-md-1">

							<a href="landing.html">
								<img alt="Logo" src="assets/media/logos/landing.svg" class="h-15px h-md-20px" />
							</a>


							<span class="mx-5 fs-6 fw-semibold text-gray-600 pt-1" href="https://keenthemes.com">&copy; 2025 Keenthemes Inc.</span>

						</div>


						<ul class="menu menu-gray-600 menu-hover-primary fw-semibold fs-6 fs-md-5 order-1 mb-5 mb-md-0">
							<li class="menu-item">
								<a href="https://keenthemes.com" target="_blank" class="menu-link px-2">About</a>
							</li>
							<li class="menu-item mx-5">
								<a href="https://devs.keenthemes.com" target="_blank" class="menu-link px-2">Support</a>
							</li>
							<li class="menu-item">
								<a href="" target="_blank" class="menu-link px-2">Purchase</a>
							</li>
						</ul>

					</div>

				</div>

			</div>

		</div>


		<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
			<i class="ki-outline ki-arrow-up"></i>
		</div>

	</div>


	<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
		<i class="ki-outline ki-arrow-up"></i>
	</div>


	<script>
		var hostUrl = "assets/";
	</script>

	<script src="assets/plugins/global/plugins.bundle.js"></script>
	<script src="assets/js/scripts.bundle.js"></script>


	<script src="assets/plugins/custom/fslightbox/fslightbox.bundle.js"></script>
	<script src="assets/plugins/custom/typedjs/typedjs.bundle.js"></script>


	<script src="assets/js/custom/landing.js"></script>
	<script src="assets/js/custom/pages/pricing/general.js"></script>


</body>

</html>