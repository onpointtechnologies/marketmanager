<?php
require_once '../config/config.php';
header('Access-Control-Allow-Origin: *');


$query = $db->prepare(' SELECT mv.vendors_id, v.id, v.vendor_name, v.users_id, v.vendor_phone, v.business_name, v.vendor_email, v.vendor_type, v.address, v.vendor_city, v.website, v.facebook, v.instagram, v.cpc_number, v.cpc_number_exp, v.certificate_expiration,
  v.certificate_number, v.products_sold, v.electronic_payment, v.wic_approved, v.wic_exp, v.wic_number, v.product_location, GROUP_CONCAT(m.id) market_ids, GROUP_CONCAT(m.market_name) market_names FROM vendors v LEFT JOIN markets_vendors mv ON mv.vendors_id = v.id
          LEFT JOIN markets m ON mv.markets_id = m.id WHERE v.users_id = ? GROUP BY v.id ORDER BY v.vendor_name');
$query->execute(array($authenticated_user));


?>
<div class="row">
  <div class="col-md-12">
<div class="table-responsive">
<table class="table  table-striped table-bordered table-condensed" id="vendor_table">
    <thead>
      <tr>
        <div class="col-xs-2">
          <th class="col-xs-1">Name</th>
          <th id="business_name_column">Business Name</th>
          <th width="80">Vendor Type
            <select id='filterText' style='display:inline-block' onchange='filterText()'>
              <option disabled selected>Select</option>
              <option value='certified'>Certified</option>
              <option value='ancillary'>Ancillary</option>
              <option value='all'>All</option>
  							</select></th>
          <th width="80"> Email </th>
            </div>
          <th width="250">phone</th>
          <th width="250">address</th>
          <th width="250">City</th>
          <!-- <th width="220"> CPC # </th>
          <th width="220"> CPC Expiration </th> -->
          <th width="220"> Certificate #</th>
          <th width="220"> Certificate Expiration</th>
          <th width="210"> Products Sold </th>
          <th width="210"> Product Location </th>
          <th width="150"> Markets</th>

          </th>
          <th width="10"> Website</th>
          <th width="100"> Facebook</th>
          <th width="100"> Instagram</th>
          <th width="150"> CC</th>
          <th width="150"> WIC Approved</th>
          <th width="150"> WIC Exp</th>
          <th width="150"> WIC #</th>
      </tr>
    </thead>
  <tbody id="vendor_results">
      <?php foreach ($query as $row) : ?>
          <tr class="content">
            <td><?php echo htmlspecialchars($row['vendor_name']) ?></td>
            <td ><?php echo htmlspecialchars($row['business_name']) ?></td>
            <td><?php echo htmlspecialchars($row['vendor_type']) ?></td>
            <td><a href="mailto:<?php echo htmlspecialchars($row['vendor_email']) ?>"><?php echo htmlspecialchars($row['vendor_email']) ?></a></td>
            <td><a href="tel:<?php echo htmlspecialchars($row['vendor_phone']) ?>"><?php echo htmlspecialchars($row['vendor_phone']) ?></td>
            <td><?php echo htmlspecialchars($row['address']) ?> </td>
            <td><?php echo htmlspecialchars($row['vendor_city']) ?></td>
            <td><?= $row['certificate_number'] !== "" ? '<span style="font-weight:bold">#</span> <span style="color: grey;">'.$row['certificate_number']:'<p style="color:#E55D65">Does not apply</p>'?></td>
            <td><?= $row['certificate_expiration'] !== "" ? $row['certificate_expiration']:'<p style="color:#E55D65">Does not apply</p>'?></td>
            <td><?= $row['products_sold'] !== "" ? $row['products_sold']:'<p style="color:#E55D65">Does not apply</p>'?></td>
            <td><?= $row['product_location'] !== "" ? $row['product_location']:'<p style="color:#E55D65">No Locations Found</p>'?></td>
            <td><?= $row['market_names'] !== "" ? $row['market_names']:'Not Associated With Market'?> </td>
            <td><?= $row['website'] !== "" ? $row['website'] : '<p style="color:#E55D65">Does not have website</p>'?></td>
            <td><?= $row['facebook'] !== "" ? $row['facebook']:'<p style="color:#E55D65">Does not have a Facebook</p>'?></td>
            <td><?= $row['instagram'] !== "" ? $row['instagram']:'<p style="color:#E55D65">Does not have an Instagram</p>'?></td>
            <td><?= $row['electronic_payment'] !== "" ? $row['electronic_payment']:'<p style="color:#E55D65">Does not take Electronic Payment</p>'?></td>
            <td><?= $row['wic_approved'] !== "" ? $row['wic_approved']:'<p style="color:#E55D65">Does not take WIC</p>'?></td>
            <td><?= $row['wic_exp'] !== "" ? $row['wic_exp']:'<p style="color:#E55D65">N/A</p>'?></td>
            <td><?= $row['wic_number'] !== "" ? $row['wic_number']:'<p style="color:#E55D65">N/A</p>'?></td>
            <td style='white-space: nowrap'>
              <a class="btn btn-primary" style="margin-right: 8px;" onclick="editvendor(<?=$row["id"]?>)"><span class="glyphicon glyphicon-edit"></span>
              <a class="btn btn-danger delete" style="margin-right: 8px;" onclick="delete_vendor(<?=$row["id"]?>)"><span class="glyphicon glyphicon-trash"></span></td>
  </tr>
        <!-- Delete Confirmation Modal-->
       <div class="modal fade" id="confirm-delete-<?php echo $row['id'] ?>" role="dialog">
          <div class="modal-dialog">
            <form action="delete_market.php" method="POST">
            <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Confirm</h4>
                </div>
                <div class="modal-body">

                    <input type="hidden" name="del_id" id = "del_id" value="<?php echo $row['id'] ?>">

                  <p>Are you sure you want to delete this market?</p>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-default pull-left">Yes</button>
                  <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                </div>
              </div>
            </form>

          </div>
        </div>
        <!-- End Delete Confirmation Modal -->
        <?php endforeach; ?>
    </tbody>
</table>
</div>
</div>
</div>
