<?php 

use yii\helpers\html;
//use yii\widgets\ActiveForm;

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
                    <th>Event Name</th>
                    <th>Location</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Status</th>
                    <th>Action</th>

                </tr>
                </thead>
                <tbody>


                	<?php if($events) :?>

                    <?php foreach ($events as $key => $event)  :?>
                        <tr>
                            <td><?php echo $event->event_name; ?></td>
                            <td><?php echo $event['event_location']; ?></td>
                            <td><?php echo date('F j, Y l', strtotime ($event['event_date'])); ?></td>
							<td><?php echo date('h:i A', strtotime ($event['event_time'])); ?></td>
                            <td><?php echo $event['event_status'] ? 'Active' : 'Inactive'; ?></td>
                            <td>
                                 <?php // Html::a('View', ['edit_event', 'id' => $event['event_id']], ['class' => 'btn btn-info btn-sm']) ?>
                                <?= Html::a('Edit', ['edit_event', 'id' => $event['event_id']], ['class' => 'btn btn-warning btn-sm']) ?>
                                                                         
                                <?= Html::a('Delete', ['delete_event', 'id' => $event['event_id']], ['class' => 'btn btn-danger btn-sm']) ?>
                            </td>



                        </tr>
                    <?php endforeach; ?>

                    <?php else :?>

						<tr>
                            <td colspan="6" class="text-center"><span class="help-block">No events yet.</span></td>
                            


                        </tr>
				
			<?php endif; ?>
                </tbody>
            </table>
        </div>


    <div class="row">
        <div class="col-md-2">
        	 <!-- <a href="<?php // echo yii::$app->homeUrl; ?>/site/create" class="btn btn-primary btn-block">Create Event</a> -->
            <?= Html::a('Create Event',['/site/create'], ['class' => 'btn btn-primary btn-block']); ?>
        </div>
    </div>
