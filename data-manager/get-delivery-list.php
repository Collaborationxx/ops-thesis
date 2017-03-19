<?php 

include(dirname(__FILE__).'/../config/db_connection.php');


//get list of orders for delivery
$query = "  
         SELECT
            o.id,
                o.customer_id,
                o.customer_name,
                o.transaction_date,
                o.payment_status,
                u.first_name,
                u.last_name,
               	u.address,
                u.shipping_address
            FROM
                order_tbl o,
                user_account u
            WHERE
                o.type = 1
            AND
                o.customer_id = u.id
            AND
            	o.payment_status = 1 
";
$orderDelivery = array();
if ($result = mysqli_query($con, $query)) {
    /* fetch associative array */
    while ($row = mysqli_fetch_assoc($result)) {
        $orderDelivery[] = $row;
    }
    /* free result set */
    mysqli_free_result($result);
}


if(count($orderDelivery) > 0){
	foreach ($orderDelivery as $key => $value) {
		$id = $value['id'];
		$select = "
					SELECT
						p.name,
                        p.id as product_id,
                        o.id as order_id,
                        od.quantity
					FROM
						product p,
						order_tbl o,
						order_details od	
					WHERE
						p.id = od.product_id
                    AND
                    	od.order_id = o.id
                    AND 
                    	o.id = $id
						
					";
		if ($oResult = mysqli_query($con, $select)) {
	    	/* fetch associative array */
		    while ($oRow = mysqli_fetch_assoc($oResult)) {
		        $orderDelivery[$key]['order_details'][] = $oRow;
		    }
		}			
	}
}



//get all reservations for delivery
$sql = "  
         SELECT
        	r.id,
            r.customer_id,
            r.transaction_date,
            r.payment_status,
            u.first_name,
            u.last_name,
           	u.address,
            u.shipping_address
        FROM
            reservation_tbl r,
            user_account u
        WHERE
            r.type = 1
        AND
            r.customer_id = u.id
        AND
        	r.payment_status = 2
";
$reservationDelivery = array();
if ($rResult = mysqli_query($con, $sql)) {
    /* fetch associative array */
    while ($rRow = mysqli_fetch_assoc($rResult)) {
        $reservationDelivery[] = $rRow;
    }
    /* free result set */
    mysqli_free_result($rResult);
}

if(count($reservationDelivery) > 0){
	foreach ($reservationDelivery as $rkey => $rvalue) {
		$id = $rvalue['id'];
		$rSelect = "
					SELECT
						p.name,
                        p.id as product_id,
                        r.id as reservation_id,
                        rd.quantity
					FROM
						product p,
						reservation_tbl r,
						reservation_details rd	
					WHERE
						p.id = rd.product_id
                    AND
                    	rd.reservation_id = r.id
                    AND 
                    	r.id = $id
						
					";
		if ($res = mysqli_query($con, $rSelect)) {
	    	/* fetch associative array */
		    while ($cRow = mysqli_fetch_assoc($res)) {
		        $reservationDelivery[$rkey]['order_details'][] = $cRow;
		    }
		}

	}
}



// echo '<pre>'; print_r($reservationDelivery); exit;
























