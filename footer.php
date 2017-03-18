    <!-- FOOTER -->
<div class="footer-wrapper style-10">
    <footer class="type-1">
        <div class="footer-columns-entry">
            <div class="row">
                <div class="col-md-5">
                    <!--<img class="footerlogo" src="assets/images/opslogo.png" alt="" />-->
                    <h3 class="column-title">We would love if you will contact us:</h3>
                    <div class="footer-address"><i class="fa fa-phone-square"></i> (+63)915-219-6248<br/>
                        <i class="fa fa-map-marker"></i> &nbsp;&nbsp;Bambang Street, Sta Cruz, Manila<br/>
                        <i class="fa fa-envelope-o"></i> Email: <a href="https://login.yahoo.com" target="_blank">mjjacobe_traiding2015@yahoo.com</a><br/>

                    </div>
                    <div class="clear"></div>
                </div>
                <div class="col-md-3 col-sm-4">
                    <h3 class="column-title">Our Services</h3>
                    <ul class="column">
                        <li><a href="legal-pages/about-us.html" target="_blank">About us</a></li>
                        <li><a href="legal-pages/terms-and-conditions.html" target="_blank" >Terms &amp; Conditions</a></li>

                    </ul>
                    <div class="clear"></div>
                </div>

                <div class="clearfix visible-sm-block"></div>
                <div class="col-md-4">
                    <h3 class="column-title">Company working hours</h3>
                    <div class="footer-description">Visit our shop and find premium quality of medical supplies you can afford!</div>
                    <div class="footer-description">
                        <b>Monday-Sunday:</b> 8:00 a.m. - 5:O0 p.m.<br/>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        </div>

        <div class="footer-bottom-navigation">
            <div class="cell-view">
                <div class="copyright"><?php echo date('Y'); ?> Copyright &copy; MJ Jacobe Trading. All right reserved</div>
            </div>

        </div>
    </div>
    </footer>
</div>
<div class="clear"></div>

  

<!-- popup content -->

<!-- search box popup content -->
<div class="search-box popup">
    <form>
        <div class="search-button">
            <i class="fa fa-search"></i>
            <input type="submit" />
        </div>
        <div class="search-field">
            <input type="text" value="" placeholder="Search for product" />
        </div>
    </form>
</div>
<!-- end search box -->


<!-- product popup -->
<div id="product-popup" class="overlay-popup">
    <div class="overflow">
        <div class="table-view">
            <div class="cell-view">
                <div class="close-layer"></div>
                <div class="popup-container">
                    <div class="aert alert-success alert-cart">
                        <p>Item added to cart</p>
                    </div>
                    <div class="row">
                        <div class="col-sm-8 information-entry">
                            <div class="product-preview-box">
                                <div class="swiper-container product-preview-swiper" data-autoplay="0" data-loop="1" data-speed="500" data-center="0" data-slides-per-view="1">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <div class="product-zoom-image">
                                                <img src="assets/images/products/wheelchair.jpg" alt="" data-zoom="assets/images/products/wheelchair.jpg" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pagination"></div>
                                    <div class="product-zoom-container">
                                        <div class="move-box">
                                            <img class="default-image" src="assets/images/products/wheelchair.jpg" alt="" />
                                            <img class="zoomed-image" src="assets/images/products/wheelchair.jpg" alt="" />
                                        </div>
                                        <div class="zoom-area"></div>
                                    </div>
                                </div>
                                <!-- <div class="swiper-hidden-edges">
                                    <div class="swiper-container product-thumbnails-swiper" data-autoplay="0" data-loop="0" data-speed="500" data-center="0" data-slides-per-view="responsive" data-xs-slides="3" data-int-slides="3" data-sm-slides="3" data-md-slides="4" data-lg-slides="4" data-add-slides="4">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide selected">
                                                <div class="paddings-container">
                                                    <img class="prod-pic" src="assets/images/products/wheelchair.jpg" alt="" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pagination"></div>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                        <div class="col-sm-4 information-entry">
                            <div class="product-detail-box">
                                <p class="product-id hidden"></p>
                                <h1 class="product-title"></h1>
                                <h3 class="product-subtitle"></h3>
<!--                                    <div class="rating-box">-->
<!--                                        <div class="star"><i class="fa fa-star"></i></div>-->
<!--                                        <div class="star"><i class="fa fa-star"></i></div>-->
<!--                                        <div class="star"><i class="fa fa-star"></i></div>-->
<!--                                        <div class="star"><i class="fa fa-star-o"></i></div>-->
<!--                                        <div class="star"><i class="fa fa-star-o"></i></div>-->
<!--                                    </div>-->
                                <div class="price detail-info-entry">
                                    <!-- <div class="prev">$90,00</div> -->
                                    <div class="current product-price"></div>
                                </div>

<!--                                    <div class="color-selector detail-info-entry">-->
<!--                                        <div class="detail-info-entry-title">Color</div>-->
<!--                                        <div class="entry active" style="background-color: #d23118;">&nbsp;</div>-->
<!--                                        <div class="entry" style="background-color: #2a84c9;">&nbsp;</div>-->
<!--                                        <div class="entry" style="background-color: #000;">&nbsp;</div>-->
<!--                                        <div class="entry" style="background-color: #d1d1d1;">&nbsp;</div>-->
<!--                                        <div class="spacer"></div>-->
<!--                                    </div>-->
                                <div class="stock-input detail-info-entry">
                                    <span class="stock-left"></span>
                                </div>
                                <div class="quantity-selector detail-info-entry">
<!--                                        <div class="detail-info-entry-title">Quantity</div>-->
<!--                                        <div class="entry number-minus">&nbsp;</div>-->
<!--                                        <div class="entry number product-quantity">1</div>-->
<!--                                        <div class="entry number-plus">&nbsp;</div>-->
                                    <label>Quantity:</label>
                                    <input type="number" min="0" class="form-control half-col product-quantity" value="1" placeholder="0">
                                </div>
                                <div class="detail-info-entry">
                                    <a class="button style-10 btn-cart">Add to cart</a>
<!--                                        <a class="button style-11"><i class="fa fa-heart"></i> Add to Wishlist</a>-->
                                    <div class="clear"></div>
                                </div>
<!--                                    <div class="tags-selector detail-info-entry">-->
<!--                                          <div class="detail-info-entry-title">Tags:</div>-->
<!--                                          <a href="#">bootstrap</a>/-->
<!--                                          <a href="#">collections</a>/-->
<!--                                          <a href="#">color/</a>-->
<!--                                          <a href="#">responsive</a>-->
<!--                                      </div>-->
                            </div>
                        </div>
                    </div>

                    <div class="close-popup"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end product popup -->

<!-- login && sign up popup -->
<div id="login-signup-modal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>

      </div>
      <div class="modal-body">
          <div class="tab-content">
              <div class="row">
                  <div class="col-md-6 col-xs-6 login-group active-group">
                      Login
                  </div>
                  <div class="col-md-6 col-xs-6 signup-group">
                      Sign Up
                  </div>
              </div>
            <div class="login-group-content">
                <div class="panel-body">
                    <form id="login-form" method="post" action="authentication/authentication.php">
                        <p class="errMess errCreds text-danger" style="display: none;"><b>Wrong username or Password</b></p>
                        <p class="errMess reqField text-danger" style="display: none;"><b>*Fill in your username and password</b></p>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" class="form-control" id="username" required>
                        </div>
                        <div class="form-group">
                            <label for="pwd">Password:</label>
                            <input type="password" name="password" class="form-control" id="pwd" required>
                        </div>
                        <div class="checkbox">
                            <label>Forgot Pasword?   <a href="forgot-password.php">Click here</a></label>
                        </div>
                        <button type="submit" class="btn btn-success pull-righ btn-login">Sign In</button>
                    </form>
                </div>
            </div>
            <!--sign up form-->
            <div class="signup-group-content">
                <div class="panel-body">
                    <form action="authentication/signup.php" method="post">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">

                                <div class="row">
                                    <div class="control-group">
                                    <div class="col-md-6 col-xs-12">
                                    <label for="fname">First Name:</label>
                                    <input type="text" class="form-control" name="fname" id="fname" required>
                                    </div>
                                    </div>

                                    <div class="control-group">
                                    <div class="col-md-6 col-xs-12">
                                    <label for="lname">Last Name:</label>
                                    <input type="text" class="form-control" name="lname" id="lname" required>
                                    </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="address">Home Address:</label>
                                    <textarea rows="2" class="form-control" name="address" id="address" required></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="ship-address">Shipping Address:</label>
                                    <textarea rows="2" class="form-control" name="ship-address" id="ship-address"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="contact">Contact Number:</label>
                                    <input type="text" class="form-control" name="contact" id="contact" maxlength="13" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control" name="email" id="email" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="signup-username">Username:</label>
                                    <input type="text" class="form-control" name="username" id="signup-username" placeholder="Set a username" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="psw">Password</label>
                                    <input type="password" class="form-control" name="password" id="psw" placeholder="Set a password" required>
                                </div>
                            </div>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-success pull-right" style="margin-bottom: -20px;">Submit</button>
                    </form>
                </div>
            </div>
          </div>
      </div>
    </div>

  </div>
</div>
<!-- end login && sign up modal -->

<!-- end popup content -->


    <script src="assets/js/jquery-2.1.3.min.js"></script>
    <script src="assets/js/idangerous.swiper.min.js"></script>
    <script src="assets/js/global.js"></script>

    <!-- custom scrollbar -->
    <script src="assets/js/jquery.mousewheel.js"></script>
    <script src="assets/js/jquery.jscrollpane.min.js"></script>

     <!-- range slider -->
    <script src="assets/js/jquery-ui.min.js"></script>

    <script src="plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="plugins/js/validator.js"></script>
    <script src="assets/js/jquery.easyPaginate.js"></script>

    <scrip src="plugins/jquery-bootpag-master/lib/jquery.bootpag.min.js"></scrip>

     <script>
        $(document).ready(function(){
            $('.signup-group-content').css('display', 'none');
            var serverURL = <?php echo json_encode($serverURL); ?>;
            var modal = ('#login-signup-modal');
            var myCart = JSON.parse(localStorage.getItem('myCart'));

            if(myCart == null){
                $('span.cart-badge').text('0');
            } else {
                $('span.cart-badge').text(myCart.length);
                $.each(myCart, function(index, obj){
                    var cart_btn_container = $('input[value="'+ obj.id +'"]').closest('div.product-slide-entry').find('div.cart-btn');
                    cart_btn_container.html('<p style="color: #fff">This item is on your cart</p>');
                });
            }



            $('.alert').delay(3000).fadeOut('fast');
            var minVal = parseInt($('.min-price span').text());
            var maxVal = parseInt($('.max-price span').text());

            $( "#prices-range" ).slider({
                range: true,
                min: minVal,
                max: maxVal,
                step: 5,
                values: [ minVal, maxVal ],
                slide: function( event, ui ) {
                    $('.min-price span').text(ui.values[ 0 ]);
                    $('.max-price span').text(ui.values[ 1 ]);
                }
            });

            $('.signup-group').click(function(){
                $('.signup-group-content').css('display', 'block');
                $('.login-group-content').css('display', 'none');
                $(this).addClass('active-group');
                $('.login-group').removeClass('active-group');
            });

            $('.login-group').click(function(){
                $('.signup-group-content').css('display', 'none');
                $('.login-group-content').css('display', 'block');
                $(this).addClass('active-group');
                $('.signup-group').removeClass('active-group');
            });


            $('.btn-login').click(function(e){
                e.preventDefault();
                console.log('ok')
                $('p.errMess').css('display', 'none');
                var username = $(this).closest('form').find('input[name="username"]').val();
                var password = $(this).closest('form').find('input[name="password"]').val();

                var data = {
                    username: username,
                    password: password
                };

                console.log(data)

                $.ajax({
                    type: 'POST',
                    url: serverURL + '/ops/authentication/authentication.php',
                    data: data,
                    dataType: 'json',
                    success: function(rData){
                        console.log(rData)
                        if(rData.errCreds){
                            $(modal).find('form#login-form').find('p.errCreds').css('display', 'block');
                        }
                        if(rData.reqField){
                            $(modal).find('form#login-form').find('p.reqField').css('display', 'block');
                        }
                        if(rData.redir){
                            window.location = rData.redir;
                        }
                    },
                });



            });

            $(document).on('click', '.open-product', function(){

                var prod_popup = $('#product-popup');
                var prod_id = $(this).closest('div.product-container').find('input[name="prod-id"]').val();
                var prod_name = $(this).closest('div.product-container').find('a.prod-name').text();
                var prod_img = $(this).closest('div.product-container').find('img.prod-img').attr('src');
                var price = $(this).closest('div.product-container').find('.price .prod-price').text();
                var cat = $(this).closest('div.product-container').find('a.prod-category').text();
                var stock = $(this).closest('div.product-container').find('input[name="stock-left"]').val();
                if(stock == undefined){
                    stock = '<br><small>This product is not available at the moment but you can still add it to your cart for reservation.</small>';
                }

                var data = {
                    id: prod_id,
                    name: prod_name,
                    img: prod_img,
                    price: price,
                    cat: cat,
                    stock: stock,
                };

                console.log(data)
                $(prod_popup).find('.product-id').text(prod_id);
                $(prod_popup).find('.product-title').text(prod_name);
                $(prod_popup).find('.product-subtitle').text(cat);
                $(prod_popup).find('.product-price').text(price);
                $(prod_popup).find('img').attr('src', prod_img);
                $(prod_popup).find('img').attr('data-zoom', prod_img);
                $(prod_popup).find('.stock-left').html('Stock Left: ' + stock);

                $(prod_popup).addClass('visible active');

            });

            $(document).on('click', '.btn-cart', function () {
                console.log('added to cart')
                var prod_popup = $('#product-popup');
                var cart_badge = $('span.cart-badge');
                var item_count = parseInt($(cart_badge).text());
                var prod_id = $(prod_popup).find('.product-id').text();
                var prod_name = $(prod_popup).find('.product-title').text();
                var cat = $(prod_popup).find('.product-subtitle').text();
                var price = $(prod_popup).find('.product-price').text();
                var qty = $(prod_popup).find('.product-quantity').val();
                var prod_img = $(prod_popup).find('img').attr('src');

                var data = {
                    id: prod_id,
                    name: prod_name,
                    img: prod_img,
                    price: price,
                    cat: cat,
                    qty: qty,
                };

                var cart = JSON.parse(localStorage.getItem('myCart')) || [];
                cart.push(data);
                localStorage.setItem('myCart', JSON.stringify(cart));
                console.debug('webStarage', cart)
                $(cart_badge).text(parseInt(parseInt(item_count) + 1));
                var cart_btn_container = $('input[value="'+ data.id +'"]').closest('div.product-slide-entry').find('div.cart-btn');
                cart_btn_container.html('<p style="color: #fff">This item is on your cart</p>');

                var alert = $('#product-popup').find('.alert-cart');
                $(alert).css('display','block');
                $(alert).delay(2000).fadeOut('fast');
                setTimeout(function(){
                   $('.overlay-popup.visible').removeClass('active');
                    setTimeout(function(){$('.overlay-popup.visible').removeClass('visible');}, 500);
                },2050);


            });

            // $('.shop-grid').easyPaginate({
            //     paginateElement: '.shop-grid-item',
            //     elementsPerPage: 8,
            //     effect: 'slide'
            // });


            $('.category-list a').click(function(e){
                e.preventDefault();

                var category = $(this).attr('data-id');
                console.log(category)
                var list = $('#shop-list');
                list.html('');

                // $('.easyPaginateNav').hide();
                $('.load-more').hide();
                $('.pre-loader').show();
                setTimeout(function(){
                    $.ajax({
                        type: 'POST',
                        url: serverURL + '/ops/data-manager/get-products-by-category.php?category='+category,
                        complete: function(){
                            $('.pre-loader').hide();
                        },
                        success: function(rData){
                            if((rData.products).length > 0){
                                $(rData.products).each(function(ind, obj){
                                    console.log(obj.category)
                                     $(list).append('<div class="col-md-3 col-sm-4 shop-grid-item product-container">' +
                                        '<div class="product-slide-entry">' +
                                            '<div class="product-image">' +
                                                '<img class="prod-img" src="assets/images/products/'+ obj.picture +'"  alt="" />' +
                                                '<div class="bottom-line cart-btn">' +
                                                    '<a href="#" class="bottom-line-a open-product"><i class="fa fa-shopping-cart"></i> Add to cart</a>' +
                                                '</div>'+
                                            '</div>' +
                                            '<a class="tag prod-category" href="#">'+ getCategory(parseInt(obj.category)) +'</a>' +
                                            ',<a class="title prod-name" href="#">' + obj.name +'</a>' +
                                            '<input name="prod-id" class="hidden" value="'+ obj.id +'">' +
                                            '<div class="article-container style-1 prod-desc">' +
                                                '<p>'+ obj.description+'</p>' +
                                            '</div>' +
                                            '<div class="price">' +
                                                '<div class="current prod-price">'+ obj.price +'</div>' +
                                            '</div>' +
                                            '</div>' +
                                            '<div class="clear"></div>' + 
                                        '</div></div>');
                                });

                                // $('.shop-grid').easyPaginate({
                                //     paginateElement: '.shop-grid-item',
                                //     elementsPerPage: 8,
                                //     effect: 'slide'
                                // });

                                // $('.easyPaginateNav').show();

                                $('load-more').show()
                            } else {
                                list.append('<h1 style="text-align: center">No results found.</h1>');
                            }
                        },

                    });
                },1500);

            });


            //load more
            $(".product-container").slice(0, 8).show();
            $(".load-more").on('click', function (e) {
                e.preventDefault();
                $(".product-container:hidden").slice(0, 5).slideDown("slow");
                if ($(".product-container:hidden").length == 0) {
                    $("#load").fadeOut('slow');
                    $('.load-more').hide();
                }
            });

            function getCategory(id)
            {
                var name = '';
                switch (id){
                    case 1:
                        name = 'Electronic';
                        break;
                    case 2:
                        name = 'Self-Care';
                        break;
                    case 3:
                        name = 'Diagnostic';
                        break;
                    case 4:
                        name = 'Surgical';
                        break;
                    case 5:
                        name = 'Durable Medical Equipment';
                        break;
                    case 6:
                        name = 'Acute Care';
                        break;
                    case 7:
                        name = 'Emergency and Trauma';
                        break;
                    case 8:
                        name = 'Long-Term Care';
                        break;
                    case  9:
                        name = 'Storage and Transport';
                        break;
                }

                return name;

            }
        });
    </script>
</body>

</html>