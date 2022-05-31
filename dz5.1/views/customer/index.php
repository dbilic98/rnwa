<p>Here is a list of all CUSTOMERs:</p>

<?php foreach($customers as $customer) { ?>
  <p>
    <?php echo $customer->CUST_ID ." ".$customer->ADDRESS  ?>
    <a href='?controller=customers&action=show&id=<?php echo $customer->CUST_ID; ?>'>Details</a>
  </p>
<?php } ?>