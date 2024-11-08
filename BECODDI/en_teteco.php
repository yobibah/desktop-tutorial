<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/entete.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>
        <?php 
            if(isset($title)){
                echo $title;
            } else {
                echo 'Mon site';
            }
        ?>
    </title>
    <style>
        /* Styles pour le menu */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
        }

        .menu {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #333;
            padding: 15px 30px;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
        }

        .menu img {
            width: 50px;
            height: auto;
        }

        .menu ul {
            display: flex;
            list-style: none;
        }

        .menu ul li {
            margin-right: 20px;
        }

        .menu ul li a {
            color: #fff;
            text-decoration: none;
            font-size: 16px;
            transition: color 0.3s;
        }

        .menu ul li a:hover {
            color: #87B1DB;
        }

        .menu-toggle {
            display: none;
            font-size: 30px;
            color: white;
            background: none;
            border: none;
            cursor: pointer;
        }

        /* Styles spécifiques pour le burger menu sur petits écrans */
        @media screen and (max-width: 768px) {
            .menu ul {
                display: none;
                flex-direction: column;
                width: 100%;
                background-color: #333;
                position: absolute;
                top: 60px;
                left: 0;
                right: 0;
                padding: 20px 0;
                text-align: center;
            }

            .menu ul.active {
                display: flex;
            }

            .menu ul li {
                margin: 15px 0;
            }

            .menu-toggle {
                display: block;
            }

            .menu ul li a {
                font-size: 18px;
            }
        }
    </style>
    <script>
        // JavaScript pour basculer la classe "active" sur le menu
        function toggleMenu() {
            const menuList = document.getElementById('menuList');
            menuList.classList.toggle('active');
        }
    </script>
</head>
<body>
    <nav class="menu">
        
        
        <!-- Bouton burger pour petits écrans -->
        <button class="menu-toggle" id="burgerMenu" onclick="toggleMenu()">
            <i class="fas fa-bars"></i>
        </button>

        <!-- Menu de navigation -->
        <ul id="menuList">
            <li class="nav-item <?php if ($nav==='accueil'):?>active<?php endif; ?>"><a href="../apres_con.php">Accueil</a></li>
            <li class="nav-item <?php if ($nav==='services'):?>active<?php endif; ?>"><a href="service.php">Nos services</a></li>
            <li class="nav-item <?php if ($nav==='consultation'):?>active<?php endif; ?>"><a href="consultation.php">Consultation</a></li>
            <li class="nav-item <?php if ($nav==='apropos'):?>active<?php endif; ?>"><a href="apropos.php">À propos</a></li>
        </ul>
    </nav>
</body>
</html>
