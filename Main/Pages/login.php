<?php
    $authenticated = false;
    if(isset($_POST['Verify']) && $_POST['verify'] == "Verify") {
        if(!$authenticated) {
            echo "Invalid credentials";
        }
    }
>
