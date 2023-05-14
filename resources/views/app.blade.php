<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">
    <link rel="stylesheet" href="https://unpkg.com/buefy/dist/buefy.min.css">
    <!-- script -->
    <script src=" https://unpkg.com/buefy/dist/buefy.min.js"></script>
    <style>
        html{
            background-color: #F2F2F5;
        }
        .card-div{
            padding-left: 7.75rem;
            padding-right: 7.75rem;margin-top: 2rem;
        }
        @media (max-width: 1100px) {
            .card-div{
                padding-left: 2.75rem;
                padding-right: 2.75rem;margin-top: 2rem;
            }
        }

        @media (max-width: 874px) {
            .bg-img{
                display: none;

            }
        }
    </style>
    @routes
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @inertiaHead
</head>
<body style="background-color: #F8FAFC">

@inertia
</body>
</html>
