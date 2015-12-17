<?php

use yii\helpers\Url;

$this->registerCssFile('style/fillin.css', ['depends' => 'frontend\assets\AppAsset']);
$this->registerJsFile('js/cart2.js', ['depends' => 'frontend\assets\AppAsset']);
$this->title = '填写订单详细信息';

?>
<!-- 页面头部 start -->
<div class="header w990 bc mt15">
	<div class="logo w990">
		<h2 class="fl"><a href="index.html"><img src="/images/logo.png" alt="京西商城"></a></h2>
		<div class="flow fr flow2">
			<ul>
				<li>1.我的购物车</li>
				<li class="cur">2.填写核对订单信息</li>
				<li>3.成功提交订单</li>
			</ul>
		</div>
	</div>
</div>
<!-- 页面头部 end -->

<div style="clear:both;"></div>

<!-- 主体部分 start -->
<div class="fillin w990 bc mt15">
	<div class="fillin_hd">
		<h2>填写并核对订单信息</h2>
	</div>

	<div class="fillin_bd">
		<!-- 收货人信息  start-->
		<div class="address">
			<h3>收货人信息</h3>

			<div class="address_select">
				<form action="" class="" name="address_form">
					<ul>
						<li>
							<label for=""><span>*</span>收 货 人：</label>
							<input type="text" name="" class="txt" />
						</li>
						<li>
							<label for=""><span>*</span>详细地址：</label>
							<input type="text" name="" class="txt address"  />
						</li>
						<li>
							<label for=""><span>*</span>手机号码：</label>
							<input type="text" name="" class="txt" />
						</li>
					</ul>
				</form>
			</div>
		</div>
		<!-- 收货人信息  end-->

		<!-- 配送方式 start -->
		<div class="delivery">
			<h3>送货方式</h3>
			<div class="delivery_info">
				<p>普通快递送货上门</p>
				<p>送货时间不限</p>
			</div>

			<div class="delivery_select">
				<table>
					<thead>
						<tr>
							<th class="col1">送货方式</th>
						</tr>
					</thead>
					<tbody>
						<tr class="cur">	
							<td>
								<input type="radio" name="delivery" checked="checked" />普通快递送货上门
							</td>
						</tr>
						<tr>
							
							<td><input type="radio" name="delivery" />特快专递</td>
						</tr>
						<tr>
							<td><input type="radio" name="delivery" />加急快递送货上门</td>
						</tr>
						<tr>
							<td><input type="radio" name="delivery" />平邮</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div> 
		<!-- 配送方式 end --> 

		<!-- 支付方式  start-->
		<div class="pay">
			<h3>支付方式</h3>
			<div class="pay_select">
				<table> 
					<tr class="cur">
						<td class="col1"><input checked type="radio" name="pay" />货到付款</td>
						<td class="col2">送货上门后再收款，支持现金、POS机刷卡、支票支付</td>
					</tr>
					<tr>
						<td class="col1"><input type="radio" name="pay" />在线支付</td>
						<td class="col2">即时到帐，支持绝大数银行借记卡及部分银行信用卡</td>
					</tr>
					<tr>
						<td class="col1"><input type="radio" name="pay" />上门自提</td>
						<td class="col2">自提时付款，支持现金、POS刷卡、支票支付</td>
					</tr>
					<tr>
						<td class="col1"><input type="radio" name="pay" />邮局汇款</td>
						<td class="col2">通过快钱平台收款 汇款后1-3个工作日到账</td>
					</tr>
				</table>
			</div>
		</div>
		<!-- 支付方式  end-->

		<!-- 商品清单 start -->
		<div class="goods">
			<h3>商品清单</h3>
			<table>
				<thead>
					<tr>
						<th class="col1">商品</th>
						<th class="col2">规格</th>
						<th class="col3">价格</th>
						<th class="col4">数量</th>
						<th class="col5">小计</th>
					</tr>	
				</thead>
				<tbody>
					<tr>
						<td class="col1"><a href=""><img src="/images/cart_goods1.jpg" alt="" /></a>  <strong><a href="">【1111购物狂欢节】惠JackJones杰克琼斯纯羊毛菱形格</a></strong></td>
						<td class="col2"> <p>颜色：073深红</p> <p>尺码：170/92A/S</p> </td>
						<td class="col3">￥499.00</td>
						<td class="col4"> 1</td>
						<td class="col5"><span>￥499.00</span></td>
					</tr>
					<tr>
						<td class="col1"><a href=""><img src="/images/cart_goods2.jpg" alt="" /></a> <strong><a href="">九牧王王正品新款时尚休闲中长款茄克EK01357200</a></strong></td>
						<td class="col2"> <p>颜色：淡蓝色</p> <p>尺码：165/88</p></td>
						<td class="col3">￥1102.00</td>
						<td class="col4">1</td>
						<td class="col5"><span>￥1102.00</span></td>
					</tr>
				</tbody>
			</table>
		</div>
		<!-- 商品清单 end -->
	
	</div>

	<div class="fillin_ft">
		<a href=""><span>提交订单</span></a>
		<p>4 件商品，应付总额：<strong>￥5076.00元</strong></p>
	</div>
</div>
<!-- 主体部分 end -->
