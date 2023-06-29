<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <link rel="shortcut icon" href="#" type="image/x-icon">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>
    <?= $title ?>
  </title>
  <link href="<?= base_url('hljs-onedark/onedark.css'); ?>" rel="stylesheet" id="codeStyle" />
  <link href="<?= base_url('bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
  <link href="<?= base_url('bootstrap-icon/font/bootstrap-icons.css') ?>" rel="stylesheet">
  <link href="<?= base_url('css/main.min.css') ?>" rel="stylesheet">
  <link href="<?= base_url('hljs-copy/dist/highlightjs-copy.min.css') ?>" rel="stylesheet" />
  <link href="<?= base_url('css/tree.css') ?>" rel="stylesheet">
  <link href="<?= base_url('css/style.css') ?>" rel="stylesheet">
  <link href="<?= base_url('css/mystyle.css') ?>" rel="stylesheet">
</head>

<body class="bg-body-tertiary">
  <?= $this->include('layout/navbar'); ?>
  <main>
    <?= $this->renderSection('content'); ?>
    <?= $this->include('layout/footer'); ?>
  </main>
  <script src="<?= base_url('jquery/jquery-3.5.1.js') ?>"></script>
  <script src="<?= base_url('bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
  <script src="<?= base_url('js/tree.js') ?>"></script>
  <script src="<?= base_url('js/script.js') ?>"></script>
  <script src="<?= base_url('hljs/highlight.min.js') ?>"></script>
  <script src="<?= base_url('hljs-number/highlightjs-line-numbers.min.js') ?>"></script>
  <script src="<?= base_url('hljs-copy/dist/highlightjs-copy.min.js') ?>"></script>
  <script>
    hljs.addPlugin(
      new CopyButtonPlugin({
        hook: (text, el) => {
          let { replace, replacewith } = el.dataset;
          if (replace && replacewith) {
            return text.replace(replace, replacewith);
          }
          return text;
        },
        callback: (text, el) => {
          /* logs `gretel configure --key grtf32a35bbc...` */
          console.log(text);
        },
      })
    );
    hljs.highlightAll();
    hljs.initLineNumbersOnLoad();
  </script>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      window.nav = new NavTree("#nav-tree", {
        searchable: true,
        showEmptyGroups: true,

        groupOpenIconClass: "bi",
        groupOpenIcon: "bi-chevron-down",

        groupCloseIconClass: "bi",
        groupCloseIcon: "bi-chevron-right",

        linkIconClass: "bi",
        linkIcon: "",

        iconWidth: "24px",

        searchPlaceholderText: "Search",
      });
    });
  </script>
</body>

</html>