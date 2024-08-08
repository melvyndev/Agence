<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Agence Immobilière</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <style>
        /* TailwindCSS base styles */
        *, ::after, ::before {
            box-sizing: border-box;
            border-width: 0;
            border-style: solid;
            border-color: #e5e7eb;
        }
        ::after, ::before {
            --tw-content: '';
        }
        html {
            line-height: 1.5;
            -webkit-text-size-adjust: 100%;
            -moz-tab-size: 4;
            tab-size: 4;
            font-family: Figtree, sans-serif;
            font-feature-settings: normal;
        }
        body {
            margin: 0;
            line-height: inherit;
            background-color: #f8f9fa; /* Light gray background */
            color: #333; /* Dark text color */
        }
        /* Custom styles */
        .header {
            background-color: #ff7043; /* Orange background */
            color: white;
            padding: 1rem 2rem;
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 2.5rem;
            font-weight: 600;
        }
        .header p {
            margin: 0.5rem 0 0;
            font-size: 1.25rem;
        }
        .content {
            padding: 2rem 1.5rem;
            text-align: center;
        }
        .content h2 {
            font-size: 2rem;
            color: #ff7043; /* Orange text */
            margin-bottom: 1rem;
        }
        .content p {
            font-size: 1.125rem;
            color: #666;
        }
        .cta-button {
            display: inline-block;
            margin-top: 2rem;
            padding: 0.75rem 1.5rem;
            font-size: 1rem;
            color: white;
            background-color: #ff7043; /* Orange background */
            border: none;
            border-radius: 0.5rem;
            text-decoration: none;
            transition: background-color 0.3s;
        }
        .cta-button:hover {
            background-color: #e64a19; /* Darker orange on hover */
        }
    </style>
</head>
<body class="antialiased">
    <div class="header">
        <h1>Bienvenue chez Notre Agence Immobilière</h1>
        <p>Trouvez la maison de vos rêves avec nous</p>
    </div>
    <div class="content">
        <h2>Découvrez Nos Dernières Offres</h2>
        <p>Explorez une large gamme de propriétés adaptées à tous les goûts et budgets.</p>
        <a href="#" class="cta-button">Voir les Offres</a>
    </div>
</body>
</html>
