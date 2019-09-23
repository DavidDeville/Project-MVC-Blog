<h1>Creation of a test page</h1>

<p>Welcome to the page test</p>

<ul>
    <?php 
    foreach($customers as $customer) {
        echo "<li>" . $customer . "</li>";
    }
    ?>
</ul>