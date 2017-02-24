    <footer id="footer" class="clearfix second-bg">
        <div class="footer-wrap container_9 ">
            <div class="footer-set">
                <div class="block">
                    <h4>Customer Service</h4>
                    <div class="block_content">
                        <ul>
                            <li class="first_item"><a title="Specials" href="index.php?controller=prices-drop">Specials</a></li>
                            <li class="item"><a title="New products" href="index.php?controller=new-products">New products</a></li>
                            <li class="item"><a title="Best sellers" href="index.php?controller=best-sales">Best sellers</a></li>
                            <li class="item"><a title="Our stores" href="index.php?controller=stores">Our stores</a></li>
                            <li class="item"><a title="Contact us" href="index.php?controller=contact">Contact us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="block">
                    <h4>Information</h4>
                    <div class="block_content">
                        <ul>
                            <li class="item"><a title="Delivery" href="index.php?id_cms=1&amp;controller=cms&amp;id_lang=1">Delivery</a></li>
                            <li class="item"><a title="Legal Notice" href="index.php?id_cms=2&amp;controller=cms&amp;id_lang=1">Legal Notice</a></li>
                            <li class="item"><a title="About us" href="index.php?id_cms=4&amp;controller=cms&amp;id_lang=1">About us</a></li>
                            <li><a title="Sitemap" href="index.php?controller=sitemap">Sitemap</a></li>
                        </ul>
                    </div>
                </div>
                <div class="block">
                    <h4>My account</h4>
                    <div class="block_content">
                        <ul>
                            <li><a href="index.php?controller=history">My orders</a></li>
                            <li><a href="index.php?controller=order-slip">My credit slips</a></li>
                            <li><a href="index.php?controller=addresses">My addresses</a></li>
                            <li><a href="index.php?controller=identity">My personal info</a></li>
                        </ul>
                    </div>
                </div>
                <div class="block last">
                    <h4>Contact us</h4>
                    <div class="block_content">
                        <p><a href="mailto:prestazilla@gmail.com"><?php echo $glbSetting['email']; ?></a> <br />
                            <?php echo $glbSetting['hotline']; ?><br />
                            <?php echo $glbSetting['company_name']; ?>
                        </p>
                    </div>
                </div>
            </div>
            <footer id="footer-absolute" class="clearfix">
                <a  id="scroll-top-img"  href="#" class="go-top first-bg" > <img src="/assets/images/scrolltop.png"  /></a>
                <div class="copy">
                    <p>© <?php echo date('Y'); ?> onlinestore , All Rights Reserved</p>
                </div>
                <div class="social">
                    <p><a href="#"> <em class="icon-facebook"><span>icon</span></em></a> <a href="#"><em class="icon-twitter"><span>icon</span></em></a> <a href="#"><em class="icon-rss"><span>icon</span></em></a> <a href="#"><em class="icon-pinterest"><span>icon</span></em></a> <a href="#"><em class="icon-google-plus"><span>icon</span></em></a></p>
                </div>
            </footer>
        </div>
    </footer>
    <script src="/assets/js/modernizr.custom.js"></script>
    <script src="/assets/js/jquery.prettyPhoto.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function() {

        $(".fa-search-btn").prettyPhoto();


        });

    </script>


    <script type="text/javascript" src="/assets/js/raphael-min.js"></script>
    <script type="text/javascript" src="/assets/js/jquery.easing.js"></script>
    <script src="/assets/js/iview.js"></script>
    <script>
        $(document).ready(function(){
            $('#iview').iView({
                      pauseTime: 7000,
                pauseOnHover: true,
                directionNav: true,
                directionNavHide: false,
                controlNav: true,
                controlNavNextPrev: false,
                controlNavTooltip: false,
                nextLabel: "Próximo",
                previousLabel: "Anterior",
                playLabel: "Jugada",
                pauseLabel: "Pausa",
                timer: "360Bar",
                timerBg: "#EEE",
                timerColor: "#000",
                timerDiameter: 40,
                timerPadding: 4,
                timerStroke: 8,
                timerPosition: "bottom-right"
            });
        });
    </script>

    <!-- bxSlider Javascript file -->
    <script src="/assets/js/jquery.bxslider.min.js"></script>
    <!-- bxSlider CSS file -->

    <script>
        $(document).ready(function(){
          $('.bxslider2').bxSlider({
            slideWidth: 193,
            minSlides: 7,
            maxSlides: 7
          });
        });
    </script>


    <!-- bxSlider Javascript file -->
    <script src="/assets/js/jquery.bxslider.min.js"></script>

    <script>
        $(document).ready(function(){
          $('.bxslider').bxSlider({
            slideWidth: 270,
            minSlides: 4,
            maxSlides: 4,
            slideMargin: 28
          });
        });
    </script>

    @yield('scripts')
    </body>
</html>