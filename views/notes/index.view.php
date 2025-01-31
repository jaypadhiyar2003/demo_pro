<?php
require('views/partials/head.php'); //or require(__DIR__ . '/../partials/head.php');
require('views/partials/nav.php');//same above
require('views/partials/banner.php');//same above
global $serv;
?>
<main>
  <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    <ul class="list-disc">
      <?php foreach ($notes as $note): ?>
        <li> <a href="<?= $serv ?>/note?id=<?= $note['id'] ?>" class="text-blue-500 hover:underline">
            <?= htmlspecialchars($note['title']) ?>
          </a> 
        </li>
      <?php endforeach; ?>
    </ul>

    <p class="mt-3">
      <a href="<?= $serv ?>/notes/create" class="text-blue-500 hover:underline">Create New Note </a>
    </p>
  </div>
</main>
</div>

</body>

</html>