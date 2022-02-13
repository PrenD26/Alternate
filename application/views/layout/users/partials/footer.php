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
	<?php $this->load->view('layout/users/partials/js') ?>