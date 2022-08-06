<?php 
// of course, normally here you'd use a DB!
$sender = ["926614e3-715b-4331-a9e6-27c38bd5d665" => "Bob", "62f95668-a0fe-467f-a57d-f8f79b98d287" => "Alice", "3ffa502a-e522-4e3a-a97c-31dd75077307" => "Eve"][$_GET["id"]];
?>

<?php include "header.php" ?>

<?php include "col1.php" ?>

<div class="col2">
    <div class="content email-display">
        <p>From: <?= $sender ?></p>
        <p>
            Dear Joseph,<br>

            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </p>
    </div>
</div>

<?php include "footer.php" ?>    