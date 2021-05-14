	<table class="bordered highlight">
		<thead>
			<tr>
				<th><i class="material-icons  hide-on-med-and-down">filter_1</i><b>  ID</b></th>
				<th class="center-align"><i class="material-icons  hide-on-med-and-down">mail</i><b>  Email</b></th>
				<th class="center-align"><i class="material-icons  hide-on-med-and-down">format_color_text</i><b>  Subject</b></th>
				<th class="center-align"><i class="material-icons  hide-on-med-and-down">question_answer</i><b>  Message</b></th>
				<th><i class="material-icons  hide-on-med-and-down">alarm</i><b>  Date/Time</b></th>
				<th><i class="material-icons  hide-on-med-and-down">content_cut</i><b>  Action</b></th>

			</tr>	
		</thead>	
		<tbody>


		<?php

			$query = "SELECT * FROM contact ORDER BY id DESC";

			$con_query = mysqli_query($conn,$query);

			if(!$con_query){
				die("CONTACT QUERY PROBLEM" . mysqli_error($conn));
			}

			while ($row = mysqli_fetch_assoc($con_query)) {

				$con_id = $row['id'];
				$con_name = $row['name'];
				$con_mail = $row['email'];
				$con_msg = $row['msg'];
				$con_date = $row['date'];

			?>	

			<tr>
					<td><?php echo $con_id;?></td>
					<td><?php echo $con_name;?></td>
					<td><?php echo $con_mail;?></td>
					<td><?php echo $con_msg;?></td>
					<td><?php echo date('d-m-Y  || h:i:a', strtotime ($con_date));?></td>
					<td><a rel="<?php echo $con_id ?>"  id="<?php echo $con_msg . ' by ' . $con_name ;?>" class="delcmt  edit-cat-btn modal-close modal-trigger waves-effect waves-light hoverable white-text" href="#modal1" ><b><i class="material-icons">close</i></b></a></td>
			</tr>

			<?php
			}
		?>


		
					
			</tbody>	
	</table>	



	<!-- MODAL -->

		  <!-- Modal Structure -->
    <div id="modal1" class="modal  red lighten-1" >
    <div class="modal-content">
      <a style="float: right;" class="modal-close waves-effect waves-red btn-flat"><i class="material-icons">close</i></a>

      <h5><b>Delete message</b></h5>
      <hr class="line">
      <p>Are you sure about deleting this message? <br><b>"<span class="para">  </span>"</b>
      </p>
    </div>
    <div class="modal-footer">
      <a href="" class="modalDel modal-close waves-effect waves-green btn-flat">Yes</a>
      <a class="modal-close waves-effect waves-red btn-flat">Cancel</a>

    </div>
  </div>
	<!-- END OF MODAL -->



	<script>
		$('document').ready(function(){

			$('.delpst').click(function(){
				alert "hello";
			})
		})
	</script>