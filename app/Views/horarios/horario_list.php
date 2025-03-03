<!DOCTYPE html>
<!--
Author: Keenthemes
Product Name: Metronic - Bootstrap 5 HTML, VueJS, React, Angular & Laravel Admin Dashboard Theme
Purchase: https://1.envato.market/EA4JP
Website: http://www.keenthemes.com
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->
<html lang="en">
	<!--begin::Head-->
	<head><base href="../">
		<title>Bienvenido a Karmalandia</title>
		<meta name="description" content="The most advanced Bootstrap Admin Theme on Themeforest trusted by 94,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue &amp; Laravel versions. Grab your copy now and get life-time updates for free." />
		<meta name="keywords" content="Metronic, bootstrap, bootstrap 5, Angular, VueJs, React, Laravel, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta charset="utf-8" />
		<meta property="og:locale" content="en_US" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="Metronic - Bootstrap 5 HTML, VueJS, React, Angular &amp; Laravel Admin Dashboard Theme" />
		<meta property="og:url" content="https://keenthemes.com/metronic" />
		<meta property="og:site_name" content="Keenthemes | Metronic" />
		<link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
		<link rel="shortcut icon" href="<?= base_url("assets/media/logos/atracciones.png")?>" />
		<script src="https://kit.fontawesome.com/47d7c4b9a5.js" crossorigin="anonymous"></script>
		<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet"><!-- link para los mensajes -->
		<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script><!-- link para los mensajes -->
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Page Vendor Stylesheets(used by this page)-->
		<link href="<?= base_url("assets/plugins/custom/fullcalendar/fullcalendar.bundle.css")?>" rel="stylesheet" type="text/css" />
		<!--end::Page Vendor Stylesheets-->
		<!--begin::Global Stylesheets Bundle(used by all pages)-->
		<link href="<?= base_url("assets/plugins/global/plugins.bundle.css")?>" rel="stylesheet" type="text/css" />
		<link href="<?= base_url("assets/css/style.bundle.css")?>" rel="stylesheet" type="text/css" />
		<!--begin::Custom Stylesheets-->
		<link href="<?= base_url("assets/css/custom.css") ?>" rel="stylesheet" type="text/css" />
		<!--end::Custom Stylesheets-->
		<!--end::Global Stylesheets Bundle-->
	</head>
	<!--end::Head-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script><!-- link para los mensajes -->
	<!--begin::Body-->
	<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed" style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
		<!--begin::Main-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Page-->
			<div class="page d-flex flex-row flex-column-fluid">
				<!--begin::Aside-->
				<div id="kt_aside" class="aside aside-dark aside-hoverable" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_mobile_toggle">
					<!--begin::Brand-->
					<div class="aside-logo flex-column-auto" id="kt_aside_logo">
						<!--begin::Logo-->
						<a href="<?= base_url("dashboard") ?>">
							<img alt="Logo" src="<?= base_url("assets/media/logos/Karmalandia definitivo blanco.svg")?>" class="h-40px logo" />
						</a>
						<!--end::Logo-->
						<!--begin::Aside toggler-->
						<div id="kt_aside_toggle" class="btn btn-icon w-auto px-0 btn-active-color-primary aside-toggle" data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body" data-kt-toggle-name="aside-minimize">
							<!--begin::Svg Icon | path: icons/duotune/arrows/arr079.svg-->
							<span class="svg-icon svg-icon-1 rotate-180">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
									<path opacity="0.5" d="M14.2657 11.4343L18.45 7.25C18.8642 6.83579 18.8642 6.16421 18.45 5.75C18.0358 5.33579 17.3642 5.33579 16.95 5.75L11.4071 11.2929C11.0166 11.6834 11.0166 12.3166 11.4071 12.7071L16.95 18.25C17.3642 18.6642 18.0358 18.6642 18.45 18.25C18.8642 17.8358 18.8642 17.1642 18.45 16.75L14.2657 12.5657C13.9533 12.2533 13.9533 11.7467 14.2657 11.4343Z" fill="black" />
									<path d="M8.2657 11.4343L12.45 7.25C12.8642 6.83579 12.8642 6.16421 12.45 5.75C12.0358 5.33579 11.3642 5.33579 10.95 5.75L5.40712 11.2929C5.01659 11.6834 5.01659 12.3166 5.40712 12.7071L10.95 18.25C11.3642 18.6642 12.0358 18.6642 12.45 18.25C12.8642 17.8358 12.8642 17.1642 12.45 16.75L8.2657 12.5657C7.95328 12.2533 7.95328 11.7467 8.2657 11.4343Z" fill="black" />
								</svg>
							</span>
							<!--end::Svg Icon-->
						</div>
						<!--end::Aside toggler-->
					</div>
					<!--end::Brand-->
					<!--begin::Aside menu-->
					<?php $session = session(); ?>
					<div class="aside-menu flex-column-fluid">
						<!--begin::Aside Menu-->
						<div class="hover-scroll-overlay-y my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-offset="0">
							<!--begin::Menu-->
							<div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500" id="#kt_aside_menu" data-kt-menu="true">
								<div class="menu-item">
									<div class="menu-content pb-2">
										<span class="menu-section text-muted text-uppercase fs-8 ls-1">Dashboard</span>
									</div>
								</div>
								<!--Sección de Panel de administración-->
								<?php if ($session->get('id_rol') == 1): ?>
									<div class="menu-item">
										<a class="menu-link" href="<?= base_url("users")?>">
											<span class="menu-icon">
												<!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
												<span class="svg-icon svg-icon-2">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
														<rect x="2" y="2" width="9" height="9" rx="2" fill="black" />
														<rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="black" />
														<rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="black" />
														<rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="black" />
													</svg>
												</span>
												<!--end::Svg Icon-->
											</span>
											<span class="menu-title">Panel de Administración</span>
										</a>
									</div>
								<?php endif; ?>
								
								<div class="menu-item">
									<a class="menu-link" href="<?= base_url("dashboard") ?>">
										<span class="menu-icon">
											<!--begin::Svg Icon | path: icons/duotune/art/art002.svg-->
											<span class="svg-icon svg-icon-2">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
													<path opacity="0.3" d="M8.9 21L7.19999 22.6999C6.79999 23.0999 6.2 23.0999 5.8 22.6999L4.1 21H8.9ZM4 16.0999L2.3 17.8C1.9 18.2 1.9 18.7999 2.3 19.1999L4 20.9V16.0999ZM19.3 9.1999L15.8 5.6999C15.4 5.2999 14.8 5.2999 14.4 5.6999L9 11.0999V21L19.3 10.6999C19.7 10.2999 19.7 9.5999 19.3 9.1999Z" fill="black" />
													<path d="M21 15V20C21 20.6 20.6 21 20 21H11.8L18.8 14H20C20.6 14 21 14.4 21 15ZM10 21V4C10 3.4 9.6 3 9 3H4C3.4 3 3 3.4 3 4V21C3 21.6 3.4 22 4 22H9C9.6 22 10 21.6 10 21ZM7.5 18.5C7.5 19.1 7.1 19.5 6.5 19.5C5.9 19.5 5.5 19.1 5.5 18.5C5.5 17.9 5.9 17.5 6.5 17.5C7.1 17.5 7.5 17.9 7.5 18.5Z" fill="black" />
												</svg>
											</span>
											<!--end::Svg Icon-->
										</span>
										<span class="menu-title">Dashboard</span>
									</a>
								</div>
								<!--Sección de calendario-->
								<div class="menu-item">
									<a class="menu-link" href="<?= base_url("calendario") ?>">
										<span class="menu-icon">
											<!--begin::Svg Icon | path: icons/duotune/art/art002.svg-->
											<span class="svg-icon svg-icon-2">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
													<path opacity="0.3" d="M8.9 21L7.19999 22.6999C6.79999 23.0999 6.2 23.0999 5.8 22.6999L4.1 21H8.9ZM4 16.0999L2.3 17.8C1.9 18.2 1.9 18.7999 2.3 19.1999L4 20.9V16.0999ZM19.3 9.1999L15.8 5.6999C15.4 5.2999 14.8 5.2999 14.4 5.6999L9 11.0999V21L19.3 10.6999C19.7 10.2999 19.7 9.5999 19.3 9.1999Z" fill="black" />
													<path d="M21 15V20C21 20.6 20.6 21 20 21H11.8L18.8 14H20C20.6 14 21 14.4 21 15ZM10 21V4C10 3.4 9.6 3 9 3H4C3.4 3 3 3.4 3 4V21C3 21.6 3.4 22 4 22H9C9.6 22 10 21.6 10 21ZM7.5 18.5C7.5 19.1 7.1 19.5 6.5 19.5C5.9 19.5 5.5 19.1 5.5 18.5C5.5 17.9 5.9 17.5 6.5 17.5C7.1 17.5 7.5 17.9 7.5 18.5Z" fill="black" />
												</svg>
											</span>
											<!--end::Svg Icon-->
										</span>
										<span class="menu-title">Calendario</span>
									</a>
								</div>
								<!--Sección de horarios-->
								<div class="menu-item">
									<a class="menu-link active" href="<?= base_url("horarios")?>">
										<span class="menu-icon">
											<!--begin::Svg Icon | path: icons/duotune/art/art002.svg-->
											<span class="svg-icon svg-icon-2">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
													<path opacity="0.3" d="M8.9 21L7.19999 22.6999C6.79999 23.0999 6.2 23.0999 5.8 22.6999L4.1 21H8.9ZM4 16.0999L2.3 17.8C1.9 18.2 1.9 18.7999 2.3 19.1999L4 20.9V16.0999ZM19.3 9.1999L15.8 5.6999C15.4 5.2999 14.8 5.2999 14.4 5.6999L9 11.0999V21L19.3 10.6999C19.7 10.2999 19.7 9.5999 19.3 9.1999Z" fill="black" />
													<path d="M21 15V20C21 20.6 20.6 21 20 21H11.8L18.8 14H20C20.6 14 21 14.4 21 15ZM10 21V4C10 3.4 9.6 3 9 3H4C3.4 3 3 3.4 3 4V21C3 21.6 3.4 22 4 22H9C9.6 22 10 21.6 10 21ZM7.5 18.5C7.5 19.1 7.1 19.5 6.5 19.5C5.9 19.5 5.5 19.1 5.5 18.5C5.5 17.9 5.9 17.5 6.5 17.5C7.1 17.5 7.5 17.9 7.5 18.5Z" fill="black" />
												</svg>
											</span>
											<!--end::Svg Icon-->
										</span>
										<span class="menu-title">Horarios</span>
									</a>
								</div>
								<!--Sección de Reservas-->
								<div class="menu-item">
									<a class="menu-link" href="<?= base_url("reservas")?>">
										<span class="menu-icon">
											<!--begin::Svg Icon | path: icons/duotune/art/art002.svg-->
											<span class="svg-icon svg-icon-2">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
													<path opacity="0.3" d="M8.9 21L7.19999 22.6999C6.79999 23.0999 6.2 23.0999 5.8 22.6999L4.1 21H8.9ZM4 16.0999L2.3 17.8C1.9 18.2 1.9 18.7999 2.3 19.1999L4 20.9V16.0999ZM19.3 9.1999L15.8 5.6999C15.4 5.2999 14.8 5.2999 14.4 5.6999L9 11.0999V21L19.3 10.6999C19.7 10.2999 19.7 9.5999 19.3 9.1999Z" fill="black" />
													<path d="M21 15V20C21 20.6 20.6 21 20 21H11.8L18.8 14H20C20.6 14 21 14.4 21 15ZM10 21V4C10 3.4 9.6 3 9 3H4C3.4 3 3 3.4 3 4V21C3 21.6 3.4 22 4 22H9C9.6 22 10 21.6 10 21ZM7.5 18.5C7.5 19.1 7.1 19.5 6.5 19.5C5.9 19.5 5.5 19.1 5.5 18.5C5.5 17.9 5.9 17.5 6.5 17.5C7.1 17.5 7.5 17.9 7.5 18.5Z" fill="black" />
												</svg>
											</span>
											<!--end::Svg Icon-->
										</span>
										<span class="menu-title">Reservas</span>
									</a>
								</div>
								<!--Sección de tickets-->
								<div class="menu-item">
									<a class="menu-link" href="<?= base_url("tickets")?>">
										<span class="menu-icon">
											<!--begin::Svg Icon | path: icons/duotune/art/art002.svg-->
											<span class="svg-icon svg-icon-2">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
													<path opacity="0.3" d="M8.9 21L7.19999 22.6999C6.79999 23.0999 6.2 23.0999 5.8 22.6999L4.1 21H8.9ZM4 16.0999L2.3 17.8C1.9 18.2 1.9 18.7999 2.3 19.1999L4 20.9V16.0999ZM19.3 9.1999L15.8 5.6999C15.4 5.2999 14.8 5.2999 14.4 5.6999L9 11.0999V21L19.3 10.6999C19.7 10.2999 19.7 9.5999 19.3 9.1999Z" fill="black" />
													<path d="M21 15V20C21 20.6 20.6 21 20 21H11.8L18.8 14H20C20.6 14 21 14.4 21 15ZM10 21V4C10 3.4 9.6 3 9 3H4C3.4 3 3 3.4 3 4V21C3 21.6 3.4 22 4 22H9C9.6 22 10 21.6 10 21ZM7.5 18.5C7.5 19.1 7.1 19.5 6.5 19.5C5.9 19.5 5.5 19.1 5.5 18.5C5.5 17.9 5.9 17.5 6.5 17.5C7.1 17.5 7.5 17.9 7.5 18.5Z" fill="black" />
												</svg>
											</span>
											<!--end::Svg Icon-->
										</span>
										<span class="menu-title">Tickets</span>
									</a>
								</div>
								<!--Sección de Reseñas-->
								<div class="menu-item">
									<a class="menu-link" href="<?= base_url("reviews")?>">
										<span class="menu-icon">
											<!--begin::Svg Icon | path: icons/duotune/art/art002.svg-->
											<span class="svg-icon svg-icon-2">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
													<path opacity="0.3" d="M8.9 21L7.19999 22.6999C6.79999 23.0999 6.2 23.0999 5.8 22.6999L4.1 21H8.9ZM4 16.0999L2.3 17.8C1.9 18.2 1.9 18.7999 2.3 19.1999L4 20.9V16.0999ZM19.3 9.1999L15.8 5.6999C15.4 5.2999 14.8 5.2999 14.4 5.6999L9 11.0999V21L19.3 10.6999C19.7 10.2999 19.7 9.5999 19.3 9.1999Z" fill="black" />
													<path d="M21 15V20C21 20.6 20.6 21 20 21H11.8L18.8 14H20C20.6 14 21 14.4 21 15ZM10 21V4C10 3.4 9.6 3 9 3H4C3.4 3 3 3.4 3 4V21C3 21.6 3.4 22 4 22H9C9.6 22 10 21.6 10 21ZM7.5 18.5C7.5 19.1 7.1 19.5 6.5 19.5C5.9 19.5 5.5 19.1 5.5 18.5C5.5 17.9 5.9 17.5 6.5 17.5C7.1 17.5 7.5 17.9 7.5 18.5Z" fill="black" />
												</svg>
											</span>
											<!--end::Svg Icon-->
										</span>
										<span class="menu-title">Reseñas</span>
									</a>
								</div>
								<!--Sección de Atracciones-->
								<div class="menu-item">
									<a class="menu-link" href="<?= base_url("atracciones")?>">
										<span class="menu-icon">
											<!--begin::Svg Icon | path: icons/duotune/art/art002.svg-->
											<span class="svg-icon svg-icon-2">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
													<path opacity="0.3" d="M8.9 21L7.19999 22.6999C6.79999 23.0999 6.2 23.0999 5.8 22.6999L4.1 21H8.9ZM4 16.0999L2.3 17.8C1.9 18.2 1.9 18.7999 2.3 19.1999L4 20.9V16.0999ZM19.3 9.1999L15.8 5.6999C15.4 5.2999 14.8 5.2999 14.4 5.6999L9 11.0999V21L19.3 10.6999C19.7 10.2999 19.7 9.5999 19.3 9.1999Z" fill="black" />
													<path d="M21 15V20C21 20.6 20.6 21 20 21H11.8L18.8 14H20C20.6 14 21 14.4 21 15ZM10 21V4C10 3.4 9.6 3 9 3H4C3.4 3 3 3.4 3 4V21C3 21.6 3.4 22 4 22H9C9.6 22 10 21.6 10 21ZM7.5 18.5C7.5 19.1 7.1 19.5 6.5 19.5C5.9 19.5 5.5 19.1 5.5 18.5C5.5 17.9 5.9 17.5 6.5 17.5C7.1 17.5 7.5 17.9 7.5 18.5Z" fill="black" />
												</svg>
											</span>
											<!--end::Svg Icon-->
										</span>
										<span class="menu-title">Atracciones</span>
									</a>
								</div>
			
							</div>
							<!--end::Menu-->
						</div>
						<!--end::Aside Menu-->
					</div>
					<!--end::Aside menu-->
					<!--begin::Footer-->
					<div class="aside-footer flex-column-auto pt-5 pb-7 px-5" id="kt_aside_footer">
						<!--PARTE DE LA CUENTA DE USUARIO-->
						<!--begin::User-->
						<?php $session = session(); ?>
						<div class="d-flex align-items-center ms-1 ms-lg-3" id="kt_header_user_menu_toggle">
							<!--begin::Menu wrapper-->
							<div class="cursor-pointer symbol symbol-30px symbol-md-40px" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
								<img src="<?= base_url("assets/media/avatars/150-26.jpg") ?>" alt="user" />
							</div>
							<div class="menu-item px-3">
								<div class="menu-content d-flex align-items-center px-3">
								
									<!--end::Avatar-->
									<!--begin::Username-->
									<div class="d-flex flex-column">
										<div class="fw-bolder d-flex align-items-center fs-5"><span style="color: white;"> <?= esc($session->get('name')) ?></span>
											<span class="badge badge-light-success fw-bolder fs-8 px-2 py-1 ms-2"><?= esc($session->get('rol')) ?></span>
										</div>
										<a href="#" class="fw-bold text-muted text-hover-primary fs-7"><?= esc($session->get('email')) ?></a>
									</div>
									<!--end::Username-->
								</div>
							</div>
							<!--begin::Menu-->
							<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px" data-kt-menu="true">								
								<!--begin::Menu item-->
								<div class="menu-item px-5">
									<a href="<?= base_url("info_users") ?>" class="menu-link px-5">Mi perfil</a>
								</div>
								<!--end::Menu item-->
								<!--begin::Menu item-->
								<div class="menu-item px-5 my-1">
									<a href="<?= base_url("settings") ?>" class="menu-link px-5">Configuraciones de la cuenta</a>
								</div>
								<!--end::Menu item-->
								<!--begin::Menu item-->
								<div class="menu-item px-5">
									<a href="<?= base_url('logout') ?>" class="menu-link px-5">Cerrar sesión</a>
								</div>
								<!--end::Menu item-->							
							</div>
							<!--end::Menu-->
							<!--end::Menu wrapper-->
						</div>										
						<!-- FIN DE PARTE DE LA CUENTA DE USUARIO-->
					</div>						
					<!--end::Footer-->
				</div>


				<!--end::Aside-->
				<!--begin::Wrapper-->
				<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
					<!--begin::Header-->
					<div id="kt_header"  class="header align-items-stretch">
						<!--begin::Container-->
						<div class="container-fluid d-flex align-items-stretch justify-content-between">
							<!--begin::Aside mobile toggle-->
							<div class="d-flex align-items-center d-lg-none ms-n3 me-1" title="Show aside menu">
								<div class="btn btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px" id="kt_aside_mobile_toggle">
									<!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
									<span class="svg-icon svg-icon-2x mt-1">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
											<path d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z" fill="black" />
											<path opacity="0.3" d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z" fill="black" />
										</svg>
									</span>
									<!--end::Svg Icon-->
								</div>
							</div>
							<!--end::Aside mobile toggle-->
							<!--begin::Mobile logo-->
							<div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
								<a href="../../demo1/dist/index.html" class="d-lg-none">
									<img alt="Logo" src="assets/media/logos/logo-2.svg" class="h-30px" />
								</a>
							</div>
							<!--end::Mobile logo-->
							<!--begin::Wrapper-->
							<div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1">
								<!--begin::Navbar-->
								<div class="d-flex align-items-stretch" id="kt_header_nav">
									<!--begin::Menu wrapper-->
									<div class="header-menu align-items-stretch" data-kt-drawer="true" data-kt-drawer-name="header-menu" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="end" data-kt-drawer-toggle="#kt_header_menu_mobile_toggle" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav'}">
										<!--begin::Menu-->
										<div class="menu menu-lg-rounded menu-column menu-lg-row menu-state-bg menu-title-gray-700 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-400 fw-bold my-5 my-lg-0 align-items-stretch" id="#kt_header_menu" data-kt-menu="true">
											<div class="menu-item me-lg-1">
												<!-- INICIO DEL HEADER CON LAS MIGAS DE PAN -->
												<div id="kt_toolbar_container" class="container-fluid d-flex flex-stack"><!-- migas de pan -->
													<!--begin::Page title-->
													<div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
														<!--begin::Title-->
														<h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Horarios</h1>
														<!--end::Title-->
														<!--begin::Separator-->
														<span class="h-20px border-gray-200 border-start mx-4"></span>
														<!--end::Separator-->
														<!--begin::Breadcrumb-->
														<ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
															<!--begin::Item-->
															<li class="breadcrumb-item text-muted">
																<a href="../../demo1/dist/index.html" class="text-muted text-hover-primary">Home</a>
															</li>
															<!--end::Item-->
															<!--begin::Item-->
															<li class="breadcrumb-item">
																<span class="bullet bg-gray-200 w-5px h-2px"></span>
															</li>
															<!--end::Item-->
															<!--begin::Item-->
															<li class="breadcrumb-item text-dark">Listado de Horarios</li>
															<!--end::Item-->
														</ul>
														<!--end::Breadcrumb-->
													</div>
													<!--end::Page title-->			
												</div><!-- fin migas de pan -->												
											</div>										
										</div>											
										<!--end::Menu-->
									</div>									
									<!--end::Menu wrapper-->
								</div>
								<!--end::Navbar-->							
							</div>
							<!--end::Wrapper-->
						</div>
						<!--end::Container-->
					</div>
					<!--end::Header-->


					
					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Toolbar-->
						<?php if (session()->getFlashdata('success')): ?>
							<script>
								toastr.success('<?= session()->getFlashdata('success'); ?>');
							</script>
						<?php endif; ?>
						<?php if (session()->getFlashdata('error')): ?>
							<script>
								toastr.error('<?= session()->getFlashdata('error'); ?>');
							</script>
						<?php endif; ?>
						<!--end::Toolbar-->

						<!--begin::Post-->
						<div class="post d-flex flex-column-fluid" id="kt_post">
							<!--begin::Container-->
							<div id="kt_content_container" class="container-xxl">
								<!--begin::Card-->
								<div class="card">
									<!--begin::Card body-->
									<div class="card-body">

										<!--COMIENZO DEL CARD DE LA PARTE DEL LISTADO DE USUARIO-->
										
										<!--begin::Card header-->
										<div class="card-header border-0 pt-6">
											<!--begin::Card title-->
											<div class="card-title">
												<!--begin::Search-->
												<div class="d-flex align-items-center position-relative my-1"> <!-- FORMULARIO DE búsqueda -->
													<!-- Formulario de búsqueda -->
													<!--<form method="GET" action="<?= base_url("horarios") ?>" >
														<div class="input-group w-auto">
															<input type="text" name="name" class="form-control" placeholder="Nombre" value="">
															<button type="submit" class="btn btn-primary">Buscar</button>
														</div>
													</form>-->
												</div>
												<!-- FORMULARIO DE búsqueda -->												
											</div>

											<h1 class="text-center">Listado de horarios</h1>

											<!--begin::Card title-->
											<!--begin::Card toolbar-->
											<div class="card-toolbar">
												<!--begin::Toolbar-->
												<div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
													<!--begin::Filter-->
													<div class="px-7 d-flex align-items-center justify-content-between">
														<?php if ($filtrosActivos > 0): ?>
															<span class="badge bg-danger ms-2">Filtros activados: <?= $filtrosActivos ?></span>
														<?php endif; ?>
													</div>
													<button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
													<!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
													<span class="svg-icon svg-icon-2">
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
															<path d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z" fill="black" />
														</svg>
													</span>
													<!--end::Svg Icon-->Filtrar</button>
													<!--begin::Menu 1-->
													<div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
														<!--begin::Header-->
														<div class="px-7 py-5">
															<div class="fs-5 text-dark fw-bolder">Opciones de Filtrado</div>
														</div>
														<!--end::Header-->
														<!--begin::Separator-->
														<div class="separator border-gray-200"></div>
														<!--end::Separator-->
														<!--begin::Content-->
														<div class="px-7 py-5" data-kt-user-table-filter="form">
															<!--begin::Input group-->
															<form method="GET" action="<?= base_url("horarios") ?>" > <!-- SECCIÓN DEL FILTRO PARA LAS BUSQUEDAS -->
																<div class="mb-5">
																	<label class="form-label fs-6 fw-bold">Nombre:</label>						
																	<div class="input-group w-auto">
																		<input type="text" name="nombre" class="form-control" placeholder="Nombre" value="<?= esc($nombre) ?>">
																	</div>																	
																</div>
																<!--end::Input group-->
																<!--begin::Input group-->
																<div class="mb-5">
																	<label class="form-label fs-6 fw-bold">Horario de Inicio:</label>
																	<div class="input-group w-auto">
																		<input type="text" name="horarioInicio" class="form-control" placeholder="Horario de Inicio" value="<?= esc($horarioInicio) ?>">
																	</div>
																</div>
																<!--end::Input group-->
																<!--begin::Input group-->
																<div class="mb-5">
																	<label class="form-label fs-6 fw-bold">Horario de Finilización:</label>
																	<div class="input-group w-auto">
																		<input type="text" name="horarioFinalizacion" class="form-control" placeholder="Horario de Finilización" value="<?= esc($horarioFinalizacion) ?>">																	
																	</div>
																</div>
																<!--end::Input group-->
																<!--begin::Input group-->
																<div class="mb-5">
																	<label class="form-label fs-6 fw-bold">Mostrar Usuarios:</label>
																	<div class="input-group w-auto">
																	<select name="horarioArchivado" id="horarioArchivado" class="form-select">
																		<option value="0" <?= $horarioArchivado === '0' ? 'selected' : '' ?>>No Archivados</option>
																		<option value="1" <?= $horarioArchivado === '1' ? 'selected' : '' ?>>Archivados</option>
																		<option value="2" <?= $horarioArchivado === '2' ? 'selected' : '' ?>>Todos</option>
																	</select>
																	</div>
																</div>
																<!--end::Input group-->
																<!--begin::Actions-->
																<div class="d-flex justify-content-end">
																	<button type="reset" class="btn btn-light btn-active-light-primary fw-bold me-2 px-6" onclick="window.location.href='<?= base_url("horarios") ?>'">Restablece</button>
																	<button type="submit" class="btn btn-primary">Buscar</button>
																</div>
																<!--end::Actions-->
															</form>
														</div>
														<!--end::Content-->
													</div>
													<!--end::Menu 1-->
													<!--end::Filter-->
													<!--begin::Export-->
													<form method="GET" action="<?= base_url('horarios/exportExcel') ?>">
														<input type="hidden" name="nombre" value="<?= esc($nombre) ?>">
														<input type="hidden" name="horarioInicio" value="<?= esc($horarioInicio) ?>">
														<input type="hidden" name="horarioFinalizacion" value="<?= esc($horarioFinalizacion) ?>">														
														<input type="hidden" name="horarioArchivado" value="<?= esc($horarioArchivado) ?>">
														<button type="submit" class="btn btn-light-primary me-3">
															<!--begin::Svg Icon | path: icons/duotune/arrows/arr078.svg-->
															<span class="svg-icon svg-icon-2">
																<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																	<rect opacity="0.3" x="12.75" y="4.25" width="12" height="2" rx="1" transform="rotate(90 12.75 4.25)" fill="black" />
																	<path d="M12.0573 6.11875L13.5203 7.87435C13.9121 8.34457 14.6232 8.37683 15.056 7.94401C15.4457 7.5543 15.4641 6.92836 15.0979 6.51643L12.4974 3.59084C12.0996 3.14332 11.4004 3.14332 11.0026 3.59084L8.40206 6.51643C8.0359 6.92836 8.0543 7.5543 8.44401 7.94401C8.87683 8.37683 9.58785 8.34458 9.9797 7.87435L11.4427 6.11875C11.6026 5.92684 11.8974 5.92684 12.0573 6.11875Z" fill="black" />
																	<path d="M18.75 8.25H17.75C17.1977 8.25 16.75 8.69772 16.75 9.25C16.75 9.80228 17.1977 10.25 17.75 10.25C18.3023 10.25 18.75 10.6977 18.75 11.25V18.25C18.75 18.8023 18.3023 19.25 17.75 19.25H5.75C5.19772 19.25 4.75 18.8023 4.75 18.25V11.25C4.75 10.6977 5.19771 10.25 5.75 10.25C6.30229 10.25 6.75 9.80228 6.75 9.25C6.75 8.69772 6.30229 8.25 5.75 8.25H4.75C3.64543 8.25 2.75 9.14543 2.75 10.25V19.25C2.75 20.3546 3.64543 21.25 4.75 21.25H18.75C19.8546 21.25 20.75 20.3546 20.75 19.25V10.25C20.75 9.14543 19.8546 8.25 18.75 8.25Z" fill="#C4C4C4" />
																</svg>
															</span>
															<!--end::Svg Icon-->Exportar a Excel
														</button>
													</form>	
													<!--end::Export-->
													<!--begin::Add user-->
													<?php if ($session->get('id_rol') == 1): ?>
														<a href="<?= base_url('horarios/save') ?>" class="btn btn-primary ">
															<span class="svg-icon svg-icon-2">
																<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																	<rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black" />
																	<rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black" />
																</svg>
															</span>
														Crear</a> <!-- BOTÓN DE CREAR HORARIO -->
													<?php endif; ?>
													<!--end::Svg Icon-->
													<!--end::Add user-->
												</div>
												<!--end::Toolbar-->																						
											</div>
											<!--end::Card toolbar-->
										</div>
										<!--end::Card header-->
										<!--begin::Card body-->
										<div class="card-body pt-0">
											<?php if (!empty($horarios) && is_array($horarios)): ?>
												<!--begin::Table-->
												<table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
													<!--begin::Table head-->
													<thead>
														<!--begin::Table row-->
														<tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
															<th class="w-10px pe-2">
																<div class="form-check form-check-sm form-check-custom form-check-solid me-3">
																	<input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_table_users .form-check-input" value="1" />
																</div>
															</th>
															
															<th class="min-w-125px"><a href="<?= base_url('horarios?sort=nombre_horario&order=' . ($sort == 'nombre_horario' && $order == 'asc' ? 'desc' : 'asc')) ?>">Nombre</a></th>
															<th class="min-w-125px"><a href="<?= base_url('horarios?sort=hora_inicio&order=' . ($sort == 'hora_inicio' && $order == 'asc' ? 'desc' : 'asc')) ?>">Horario de inicio</a></th>
															<th class="min-w-125px"><a href="<?= base_url('horarios?sort=hora_fin&order=' . ($sort == 'hora_fin' && $order == 'asc' ? 'desc' : 'asc')) ?>">Horario de finalización</a></th>
															<?php if ($session->get('id_rol') == 1): ?>
																<th class="text-end min-w-100px">Acciones</th>
															<?php endif; ?>
														</tr>
														<!--end::Table row-->
													</thead>
													<!--end::Table head-->
													<!--begin::Table body-->
													<tbody class="text-gray-600 fw-bold">
														<?php foreach ($horarios as $horario): ?>
															<tr> <!-- PRUEBA -->
																<!--begin::Checkbox-->
																<td>
																	<div class="form-check form-check-sm form-check-custom form-check-solid">
																		<input class="form-check-input" type="checkbox" value="1" />
																	</div>
																</td>
																<!--end::Checkbox-->
																<!--begin::User=-->
																<td class="position-relative">
																	<?php if ($horario['archivado']): ?>
																		<div  id="archivado"></div> <!-- esto es para identificar los datos que estan archivado -->
																	<?php endif; ?>
																	<?= esc($horario['nombre_horario']) ?> <!-- PARTE DEL FOREACH DONDE PILLA EL NOMBRE DEL HORARIO -->																		
																</td>
																<!--end::User=-->
																<!--begin::Role=-->

																<!--end::Role=-->

																<!--begin::Two step=-->
																<td>
																<?= esc($horario['hora_inicio']) ?> <!-- PARTE DEL FOREACH DONDE PILLA LA HORA DE INICIO -->
																</td>
																<!--end::Two step=-->
																<!--begin::Joined-->
																<td>
																<?= esc($horario['hora_fin']) ?> <!-- PARTE DEL FOREACH DONDE PILLA LA HORA DE FINALIZACIÓN -->
																</td> 

																<!--begin::Joined-->
																<!--begin::Action=-->
																<?php if ($session->get('id_rol') == 1): ?>
																	<td class="text-end">
																		<a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Acciones
																		<!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
																		<span class="svg-icon svg-icon-5 m-0">
																			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																				<path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black" />
																			</svg>
																		</span>
																		<!--end::Svg Icon--></a>
																		<!--begin::Menu-->
																		<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
																			<!--begin::Menu item-->
																			<div class="menu-item px-3">
																				<a href="<?= base_url('horarios/save/' . $horario['id']) ?>" class="menu-link px-3">
																					Editar<i class="fa-regular fa-pen-to-square ms-4"></i>
																				</a>  <!-- AQUI PONEMOS EL LINK PARA EDITAR EL USUARIO -->
																			</div>
																			<!--end::Menu item-->
																			<!--begin::Menu item-->
																			<div class="menu-item px-3">
																			<?php if ($horario['archivado']): ?>
																				<form action="<?= base_url('horarios/restore/' . $horario['id']) ?>" method="GET" onsubmit="event.preventDefault(); showConfirmModal(this);">
																					<button type="submit" class="menu-link px-3 btn btn-sm btn-link" id="btn-archivar" data-kt-users-table-filter="delete_row">Desarchivar <i class="fa-solid fa-trash ms-4"></i></button>
																				</form><!-- AQUI PONEMOS EL LINK PARA RESTAURAR LA ATRACCIÓN -->
																			<?php else: ?>
																				<form action="<?= base_url('horarios/delete/' . $horario['id']) ?>" method="GET" onsubmit="event.preventDefault(); showConfirmModal(this);">
																					<button type="submit" class="menu-link px-3 btn btn-sm btn-link" id="btn-archivar" data-kt-users-table-filter="delete_row">Archivar <i class="fa-solid fa-trash ms-4"></i></button>
																				</form><!-- AQUI PONEMOS EL LINK PARA ELIMINAR LA ATRACCIÓN -->
																			<?php endif; ?>
																			</div>
																			<!--end::Menu item-->
																		</div>
																		<!--end::Menu-->
																	</td>
																<?php endif; ?>
																<!--end::Action=-->
															</tr>
														<?php endforeach; ?>
														<!--end::Table row-->
													</tbody>
													<!--end::Table body-->
												</table>
												<!--end::Table-->
												<!-- Paginador -->
												<div class="mt-4">
													<div class="d-flex justify-content-between align-items-center">
														<div class="d-flex align-items-center">
															<label for="perPage" class="form-label me-2">Elementos por página:</label>
															<select name="perPage" id="perPage" class="form-select form-select-sm" style="width: auto;" onchange="changePerPage()">
																<option value="3" <?= $perPage == 3 ? 'selected' : '' ?>>3</option>
																<option value="5" <?= $perPage == 5 ? 'selected' : '' ?>>5</option>
																<option value="10" <?= $perPage == 10 ? 'selected' : '' ?>>10</option>
																<option value="20" <?= $perPage == 20 ? 'selected' : '' ?>>20</option>
															</select>
														</div>
														<div>													
															<?= $pager->only(['nombre', 'horarioInicio', 'horariofinalizacion', 'horarioArchivado'])->links("default", "custom_pagination") ?> <!-- Usa la plantila predeterminada -->
														</div>
													</div>													
												</div>
											<?php else: ?>
												<p class="text-center">No hay horarios registradas.</p>
											<?php endif; ?>
										</div>
										<!--end::Card body-->
										<!--FIN DEL CARD DE LA PARTE DEL LISTADO DE USUARIO-->
										<!-- Modal de confirmación -->
										<div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="confirmModalLabel">Confirmar acción</h5>
														<button type="button" class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
															<span class="svg-icon svg-icon-1">
																<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																	<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
																	<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
																</svg>
															</span>
														</button>
													</div>
													<div class="modal-body">
														¿Estás seguro de que deseas realizar esta acción?
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancelar</button>
														<button type="button" class="btn btn-primary" id="confirmButton">Confirmar</button>
													</div>
												</div>
											</div>
										</div>
									<!-- FIN DE LA PARTE DEL MODAL -->
									</div>
									<!--end::Card body-->
								</div>
									
							</div>
							<!--end::Container-->
						</div>
						<!--end::Post-->
					</div>
					<!--end::Content-->
					<!--begin::Footer-->
					<div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
						<!--begin::Container-->
						<div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
							<!--begin::Copyright-->
							<div class="text-dark order-2 order-md-1">
								<span class="text-muted fw-bold me-1">2025©</span>
								<a href="https://keenthemes.com" target="_blank" class="text-gray-800 text-hover-primary">Keenthemes</a>
							</div>
						</div>
						<!--end::Container-->
					</div>
					<!--end::Footer-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
	
		<!--end::Main-->
		<script>var hostUrl = "assets/";</script>
		<!--begin::Javascript-->
		<!--begin::Global Javascript Bundle(used by all pages)-->
		<script src="<?= base_url("assets/plugins/global/plugins.bundle.js")?>"></script>
		<script src="<?= base_url("assets/js/scripts.bundle.js")?>"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Page Vendors Javascript(used by this page)-->
		<script src="assets/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>
		<!--end::Page Vendors Javascript-->
		<!--begin::Page Custom Javascript(used by this page)-->
		<script src="<?= base_url("assets/js/custom.js") ?>"></script>
		<script src="assets/js/custom/apps/calendar/calendar.js"></script>
		<script src="assets/js/custom/widgets.js"></script>
		<script src="assets/js/custom/apps/chat/chat.js"></script>
		<script src="assets/js/custom/modals/create-app.js"></script>
		<script src="assets/js/custom/modals/upgrade-plan.js"></script>
		<!--end::Page Custom Javascript-->
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>