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
				scrollY:        "300px",
        scrollX:        true,
        scrollCollapse: true,
        paging:         false,
        fixedColumns:   true
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