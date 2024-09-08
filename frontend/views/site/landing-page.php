<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Thành lập công ty</title>
  <!-- <script src="https://cdn.tailwindcss.com"></script> -->
  <!-- <link rel="stylesheet" href="style.css" /> -->
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" /> -->
  <link rel="stylesheet" href="frontend/web/css/landing-page.css">
  <!-- <style>

  </style> -->

  <!-- <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer" /> -->
</head>

<body class="bg-white font-sans">
  <!-- <div class="h-10 bg-primary">...</div>
    <div class="h-10 bg-secondary"></div>
    <div class="h-10 bg-accent"></div>
    <div class="h-10 bg-background"></div>
    <div class="h-10 bg-text"></div>
    <div class="h-10 bg-white"></div> -->
  <header class="fixed z-30 flex w-full flex-wrap items-center justify-between bg-yellow-dark px-6 py-4">
    <div class="">
      <img src="https://placehold.co/50x50" alt="Logo" class="h-10" />
    </div>
    <nav class="hidden space-x-6 sm:flex md:mt-0">
      <a href="#service" class="text-sm font-medium text-white md:text-base">GÓI DỊCH VỤ</a>
      <a href="#process" class="text-sm font-medium text-white md:text-base">QUY TRÌNH</a>
      <a href="#team" class="text-sm font-medium text-white md:text-base">ĐỘI NGŨ</a>
      <a href="#contact" class="text-sm font-medium text-white md:text-base">LIÊN HỆ</a>
    </nav>

    <div class="">
      <button href="#" class="grow-continuously rounded-full bg-gray-dark px-4 py-2 text-sm font-medium text-white md:px-6 md:text-base">
        ĐĂNG KÝ NGAY
      </button>
    </div>

    <div class="block md:hidden">
      <button id="menu-toggle" class="text-white focus:outline-none">
        <i class="fas fa-bars text-2xl"></i>
      </button>
    </div>
  </header>

  <!-- Mobile Menu -->
  <div class="relative">
    <div id="mobile-menu" class="fixed z-30 hidden md:hidden">
      <nav class="fixed right-0 top-[72px] ml-auto flex w-max flex-col bg-gray-dark p-4">
        <a href="#service" class="w-full p-4 text-sm font-medium text-white md:text-base">GÓI DỊCH VỤ</a>
        <a href="#process" class="p-4 text-sm font-medium text-white md:text-base">QUY TRÌNH</a>
        <a href="#team" class="p-4 text-sm font-medium text-white md:text-base">ĐỘI NGŨ</a>
        <a href="#contact" class="p-4 text-sm font-medium text-white md:text-base">LIÊN HỆ</a>
      </nav>
    </div>
  </div>
  <section id="service" class="mt-[72px] bg-gradient-to-r from-[#FDE7D2] to-[#FDE3CB]">
    <h1
      class="ml-6 mr-6 max-w-fit translate-y-4 text-wrap bg-white px-4 py-2 text-center text-base font-bold uppercase sm:mx-auto sm:text-lg">
      Dịch vụ tư vấn và thành lập doanh nghiệp Hồ Chí Minh
    </h1>
    <div class="mx-auto max-w-6xl flex-wrap items-center justify-center space-y-6 md:-translate-x-8 lg:flex lg:space-x-10 xl:space-x-16">
      <div class="mt-8 flex-grow">
        <div class="relative rounded-lg bg-white bg-opacity-0 p-6 md:p-4">
          <div class="absolute left-0 top-0 z-0 h-full w-full rounded-lg bg-[#FFA640] bg-opacity-0 opacity-50"></div>
          <div class="relative z-10">
            <div class="relative flex h-[250px] justify-center sm:h-[350px]">
              <img src="../images/brush-background.png" class="absolute -z-10 h-auto w-[400px] sm:w-[450px] lg:w-[500px]" alt="" />
              <div class="smd:-translate-y-1/2 absolute top-1/2 w-[400px] -translate-y-1/3 text-center">
                <h2 class="speech-bubble round float mb-4 text-base font-bold md:text-xl lg:text-2xl">GÓI TIẾT KIỆM</h2>
                <h1 class="mb-2 translate-x-4 text-xl font-bold md:text-2xl lg:translate-x-20 lg:text-3xl">THÀNH LẬP CÔNG TY</h1>
                <p class="mb-1 text-xl font-bold">Chỉ mất 3 ngày</p>
                <span class="inline-block rounded-2xl bg-[#E65100] px-14 py-1 text-xs font-semibold text-white">Ưu đãi 40%</span>
                <p class="mb-4 text-base font-bold text-black">
                  Chỉ từ <span class="font-outline-2 text-3xl font-extrabold text-white">1.299.000</span> VND
                </p>
              </div>
            </div>
            <div class="mt-16 flex flex-wrap justify-center sm:mt-0 md:mt-8 md:translate-x-7">
              <ul class="mt-2 space-y-2 rounded-md border border-orange-500 bg-[#fff5f2] px-4 py-2 text-xs font-medium text-gray-900">
                <li>
                  <i class="fas fa-check-circle mr-1 text-[#f05b00]"></i>

                  Đảm bảo 3-4 ngày có KẾT QUẢ
                </li>
                <li></li>
                <li>
                  <i class="fas fa-check-circle mr-1 text-[#f05b00]"></i>
                  Thủ tục đơn giản, tận nhà
                </li>
                <li></li>
                <li>
                  <i class="fas fa-check-circle mr-1 text-[#f05b00]"></i>
                  HẠN CHẾ tối đa khách đi lại
                </li>
              </ul>
              <ul
                class="mt-2 flex items-center space-y-2 rounded-md border border-orange-500 bg-[#fff5f2] px-4 py-2 text-xs font-medium text-gray-900">
                <!-- how to make text wrap -->

                <li class="text-wrap">
                  <i class="fas fa-check-circle mr-1 text-[#f05b00]"></i>
                  Miễn phí báo cáo thuế tháng <br />
                  đầu trị giá 1500k(áp dụng gói <br />
                  HOÀN HẢO)
                </li>
              </ul>
            </div>
            <p class="mt-3 flex-none px-4 text-center text-sm font-bold uppercase md:translate-x-7">
              Cùng nhiều ưu đãi đặc biệt khác tại MIN LEGAL
            </p>
          </div>
        </div>
      </div>
      <div class="lg:w-[500px]">
        <div class="relative mx-auto flex h-[500px] w-[500px] items-center justify-center">
          <div class="absolute inset-0 flex items-center justify-center">
            <div class="h-[260px] w-[260px] rounded-full bg-yellow-50/35 md:h-[450px] md:w-[450px]"></div>
          </div>

          <div class="absolute inset-0 flex items-center justify-center">
            <div class="h-[300px] w-[300px] rounded-full border border-black md:h-[500px] md:w-[500px]"></div>
          </div>

          <div class="zoom-container absolute inset-0">
            <!-- Circle -->
            <div class="absolute bottom-14 right-16 h-16 w-16 rounded-full bg-gradient-to-br from-[#ffb000] to-[#ff8400]"></div>
            <!-- Circle -->
            <div class="striped-background absolute left-16 top-20 h-12 w-12 rounded-full"></div>
            <!-- + -->
            <div class="absolute bottom-16 left-16 rotate-45 text-6xl font-bold text-white opacity-70">+</div>
            <div class="absolute right-10 top-1/2 rotate-45 text-3xl font-bold text-orange-300 opacity-70">+</div>
            <!-- . -->
            <div
              class="absolute right-20 top-1/3 h-2 w-2 rounded-lg border-2 border-amber-300 text-3xl font-bold text-zinc-300 opacity-70"></div>
          </div>

          <img src="../images/hero-img.png" class="relative left-4 z-10 h-auto w-[200px] md:w-[360px]" />
        </div>
        <div class="mt-2 flex justify-center text-center md:text-left">
          <button
            href="#"
            class="grow-continuously m-4 inline-block rounded-full bg-gray-dark px-6 py-3 text-sm font-medium text-white md:text-base">
            ĐĂNG KÝ TƯ VẤN THÀNH LẬP MIỄN PHÍ
          </button>
        </div>
      </div>
    </div>
  </section>

  <!-- Các gói thành lập cty -->
  <section class="mx-auto max-w-6xl bg-[#ffe5c6] bg-opacity-50 py-12">
    <div class="mx-auto max-w-7xl text-center">
      <h2 class="font-outline-brown mb-2 text-3xl font-extrabold text-gray-dark sm:text-5xl">CÁC GÓI THÀNH LẬP CÔNG TY</h2>
      <p class="mb-4 text-xl font-bold text-gray-dark sm:text-3xl">GIÚP TIẾT KIỆM TỐI ĐA CHI PHÍ THÀNH LẬP</p>
      <hr class="mx-auto my-4 h-1 w-80 border-0 bg-gray-dark" />
      <p class="mx-auto mb-8 max-w-3xl px-4 text-center font-bold text-gray-700">
        Min Legal với gần 10 năm kinh nghiệm hoạt động trong lĩnh vực tư vấn hỗ trợ pháp lý cho cá nhân và doanh nghiệp trong và ngoài
        nước. Chúng tôi tự hào là một trong những đơn vị tư vấn uy tín hàng đầu tại TP. Hồ Chí Minh và trên toàn quốc.
      </p>

      <!-- Pricing Cards -->
      <div class="mx-8 mb-8 grid grid-cols-1 gap-10 md:grid-cols-2 lg:grid-cols-3">
        <!-- Card 1 -->
        <div class="mx-auto flex max-w-[400px] flex-col rounded-lg border-t-8 border-blue-600 bg-white p-6 shadow-lg">
          <h3 class="mb-2 text-lg font-bold text-blue-600">GÓI TIẾT KIỆM - TRỌN GÓI 1.299.000 VNĐ</h3>
          <img src="https://placehold.co/300x200" class="mx-auto w-full rounded-lg" />
          <p class="my-3 text-left font-bold text-gray-dark">Các nội dung hoàn thiện</p>
          <ul class="mb-4 flex-1 text-left text-base text-gray-700">
            <li class="mb-2 flex items-center"><span class="mr-2 font-bold text-yellow-600">✓</span> GPKD & MST</li>
            <li class="mb-2 flex items-center"><span class="mr-2 font-bold text-yellow-600">✓</span> Con dấu tròn</li>
            <li class="mb-2 flex items-center"><span class="mr-2 font-bold text-yellow-600">✓</span> Giấy xác nhận mẫu dấu</li>
            <li class="mb-2 flex items-center"><span class="mr-2 font-bold text-yellow-600">✓</span> Bộ điều lệ công ty</li>
            <li class="mb-2 flex items-center"><span class="mr-2 font-bold text-yellow-600">✓</span> Mở tài khoản Ngân Hàng</li>
          </ul>
          <p class="mb-4 text-base font-bold text-red-600">
            Tổng chi phí thành lập cơ bản <br />
            1.299.000đ cam kết không phát sinh
          </p>
          <button class="grow-continuously w-full rounded-sm bg-gray-900 py-2 text-sm font-bold text-white">
            ĐĂNG KÝ TƯ VẤN MIỄN PHÍ
          </button>
        </div>

        <!-- Card 2 -->
        <div class="mx-auto flex max-w-[400px] flex-col rounded-lg border-t-8 border-blue-600 bg-white p-6 shadow-lg">
          <h3 class="mb-2 text-lg font-bold text-blue-600">GÓI NÂNG CAO - TRỌN GÓI 3.499.000 VNĐ</h3>
          <img src="https://placehold.co/300x200" class="mx-auto w-full rounded-lg" />
          <p class="my-3 text-left font-bold text-gray-dark">Các nội dung hoàn thiện</p>
          <ul class="mb-4 flex-1 text-left text-base text-gray-700">
            <li class="mb-2 flex items-center"><span class="mr-2 font-bold text-yellow-600">✓</span> Các nội dung của gói tiết kiệm</li>
            <li class="mb-2 flex items-center">
              <span class="mr-2 font-bold text-yellow-600">✓</span> Thông báo tài khoản ngân hàng lên Thuế
            </li>
            <li class="mb-2 flex items-center"><span class="mr-2 font-bold text-yellow-600">✓</span> Khai báo thuế ban đầu</li>
            <li class="mb-2 flex items-center"><span class="mr-2 font-bold text-yellow-600">✓</span> Biển hiệu công ty</li>
            <li class="mb-2 flex items-center"><span class="mr-2 font-bold text-yellow-600">✓</span> Đăng ký con dấu</li>
          </ul>
          <p class="mb-4 text-base font-bold text-red-600">
            Tổng chi phí thành lập nâng cao <br />
            3.499.000đ cam kết không phát sinh
          </p>
          <button class="grow-continuously w-full rounded-sm bg-gray-900 py-2 text-sm font-bold text-white">
            ĐĂNG KÝ TƯ VẤN MIỄN PHÍ
          </button>
        </div>

        <!-- Card 3 -->
        <div class="mx-auto flex max-w-[400px] flex-col rounded-lg border-t-8 border-blue-600 bg-white p-6 shadow-lg">
          <h3 class="mb-2 text-lg font-bold text-blue-600">GÓI HOÀN HẢO - TRỌN GÓI 4.199.000 VNĐ</h3>
          <img src="https://placehold.co/300x200" class="mx-auto w-full rounded-lg" />
          <p class="my-3 text-left font-bold text-gray-dark">Các nội dung hoàn thiện</p>
          <ul class="mb-4 flex-1 text-left text-base text-gray-700">
            <li class="mb-2 flex items-center"><span class="mr-2 font-bold text-yellow-600">✓</span> Các nội dung nâng cao</li>
            <li class="mb-2 flex items-center"><span class="mr-2 font-bold text-yellow-600">✓</span> Khai lý lịch tư pháp</li>
            <li class="mb-2 flex items-center"><span class="mr-2 font-bold text-yellow-600">✓</span> 300 hồ sơ đăng ký BKAV</li>
            <li class="mb-2 flex items-center"><span class="mr-2 font-bold text-yellow-600">✓</span> 500 GB hosting miễn phí 1 năm</li>
            <li class="mb-2 flex items-center opacity-0"><span class="mr-2 font-bold text-yellow-600">✓</span></li>
          </ul>
          <p class="mb-4 text-base font-bold text-red-600">
            Tổng chi phí thành lập cơ bản <br />
            4.199.000đ cam kết không phát sinh
          </p>
          <button class="grow-continuously w-full rounded-sm bg-gray-900 py-2 text-sm font-bold text-white">
            ĐĂNG KÝ TƯ VẤN MIỄN PHÍ
          </button>
        </div>
      </div>

      <!-- Additional Image and Info -->
      <div class="mx-4 items-center justify-center gap-4 md:mx-0 md:flex-row lg:flex lg:translate-x-10">
        <img src="https://placehold.co/600x400" class="mx-auto border-8 border-gray-dark" />
        <div
          class="mx-auto max-w-[610px] border-b-8 border-l-8 border-r-8 border-gray-dark bg-white p-6 px-6 lg:-translate-x-20 lg:border-l-0">
          <h3 class="mb-2 text-left text-2xl font-bold text-black">THÀNH LẬP CÔNG TY TRỌN GÓI</h3>
          <p class="mb-4 text-left text-2xl font-bold text-red-600">
            Chỉ từ 1.299.000đ<span class="text-base text-black"> / cam kết không phát sinh</span>
          </p>
          <p class="mb-4 text-left text-sm font-bold text-gray-900 md:text-base">
            <span class="mr-2 font-bold text-yellow-600">✓</span> Miễn phí báo cáo thuế tháng đầu
            <span class="font-semibold text-red-500">trị giá 1500k</span>
            <span class="font-normal">(áp dụng gói HOÀN HẢO)</span>
          </p>
          <p class="mb-8 text-left text-sm font-semibold text-red-600 md:text-base">
            ƯU ĐÃI CÓ HẠN CHỈ CHO 5 SUẤT NHANH NHẤT TRONG THÁNG
          </p>
          <button class="w-full rounded-full bg-red-600 py-2 text-sm font-bold text-white">ĐĂNG KÝ TƯ VẤN NHẬN ƯU ĐÃI</button>
        </div>
      </div>
    </div>
  </section>

  <section class="mx-auto max-w-6xl bg-[#ffe5c6] bg-opacity-50 px-4 py-12">
    <h2 class="mb-12 text-center text-3xl font-bold text-white md:text-4xl"></h2>
    <h2 class="font-outline-brown text-center text-3xl font-extrabold text-gray-dark sm:text-5xl">CÁC LOẠI HÌNH CÔNG TY PHỔ BIẾN</h2>
    <hr class="mx-auto mb-8 mt-4 h-1 w-80 rounded border-0 bg-gray-dark" />
    <div class="cards grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
      <!-- Card 1 -->
      <div class="flex flex-col overflow-hidden rounded-lg bg-gray-dark shadow-lg">
        <img src="https://placehold.co/500x300" alt="Hộ kinh doanh cá thể" class="h-40 w-full object-cover" />
        <div class="flex-1 p-6 pb-4">
          <h3 class="text-center text-xl font-bold text-white">HỘ KINH DOANH CÁ THỂ</h3>
          <hr class="mx-auto my-3 h-0.5 w-32 border-0 bg-white" />
          <p class="text-sm text-white">
            Là kinh doanh do một cá nhân hay nhóm người, hay một hộ gia đình làm chủ, chỉ được đăng ký kinh doanh tại một địa điểm nhất
            định, số lượng lao động được phép sử dụng dưới 10 người, không thường xuyên thuê lao động, không có con dấu và chịu trách
            nhiệm hoàn toàn bằng tài sản đối với các hoạt động kinh doanh.
          </p>
        </div>
        <div class="px-6 pb-4">
          <button class="grow-continuously w-full rounded-full bg-[#ffff5a] px-4 py-2 font-bold text-[#cc3030]">
            ĐĂNG KÝ TƯ VẤN NGAY
          </button>
        </div>
      </div>
      <!-- Card 2 -->
      <div class="flex flex-col overflow-hidden rounded-lg bg-gray-dark shadow-lg">
        <img src="https://placehold.co/500x300" alt="Công ty TNHH 1 thành viên" class="h-40 w-full object-cover" />
        <div class="flex-1 p-6 pb-4">
          <h3 class="text-center text-xl font-bold text-white">CÔNG TY TNHH 1 THÀNH VIÊN</h3>
          <hr class="mx-auto my-3 h-0.5 w-32 border-0 bg-white" />
          <p class="text-sm text-white">
            Là doanh nghiệp do một tổ chức hoặc một cá nhân làm chủ sở hữu (sau đây gọi là chủ sở hữu công ty). Chủ sở hữu công ty chịu
            trách nhiệm về các khoản nợ và nghĩa vụ tài sản khác của công ty trong phạm vi số vốn điều lệ của công ty.
          </p>
        </div>
        <div class="px-6 pb-4">
          <button class="grow-continuously w-full rounded-full bg-[#ffff5a] px-4 py-2 font-bold text-[#cc3030]">
            ĐĂNG KÝ TƯ VẤN NGAY
          </button>
        </div>
      </div>
      <!-- Card 3 -->
      <div class="flex flex-col overflow-hidden rounded-lg bg-gray-dark shadow-lg">
        <img src="https://placehold.co/500x300" alt="Công ty TNHH 2 thành viên" class="h-40 w-full object-cover" />
        <div class="flex-1 p-6 pb-4">
          <h3 class="text-center text-xl font-bold text-white">CÔNG TY TNHH 2 THÀNH VIÊN</h3>
          <hr class="mx-auto my-3 h-0.5 w-32 border-0 bg-white" />
          <p class="text-sm text-white">
            Là doanh nghiệp có từ 02 đến 50 thành viên là tổ chức, cá nhân. Thành viên chịu trách nhiệm về các khoản nợ và nghĩa vụ tài
            sản khác của doanh nghiệp trong phạm vi số vốn đã góp vào doanh nghiệp.
          </p>
        </div>
        <div class="px-6 pb-4">
          <button class="grow-continuously w-full rounded-full bg-[#ffff5a] px-4 py-2 font-bold text-[#cc3030]">
            ĐĂNG KÝ TƯ VẤN NGAY
          </button>
        </div>
      </div>
      <!-- Card 4 -->
      <div class="flex flex-col overflow-hidden rounded-lg bg-gray-dark shadow-lg">
        <img src="https://placehold.co/500x300" alt="Công ty cổ phần" class="h-40 w-full object-cover" />
        <div class="flex-1 p-6 pb-4">
          <h3 class="text-center text-xl font-bold text-white">CÔNG TY CỔ PHẦN</h3>
          <hr class="mx-auto my-3 h-0.5 w-32 border-0 bg-white" />
          <p class="text-sm text-white">
            Là một dạng pháp nhân có trách nhiệm hữu hạn, được thành lập và tồn tại độc lập đối với những chủ thể sở hữu nó. Vốn của công
            ty cổ phần được chia thành những phần bằng nhau gọi là cổ phần và được phát hành huy động vốn tham gia của các nhà đầu tư.
          </p>
        </div>
        <div class="px-6 pb-4">
          <button class="grow-continuously w-full rounded-full bg-[#ffff5a] px-4 py-2 font-bold text-[#cc3030]">
            ĐĂNG KÝ TƯ VẤN NGAY
          </button>
        </div>
      </div>
      <!-- Card 5 -->
      <div class="flex flex-col overflow-hidden rounded-lg bg-gray-dark shadow-lg">
        <img src="https://placehold.co/500x300" alt="Công ty vốn nước ngoài" class="h-40 w-full object-cover" />
        <div class="flex-1 justify-between p-6 pb-4">
          <h3 class="text-center text-xl font-bold text-white">CÔNG TY VỐN NƯỚC NGOÀI</h3>
          <hr class="mx-auto my-3 h-0.5 w-32 border-0 bg-white" />
          <p class="text-sm text-white">
            Là doanh nghiệp có nhà đầu tư của một quốc gia đầu tư toàn bộ hoặc một phần vốn thành lập trên lãnh thổ của một quốc gia khác
            để tiến hành hoạt động kinh doanh thu lợi nhuận.
          </p>
        </div>
        <div class="px-6 pb-4">
          <button class="grow-continuously w-full rounded-full bg-[#ffff5a] px-4 py-2 font-bold text-[#cc3030]">
            ĐĂNG KÝ TƯ VẤN NGAY
          </button>
        </div>
      </div>
      <!-- Card 6 -->
      <div class="flex flex-col overflow-hidden rounded-lg bg-gray-dark shadow-lg">
        <img src="https://placehold.co/500x300" alt="Doanh nghiệp tư nhân" class="h-40 w-full object-cover" />
        <div class="flex-1 p-6 pb-4">
          <h3 class="text-xl font-bold text-white">DOANH NGHIỆP TƯ NHÂN</h3>
          <hr class="mx-auto my-3 h-0.5 w-32 border-0 bg-white" />
          <p class="text-sm text-white">
            Là doanh nghiệp do một cá nhân làm chủ và tự chịu trách nhiệm bằng toàn bộ tài sản của mình về mọi hoạt động của doanh nghiệp;
            không được phát hành bất kỳ loại chứng khoán nào. Mỗi cá nhân chỉ được quyền thành lập một doanh nghiệp tư nhân.
          </p>
        </div>
        <div class="px-6 pb-4">
          <button class="grow-continuously w-full rounded-full bg-[#ffff5a] px-4 py-2 font-bold text-[#cc3030]">
            ĐĂNG KÝ TƯ VẤN NGAY
          </button>
        </div>
      </div>
    </div>
  </section>

  <section class="mx-auto max-w-6xl bg-[#feebcb] pb-8">
    <!-- Top section -->
    <div class="text-brown-800 bg-[#d2ae6d] p-4 text-center">
      <div class="flex flex-col items-center justify-center space-x-4">
        <div class="flex items-center space-x-2 pb-2">
          <!-- <i class="fas fa-handshake fa-lg"></i> -->
          <p class="px-4 text-sm font-semibold text-gray-800">
            Việc LỰA CHỌN ĐÚNG loại hình doanh nghiệp có vai trò rất quan trọng trong việc kinh doanh và liên quan mật thiết với các chính
            sách thuế và kế toán. Hãy để MIN LEGAL tư vấn và giúp bạn có sự lựa chọn đúng đắn nhất tránh mất thêm các chi phí không liên
            quan.
          </p>
        </div>
        <div class="w-full">
          <button class="grow-continuously rounded-full bg-[#ffff5a] px-20 py-2 font-semibold text-[#cc3030]">
            HOTLINE TƯ VẤN 24/24: 0938.837.724
          </button>
        </div>
      </div>
    </div>

    <!-- Main section -->
    <div class="container mx-auto mt-8 px-4 text-center">
      <h2 class="font-outline-brown text-center text-2xl font-extrabold text-gray-dark md:text-4xl">
        HỒ SƠ VÀ THỦ TỤC CẦN CHUẨN BỊ <br />
        THÀNH LẬP CÔNG TY
      </h2>
      <hr class="bg-brown-800 mx-auto mb-8 mt-4 h-1 w-20 rounded border-0" />

      <!-- Checklist section -->
      <div class="mx-auto max-w-xl rounded-lg border-2 border-orange-500 bg-white p-6 text-left shadow-lg">
        <ul class="text-brown-800 space-y-4">
          <li class="flex items-center font-semibold">
            <i class="fas fa-check-circle mr-2 text-[#d2ae6d]"></i>
            Chọn loại hình công ty phù hợp
          </li>
          <li class="flex items-center font-semibold">
            <i class="fas fa-check-circle mr-2 text-[#d2ae6d]"></i>
            Chọn địa chỉ trụ sở phù hợp và đúng quy định của pháp luật
          </li>
          <li class="flex items-center font-semibold">
            <i class="fas fa-check-circle mr-2 text-[#d2ae6d]"></i>
            Chọn ngành nghề kinh doanh phù hợp
          </li>
          <li class="flex items-center font-semibold">
            <i class="fas fa-check-circle mr-2 text-[#d2ae6d]"></i>
            Chọn mức vốn điều lệ hợp lý với quy mô kinh doanh
          </li>
          <li class="flex items-center font-semibold">
            <i class="fas fa-check-circle mr-2 text-[#d2ae6d]"></i>
            Chuẩn bị giấy tờ pháp lý sao y công chứng của chủ sở hữu/ các thành viên góp vốn/ các cổ đông ...
          </li>
          <li class="flex items-center font-semibold">
            <i class="fas fa-check-circle mr-2 text-[#d2ae6d]"></i>
            Các thông tin để soạn hồ sơ: Loại hình công ty, Tên cty, địa chỉ trụ sở, vốn điều lệ, ngành nghề kinh doanh, tỷ lệ góp vốn...
          </li>
        </ul>

        <!-- -->
        <p class="mt-6 text-center font-bold text-red-600">
          VỚI HƠN 10 NĂM KINH NGHIỆM, MIN LEGAL SẼ GIÚP BẠN THÀNH LẬP NHANH CHÓNG - CHUẨN MỰC VÀ TỐI ƯU CHI PHÍ NHẤT
        </p>
        <div class="mt-4 text-center">
          <button class="grow-continuously rounded-full bg-red-600 px-20 py-3 font-bold text-white">ĐĂNG KÝ NHẬN TƯ VẤN NGAY</button>
        </div>
      </div>
    </div>
  </section>

  <!-- Quy trình thành lập cty -->
  <section id="process" class="mx-auto max-w-6xl bg-[#fff2e2] sm:p-8">
    <div class="mx-auto max-w-4xl">
      <!-- Title -->
      <div class="text-center">
        <h1 class="mb-2 text-4xl font-bold text-yellow-400"></h1>
        <h2 class="font-outline-brown text-center text-3xl font-extrabold text-gray-dark sm:text-5xl">QUY TRÌNH THÀNH LẬP CÔNG TY</h2>
        <hr class="mx-auto mb-8 mt-4 h-1 w-64 rounded border-0 bg-gray-dark" />
      </div>
      <!-- Main Content -->
      <div class="relative rounded-lg bg-[#363435] p-8">
        <div class="justify-center">
          <div class="rounded-lg bg-[#243140] px-4 py-3 text-center text-[#d1ad6c] shadow-lg">
            <h2 class="rounded-sm border border-[#d1ad6c] p-4 text-3xl font-semibold tracking-widest">
              THÀNH LẬP CÔNG TY
              <hr class="mx-auto mb-4 mt-2 h-[1px] w-full rounded border-0 bg-[#d1ad6c]" />
              <span class="text-5xl font-semibold"> QUY TRÌNH </span>
            </h2>
          </div>
        </div>
        <!-- Process Steps -->
        <div class="mt-12 space-y-8">
          <div class="border-2-2 absolute left-[22px] h-[89%] border border-gray-200 border-opacity-50 sm:left-1/2"></div>
          <!-- Step 1 -->
          <div class="flex justify-center sm:space-x-4">
            <div
              class="flex max-w-[300px] flex-col items-center justify-center rounded-md border border-[#a2deb4] border-opacity-65 bg-[#363435] p-4 text-[#a2deb4] sm:w-1/2">
              <h3 class="font-base text-2xl tracking-wide">CHUẨN BỊ HỒ SƠ</h3>
              <hr class="mb-2 mt-4 h-[1px] w-[100%] border-0 bg-[#a2deb4] opacity-50" />
              <ul class="list-disc space-y-2 pl-4">
                <li>Giấy tờ pháp lý sao y công chứng</li>
                <li>Soạn hồ sơ thành lập công ty</li>
              </ul>
              <hr class="mb-2 mt-4 h-[1px] w-[100%] border-0 bg-[#a2deb4] opacity-50" />
              <div
                class="absolute z-20 hidden h-8 w-8 items-center rounded-full bg-[#d1ad6c] shadow-xl sm:right-1/2 sm:flex sm:translate-x-1/2">
                <h1 class="mx-auto text-lg font-semibold text-gray-800">1</h1>
              </div>
              <div
                class="absolute left-2 z-20 flex h-8 w-8 items-center rounded-full bg-[#d1ad6c] shadow-xl sm:right-1/2 sm:hidden sm:translate-x-1/2">
                <h1 class="mx-auto text-lg font-semibold text-gray-800">1</h1>
              </div>
            </div>
            <!-- <div class="z-20 order-1 flex h-8 w-8 items-center rounded-full bg-[#d1ad6c] shadow-xl"> -->
            <div class="hidden w-1/2 sm:block"></div>
          </div>
          <!-- Step 2 -->
          <div class="flex justify-center sm:space-x-4">
            <div class="hidden w-1/2 sm:block"></div>
            <div
              class="flex max-w-[300px] flex-col items-center justify-center rounded-md border border-[#a2deb4] border-opacity-65 bg-[#363435] p-4 text-[#a2deb4] sm:w-1/2">
              <h3 class="font-base text-2xl tracking-wide">SỞ KẾ HOẠCH & ĐẦU TƯ</h3>
              <hr class="mb-2 mt-4 h-[1px] w-[100%] border-0 bg-[#a2deb4] opacity-50" />
              <ul class="list-disc space-y-2 pl-4">
                <li>Nộp hồ sơ qua mạng</li>
                <li>Nhận GPKD từ 5-7 ngày làm việc nếu hồ sơ hợp lệ</li>
                <li>Khắc dấu tròn</li>
              </ul>
              <hr class="mb-2 mt-4 h-[1px] w-[100%] border-0 bg-[#a2deb4] opacity-50" />
              <div
                class="absolute z-20 hidden h-8 w-8 items-center rounded-full bg-[#d1ad6c] shadow-xl sm:right-1/2 sm:flex sm:translate-x-1/2">
                <h1 class="mx-auto text-lg font-semibold text-gray-800">2</h1>
              </div>
              <div
                class="absolute left-2 z-20 flex h-8 w-8 items-center rounded-full bg-[#d1ad6c] shadow-xl sm:right-1/2 sm:hidden sm:translate-x-1/2">
                <h1 class="mx-auto text-lg font-semibold text-gray-800">2</h1>
              </div>
            </div>
          </div>
          <!-- Step 3 -->
          <div class="flex justify-center sm:space-x-4">
            <div
              class="flex max-w-[300px] flex-col items-center justify-center rounded-md border border-[#46cd6e] border-opacity-65 bg-[#363435] p-4 text-[#46cd6e] sm:w-1/2">
              <h3 class="font-base text-2xl tracking-wide">NGÂN HÀNG</h3>
              <hr class="mb-2 mt-4 h-[1px] w-[100%] border-0 bg-[#46cd6e] opacity-50" />
              <ul class="mt-2 list-disc space-y-2 pl-4">
                <li>Đăng ký tài khoản ngân hàng công ty</li>
                <li>Đăng ký tài khoản nộp thuế điện tử</li>
                <li>Thông báo tài khoản ngân hàng với cơ quan thuế</li>
              </ul>
              <hr class="mb-2 mt-4 h-[1px] w-[100%] border-0 bg-[#46cd6e] opacity-50" />
              <div
                class="absolute z-20 hidden h-8 w-8 items-center rounded-full bg-[#d1ad6c] shadow-xl sm:right-1/2 sm:flex sm:translate-x-1/2">
                <h1 class="mx-auto text-lg font-semibold text-gray-800">3</h1>
              </div>
              <div
                class="absolute left-2 z-20 flex h-8 w-8 items-center rounded-full bg-[#d1ad6c] shadow-xl sm:right-1/2 sm:hidden sm:translate-x-1/2">
                <h1 class="mx-auto text-lg font-semibold text-gray-800">3</h1>
              </div>
            </div>
            <div class="hidden w-1/2 sm:block"></div>
          </div>
          <!-- Step 4 -->
          <div class="flex justify-center sm:space-x-4">
            <div class="hidden w-1/2 sm:block"></div>
            <div
              class="flex max-w-[300px] flex-col items-center justify-center rounded-md border border-[#46cd6e] border-opacity-65 bg-[#363435] p-4 text-[#46cd6e] sm:w-1/2">
              <h3 class="font-base text-2xl tracking-wide">CHỮ KÝ SỐ & HÓA ĐƠN ĐIỆN TỬ</h3>
              <hr class="mb-2 mt-4 h-[1px] w-[100%] border-0 bg-[#46cd6e] opacity-50" />
              <ul class="list-disc space-y-2 pl-4">
                <li>Liên hệ nhà cung cấp đăng ký chữ ký số điện tử</li>
                <li>Liên hệ nhà cung cấp đăng ký hoá đơn điện tử</li>
              </ul>
              <hr class="mb-2 mt-4 h-[1px] w-[100%] border-0 bg-[#46cd6e] opacity-50" />
              <div
                class="absolute z-20 hidden h-8 w-8 items-center rounded-full bg-[#d1ad6c] shadow-xl sm:right-1/2 sm:flex sm:translate-x-1/2">
                <h1 class="mx-auto text-lg font-semibold text-gray-800">4</h1>
              </div>
              <div
                class="absolute left-2 z-20 flex h-8 w-8 items-center rounded-full bg-[#d1ad6c] shadow-xl sm:right-1/2 sm:hidden sm:translate-x-1/2">
                <h1 class="mx-auto text-lg font-semibold text-gray-800">4</h1>
              </div>
            </div>
          </div>
          <!-- Step 5 -->
          <div class="flex justify-center sm:space-x-4">
            <div
              class="flex max-w-[300px] flex-col items-center justify-center rounded-md border border-[#45bbff] border-opacity-65 bg-[#363435] p-4 text-[#45bbff] sm:w-1/2">
              <h3 class="font-base text-2xl tracking-wide">CƠ QUAN THUẾ</h3>
              <hr class="mb-2 mt-4 h-[1px] w-[100%] border-0 bg-[#45bbff] opacity-50" />
              <ul class="list-disc space-y-2 pl-4">
                <li>Khai báo thuế ban đầu</li>
                <li>Nộp tờ khai lệ phí môn bài</li>
                <li>Đóng lệ phí môn bài (nếu có)</li>
                <li>Thông báo phát hành hóa đơn điện tử</li>
              </ul>
              <hr class="mb-2 mt-4 h-[1px] w-[100%] border-0 bg-[#45bbff] opacity-50" />
              <div
                class="absolute z-20 hidden h-8 w-8 items-center rounded-full bg-[#d1ad6c] shadow-xl sm:right-1/2 sm:flex sm:translate-x-1/2">
                <h1 class="mx-auto text-lg font-semibold text-gray-800">5</h1>
              </div>
              <div
                class="absolute left-2 z-20 flex h-8 w-8 items-center rounded-full bg-[#d1ad6c] shadow-xl sm:right-1/2 sm:hidden sm:translate-x-1/2">
                <h1 class="mx-auto text-lg font-semibold text-gray-800">5</h1>
              </div>
            </div>
            <div class="hidden w-1/2 sm:block"></div>
          </div>
          <!-- Step 6 -->
          <div class="flex justify-center sm:space-x-4">
            <div class="hidden w-1/2 sm:block"></div>
            <div
              class="flex max-w-[300px] flex-col items-center justify-center rounded-md border border-[#45bbff] border-opacity-65 bg-[#363435] p-4 text-[#45bbff] sm:w-1/2">
              <h3 class="font-base text-2xl tracking-wide">CÁC THỦ TỤC KHÁC</h3>
              <hr class="mb-2 mt-4 h-[1px] w-[100%] border-0 bg-[#45bbff] opacity-50" />
              <ul class="list-disc space-y-2 pl-4">
                <li>Treo Bảng Tên Công Ty tại Trụ Sở Chính</li>
                <li>Chuẩn bị Hợp đồng thuê hoặc mượn Văn phòng hợp lệ</li>
              </ul>
              <div
                class="absolute z-20 hidden h-8 w-8 items-center rounded-full bg-[#d1ad6c] shadow-xl sm:right-1/2 sm:flex sm:translate-x-1/2">
                <h1 class="mx-auto text-lg font-semibold text-gray-800">6</h1>
              </div>
              <div
                class="absolute z-20 hidden h-8 w-8 items-center rounded-full bg-[#d1ad6c] shadow-xl sm:right-1/2 sm:flex sm:translate-x-1/2">
                <h1 class="mx-auto text-lg font-semibold text-gray-800">6</h1>
              </div>
              <hr class="mb-2 mt-4 h-[1px] w-[100%] border-0 bg-[#45bbff] opacity-50" />
            </div>
          </div>
          <!-- Step 7 -->
          <div class="flex justify-center sm:space-x-4">
            <div
              class="flex max-w-[300px] flex-col items-center justify-center rounded-lg border border-[#a1dcff] border-opacity-65 bg-[#363435] p-4 text-[#a1dcff] sm:w-1/2">
              <h3 class="font-base text-2xl tracking-wide">KẾ TOÁN THUẾ</h3>
              <hr class="mb-2 mt-4 h-[1px] w-[100%] border-0 bg-[#a1dcff] opacity-50" />
              <ul class="mt-2 list-disc space-y-2 pl-4">
                <li>Tuyển kế toán hoặc thuê dịch vụ kế toán</li>
                <li>Kê khai và báo cáo thuế hàng quý, năm kể từ tháng được cấp GPKD.</li>
                <li>(Vẫn phải nộp báo cáo thuế nếu doanh nghiệp chưa phát sinh doanh thu)</li>
              </ul>
              <hr class="mb-2 mt-4 h-[1px] w-[100%] border-0 bg-[#a1dcff] opacity-50" />
              <div
                class="absolute z-20 hidden h-8 w-8 items-center rounded-full bg-[#d1ad6c] shadow-xl sm:right-1/2 sm:flex sm:translate-x-1/2">
                <h1 class="mx-auto text-lg font-semibold text-gray-800">7</h1>
              </div>
              <div
                class="absolute left-2 z-20 flex h-8 w-8 items-center rounded-full bg-[#d1ad6c] shadow-xl sm:right-1/2 sm:hidden sm:translate-x-1/2">
                <h1 class="mx-auto text-lg font-semibold text-gray-800">7</h1>
              </div>
            </div>
            <div class="hidden w-1/2 sm:block"></div>
          </div>
          <!-- Step 8 -->
          <div class="flex justify-center sm:space-x-4">
            <div class="hidden w-1/2 sm:block"></div>
            <div
              class="flex max-w-[300px] flex-col items-center justify-center rounded-lg border border-[#a1dcff] border-opacity-65 bg-[#363435] p-4 text-[#a1dcff] sm:w-1/2">
              <h3 class="font-base text-2xl tracking-wide">LAO ĐỘNG & BẢO HIỂM XÃ HỘI</h3>
              <hr class="mb-2 mt-4 h-[1px] w-[100%] border-0 bg-[#a1dcff] opacity-50" />
              <ul class="mt-2 list-disc space-y-2 pl-4">
                <li>Khai báo lao động & Đăng ký Bảo Hiểm Xã Hội khi có phát sinh hợp đồng lao động từ 1 tháng trở lên</li>
              </ul>
              <hr class="mb-2 mt-4 h-[1px] w-[100%] border-0 bg-[#a1dcff] opacity-50" />
              <div
                class="absolute z-20 hidden h-8 w-8 items-center rounded-full bg-[#d1ad6c] shadow-xl sm:right-1/2 sm:flex sm:translate-x-1/2">
                <h1 class="mx-auto text-lg font-semibold text-gray-800">8</h1>
              </div>
              <div
                class="absolute left-2 z-20 flex h-8 w-8 items-center rounded-full bg-[#d1ad6c] shadow-xl sm:right-1/2 sm:hidden sm:translate-x-1/2">
                <h1 class="mx-auto text-lg font-semibold text-gray-800">8</h1>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Đội ngũ kế toán uy tín hàng đầu -->
  <section id="team" class="mx-auto max-w-6xl bg-[#ffe5c6] py-12">
    <div class="mx-auto max-w-5xl text-center">
      <h2 class="font-outline-brown text-center text-2xl font-extrabold text-gray-dark md:text-4xl">ĐỘI NGŨ KẾ TOÁN UY TÍN HÀNG ĐẦU</h2>
      <hr class="mx-auto mb-8 mt-4 h-1 w-64 rounded border-0 bg-gray-dark" />
      <!-- Kế Toán Trưởng -->
      <div class="m-8 bg-white p-6">
        <div class="flex flex-col items-center gap-4 sm:flex-row">
          <div class="sm:w-2/5">
            <img
              src="https://placehold.co/300x400"
              alt="Image of Kế Toán Trưởng - Nguyễn Văn Thìn"
              class="border-4 border-double border-[#d2ae6d]" />
          </div>
          <div class="sm:w-3/5">
            <h3 class="mb-4 flex w-fit items-center bg-[#d2ae6d] px-4 py-1 text-base font-bold text-yellow-900">
              <div class="mr-2 flex h-4 w-4 items-center justify-center bg-black text-xl font-extrabold leading-4 text-[#d2ae6d]">
                <p class="-translate-y-0.5">+</p>
              </div>
              KẾ TOÁN TRƯỞNG - NGUYỄN VĂN THÌN
            </h3>
            <ul class="checkbox-ul mb-4 text-left text-sm font-bold text-gray-700">
              <li class="mb-2 flex items-center">Hơn 15 năm kinh nghiệm kế toán và thuế</li>
              <li class="mb-2 flex items-center">Hội viên hội kế toán TP HCM</li>
              <li class="mb-2 flex items-center">Chuyên viên đại lý thuế</li>
              <li class="mb-2 flex items-center">Đã xử lý hơn 2000+ hồ sơ Thành lập công ty, doanh nghiệp trong nước và ngoài nước</li>
            </ul>
            <div class="grid grid-cols-2 gap-4">
              <img src="https://placehold.co/200x100" alt="Certificate Image 1" class="" />
              <img src="https://placehold.co/200x100" alt="Certificate Image 2" class="" />
              <img src="https://placehold.co/200x100" alt="Certificate Image 3" class="" />
            </div>
          </div>
        </div>
      </div>

      <!-- Cố Vấn Pháp Luật -->
      <div class="m-8 bg-white p-6">
        <div class="flex flex-col items-center gap-4 sm:flex-row">
          <div class="sm:w-2/5">
            <img
              src="https://placehold.co/300x400"
              alt="Image of Cố Vấn Pháp Luật - Ths. Đỗ Xuân Nam"
              class="border-4 border-double border-[#d2ae6d]" />
          </div>
          <div class="sm:w-3/5">
            <h3 class="mb-4 flex w-fit items-center bg-[#d2ae6d] px-4 py-1 text-base font-bold text-yellow-900">
              <div class="mr-2 flex h-4 w-4 items-center justify-center bg-black text-xl font-extrabold leading-4 text-[#d2ae6d]">
                <p class="-translate-y-0.5">+</p>
              </div>
              CỐ VẤN PHÁP LUẬT - THS. ĐỖ XUÂN NAM
            </h3>
            <ul class="checkbox-ul mb-4 text-left text-sm text-gray-700">
              <li class="mb-2 flex items-center">Hơn 20 năm kinh nghiệm về luật</li>
              <li class="mb-2 flex items-center">Hội viên hội luật gia Việt Nam</li>
              <li class="mb-2 flex items-center">Hòa giải viên LĐ TP.HCM</li>
              <li class="mb-2 flex items-center">Hội thẩm toà án nhân dân Q. Phú Nhuận</li>
            </ul>
            <div class="grid grid-cols-2 gap-4">
              <img src="https://placehold.co/200x100" alt="Certificate Image 1" class="" />
              <img src="https://placehold.co/200x100" alt="Certificate Image 2" class="" />
              <img src="https://placehold.co/200x100" alt="Certificate Image 3" class="" />
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="" id="contact">
    <div class="mx-auto max-w-6xl bg-[#ffe5c6]">
      <!--  -->
      <div class="text-brown-800 bg-[#d2ae6d] p-4 text-center">
        <div class="flex flex-col items-center justify-center space-x-4">
          <div class="flex items-center space-x-2 pb-2">
            <!-- <i class="fas fa-handshake fa-lg"></i> -->
            <p class="px-4 text-sm font-semibold text-gray-800">
              Mọi vấn đề thắc mắc hay thủ tục pháp lý MIN LEGAL đều có cố vấn xử lý trọn tru. Việc chọn đúng đơn vị thành lập công ty uy
              tín - chất lượng là điều rất quan trọng để tránh các thủ tục phức tạp, cũng như các chi phí phát sinh về sau. ĐỪNG lo lắng
              hay để MIN LEGAL giúp bạn, liên hệ Hotline để được tư vấn MIỄN PHÍ ngay.
            </p>
          </div>
          <div class="w-full">
            <button class="grow-continuously rounded-full bg-gray-dark px-20 py-2 font-semibold text-[#d2ae6d]">
              HOTLINE TƯ VẤN 24/24: 0938.837.724
            </button>
          </div>
        </div>
      </div>

      <!-- Đăng ký thành lập trọn gói -->
      <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
        <!-- Left Side -->
        <div class="flex flex-col items-center justify-center rounded-lg p-6">
          <h3 class="mb-4 text-2xl font-bold text-yellow-900">ĐĂNG KÝ THÀNH LẬP TRỌN GÓI</h3>
          <p class="mb-4 text-3xl font-bold text-red-600">
            <span class="text-base underline">chỉ từ</span>1.299.000đ/<span class="mb-4 text-base font-bold text-red-600">không phát sinh</span>
          </p>
          <div class="m-4 flex rounded-lg border-2 border-red-700 p-4">
            <div class="flex-1">
              <p class="mb-1 p-2 text-base font-bold text-red-600">DỊCH VỤ CHUẨN MỰC</p>
              <ul class="mb-4 ml-2 text-left text-sm font-semibold text-gray-700">
                <li class="mb-2">
                  <i class="fas fa-check-circle mr-1 text-[#f05b00]"></i>Tư vấn
                  <span class="font-bold text-red-600"> MIỄN PHÍ </span> trọn đời
                </li>
                <li class="mb-2">
                  <i class="fas fa-check-circle mr-1 text-[#f05b00]"></i> Khách
                  <span class="font-bold text-red-600"> KHÔNG ĐI LẠI </span> nhiều lần
                </li>
                <li class="mb-2">
                  <i class="fas fa-check-circle mr-1 text-[#f05b00]"></i> Tối ưu chi phí
                  <span class="font-bold text-red-600"> THẤP NHẤT</span>
                </li>
                <li class="mb-2">
                  <i class="fas fa-check-circle mr-1 text-[#f05b00]"></i> <span class="font-bold text-red-600"> Chỉ 3-4 ngày</span> có KẾT
                  QUẢ
                </li>
              </ul>
            </div>
            <div class="flex-1">
              <button class="m-2 w-[87%] bg-gray-900 p-1 text-sm font-bold text-white">TẶNG NGAY</button>
              <ul class="mb-4 ml-2 text-left text-sm font-semibold text-gray-700">
                <li class="mb-2">
                  <i class="fas fa-check-circle mr-1 text-[#f05b00]"></i>Miễn phí báo cáo thuế tháng đầu
                  <span class="font-bold text-red-600"> trị giá 1500k</span> (áp dụng gói HOÀN HẢO)
                </li>
              </ul>
            </div>
          </div>
          <p class="text-sm font-semibold text-gray-700">Ưu đãi chỉ còn kéo dài trong:</p>
          <div class="flex justify-center gap-2 text-lg font-bold text-red-600">
            <div>00</div>
            <div>00</div>
            <div>00</div>
          </div>
        </div>

        <!-- Right Side -->
        <div class="m-10 rounded-lg bg-gray-dark text-white">
          <h3 class="font-boldj m-4 mb-0 ml-6 text-left text-base font-semibold">Bạn cần tư vấn chuyên sâu</h3>
          <p class="m-2 mr-6 text-right text-lg font-bold">THÀNH LẬP CÔNG TY</p>
          <hr class="mx-auto mt-4 h-0.5 w-full rounded border-0 bg-white" />
          <div class="p-6 shadow-lg">
            <p class="mb-4 text-left text-base font-semibold">Để lại thông tin MIN LEGAL liên hệ tư vấn ngay!!</p>
            <?= \ymaker\newsletter\frontend\widgets\NewsletterForm::widget(); ?>
          </div>
        </div>
      </div>
    </div>
  </section>
  <footer class="bg-gray-950 pt-4">
    <img src="https://placehold.co/100x100" class="mx-auto mb-4" />
    <p class="px-6 text-center text-[#d2ae6d] md:px-24 lg:px-48 xl:px-96 2xl:px-[450px]">
      "Min Legal với gần 10 năm kinh nghiệm hoạt động trong lĩnh vực tư vấn và hỗ trợ pháp lý cho cá nhân và doanh nghiệp trong và ngoài
      nước. Chúng tôi tự hào là một trong những đơn vị tư vấn uy tín hàng đầu tại TP. Hồ Chí Minh và trên toàn quốc."
    </p>
    <div class="mx-auto flex max-w-6xl flex-col items-start justify-between space-y-8 p-10 md:flex-row md:space-x-10 md:space-y-0">
      <!-- Left column: Contact Information -->
      <div class="flex-[1_1_45%] space-y-4 text-white">
        <h2 class="text-lg font-bold text-[#d2ae6d]">THÔNG TIN LIÊN HỆ</h2>
        <ul class="space-y-2">
          <li class="flex items-start space-x-2">
            <i class="fa-solid fa-house"></i>
            <span>Trụ sở chính: 456 Xô Viết Nghệ Tĩnh, P.25, Q. Bình Thạnh, TP. HCM</span>
          </li>
          <li class="flex items-start space-x-2">
            <i class="fas fa-map-marker-alt"></i>
            <span>Văn phòng 1: Tower B, Masteri Centre Point (Vinhomes Grand Park), P. Long Bình, Tp Thủ Đức, Tp HCM</span>
          </li>
          <li class="flex items-start space-x-2">
            <i class="fas fa-map-marker-alt"></i>
            <span>Văn phòng 2: 371/47 Trường Chinh, P.17, Q. Tân Bình, TP. HCM</span>
          </li>
          <li class="flex items-start space-x-2">
            <i class="fas fa-phone-alt"></i>
            <span>Hotline: 0938.837.724</span>
          </li>
          <li class="flex items-start space-x-2">
            <i class="fas fa-globe"></i>
            <span>Website: dichvuminlegal.com</span>
          </li>
        </ul>
      </div>
      <!-- Center column: Services -->
      <div class="flex-[1_1_30%] space-y-4 text-white">
        <h2 class="text-lg font-bold text-[#d2ae6d]">DỊCH VỤ CUNG CẤP</h2>
        <ul class="space-y-2">
          <li class="flex items-center space-x-2">
            <i class="fas fa-check-circle mr-1 text-[#d2ae6d]"></i>
            <span>Thành lập công ty</span>
          </li>
          <li class="flex items-center space-x-2">
            <i class="fas fa-check-circle mr-1 text-[#d2ae6d]"></i>
            <span>Thành lập hộ kinh doanh</span>
          </li>
          <li class="flex items-center space-x-2">
            <i class="fas fa-check-circle mr-1 text-[#d2ae6d]"></i>
            <span>Thành lập công ty có vốn nước ngoài</span>
          </li>
          <li class="flex items-center space-x-2">
            <i class="fas fa-check-circle mr-1 text-[#d2ae6d]"></i>
            <span>Thay đổi giấy phép kinh doanh</span>
          </li>
          <li class="flex items-center space-x-2">
            <i class="fas fa-check-circle mr-1 text-[#d2ae6d]"></i>
            <span class="bg-blue-600/75">Đăng Ký Bảo Hộ Nhãn Hiệu</span>
          </li>
          <li class="flex items-center space-x-2">
            <i class="fas fa-check-circle mr-1 text-[#d2ae6d]"></i>
            <span>Dịch vụ khác</span>
          </li>
        </ul>
      </div>
      <!-- Right column: Fanpages  -->
      <div class="flex-[1_1_25%]">
        <h2 class="text-lg font-bold text-[#d2ae6d]">FANPAGES</h2>
      </div>
    </div>
  </footer>
  <div class="fixed bottom-4 left-1/2 -translate-x-1/2 transform">
    <button class="grow-continuously rounded-full bg-blue-700 px-14 py-2 font-bold text-white shadow-lg">ĐĂNG KÝ TƯ VẤN</button>
  </div>
  <script>
    document.getElementById('menu-toggle').addEventListener('click', function() {
      var menu = document.getElementById('mobile-menu')
      if (menu.classList.contains('hidden')) {
        menu.classList.remove('hidden')
      } else {
        menu.classList.add('hidden')
      }
    })
  </script>


  <?php if (Yii::$app->session->hasFlash('error') || Yii::$app->session->hasFlash('success')): ?>
    <?php
    $flashType = Yii::$app->session->hasFlash('error') ? 'error' : 'success';
    $flashMessages = Yii::$app->session->getFlash($flashType);
    $modalTitle = $flashType === 'error' ? 'Đăng ký thất bại' : 'Đăng ký thành công';
    $modalIconColor = $flashType === 'error' ? 'text-red-600' : 'text-green-600';
    $modalBgColor = $flashType === 'error' ? 'bg-red-100' : 'bg-green-100';
    $modalIconPath = $flashType === 'error' ? 'M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z' : 'M5 13l4 4L19 7';
    ?>
    <div id="modal-alert" class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
      <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

      <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
          <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
            <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
              <div class="sm:flex sm:items-start">
                <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full <?= $modalBgColor ?> sm:mx-0 sm:h-10 sm:w-10">
                  <svg class="h-6 w-6 <?= $modalIconColor ?>" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="<?= $modalIconPath ?>" />
                  </svg>
                </div>
                <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                  <h3 class="text-lg font-semibold leading-6 text-gray-900" id="modal-title"><?= $modalTitle ?></h3>
                  <div class="mt-2">
                    <?php foreach ($flashMessages as $message): ?>
                      <p class="text-base text-gray-500"><?= implode(" ", $message) ?></p>
                    <?php endforeach; ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
              <button id="close-modal" type="button" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">x</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php endif; ?>

  <script>
    document.getElementById('close-modal').addEventListener('click', function() {
      document.getElementById('modal-alert').style.display = 'none';
    });
  </script>
</body
  </html>