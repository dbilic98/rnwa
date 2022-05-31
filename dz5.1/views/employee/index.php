<p>Here is a list of all EMPLOYEEs:</p>

<?php foreach($employee as $employeesingle) { ?>
  <p>
    <?php echo $employeesingle->EMP_ID ." ".$employeesingle->FIRST_NAME  ?>
    <a href='?controller=employee&action=deleteemployee&id=<?php echo $employeesingle->FIRST_NAME; ?>'>DELETE EMPLOYEE</a>
  </p>
<?php } ?>