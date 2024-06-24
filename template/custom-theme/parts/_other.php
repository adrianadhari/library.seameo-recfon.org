<?php

/**
 * @Created by          : Waris Agung Widodo (ido.alit@gmail.com)
 * @Date                : 2019-01-29 10:43
 * @File name           : _other.php
 */

?>

<div class="result-search pb-5">
  <section id="section1 container-fluid">
    <header class="">
      <div class="mask"></div>
      <?php
      // ----------------------------------------------------------------------
      // include navbar part
      // ----------------------------------------------------------------------
      include '_navbar.php'; ?>
    </header>
  </section>

  <section class="container my-8">
    <?php
    if ($_GET['p'] !== 'show_detail') {
      if ($_GET['p'] === 'librarian') {
        echo '<div class="flex flex-row flex-wrap">' . $main_content . '</div>';
      } else if ($_GET['p'] === 'libinfo') {
        echo '
        <div class="flex flex-col lg:flex-row gap-4">
            <div class="lg:w-3/5">
                <iframe
                    src="' . $sysconf['template']['classic_map_link'] . '"
                    width="100%" height="300" style="border:0;" allowfullscreen=""></iframe>
            </div>
            <div class="lg:w-2/5 pt-8 lg:pt-0">
                <div class="flex flex-col gap-2">
                    <p class="text-lg">' . $sysconf['template']['classic_map_desc'] . '</p>
                    <div class="flex items-center gap-2">
                        <i class="fas fa-phone"></i><span class="text-lg">' . $sysconf['template']['classic_phone_number'] . '</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <i class="fas fa-envelope"></i><span class="text-lg">' . $sysconf['template']['classic_mail_address'] . '</span>
                    </div>
                </div>
            </div>
        </div>
        ';
      } else if ($_GET['p'] === 'login') {
        echo '
        <div class="flex justify-center">
          <div class="card shadow lg:w-1/3">
            <div class="card-body mx-auto py-8">
              <div class="mb-6">
                <h2 class="font-bold">Login</h2>
                <p>Welcome back to ' . $sysconf['library_name'] . '</p>
              </div>
              ' . $main_content . '
            </div>
          </div>
        </div>
        ';
      } else if ($_GET['p'] === 'forgot') {
        echo '
        <div class="flex justify-center">
          <div class="card shadow lg:w-1/3">
            <div class="card-body mx-auto py-8">
            ' . $main_content . '
            </div>
          </div>
        </div>
        ';
      } else {
        echo $main_content;
      }
    } else {
      echo $main_content;
    }
    ?>
  </section>
</div>