<?php
require('views/partials/head.php');
require('views/partials/nav.php');
require('views/partials/banner.php');
global $serv;
?>
<main>
<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
  <?= isset($_SESSION['register'])? 
  '<div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
  <strong class="font-bold">Registered Sucessfully!</strong>
  <span class="block sm:inline">Try to login in your account</span>
</div>' : '' ?>
  <div class="sm:mx-auto sm:w-full sm:max-w-sm">
    <img class="mx-auto h-10 w-auto" src="https://tailwindui.com/plus/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company">
    <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-gray-900">Login to your account</h2>
  </div>

  <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
    <form class="space-y-6" action="<?= $serv ?>/session" method="POST">
      <div>
        <label for="email" class="block text-sm/6 font-medium text-gray-900">Email address</label>
        <div class="mt-2">
          <input type="email" name="email" id="email" autocomplete="email" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" value="<?= old('email')//$_SESSION['_flash']['old']['email']?? '' ?>">
        </div>
        <?php if(isset($errors['email'])): ?>
                        <p class="text-red-500 text-xs mt-2"> * <?= $errors['email'] ?></p>
                    <?php endif; ?>
      </div>

      <div>
        <div class="flex items-center justify-between">
          <label for="password" class="block text-sm/6 font-medium text-gray-900">Password</label>
          
        </div>
        <div class="mt-2">
          <input type="password" name="password" id="password" autocomplete="current-password" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
        </div>
        <?php if(isset($errors['password'])): ?>
                        <p class="text-red-500 text-xs mt-2"> * <?= $errors['password'] ?></p>
                    <?php endif; ?>
      </div>

      <div>
        <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Login</button>
      </div>

    </form>
  </div>
</div>
  
</main>
</div>

</body>

</html>