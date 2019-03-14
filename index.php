<?php


function raffleDoor() {
	// Init doors
	$doors = [TRUE, FALSE, FALSE];
	shuffle($doors);

	for ($i=0; $i<3; $i++) {
		if (empty($doors[$i])) {
			$falseDoors[] = $i;
		}
	}

	// User choice
	$userDoor = rand(0,2);

	// Open one door
	if ($doors[$userDoor]) {
		// $falseDoorIdx = rand(0,1);
		unset($doors[$falseDoors[rand(0,1)]]);
	}
	else {
		foreach ($doors as $key => $value) {
			if (!$value && $key != $userDoor) {
				unset($doors[$key]);
			}
		}
	}

	// Check the door
	return $doors[$userDoor];
}

$times = 10000000;
$correct = 0;
for ($i=0; $i < $times; $i++) {
	if (raffleDoor()) {
		$correct++;
	}
}

?>

<div>
	Correct: <?php print $correct; ?>
</div>
<div>
	Wrong: <?php print $times-$correct; ?>
</div>
<div style="color:red;">
	<strong>Correct ratio: <?php print ($correct/$times)*100; ?>%</strong>
</div>
