<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/css/output.css">
    <title>ToDo App</title>
</head>

<body class="flex flex-col min-h-screen justify-between">
    <!-- header section -->
    <header class="h-16 w-full bg-slate-800 flex justify-center items-center">
        <h1 class="text-white text-2xl">ToDo App</h1>
    </header>
    <main class="flex justify-start items-center flex-col min-h-[500px] px-2">
        <!-- input section -->
        <section class="w-full sm:w-2/3 md:w-1/2 bg-slate-200 my-5 p-3 sm:p-5 rounded">
            <form action="/create" method="POST" class="w-full flex justify-between">
                <input type="text" name="task" autofocus placeholder="new task..." class="p-2 rounded w-3/4 outline-none border-none">
                <button class="p-2 bg-green-500 hover:bg-green-400 rounded text-white w-1/5 text-sm font-bold">
                    Create
                </button>
            </form>
        </section>

        <!-- tasks -->
        <section class="w-full sm:w-2/3 md:w-1/2 my-5 rounded">

            <?php if (!empty($tasks)): ?>
                <?php foreach ($tasks as $task): ?>
                    <!-- task container -->
                    <div class="bg-slate-200 w-full my-5 p-3 sm:p-5 rounded flex justify-between items-center <?= $task['done'] ? 'opacity-70 bg-green-200' : '' ?>">

                        <!-- task text -->
                        <p class="w-3/4 text-wrap"><?= $task['body'] ?></p>

                        <!-- buttons -->
                        <div class="flex gap-1">
                            <!-- delete button -->
                            <form action="/delete" method="post">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="id" value="<?= $task['id'] ?>">
                                <button class="w-8 h-8 bg-red-500 hover:bg-red-400 rounded text-white">
                                    X
                                </button>
                            </form>
                            <!-- done button -->
                            <form action="/edit" method="post">
                                <input type="hidden" name="_method" value="PATCH">
                                <input type="hidden" name="id" value="<?= $task['id'] ?>">
                                <input type="hidden" name="done" value="<?= $task['done'] ?>">
                                <button class="w-8 h-8 bg-green-500 hover:bg-green-400 rounded text-white">
                                    ✓
                                </button>
                            </form>
                        </div>
                    </div>
                <?php endforeach ?>

            <?php else: ?>
                <h1 class="text-center font-semibold text-slate-800 text-xl mt-16">No Tasks To Show!</h1>
            <?php endif; ?>
        </section>

    </main>

    <!-- footer section -->
    <footer class="h-16 bg-slate-800 text-white flex flex-col items-center justify-center">
        <p>created by Mahmoud | 2024</p>
        <a href="https://github.com/Mahm0ud-0/" class="hover:underline ">see project on github</a>
    </footer>

</body>
</html>