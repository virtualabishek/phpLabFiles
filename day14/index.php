    <?php

    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    echo "URI: " . $uri;  // Debugging line
    // Just practising routing.
    
    switch($uri) {
        case '/about':
            include 'includes/about.php';
            break;
        case '/contact':
            include 'includes/contact.php';
            break;
        case '/detail':
            include 'includes/detail.php';
            break;
        case '/logout':
            include 'includes/logout.php'
        default: 
            echo "Page not found!";
            break;
    }
    ?>
