                            <div class="makeup_fl_fotorama">
								<div class="fotorama" data-nav="thumbs"  data-autoplay="4000" data-loop="true" data-keyboard="true"  data-arrows="true" data-click="true" data-swipe="true" data-stopautoplayontouch="false" data-transition="slide" data-fit="cover" data-width="100%">

<?php foreach($galleries as $gallery):?>
								  <a href="<?php echo getThumbnail($gallery->getImg(),'gallery',1020,550)?>" alt="<?php echo $gallery->getName();?>">
								  	<img src="<?php echo getThumbnail($gallery->getImg(),'gallery',300,200)?>" alt="<?php echo $gallery->getName();?>" width="144" height="96" />
								  </a>
<?php endforeach;?>
								</div>
							</div>




							<div class="makeup_fl_content_testimonials">
								<div class="testimonials">
									<div class="quote"><i class="xcon-quote-right-alt"></i></div>
									<div class="owl-carousel owl-theme">
										<div class="item">
											<p>Aliquam metus ex, laoreet in nulla et, varius aliquam est. Vestibulum neque dui, auctor sit amet tincidunt ac, sodales sit amet est. Quisque gravida sit amet odio sed vulputate. Curabitur eleifend.</p>
											<br />
											<span>Laura Brandon</span>
										</div>
										<div class="item">
											<p>Sed ultrices eleifend risus eu convallis. Cras lacinia interdum ligula id posuere. Sed nec diam libero. Nunc arcu orci, mollis nec condimentum tincidunt, facilisis in nunc. Quisque malesuada molestie.</p>
											<br />
											<span>Britney Spears</span>
										</div>
										<div class="item">
											<p>Integer viverra non eros ac sollicitudin. Nunc lorem erat, finibus at consectetur in, vestibulum tristique ligula. Fusce nunc tortor, gravida fermentum diam in, dictum vestibulum libero.</p>
											<br />
											<span>Selena Gomez</span>
										</div>
										<div class="item">
											<p>Praesent in augue in purus iaculis scelerisque. Etiam at gravida neque. Proin nulla magna, tempus in leo non, maximus efficitur purus. Mauris vel mollis est. Suspendisse maximus cursus feugiat.</p>
											<br />
											<span>Paula Samry</span>
										</div>
										<div class="item">
											<p>Curabitur eget varius augue, non feugiat nisl. Duis fermentum est vel quam pharetra accumsan. Nulla sodales leo nisl, vel dignissim lacus finibus sit amet. Pellentesque elementum lacinia leo eget pulvinar.</p>
											<br />
											<span>Wendy Clifford</span>
										</div>
									</div>
									<div class="prev_next_btn">
										<a href="#" class="prev"><i class="xcon-angle-left"></i></a>
										<a href="#" class="next"><i class="xcon-angle-right"></i></a>
									</div>
								</div>

							</div>





							<div class="makeup_fl_package_list makeup_fl_masonry">

								<div class="makeup_fl_package_list_in makeup_fl_masonry_in">
									<div class="pckg_img">
										<img src="/img/package1.jpg" alt="" />
									</div>
									<div class="pckg_info">
										<div class="title_holder">
											<h3>Party Makeup Package</h3>
											<span>Time Duration : 2 - 3 hours</span>
										</div>
										<div class="price_list">
											<ul>
												<li>
													<div class="price_li">
														<span class="span1">Makeup Consultation</span>
														<span class="span2">$19.00</span>
													</div>
												</li>
												<li>
													<div class="price_li">
														<span class="span1">Signature Haircut &amp; Style</span>
														<span class="span2">$25.00</span>
													</div>
												</li>
												<li>
													<div class="price_li">
														<span class="span1">Airbrush Makeup</span>
														<span class="span2">$31.00</span>
													</div>
												</li>
												<li>
													<div class="price_li">
														<span class="span1">False Lash Application</span>
														<span class="span2">$24.00</span>
													</div>
												</li>
											</ul>
										</div>
										<div class="total"><span>Total: $99.00</span></div>
										<div class="footer">
											<div class="footer_btn">
												<a href="modal/booking.html" class="ajax-popup-link">Book Online</a>
											</div>
										</div>
									</div>
								</div>


								<div class="makeup_fl_package_list_in makeup_fl_masonry_in">
									<div class="pckg_img">
										<img src="/img/package2.jpg" alt="" />
									</div>
									<div class="pckg_info">
										<div class="title_holder">
											<h3>Commercial Makeup Package</h3>
											<span>Time Duration : 2 - 3 hours</span>
										</div>
										<div class="price_list">
											<ul>
												<li>
													<div class="price_li">
														<span class="span1">Makeup Consultation</span>
														<span class="span2">$19.00</span>
													</div>
												</li>
												<li>
													<div class="price_li">
														<span class="span1">Event Makeup Application</span>
														<span class="span2">$35.00</span>
													</div>
												</li>
												<li>
													<div class="price_li">
														<span class="span1">Benefit Lash Application</span>
														<span class="span2">$10.00</span>
													</div>
												</li>
												<li>
													<div class="price_li">
														<span class="span1">Lip &amp; Chin Wax</span>
														<span class="span2">$22.00</span>
													</div>
												</li>
											</ul>
										</div>
										<div class="total"><span>Total: $86.00</span></div>
										<div class="footer">
											<div class="footer_btn">
												<a href="modal/booking.html" class="ajax-popup-link">Book Online</a>
											</div>
										</div>
									</div>
								</div>

							</div>
