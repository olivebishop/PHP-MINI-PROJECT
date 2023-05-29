<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .about-section {
            margin-top: 100px;
        }
        
        .about-section img {
            max-width: 100%;
            height: auto;
        }

        .blockquote-footer {
            color: #6c757d;
            font-size: 14px;
            font-style: italic;
        }
        
        .social-icons {
            margin-top: 20px;
        }
        
        .social-icons a {
            color: green;
            margin-right: 10px;
            font-size: 24px;
        }
    </style>
</head>
<body>
    <?php include_once "top-nav.php"; ?>
    
    <div class="container about-section">
        <div class="row">
            <div class="col-md-6">
                <h4>About Author</h4>
                <p>Olive Bishop Odhiambo is a software developer who is currently learning software development at the Institute of Software Technologies. The purpose of Olive is to create applications that solve day-to-day problems.</p>
                
                <div class="social-icons">
                <a href="https://www.instagram.com/rhymer_ke"><i class="fab fa-instagram"></i></a>
                    <a href="https://github.com/olivebishop"><i class="fab fa-github"></i></a>
                    <a href="https://www.linkedin.com/in/olive-bishop-odhiambo-090895205/"><i class="fab fa-linkedin"></i></a>
                    <a href="https://twitter.com/olivebishop_dev"><i class="fab fa-twitter"></i></a>
                </div>
            </div>
            <div class="col-md-6">
                <img src="./assets/about.jpg" alt="Author Image">
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
</body>
</html>
