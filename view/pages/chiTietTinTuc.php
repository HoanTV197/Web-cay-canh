<?php
include '../../controller/TinTucController.php';
$MaTinTuc = $_GET['MaTinTuc'];
$tt = new TinTucController();
$tintuc = $tt->getNews($MaTinTuc);
$listTT = $tt->getAllNews1();
?>
<section id="content ">
    <div class="row wraper ">
        <div class="container ">
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 ">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 list-menu pull-left ">

                    <div class="widget " style="margin: 0px; min-height: 0px; ">
                        <p>Danh mục sản phẩm</p>
                    </div>

                    <ul class="main-ul ">
                        <li><a href='san-pham/cay-canh-ngoai-that ' title=' Cây cảnh ngoại thất'>Cây cảnh ngoại thất<i class="fa fa-angle-right pull-right " aria-hidden="true "></i></a>
                            <ul class="sub
        ">
                                <li><a href='san-pham/cay-canh-nghe-thuat ' title=' Cây cảnh nghệ thuật '> Cây cảnh nghệ thuật</a></li>
                                <li><a href='san-pham/cay-canh-vuon ' title=' Cây cảnh vườn '> Cây cảnh vườn</a></li>
                            </ul>
                        </li>
                        <li><a href='san-pham/cay-canh-noi-that ' title=' Cây cảnh nội thất'>Cây cảnh nội thất<i class="fa fa-angle-right pull-right " aria-hidden="true "></i></a>
                            <ul class="sub ">
                                <li><a href='san-pham/ua-chuong-trong-nha ' title=' Ưa chuộng trong nhà '> Ưa chuộng trong nhà</a></li>
                                <li><a href='san-pham/cay-canh-de-ban ' title=' Cây cảnh để bàn '> Cây cảnh để bàn</a></li>
                                <li><a href='san-pham/cay-canh-van-phong ' title=' Cây cảnh văn phòng '> Cây cảnh văn phòng</a></li>
                            </ul>
                        </li>
                        <li><a href='san-pham/cay-giong ' title=' Cây giống'>Cây giống</i></a></li>
                    </ul>
                </div>
                <div class="widget ">
                    <p>Bài viết mới nhất</p>
                    <div class="tab-container ">
                        <?php
                        for ($i = count($listTT)-1; $i > count($listTT)-4;$i--){
                            echo "<div class='spost clearfix '>
                            <div class='entry-image e-img'>
                                <a href='tin-tuc/chon-cay-de-canh-ong-than-tai' class='nobg a-circle '>
                                    <img class='img-circle-custom' src='../../assets/public/images/products/".$listTT[$i]->getAnh()."' alt='Mua phụ kiện theo Combo giảm đến 30% '>
                                </a>
                            </div>
                            <div class='entry-c'>
                                <div class='entry-title e-title '>
                                    <h4>
                                        <a href='tin-tuc/chon-cay-de-canh-ong-than-tai '>".$listTT[$i]->getTieuDe()."</a>
                                    </h4>
                                </div>
                            </div>
                        </div>";
                        }
                        ?>
                       
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 product-content " id="list-content ">
                <div class="product-wrap " id="info-content ">
                    <div class="content-ct ">
                        <div class="fs-ne2-it clearfix " style="padding-top: 5px ">
                            <div class="fs-ne2-it clearfix ">
                                <div class="entry-title ">
                                    <h3>Chọn cây để cạnh ông thần tài</h3>
                                </div>
                                <ul class="entry-meta clearfix ">
                                    <li><i class="fa fa-calendar " style="margin-right: 5px "></i><?php echo $tintuc->getNgayTao();?></li>
                                </ul>
                            </div>
                            <div class="introtext ">
                                <p></p>
                            </div>
                            <div class="entry-content ">
                                <p>
                                <h1><?php echo $tintuc->getTieuDe(); ?></h1>

                                <p>Những C&acirc;y xanh Đặt B&agrave;n Thờ Thần T&agrave;i, thổ địa m&agrave; nhiều đại gia v&agrave; c&aacute;c c&ocirc;ng ty lớn đang trưng v&agrave; Mang Nhiều T&agrave;i Lộc cho họ như kim ng&acirc;n, kim tiền, ph&aacute;t t&agrave;i, vạn lộc, ph&uacute; qu&yacute;, ngọc ng&acirc;n...</p>
                                <?php
                                echo "<p><img  src='../../assets/public/images/products/".$tintuc->getAnh()."' style='width:460px'/></p>
                                ";
                                ?>
                                
                                <p>Chậu kim ng&acirc;n &ocirc;ng thần t&agrave;i</p>

                                <h2>B&agrave;n thờ thần t&agrave;i n&ecirc;n đặt c&acirc;y g&igrave;?&nbsp;</h2>

                                <p>Ban thờ Thần t&agrave;i - &Ocirc;ng địa l&agrave; một vật phẩm phong thủy quan trọng kh&ocirc;ng thể thiểu trong c&aacute;c cửa h&agrave;ng, c&ocirc;ng ty, những khu vực kinh doanh bu&ocirc;n b&aacute;n. V&igrave; n&oacute; mang lại sự may mắn trong tiền bạc, kinh doanh, sự thăng tiến trong c&ocirc;ng danh sự nghiệp Nếu ban thờ thần t&agrave;i &ocirc;ng địa c&oacute; th&ecirc;m c&acirc;y ph&ugrave; trợ th&igrave; c&ocirc;ng việc kinh doanh c&agrave;ng tốt hơn<br />
                                    &nbsp;</p>

                                <h3>Những c&acirc;y cảnh, c&acirc;y xanh m&agrave; c&aacute;c đại gia hoặc c&aacute;c chủ nh&agrave; h&agrave;ng kh&aacute;ch sạn thường chọn để trưng cạnh thần t&agrave;i thổ địa</h3>

                                <p>Th&ocirc;ng thường mọi người sẽ chọn những c&acirc;y mang lại hưng thịnh t&agrave;i lộc cho gia chủ như Kim ng&acirc;n, kim tiền, ph&aacute;t t&agrave;i ph&aacute;t lộc, thần t&agrave;i để đặt cạnh &ocirc;ng thần t&agrave;i gi&uacute;p ph&ugrave; trợ l&agrave;m ăn c&agrave;ng ph&aacute;t đạt.</p>

                                <h4>C&acirc;y kim ng&acirc;n đặt cạnh ban thần t&agrave;i thổ địa mang lại may mắn v&agrave; t&agrave;i lộc sinh s&ocirc;i</h4>

                                <p>C&acirc;y kim ng&acirc;n&nbsp;th&acirc;n d&aacute;ng h&igrave;nh trụ vững tr&atilde;i, l&aacute; xanh mượt số lẻ c&oacute; &yacute; nghĩa sinh s&ocirc;i nảy nở trong phủy. Người ta tin rằng nếu bạn đặt một c&acirc;y c&acirc;y kim ng&acirc;n ở nơi tiếp x&uacute;c với c&aacute;c khu vực li&ecirc;n quan đến tiền, th&igrave; c&acirc;y n&agrave;y sẽ mang lại may mắn v&agrave; sinh s&ocirc;i cho chủ sở hữu.<br />
                                    &nbsp;</p>

                                <p>Về bản chất, c&acirc;y kim ng&acirc;n l&agrave; c&acirc;y gỗ n&ecirc;n thuộc mệnh Mộc. Trong phong thủy th&igrave; người ph&ugrave; hợp nhất với c&acirc;y kim ng&acirc;n l&agrave; người c&oacute; mệnh Thủy, mệnh Hoả, mệnh Mộc v&igrave; Thủy sinh Mộc (tương hợp), Mộc sinh Hỏa (tương sinh).<br />
                                    <br />
                                    <br />
                                    Tuy vậy, c&acirc;y kim ng&acirc;n l&agrave; c&acirc;y c&oacute; phong thủy tốt c&oacute; thể ai cũng ph&ugrave; hợp nếu biết c&aacute;ch c&acirc;n bằng &acirc;m dương ngũ h&agrave;nh bằng c&aacute;ch phối hợp m&agrave;u sắc theo mệnh.<br />
                                    <br />
                                    Người mệnh Thổ: Thổ l&agrave; đất nu&ocirc;i dưỡng c&acirc;y để ph&aacute;t triển, nhưng ch&iacute;nh v&igrave; đ&oacute; c&acirc;y h&uacute;t dinh dưỡng, đ&acirc;m s&acirc;u v&agrave;o trong đất n&ecirc;n sẽ tương khắc (Mộc khắc Thổ), để c&acirc;n bằng, người mệnh Thổ sử dụng chậu c&acirc;y m&agrave;u đỏ lửa, hoặc m&agrave;u cam của mệnh Hỏa sẽ c&acirc;n bằng &acirc;m dương (Hỏa sinh Thổ).<br />
                                    <br />
                                    Người mệnh Kim: Đối với người mệnh Kim, n&ecirc;n trồng kim ng&acirc;n trong b&igrave;nh thủy sinh. Kim sinh Thủy để bổ trợ &acirc;m dương h&ograve;a hợp.<br />
                                    <br />
                                    Kim ng&acirc;n th&ocirc;ng thường kh&aacute;ch h&agrave;ng đặt cạnh b&agrave;n thờ thần t&agrave;i c&oacute; 3 k&iacute;ch cỡ cỡ lớn, cỡ vừa v&agrave; cỡ trung phụ thuộc v&agrave;o chiều cao v&agrave; độ rộng của ban thờ m&agrave; qu&yacute; kh&aacute;ch c&oacute; thể để c&aacute;c k&iacute;ch cỡ kh&aacute;c nhau&nbsp;
                                </p>

                                <h5>Những mẫu kim ng&acirc;n cỡ nhỏ đặt cạnh b&agrave;n thờ thần t&agrave;i&nbsp;</h5>

                                <p><img alt="kim ngân ông thần tài " src="https://bancaycanhdep.com/uploads/news/kim-ngan-chau-ong-phat.jpg " style="height:495px; width:660px " /></p>

                                <p><img alt="kim ngan 3 than than de ban chau dat nung " src="https://bancaycanhdep.com/uploads/news/kim-ngan-3-than-than-de-ban-chau-dat-nung.jpg " style="height:495px; width:660px " /></p>

                                <p><img alt="kim ngan 1 than de ban " src="https://bancaycanhdep.com/uploads/news/kim-ngan-1-than-de-ban.jpg " style="height:495px; width:660px " /></p>

                                <p>&nbsp;</p>

                                <p><img alt="kim ngan thuy sinh " src="https://bancaycanhdep.com/uploads/news/kim-ngan-thuy-sinh.jpg " style="height:495px; width:660px " /></p>

                                <p>&nbsp;</p>

                                <p><img alt="kim ngan 1 than mini " src="https://bancaycanhdep.com/uploads/news/kim-ngan-1-than-mini.jpg " style="height:495px; width:660px " /></p>

                                <p><img alt="kim ngan bim 5 gia re " src="https://bancaycanhdep.com/uploads/news/kim-ngan-bim-5-gia-re.jpg " style="height:880px; width:660px " /></p>

                                <h5>Mẫu kim ng&acirc;n cỡ trung đặt cạnh b&agrave;n thờ thần t&agrave;i&nbsp;</h5>

                                <p><img alt="kim ngan trung ong than tai " src="https://bancaycanhdep.com/uploads/news/kim-ngan-trung-ong-than-tai.jpg " style="height:1079px; width:660px " /></p>

                                <h5>C&acirc;y kim ng&acirc;n để cạnh b&agrave;n thờ thổ địa thần t&agrave;i cỡ lớn</h5>

                                <p><img alt="kim ngan trung ong than tai co lon " src="https://bancaycanhdep.com/uploads/news/kim-ngan-trung-ong-than-tai-co-lon.jpg " style="height:1079px; width:660px " /></p>

                                <h4>C&acirc;y kim tiền cạnh ban b&agrave;n thờ thổ địa thần t&agrave;i mang đến cho gia chủ nhiều may mắn t&agrave;i lộc, n&oacute; mang đến nhiều vượng kh&iacute;</h4>

                                <p><br />
                                    C&acirc;y kim tiền l&agrave; loại c&acirc;y phong thủy mang đến t&agrave;i lộc, may mắn, ph&uacute; qu&yacute;, lịch l&atilde;m, gi&agrave;u sang, tiền bạc cho gia chủ.Theo phong thủy, kim tiền l&agrave; c&acirc;y &ndash; mộc, nơi c&acirc;y tồn tại v&agrave; ph&aacute;t triển l&agrave; Thổ, dinh dưỡng, nước tưới hoặc dung dịch thủy sinh l&agrave; Thủy, c&acirc;y trồng chậu hoặc b&igrave;nh thủy tinh l&agrave; Kim. Một c&acirc;y đ&atilde; kết hợp của c&aacute;c yếu tố phong thủy n&ecirc;n c&agrave;ng được ưa chuộng.<br />
                                    <br />
                                    L&aacute; kim tiền c&oacute; viền tr&ograve;n mang t&iacute;nh &acirc;m ph&ugrave; hợp với trang tr&iacute; hiện đại ( từ kiến tr&uacute;c đến đồ vật đều vu&ocirc;ng th&agrave;nh, sắc cạnh) &ndash; theo phong thủy đ&oacute; l&agrave; t&iacute;nh dương. Để c&acirc;n bằng, điều h&ograve;a cần c&aacute;c h&igrave;nh thức tr&ograve;n trịa, &acirc;m t&iacute;nh, căng mọng v&agrave; kim tiền đ&aacute;p ứng được y&ecirc;u cầu đ&oacute;.<br />
                                    <br />
                                    Đặc biệt khi c&acirc;y kim tiền đ&acirc;m chồi nảy lộc, nở hoa sẽ đem lại nhiều may mắn, tiền t&agrave;i đến cho gia chủ.
                                </p>

                                <h5>Những mẫu c&acirc;y kim tiền để cạnh ban b&agrave;n thờ thổ địa thần t&agrave;i được ưa chuộng.</h5>

                                <p><img alt="mẫu cây kim tiền mini " src="https://bancaycanhdep.com/uploads/news/mau-cay-kim-tien-mini.jpg " style="height:415px; width:660px " /></p>

                                <p><img alt="cay kim tien trung ban tho ong dia " src="https://bancaycanhdep.com/uploads/news/cay-kim-tien-trung-ban-tho-ong-dia.jpg " style="height:1031px; width:660px " /></p>

                                <h4>Trồng C&acirc;y Ph&aacute;t t&agrave;i cạnh ban thờ &ocirc;ng thổ địa thần t&agrave;i gi&uacute;p gia chủ ng&agrave;y c&agrave;ng ph&aacute;t t&agrave;i.</h4>

                                <p>C&acirc;y Ph&aacute;t t&agrave;i&nbsp;mang đến may mắn, t&agrave;i lộc, thịnh vượng cho gia chủ, được ưa chuộng trồng trang tr&iacute; trong nh&agrave;, văn ph&ograve;ng, hoặc qu&agrave; tặng.C&acirc;y Ph&aacute;t t&agrave;i&nbsp;&nbsp;Loại c&acirc;y n&agrave;y mang lại may mắn, cho kh&ocirc;ng gian b&igrave;nh y&ecirc;n, đem tiền t&agrave;i, ph&uacute;c lộc đến với gia chủ. Gi&uacute;p tinh thần của gia chủ lu&ocirc;n thư th&aacute;i, thoải m&aacute;i, năng lượng dồi d&agrave;o. V&agrave;&nbsp; c&acirc;y n&agrave;y gi&uacute;p cuộc sống, c&ocirc;ng việc gặp nhiều may mắn, su&ocirc;n sẻ, thuận lợi.&nbsp;&nbsp;<br />
                                    <br />
                                    C&aacute;c mẫu ph&aacute;t t&agrave;i để cạnh ban b&agrave;n thờ thần t&agrave;i thổ địa
                                </p>

                                <p><img alt="phát tài thái mini " src="https://bancaycanhdep.com/uploads/news/phat-tai-thai-mini.jpg " style="height:495px; width:660px " /></p>

                                <p><img alt="mau phat tai dep " src="https://bancaycanhdep.com/uploads/news/mau-phat-tai-dep.jpg " style="height:1167px; width:660px " /></p>

                                <p><img alt="phat tai soc " src="https://bancaycanhdep.com/uploads/news/phat-tai-soc.jpg " style="height:1173px; width:660px " /></p>

                                <p><img alt="cây phát tài thiết mộc lan " src="https://bancaycanhdep.com/uploads/news/cay-phat-tai-thiet-moc-lan.jpg " style="height:371px; width:660px " /></p>

                                <p><img alt="cay phat tai bup sen dep " src="https://bancaycanhdep.com/uploads/news/cay-phat-tai-bup-sen-dep.jpg " style="height:891px; width:660px " /></p>

                                <h4>C&acirc;y Vạn Lộc&nbsp;hay c&ograve;n gọi l&agrave; c&acirc;y Thi&ecirc;n Ph&uacute; c&acirc;y c&oacute; &yacute; nghĩa phong thủy mang đến t&agrave;i lộc v&agrave; may mắn cho gia chủ</h4>

                                <p><br />
                                    &nbsp;Vạn Lộc l&agrave; c&acirc;y tượng trưng cho sự may mắn tr&agrave;n đầy, mang nhiều t&agrave;i lộc. C&acirc;y được y&ecirc;u th&iacute;ch v&igrave; sự tinh tế, sang trọng khi bạn v&ocirc; t&igrave;nh bắt gặp n&oacute; ngay từ c&aacute;i nh&igrave;n đầu ti&ecirc;n.<br />
                                    &nbsp;</p>

                                <p><img alt="cay van loc thuy sinh " src="https://bancaycanhdep.com/uploads/news/cay-van-loc-thuy-sinh.jpg " style="height:1173px; width:660px " /></p>

                                <p><br />
                                    Vạn lộc trồng trong nh&agrave; sẽ l&agrave; điểm tựa chắc chắn cho may mắn vạn lộc về t&agrave;i ch&iacute;nh, kinh tế gia đ&igrave;nh .<br />
                                    <br />
                                    C&acirc;y Vạn lộc&nbsp;quả thực l&agrave; một lo&agrave;i c&acirc;y phong thủy mang lại nhiều may mắn, tại lộc cho gia chủ. Người xưa thường n&oacute;i trồng vạn lộc m&agrave; ra hoa th&igrave; may mắn kh&ocirc;ng c&ograve;n g&igrave; bằng.&nbsp;
                                </p>

                                <h4>C&acirc;y Ph&uacute; Qu&yacute; mang đến cho gia chủ sự may mắn, gi&agrave;u sang v&agrave; ph&uacute; qu&yacute; cho gia chủ.</h4>

                                <p><img alt="phu quy " src="https://bancaycanhdep.com/uploads/news/phu-quy.jpg " style="height:715px; width:660px " /></p>

                                <p><br />
                                    M&agrave;u đỏ l&agrave; m&agrave;u của may mắn, do đ&oacute; c&acirc;y Ph&uacute; Qu&yacute; trong phong thủy l&agrave; c&acirc;y biểu tượng cho những điều tốt l&agrave;nh. Đồng thời, giống như t&ecirc;n gọi m&agrave; người ta đặt cho c&acirc;y, Ph&uacute; Qu&yacute; mang &nbsp;đến sự gi&agrave;u sang, t&agrave;i lộc, ph&uacute; qu&yacute; cho người trồng. Nếu bạn tặng cho ai đ&oacute; hoặc được người kh&aacute;c tặng c&acirc;y Ph&uacute; Qu&yacute; th&igrave; c&oacute; nghĩa l&agrave; cầu ch&uacute;c những điều tốt đẹp, mong muốn một cuộc sống thịnh vượng, ph&aacute;t t&agrave;i.</p>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>