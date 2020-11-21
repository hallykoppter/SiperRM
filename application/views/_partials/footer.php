                        <div>
                        	<?php
													$chart = file_get_contents(base_url('getchart'));
													?>
                        	<!-- Card -->
                        	<div>
                        		<!-- breadcrumb -->
                        		<div>
                        			<!-- Container FLuid -->
                        			</main>
                        			<footer class="py-4 bg-light mt-auto">
                        				<div class="container-fluid">
                        					<div class="d-flex align-items-center justify-content-between small">
                        						<div class="text-muted">Copyright &copy; Your Website 2020</div>
                        						<div>
                        							<a href="#">Privacy Policy</a>
                        							&middot;
                        							<a href="#">Terms &amp; Conditions</a>
                        						</div>
                        					</div>
                        				</div>
                        			</footer>
                        		</div>
                        	</div>
                        	<script src="<?php echo base_url() . "assets/sb-admin/jquery/" ?>jquery-3.5.1.min.js"></script>
                        	<script src="<?php echo base_url() . "assets/sb-admin/ajax/" ?>bootstrap.bundle.min.js"></script>
                        	<!-- webcam -->
                        	<script type="text/javascript" src="<?= base_url() ?>assets/sb-admin/webcam/js/filereader.js"></script>
                        	<script type="text/javascript" src="<?= base_url() ?>assets/sb-admin/webcam/js/qrcodelib.js"></script>
                        	<script type="text/javascript" src="<?= base_url() ?>assets/sb-admin/webcam/js/webcodecamjs.js"></script>
                        	<script type="text/javascript" src="<?= base_url() ?>assets/sb-admin/webcam/js/main.js"></script>
                        	<script src="<?php echo base_url() . "assets/sb-admin/dist/" ?>js/scripts.js"></script>
                        	<script src="<?php echo base_url() . "assets/sb-admin/dist/" ?>js/peminjaman.js"></script>
                        	<script src="<?php echo base_url() . "assets/sb-admin/ajax/" ?>Chart.min.jss"></script>
                        	<script src="<?php echo base_url() . "assets/sb-admin/dist/" ?>js/Chart.min.js" crossorigin="anonymous"></script>
                        	<script src="<?php echo base_url() . "assets/sb-admin/dist/" ?>js/custom/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
                        	<script src="<?php echo base_url() . "assets/sb-admin/dist/" ?>js/custom/bootstrap-select/dist/js/i18n/defaults-*.min.js"></script>
                        	<script src="<?php echo base_url() . "assets/sb-admin/dist/" ?>assets/demo/chart-area-demo.js"></script>
                        	<script src="<?php echo base_url() . "assets/sb-admin/ajax/" ?>jquery.dataTables.min.js"></script>
                        	<script src="<?php echo base_url() . "assets/sb-admin/ajax/" ?>dataTables.bootstrap4.min.js"></script>
                        	<script src="<?php echo base_url() . "assets/sb-admin/dist/" ?>assets/demo/datatables-demo.js"></script>
                        	<script src="<?php echo base_url() . "assets/sb-admin/dist/" ?>js/select2.min.js"></script>
                        	<script src="<?php echo base_url() . "assets/" ?>bootstrap-datepicker-master/dist/js/bootstrap-datepicker.min.js"></script>
                        	<script>
                        		$(document).ready(function() {
                        			$(".datepicker").datepicker({
                        				format: "dd-mm-yyyy"
                        			});
                        			$('.js-example-basic-single').select2();
                        			$(".changeStatus").click(function(e) {
                        				e.preventDefault();
                        				var status = $(this).hasClass('btn-success') ? '0' : '1'
                        				var id = $(this).data('id')
                        				$.ajax({
                        					type: 'get',
                        					data: {
                        						status: status,
                        						id: id
                        					},
                        					url: "<?= base_url() . "admin/data-master/pengguna/updateStatus" ?>",
                        					success: function() {
                        						var selector = ".changeStatus[data-id='" + id + "']"
                        						if (status == '1') {
                        							$(selector).removeClass('btn-danger')
                        							$(selector).addClass('btn-success')
                        							$(selector).html('Aktif')
                        						} else {
                        							$(selector).removeClass('btn-success')
                        							$(selector).addClass('btn-danger')
                        							$(selector).html('Non Aktif')
                        						}

                        					}
                        				})
                        			})
                        			$(".changeStatusRM").click(function(e) {
                        				e.preventDefault();
                        				var no_urut = $(this).data('urut');
                        				var status = $(this).data('status')
                        				$.ajax({
                        					type: 'post',
                        					data: {
                        						status: status,
                        						no_urut: no_urut
                        					},
                        					url: "<?= base_url() . "admin/data_rm/updateStatus" ?>",
                        					success: function(respone) {
                        						var selector = ".changeStatusRM[data-status='" + status + "'][data-urut='" + no_urut + "']"
                        						if (status == 0) {
                        							var selector2 = ".changeStatusRM[data-status='1'][data-urut='" + no_urut + "']"
                        							$(selector).removeClass("btn-default")
                        							$(selector).addClass("btn-danger")
                        							$(selector2).removeClass("btn-success")
                        							$(selector2).addClass("btn-default")
                        							//													$(this).attr("data-status","0")
                        						} else {
                        							var selector2 = ".changeStatusRM[data-status='0'][data-urut='" + no_urut + "']"
                        							$(selector).removeClass("btn-default")
                        							$(selector).addClass("btn-success")
                        							$(selector2).removeClass("btn-danger")
                        							$(selector2).addClass("btn-default")
                        							//													$(this).attr("data-status","1")

                        						}
                        					}
                        				})
                        			})
                        		});
                        	</script>
                        	<script>
                        		// Set new default font family and font color to mimic Bootstrap's default styling
                        		Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
                        		Chart.defaults.global.defaultFontColor = '#292b2c';

                        		// Bar Chart Example
                        		var ctx = document.getElementById("myBarChart");
                        		var myLineChart = new Chart(ctx, {
                        			type: 'bar',
                        			data: {
                        				labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
                        				datasets: [{
                        					label: "Revenue",
                        					backgroundColor: "rgba(2,117,216,1)",
                        					borderColor: "rgba(2,117,216,1)",
                        					data: <?php echo $chart; ?>,
                        				}],
                        			},
                        			options: {
                        				scales: {
                        					xAxes: [{
                        						time: {
                        							unit: 'month'
                        						},
                        						gridLines: {
                        							display: false
                        						},
                        						ticks: {
                        							maxTicksLimit: 12
                        						}
                        					}],
                        					yAxes: [{
                        						ticks: {
                        							min: 0,
                        							max: 100,
                        							maxTicksLimit: 12
                        						},
                        						gridLines: {
                        							display: true
                        						}
                        					}],
                        				},
                        				legend: {
                        					display: false
                        				}
                        			}
                        		});
                        	</script>

                        	</body>

                        	</html>