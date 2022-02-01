<footer class="main-footer">
	<strong>Copyright &copy; 2019-<?php echo date('Y');?> <a href="http://www.gedoc-ci.com" target="_blank">Gedoc-ci</a>.</strong>
	Tous droits reservés.
	<div class="float-right d-none d-sm-inline-block">
		<b></b>
	</div>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
	<!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- jQuery -->
<script src="<?php echo base_url('assets/theme/');?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('assets/theme/');?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo base_url('assets/theme/');?>plugins/chart.js/Chart.min.js"></script>
<!-- JQVMap -->
<script src="<?php echo base_url('assets/theme/');?>plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?php echo base_url('assets/theme/');?>plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url('assets/theme/');?>plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url('assets/theme/');?>plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="<?php echo base_url('assets/theme/');?>plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="<?php echo base_url('assets/theme/');?>plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url('assets/theme/');?>plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="<?php echo base_url('assets/theme/');?>plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="<?php echo base_url('assets/theme/');?>plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url('assets/theme/');?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="<?php echo base_url('assets/theme/');?>plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- BS-Stepper -->
<script src="<?php echo base_url('assets/theme/');?>plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- dropzonejs -->
<script src="<?php echo base_url('assets/theme/');?>plugins/dropzone/min/dropzone.min.js"></script>
<!-- Page specific script -->
<script src="<?php echo base_url('assets/theme/');?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('assets/theme/');?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url('assets/theme/');?>dist/js/adminlte.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?php echo base_url('assets/theme/');?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url('assets/theme/');?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url('assets/theme/');?>plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url('assets/theme/');?>plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url('assets/theme/');?>plugins/jszip/jszip.min.js"></script>
<script src="<?php echo base_url('assets/theme/');?>plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo base_url('assets/theme/');?>plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo base_url('assets/theme/');?>plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url('assets/theme/');?>plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url('assets/theme/');?>plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="<?php echo base_url('assets/theme/'); ?>plugins/countup/countUp.min.js"></script>

<script>
	$(function () {
		$("#example1").DataTable({
			"responsive": true, "lengthChange": false, "autoWidth": false,
			"searching": false,
			"buttons": [{
				extend: 'excel',
				title: 'Indexeurs'
			}]
		}).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
		$("#example3").DataTable({
			"responsive": true, "lengthChange": false, "autoWidth": false,
			"searching": false
			/*"buttons": [
				  {
					  extend: 'excel',
					  title: 'Numériseurs'
				  }
			  ]*/
		}).buttons().container().appendTo('#example3_wrapper .col-md-6:eq(0)');
		$("#example4").DataTable({
			"responsive": true, "lengthChange": false, "autoWidth": false,
			"searching": false,
			"buttons": [
				{
					extend: 'excel',
					title: 'Préparateurs'
				}]
		}).buttons().container().appendTo('#example4_wrapper .col-md-6:eq(0)');
		$("#example5").DataTable({
			"responsive": true, "lengthChange": false, "autoWidth": false,
			"searching": false,
			"buttons": [
				{
					extend: 'excel',
					title: 'DONNEES'
				}]
		}).buttons().container().appendTo('#example5_wrapper .col-md-6:eq(0)');
		$('#example2').DataTable({
			"paging": true,
			"lengthChange": false,
			"searching": false,
			"ordering": true,
			"info": true,
			"autoWidth": false,
			"responsive": true,
		});
	});
</script>
<script type="text/javascript">
	$(document).ready(function () {
		bsCustomFileInput.init();
	});
	const Toast = Swal.mixin({
		toast: true,
		position: 'top-center',
		showConfirmButton: false,
		timer: 3000
	});
</script>
<script>
	$(function () {
		/* ChartJS
		 * -------
		 * Here we will create a few charts using ChartJS
		 */
		//-------------
		//- DONUT CHART -
		//-------------
		// Get context with jQuery - using jQuery's .get() method.
		<?php $conn=mysqli_connect("localhost","root","","filestats");
		$mois=date("m");
		$annee=date("Y");
		$deb=date("m/d/Y", mktime(0, 0, 0, $mois, 1 ,$annee));
		$fin=date("m/d/Y", mktime(0, 0, 0, $mois +1, 0, $annee));

		$req3='SELECT * FROM doc_numerises GROUP BY author';
		$res3=mysqli_query($conn,$req3);

		$req4='SELECT author,count(*) AS total FROM doc_numerises GROUP BY author';
		$res4=mysqli_query($conn,$req4);

		$req5='SELECT *,count(*) AS total1 FROM doc_archives GROUP BY author';
		$res5=mysqli_query($conn,$req5);

		$req6='SELECT *,count(*) AS total FROM doc_recales GROUP BY author ';
		$res6=mysqli_query($conn,$req6);

		$req7='SELECT *,sum(nombre) AS total7 FROM tasks INNER JOIN users ON users.id=tasks.user_id
WHERE tasks.date_comptable BETWEEN "'.$deb.'" AND "'.$fin.'" GROUP BY tasks.user_id';
		$res7=mysqli_query($conn,$req7);
		?>
		//-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    var donutData        = {
      labels: [
				<?php while ($v3=mysqli_fetch_assoc($res3)) {
					$auteur[] = $v3['author'];
					echo "'".$v3['author']."',";
				} ?>
      ],
      datasets: [
        {
          data: [<?php while ($v4=mysqli_fetch_assoc($res4)) {
						echo "'".$v4['total']."',";
					}?>],
          backgroundColor : ['#26428B','#A7D8DE','#008B8B','#536878','#DC143C','#9E1B32','#2E2D88','#FFF8E7','#81613C','#B31B1B','#6495ED','#FFF8DC','#FFBCD9','#FFFDD0','#F5F5F5','#00FFFF','#00B7EB','#58427C','#FFD300','#F56FA1','#666699','#654321','#5D3954','#B8860B'
],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions
    })

		//--------------
		//- AREA CHART -
		//--------------

		// Get context with jQuery - using jQuery's .get() method.
		var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

		var areaChartData = {
			//labels  : ['Janvier', 'Fevrier', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
			labels : [<?php while ($v3=mysqli_fetch_assoc($res3)) {
				$auteur[] = $v3['author'];
				echo "'".$v3['author']."',";
			} ?>],
			datasets: [
				{
					label               : 'numerises',
					backgroundColor     : 'rgba(60,141,188,0)',
					borderColor         : 'rgba(60,141,188,0.5)',
					pointRadius          : 5,
					pointColor          : '#3b8bba',
					pointStrokeColor    : 'rgba(60,141,188,1)',
					pointHighlightFill  : '#fff',
					tension: 0,
					pointHighlightStroke: 'rgba(60,141,188,1)',
					data                : [<?php while ($v4=mysqli_fetch_assoc($res4)) {
						echo "'".$v4['total']."',";
					}?>]
				},
			]
		}

		var areaChartOptions = {
			maintainAspectRatio : false,
			responsive : true,
			legend: {
				display: true
			},
			scales: {
				xAxes: [{
					gridLines : {
						display : true,
					}
				}],
				yAxes: [{
					gridLines : {
						display : true,
					}
				}]
			}
		}

		// This will get the first returned node in the jQuery collection.
		var areaChart       = new Chart(areaChartCanvas, {
			type: 'line',
			data: areaChartData,
			options: areaChartOptions
		})


		//-------------
		//- BAR CHART -
		//-------------
		var barChartCanvas = $('#barChart').get(0).getContext('2d')
		var barChartData = $.extend(true, {}, areaChartData)
		var temp0 = areaChartData.datasets[0]
		var temp1 = areaChartData.datasets[1]
		barChartData.datasets[0] = temp1
		barChartData.datasets[1] = temp0

		var barChartOptions = {
			responsive              : true,
			maintainAspectRatio     : false,
			datasetFill             : false
		}

		var barChart = new Chart(barChartCanvas, {
			type: 'bar',
			data: barChartData,
			options: barChartOptions
		})


	})
</script>
<script>
	$(function () {
		//Initialize Select2 Elements
		$('.select2').select2()

		//Initialize Select2 Elements
		$('.select2bs4').select2({
			theme: 'bootstrap4'
		})

		//Datemask dd/mm/yyyy
		$('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
		//Datemask2 mm/dd/yyyy
		$('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
		//Money Euro
		$('[data-mask]').inputmask()

		//Date range picker
		$('#reservationdate').datetimepicker({
			format: 'L'
		});
		//Date range picker
		$('#reservation').daterangepicker()
		//Date range picker with time picker
		$('#reservationtime').daterangepicker({
			timePicker: true,
			timePickerIncrement: 30,
			locale: {
				format: 'MM/DD/YYYY hh:mm A'
			}
		})
		//Date range as a button
		$('#daterange-btn').daterangepicker(
				{
					ranges   : {
						'Today'       : [moment(), moment()],
						'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
						'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
						'Last 30 Days': [moment().subtract(29, 'days'), moment()],
						'This Month'  : [moment().startOf('month'), moment().endOf('month')],
						'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
					},
					startDate: moment().subtract(29, 'days'),
					endDate  : moment()
				},
				function (start, end) {
					$('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
				}
		)

		//Timepicker
		$('#timepicker').datetimepicker({
			format: 'LT'
		})

		//Bootstrap Duallistbox
		$('.duallistbox').bootstrapDualListbox()

		//Colorpicker
		$('.my-colorpicker1').colorpicker()
		//color picker with addon
		$('.my-colorpicker2').colorpicker()

		$('.my-colorpicker2').on('colorpickerChange', function(event) {
			$('.my-colorpicker2 .fa-square').css('color', event.color.toString());
		});

		$("input[data-bootstrap-switch]").each(function(){
			$(this).bootstrapSwitch('state', $(this).prop('checked'));
		});

	})
	// BS-Stepper Init
	document.addEventListener('DOMContentLoaded', function () {
		window.stepper = new Stepper(document.querySelector('.bs-stepper'))
	});

	// DropzoneJS Demo Code Start
	Dropzone.autoDiscover = false;

	// Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
	var previewNode = document.querySelector("#template");
	previewNode.id = "";
	var previewTemplate = previewNode.parentNode.innerHTML;
	previewNode.parentNode.removeChild(previewNode);

	var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
		url: "/target-url", // Set the url
		thumbnailWidth: 80,
		thumbnailHeight: 80,
		parallelUploads: 20,
		previewTemplate: previewTemplate,
		autoQueue: false, // Make sure the files aren't queued until manually added
		previewsContainer: "#previews", // Define the container to display the previews
		clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
	});

	myDropzone.on("addedfile", function(file) {
		// Hookup the start button
		file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file); };
	});

	// Update the total progress bar
	myDropzone.on("totaluploadprogress", function(progress) {
		document.querySelector("#total-progress .progress-bar").style.width = progress + "%";
	});

	myDropzone.on("sending", function(file) {
		// Show the total progress bar when upload starts
		document.querySelector("#total-progress").style.opacity = "1";
		// And disable the start button
		file.previewElement.querySelector(".start").setAttribute("disabled", "disabled");
	});

	// Hide the total progress bar when nothing's uploading anymore
	myDropzone.on("queuecomplete", function(progress) {
		document.querySelector("#total-progress").style.opacity = "0";
	});

	// Setup the buttons for all transfers
	// The "add files" button doesn't need to be setup because the config
	// `clickable` has already been specified.
	document.querySelector("#actions .start").onclick = function() {
		myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED));
	};
	document.querySelector("#actions .cancel").onclick = function() {
		myDropzone.removeAllFiles(true);
	};
	// DropzoneJS Demo Code End
</script>
<?php if(isset($js)){
	if (file_exists($js)) {
		include $js;
	}else{
		echo "<!--page $js file load fail Error 404-->";
	}
}?>

<script type="text/javascript">
	function ShowLoading(e) {
		var div = document.createElement('div');
		var img = document.createElement('img');
		img.src = '<?php echo base_url('assets/theme'); ?>/dist/img/ajax-gif.gif';
		div.innerHTML = "Loading...<br />";
		div.style.cssText = 'width: 100%; height: 100%; top: 0; left: 0; position: fixed; display: block; opacity: 0.7; background-color: #fff; z-index: 99; text-align: center;';
		img.style.cssText = 'position: absolute; top: 25%; left: 45%; z-index: 100; width: 400px;';
		div.appendChild(img);
		document.body.appendChild(div);
		return true;
		// These 2 lines cancel form submission, so only use if needed.
		//window.event.cancelBubble = true;
		//e.stopPropagation();
	}
</script>
<script>
	<!--
	function timedRefresh(timeoutPeriod) {

		setTimeout("location.reload(true);",timeoutPeriod);
	}

	var url = window.location.pathname;
	var filename = url.substring(url.lastIndexOf('/')+1);
	if (filename =='accueil') {
		window.onload = timedRefresh(30000);
	}
	//   -->
</script>
<script type="text/javascript">
  var c = new CountUp("counter", 0, <?php if($nb2): ?>
			<?php foreach ($nb2 as $k): ?>
				<?php echo htmlentities($k->total1);?>
			<?php endforeach ?>
			<?php endif; ?>);
  c.start();
	var d = new CountUp("counter1", 0, <?php if($nb3): ?>
			<?php foreach ($nb3 as $k): ?>
				<?php echo htmlentities(intval($k->total2));?>
			<?php endforeach ?>
			<?php endif; ?>);
  d.start();
</script>
</body>
</html>
