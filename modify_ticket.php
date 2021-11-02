<?php
include '_includes/connect.php';
include '_includes/session.php';

$_email = $_SESSION['email'];

$current_day = date('j');
$current_month = date('F');
$current_year = date('Y');
?>

<html>
<head>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="_styles/custom.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
</head>
<body>
<br>
<?php

if ($_GET["t"]) {
    $ticket01 = $_GET["t"];
    $q1 = "SELECT * FROM incidents WHERE caseid='$ticket01' AND assigned_email='$_email'";
    $q2 = $link->query($q1);
        
    if ($q2->num_rows > 0) {
    $q3 = $q2->fetch_assoc();
?>

<div id="custom001">
<h3><small><small>Modifying Incident # <?php echo $q3['caseid']; ?></small></small></h3>
<form method="post" action="edit_ticket.php">
    <input type="hidden" value="<?php echo $q3['id'];?>" name="txt_id">
    <label><small>Incident #</small></label>
    <input type="text" placeholder="Incident #" size="20" name="txt_incident" value="<?php echo $q3['caseid']; ?>">
    <label><small>Issue/Resolution</small></label>
    <select name="txt_issue">
      <?php
        $query_issues1 = "SELECT * FROM issues ORDER BY issue_name ASC";
        $query_issues2 = $link->query($query_issues1);
        ?>
        <option default><?php echo $q3['issue']; ?></option>
        <?php
        while($issues = $query_issues2->fetch_assoc()) {
      ?>
        <option><?php echo $issues['issue_name']; ?></option>
      <?php
        }
      ?>
    </select>
    <label><small>Status</small></label>
    <select name="txt_resolution">
        <option><?php echo $q3['status']; ?></option>
        <option>Closed</option>
        <option>Created</option>
        <option>Escalated</option>
        <option>Transferred</option>
    </select>
    <br>
    <label><small>Month</small></label>
    <select name="txt_month" >
           <option default><?php echo $q3['day_m']; ?></option>
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
    <label><small>Day</small></label>
    <input type="text" value="<?php echo $q3['day_d'];?>" size="2" name="txt_day">
    <label><small>Year</small></label>
    <input type="text" value="<?php echo $q3['day_y'];?>" size="4" name="txt_year">
    <br>
    <label><small>Duplicate of</small></label>

    <input type="text" placeholder="Incident #" size="20" name="txt_duplicate_incident" value="<?php echo $q3['duplicateof'];?>">
    <br><br>
    <button type="submit" class="btn btn-info">Update Incident</button>
    </form>

    <form method="post" action="delete_ticket.php">
            <button type="submit" class="btn btn-info">Delete Incident</button>
            <input type="hidden" name="txt_delete" value="<?php echo $q3['id'];?>">
    </form>
        
    <button onclick="window.opener.location.replace('index.php?h=1');window.close();" class="btn btn-info">Cancel</button>
</small>

<?php
    }
}

?>
</div>

