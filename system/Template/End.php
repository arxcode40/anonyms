    <footer class="bg-body-tertiary mt-auto">
      <div class="container py-3">
        <div class="fs-5 g-3 justify-content-center row">
          <div class="col-auto">
            <a class="link-body-emphasis" href="<?= Config::get('link_email'); ?>">
              <i class="bi bi-envelope-fill"></i>
            </a>
          </div>
          <div class="col-auto">
            <a class="link-body-emphasis" href="<?= Config::get('link_facebook'); ?>">
              <i class="bi bi-facebook"></i>
            </a>
          </div>
          <div class="col-auto">
            <a class="link-body-emphasis" href="<?= Config::get('link_github'); ?>">
              <i class="bi bi-github"></i>
            </a>
          </div>
          <div class="col-auto">
            <a class="link-body-emphasis" href="<?= Config::get('link_instagram'); ?>">
              <i class="bi bi-instagram"></i>
            </a>
          </div>
          <div class="col-auto">
            <a class="link-body-emphasis" href="<?= Config::get('link_messenger'); ?>">
              <i class="bi bi-messenger"></i>
            </a>
          </div>
          <div class="col-auto">
            <a class="link-body-emphasis" href="<?= Config::get('link_telegram'); ?>">
              <i class="bi bi-telegram"></i>
            </a>
          </div>
          <div class="col-auto">
            <a class="link-body-emphasis" href="<?= Config::get('link_twitter-x'); ?>">
              <i class="bi bi-twitter-x"></i>
            </a>
          </div>
          <div class="col-auto">
            <a class="link-body-emphasis" href="<?= Config::get('link_whatsapp'); ?>">
              <i class="bi bi-whatsapp"></i>
            </a>
          </div>
        </div>
        <hr>
        <div class="text-center">
          <?= Config::get('app_copyright'); ?>
        </div>
      </div>
    </footer>
  </body>
</html>