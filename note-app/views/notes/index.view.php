<?php require("views/partials/head.php") ?>
<?php require("views/partials/nav.php") ?>
<?php require("views/partials/banner.php") ?>


<main>
  <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    <!-- Your content -->
    <h1 class="text-2xl font-bold">Hello, This is my notes page</h1>
      <ul>
        <?php foreach ($notes as $note) : ?>
          <li>
            <a href="/note?id=<?= $note['id'] ?>" class="text-blue-500 hover:underline">
              <?= htmlspecialchars($note['body']) ?>
            </a>
          </li>
        <?php endforeach; ?>
      </ul>
      <p class="mt-14">
        <a href="/notes/create" class="text-blue-500 hover:underline">Create a Note</a>
      </p>
  </div>
</main>
<?php require("views/partials/footer.php") ?>