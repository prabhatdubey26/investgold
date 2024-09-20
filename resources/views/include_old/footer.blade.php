<div class="phoenix-wrapper">
<footer>
<div class="subscribe">
<div class="wrap--inner container">
<p class="subscribe-text" style="padding-top: 20px">Join our newsletter</p>
<form id="newsletter_box" class="subscribe-input-wrapper jsSubmitNewsLetterForm">
<input type="email" required="required" name="subscribe" class="newsletter_email" placeholder="Enter your email address" />
<input type="hidden" name="hs_all_assigned_business_unit_ids" value="601555">
<input name="addnewsletter" value="1" type="hidden">
<button class="subscribe-button">Subscribe</button>
<span class="jsBannerNewsletterNotification"></span>
</form>
</div>
</div>
<div class="footer-menu">
<div class="wrap--inner container">
<div class="row">
<div class="footer-menu-list col-xs-6 col-sm-6 col-md-3 col-lg-3">
<div class="footer-menu-list-title">Services</div>
<ul class="footer-menu-services">
@foreach($navigations->where('type', 2) as $navigation)
        <li>
            <a href="{{ $navigation->link }}">{{ $navigation->title }}</a>
        </li>
@endforeach
</ul>
<div class="gold-silver-logo"></div>
</div>
<!-- -->
<div class="footer-menu-list col-xs-6 col-sm-6 col-md-3 col-lg-3">
<div class="footer-menu-list-title">Support</div>
<ul class="footer-menu-support">
@foreach($navigations->where('type', 3) as $navigation)
        <li>
            <a href="{{ $navigation->link }}">{{ $navigation->title }}</a>
        </li>
@endforeach
</ul>
</div>
<div class="footer-menu-list col-xs-6 col-sm-6 col-md-3 col-lg-3">
<div class="footer-menu-list-title">Policies</div>
<ul class="footer-menu-policies">
@foreach($navigations->where('type', 4) as $navigation)
        <li>
            <a href="{{ $navigation->link }}">{{ $navigation->title }}</a>
        </li>
@endforeach
</ul>
</div>
<div class="footer-menu-list col-xs-6 col-sm-6 col-md-3 col-lg-3">
<div class="footer-menu-list-title">About InvestGold</div>
<ul class="footer-menu-about">
@foreach($navigations->where('type', 5) as $navigation)
        <li>
            <a href="{{ $navigation->link }}">{{ $navigation->title }}</a>
        </li>
@endforeach
</ul>
<div class="footer-menu-list-title">Follow Us</div>
<ul class="footer-menu-social">

@foreach($navigations->where('type', 6) as $navigation)
        <li>
            <a href="{{ $navigation->link }}" class="{{ $navigation->title }}"></a>
        </li>
@endforeach
</ul>
</div>
</div>
</div>
</div>
<div class="footer-logos">
<div class="wrap--inner">
<div class="row">
<div class="col-md-12">
<div class="gold-silver-logo col-xs-12 col-sm-12 col-md-3"></div>

</div>
</div>
</div>
</div>
<div class="copyright">
<div class="wrap--inner">
<div class="copyright-text">&reg; INVESTGOLD , POPI ACT 2024 All Rights Reserved</div>
</div>
</div>
</footer>
</div>

<script src="{{ asset('assets/storage/js/custom/custom.js') }}"></script>
<script src="{{ asset('assets/storage/js/custom/popup_custom.js') }}"></script>
</body>

</html>