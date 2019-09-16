<?php

require_once '../config/config.php';


$wic_id = $_POST['wic_edit_id'];



  if ($wic_id == NULL) {
      $sql1 = $db->prepare('INSERT INTO wic (wic_number, wic_amount, mm_amount, customer_type, market_id, checkout_date) VALUES (?, ?, ?, ?, ?, ?)');
      $sql1->execute(array( $_POST['wic_number'], $_POST['wic_amount'], $_POST['mm_amount'], $_POST['customer_type'], $_POST['market_id'], $_POST["checkout_date"]));
    } else {
      $sql1 = $db->prepare('UPDATE wic SET wic_number = ?, wic_amount = ?, mm_amount = ?, customer_type = ? WHERE id = ?');
      $sql1->execute(array( $_POST['wic_number'], $_POST['wic_amount'], $_POST['mm_amount'], $_POST['customer_type'], $wic_id));

    }

    $q1 = $db->prepare(' SELECT count(customer_type) as count FROM wic WHERE checkout_date = ? AND market_id = ? GROUP BY customer_type HAVING count >= 1 ');
    $q1->execute(array($_POST["checkout_date"], $_POST['market_id']));

    $wic_results = [];
    while ($row = $q1->fetch()) {
      array_push($wic_results, $row);
    }

    // $first = $wic_results[1];

    // echo '<script>console.log('.print_r($first).')</script>';

    echo json_encode($wic_results);


    //WIC COUNT*****
    // $sql = $db->prepare("SELECT COUNT(wic_number), checkout_date AS i FROM wic WHERE market_id = ? GROUP BY wic_number");
    // $sql->execute(array($market_id));
    // $new_count = 0;
    // $existing_count = 0;
    //
    // while ($row = $sql->fetch()) {
    //   //if ($row['checkout_date'] == '2018-12-03' ) {
    //     if ($row['i'] > 1)
    //       $existing_count += 1;
    //     else $new_count += 1;
    //   //}
    // }
    // // echo '$new_count: '.$new_count.'<br>';
    // // echo '$existing_count: '.$existing_count.'<br>';
    //
    // $wic_counts = [];
    // array_push($wic_counts, [
    //   'new' => $new_count,
    //   'existing' => $existing_count
    // ]);
    //
    // echo json_encode($wic_counts);

    // $wic_num = [];
    // while ( $res = $sql->fetch()){
    //   array_push($wic_num, $res['wic_number']);
    // }
    //END WIC COUNT*****

    // $count_origin = count($wic_num);
    // $unique = array_unique($wic_num);  //removes duplicates
    // $count_unique = count($unique);
    //
    // $duplicates = $count_origin - $count_unique;
    //
    // // print_r($wic_num);
    //
    // echo '<br><hr>';
    // print_r($unique) .' without duplicates';
    // echo '<br><hr>';
    // print_r(array_diff($wic));
    // echo '<br><hr>';
    // echo $count_unique ;
    // echo '<br><hr>';
    // echo $duplicates;
    // echo '<br>';
    // echo $count_origin.' total row count';
    // echo '<br><hr>';




?>
