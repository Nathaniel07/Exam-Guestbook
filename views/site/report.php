<?php 

use yii\helpers\html;
//use yii\widgets\ActiveForm;

$this->title = 'Technical Exam - Kumu';



?>



    <div class="row">
        <div class="col-md-8">
    	<h2><strong><?= $title; ?></strong></h2>
    	<br>
        </div>

	</div>


    <div class="row">
        <div class="col-md-12">

             <?php foreach ($events as $key => $event)  :?>

                
                <h3><?php echo $event->event_name; ?></h3>

<br>


        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Phone number</th>
                    <th>Gender</th>
                    <th>Address</th>
                    <th>Registered Date</th>

                </tr>
                </thead>
                <tbody>

                <?php if($register) :?>

                    <?php foreach ($register as $key => $guest)  :?>

                             <?php if($guest['event'] == $event['event_name'] ): ?>
                                                             
                                                           
                                <tr>
                                    <td><b><?php echo $guest->first_name."&nbsp;".$guest->last_name; ?></b><p class="small"><?php echo $guest['email_address']; ?></p></td>
                                    <td><?php echo $guest['phone_number']; ?></td>
                                    <td><?php echo $guest['gender'] == 'M' ? 'Male' : 'Female'; ?></td>
                                    <td><?php echo $guest['street'].",&nbsp;".$guest['city'].",&nbsp;".$guest['country']."&nbsp;".$guest['zip'] ; ?></td>
                                  
                                    <td><?php echo date('F j, Y h:i A', strtotime ($guest['created_at'])); ?></td>
                              

                            
                                </tr>

                      
                             <?php endif;?>


                    <?php endforeach; ?>

                        <?php else : ?>

                        
                                <td colspan="5" class="text-center"><span class="help-block">No guest yet.</span></td>
                                  <?php endif;?>

                   
                </tbody>
            </table>
        </div>

          <br>

            <?php endforeach; ?>

      
        </div>

    </div> 


<?php 
/*

$keys = array_keys($events);
for($i = 0; $i < count($events); $i++) {
    echo $keys[$i] . "{<br>";
    foreach($events[$keys[$i]] as $key => $value) {
        echo $value . " : " . $value . "<br>";
    }
    echo "}<br>";
} 
*/
?>