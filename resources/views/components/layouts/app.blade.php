<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>xCounter</title>

    <meta name="description" content="">
    <meta name="author" content="Nelson Flores">
    <meta name="robots" content="noindex, nofollow">

    <!-- Icons -->
    <link rel="shortcut icon" href="assets/media/favicons/favicon.png">
    <link rel="apple-touch-icon" href="assets/media/favicons/apple-touch-icon-180x180.png">
    <link rel="icon" href="assets/media/favicons/favicon-192x192.png">

    <!-- Stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/main.min.css">
</head>

<body>
    <!-- Page Content -->
    <div id="page-container">
        <!-- Header -->
        <!-- Background by https://myphotopack.com -->
        <div class="bg-image" style="background-image: url('assets/media/various/bg-header.jpg');">
            <div class="bg-image-overlay pt-5 py-md-5">
                <header class="container d-md-flex align-items-md-center justify-content-md-between py-4">
                    <div class="text-center text-md-left py-2">
                        <a class="h5 text-dark font-weight-bold d-flex align-items-center justify-content-center mb-0"
                            href="">
                            <i class="fa far fa-compass mr-2"></i> xCounter
                        </a>
                    </div>
                    <div class="text-center text-md-right py-2">
                        <div class="dropdown">
                            <button class="btn btn-link" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                Usuario: {{auth()->user()->username}}
                            </button>
                            <div class="dropdown-menu dropdown-menu-right font-size-sm"
                                aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{ route('logout') }}">Sair</a>
                            </div>
                        </div>
                    </div>
                </header>
            </div>
        </div>
        <!-- END Header -->

        <!-- Container -->
        <div class="container py-4">
            {{$slot}}
        </div>
        <!-- END Content -->

        <!-- Footer -->
        <div class="bg-black-10">
            <footer class="container text-muted font-size-sm d-md-flex justify-content-md-between py-4">
                <div class="text-center text-md-left py-2">
                    <strong>xCounter</strong> &copy; <script>
                        document.write((new Date()).getFullYear());
                    </script>
                </div>
                <div class="text-center text-md-right py-2">
                    Crafted with care by <a
                        href="https://nave.co.mz">Nave</a>
                </div>
            </footer>
        </div>
        <!-- END Footer -->
    </div>
    <!-- END Page Content -->

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.1.0/chart.min.js"
        integrity="sha512-RGbSeD/jDcZBWNsI1VCvdjcDULuSfWTtIva2ek5FtteXeSjLfXac4kqkDRHVGf1TwsXCAqPTF7/EYITD0/CTqw=="
        crossorigin="anonymous"></script>

    <!-- Custom JS -->
    <script>
        jQuery(function(){
                // Set Global Chart.js configuration
                Chart.defaults.color                                = '#718096';
                Chart.defaults.scale.grid.color                     = 'transparent';
                Chart.defaults.scale.grid.zeroLineColor             = 'transparent';
                Chart.defaults.elements.line.borderWidth            = 2;
                Chart.defaults.elements.point.radius                = 4;
                Chart.defaults.elements.point.hoverRadius           = 6;
                Chart.defaults.plugins.tooltip.radius               = 4;
                Chart.defaults.plugins.legend.display               = false;

                // Get Chart Container
                var chartVisitors = jQuery('.js-chartjs-visitors');

                // Init Chart
                var chart = new Chart(chartVisitors, {
                    type: 'line',
                    data: {
                        labels: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
                        datasets: [
                            {
                                label: 'Visitors',
                                fill: true,
                                backgroundColor: 'rgba(56, 161, 105, .25)',
                                borderColor: 'rgba(56, 161, 105, 1)',
                                pointBackgroundColor: 'rgba(56, 161, 105, 1)',
                                pointBorderColor: '#fff',
                                pointHoverBackgroundColor: '#fff',
                                pointHoverBorderColor: 'rgba(56, 161, 105, 1)',
                                data: [17262, 31552, 14833, 29132, 21432, 23679, 36789]
                            }
                        ]
                    },
                    options: {
                        maintainAspectRatio: false,
                        tension: .4,
                        scales: {
                            y: {
                                suggestedMin: 0,
                                suggestedMax: 40000
                            }
                        },
                        interaction: {
                            intersect: false,
                        },
                        plugins: {
                            tooltip: {
                                callbacks: {
                                    label: function(context) {
                                        return ' ' + context.parsed.y + ' Page views';
                                    }
                                }
                            }
                        }
                    }
                });
            });
    </script>
    @yield('scripts')
</body>

</html>