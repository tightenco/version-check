<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700|Open+Sans:400,700" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/main.css">

        <title>Checkmate - Tighten</title>
    </head>

    <body>

        @include('partials.header')

        <div class="bg-frost font-sans relative z-0">
            <div class="max-w-xl mx-auto pt-8">
                <p class="mb-6 text-black-lighter">
                    Showing versions for {{ $projects->count() }} active projects and packages
                </p>
                <div class="rounded-lg shadow">
                    <ul class="bg-grey-blue-light flex list-reset p-4 rounded-t-lg border-grey border-b-2">
                        <li class="w-2/6 text-grey-darker font-semibold uppercase text-xs tracking-wide">Project / Package name</li>

                        <li class="w-1/6 text-grey-darker font-semibold uppercase text-xs tracking-wide">Version Constraint</li>

                        <li class="w-1/6 text-grey-darker font-semibold uppercase text-xs tracking-wide">Current Version</li>

                        <li class="w-1/6 text-grey-darker font-semibold uppercase text-xs tracking-wide">Prescribed Version</li>

                        <li class="w-1/6 text-grey-darker font-semibold uppercase text-xs tracking-wide">Status</li>

                        <li class="w-1/6 text-grey-darker font-semibold uppercase text-xs tracking-wide">Ignore</li>
                    </ul>

                    <section class="bg-white rounded-b-lg">
                        @foreach ($projects as $project)
                            <ul class="flex list-reset p-4 border-t border-smoke">
                                <li class="w-2/6">
                                    <a class="text-indigo no-underline text-md" href="{{ $project->github_url }}">
                                        {{ $project->name }}
                                    </a>
                                </li>

                                <li class="w-1/6 text-black-lightest">{{ $project->laravel_constraint }}</li>

                                <li class="w-1/6 text-black-lightest">{{ $project->laravel_version }}</li>

                                <li class="w-1/6 text-black-lightest">{{ $project->desired_laravel_version }}</li>

                                <li class="w-1/6 text-black-lightest">{!! $project->presentStatus() !!}</li>

                                <li class="w-1/6">
                                    <form action="{{ route('project.ignore', $project) }}" method="POST">
                                        @method('PATCH')
                                        @csrf
                                        <input type="submit" value="Ignore" class="bg-indigo-muted hover:bg-indigo-light text-white px-3 py-1 rounded cursor-pointer">
                                    </form>
                                </li>
                            </ul>
                        @endforeach
                    </section>
                </div>
            </div>
            <br><br>
        </div>
    </body>
</html>
