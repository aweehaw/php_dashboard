<?php
// The functionality of this include is disabled due to a missing table.
?>

<form method="post" action="index.php?h=1"><small>
<div id="custom001">
<?php
    $current_day = date('j');
    $current_month = date('F');
    $current_year = date('Y');
?>
    <h3><small><small>Enter your completed incidents</small></small></h3>
    <input type="text" placeholder="Incident #" size="20" name="txt_incident">
    <select name="txt_issue">
      <?php
        $query_issues1 = "SELECT * FROM issues ORDER BY issue_name ASC";
        $query_issues2 = $link->query($query_issues1);
        while($issues = $query_issues2->fetch_assoc()) {
      ?>
           <option><?php echo $issues['issue_name']; ?></option>
      <?php
        }
      ?>
    </select>

    <select name="txt_resolution">
        <option>Closed</option>
        <option>Created</option>
        <option>Escalated</option>
        <option>Transferred</option>
    </select>
    <button type="submit" class="btn btn-info">Save Ticket</button>
    <br>
    <select name="txt_month">
           <option><?php echo $current_month;?></option>
           <option>January</option>
           <option>February</option>
           <option>March</option>
           <option>April</option>
           <option>May</option>
           <option>June</option>
           <option>July</option>
           <option>August</option>
           <option>September</option>
           <option>October</option>
           <option>November</option>
           <option>December</option>
    </select>
    <input type="text" value="<?php echo $current_day;?>" size="2" name="txt_day">
    <input type="text" value="<?php echo $current_year;?>" size="4" name="txt_year">
    <input type="text" placeholder="Duplicate Orig Incident #" size="20" name="txt_duplicate_incident">
    <br>
</div>
</small></form>

<div id="custom001">

<?php
/* enable this in-case I needed to restore the callback module
  include '_includes/callback01.php';
*/
if ( ($_SERVER['REQUEST_METHOD'] == 'POST') || ($_SERVER['REQUEST_METHOD'] == 'GET') ) {
  error_reporting(0);
  ini_set('display_errors', 0);

  $_incident = $_POST['txt_incident'];
  $_issue = $_POST['txt_issue'];
  $_resolution = $_POST['txt_resolution'];
  $_month = $_POST['txt_month'];
  $_day = $_POST['txt_day'];
  $_year = $_POST['txt_year'];

  if ($_POST['txt_duplicate']) {
    $_duplicate = "1";
  } else {
    $_duplicate = "0";
  }

  if ($_POST['txt_duplicate_incident']) {
    $_duplicateinc = $_POST['txt_duplicate_incident'];
  } else {
    $_duplicateinc = null;
  }

  $_email = $_SESSION['email'];
  $_id = $_SESSION['id'];

  // This is a variable tester //
  //echo "$_incident $_issue $_resolution<br>$_month $_day $_year<br>$_duplicate $_duplicateinc<br>$_email $_id";

  $insert_query = "INSERT INTO incidents (id, day_m, day_d, day_y, caseid, issue, status, assigned_email, duplicateof) VALUES (0, '$_month', '$_day', '$_year', '$_incident', '$_issue', '$_resolution', '$_email', '$_duplicateinc')";
  if(mysqli_query($link,$insert_query)) {
    echo "<small><font color='green'>Record successfully saved.</font></small>";
  } else {
    //echo "<small><font color='red'>Could not save the same incident number.</font></small>";
    //echo "ERROR: could not execute $insert_query".mysqli_error($link);
  }
}
?>

<hr>

<?php
  $query_today3 = "SELECT * FROM incidents WHERE day_m='$current_month' AND day_d='$current_day' AND day_y='$current_year' AND assigned_email='$_email'";
  $query_today4 = $link->query($query_today3);
  $numrows = mysqli_num_rows($query_today4);
?>
<h4><small><small>Today's completed incidents (<?php echo $numrows; ?>)</small></small></h4>
<table>
  <thead>
    <tr>
      <th scope="col">Incident #</th>
      <th scope="col">Issue/Resolution</th>
      <th scope="col">Status</th>
      <th scope="col">Duplicate of</th>
      <th scope="col">#</th>
    </tr>
  </thead>
  <tbody>

  <?php
    $query_today1 = "SELECT * FROM incidents WHERE day_m='$current_month' AND day_d='$current_day' AND day_y='$current_year' AND assigned_email='$_email' ORDER BY id DESC";
    $query_today2 = $link->query($query_today1);
    while($today = $query_today2->fetch_assoc()) {
      mysqli_error($link);
      if ( ($today['duplicateof'] == '' ) ) {
        $dupeof = "N/A";
      } else {
        $dupeof = $today['duplicateof'];
      }
  ?>
    <tr>
      <td><?php echo $today['caseid'];?></td>
      <td><?php echo $today['issue'];?></td>
      <td><?php echo $today['status'];?></td>
      <td><?php echo $dupeof; ?></td>
      <td><a method="post" href="modify_ticket.php?t=<?php echo $today['caseid'];?>" onclick="window.open(this.href,'targetWindow','toolbar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=no,width=780,height=340,directories=no,titlebar=no,'); return false;" class="modify">Edit</a><br></td>
    </tr>
  <?php
    }
  ?>
</tbody>
</table>

<br>

<?php
  $query_today5 = "SELECT * FROM incidents WHERE day_m='$current_month' AND day_d='$current_day' AND day_y='$current_year' AND assigned_email='$_email' AND status='Transferred' OR day_m='$current_month' AND day_d='$current_day' AND day_y='$current_year' AND assigned_email='$_email' AND status='Escalated'";
  $query_today6 = $link->query($query_today5);
  $numrows = mysqli_num_rows($query_today6);
?>

<h4><small><small>Today's transfers - <?php echo $current_month." ".$current_day.", ".$current_year; ?> (<?php echo $numrows; ?>)</small></small></h4>
<table>
  <thead>
    <tr>
      <th scope="col">Incident #</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>

  <?php
    $query_today3 = "SELECT * FROM incidents WHERE day_m='$current_month' AND day_d='$current_day' AND day_y='$current_year' AND assigned_email='$_email' AND status='Transferred' OR day_m='$current_month' AND day_d='$current_day' AND day_y='$current_year' AND assigned_email='$_email' AND status='Escalated' ORDER BY id DESC";
    $query_today4 = $link->query($query_today3);
    while($today3 = $query_today4->fetch_assoc()) {
  ?>
    <tr>
      <td><?php echo $today3['caseid'];?></td>
      <td><?php echo $today3['status'];?></td>
    </tr>
  <?php
    }
  ?>
</tbody>
</table>

<br>

<?php
  $query_today7 = "SELECT * FROM incidents WHERE day_m='$current_month' AND day_d='$current_day' AND day_y='$current_year' AND assigned_email='$_email' AND status='Closed'";
  $query_today8 = $link->query($query_today7);
  $numrows = mysqli_num_rows($query_today8);
?>

<h4><small><small>Today's closes - <?php echo $current_month." ".$current_day.", ".$current_year; ?> (<?php echo $numrows; ?>)</small></small></h4>
<table>
  <thead>
    <tr>
      <th scope="col">Incident #</th>
      <th scope="col">Issue/Resolution</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>

  <?php
    $query_today5 = "SELECT * FROM incidents WHERE day_m='$current_month' AND day_d='$current_day' AND day_y='$current_year' AND assigned_email='$_email' AND status='Closed' ORDER BY id DESC";
    $query_today6 = $link->query($query_today5);
    while($today5 = $query_today6->fetch_assoc()) {
  ?>
    <tr>
      <td><?php echo $today5['caseid'];?></td>
      <td><?php echo $today5['issue'];?></td>
      <td><?php echo $today5['status'];?></td>
    </tr>
  <?php
    }
  ?>
</tbody>
</table>


<br><br>
<small><?php
  echo 'Made with PHP '.phpversion()." & ";
  printf("MySQL %s\n", mysqli_get_server_info($link))
?></small>


</div>

<!-- FOOTER GOES HERE -->