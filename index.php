<?php
include("header.php");

?>
            <div class="content-push">
            <?php if (isset($_GET['message'])): ?>
                <div class="alert alert-danger alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                    <strong>Oops!</strong> Seems like you have entered a wrong username or password.
                </div>
            <?php endif; ?>
            <?php if (isset($_GET['status'])): ?>
                <div class="alert alert-success alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                    <strong>Success!</strong> Registration Successful! You can now login to your account.
                </div>
            <?php endif; ?>
                <div class="information-blocks">
                    <div class="row">
                        <div class="col-md-9 col-md-push-3 col-sm-8 col-sm-push-4">
                            <div class="page-selector">
                                <!-- <div class="pages-box hidden-xs">
                                    <a href="#" class="square-button active">1</a>
                                    <a href="#" class="square-button">2</a>
                                    <a href="#" class="square-button">3</a>
                                    <div class="divider">...</div>
                                    <a href="#" class="square-button"><i class="fa fa-angle-right"></i></a>
                                </div> -->

                                <div class="shop-grid-controls">
                                    <div class="entry">
                                        <div class="inline-text">Sort by</div>
                                        <div class="simple-drop-down">
                                            <select>
                                                <option>Price</option>
                                                <option>Category</option>
                                            </select>
                                        </div>
                                        <div class="sort-button"></div>
                                    </div>
                                    <div class="entry">
                                        <div class="view-button active grid"><i class="fa fa-th"></i></div>
                                        <div class="view-button list"><i class="fa fa-list"></i></div>
                                    </div>
                                    <div class="entry">
                                        <div class="inline-text">Show</div>
                                        <div class="simple-drop-down" style="width: 75px;">
                                            <select>
                                                <option>12</option>
                                                <option>24</option>
                                                <option>32</option>
                                                <option>40</option>
                                                <option>all</option>
                                            </select>
                                        </div>
                                        <div class="inline-text">per page</div>
                                    </div>
                                </div>
                                <div class="clear"></div>

                            </div>
                            <div class="pre-loader" style="display: none">
                                <img src="assets/images/LoadingGreen.gif">
                            </div>
                            <div id="shop-list" class="row shop-grid grid-view">
                                <?php if(isset($availableProducts) AND count($availableProducts) > 0): ?>
                                    <?php foreach ($availableProducts as $key => $value): ?>
                                        <div class="col-md-3 col-sm-4 shop-grid-item product-container" style="display: none">
                                            <div class="product-slide-entry">
                                                <div class="product-image">
                                                    <img class="prod-img" src="assets/images/products/<?php echo $value['picture']?>" alt="" />
                                                    <!--<a class="top-line-a right open-product"><i class="fa fa-expand"></i> <span>Quick View</span></a>-->
                                                    <div class="bottom-line cart-btn">
                                                    <a href="#" class="bottom-line-a open-product"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                                </div>
                                            </div>
                                            <a class="tag prod-category" href="#"><?php echo category($value['category']); ?></a>
                                            <a class="title prod-name" href="#"><?php echo $value['name']; ?></a>
                                            <input name="prod-id" class="hidden" value="<?php echo $value['id']; ?>">
                                                <?php if(isset($inventory) AND count($inventory) > 0): ?>
                                                    <?php foreach ($inventory as $ikey => $iValue): ?>
                                                        <?php if($value['id'] == $iValue['prod_id']): ?>
                                                            <input name="stock-left" class="hidden" value="<?php echo $iValue['quantity']; ?>">
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>

<!--                                            <div class="rating-box">-->
<!--                                                <div class="star"><i class="fa fa-star"></i></div>-->
<!--                                                <div class="star"><i class="fa fa-star"></i></div>-->
<!--                                                <div class="star"><i class="fa fa-star"></i></div>-->
<!--                                                <div class="star"><i class="fa fa-star"></i></div>-->
<!--                                                <div class="star"><i class="fa fa-star"></i></div>-->
<!--                                            </div>-->
                                            <div class="article-container style-1 prod-desc">
                                                <p><?php echo $value['description']; ?></p>
                                            </div>
                                            <div class="price">
                                                <!-- <div class="prev">$199,99</div> -->
                                                <div class="current prod-price"><?php echo $value['price']; ?></div>
                                            </div>
<!--                                            <div class="list-buttons">-->
<!--                                                <a class="button style-10">Add to cart</a>-->
<!--                                                <a class="button style-11"><i class="fa fa-heart"></i> Add to Wishlist</a>-->
<!--                                            </div>-->
                                        </div>
                                        <div class="clear"></div>
                                </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                            <div class="load-more">
                                <button type="button" class="btn btn-success btn-lg load-more">Load More</button>
                            </div>
                        </div>
                        <div class="col-md-3 col-md-pull-9 col-sm-4 col-sm-pull-8 blog-sidebar">
                            <div class="information-blocks categories-border-wrapper">
                                <div class="block-title size-3">Categories</div>
                                <div class="accordeon">
                                    <div class="accordeon-title">Medical Supplies</div>
                                    <div class="accordeon-entry" style="display: block;">
                                        <div class="article-container style-1">
                                            <ul class="category-list">
                                                <li><a data-id="1" href="#">Electronic</a></li>
                                                <li><a data-id="2" href="#">Self-Care</a></li>
                                                <li><a data-id="3" href="#">Diagnostic</a></li>
                                                <li><a data-id="4" href="#">Surgical</a></li>
                                                <li><a data-id="5" href="#">Durable Medical Equipment</a></li>
                                                <li><a data-id="6" href="#">Acute Care</a></li>
                                                <li><a data-id="7" href="#">Emergency and Trauma</a></li>
                                                <li><a data-id="8" href="#">Long-Term Care</a></li>
                                                <li><a data-id="9" href="#">Storage and Transport</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--<div class="information-blocks">
                                <div class="block-title size-2">Sort by sizes</div>
                                <div class="range-wrapper">
                                    <div id="prices-range"></div>
                                    <div class="range-price">
                                        Price: 
                                        <div class="min-price"><b>&pound;<span>0</span></b></div>
                                        <b>-</b>
                                        <div class="max-price"><b>&pound;<span>200</span></b></div>
                                    </div>
                                    <a class="button style-14">filter</a>
                                </div>
                            </div>-->

                          

                         

                             
                        </div>
                    </div>
                </div>
                
                            

              <?php
                include("footer.php");
            ?>