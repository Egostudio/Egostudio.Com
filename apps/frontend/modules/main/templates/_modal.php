							<div class="makeup_fl_booking_btn">
								<div class="btn_s_a"><a href="modal/address.html" class="ajax-popup-link"><i class="xcon-home"></i></a></div>
								<div class="btn_b">
                                <a href="<?php echo url_for('@modal');?>" class="ajax-popup-link">Город: <?php echo $city;?></a>



        <select id="basic-city" class="selectpicker ">
<?php foreach($cities as $city1):?>        
          <option value="<?php echo $city1->id;?>" <?php echo $city_id==$city1->id?'selected':'';?>><?php echo $city1->getName();?></option>
<?php endforeach;?>
        </select>

                                </div>
								<div class="btn_s_b"><a href="modal/opening.html" class="ajax-popup-link"><i class="xcon-clock-1"></i></a></div>
							</div>                            

