<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo get_bloginfo('name'); ?> | Maintenance Mode</title>
    <style>
        body {
            background-color: #f1f1ff;
            font-family: sans-serif;
        }
        .maintenance-icon {
            width: 200px;
            height: 200px;
            margin: 50px auto;
            display: block;
            fill: #f44336;
        }
        h1 {
            text-align: center;
            font-size: 36px;
            margin-bottom: 50px;
        }
    </style>
</head>
<body>
    <svg class="maintenance-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
        <path d="M13 6h-2v6h2V6zm0 10h-2v2h2v-2zM3.69 3.69L2.28 5.1l6.12 6.12c-.2.53-.3 1.09-.3 1.68 0 2.76 2.24 5 5 5 .59 0 1.15-.1 1.68-.3l2.83 2.83 1.41-1.41L3.69 3.69zm9.9 9.9c-.51.22-1.06.33-1.61.33-1.66 0-3-1.34-3-3 0-.55.11-1.1.33-1.61L15.9 13.6z"/>
    </svg>
    <h1>Sorry, we're undergoing maintenance.</h1>
</body>
</html>