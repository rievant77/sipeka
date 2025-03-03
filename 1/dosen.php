<?php

session_start();
include "../koneksi.php";
include "auth_user.php";
?>
<!DOCTYPE html>
<html>
 <head>
    <meta charset="utf-8">
    <title>Terminal Pasirhayam</title>
	<!-- Library CSS -->
	<?php
		include "bundle_css.php";
	?>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.1/moment.min.js"></script>



<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

<script type="text/javascript">
$(function() {
$('input[name="daritgl"]').daterangepicker({
autoUpdateInput: false,
locale: {
	format : 'YYYY-MM-DD'
}
});
$('input[name="daritgl"]').on('apply.daterangepicker', function(ev, picker) {
$(this).val(picker.startDate.format('YYYY-MM-DD') + "' And '" + picker.endDate.format('YYYY-MM-DD'));
});
$('input[name="daritgl"]').on('cancel.daterangepicker', function(ev, picker) {
$(this).val('');
});
});
</script>

  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      <?php
        include 'content_header.php';
       ?>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <p></p>
            </div>
          </div><!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
              <li class="header"><h4><b><center>Menu Panel</center></b></h4></li>
              <li><a href="index.php"><i class="fa fa-home"></i><span>Dashboard</span></a></li>
			  <li class="active"><a href="dosen.php"><i class="fa fa-user"></i><span>Angkutan</span></a></li>
			  <li><a href="user.php"><i class="fa fa-user-circle-o"></i><span>User</span></a></li>
		  </ul>	  
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Terminal
          </h1>
          <ol class="breadcrumb">
            <li><i class="fa fa-user"></i> Terminal</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">

                </div><!-- /.box-header -->
                <div class="box-body">
				<a href="#"><button class="btn btn-success" type="button" data-target="#ModalAdd" data-toggle="modal"><i class="fa fa-plus"></i> Tambah</button></a>

				<a href="#"><button class="btn btn-primary" type="button" data-target="#exampleModal" data-toggle="modal"><i class="fa fa-print"></i> Print Berdasarkan Tanggal Keluar</button></a>

				<a href="report-all-1.php" target="_blank"><button class="btn btn-primary" type="button"><i class="fa fa-print"></i> Print Semua</button></a>

                  <br></br>


				  <table id="data" class="table table-bordered table-striped table-scalable">
						<?php
							include "dt_dosen.php";
						?>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
		
		<!-- Modal Popup Dosen -->
		<div id="ModalAdd" class="modal fade" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Tambah</h4>
					</div>

					<div class="modal-body">
						<form action="dosen_add.php" name="modal_popup" enctype="multipart/form-data" method="post">
							<div class="form-group">
								<label>No. Kendaraan</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-id-card"></i>
										</div>
										<input name="id" type="hidden" class="form-control"/>
										<input name="noken" type="text" class="form-control"/>
									</div>
							</div>
							<!--div class="form-group">
								<label>Perusahaan PO</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-user"></i>
										</div>
										<input name="po" type="text" class="form-control" />
									</div>
							</div-->
							<div class="form-group">
								<label>Nama Supir</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-user"></i>
										</div>
										<input name="supir" type="text" class="form-control" />
									</div>
							</div>
							<div class="form-group">
								<label>No uji</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-user"></i>
										</div>
										<input name="uji" type="text" class="form-control" />
									</div>
							</div>
							<div class="form-group">
								<label>Masa Berlaku KP</label>
									<div class="input-group date">
										<div class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</div>
										<input id="kp" name="kp" type="text" class="form-control">
									</div>
							</div>

							<div class="form-group">
								<label>Tgl Keluar Kendaraan</label>
									<div class="input-group date">
										<div class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</div>
										<input id="keluar" name="keluar" type="text" class="form-control">
									</div>
							</div>

							<div class="form-group">
								<label>Naik Turun Penumpang</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-user"></i>
										</div>
										<input name="naik" type="text" class="form-control" placeholder="Penumpang Naik" />
										<div class="input-group-addon">
											<i class="fa fa-user"></i>
										</div>
										<input name="turun" type="text" class="form-control" placeholder="Penumpang Turun" />
									</div>
							</div>

							<!--div class="form-group">
								<label>Jumlah</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-user"></i>
										</div>
										<input name="jml" type="text" class="form-control" />
									</div>
							</div-->
							<div class="form-group" method="post">
								<label>Kelengapan</label>
								<div class="input-group" class="checkbox">
								<label><input name="kel[]" type="checkbox" value="Ban Cadangan">Ban Cadangan</label>
								</div>
								<div class="input-group" class="checkbox">
								<label><input name="kel[]" type="checkbox" value="Segitiga Pengaman">Segitiga Pengaman</label>
								</div>
								<div class="input-group" class="checkbox">
								<label><input name="kel[]" type="checkbox" value="Dongkrak">Dongkrak</label>
								</div>
								<div class="input-group" class="checkbox-inline">
								<label><input name="kel[]" type="checkbox" value="Pembuka Roda">Pembuka Roda</label>
								</div>
								<div class="input-group" class="checkbox-inline">
								<label><input name="kel[]" type="checkbox" value="Lampu senter">Lampu Senter</label>	
								</div>
							</div>

							
							
							<div class="modal-footer">
								<button class="btn btn-success" type="submit" name="simpan" value="simpan">
									Add
								</button>
								<button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">
									Cancel
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		
		<!-- Modal -->
		<form method="$_GET" action="report-filter-1.php" target="_blank">
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><small>PRINT FILTER DATE</small></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
              <div class="form-group">
                <label>Masukan Tanggal</label>
                <input type="text" id="daritgl" name="daritgl" class="form-control"></div>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button class="btn btn-primary" type="submit" name="submit" value="proses"
                    onclick="return valid();">Print</button>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>

    </form>
    <!--end modal-->

		<!-- Modal Popup Dosen Edit -->
		<div id="ModalEditDosen" class="modal fade" tabindex="-1" role="dialog"></div>
		
		<!-- Modal Popup untuk delete--> 
		<div class="modal fade" id="modal_delete">
			<div class="modal-dialog">
				<div class="modal-content" style="margin-top:100px;">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" style="text-align:center;">Are you sure to delete this information ?</h4>
					</div>    
					<div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
						<a href="#" class="btn btn-danger" id="delete_link">Delete</a>
						<button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
					</div>
				</div>
			</div>
			</div>



		</div>
		<?php
		include	"content_footer.php";
	?>
	

    </div>
    </div><!-- ./wrapper -->
	<!-- Library Scripts -->
	<?php
		include "bundle_script.php";
	?>
  </body>
</html>
