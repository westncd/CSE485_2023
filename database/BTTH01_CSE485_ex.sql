
/* a, Liệt kê các bài viết về các bài hát thuộc thể loại trữ tình*/
SELECT * FROM baiviet WHERE ma_tloai = 2;

/* b, Liệt kê các bài viết cảu tác giả "Nhacvietplus"*/
SELECT * FROM baiviet INNER JOIN tacgia ON baiviet.ma_tgia = tacgia.ma_tgia WHERE ten_tgia = "Nhacvietplus";

/*c, Liệt kê các thể loại nhạc chưa có bài viết cảm nhận nào*/
SELECT theloai.ten_tloai
FROM theloai
LEFT JOIN baiviet ON theloai.ma_tloai = baiviet.ma_tloai
WHERE baiviet.ma_bviet IS NULL;

/*d, Liệt kê các bài viết với các thông tin sau: mã bài viết, tên bài viết, tên bài hát, tên tác giả, tên thể loại, ngày viết*/
SELECT ma_bviet, ten_bhat,ten_tgia,ten_tloai,ngayviet from tacgia,baiviet,theloai 
where theloai.ma_tloai=baiviet.ma_tloai and tacgia.ma_tgia = baiviet.ma_tgia;

/*e, tìm thể loại có số bài viết nhiều nhất*/
SELECT theloai.ten_tloai 
FROM theloai 
INNER JOIN baiviet ON theloai.ma_tloai = baiviet.ma_tloai 
GROUP BY theloai.ten_tloai 
ORDER BY COUNT(baiviet.ma_bviet) DESC 
LIMIT 2;


/*f, liệt kê 2 tác giả có số bài viết nhiều nhất */
SELECT p.ten_tgia, COUNT(*) ten_bhat
FROM tacgia as p
JOIN baiviet AS o ON p.ma_tgia =o.ma_tgia
GROUP BY p.ten_tgia
ORDER BY ten_bhat DESC
LIMIT 2;

/*g, Liệt kê các bài viết về các bài hát có tựa bài hát chứa một trong các từ 'yêu', 'thương', 'anh', 'em'*/
SELECT * FROM baiviet 
WHERE tieude like '%yêu%' OR tieude like '%thương%' OR tieude like '%anh%' OR tieude like '%em%'

/*h, Liệt kê các bài viết về các bài hát có tiêu đề bài viết hơặc tựa bài hát chứa một trong các từ 'yêu', 'thương', 'anh', 'em'*/
SELECT * FROM baiviet 
WHERE tieude like '%yêu%' OR tieude like '%thương%' OR tieude like '%anh%' OR tieude like '%em%'
OR ten_bhat like '%yêu%' OR ten_bhat like '%thương%' OR ten_bhat like '%anh%' OR ten_bhat like '%em%'

/*i, Tạo một view có tên vw_Music để hiện thị thông tin về danh sách các bài viết kèm theo Tên thể loại và tên tác giả*/
CREATE VIEW vw_Music AS
SELECT baiviet.ma_bviet, baiviet.tieude, baiviet.ten_bhat, theloai.ten_tloai, tacgia.ten_tgia
FROM baiviet
LEFT JOIN theloai ON baiviet.ma_tloai = theloai.ma_tloai
LEFT JOIN tacgia ON baiviet.ma_tgia = tacgia.ma_tgia;

/*j, Tạo 1 thủ tục có tên sp_DSBaiViet với tham số truyền vào là Tên thể loại và trả về danh sách Bài viết của thể loại đó. 
Nếu thể loại không tồn tại thì hiển thị thông báo lỗi*/
CREATE PROCEDURE sp_DSBaiViet(IN pTenTloai VARCHAR(255))

/*k, Thêm mới cột SLBaiViet vào bảng theloai. Tạo một trigger có tên tg_CapNhatTheLoaiđể khi thêm/sứa/xoá bài viết thì số lượng bài viết trong bảng theloai được cập nhật theo*/
ALTER TABLE theloai
ADD SLBaiViet INT;

/*Bổ sung thêm bảng Users để lưu thông tin tài khoản đăng nhập và sử dụng cho chứ năng Đăng nhập/ Quản trị trang web*/
CREATE TABLE users (id_ngdung INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
              		tai_khoan varchar(50) NOT NULL,
             		mat_khau varchar(50) NOT NULL,
                   quyen_han varchar(50) NOT NULL)