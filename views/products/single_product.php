<div class="product_image_area">
    <div class="container">
        <div class="row s_product_inner">
            <div class="col-lg-6">
                <div class="s_Product_carousel">
                    <?php							
                                $images = json_decode($product['images']);		
                               		foreach( $images as $img){
									echo'
									<div class="single-prd-item">
										<img class="img-fluid" src="'.$img.'" alt="">
									</div>';
								}								
								?>
                </div>
            </div>
            <?php
         
            $tags = getAllTagByProductId($product['id']);
            
			echo'
			<div class="col-lg-5 offset-lg-1">
			<div class="s_product_text">
				<h3>'.$product['name'].'</h3>
				<h2>'.numToMoney($product['price']).'</h2>
				<ul class="list">
					<li><a class="active" href="#"><span>Loại hàng :</span> ';
					foreach($tags as $t){
						echo getTagId($t['tag_id'])['name']." "
					;}
					$Availibility=getSizeByProductId($product['id']);
					foreach($Availibility as $avb){
					};
						if($avb['quantity']<=0){
							echo '<li><span>Tình trạng :</span>Hết hàng</li>';
						}else{
							echo'<li><span>Tình trạng :</span>Còn hàng</li>';
						}
					
				echo'</a></li>
				</ul>
				<div>'.$product['description'].'</div>	
			';
				
		?>

            <div class="row mb-2 margin-size">
                <style>
                .form-select .current {
                    margin-left: 20px;

                }

                .form-select .nice-select {
                    background-color: white;

                }

                .margin-size {
                    margin-left: -20px;
                }

                .format-input {
                    border: 0px;
                }
                </style>
               
            <form action="product.php?action=addcart&id=<?php echo $_GET['id']?>" method="post">
                <div class="input-group-icon mt-10">
                    <div class="icon">Size: </div>
                        <div class="form-select ">
                        <select id="prSize">
                            <?php 
				$size=getSizeByProductId($product['id']);
				foreach($size as $sz){
					getSizeId($sz['size_id']);
					echo 	"<option value=".$sz['size_id']."> $sz[size_id]</option>";
				}
				?>
                        </select>
                        </div>
                    </div>
                </div>
            <input type="text" id="proId" value="<?=$product['id']?>" hidden>
            <div class=" card_area d-flex align-items-center">
                <a class="primary-btn" href="#" id="prDetailAdd">Thêm vào giỏ </a>
                <a class="icon_btn" href="#"><i class="lnr lnr lnr-heart"></i></a>
            </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>
<script>
document.getElementById("prDetailAdd").addEventListener("click", function(event) {
    event.preventDefault();
    let id = document.getElementById('proId').value;
    let size = document.getElementById('prSize').value;
    console.log(size + " : " + id);
    $.ajax({
        type: "POST",
        url: 'shop.php?action=addToCart&id=' + id + '&quantity=1&size=' + size,
        success: function(data) {
            alert('đã thêm sản phẩm vào giỏ hàng');
        }
    });
});
</script>