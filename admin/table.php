	<!-- bootstrap css -->
	<link rel="stylesheet" type="text/css" href="assests/bootstrap/css/bootstrap.min.css">
	<!-- datatables css -->
	<link rel="stylesheet" type="text/css" href="assests/datatables/datatables.min.css">



			<div class="removeMessages"></div>

			<button class="btn btn-default pull pull-right" data-toggle="modal" data-target="#addMember" id="addMemberModalBtn">
				<span class="glyphicon glyphicon-plus-sign"></span>	Tambah data
			</button>

			<br /> <br /> <br />

			<table class="table" id="manageMemberTable">					
				<thead>
					<tr>
						<th>Nama</th>													
						<th>Alamat</th>
						<th>Rekening</th>
						<th>Tipe</th>
						<th>Latidude</th>
						<th>Longitude</th>
						<th>Gambar</th>
						<th>Option</th>
					</tr>
				</thead>
			</table>


<!-- add modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="addMember">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><span class="glyphicon glyphicon-plus-sign"></span>	Tambah Data</h4>
      </div>
      
      <form class="form-horizontal" enctype="multipart/form-data" action="php_action/create.php" method="POST" id="createMemberForm">

      <div class="modal-body">
      	<div class="messages"></div>

		  <div class="form-group"> <!--/here teh addclass has-error will appear -->
		    <label for="nama" class="col-sm-2 control-label">Nama</label>
		    <div class="col-sm-10"> 
		      <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Masjid">
			<!-- here the text will apper  -->
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="alamat" class="col-sm-2 control-label">Alamat</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="rekening" class="col-sm-2 control-label">Rekening</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="rekening" name="rekening" placeholder="Rekening">
		    </div>
			</div>
			<div class="form-group">
			    <label for="type" class="col-sm-2 control-label">Tipe</label>
			    <div class="col-sm-10">
			      <select class="form-control" name="type" id="type">
			      	<option value="">~~PILIH~~</option>
			      	<option value="pra">Prabayar</option>
			      	<option value="pasca">Pascabayar</option>
			      </select>
			    </div>
			</div>
			<div class="form-group">
		    <label for="lat" class="col-sm-2 control-label">Latitude</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="lat" name="lat" placeholder="Latitude">
		    </div>
			</div>
			<div class="form-group">
		    <label for="long" class="col-sm-2 control-label">Longitude</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="long" name="long" placeholder="Longitude">
		    </div>
			</div>
			<div class="form-group">
		    <label for="gambar" class="col-sm-2 control-label">Gambar</label>
		    <div class="col-sm-10">
		      <input type="file" class="form-control" id="gambar" name="gambar">
		    </div>
			</div>	
		  		 		

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form> 
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- /add modal -->

<!-- remove modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="removeMemberModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><span class="glyphicon glyphicon-trash"></span> Remove Member</h4>
      </div>
      <div class="modal-body">
        <p>Do you really want to remove ?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="removeBtn">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- /remove modal -->

<!-- edit modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="editMemberModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><span class="glyphicon glyphicon-edit"></span> Edit Member</h4>
      </div>

	<form class="form-horizontal" action="php_action/apply.php" method="POST" id="updateMemberForm">	      

      <div class="modal-body">
        	
        <div class="edit-messages"></div>

		  <div class="form-group"> <!--/here teh addclass has-error will appear -->
		    <label for="trNama" class="col-sm-2 control-label">Name</label>
		    <div class="col-sm-10"> 
		      <input type="text" class="form-control" id="trNama" name="trNama" placeholder="Nama masjid" disabled>
			<!-- here the text will apper  -->
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="trNohp" class="col-sm-2 control-label">No. HP</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="trNohp" name="trNohp" placeholder="Nomer HP Anda">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="trResi" class="col-sm-2 control-label">Resi/Token</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="trResi" name="trResi" placeholder="Resi/Token">
		    </div>
		  </div>
		  
      </div>
      <div class="modal-footer editMemberModal">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- /edit modal -->

<!-- jquery plugin -->
<script type="text/javascript" src="assests/jquery/jquery.min.js"></script>
<!-- bootstrap js -->
<script type="text/javascript" src="assests/bootstrap/js/bootstrap.min.js"></script>
<!-- datatables js -->
<script type="text/javascript" src="assests/datatables/datatables.min.js"></script>
<!-- include custom index.js -->
<script type="text/javascript" src="custom/js/index.js"></script>
