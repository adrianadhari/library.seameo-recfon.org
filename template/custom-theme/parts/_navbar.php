<?php
# @Author: Waris Agung Widodo <user>
# @Date:   2018-01-25T10:25:29+07:00
# @Email:  ido.alit@gmail.com
# @Filename: _navbar.php
# @Last modified by:   user
# @Last modified time: 2018-01-25T10:29:27+07:00

$main_menus = [
  'home' => [
    'text' => __('Home'),
    'url' => 'index.php',
    'target' => ''
  ],
  'elibrary' => [
    'text' => __('SEAMEO E-Library'),
    'url' => 'https://elibrary.seameo.org/',
    'target' => '_blank'
  ],
	'perpusnas' => [
    'text' => __('Kemdikbudristek E-Library'),
    'url' => 'https://pustaka-digital.kemdikbud.go.id/',
    'target' => '_blank'
  ],
  'libinfo' => [
    'text' => __('Contact'),
    'url' => 'index.php?p=libinfo',
    'target' => ''
  ]
];
?>

<nav class="navbar navbar-expand-lg py-2">
  <div class="container">
    <a class="navbar-brand text-sm md:text-xl font-bold" href="index.php">
      <?php
      if (isset($sysconf['logo_image']) && $sysconf['logo_image'] != '' && file_exists('images/default/' . $sysconf['logo_image'])) {
        echo '<img class="h-16 w-16 mr-2 d-none d-lg-inline" src="images/default/' . $sysconf['logo_image'] . '">';
      } elseif (file_exists(__DIR__ . '/../assets/images/logo.svg')) {
        echo '<img class="h-16 w-16 mr-2 d-none d-lg-inline" src="' . assets('images/logo.svg') . '">';
      }
      ?>
      <?php echo $sysconf['library_name']; ?>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0 gap-2">
        <?php
        foreach ($main_menus as $key => $main_menu) {
          $active = '';
          if (isset($_GET['p'])) {
            if ($key === $_GET['p']) $active = 'font-bold';
          } elseif ($key === 'home') {
            $active = 'font-bold';
          }
          $menu_str = <<<HTML
          <li class="nav-item">
            <a target="{$main_menu['target']}" class="nav-link {$active}" href="{$main_menu['url']}">{$main_menu['text']}</a>
          </li>
          HTML;
          echo $menu_str;
        }
        ?>

        <li class="nav-item">
          <a class="btn text-white px-6 bg-primary flex" href="index.php?p=login"><?= __('Login') ?></a>
        </li>

        <li class="nav-item dropdown">
          <?php
          $langstr = '';
          $current_lang = '';
          $select_lang = isset($_COOKIE['select_lang']) ? $_COOKIE['select_lang'] : $sysconf['default_lang'];
          require_once(LANG . 'localisation.php');
          foreach ($available_languages as $lang_index) {
            $selected = null;
            $lang_code = $lang_index[0];
            $lang_name = $lang_index[1];
            $code_arr = explode('_', $lang_code);
            $code_flag = strtolower($code_arr[1]);
            if ($lang_code == $select_lang) {
              $current_lang = [
                'name' => $lang_name,
                'code' => $code_flag
              ];
            }
            $langstr .= <<<HTML
    <a class="dropdown-item" href="index.php?select_lang={$lang_code}">
        <span class="flag-icon flag-icon-{$code_flag} mr-2" style="border-radius: 2px;"></span> {$lang_name}
    </a>
HTML;
          }
          ?>
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <span class="flag-icon flag-icon-<?= $current_lang['code'] ?>" style="border-radius: 2px;"></span>
          </a>
          <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="#"><?= __('Select Language'); ?> :</a></li>
            <?= $langstr; ?>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>