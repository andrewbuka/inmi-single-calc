  <?php 
    // template Name: Basket;
?>

<?php get_header(); ?>


	
	<!-- ================ HEADER-TITLE ================ -->
	<section class="s-header-title">
		<div class="container">
			<h1>Оформление заказа</h1>
			<ul class="breadcrambs">
				<li><a href="index.html">Главная</a></li>
				<li>Корзина</li>
			</ul>
		</div>
	</section>
	<!-- ============== HEADER-TITLE END ============== -->

	

	

	<!--================== S-TOP-SALE ==================-->
	<section class="s-top-sale my-s-top-sale">
        

        <div id="content" class="checkout-page-content"> 
            <div class="checkout-hero">
                <div class="checkout-hero__content">
                    <span class="checkout-hero__eyebrow">Безопасное оформление</span>
                    <h2>Проверьте заказ и оставьте контакты</h2>
                    <p>Мы уточним детали, подтвердим наличие товаров и подберём удобный способ получения.</p>
                </div>
                <ul class="checkout-hero__steps" aria-label="Этапы оформления заказа">
                    <li><span>1</span>Корзина</li>
                    <li><span>2</span>Доставка</li>
                    <li><span>3</span>Подтверждение</li>
                </ul>
            </div>

            <div class="checkout-benefits" aria-label="Преимущества заказа">
                <div class="checkout-benefit">
                    <span class="checkout-benefit__icon">✓</span>
                    <div>
                        <strong>Быстрая связь</strong>
                        <p>Менеджер подтвердит заказ после отправки формы.</p>
                    </div>
                </div>
                <div class="checkout-benefit">
                    <span class="checkout-benefit__icon">₽</span>
                    <div>
                        <strong>Прозрачная сумма</strong>
                        <p>Итоговая стоимость всегда видна перед оформлением.</p>
                    </div>
                </div>
                <div class="checkout-benefit">
                    <span class="checkout-benefit__icon">i</span>
                    <div>
                        <strong>Помощь с доставкой</strong>
                        <p>Подскажем оптимальный вариант получения товара.</p>
                    </div>
                </div>
            </div>

            <div class="empty-basket">
                КОРЗИНА ПУСТА
            </div>   
   
            <div class="simple-content tttt none">        
                    <div id="simplecheckout_form_0">
                    <div class="simplecheckout checkout-redesign">
                                        
                            
                            
                            
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                
                            <div class="simplecheckout-step" style="display: block;"><div class="simplecheckout-block" id="simplecheckout_cart">
                                <div class="table-responsive">
                                    <table class="simplecheckout-cart">
                                        <colgroup>
                                            <col class="image">
                                            <col class="name">
                                            <col class="model">
                                            <col class="quantity">
                                            <col class="price">
                                            <col class="total">
                                            <col class="remove">
                                        </colgroup>
                                        <thead>
                                            <tr>
                                                <th class="image">Фото</th>
                                                <th class="name">Наименование товара</th>
                                      
                                                <th class="quantity"><span title="Количество">Кол-во</span></th>
                                                <th class="price">Цена</th>
                                                <th class="total">Итого</th>
                                                <th class="remove"></th>
                                            </tr>
                                        </thead>
                                        <tbody class="t-body-basket">
                                            
                                                
                                                
                                                
                                        </tbody>
                                    </table>



                                </div>

                                <div class="simplecheckout-cart-total" id="total_sub_total">
                                    <span><b>Стоимость товаров:</b></span>
                                    <span class="simplecheckout-cart-total-value"><span class='subtotal-sum'>0.00</span> руб.</span>
                                    <span class="simplecheckout-cart-total-remove">
                                                                        </span>
                                </div>
                                <div class="simplecheckout-cart-total" id="total_total">
                                    <span><b>Всего:</b></span>
                                    <span class="simplecheckout-cart-total-value"><span class='total-sum'> 0.00</span> руб.</span>
                                    <span class="simplecheckout-cart-total-remove">
                                                                        </span>
                                </div>
                              
                               

                            <div class="simplecheckout-block" id="simplecheckout_customer">
                                <div class="checkout-heading panel-heading"><span>Покупатель</span></div>
                                <div class="simplecheckout-block-content">
                                    <fieldset class="form-horizontal">
                                    

                                    <div class="form-group required row-customer_firstname">
                                <label class="control-label col-sm-4" for="customer_firstname">ФИО</label>
                                <div class="col-sm-8">
                                        <input class="form-control" type="text" name="customer[firstname]" id="customer_firstname" value="" placeholder="">
                                                <div class="simplecheckout-rule-group" data-for="customer_firstname">
                                                <div style="display:none;" data-for="customer_firstname" data-for-type="text" data-rule="byLength" class="simplecheckout-error-text simplecheckout-rule" data-length-min="1" data-length-max="32" data-required="true">Имя должно быть от 1 до 32 символов!</div>
                                            </div>
                                            </div>
                            </div>

                                    <div class="form-group required row-customer_email">
                                <label class="control-label col-sm-4" for="customer_email">Email</label>
                                <div class="col-sm-8">
                                        <input class="form-control" type="email" name="customer[email]" id="customer_email" value="" placeholder="">
                                                <div class="simplecheckout-rule-group" data-for="customer_email">
                                                <div style="display:none;" data-for="customer_email" data-for-type="email" data-rule="api" class="simplecheckout-error-text simplecheckout-rule" data-method="checkEmailForUniqueness" data-filter="customer_register" data-filter-type="radio" data-filter-value="0" data-required="true">Адрес уже зарегистрирован!</div>
                                                <div style="display:none;" data-for="customer_email" data-for-type="email" data-rule="regexp" class="simplecheckout-error-text simplecheckout-rule" data-regexp="[^@ \t\r\n]+@[^@ \t\r\n]+.[^@ \t\r\n]+" data-required="true">Некорректный адрес электронной почты!</div>
                                            </div>
                                            </div>
                            </div>

                                    <div class="form-group required row-customer_telephone">
                                <label class="control-label col-sm-4" for="customer_telephone">Телефон</label>
                                <div class="col-sm-8">
                                        <input class="form-control" type="tel" name="customer[telephone]" id="customer_telephone" value="" placeholder="" data-onchange="reloadAll">
                                                <div class="simplecheckout-rule-group" data-for="customer_telephone">
                                                <div style="display:none;" data-for="customer_telephone" data-for-type="tel" data-rule="byLength" class="simplecheckout-error-text simplecheckout-rule" data-length-min="3" data-length-max="32" data-required="true">Телефон должен быть от 3 до 32 символов!</div>
                                            </div>
                                            </div>
                            </div>

                                    </fieldset>
                                </div>
                            </div><div class="simplecheckout-block" id="simplecheckout_shipping">
                                        <div class="checkout-heading panel-heading">Способ доставки</div>
                                    <div class="alert alert-danger simplecheckout-warning-block" style="display:none">Вы должны выбрать способ доставки!</div>
                                <div class="simplecheckout-block-content">
                                                 <p><b>Доставка</b></p>
                                                        <div class="radio">
                                                            <label for="revship2.revship2">
                                                                <input type="radio" data-onchange="reloadAll" name="shipping_method" value="revship2.revship2" id="revship2.revship2">
                                                                Доставка Европочта - по тарифу Европочты
                                                            </label>
                                                        </div>                                                        
                                                        <p><b>Самовывоз</b></p>
                                                        <div class="radio">
                                                            <label for="pickup.pickup">
                                                                <input checked="checked" type="radio" data-onchange="reloadAll" name="shipping_method" value="pickup.pickup" id="pickup.pickup">
                                                                Самовывоз из магазина
                                                            </label>
                                                        </div>
                                                                                                                                                
                                                    <input type="hidden" name="shipping_method_current" value="revship.revship">
                                        <input type="hidden" name="shipping_method_checked" value="">
                                                        </div>
                            </div><div class="simplecheckout-left-column"><div class="simplecheckout-block" id="simplecheckout_shipping_address">
                                <div class="checkout-heading panel-heading">Адрес доставки</div>
                                <div class="simplecheckout-block-content">
                                    <fieldset class="form-horizontal">
                                    <div class="form-group required row-shipping_address_address_1">
                                <label class="control-label col-sm-4" for="shipping_address_address_1">Адрес</label>
                                <div class="col-sm-8">
                                        <input class="form-control" type="text" name="shipping_address[address_1]" id="shipping_address_address_1" value="" placeholder="">
                                                <div class="simplecheckout-rule-group" data-for="shipping_address_address_1">
                                                <div style="display:none;" data-for="shipping_address_address_1" data-for-type="text" data-rule="byLength" class="simplecheckout-error-text simplecheckout-rule" data-length-min="3" data-length-max="128" data-required="true">Адрес должен быть от 3 до 128 символов!</div>
                                            </div>
                                            </div>
                            </div>

                                    </fieldset>
                                        <input type="hidden" name="shipping_address[country_id]" id="shipping_address_country_id" value="">
                                    <input type="hidden" name="shipping_address[zone_id]" id="shipping_address_zone_id" value="">
                                    <input type="hidden" name="shipping_address[city]" id="shipping_address_city" value="">
                                    <input type="hidden" name="shipping_address[postcode]" id="shipping_address_postcode" value="">
                                    <input type="hidden" name="shipping_address[current_address_id]" id="shipping_address_current_address_id" value="0">
                                </div>
                            </div></div><div class="simplecheckout-right-column"><div class="simplecheckout-block" id="simplecheckout_payment">
                                        <div class="checkout-heading panel-heading">Способ оплаты</div>
                                    <div class="alert alert-danger simplecheckout-warning-block" style="display:none">Вы должны выбрать способ оплаты!</div>
                                <div class="simplecheckout-block-content">
                                                                                    <div class="radio">
                                                    <label for="revpay1">
                                                        <input type="radio" data-onchange="reloadAll" name="payment_method" value="revpay1" id="revpay1" checked="checked">
                                                        Оплата наличными
                                                                                </label>
                                                </div>
                                                                                                        <div class="radio">
                                                    <label for="revpay2">
                                                        <input type="radio" data-onchange="reloadAll" name="payment_method" value="revpay2" id="revpay2">
                                                        Оплата банковской картой
                                                                                </label>
                                                </div>
                                                                                                        <div class="radio">
                                           
                                                                                                            <input type="hidden" name="payment_method_current" value="revpay1">
                                        <input type="hidden" name="payment_method_checked" value="">
                                                        </div>
                            </div><div class="simplecheckout-block" id="simplecheckout_payment_form" style="margin: 0px; padding: 0px;"></div></div><div class="simplecheckout-block" id="simplecheckout_comment">
                                    <div class="checkout-heading panel-heading">Комментарий к заказу </div>
                                    <div class="simplecheckout-block-content">
                                <textarea class="form-control" name="comment" id="comment" placeholder="Необязательно*" data-reload-payment-form="true"></textarea>
                                </div>
                            </div></div>
                                            
                                            <div id="simplecheckout_bottom" style="width:100%;height:1px;clear:both;"></div>
                                            <div class="simplecheckout-proceed-payment" id="simplecheckout_proceed_payment" style="display:none;">Подождите... Происходит переход к оплате</div>
                                            
                                            

                                            <div class="simplecheckout-button-block buttons" id="buttons">
                                                <div class="simplecheckout-button-right">
                                                                    
                                                                            <a class="button btn-primary button_oc btn" data-onclick="createOrder" id="simplecheckout_button_confirm"><span>Оформить заказ</span></a>
                                                </div>
                                                <div class="simplecheckout-button-left">
                                                                                                </div>
                                            </div>    

                                                            
                                                    
                                        
                                                </div>
                                </div>
                            </div>

                                <div class="rev_slider">
                            


                            </div>
        </div>



<!-- 
		<div class="container">
			<h2 class="title">Ваш заказ </h2>
			<div class="row product-cover all-product-basket-container">
				<div class="all-product-basket">
					<div class="empty-basket none">
						КОРЗИНА ПУСТА
					</div>
				</div>
				<div class="all-order-info">
					<h5 class="common-price">Общая стоимость</h3>
						<div class="subtotal">
							<p class="subtotal-par">Подитог</p>
							<div class="subtotal-sum-box">
								<p class="subtotal-sum">0</p>
								<p class="subtotal-byn">BYN</p>
							</div>
						</div>
						<div class="total">
							<p class="total-par">ИТОГО</p>
							<div class="subtotal-sum-box">
								<p class="total-sum">0</p>
								<p class="total-byn">BYN</p>
							</div>
						</div>
						<a href="order-form.html">
							<button class="btn total-btn">Далее</button>
						</a>
				</div>
				
			</div>
		</div> -->
	</section>
	<!--================ S-TOP-SALE END ================-->



		<!--================== S-SUBSCRIBE ==================-->
	<section id="contacts" class="s-subscribe" style="background-image: url(assets/my-img/12.png);">
		<span class="mask"></span>
		<span class="subscribe-effect wow fadeIn" data-wow-duration="1s" style="background-image: url(assets/img/subscribe-effect.svg);"></span>
		<div class="container">
			<div class="subscribe-left">
				<h2  class="title"><span>Контакты</span></h2>				
				<div class="wow fadeInRightBlur lazy" data-wow-duration=".8s" data-wow-delay=".2s">
					<span>Телефон: </span>
					<a style="color: #fff;" href="tel:+375447507890">+375 (44) 750-78-90</a>	
				</div>
				<div class="wow fadeInRightBlur lazy" data-wow-duration=".8s" data-wow-delay=".4s">
					<span>Email: </span>
					<a style="color: #fff;" href="mailto:inmisale@mail.ru">inmisale@mail.ru</a>
				</div>

				<div class="wow fadeInRightBlur lazy" data-wow-duration=".8s" data-wow-delay=".3s">
					<span>Адрес: </span>
					<span>г. Минск, ул. Академика Купревича, 2</span>
					
				</div>
				<div class="wow fadeInRightBlur lazy" data-wow-duration=".8s" data-wow-delay=".4s">
					<span>График работы: </span>
					Пн-Чт: 9:00 - 18:00, Обед: 13:00 - 13:35 <br> Пт: 9:00 - 15:55, Обед: 13:00 - 13:35 <br>
					Сб-Вс: выходной
					</div>
			</div>
			
			<iframe class="wow fadeInRightBlur lazy" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d18794.367081731318!2d27.683449!3d53.926487!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46dbcebb4d6f6d2b%3A0x1c24ca875beb668c!2z0JjQvdGB0YLQuNGC0YPRgiDQvNC40LrRgNC-0LHQuNC-0LvQvtCz0LjQuCDQndCQ0J0g0JHQtdC70LDRgNGD0YHQuA!5e0!3m2!1sru!2sby!4v1737573509389!5m2!1sru!2sby" width="700" height="300"  style="border:0; max-width: 700px; max-height: 300px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
			<!-- <img class="wow fadeInRightBlur lazy me" data-wow-duration=".8s" data-wow-delay=".3s" src="assets/my-img/news/me.png" alt="img"> -->
		</div>
	</section>
	<!--================ S-SUBSCRIBE END ================-->



	<!--===================== TO TOP =====================-->
	<a class="to-top" href="#home">
		<i class="fa fa-angle-double-up" aria-hidden="true"></i>
	</a>

<?php get_footer(); ?>