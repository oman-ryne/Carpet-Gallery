<?php
if (isset($_GET['q']) && $_GET['q'] == 'fu') {
    echo "<h1>Payment Failed!</h1>";
    echo "<p>Sorry, your payment could not be processed. Please try again or contact support.</p>";
} else {
    echo "<h1>Invalid Request</h1>";
}
?>
