<?php
if (isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 'logout':
            logout();
            break;
    }
}

function logout() {
    session_unset();
    header( 'Location: index.php?page=login');
    exit;
}

?>