<div id="custom001">

<?php

// MARCH 2021 //
$q_q1 = "SELECT * FROM incidents WHERE day_y=2021 AND day_m='March' AND status='Closed' ORDER BY id DESC";
$q_q2 = $link->query($q_q1);
$q_q2_numrows = mysqli_num_rows($q_q2);

$q_q11 = "SELECT * FROM incidents WHERE day_y=2019 AND day_m='December' AND status='Transferred' OR day_y=2019 AND day_m='December' AND status='Escalated' ORDER BY id DESC";
$q_q22 = $link->query($q_q11);
$q_q22_numrows = mysqli_num_rows($q_q22);
// END OF DECEMBER 2019 //

// APRIL 2021 //
$q_q4 = "SELECT * FROM incidents WHERE day_y=2019 AND day_m='November' AND status='Closed' ORDER BY id DESC";
$q_q5 = $link->query($q_q4);
$q_q5_numrows = mysqli_num_rows($q_q5);

$q_q44 = "SELECT * FROM incidents WHERE day_y=2019 AND day_m='November' AND status='Transferred' OR day_y=2019 AND day_m='November' AND status='Escalated' ORDER BY id DESC";
$q_q55 = $link->query($q_q44);
$q_q55_numrows = mysqli_num_rows($q_q55);
// END OF NOVEMBER 2019 //

// OCTOBER 2019 //
$q_102019_1 = "SELECT * FROM incidents WHERE day_y=2019 AND day_m='October' AND status='Closed' ORDER BY id DESC";
$q_102019_2 = $link->query($q_102019_1);
$q_102019_3 = mysqli_num_rows($q_102019_2);

$q_102019_4 = "SELECT * FROM incidents WHERE day_y=2019 AND day_m='October' AND status='Transferred' OR day_y=2019 AND day_m='October' AND status='Escalated' ORDER BY id DESC";
$q_102019_5 = $link->query($q_102019_4);
$q_102019_6 = mysqli_num_rows($q_102019_5);
// END OF OCTOBER 2019 //

?>

<table>
<h5>March 2021</h5>
<p><b><?php echo $q_q2_numrows;?></b> closed & <b><?php echo $q_q22_numrows;?></b> transferred / escalated incidents.</p>
<thead>
    <tr>
        <th>Year</th>
        <th>Month</th>
        <th>Day</th>
        <th>Case ID</th>
        <th>Issue</th>
        <th>Status</th>
    </tr>
  </thead>
<?php
echo "<br>";
while($q_q3 = $q_q2->fetch_assoc()) {
?>
   <tr>
    <td><?php echo $q_q3['day_y'];?></td>
    <td><?php echo $q_q3['day_m'];?></td>
    <td><?php echo $q_q3['day_d'];?></td>
    <td><?php echo $q_q3['caseid'];?></td>
    <td><?php echo $q_q3['issue'];?></td>
    <td><?php echo $q_q3['status'];?></td>
    </tr>
<?php
}
?>
<?php
    echo "<br>";
    while($q_q33 = $q_q22->fetch_assoc()) {
?>
   <tr>
    <td class="td_gray"><?php echo $q_q33['day_y'];?></td>
    <td class="td_gray"><?php echo $q_q33['day_m'];?></td>
    <td class="td_gray"><?php echo $q_q33['day_d'];?></td>
    <td class="td_gray"><?php echo $q_q33['caseid'];?></td>
    <td class="td_gray"><?php echo $q_q33['issue'];?></td>
    <td class="td_gray"><?php echo $q_q33['status'];?></td>
    </tr>
<?php
    }
?>
</table>

<br><br><br>

<table>
<h5>April 2021</h5>
<p><b><?php echo $q_q5_numrows;?></b> closed & <b><?php echo $q_q55_numrows;?></b> transferred / escalated incidents.</p>
<thead>
    <tr>
        <th>Year</th>
        <th>Month</th>
        <th>Day</th>
        <th>Case ID</th>
        <th>Issue</th>
        <th>Status</th>
    </tr>
  </thead>
<?php
echo "<br>";
while($q_q6 = $q_q5->fetch_assoc()) {
?>
   <tr>
    <td><?php echo $q_q6['day_y'];?></td>
    <td><?php echo $q_q6['day_m'];?></td>
    <td><?php echo $q_q6['day_d'];?></td>
    <td><?php echo $q_q6['caseid'];?></td>
    <td><?php echo $q_q6['issue'];?></td>
    <td><?php echo $q_q6['status'];?></td>
    </tr>
<?php
}
?>
<?php
    echo "<br>";
    while($q_q66 = $q_q55->fetch_assoc()) {
?>
   <tr>
    <td class="td_gray"><?php echo $q_q66['day_y'];?></td>
    <td class="td_gray"><?php echo $q_q66['day_m'];?></td>
    <td class="td_gray"><?php echo $q_q66['day_d'];?></td>
    <td class="td_gray"><?php echo $q_q66['caseid'];?></td>
    <td class="td_gray"><?php echo $q_q66['issue'];?></td>
    <td class="td_gray"><?php echo $q_q66['status'];?></td>
    </tr>
<?php
    }
?>
</table>

<br><br><br>

<table>
<h5>May 2021</h5>
<p><b><?php echo $q_102019_3;?></b> closed & <b><?php echo $q_102019_6;?></b> transferred / escalated incidents.</p>
<thead>
    <tr>
        <th>Year</th>
        <th>Month</th>
        <th>Day</th>
        <th>Case ID</th>
        <th>Issue</th>
        <th>Status</th>
    </tr>
  </thead>
<?php
echo "<br>";
while($q_102019_7=$q_102019_2->fetch_assoc()) {
?>
   <tr>
    <td><?php echo $q_102019_7['day_y'];?></td>
    <td><?php echo $q_102019_7['day_m'];?></td>
    <td><?php echo $q_102019_7['day_d'];?></td>
    <td><?php echo $q_102019_7['caseid'];?></td>
    <td><?php echo $q_102019_7['issue'];?></td>
    <td><?php echo $q_102019_7['status'];?></td>
    </tr>
<?php
}
?>
<?php
    echo "<br>";
    while($q_102019_8 = $q_102019_5->fetch_assoc()) {
?>
   <tr>
    <td class="td_gray"><?php echo $q_102019_8['day_y'];?></td>
    <td class="td_gray"><?php echo $q_102019_8['day_m'];?></td>
    <td class="td_gray"><?php echo $q_102019_8['day_d'];?></td>
    <td class="td_gray"><?php echo $q_102019_8['caseid'];?></td>
    <td class="td_gray"><?php echo $q_102019_8['issue'];?></td>
    <td class="td_gray"><?php echo $q_102019_8['status'];?></td>
    </tr>
<?php
    }
?>
</table>

</div>
