<footer class="footer">
  <div class="footer__top">
    <div class="wrapper">
      <div class="footer__logo">
        @include('modules.logo')
      </div>
      <div class="footer__about">
        <p class="copy">Founded in 1923 as a United Methodist institution, McMurry
          University is a vibrant and comprehensive center of undergraduate education.</p>
      </div>
      <div class="footer__contact">
        <div class="address copy">
          <span>1400 Sayles Blvd.</span>
          <span>Abilene, Texas 79697</span>
        </div>
        <div class="contact-info copy">
          <span class="number"><a href="#">325-793-3800</a></span>
          <div class="email">
            <span><a href="mailto:marketing@mcm.edu">marketing@mcm.edu</a></span>
            <span><a href="mailto:admissions@mcm.edu">admissions@mcm.edu</a></span>
          </div>

        </div>
      </div>
      <div class="footer__info">
        <div class="footer__info__admissions">
          <p class="label-heading maroon">For Admissions</p>
          <a href="#" class="btn gold"><span>Check application status</span></a>
        </div>
        <div class="footer__info__current">
          <p class="label-heading maroon">For Current Students</p>
          <a href="#" class="btn ghost on-white"><span>Moodle login</span></a>
          <a href="#" class="btn ghost on-white regcase"><span>MyMcM</span></a>
        </div>
        <div class="footer__info__mcm-net">
          <p class="label-heading maroon"><span>McMurry NET</span></p>
          <a href="#" class="btn ghost on-white"><span>On-Campus</span></a>
          <a href="#" class="btn ghost on-white"><span>Off-Campus</span></a>
        </div>
      </div>
    </div>
  </div>

  <div class="footer__bottom">
    <div class="wrapper">
      <div class="footer__links">
        <div class="footer__links__resources">
          <p class="label-heading maroon">Resources</p>
          <ul>
            <li class="footer-link"><a href="#">Faculty & Staff Directory</a></li>
            <li class="footer-link"><a href="#">Information Services</a></li>
            <li class="footer-link"><a href="#">Human Resources</a></li>
            <li class="footer-link"><a href="#">Work at McMurry</a></li>
            <li class="footer-link"><a href="#">Dining On Campus</a></li>
            <li class="footer-link"><a href="#">Interactive Map</a></li>
            <li class="footer-link"><a href="#">Library</a></li>
            <li class="footer-link"><a href="#">Media Relations</a></li>
            <li class="footer-link"><a href="#">Glossary of Terms</a></li>
            <li class="footer-link"><a href="#">Career Development</a></li>
          </ul>
        </div>

        <div class="footer__links__support">
          <p class="label-heading maroon">Student Support</p>
          <ul>
            <li class="footer-link"><a href="#">Campus Conduct</a></li>
            <li class="footer-link"><a href="#">Emergency Information</a></li>
            <li class="footer-link"><a href="#">Report Sexual Assault</a></li>
            <li class="footer-link"><a href="#">Health & Wellness</a></li>
            <li class="footer-link"><a href="#">Student Handbook (pdf)</a></li>
            <li class="footer-link"><a href="#">Bookstore</a></li>
            <li class="footer-link"><a href="#">Online Payment</a></li>
            <li class="footer-link"><a href="#">International Payment</a></li>
          </ul>
        </div>
        <div class="footer__last-row">
          <div class="footer__links__social">
            <p class="label-heading maroon">Connect with us!</p>
            <ul>
              <li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
              <li><a href="#"><i class="fab fa-twitter"></i></a></li>
              <li><a href="#"><i class="fab fa-youtube"></i></a></li>
              <li><a href="#"><i class="fab fa-instagram"></i></a></li>
            </ul>
          </div>
          <div class="footer__links__misc">
            <ul>
              <li class="footer-link"><a href="#">Privacy Policy</a></li>
              <li class="footer-link"><a href="#">Site Map</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

  <button class="back-to-top hidden">
        <span class="arrow">
          @include('modules.arrow-icon')
        </span>
  </button>

</footer>