    <?php

    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    echo "URI: " . $uri;  // Debugging line

    switch($uri) {
        case '/about':
            include 'includes/about.php';
            break;
        case '/contact':
            include 'includes/contact.php';
            break;
        case '/detail.php':
            include 'includes/detail.php';
            break;
        default: 
            echo "Page not found!";
            break;
    }
    ?>
