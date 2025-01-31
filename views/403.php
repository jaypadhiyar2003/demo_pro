<?php
global $serv;
$heading = '403';
require('views/partials/head.php');
require('views/partials/banner.php');

?>

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      <h1 class="text-2xl font-bold">403 Forbidden error !<br> Incorrect or overly restrictive permissions ! <br> UnAuthorized to access this note ! </h1>

      <a href="<?= $serv?>/" class= "text-blue underline">Go Back to Home </a>
    </div>
  </main>
</div>

</body>
</html>