	<!-- bootstrap css -->
	<link rel="stylesheet" type="text/css" href="assests/bootstrap/css/bootstrap.min.css">
	<!-- datatables css -->
	<link rel="stylesheet" type="text/css" href="assests/datatables/datatables.min.css">



			<center><h1 class="page-header">Infaq Listrik <small>Masjid dan Mushola</small> </h1> </center>

			<div class="removeMessages"></div>

			<button class="btn btn-default pull pull-right" data-toggle="modal" data-target="#addMember" id="addMemberModalBtn" style="display: none">
				<span class="glyphicon glyphicon-plus-sign"></span>	Tambah data
			</button>

			<br /> <br /> <br />

			<table class="table" id="manageMemberTable">					
				<thead>
					<tr>
						<th>Rekening</th>
						<th>Nama</th>													
						<th>Alamat</th>
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
      
      <form class="form-horizontal" action="php_action/create.php" method="POST" id="createMemberForm">

      <div class="modal-body">
      	<div class="messages"></div>

		  <div class="form-group"> <!--/here teh addclass has-error will appear -->
		    <label for="rekening" class="col-sm-2 control-label">Rekening</label>
		    <div class="col-sm-10"> 
		      <input type="text" class="form-control" id="name" name="rekening" placeholder="No Rekening Listrik">
			<!-- here the text will apper  -->
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="nama" class="col-sm-2 control-label">Nama</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="address" name="nama" placeholder="Nama Masjid atau Mushola">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="alamat" class="col-sm-2 control-label">Alamat</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="contact" name="alamat" placeholder="Alamat">
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
