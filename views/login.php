<style>
    html,
    body {
        overflow-y: hidden;
    }

    .background_left {
        background-image: url(vendor/img/connect.svg);
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>
<main class="grid grid-cols-12">
    <div class="col-span-7 phone:hidden">
        <div class="flex flex-col justify-between h-full">
            <?php
            if ($_SERVER['HTTP_HOST'] == 'fpoly.onebis.vn') { ?>
                <div class="w-full  flex-1  flex items-center justify-center">
                    <img class="w-[500px] h-[full]" src="vendor/img/logo_fpoly.svg" class="">
                </div>
            <?php } else { ?>
                <div class="h-[full]  flex-1 flex items-center justify-center">
                    <img class="max-w-[600px] tablet:max-w-[400px] h-[full]" src="vendor/img/collectionpro.svg" alt="">
                </div>
            <?php }
            ?>

            <div class="background_left w-full h-[200px]">

            </div>
        </div>

    </div>
    <div class="col-span-5 phone:col-span-12 relative h-screen font-sans bg_main">
        <div class="container mx-auto h-full">
            <div class="flex flex-col justify-center items-center h-full pb-36">
                <div class="mb-6 phone:mb-18">
                    <?php
                    if ($_SERVER['HTTP_HOST'] == 'fpoly.onebis.vn') { ?>
                        <img src="vendor/img/logo_tpst.svg" class="w-[250px] tablet:w-[180px]  px-4 py-3 rounded-lg">
                    <?php } else { ?>
                        <img src="vendor/img/logo.svg" class="w-[250px] tablet:w-[180px]  bg-white px-4 py-3 rounded-lg">

                    <?php }
                    ?>

                </div>
                <div class="w-full max-w-md tablet:flex tablet:justify-center">
                    <div class="max-w-xl tablet:max-w-xs p-4 bg-none border border-none rounded-lg shadow-[rgba(239,160,255)_0px_0px_6px] w-full">
                        <p id="title_login" class="text-[#e8b3fd] mb-10 font-thin text-center text-xl">Vui lòng đăng nhập</p>
                        <div>
                            <input class="appearance-none block w-full text-[17px] mb-10 text-white border-b border-[#f568e3] px-4 focus:outline-none pb-2 bg-transparent text-white" id="sodienthoai" name="sodienthoai" type="text" placeholder="Số điện thoại" aria-label="msdn" autocomplete="off">
                        </div>
                        <div>
                            <input class="appearance-none block w-full text-[17px] text-white border-b border-[#f568e3] px-4 focus:outline-none pb-2 bg-transparent" id="matkhau" name="password" type="password" placeholder="Mật khẩu" aria-label="password" autocomplete="off">
                        </div>

                        <div class="mt-4 items-center text-right">
                            <button id="btn_login" class="px-4 py-1 mt-10 mb-4 text-white font-light text-[17px] tracking-wider bg-[#773181] rounded" onclick="login()">Đăng nhập</button>
                        </div>
                    </div>
                </div>

            </div>
            <div class="absolute left-0 bottom-5 flex justify-center w-full">
                <span class="text-[#d77dcf] text-lg px-3 phone:text-center">Một sản phẩm của <a target="_blank" href="https://tpsoftct.vn/">TPSoft</a> © 2017 - <?php echo date("Y"); ?> • Thông tin hỗ trợ: 0919 118 187 - Nhựt Tân</span>
            </div>


        </div>

    </div>
</main>
<script>
    var btn_login = document.getElementById("matkhau");
    btn_login.addEventListener("keypress", function(event) {
        if (event.key === "Enter") {
            event.preventDefault();
            login()
        }
    });
    var btn_login_sdt = document.getElementById("sodienthoai");
    btn_login_sdt.addEventListener("keypress", function(event) {
        if (event.key === "Enter") {
            event.preventDefault();
            login()
        }
    });
</script>