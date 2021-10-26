<footer class="footer">
  <div class="footer__top">
    @php
        $footer_left=App::footerLeft();
    @endphp

    @include('partials.footer.footer-left',$footer_left)
  </div>

  <div class="footer__bottom">
    @php
    $footer_right=App::footerRight();
@endphp
    @include('partials.footer.footer-right',$footer_right)
 
  </div>

  <button class="back-to-top hidden">
        <span class="arrow">
          @include('modules.arrow-icon')
        </span>
  </button>

</footer>
