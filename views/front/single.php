<?php ob_start(); ?>
    <div class="demo-blog demo-blog--blogpost mdl-layout mdl-js-layout has-drawer is-upgraded">
      <main class="mdl-layout__content">
        <div class="demo-back">
          <a class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" href="home.phpdex.php" title="go back" role="button">
            <i class="material-icons" role="presentation">arrow_back</i>
          </a>
        </div>
        <div class="demo-blog__posts mdl-grid">
          <div class="mdl-card mdl-shadow--4dp mdl-cell mdl-cell--12-col">
            <div class="mdl-card__media mdl-color-text--grey-50">
              <h3>Titre</h3>
            </div>
            <div class="mdl-color-text--grey-700 mdl-card__supporting-text meta">
              <div class="minilogo"></div>
              <div>
                <span>date</span>
              </div>
              <div class="section-spacer"></div>
              <div class="meta__favorites">
                425 <i class="material-icons" role="presentation">favorite</i>
                <span class="visuallyhidden">favorites</span>
              </div>
              <div>
                <i class="material-icons" role="presentation">bookmark</i>
                <span class="visuallyhidden">bookmark</span>
              </div>
              <div>
                <i class="material-icons" role="presentation">share</i>
                <span class="visuallyhidden">share</span>
              </div>
            </div>
            <div class="mdl-color-text--grey-700 mdl-card__supporting-text">
              <p>content</p>
            </div>
            <div class="mdl-color-text--primary-contrast mdl-card__supporting-text comments">
              <form>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                  <textarea rows=1 class="mdl-textfield__input" id="comment"></textarea>
                  <label for="comment" class="mdl-textfield__label">Join the discussion</label>
                </div>
                <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
                  <i class="material-icons" role="presentation">check</i><span class="visuallyhidden">add comment</span>
                </button>
              </form>
                  <div class="comment mdl-color-text--grey-700">
                      <header class="comment__header">
                          <img src="../../public/img/co1.jpg" class="comment__avatar">
                          <div class="comment__author">
                              <strong>author</strong>
                              <span>comment_date</span>
                          </div>
                      </header>
                      <div class="comment__text">comment</div>
                      <nav class="comment__actions">
                          <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
                              <i class="material-icons" role="presentation">thumb_up</i><span class="visuallyhidden">like comment</span>
                          </button>
                          <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
                              <i class="material-icons" role="presentation">thumb_down</i><span class="visuallyhidden">dislike comment</span>
                          </button>
                          <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
                              <i class="material-icons" role="presentation">share</i><span class="visuallyhidden">share comment</span>
                          </button>
                      </nav>
                  </div>
            </div>
          </div>

          <nav class="demo-nav mdl-color-text--grey-50 mdl-cell mdl-cell--12-col">
            <a href="home.phpdex.php" class="demo-nav__button">
              <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon mdl-color--white mdl-color-text--grey-900" role="presentation">
                <i class="material-icons">arrow_back</i>
              </button>
              Newer
            </a>
            <div class="section-spacer"></div>
            <a href="home.phpdex.php" class="demo-nav__button">
              Older
              <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon mdl-color--white mdl-color-text--grey-900" role="presentation">
                <i class="material-icons">arrow_forward</i>
              </button>
            </a>
          </nav>
        </div>
      </main>
    </div>
<?php
$content = ob_get_clean();
require 'template.php';
?>

