<?php 

use yii\helpers\html;

$this->title = 'Technical Exam - Kumu';



?>



<?php if (yii::$app->session->hasFlash('message')) : ?> 

    <?php echo '<p class="alert alert-success alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'.yii::$app->session->getFlash('message').'</p>'; ?>

<?php endif; ?>


    <div class="row">
        <div class="col-md-8">
    	<h2><strong><?= $title; ?></strong></h2>
    	<br><br>
        </div>

        <div class="pull-right">
            <form class="navbar-form">
           
                <input type="search" class="form-control" placeholder="Search">
              
                <button type="submit" class="btn btn-success">Search</button>
                
          </form>
    	</div>
	</div>



		<div class="table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Phone number</th>
                    <th>Gender</th>
                    <th>Address</th>
                                        <th>Event</th>

                    <th>Registered Date</th>

                    <th>Action</th>

                </tr>
                </thead>
                <tbody>


                	<?php if($register) :?>

                    <?php foreach ($register as $key => $guest)  :?>
                        <tr>
                            <td><b><?php echo $guest->first_name."&nbsp;".$guest->last_name; ?></b><p class="small"><?php echo $guest['email_address']; ?></p></td>
                            <td><?php echo $guest['phone_number']; ?></td>
                            <td><?php echo $guest['gender'] == 'M' ? 'Male' : 'Female'; ?></td>
                            <td class="small"><?php echo $guest['street'].",&nbsp;".$guest['city'].",&nbsp;".$guest['country']."&nbsp;".$guest['zip'] ; ?></td>
                            <td class="small"><b><?php echo $guest['event'] ? $guest['event'] : 'No event selected' ; ?></b></td>
                            <td class="small"><?php echo date('F j, Y h:i A', strtotime ($guest['created_at'])); ?></td>

                             <td>
                                
                                <?= Html::a('Edit', ['edit_guest', 'id' => $guest['id']], ['class' => 'btn btn-warning btn-sm']) ?>
                                                                         
                                <?= Html::a('Delete', ['delete_guest', 'id' => $guest['id']], ['class' => 'btn btn-danger btn-sm']) ?>
                            </td>

                        </tr>
                    <?php endforeach; ?>

                    <?php else :?>

						<tr>
                            <td colspan="7" class="text-center"><span class="help-block">No guest yet.</span></td>
                            


                        </tr>
				
			<?php endif; ?>
                </tbody>
            </table>
        </div>

