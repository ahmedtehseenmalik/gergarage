<?php 
// Include functions.php for database connection variable
require_once('../functions/functions.php');
require_once('../functions/config.php');
if(isset($_POST['assign'])){

	$employee_id = mysqli_real_escape_string($check,$_POST['employee_id']);
	$booking_id  = mysqli_real_escape_string($check,$_POST['booking_id']);
    $service_points     = mysqli_real_escape_string($check,$_POST['service_points']);
    $points=getmechanicDailyPoints($employee_id);
    $employee_points='';
    $todaydate= date('Y-m-d'); 
    if(mysqli_num_rows($points) > 0 ){
        while ($row = mysqli_fetch_array($points)) { 
              
               $employee_points = $row['points'];
           }
       }
       
       if( intval($employee_points) > 0 ){
        $employee_new_points = intval($employee_points) + intval($service_points);
            if( $employee_new_points < 5 ){
                $q1 = mysqli_query($check," Update `employee_daily_point` SET `points`='{$employee_new_points}' WHERE `employee_id_FK`='{$employee_id}' AND `date`='{$todaydate}'");
                if($q1){
                    $q2 = mysqli_query($check,"INSERT INTO `roaster` (`roaster_id`, `booking_id_fk`, `employee_id_fk`, `status`, `date`) VALUES (NULL, '$booking_id', '$employee_id', 'assigned', '$todaydate')");
                        if($q2){
                            $q3 = mysqli_query($check," Update `booking` SET `status`='in progress' WHERE `booking_id`='{$booking_id}' ");
                            if($q3){
                                echo 'done';
                            }else{
                                echo 'assignerror';
                            }
                        }else{
                            echo 'assignerror';
                        }
                    
                }else{
                    echo 'assignerror';
                }
            }else{
                echo 'assignerror';
            }
       }else{

        $q1 = mysqli_query($check," INSERT INTO `employee_daily_point` (`id`, `employee_id_FK` , `date` ,`points`) VALUES (NULL, '$employee_id' , '$todaydate' , '$service_points') ");
               
        if($q1){
            $q2 = mysqli_query($check,"INSERT INTO `roaster` (`roaster_id`, `booking_id_fk`, `employee_id_fk`, `status`, `date`) VALUES (NULL, '$booking_id', '$employee_id', 'assigned', '$todaydate')");
            if($q2){
                $q3 = mysqli_query($check," Update `booking` SET `status`='In Service' WHERE `booking_id`='{$booking_id}' ");
                if($q3){
                    echo 'done';
                }else{
                    echo 'assignerror';
                }
            }else{
                echo 'assignerror';
            }
        }else{
            echo 'assignerror';
        }
    }


}


?>