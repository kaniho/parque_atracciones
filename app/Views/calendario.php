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
	<head>
		<base href="../">
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
		<link rel="shortcut icon" href="<?= base_url("assets/media/logos/atracciones.png") ?>" />
		<script src="https://kit.fontawesome.com/47d7c4b9a5.js" crossorigin="anonymous"></script>
		<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet"><!-- link para los mensajes -->
		<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script><!-- link para los mensajes -->
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Page Vendor Stylesheets(used by this page)-->
		<link href="<?= base_url("assets/plugins/custom/fullcalendar/fullcalendar.bundle.css") ?>" rel="stylesheet" type="text/css" />
		<!--end::Page Vendor Stylesheets-->
		<!--begin::Global Stylesheets Bundle(used by all pages)-->
		<link href="<?= base_url("assets/plugins/global/plugins.bundle.css") ?>" rel="stylesheet" type="text/css" />
		<link href="<?= base_url("assets/css/style.bundle.css") ?>" rel="stylesheet" type="text/css" />
		<!--begin::Custom Stylesheets-->
		<link href="<?= base_url("assets/css/custom.css") ?>" rel="stylesheet" type="text/css" />
		<!--end::Custom Stylesheets-->
		<!-- FullCalendar CSS -->
		<link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/main.min.css" rel="stylesheet">
		<!--end::Global Stylesheets Bundle-->	
	</head>
	<!--end::Head-->
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
						<a href="../../demo1/dist/index.html">
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
								<!--Sección de panel de administración---->
								<?php if ($session->get('id_rol') == 1): ?>
									<div class="menu-item">
										<a class="menu-link" href="<?= base_url("users") ?>">
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
								<!--Sección de graficos-->
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
									<a class="menu-link active" href="<?= base_url("calendario") ?>">
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
									<a class="menu-link" href="<?= base_url("horarios") ?>">
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
									<a class="menu-link" href="<?= base_url("reservas") ?>">
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
									<a class="menu-link" href="<?= base_url("tickets") ?>">
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
									<a class="menu-link" href="<?= base_url("reviews") ?>">
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
									<a class="menu-link" href="<?= base_url("atracciones") ?>">
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
					<div id="kt_header" class="header align-items-stretch">
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
									<img alt="Logo" src="<?= base_url("assets/media/logos/logo-2.svg")?>" class="h-30px" />
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
														<h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Calendario</h1>
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
															<li class="breadcrumb-item text-dark">Calendario</li>
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
						<!--end::Toolbar-->
						<!--begin::Post-->
						<div class="post d-flex flex-column-fluid" id="kt_post">
							<!--begin::Container-->
							<div id="kt_content_container" class="container-xxl">
								<!--begin::Row-->
								<div class="g-5 gx-xxl-8"> <!-- COMIENZO DEL CALENDARIO -->
									<!--begin::Calendar Widget 1-->
									<div class="card card-xxl-stretch">
										<!--begin::Card header-->
										<div class="card-header">
											<div class="container mt-5">
												<h2>Calendario Dinámico</h2>
												
											</div>
										</div>
										<!--end::Card header-->
										<!--begin::Card body-->
										<div class="card-body">
											<div id="calendar"></div>
										</div>
										<!--end::Card body-->
									</div>

								</div> <!-- FIN DEL CALENDARIO -->
								<!--end::Row-->
							</div>
							<!--end::Container-->
						</div>
						<!--end::Post-->
					</div>
					<!--end::Content-->
					<!-- Modal para añadir evento -->
					<div class="modal fade" id="eventModal" tabindex="-1" aria-labelledby="eventModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="eventModalLabel">Añadir Evento</h5>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
								<div class="modal-body">
									<form id="eventForm" method="POST">
										<div id="eventoError" class="alert alert-danger d-none" role="alert">
											Por favor, ingresa un título para el evento.
										</div>
										<div class="mb-3">
											<label for="eventTitle" class="form-label">Título del Evento</label>
											<input type="text" class="form-control" id="eventTitle" required>
										</div>
										<div class="mb-3">
											<label for="eventDescription" class="form-label">Descripción</label>
											<textarea class="form-control" id="eventDescription" maxlength="50"></textarea>
										</div>
										<input type="hidden" id="eventStart">
										<input type="hidden" id="eventEnd">
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
											<button type="button" class="btn btn-primary" id="saveEvent">Guardar</button>
										</div>
									</form>
								</div>								
							</div>
						</div>
					</div>
					<!-- Fin del Modal para añadir evento -->	
					<!-- Modal de Confirmación para Eliminar -->
					<div class="modal fade" id="deleteEventModal" tabindex="-1" aria-labelledby="deleteEventModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="deleteEventModalLabel">Confirmar Eliminación</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									¿Estás seguro de que quieres eliminar este evento?
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
									<button type="button" class="btn btn-danger" id="confirmDeleteEvent">Eliminar</button>
								</div>
							</div>
						</div>
					</div>
					<!-- Fin del Modal de Confirmación para Eliminar -->			
					<!--begin::Footer-->
					<div class="footer py-4 d-flex flex-lg-column" id="kt_footer"> <!-- COMIENZO DEL FOOTER -->
						<!--begin::Container-->
						<div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
							<!--begin::Copyright-->
							<div class="text-dark order-2 order-md-1">
								<span class="text-muted fw-bold me-1">2025©</span>
								<a href="https://keenthemes.com" target="_blank" class="text-gray-800 text-hover-primary">Keenthemes</a>
							</div>
							<!--end::Copyright-->
							<!--begin::Menu-->
							<ul class="menu menu-gray-600 menu-hover-primary fw-bold order-1">
								<li class="menu-item">
									<a href="https://keenthemes.com" target="_blank" class="menu-link px-2">About</a>
								</li>
								<li class="menu-item">
									<a href="https://keenthemes.com/support" target="_blank" class="menu-link px-2">Support</a>
								</li>
								<li class="menu-item">
									<a href="https://1.envato.market/EA4JP" target="_blank" class="menu-link px-2">Purchase</a>
								</li>
							</ul>
							<!--end::Menu-->
						</div>
						<!--end::Container-->
					</div> <!-- FIN DEL FOOTER -->
					<!--end::Footer-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::Root-->

		<!--end::Scrolltop-->
		<!--end::Main-->
		<script>
			var hostUrl = "assets/";
		</script>
		<!--begin::Javascript-->
		<!--begin::Global Javascript Bundle(used by all pages)-->
		<script src="<?= base_url("assets/plugins/global/plugins.bundle.js")?>"></script>
		<script src="<?= base_url("assets/js/scripts.bundle.js")?>"></script>
		<!--end::Global Javascript Bundle-->
		<!-- FullCalendar JS -->
		<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>
		<!-- jQuery -->
		<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script><!-- link para los mensajes -->

		<script>
			$(document).ready(function () {
				const calendarEl = document.getElementById('calendar');

				// Inicializar FullCalendar
				const calendar = new FullCalendar.Calendar(calendarEl, {
					locale: 'es', // Cambiamos al idioma español
					firstDay : 1,
					initialView: 'dayGridMonth', // Muestra el calendario en vista mensual
					selectable: true, // Permite seleccionar fechas
					editable: true, // Permite arrastrar y modificar eventos

					// Cargar eventos desde el servidor
					events: function(fetchInfo, successCallback, failureCallback) {
						$.ajax({
							url: '<?= base_url('fetch-events') ?>',
							method: 'GET',
							success: function(data) {
								// Transformamos los datos recibidos para que FullCalendar los entienda
								const formatoEvents = data.map(event => ({
									id: event.pk_id_evento, // Identificador del evento en la BD
									title: event.titulo, 
									start: event.fecha_inicio, 
									end: event.fecha_final, 
									description: event.descripcion_ES, // Incluimos la descripción
									allDay: true // Indica que es un evento de todo el día
								}));

								successCallback(formatoEvents); // Envía los eventos al calendario
							},

							error: function() {
								failureCallback(); // En caso de error, no se cargan los eventos
							}
						});
					},

					// Abrir modal al seleccionar una fecha
					select: function (info) {
						$('#eventStart').val(info.startStr); // Rellena el campo con la fecha de inicio seleccionada
						$('#eventEnd').val(info.endStr); // Rellena la fecha de finalización
						$('#eventModal').modal('show'); // Muestra el modal para agregar evento
					},

					// Eliminar evento
					eventClick: function (info) {
						if (confirm('¿Deseas eliminar este evento?')) {
							$.ajax({
								url: '<?= base_url('delete-event') ?>/' + info.event.id, // Elimina el evento desde el backend
								method: 'DELETE',
								success: function() {
									//calendar.refetchEvents();
									info.event.remove(); // Borra el evento del calendario sin necesidad de recargar
								}
							});
						}
					},

					// Renderizarmo los eventos con descripción
					eventDidMount: function(info) {
						if (info.event.extendedProps.description) { // Verifica si el evento tiene descripción
							$(info.el).tooltip({ 
								title: info.event.extendedProps.description, // Muestra la descripción como tooltip
								placement: 'top', // Aparece arriba del evento
								trigger: 'hover', // Se activa al pasar el mouse
								container: 'body' // Se posiciona dentro del cuerpo del documento
							});
						}
					}
				});

				calendar.render();
			
				// Guardar evento al hacer clic en 'Guardar'
				$("#saveEvent").click(function () {
					let title = $("#eventTitle").val().trim(); // Obtiene el título del evento
					let description = $("#eventDescription").val(); // Obtiene la descripción
					let start = $("#eventStart").val(); // Obtiene la fecha de inicio
					let end = $("#eventEnd").val(); // Obtiene la fecha de fin

					if (title === "") {
						$("#eventoError").removeClass("d-none"); // Muestra el mensaje de error
						return; // Detiene la ejecución si el campo está vacío
					}

					// Ocultar mensaje de error si ya se corrigió
					$("#eventoError").addClass("d-none");

					$.ajax({
						url: '<?= base_url('add-event') ?>',
						method: 'POST',
						data: {
							titulo: title,
							fecha_inicio: start,
							fecha_final: end,
							descripcion_ES: description
						},
						success: function () {
							$("#eventModal").modal('hide'); // Cierra el modal
							calendar.refetchEvents(); // Recarga los eventos en el calendario
						}
					});
				});

				// Limpiar los campos del modal cuando se oculta
				$('#eventModal').on('hidden.bs.modal', function () {
					$('#eventTitle').val('');
					$('#eventDescription').val('');
					$('#eventStart').val('');
					$('#eventEnd').val('');
					$("#eventoError").addClass("d-none"); // Ocultar el mensaje de error
				});
			});
		</script>
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>