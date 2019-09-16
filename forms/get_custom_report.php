<?php
require_once '../config/config.php';

$report_name= $_POST['report_name'];

$query = $db->prepare('SELECT * FROM reports WHERE users_id = ? and report_name = ?');
$query->execute(array($authenticated_user, $report_name));




?>

<div class="row">
<div class="col-md-1">
 </div>
 <div class="col-md-10">
 <table class="table table-striped table-bordered table-condensed" id="state_report">
   <thead>
 <tr>
   <th>Name of Certified Producer </th>
   <th>Certificate Number  </th>
   <th>Issuing County </th>
   <th>Dates Participated in Market </th>
   <th> Total </th>
 </tr>
</thead>
<?php
while($row = $query->fetch()) {
  echo '<tr><td>' . $row['name_of_certified_producer'] . '</td><td>' . $row['certificate_number'] . '</td><td>' . $row['issuing_county'] . '</td><td>' . $row['dates_participated'] . '</td><td>' . $row['total'] . '</td></tr>';
}
?>
 </table>
 </div>
 <div class="col-md-1">
 </div>
 </div>
