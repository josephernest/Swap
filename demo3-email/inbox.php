<?php 
// of course, normally here you'd use a DB!
$emails = [["926614e3-715b-4331-a9e6-27c38bd5d665", "Bob", "About your project", "5 Aug"],
           ["62f95668-a0fe-467f-a57d-f8f79b98d287", "Alice", "Cryptography questions", "4 Aug"],
           ["3ffa502a-e522-4e3a-a97c-31dd75077307", "Eve", "I have found some interesting data!", "3 Aug"]];
?>

<?php include "header.php" ?>

<?php include "col1.php" ?>

<div class="col2">
    <div class="content">
        <h3>Inbox</h3>
        <?php 
        foreach ($emails as [$id, $sender, $subject, $date]) {
            echo "<a class='email-title' href='email.php?id={$id}' swap-target='.col2' swap-history='true'><div class='sender'>{$sender}</div><div class='subject'>{$subject}</div><div class='date'>{$date}</div></a>";
        }        
        ?>
    </div>
</div>

<?php include "footer.php" ?>    