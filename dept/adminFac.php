<?php
	include('header.php');
?>

    
	<form action="confirmation.php" method="post">
	
		<ul>
			<li>
				<label >Name:</label>
				<input type="text" name="personname" placeholder="Your Name" required>
			</li>
			<li>
				<label >E-Mail:</label>
				<input type="email" name="personemail" placeholder="YourEmail@winona.edu" required>
			</li>
			<li>
			<label>Phone Number:</label>
			<input id="phonenum" type="tel" pattern="^\d{3}-\d{4}$" maxlength=9>
			</li>
			<li>
			<label>Office Number</label>
			<input id="officnum" type="text" maxlength=6>
			</ul>
			

	<h3>Office Hours</h3>
    <table>
    <tr>
<?php
    $days = Array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday');
    foreach($days as $day)
    {
?>
        <th><?= $day?></th>
<?php
    }
?>
    </tr>
    <tr>
<?php
    foreach($days as $day)
    { 
?>
        <td>
<?php
	  for($count=1;$count<=3; $count++)
	  {
 ?>
        <div id="<?= $day ?><?= $count ?>" >
<?php
		
?>
		<label>Start Time</label><br><select id="start<?= $day?><?=$count?>" name="start<?= $day?><?=$count?>">
		<option label=" " value="null "> </option>
<?php
		$am=7;
        $pm=1;
        while($am <= 11)
			
        {	
?>
            <option value="start<?= $am ?>"><?= $am ?>:00 AM </option>
			<option value="start<?= $am ?>:30"><?= $am ?>:30 AM </option>
<?php
            $am++;
        }
?>
		<option value="start12">12:00 PM </option>
		<option value="start12:30">12:30 PM </option>
<?php
	while($pm<=6)
	{
?>
		 <option value="start<?= $pm ?>"><?= $pm ?>:00 PM </option>
		<option value="start<?= $pm ?>:30"><?= $pm ?>:30 PM </option>
<?php
		$pm++;	
	}
?>
	</select>
	<br>
	<label>End Time</label><br><select id="end<?= $day ?><?= $count ?>" name="end<?= $day ?><?= $count ?>">
	<option label=" " value="null"> </option>
<?php
		$am=7;
        $pm=1;
        while($am <= 11)	
        {	
?>
            <option value="end<?= $am ?>"><?= $am ?>:00 AM </option>
			<option value="end<?= $am ?>:30"><?= $am ?>:30 AM </option>
<?php
            $am++;
        }
?>
		<option value="end12">12:00 PM </option>
		<option value="end12:30">12:30 PM </option>
<?php
	while($pm<=6)
	{
?>
		<option value="end<?= $pm ?>"><?= $pm ?>:00 PM </option>
		<option value="start<?= $pm ?>:30"><?= $pm ?>:30 PM </option>
<?php
		$pm++;	
		
	}
?>
	 </select><br>
<?php
	if($count<3)
    {
?>
        <button type="button" id="button<?= $day ?><?= $count ?>">Add Time</button>
<?php
    }
	if($count>1){
?>
		<button type="button" id="clear<?= $day?><?=$count?>">Remove time</button>
<?php
	}
?>
    </div>
    <br>
<?php
	  }//end of for loop
?>  
    </td>
<?php
    }
?>
</table>
<button type="submit" id="submit">Submit</button>
	</form>
 
<?php
    include("footer.php")
?>