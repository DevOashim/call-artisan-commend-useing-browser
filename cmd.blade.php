<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artisan Commands</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body.dark-mode {
            background-color: #121212;
            color: #ffffff;
        }
        .dark-mode .btn, .dark-mode .form-control, .dark-mode .accordion-button, .dark-mode .list-group-item {
            background-color: #333;
            color: #ffffff;
        }
        .dark-mode .accordion-button:not(.collapsed) {
            background-color: #444;
        }
        .dark-mode .accordion-body {
            background-color: #222;
        }
        .dark-mode .accordion-button::after {
            filter: invert(1);
        }
        .light-mode .accordion-button::after {
            filter: invert(0);
        }
        .dark-mode ::placeholder {
            color: #ffffff;
        }
        .light-mode ::placeholder {
            color: #000000;
        }
         #themeToggle {
            color: #ffffff;
            background-color: #000000;
        }
        .dark-mode #themeToggle {
            color: #000000;
            background-color: #ffffff;
        }
    </style>
</head>
<body class="dark-mode">
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Artisan Commands</h1>
            <button id="themeToggle" class="btn btn-outline-secondary">Light Mode</button>
        </div>
        <form action="{{ route('customCmd') }}" method="POST" class="mb-4">
            @csrf
            <div class="row">
                <div class="col-md-6 text-center">
                    <div class="mb-3 text-start">
                        <label for="make" class="form-label">php artisan make:</label>
                        <input id="makeInput" list="makeCommands" type="text" name="make" class="form-control" placeholder="Custom Command">
                        <datalist id="makeCommands">
                            <option value="controller">
                            <option value="view">
                            <option value="model">
                            <option value="mail">
                            <option value="migration">
                            <option value="seeder">
                            <option value="factory">
                            <option value="middleware">
                            <option value="policy">
                            <option value="provider">
                        </datalist>
                    </div>
                    <button type="submit" class="btn px-4 btn-secondary">Make</button>
                </div>
                <div class="col-md-6 text-center">
                    <div class="mb-3 text-start">
                        <label for="name" class="form-label">php artisan</label>
                        <input id="artisanInput" list="artisanCommands" type="text" name="name" class="form-control" placeholder="Command">
                        <datalist id="artisanCommands">
                            <option value="migrate">
                            <option value="migrate:fresh">
                            <option value="migrate:refresh">
                            <option value="migrate:reset">
                            <option value="migrate:rollback">
                            <option value="db:seed">
                            <option value="cache:clear">
                            <option value="config:cache">
                            <option value="route:cache">
                            <option value="view:clear">
                            <option value="queue:work">
                            <option value="schedule:run">
                        </datalist>
                    </div>
                    <button type="submit" class="btn px-4 btn-primary">Run</button>
                </div>
            </div>
        </form>
        @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <pre>{{ session('status') }}</pre>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="mb-4">
            <h2>Shortcut Commands</h2>
            <div class="d-flex flex-wrap gap-2">
                <a href="/cmd/migrate" class="btn btn-outline-primary">migrate</a>
                <a href="/cmd/migrate:fresh" class="btn btn-outline-primary">migrate:fresh</a>
                <a href="/cmd/migrate:fresh --seed" class="btn btn-outline-primary">migrate:fresh --seed</a>
                <a href="/cmd/cache:clear" class="btn btn-outline-primary">cache:clear</a>
                <a href="/cmd/config:cache" class="btn btn-outline-primary">config:cache</a>
                <a href="/cmd/route:list" class="btn btn-outline-primary">route:list</a>
                <a href="/cmd/route:cache" class="btn btn-outline-primary">route:cache</a>
                <a href="/cmd/view:clear" class="btn btn-outline-primary">view:clear</a>
                <a href="/cmd/queue:work" class="btn btn-outline-primary">queue:work</a>
                <a href="/cmd/schedule:run" class="btn btn-outline-primary">schedule:run</a>
            </div>
        </div>
        <div class="accordion" id="artisanCommandsAccordion">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingMigrate">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseMigrate" aria-expanded="false" aria-controls="collapseMigrate">
                        Migrate Commands
                    </button>
                </h2>
                <div id="collapseMigrate" class="accordion-collapse collapse" aria-labelledby="headingMigrate" data-bs-parent="#artisanCommandsAccordion">
                    <div class="accordion-body">
                        <ul class="list-group">
                            <li class="list-group-item"><a href="/cmd/migrate">migrate</a></li>
                            <li class="list-group-item"><a href="/cmd/migrate:fresh">migrate:fresh</a></li>
                            <li class="list-group-item"><a href="/cmd/migrate:fresh --seed">migrate:fresh --seed</a></li>
                            <li class="list-group-item"><a href="/cmd/migrate:install">migrate:install</a></li>
                            <li class="list-group-item"><a href="/cmd/migrate:refresh">migrate:refresh</a></li>
                            <li class="list-group-item"><a href="/cmd/migrate:refresh --seed">migrate:refresh --seed</a></li>
                            <li class="list-group-item"><a href="/cmd/migrate:reset">migrate:reset</a></li>
                            <li class="list-group-item"><a href="/cmd/migrate:rollback">migrate:rollback</a></li>
                            <li class="list-group-item"><a href="/cmd/migrate:status">migrate:status</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingDb">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseDb" aria-expanded="false" aria-controls="collapseDb">
                        Database Commands
                    </button>
                </h2>
                <div id="collapseDb" class="accordion-collapse collapse" aria-labelledby="headingDb" data-bs-parent="#artisanCommandsAccordion">
                    <div class="accordion-body">
                        <ul class="list-group">
                            <li class="list-group-item"><a href="/cmd/db:seed">db:seed</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingCache">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCache" aria-expanded="false" aria-controls="collapseCache">
                        Cache Commands
                    </button>
                </h2>
                <div id="collapseCache" class="accordion-collapse collapse" aria-labelledby="headingCache" data-bs-parent="#artisanCommandsAccordion">
                    <div class="accordion-body">
                        <ul class="list-group">
                            <li class="list-group-item"><a href="/cmd/cache:clear">cache:clear</a></li>
                            <li class="list-group-item"><a href="/cmd/cache:forget">cache:forget</a></li>
                            <li class="list-group-item"><a href="/cmd/cache:table">cache:table</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingConfig">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseConfig" aria-expanded="false" aria-controls="collapseConfig">
                        Config Commands
                    </button>
                </h2>
                <div id="collapseConfig" class="accordion-collapse collapse" aria-labelledby="headingConfig" data-bs-parent="#artisanCommandsAccordion">
                    <div class="accordion-body">
                        <ul class="list-group">
                            <li class="list-group-item"><a href="/cmd/config:cache">config:cache</a></li>
                            <li class="list-group-item"><a href="/cmd/config:clear">config:clear</a></li>
                            <li class="list-group-item"><a href="/cmd/config:show">config:show</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingRoute">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseRoute" aria-expanded="false" aria-controls="collapseRoute">
                        Route Commands
                    </button>
                </h2>
                <div id="collapseRoute" class="accordion-collapse collapse" aria-labelledby="headingRoute" data-bs-parent="#artisanCommandsAccordion">
                    <div class="accordion-body">
                        <ul class="list-group">
                            <li class="list-group-item"><a href="/cmd/route:cache">route:cache</a></li>
                            <li class="list-group-item"><a href="/cmd/route:clear">route:clear</a></li>
                            <li class="list-group-item"><a href="/cmd/route:list">route:list</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingView">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseView" aria-expanded="false" aria-controls="collapseView">
                        View Commands
                    </button>
                </h2>
                <div id="collapseView" class="accordion-collapse collapse" aria-labelledby="headingView" data-bs-parent="#artisanCommandsAccordion">
                    <div class="accordion-body">
                        <ul class="list-group">
                            <li class="list-group-item"><a href="/cmd/view:cache">view:cache</a></li>
                            <li class="list-group-item"><a href="/cmd/view:clear">view:clear</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingQueue">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseQueue" aria-expanded="false" aria-controls="collapseQueue">
                        Queue Commands
                    </button>
                </h2>
                <div id="collapseQueue" class="accordion-collapse collapse" aria-labelledby="headingQueue" data-bs-parent="#artisanCommandsAccordion">
                    <div class="accordion-body">
                        <ul class="list-group">
                            <li class="list-group-item"><a href="/cmd/queue:failed">queue:failed</a></li>
                            <li class="list-group-item"><a href="/cmd/queue:flush">queue:flush</a></li>
                            <li class="list-group-item"><a href="/cmd/queue:forget">queue:forget</a></li>
                            <li class="list-group-item"><a href="/cmd/queue:listen">queue:listen</a></li>
                            <li class="list-group-item"><a href="/cmd/queue:restart">queue:restart</a></li>
                            <li class="list-group-item"><a href="/cmd/queue:retry">queue:retry</a></li>
                            <li class="list-group-item"><a href="/cmd/queue:work">queue:work</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingSchedule">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSchedule" aria-expanded="false" aria-controls="collapseSchedule">
                        Schedule Commands
                    </button>
                </h2>
                <div id="collapseSchedule" class="accordion-collapse collapse" aria-labelledby="headingSchedule" data-bs-parent="#artisanCommandsAccordion">
                    <div class="accordion-body">
                        <ul class="list-group">
                            <li class="list-group-item"><a href="/cmd/schedule:run">schedule:run</a></li>
                            <li class="list-group-item"><a href="/cmd/schedule:finish">schedule:finish</a></li>
                            <li class="list-group-item"><a href="/cmd/schedule:list">schedule:list</a></li>
                            <li class="list-group-item"><a href="/cmd/schedule:test">schedule:test</a></li>
                            <li class="list-group-item"><a href="/cmd/schedule:clear-cache">schedule:clear-cache</a></li>
                            <li class="list-group-item"><a href="/cmd/schedule:work">schedule:work</a></li>
                            <li class="list-group-item"><a href="/cmd/schedule:prune">schedule:prune</a></li>
                            <li class="list-group-item"><a href="/cmd/schedule:clear-missed">schedule:clear-missed</a></li>
                            <li class="list-group-item"><a href="/cmd/schedule:clear">schedule:clear</a></li>
                            <li class="list-group-item"><a href="/cmd/schedule:cache">schedule:cache</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('themeToggle').addEventListener('click', function() {
            document.body.classList.toggle('dark-mode');
            if (document.body.classList.contains('dark-mode')) {
                this.textContent = 'Light Mode';
            } else {
                this.textContent = 'Dark Mode';
            }
        });
        const makeInput = document.getElementById('makeInput');
        const makeCommands = document.getElementById('makeCommands');
        const artisanInput = document.getElementById('artisanInput');
        const artisanCommands = document.getElementById('artisanCommands');

        const makeOptions = [
            "controller Controller","controller","controller Controller --resource",
             "model","mail Mail", "mail",
             "migration _table", "migration", "migration  _table --table=s",
             "seeder Seeder", "seeder","scope",
            "factory", "middleware", "command","component", "event", "job",
            "listener", "notification",
             "policy","policy Policy", "provider","provider Provider", "request",
            "resource", "rule", "test","view","observer"
        ];

        const artisanOptions = [
            "migrate", "migrate:fresh", "migrate:refresh", "migrate:reset", "migrate:rollback",
            "db:seed", "cache:clear", "config:cache", "route:cache", "view:clear",
            "queue:work", "schedule:run","storage:unlink","storage:link","storage:link --relative","vendor:publish"
        ];

        function filterOptions(input, options, datalist) {
            const value = input.value.toLowerCase();
            datalist.innerHTML = '';
            options.forEach(option => {
                if (option.includes(value)) {
                    const optionElement = document.createElement('option');
                    optionElement.value = option;
                    datalist.appendChild(optionElement);
                }
            });
        }

        makeInput.addEventListener('input', () => filterOptions(makeInput, makeOptions, makeCommands));
        artisanInput.addEventListener('input', () => filterOptions(artisanInput, artisanOptions, artisanCommands));
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js" integrity="sha512-nnzkI2u2Dy6HMnzMIkh7CPd1KX445z38XIu4jG1jGw7x5tSL3VBjE44dY4ihMU1ijAQV930SPM12cCFrB18sVw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> 
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js" integrity="sha512-ykZ1QQr0Jy/4ZkvKuqWn4iF3lqPZyij9iRv6sGqLRdTPkY69YX6+7wvVGmsdBbiIfN/8OdsI7HABjvEok6ZopQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>
