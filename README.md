# Quanlynhansu
đề tài quản lý nhân sự với các chức năng cơ bản cho user và admin, 
sử dụng middleware để phân quyền khi người dùng đăng nhập
các chức năng cơ bản của user:
- đăng nhập( Username, password)
- Click link hệ thống gửi để đặt mật khẩu
'- 
+Link này chỉ được phép sử dụng một lần. Nếu đã đặt mật khẩu rồi thì hiển thị thông báo đã đặt mật khẩu
- 
+Thông tin: Mặt khẩu, Xác nhận mật khẩu
- tạo mới yêu cầu xin nghỉ hoặc đến muộn 
-quản lý danh sách xn đến muộn đã gửi và chưa gửi
các chức năng của admin:
-Đăng nhập
-quản lý danh sách nhân sự:
+ xem danh sách nhân sự
+Thêm, sửa, xóa, dừng theo dõi,
+Tìm kiếm nhân sự
-Thêm mới nhân sự
'- Thêm mới thông tin nhân sự:
 - Các thông tin: Tên, SĐT, Ngày sinh, Ảnh,  Tài khoản, Mật khẩu, email,level,status...
- Password là 1 chuỗi gồm 32 ký tự và được sinh ngầu nhiên
- PasswordHash là mã hóa SHA256 của chuỗi: Mật khẩu người dùng nhập + Password
- Cảnh báo khi trùng số Điện thoại, tài khoản
- Gửi email thông báo
+ Tài khoản đăng nhập
+ Link đặt mật khẩu: 
-Quản lý danh sách đến muộn hoặc xin nghỉ chưa được duyệt
+ Người dùng gửi yêu cầu đến cần phải chờ admin xác nhận 
+Trường hợp đã xác nhận có thể sửa và xóa 
+ Tìm kiếm thông tin theo user , theo ngày
-quản lý danh mục phân loại lý do
+ Tìm kiếm , thêm, sửa , xóa
- Gửi mail về thông tin lương của nhân sự:
+ Xuất danh sách nhân sự đang làm và upload lên -> tự độnng gửi thông tin bảng lương qua mailtrap
- Báo cáo 
+ Xuất file excel gồm 2 sheet : sheet đến muộn gồm thông tin tên, lý do, ngày xin phép,
sheet xin nghỉ gồm thông tin : tên, lý, do , ngày xin phép, số ngày nghỉ

