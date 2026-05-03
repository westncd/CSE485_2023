<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TheLoai;
use App\Models\TacGia;
use App\Models\BaiViet;

class DataSeeder extends Seeder
{
    public function run(): void
    {
        // ==================== THỂ LOẠI ====================
        $nhacViet = TheLoai::create(['ten_tloai' => 'Nhạc Việt']);
        $nhacTre = TheLoai::create(['ten_tloai' => 'Nhạc trẻ']);
        $nhacQuocTe = TheLoai::create(['ten_tloai' => 'Nhạc quốc tế']);
        $rock = TheLoai::create(['ten_tloai' => 'Rock']);
        $nhacCachMang = TheLoai::create(['ten_tloai' => 'Nhạc cách mạng']);
        $pop = TheLoai::create(['ten_tloai' => 'Pop']);

        // ==================== TÁC GIẢ ====================
        $phanManhQuynh = TacGia::create(['ten_tgia' => 'Phan Mạnh Quỳnh']);
        $trucNhan = TacGia::create(['ten_tgia' => 'Trúc Nhân']);
        $yVan = TacGia::create(['ten_tgia' => 'Y Vân']);
        $trinhCongSon = TacGia::create(['ten_tgia' => 'Trịnh Công Sơn']);
        $vanCao = TacGia::create(['ten_tgia' => 'Văn Cao']);
        $vungLeo = TacGia::create(['ten_tgia' => 'Vũng Leo']);
        $doTrungQuan = TacGia::create(['ten_tgia' => 'Đỗ Trung Quân']);
        $nguyenDinh_thi = TacGia::create(['ten_tgia' => 'Nguyễn Đình Thi']);
        $lordi = TacGia::create(['ten_tgia' => 'Lordi']);
        $metallica = TacGia::create(['ten_tgia' => 'Metallica']);
        $freddieMercury = TacGia::create(['ten_tgia' => 'Freddie Mercury']);
        $kellyClarkson = TacGia::create(['ten_tgia' => 'Kelly Clarkson']);
        $camLy = TacGia::create(['ten_tgia' => 'Cẩm Ly']);

        // ==================== BÀI VIẾT ====================
        BaiViet::create([
            'tieude' => 'Cảm nhận về bài hát Cây và gió',
            'ten_bhat' => 'Cây, lá và gió',
            'ma_tloai' => $nhacTre->ma_tloai,
            'tomtat' => 'Bài hát kể về câu chuyện tình yêu giữa cây, lá và gió - một câu chuyện buồn về sự chia ly.',
            'noidung' => 'Cây, lá và gió là một bài hát nổi tiếng với giai điệu nhẹ nhàng, da diết. Bài hát kể về mối quan hệ giữa ba nhân vật: Cây yêu Lá, nhưng Gió lại mang Lá đi xa. Đó là câu chuyện muôn thuở về tình yêu và sự mất mát.',
            'ma_tgia' => $phanManhQuynh->ma_tgia,
            'ngayviet' => '2023-09-15',
            'hinhanh' => '/images/songs/cayvagio.jpg',
        ]);

        BaiViet::create([
            'tieude' => 'Cảm nhận về Ôi Cuộc Sống Mến Thương',
            'ten_bhat' => 'Ôi Cuộc Sống Mến Thương',
            'ma_tloai' => $nhacViet->ma_tloai,
            'tomtat' => 'Ca khúc ngợi ca cuộc sống tươi đẹp, tình yêu thương giữa con người.',
            'noidung' => 'Ôi Cuộc Sống Mến Thương là bài hát mang đến thông điệp tích cực về cuộc sống. Giai điệu vui tươi, lạc quan giúp người nghe cảm nhận được vẻ đẹp của cuộc sống hàng ngày và trân trọng những điều giản dị xung quanh.',
            'ma_tgia' => $trucNhan->ma_tgia,
            'ngayviet' => '2023-09-20',
            'hinhanh' => '/images/songs/csmt.jpg',
        ]);

        BaiViet::create([
            'tieude' => 'Cảm nhận về bài hát Lòng mẹ',
            'ten_bhat' => 'Lòng mẹ',
            'ma_tloai' => $nhacViet->ma_tloai,
            'tomtat' => 'Bài hát nổi tiếng của nhạc sĩ Y Vân, ngợi ca tình mẹ thiêng liêng.',
            'noidung' => 'Lòng Mẹ là một trong những ca khúc bất hủ của nền âm nhạc Việt Nam. Bài hát với giai điệu trữ tình, sâu lắng đã chạm đến trái tim biết bao thế hệ người Việt. Ca từ giản dị nhưng chứa đựng tình cảm sâu sắc về tình mẫu tử.',
            'ma_tgia' => $yVan->ma_tgia,
            'ngayviet' => '2023-10-01',
            'hinhanh' => '/images/songs/longme.jpg',
        ]);

        BaiViet::create([
            'tieude' => 'Cảm nhận về bài hát Phôi pha',
            'ten_bhat' => 'Phôi pha',
            'ma_tloai' => $nhacViet->ma_tloai,
            'tomtat' => 'Ca khúc bất hủ của nhạc sĩ Trịnh Công Sơn về sự phôi pha của thời gian.',
            'noidung' => 'Phôi Pha là một trong những sáng tác nổi tiếng nhất của Trịnh Công Sơn. Bài hát mang đậm triết lý về cuộc đời, về sự phù du của kiếp người. Giai điệu nhẹ nhàng, buồn man mác khiến người nghe phải suy ngẫm về ý nghĩa của cuộc sống.',
            'ma_tgia' => $trinhCongSon->ma_tgia,
            'ngayviet' => '2023-10-05',
            'hinhanh' => '/images/songs/phoipha.jpg',
        ]);

        BaiViet::create([
            'tieude' => 'Cảm nhận về Nơi tình yêu bắt đầu',
            'ten_bhat' => 'Nơi tình yêu bắt đầu',
            'ma_tloai' => $nhacTre->ma_tloai,
            'tomtat' => 'Bài hát lãng mạn về nơi bắt đầu của tình yêu đôi lứa.',
            'noidung' => 'Nơi tình yêu bắt đầu là ca khúc nhạc trẻ với giai điệu ngọt ngào, lãng mạn. Bài hát gợi nhớ về những khoảnh khắc đầu tiên của tình yêu, nơi hai người gặp nhau và câu chuyện tình bắt đầu.',
            'ma_tgia' => $phanManhQuynh->ma_tgia,
            'ngayviet' => '2023-10-10',
            'hinhanh' => '/images/songs/noitinhyeubatdau.jpg',
        ]);

        BaiViet::create([
            'tieude' => 'Cảm nhận về bài hát Vết mưa',
            'ten_bhat' => 'Vết mưa',
            'ma_tloai' => $nhacTre->ma_tloai,
            'tomtat' => 'Ca khúc buồn về những kỷ niệm đã qua, như vết mưa trên kính cửa sổ.',
            'noidung' => 'Vết Mưa là bài hát gợi nhiều cảm xúc về sự chia ly và nỗi nhớ. Giai điệu da diết, ca từ sâu lắng khiến người nghe không khỏi bồi hồi nhớ về những kỷ niệm đẹp đã trôi qua theo thời gian.',
            'ma_tgia' => $camLy->ma_tgia,
            'ngayviet' => '2023-10-15',
            'hinhanh' => '/images/songs/vetmua.jpg',
        ]);

        BaiViet::create([
            'tieude' => 'Cảm nhận về bài hát Quê hương',
            'ten_bhat' => 'Quê hương',
            'ma_tloai' => $nhacViet->ma_tloai,
            'tomtat' => 'Bài hát bất hủ về tình yêu quê hương đất nước.',
            'noidung' => 'Quê Hương là ca khúc quen thuộc với mọi người Việt Nam. Bài hát vẽ nên bức tranh quê hương thanh bình với cánh đồng lúa, dòng sông, lũy tre làng. Ca từ giản dị mà sâu sắc, gợi lên tình yêu quê hương trong lòng mỗi người.',
            'ma_tgia' => $doTrungQuan->ma_tgia,
            'ngayviet' => '2023-10-20',
            'hinhanh' => '/images/songs/quehuong.jpg',
        ]);

        BaiViet::create([
            'tieude' => 'Cảm nhận về bài hát Đất nước',
            'ten_bhat' => 'Đất nước',
            'ma_tloai' => $nhacCachMang->ma_tloai,
            'tomtat' => 'Ca khúc hào hùng về đất nước Việt Nam anh hùng.',
            'noidung' => 'Đất Nước là bài hát mang âm hưởng hào hùng, thể hiện niềm tự hào dân tộc. Bài hát ngợi ca vẻ đẹp của đất nước và con người Việt Nam qua bao thăng trầm lịch sử, luôn kiên cường và bất khuất.',
            'ma_tgia' => $nguyenDinh_thi->ma_tgia,
            'ngayviet' => '2023-10-25',
            'hinhanh' => '/images/songs/datnuoc.jpg',
        ]);

        BaiViet::create([
            'tieude' => 'Cảm nhận về Hard Rock Hallelujah',
            'ten_bhat' => 'Hard Rock Hallelujah',
            'ma_tloai' => $rock->ma_tloai,
            'tomtat' => 'Ca khúc rock mạnh mẽ của ban nhạc Lordi, chiến thắng Eurovision 2006.',
            'noidung' => 'Hard Rock Hallelujah là ca khúc đã giúp Lordi giành chiến thắng tại Eurovision Song Contest 2006. Với phong cách hard rock mạnh mẽ và hình ảnh quái vật đặc trưng, bài hát đã tạo nên một dấu ấn khó quên trong lịch sử âm nhạc châu Âu.',
            'ma_tgia' => $lordi->ma_tgia,
            'ngayviet' => '2023-11-01',
            'hinhanh' => '/images/songs/hardrock.jpg',
        ]);

        BaiViet::create([
            'tieude' => 'Cảm nhận về The Unforgiven',
            'ten_bhat' => 'The Unforgiven',
            'ma_tloai' => $rock->ma_tloai,
            'tomtat' => 'Ca khúc kinh điển của Metallica về sự tự do và tha thứ.',
            'noidung' => 'The Unforgiven là một trong những ballad rock hay nhất mọi thời đại của Metallica. Bài hát kể về cuộc đời một con người bị giam cầm bởi xã hội từ khi sinh ra, và cuộc đấu tranh để tìm lại bản thân. Giai điệu chuyển từ nhẹ nhàng sang mạnh mẽ tạo nên cảm xúc mãnh liệt.',
            'ma_tgia' => $metallica->ma_tgia,
            'ngayviet' => '2023-11-05',
            'hinhanh' => '/images/songs/TheUnforgiven.jpg',
        ]);

        BaiViet::create([
            'tieude' => 'Cảm nhận về Love Me Like There\'s No Tomorrow',
            'ten_bhat' => 'Love Me Like There\'s No Tomorrow',
            'ma_tloai' => $pop->ma_tloai,
            'tomtat' => 'Ca khúc đầy cảm xúc của Freddie Mercury về tình yêu mãnh liệt.',
            'noidung' => 'Love Me Like There\'s No Tomorrow là bài hát solo của Freddie Mercury, thể hiện khát khao được yêu thương hết mình. Giọng hát đầy nội lực của Mercury kết hợp với giai điệu pop rock tạo nên một ca khúc đầy cảm xúc về tình yêu và sự sống.',
            'ma_tgia' => $freddieMercury->ma_tgia,
            'ngayviet' => '2023-11-10',
            'hinhanh' => '/images/songs/loveme.jpg',
        ]);

        BaiViet::create([
            'tieude' => 'Cảm nhận về I\'m Stronger',
            'ten_bhat' => 'I\'m stronger',
            'ma_tloai' => $pop->ma_tloai,
            'tomtat' => 'Ca khúc truyền cảm hứng của Kelly Clarkson về sức mạnh nội tâm.',
            'noidung' => 'Stronger (What Doesn\'t Kill You) là bài hát mang thông điệp mạnh mẽ về sự vượt qua khó khăn. Kelly Clarkson với giọng hát đầy nội lực đã truyền tải thông điệp rằng những thử thách trong cuộc sống sẽ giúp chúng ta trở nên mạnh mẽ hơn.',
            'ma_tgia' => $kellyClarkson->ma_tgia,
            'ngayviet' => '2023-11-15',
            'hinhanh' => '/images/songs/stronger.jpg',
        ]);

        BaiViet::create([
            'tieude' => 'Cảm nhận về bài hát Người thầy',
            'ten_bhat' => 'Người thầy',
            'ma_tloai' => $nhacViet->ma_tloai,
            'tomtat' => 'Ca khúc tri ân những người thầy, người cô đã dìu dắt chúng ta.',
            'noidung' => 'Người Thầy là bài hát đầy ý nghĩa, thể hiện lòng biết ơn sâu sắc đối với những người thầy, người cô. Bài hát gợi nhớ về những ngày tháng cắp sách đến trường, về những bài học quý giá mà thầy cô đã truyền dạy.',
            'ma_tgia' => $camLy->ma_tgia,
            'ngayviet' => '2023-11-20',
            'hinhanh' => '/images/songs/nguoithay.jpg',
        ]);
    }
}
