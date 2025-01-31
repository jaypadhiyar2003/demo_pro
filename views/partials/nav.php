<?php
global $serv;
?>
<nav class="bg-gray-800">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="flex h-16 items-center justify-between">
        <div class="flex items-center">
          <div class="shrink-0">
            <img class="size-8" src="https://tailwindui.com/plus/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company">
          </div>
          <div class="hidden md:block">
            <div class="ml-10 flex items-baseline space-x-4">
              <a href="<?=$serv?>/" class="<?= url("$serv/")? 'bg-gray-900 text-white':'text-gray-300'; ?> rounded-md px-3 py-2 text-sm font-medium hover:bg-gray-700 hover:text-white">Home</a>
              <a href="<?=$serv?>/about" class="<?= url("$serv/about")? 'bg-gray-900 text-white': 'text-gray-300'; ?> rounded-md px-3 py-2 text-sm font-medium  hover:bg-gray-700 hover:text-white">About</a>

            <?php if($_SESSION['user'] ?? false) : ?>
              <a href="<?=$serv?>/notes" class="<?= url("$serv/notes")? 'bg-gray-900 text-white' : 'text-gray-300'; ?> rounded-md px-3 py-2 text-sm font-medium  hover:bg-gray-700 hover:text-white">Notes</a>
              <?php endif; ?>
              <a href="<?=$serv?>/contact" class="<?= url("$serv/contact")? 'bg-gray-900 text-white' : 'text-gray-300'; ?> rounded-md px-3 py-2 text-sm font-medium  hover:bg-gray-700 hover:text-white">Contact</a>
              </div>
          </div>
        </div>
        <div class="hidden md:block">
          <div class="ml-4 flex items-center md:ml-6">
            
            <!-- Profile dropdown -->
            <div class="relative ml-3">
              <div>
              <?php if($_SESSION['user'] ?? false) : ?>
                <button type="button" class="relative flex max-w-xs items-center rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                  <span class="absolute -inset-1.5"></span>
                  <span class="sr-only">Open user menu</span>
                  
                  <img class="size-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                  
                </button>
                <?php else : ?> 
                <a href="<?=$serv?>/register" class="<?= url("$serv/register")? 'bg-gray-900 text-white': 'text-gray-300'; ?> rounded-md px-3 py-2 text-sm font-medium  hover:bg-gray-700 hover:text-white">Register</a>
                <a href="<?=$serv?>/session" class="<?= url("$serv/session")? 'bg-gray-900 text-white': 'text-gray-300'; ?> rounded-md px-3 py-2 text-sm font-medium  hover:bg-gray-700 hover:text-white">Login</a>
            <?php endif; ?>
              </div>
            </div>
            <?php if($_SESSION['user'] ?? false) : ?>
            <div class="relative ml-3">
              <form method="post" action="<?= $serv ?>/session">
              <input type="hidden" name="_method" value = "DELETE">
        
              <button type="submit" class="<?= url("$serv/session")? 'bg-gray-900 text-white': 'text-gray-300'; ?> rounded-md px-3 py-2 text-sm font-medium  hover:bg-gray-700 hover:text-white">Logout</button>
              </form>
              </div>
              <?php endif; ?>
          </div>
        </div>
        <div class="-mr-2 flex md:hidden">
          <!-- Mobile menu button -->
          <button type="button" class="relative inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" aria-controls="mobile-menu" aria-expanded="false">
            <span class="absolute -inset-0.5"></span>
            <span class="sr-only">Open main menu</span>
            <!-- Menu open: "hidden", Menu closed: "block" -->
            <svg class="block size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
            <!-- Menu open: "block", Menu closed: "hidden" -->
            <svg class="hidden size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
      </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="md:hidden" id="mobile-menu">
      <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
        <a href="<?=$serv?>/" class="<?= url("$serv/")? 'bg-gray-900 text-white':'text-gray-300'; ?> block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Home</a>
        <a href="<?=$serv?>/about" class="<?= url("$serv/about")? 'bg-gray-900 text-white':'text-gray-300'; ?> block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">About</a>
        <?php if($_SESSION['user'] ?? false) : ?>
              <a href="<?=$serv?>/notes" class="<?= url("$serv/notes")? 'bg-gray-900 text-white':'text-gray-300'; ?> block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Notes</a>
        <?php endif; ?>
        <a href="<?=$serv?>/contact" class="<?= url("$serv/contact")? 'bg-gray-900 text-white':'text-gray-300'; ?> block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Contact</a>
        </div>
      <div class="border-t border-gray-700 pb-3 pt-4">
        <div class="flex items-center px-5">
          <div class="shrink-0">
            <?php if($_SESSION['user'] ?? false) : ?>
            <img class="size-10 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
            <?php else : ?>
              <a href="<?= $serv ?>/register" >Register</a>
            <?php endif; ?>
          </div>
          <div class="ml-3">
            <div class="text-base/5 font-medium text-white">Tom Cook</div>
            <div class="text-sm font-medium text-gray-400">tom@example.com</div>
          </div>
        </div>
      </div>
    </div>
  </nav>
