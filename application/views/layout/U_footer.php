	<!-- Footer-->
	<footer class="footer footer-dark py-4">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-4 text-lg-start">Copyright &copy; 2021 - <?php echo date("Y"); ?> Alternate</div>
				<div class="col-lg-4 my-3 my-lg-0">

				</div>
				<div class="col-lg-4 text-lg-end">
					<a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a>
					<a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
					<a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-instagram"></i></a>
				</div>
			</div>
		</div>
	</footer>


	<!-- Modal -->
	<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="staticBackdropLabel">Lacak Status</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<form action="<?php echo base_url('landing_page/hasil') ?>" method="GET">
							<div class="row ">
								<div class="col-10 ms-3">
									<div class="form-group ">
										<input type="text" class="form-control form-control-lg bg-light" id="cari" name="cari" placeholder="Masukkan No Transaksi Kamu...">
										<p class="text-left font-italic text-muted">Input TRS-1641727528 for demo</p>
									</div>
								</div>
								<div class="col">
									<button type="submit" class="btn btn-block btn-lg btn-primary" value="Cari">Cari
										!</button>

								</div>
							</div>

						</form>
					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- Bootstrap core JS-->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<!-- Core theme JS-->
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
	<script src="https://cdn.datatables.net/fixedcolumns/4.0.1/js/dataTables.fixedColumns.min.js"></script>
	<!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
	<!-- * *                               SB Forms JS                               * *-->
	<!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
	<!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
	<script>
		$(document).ready(function() {
			$('#example').DataTable({
				scrollY: "300px",
				scrollX: true,
				scrollCollapse: true,
				paging: false,
				fixedColumns: true
			});
		});

		function inputAngka(evt) {
			var charCode = (evt.charCode);
			if (charCode > 31 && (charCode < 48 || charCode > 57) && charCode != 45) {
				return false;
			} else {
				return true;
			}
		}
		/*!
		 * Start Bootstrap - Agency v7.0.10 (https://startbootstrap.com/theme/agency)
		 * Copyright 2013-2021 Start Bootstrap
		 * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-agency/blob/master/LICENSE)
		 */
		//
		// Scripts
		// 

		window.addEventListener('DOMContentLoaded', event => {

			// Navbar shrink function
			var navbarShrink = function() {
				const navbarCollapsible = document.body.querySelector('#mainNav');
				if (!navbarCollapsible) {
					return;
				}
				if (window.scrollY === 0) {
					navbarCollapsible.classList.remove('navbar-shrink')
				} else {
					navbarCollapsible.classList.add('navbar-shrink')
				}

			};

			// Shrink the navbar 
			navbarShrink();

			// Shrink the navbar when page is scrolled
			document.addEventListener('scroll', navbarShrink);

			// Activate Bootstrap scrollspy on the main nav element
			const mainNav = document.body.querySelector('#mainNav');
			if (mainNav) {
				new bootstrap.ScrollSpy(document.body, {
					target: '#mainNav',
					offset: 74,
				});
			};

			// Collapse responsive navbar when toggler is visible
			const navbarToggler = document.body.querySelector('.navbar-toggler');
			const responsiveNavItems = [].slice.call(
				document.querySelectorAll('#navbarResponsive .nav-link')
			);
			responsiveNavItems.map(function(responsiveNavItem) {
				responsiveNavItem.addEventListener('click', () => {
					if (window.getComputedStyle(navbarToggler).display !== 'none') {
						navbarToggler.click();
					}
				});
			});

		});
	</script>