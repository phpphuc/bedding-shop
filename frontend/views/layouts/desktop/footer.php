<?php

use backend\models\Gallery;
use backend\models\Postscat;
use backend\models\Posts;
use TonchikTm\Yii2Thumb\ImageThumb;
use kartik\datetime\DateTimePicker;
use backend\models\Chinhanh;
?>
<div class="bg-pink-500 px-4 py-8 text-white">
    <div class="container mx-auto grid grid-cols-1 gap-12 md:grid md:grid-cols-2 lg:flex">
        <div class="lg:whitespace-nowrap">
            <h2 class="mb-4 font-utm-avo text-lg font-bold text-[#ffff00]">CHĂN GA GỐI NỆM HÒA BÌNH</h2>
            <ul class="space-y-2">
                <li class="flex items-center gap-2">
                    <i class="fa-solid fa-location-dot rounded-full border p-1.5 text-white"></i>
                    160 Bình Long, Phường Phú Thạnh, Quận Tân Phú, Tp. Hồ Chí Minh
                </li>
                <li class="flex items-center gap-2">
                    <i class="fa-solid fa-phone rounded-full border p-1.5 text-white"></i>
                    0129 565 6879 (Mr. Bình)
                </li>
                <li class="flex items-center gap-2">
                    <i class="fa-regular fa-envelope rounded-full border p-1.5 text-white"></i>
                    nguyentienbinh1976@gmail.com
                </li>
                <li class="flex items-center gap-2">
                    <i class="fa-solid fa-globe rounded-full border p-1.5 text-white"></i>
                    <a href="https://www.changagoinemhoabinh.com/" class="">https://www.changagoinemhoabinh.com/</a>
                </li>
            </ul>
            <p class="mt-4">Copyright © 2016 HOA BÌNH. Web design : NiNa Co., Ltd</p>
        </div>

        <div class="">
            <h2 class="mb-4 font-utm-avo text-lg">ĐĂNG KÝ NHẬN TIN</h2>
            <p class="mb-4">Hãy để địa chỉ email của bạn để nhận thông tin mới nhất từ chúng tôi.</p>
            <div class="mb-4 flex gap-0.5">
                <input type="email" placeholder="Nhập địa chỉ email..." class="w-[210px] border-0 p-2" />
                <button class="w-[64px] rounded-r bg-[#ed1c24] px-5 py-2 text-white">GỬI</button>
            </div>
            <div class="mt-6 flex items-center gap-2">
                <p class="mr-2">Mạng xã hội:</p>
                <a href="#" class="">
                    <img src="images/facebook-icon.png" alt="" />
                </a>
                <a href="#" class="">
                    <img src="images/twitter-icon.png" alt="" />
                </a>
                <a href="#" class="">
                    <img src="images/skype-icon.png" alt="" />
                </a>
                <a href="#" class="">
                    <img src="images/youtube-icon.png" alt="" />
                </a>
            </div>
        </div>

        <div class="">
            <h2 class="mb-4 font-utm-avo text-lg">FANPAGE FACEBOOK</h2>
            <iframe
                src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FOtofun.Community&tabs=timeline&width=280&height=135&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId"
                width="280"
                height="135"
                style="border: none; overflow: hidden"
                scrolling="no"
                frameborder="0"
                allowfullscreen="true"
                allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
        </div>
    </div>
</div>