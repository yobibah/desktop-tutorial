<?php 
$nav = "apropos";
$title = "À propos de nous";
require "en_teteco.php"; // Assure-toi que ce fichier existe et est correct

echo "
    <style>
        /* Style global de la page */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #333;
        }

        /* Style du conteneur principal */
        .container {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 900px;
            padding: 30px;
            margin: 20px;
            overflow: hidden;
            margin-top:40rem;
        }

        /* Style du titre */
        .container h1 {
            font-size: 32px;
            text-align: center;
            color: #2c3e50;
            margin-bottom: 20px;
            font-weight: bold;
        }

        /* Style du paragraphe */
        .container p {
            line-height: 1.6;
            font-size: 18px;
            color: #555;
            margin-bottom: 20px;
            text-align: justify;
        }

        /* Style pour la première lettre du paragraphe */
        .container p:first-letter {
            font-size: 30px;
            font-weight: bold;
            color: #2980b9;
        }

        /* Style pour la mise en évidence des points clés */
        .container .highlight {
            font-weight: bold;
            color: #2980b9;
        }

        /* Style des citations (si tu en ajoutais) */
        .container blockquote {
            background-color: #ecf0f1;
            border-left: 5px solid #2980b9;
            padding: 15px 20px;
            margin: 20px 0;
            font-style: italic;
        }
            @media (max-width: 767px) {
    .container {
        padding: 15px;
        margin-top:100rem;
    }

    .container h1 {
        font-size: 24px; /* Taille du titre réduite sur petits écrans */
    }

    .container p {
        font-size: 16px; /* Taille du texte réduite sur petits écrans */
    }
}
    </style>
";

echo "
    <div class='container'>
        <h1>Biographie de BECDD-International</h1>
        <p><span class='highlight'>Fondée en 2023</span>, BECDD-International est une entreprise innovante et dynamique spécialisée dans la gestion environnementale et le développement durable. Basée à Ouagadougou, la capitale du Burkina Faso, BECDD-International s’est rapidement imposée comme un acteur de premier plan, non seulement en Afrique, mais également sur la scène internationale, grâce à son expertise unique et à son engagement fort envers la protection de l’environnement.</p>

        <p>L’entreprise a vu le jour dans un contexte où les enjeux environnementaux deviennent de plus en plus pressants, notamment en raison des changements climatiques, de la dégradation des écosystèmes et de l’épuisement des ressources naturelles. En réponse à ces défis mondiaux, BECDD-International a choisi de se consacrer à des solutions novatrices et durables qui visent à préserver et restaurer les ressources naturelles, tout en permettant un développement économique équilibré et respectueux de l’environnement.</p>

        <p>Au fil des mois, BECDD-International a su se distinguer par son approche intégrée de la gestion environnementale, combinant expertise technique, approche scientifique et collaboration avec les communautés locales. L'entreprise a mis en œuvre des projets ambitieux dans des domaines variés, allant de la gestion des déchets et des eaux usées à la promotion des énergies renouvelables, en passant par la reforestation et la gestion durable des ressources en eau.</p>

        <p>Grâce à son équipe de professionnels qualifiés et passionnés, BECDD-International a également réussi à tisser des partenariats solides avec des organisations internationales, des ONG et des gouvernements, favorisant ainsi la mise en place de projets à large échelle qui répondent aux objectifs globaux du développement durable. Son approche proactive a permis à l'entreprise de se faire un nom parmi les leaders du secteur, attirant ainsi l'attention d’investisseurs et de partenaires internationaux.</p>

        <p>L’engagement de BECDD-International ne se limite pas uniquement à la réalisation de projets environnementaux, mais s’étend également à la sensibilisation et à l’éducation des populations locales. L’entreprise œuvre sans relâche pour promouvoir des pratiques durables, encourager la responsabilité sociale des entreprises (RSE) et renforcer les capacités des acteurs locaux afin de garantir la pérennité des initiatives environnementales à long terme.</p>

        <p>En somme, BECDD-International représente l’avenir de la gestion environnementale en Afrique et au-delà, avec une vision ambitieuse et un impact concret. Son objectif : contribuer à un avenir plus vert, plus juste et plus durable pour les générations futures, tout en soutenant une croissance économique respectueuse de la planète.</p>
    </div>
";

?>
