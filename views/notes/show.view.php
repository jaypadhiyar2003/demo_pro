<?php
require('views/partials/head.php');
require('views/partials/nav.php');
require('views/partials/banner.php');
global $serv;
?>
<main>
  <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    <ul class="list-disc">
      <li>
        <a href="<?= $serv ?>/notes" class="text-blue-500 hover:underline">
          <?= htmlspecialchars($note['title']) ?>
        </a>
      </li>
    </ul>
    <p class="mt-3">
      <a href="<?= $serv ?>/notes" class="text-blue underline">Go Back to Notes </a>
    </p>
    <form class="mt-3" method="POST">
      <input type="hidden" name="_method" value = "DELETE">
      <input type="hidden" name="id" value="<?= $note['id'] ?>">
      <button class="text-sm text-red-500">Delete</button>
    </form>
    <footer class="mt-6">
      <a href="<?= $serv ?>/note/edit?id=<?= $note['id'] ?>" class="tblock w-full rounded-md bg-gray-600 px-3.5 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600" >Edit</a>
    </footer>
  </div>
</main>
</div>

</body>

</html>