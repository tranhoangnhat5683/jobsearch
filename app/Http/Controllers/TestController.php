<?php

namespace App\Http\Controllers;

use App\User;
use App\Page;
use App\Character;
use App\Skill;
use App\Location;
use DB;

class TestController extends Controller {

    public function __construct() {
        //$this->middleware('auth.basic', ['only' => 'store']);
//        $this->middleware('jwt.auth');
    }

    public function angular() {
        return view('angular');
    }

    
    public function neo() {
//        $this->emptyData();
//        $this->createPage();
//        $this->createUser();
//        $this->createCharacter();
//        $this->createSkill();
//        $this->createLocation();
//        $this->createUserPage();
//        $this->createUserSkill();
//        $this->createUserCharacter();
//        $this->createUserLocation();
        return 'Success';
    }

    public function cypher()
    {
        $rowset = DB::select('MATCH (n:User) RETURN n LIMIT 25');
        $result = [];
        foreach($rowset as $row)
        {
            $result[] = $row['n']->getProperties();
        }
        return $result;
    }
    
    private function emptyData() {
        DB::select('MATCH (a),(m) OPTIONAL MATCH (a)-[r1]-(), (m)-[r2]-() DELETE a,r1,m,r2');
    }

    private function createUser() {
//        DB::select('DROP CONSTRAINT ON (user:User) ASSERT user.identity IS UNIQUE');
        DB::select('CREATE CONSTRAINT ON (user:User) ASSERT user.identity IS UNIQUE');
        User::create(["identity" => "100005965563483", "username" => "ck.mua.3", "fullname" => "Pi's Pôlyme's", "gender" => "MALE", "current_city" => "Tây Ninh", "hometown" => "Tây Ninh", "hobbies" => $this->getHobbies(), 'jobs' => $this->getJobs(), 'email' => 'ck.mua.3@gmail.com']);
        User::create(["identity" => "100001034249186", "username" => "xnohat", "fullname" => "Hong Phuc Nguyen", "gender" => "MALE", "current_city" => "Ho Chi Minh City, Vietnam", "hometown" => "Ho Chi Minh City, Vietnam", "hobbies" => $this->getHobbies(), 'jobs' => $this->getJobs()]);
        User::create(["identity" => "100000001339582", "username" => "Singer.VanMaiHuong", "fullname" => "Văn Mai Hương", "gender" => "FEMALE", "current_city" => "Ho Chi Minh City, Vietnam", "hometown" => "Hanoi, Vietnam", "hobbies" => $this->getHobbies(), 'jobs' => $this->getJobs()]);
        User::create(["identity" => "1140177709", "username" => "1140177709", "fullname" => "Duy Nguyễn", "gender" => "MALE", "current_city" => "Ho Chi Minh City, Vietnam", "hometown" => "Ho Chi Minh City, Vietnam", "hobbies" => $this->getHobbies(), 'jobs' => $this->getJobs()]);
        User::create(["identity" => "100001349889094", "username" => "kimdungdao85", "fullname" => "Đào Kim Dung", "gender" => "FEMALE", "current_city" => "Hanoi, Vietnam", "hometown" => "Ha-Nam, Hà Nam, Vietnam", "hobbies" => $this->getHobbies(), 'jobs' => $this->getJobs(), 'kimdungdao85@gmail.com']);
        User::create(["identity" => "709234645", "username" => "traanf", "fullname" => "Tran Tuan Anh", "gender" => "MALE", "current_city" => "Hanoi, Vietnam", "hobbies" => $this->getHobbies(), 'jobs' => $this->getJobs()]);
        User::create(["identity" => "100004744954014", "username" => "chi1bro", "fullname" => "Huyen Chip", "gender" => "FEMALE", "birthday" => "1990", "current_city" => "Hanoi, Vietnam", "hometown" => "Hai Hau", "hobbies" => $this->getHobbies(), 'jobs' => $this->getJobs()]);
        User::create(["identity" => "100004227851982", "username" => "kenbihoang.vtv", "fullname" => "Hoàng Trung Hiếu", "gender" => "MALE", "hobbies" => $this->getHobbies(), 'jobs' => $this->getJobs()]);
        User::create(["identity" => "728839386", "username" => "long.huynh.16144", "fullname" => "Long Huynh", "gender" => "MALE", "current_city" => "Thành phố Hồ Chí Minh", "hometown" => "Ho Chi Minh City, Vietnam", "hobbies" => $this->getHobbies(), 'jobs' => $this->getJobs()]);
        User::create(["identity" => "100000315701660", "username" => "daudatchaybangpin", "fullname" => "Tan Nguyen Van", "gender" => "MALE", "current_city" => "Ho Chi Minh City, Vietnam", "hobbies" => $this->getHobbies(), 'jobs' => $this->getJobs()]);
//        User::create(["identity" => "100000024527037", "username" => "giaplee", "fullname" => "Giap Le Van", "gender" => "MALE", "current_city" => "Hanoi, Vietnam", "hobbies" => $this->getHobbies(), 'jobs' => $this->getJobs()]);
//        User::create(["identity" => "100000366174004", "username" => "aaron.phucdang", "fullname" => "Phuc Dang", "gender" => "MALE", "birthday" => "1990", "current_city" => "Ho Chi Minh City, Vietnam", "hometown" => "Ho Chi Minh City, Vietnam", "hobbies" => $this->getHobbies(), 'jobs' => $this->getJobs()]);
//        User::create(["identity" => "100000271946723", "username" => "thunga.nguyen.75", "fullname" => "Thu Nga Nguyen", "gender" => "FEMALE", "current_city" => "Ho Chi Minh City, Vietnam", "hometown" => "Ho Chi Minh City, Vietnam", "hobbies" => $this->getHobbies(), 'jobs' => $this->getJobs()]);
//        User::create(["identity" => "100003268127535", "username" => "Tom.va.rerry", "fullname" => "Đinh Hà", "gender" => "FEMALE", "current_city" => "Hanoi, Vietnam", "hometown" => "Hanoi, Vietnam", "hobbies" => $this->getHobbies(), 'jobs' => $this->getJobs()]);
//        User::create(["identity" => "1318750198", "username" => "rayvo", "fullname" => "Quoc Duy Vo", "gender" => "MALE", "current_city" => "Incheon, South Korea", "hobbies" => $this->getHobbies(), 'jobs' => $this->getJobs()]);
//        User::create(["identity" => "1243468108", "username" => "nguyen.n.duy.14", "fullname" => "Nguyen Ngoc Duy", "gender" => "MALE", "birthday" => "1984", "current_city" => "Ho Chi Minh City, Vietnam", "hometown" => "Phan Thiet", "hobbies" => $this->getHobbies(), 'jobs' => $this->getJobs()]);
//        User::create(["identity" => "1580406014", "username" => "sonoko.truong", "fullname" => "Sonoko Trương", "gender" => "FEMALE", "current_city" => "Ho Chi Minh City, Vietnam", "hometown" => "Da Lat", "hobbies" => $this->getHobbies(), 'jobs' => $this->getJobs()]);
//        User::create(["identity" => "100005098691694", "username" => "yumi0185", "fullname" => "Yumi Vu", "gender" => "FEMALE", "birthday" => "1984", "current_city" => "Ho Chi Minh City, Vietnam", "hometown" => "Binh Dinh, Nghia Binh, Vietnam", "hobbies" => $this->getHobbies(), 'jobs' => $this->getJobs()]);
//        User::create(["identity" => "100004237386927", "username" => "katie.kieu.3", "fullname" => "Lê Thị Thuý Kiều", "gender" => "FEMALE", "birthday" => "1986", "current_city" => "Thành phố Hồ Chí Minh, Hồ Chí Minh, Vietnam", "hometown" => "Ho Chi Minh City, Vietnam", "hobbies" => $this->getHobbies(), 'jobs' => $this->getJobs()]);
//        User::create(["identity" => "100000001126549", "username" => "hien.do.9022", "fullname" => "Hien Do", "gender" => "FEMALE", "current_city" => "Ho Chi Minh City, Vietnam", "hometown" => "Thái Bình", "hobbies" => $this->getHobbies(), 'jobs' => $this->getJobs()]);
//        User::create(["identity" => "1810181763", "username" => "mthuy232", "fullname" => "Minh Thúy Nguyễn", "gender" => "FEMALE", "birthday" => "1989", "current_city" => "Ho Chi Minh City, Vietnam", "hometown" => "Ho Chi Minh City, Vietnam", "hobbies" => $this->getHobbies(), 'jobs' => $this->getJobs()]);
//        User::create(["identity" => "100004507470778", "username" => "lucy.nguyen.5680", "fullname" => "Hien Nguyen Ngoc", "gender" => "FEMALE", "current_city" => "Ho Chi Minh City, Vietnam", "hometown" => "Phu Nhuan, Hồ Chí Minh, Vietnam", "hobbies" => $this->getHobbies(), 'jobs' => $this->getJobs()]);
//        User::create(["identity" => "100001528376207", "username" => "trang.vole", "fullname" => "Trang Vo Le", "gender" => "FEMALE", "birthday" => "1977", "current_city" => "Ho Chi Minh City, Vietnam", "hometown" => "Nha Trang, Vietnam", "hobbies" => $this->getHobbies(), 'jobs' => $this->getJobs()]);
//        User::create(["identity" => "1015572957", "username" => "sieutraubo", "fullname" => "Nguyễn Phương Thảo", "current_city" => "Ho Chi Minh City, Vietnam", "hometown" => "Athens, Greece", "hobbies" => $this->getHobbies(), 'jobs' => $this->getJobs()]);
//        User::create(["identity" => "737522356", "username" => "pham.duong", "fullname" => "Pham An Duong", "gender" => "MALE", "current_city" => "Ho Chi Minh City, Vietnam", "hometown" => "Ho Chi Minh City, Vietnam", "hobbies" => $this->getHobbies(), 'jobs' => $this->getJobs()]);
//        User::create(["identity" => "100003242027429", "username" => "vienha.nguyenthuy", "fullname" => "Nguyễn Thụy Viễn Hạ", "gender" => "FEMALE", "current_city" => "Ho Chi Minh City, Vietnam", "hometown" => "Lái Thiêu", "hobbies" => $this->getHobbies(), 'jobs' => $this->getJobs()]);
//        User::create(["identity" => "100005474493537", "username" => "nguyenphuong.thuy.798", "fullname" => "Thúy Nguyễn", "gender" => "FEMALE", "current_city" => "Ninh Bình", "hometown" => "Ninh Bình", "hobbies" => $this->getHobbies(), 'jobs' => $this->getJobs()]);
//        User::create(["identity" => "100002328571138", "username" => "thaimeo0705", "fullname" => "Thái Mèo", "gender" => "MALE", "current_city" => "Thanh Hóa", "hometown" => "Thanh Hóa", "hobbies" => $this->getHobbies(), 'jobs' => $this->getJobs()]);
//        User::create(["identity" => "100004699361218", "username" => "99c100880", "fullname" => "Đình Khôi", "gender" => "MALE", "birthday" => "1991", "current_city" => "Bac Ninh", "hobbies" => $this->getHobbies(), 'jobs' => $this->getJobs()]);
//        User::create(["identity" => "100004943444187", "username" => "thangpro.xeroxy92", "fullname" => "Huỳnh Quang Thắng", "gender" => "MALE", "birthday" => "1992", "current_city" => "Ho Chi Minh City, Vietnam", "hometown" => "Binh Dinh, Nghia Binh, Vietnam", "hobbies" => $this->getHobbies(), 'jobs' => $this->getJobs()]);
//        User::create(["identity" => "1205312178", "username" => "Willie.be.nho", "fullname" => "Phung Dan Truong", "gender" => "FEMALE", "current_city" => "Ho Chi Minh City, Vietnam", "hometown" => "Ho Chi Minh City, Vietnam", "hobbies" => $this->getHobbies(), 'jobs' => $this->getJobs()]);
//        User::create(["identity" => "1589070142", "username" => "Ms.Phuong", "fullname" => "Thùy Phương", "gender" => "FEMALE", "current_city" => "Ho Chi Minh City, Vietnam", "hometown" => "Tuy Hòa", "hobbies" => $this->getHobbies(), 'jobs' => $this->getJobs()]);
//        User::create(["identity" => "100001735773766", "username" => "thuongthuong.iuiu", "fullname" => "Nguyễn Hoài Thương", "gender" => "FEMALE", "current_city" => "Ho Chi Minh City, Vietnam", "hometown" => "Bak Nin, Bắc Ninh, Vietnam", "hobbies" => $this->getHobbies(), 'jobs' => $this->getJobs()]);
//        User::create(["identity" => "100002076653869", "username" => "jason.redfield.902", "fullname" => "Đỗ Ngân Sơn", "gender" => "MALE", "hobbies" => $this->getHobbies(), 'jobs' => $this->getJobs()]);
//        User::create(["identity" => "100004087537304", "username" => "ngoclam.tran.79", "fullname" => "Ngoc Lam Tran", "gender" => "MALE", "current_city" => "Ho Chi Minh City, Vietnam", "hometown" => "Quang Ngai", "hobbies" => $this->getHobbies(), 'jobs' => $this->getJobs()]);
//        User::create(["identity" => "100004510534129", "username" => "trang.vo.3705157", "fullname" => "Trang Võ", "gender" => "FEMALE", "birthday" => "1984", "current_city" => "Ho Chi Minh City, Vietnam", "hometown" => "Ho Chi Minh City, Vietnam", "hobbies" => $this->getHobbies(), 'jobs' => $this->getJobs()]);
//        User::create(["identity" => "100000106878122", "username" => "lehongvan9183", "fullname" => "Vân Lê Hồng", "gender" => "FEMALE", "birthday" => "1983", "current_city" => "Kim Mã, Ha Noi, Vietnam", "hometown" => "Hoài Nhon, Bình Ðịnh, Vietnam", "hobbies" => $this->getHobbies(), 'jobs' => $this->getJobs()]);
//        User::create(["identity" => "100000786663511", "username" => "anh.vy.9", "fullname" => "Anh Vy", "gender" => "FEMALE", "current_city" => "Ho Chi Minh City, Vietnam", "hometown" => "Ho Chi Minh City, Vietnam", "hobbies" => $this->getHobbies(), 'jobs' => $this->getJobs()]);
//        User::create(["identity" => "100001222503493", "username" => "hai.duong.37", "fullname" => "Hai Duong", "gender" => "MALE", "hometown" => "Da Nang, Vietnam", "hobbies" => $this->getHobbies(), 'jobs' => $this->getJobs()]);
//        User::create(["identity" => "100000339207179", "username" => "vy.le.96995", "fullname" => "Vy Vy Le", "gender" => "FEMALE", "birthday" => "1982", "current_city" => "Ho Chi Minh City, Vietnam", "hometown" => "Ho Chi Minh City, Vietnam", "hobbies" => $this->getHobbies(), 'jobs' => $this->getJobs()]);
//        User::create(["identity" => "100000334878230", "username" => "vu.huyen.1614", "fullname" => "Vũ Huyền", "gender" => "FEMALE", "current_city" => "Hanoi, Vietnam", "hometown" => "Bac Ninh", "hobbies" => $this->getHobbies(), 'jobs' => $this->getJobs()]);
//        User::create(["identity" => "1017051403", "username" => "moon.hang.351", "fullname" => "Giang Khánh Hằng", "gender" => "FEMALE", "current_city" => "Ho Chi Minh City, Vietnam", "hobbies" => $this->getHobbies(), 'jobs' => $this->getJobs()]);
//        User::create(["identity" => "100004348592942", "username" => "100004348592942", "fullname" => "Đỗ Quyên Trắng", "gender" => "FEMALE", "current_city" => "Hanoi, Vietnam", "hometown" => "Hanoi, Vietnam", "hobbies" => $this->getHobbies(), 'jobs' => $this->getJobs()]);
//        User::create(["identity" => "100001639971665", "username" => "100001639971665", "fullname" => "Lien Tran", "gender" => "FEMALE", "hometown" => "Ho Chi Minh City, Vietnam", "hobbies" => $this->getHobbies(), 'jobs' => $this->getJobs()]);
//        User::create(["identity" => "725112966", "username" => "725112966", "fullname" => "Đoàn Tiến Đạt", "gender" => "MALE", "current_city" => "Thành phố Hồ Chí Minh, Hồ Chí Minh, Vietnam", "hometown" => "Nam Dinâ?, Ha Nam Ninh, Vietnam", "hobbies" => $this->getHobbies(), 'jobs' => $this->getJobs()]);
//        User::create(["identity" => "1131143118", "username" => "oc.thanhvan", "fullname" => "Phạm Thị Thanh Vân", "gender" => "FEMALE", "birthday" => "1984", "current_city" => "Ho Chi Minh City, Vietnam", "hometown" => "Hai Phong, Vietnam", "hobbies" => $this->getHobbies(), 'jobs' => $this->getJobs()]);
//        User::create(["identity" => "746050202", "username" => "X.Nicky", "fullname" => "Vu Le Quoc", "gender" => "MALE", "birthday" => "1985", "current_city" => "Ho Chi Minh City, Vietnam", "hometown" => "Ho Chi Minh City, Vietnam", "hobbies" => $this->getHobbies(), 'jobs' => $this->getJobs()]);
//        User::create(["identity" => "100003382890020", "username" => "perla.thai", "fullname" => "Ngoc Thai", "gender" => "FEMALE", "current_city" => "Ho Chi Minh City, Vietnam", "hobbies" => $this->getHobbies(), 'jobs' => $this->getJobs()]);
//        User::create(["identity" => "717678376", "username" => "thanhthaomc", "fullname" => "Nguyễn Ngọc Thanh Thảo", "gender" => "FEMALE", "birthday" => "1981", "current_city" => "Ho Chi Minh City, Vietnam", "hometown" => "Ho Chi Minh City, Vietnam", "hobbies" => $this->getHobbies(), 'jobs' => $this->getJobs()]);
//        User::create(["identity" => "100006312420097", "username" => "giangphongdan87", "fullname" => "Nguyen Thi Nhan", "gender" => "FEMALE", "birthday" => "1987", "hometown" => "Nam Dinâ?, Ha Nam Ninh, Vietnam", "hobbies" => $this->getHobbies(), 'jobs' => $this->getJobs()]);
    }

    private function createPage() {
//        DB::select('DROP CONSTRAINT ON (page:Page) ASSERT page.id_social IS UNIQUE');
        DB::select('CREATE CONSTRAINT ON (page:Page) ASSERT page.id_social IS UNIQUE');
        Page::create(["id_social" => "100048249004", "name" => "Câu lạc bộ những người thích đánh rắm"]);
        Page::create(["id_social" => "100100686804995", "name" => "Ngắm Gái Là Một Sở Thích :X"]);
        Page::create(["id_social" => "100100876814281", "name" => "Điện thoại HongKong"]);
        Page::create(["id_social" => "100100876814752", "name" => "Bảo mẫu"]);
        Page::create(["id_social" => "100101163418605", "name" => "*Let's go*"]);
//        Page::create(["id_social" => "100102266708743", "name" => "Ngoai ngu"]);
//        Page::create(["id_social" => "100102513452194", "name" => "Nàng Chuột"]);
//        Page::create(["id_social" => "100102773384393", "name" => "Vietnam Panpages"]);
//        Page::create(["id_social" => "100103066701236", "name" => "Những người hay ngáp"]);
//        Page::create(["id_social" => "100103423403375", "name" => "Hội những nhóc thíc sửa thông tin trên wiki"]);
//        Page::create(["id_social" => "100103626794811", "name" => "Sim Mobifone - Mọi Lúc Mọi Nơi"]);
//        Page::create(["id_social" => "100103710082097", "name" => "Le bao Trinh"]);
//        Page::create(["id_social" => "100104936751324", "name" => "Hội những người ghét cay ghét đắng hối lộ"]);
//        Page::create(["id_social" => "100104993409494", "name" => "Hội những người thích nhắn tin"]);
//        Page::create(["id_social" => "100105310073178", "name" => "Sinh tố Võ Văn Tần"]);
//        Page::create(["id_social" => "100105470135358", "name" => "Hiệp hội NLP Việt Nam"]);
//        Page::create(["id_social" => "100105536806946", "name" => "Buổi chiều và những mảnh vỡ"]);
//        Page::create(["id_social" => "100106640073991", "name" => "Hội những người phát cuồng vì muối, rau và TCFC"]);
//        Page::create(["id_social" => "100106903389042", "name" => "Chuyên Viên Chém Gió"]);
//        Page::create(["id_social" => "100106923473503", "name" => "Dress for lady"]);
//        Page::create(["id_social" => "100107040111248", "name" => "Hẹn gặp a vào một ngày khác =\">"]);
//        Page::create(["id_social" => "100107846811768", "name" => "Hoài Ann. Quỳnh Anhh. Mẫn Tiênn."]);
//        Page::create(["id_social" => "100108300106850", "name" => "Hội những người thích hát Kraoke"]);
//        Page::create(["id_social" => "100109153474704", "name" => "Công Ty Cổ Phần Trung Tâm Công Nghệ Phần Mềm TSP"]);
//        Page::create(["id_social" => "100110870138975", "name" => "BÁT Tràng -Con đường gốm sứ"]);
//        Page::create(["id_social" => "100111186804341", "name" => "Andoford"]);
//        Page::create(["id_social" => "100112733426186", "name" => "Tonkin Coffee"]);
//        Page::create(["id_social" => "100112796782168", "name" => "Đặc Sản Chợ Hàn"]);
//        Page::create(["id_social" => "100112906774454", "name" => "TrangHanchi"]);
//        Page::create(["id_social" => "100112956803212", "name" => "HOA MAT TROI"]);
//        Page::create(["id_social" => "100113003481219", "name" => "Quả Táo Độc"]);
//        Page::create(["id_social" => "100113256804065", "name" => "Salon Tóc Xinh Thanh Hằng"]);
//        Page::create(["id_social" => "100113626751600", "name" => "THPT Lý Nhân Tông"]);
//        Page::create(["id_social" => "100114456766312", "name" => "Kỉ Niệm"]);
//        Page::create(["id_social" => "100115356786157", "name" => "Công ty CPXD Quang Hưng Phát"]);
//        Page::create(["id_social" => "100115523470799", "name" => "IpCase"]);
//        Page::create(["id_social" => "100116446770967", "name" => "GIÓ"]);
//        Page::create(["id_social" => "100117096764450", "name" => "Hội Những người Thích Đủ Thứ Nhưng không bao giờ có tiền mua"]);
//        Page::create(["id_social" => "100118743468770", "name" => "Thời trang_Giới trẻ"]);
//        Page::create(["id_social" => "100120780113641", "name" => "Kỉ Băng Hà"]);
//        Page::create(["id_social" => "100121036798362", "name" => "THPT Tĩnh Gia II"]);
//        Page::create(["id_social" => "100121383471681", "name" => "Anh - Tùng Sommelier club"]);
//        Page::create(["id_social" => "100122150134846", "name" => "MV HD"]);
//        Page::create(["id_social" => "100122493476439", "name" => "Ngọt Ngào s2 甜心"]);
//        Page::create(["id_social" => "100124306731163", "name" => "Hội những người thích ăn ngô trừ bữa :xxxxxxxxxxxxxxxxxx"]);
//        Page::create(["id_social" => "100124646739919", "name" => "Hanoi Tower"]);
//        Page::create(["id_social" => "100125416804371", "name" => "Phát Khùng với bọn tín đồ HKT"]);
//        Page::create(["id_social" => "100126540104207", "name" => "Hội những người phát cuồng vì Nguyen Steven"]);
//        Page::create(["id_social" => "100128483427232", "name" => "HỘI ĂN CHƠI KHÔNG SỢ CON RƠI"]);
//        Page::create(["id_social" => "100129916733686", "name" => "Toán 1 (2000 - 2003)  Lương Văn Chánh - Phú Yên"]);
    }

    private function createCharacter() {
//        DB::select('DROP CONSTRAINT ON (character:Character) ASSERT character.name IS UNIQUE');
        DB::select('CREATE CONSTRAINT ON (character:Character) ASSERT character.name IS UNIQUE');
//        Character::create(["name" => "Positive"]);
//        Character::create(["name" => "Teamwork"]);
//        Character::create(["name" => "Open"]);
//        Character::create(["name" => "Confident"]);
//        Character::create(["name" => "Sincere"]);
        Character::create(["name" => "Optimism"]);
        Character::create(["name" => "Active"]);
        Character::create(["name" => "Confidence"]);
        Character::create(["name" => "Communication"]);
        Character::create(["name" => "Funny"]);
    }

    private function createSkill() {
//        DB::select('DROP CONSTRAINT ON (skill:Skill) ASSERT skill.name IS UNIQUE');
        DB::select('CREATE CONSTRAINT ON (skill:Skill) ASSERT skill.name IS UNIQUE');
        Skill::create(["name" => "PHP"]);
        Skill::create(["name" => "Javascript"]);
        Skill::create(["name" => "Java"]);
        Skill::create(["name" => "NodeJS"]);
        Skill::create(["name" => "MySQL"]);
    }

    private function createLocation() {
//        DB::select('DROP CONSTRAINT ON (location:Location) ASSERT location.name IS UNIQUE');
        DB::select('CREATE CONSTRAINT ON (location:Location) ASSERT location.name IS UNIQUE');
        Location::create(["name" => "Ho Chi Minh"]);
        Location::create(["name" => "Ha Noi"]);
        Location::create(["name" => "Phu Yen"]);
        Location::create(["name" => "Da Lat"]);
        Location::create(["name" => "My Tho"]);
    }

    private function createUserPage() {
        $users = $this->getAllUser();
        $pages = $this->getAllPage();
        for ($i = 0; $i < count($users); $i++)
        {
            $user = $users[rand(0, count($users) - 1)];
            $identity = $user['identity'];
            $page = $pages[rand(0, count($pages) - 1)];
            $id_social = $page['id_social'];
            $post = rand(0, 20);
            DB::select("MATCH (u:User {identity:'$identity'}), (p:Page {id_social:'$id_social'})
                WHERE NOT u-[:Join]->p
                CREATE (u)-[:Join{post:$post}]->(p)");
        }

        return $users;
    }

    private function createUserSkill() {
        $users = $this->getAllUser();
        $skills = $this->getAllSkill();
        for ($i = 0; $i < 2 * count($users); $i++)
        {
            $user = $users[rand(0, count($users) - 1)];
            $identity = $user['identity'];
            $skill = $skills[rand(0, count($skills) - 1)];
            $name = $skill['name'];
            DB::select("MATCH (u:User {identity:'$identity'}), (p:Skill {name:'$name'})
                WHERE NOT u-[:Own]->p
                CREATE (u)-[:Own]->(p)");
        }

        return $users;
    }

    private function createUserCharacter() {
        $users = $this->getAllUser();
        $characters = $this->getAllCharacter();
        for ($i = 0; $i < 2 * count($users); $i++)
        {
            $user = $users[rand(0, count($users) - 1)];
            $identity = $user['identity'];
            $character = $characters[rand(0, count($characters) - 1)];
            $name = $character['name'];
            $score = rand(0, 50);
            DB::select("MATCH (u:User {identity:'$identity'}), (p:Character {name:'$name'})
                WHERE NOT u-[:Has]->p
                CREATE (u)-[:Has{score:$score}]->(p)");
        }

        return $users;
    }

    private function createUserLocation() {
        $users = $this->getAllUser();
        $locations = $this->getAllLocation();
        for ($i = 0; $i < count($users); $i++)
        {
            $user = $users[$i];
            $identity = $user['identity'];
            $location = $locations[rand(0, count($locations) - 1)];
            $name = $location['name'];
            DB::select("MATCH (u:User {identity:'$identity'}), (l:Location {name:'$name'})
                WHERE NOT u-[:At]->l
                CREATE (u)-[:At]->(l)");
        }

        return $users;
    }

    private function getAllUser() {
        $rowset = DB::select("MATCH (n:User) RETURN n");
        $result = [];
        foreach($rowset as $row)
        {
            $result[] = $row['n']->getProperties();
        }
        return $result;
    }

    private function getAllPage() {
        $rowset = DB::select("MATCH (n:Page) RETURN n");
        $result = [];
        foreach($rowset as $row)
        {
            $result[] = $row['n']->getProperties();
        }
        return $result;
    }

    private function getAllSkill() {
        $rowset = DB::select("MATCH (n:Skill) RETURN n");
        $result = [];
        foreach($rowset as $row)
        {
            $result[] = $row['n']->getProperties();
        }
        return $result;
    }

    private function getAllCharacter() {
        $rowset = DB::select("MATCH (n:Character) RETURN n");
        $result = [];
        foreach($rowset as $row)
        {
            $result[] = $row['n']->getProperties();
        }
        return $result;
    }

    private function getAllLocation() {
        $rowset = DB::select("MATCH (n:Location) RETURN n");
        $result = [];
        foreach($rowset as $row)
        {
            $result[] = $row['n']->getProperties();
        }
        return $result;
    }

    private function getHobbies() {
        $n = rand(0, 4);
        if (!$n) {
            return null;
        }

        $hobbies = ['Acting', 'Dance', 'Cooking', 'Chess', 'Bowling', 'Tennis', "Swimming", "Reading Book", "Football"];
        if ($n === 1) {
            return [$hobbies[$n]];
        }

        $rand = array_rand($hobbies, $n);
        $result = [];
        for ($i = 0; $i < $n; $i++) {
            $result[] = $hobbies[$rand[$i]];
        }
        return $result;
    }

    private function getJobs() {
        $n = rand(0, 2);
        if (!$n) {
            return null;
        }

        $jobs = ['Front-end developer at Younetmedia From 2014 to now', 'Works at Pleiku Gia Lai',
            'Manager at Tổng Đài Đặt Vé', 'Admin at Xinh là để ngắm', 'Học viên at Học viện âm nhạc quốc gia Hà Nội',
            'Cựu học sinh at THPT Số 1 Bát Xát', 'Hot Girl at Hội Trai đẹp-Gái xinh 9x Lào Cai> :x',
            'Chief Executive Officer at Công ty TNHH Tester Việt', 'Lớp trưởng THPT Nông Cống 2 - Thanh Hóa'];
        if ($n === 1) {
            return [$jobs[$n]];
        }

        $rand = array_rand($jobs, $n);
        $result = [];
        for ($i = 0; $i < $n; $i++) {
            $result[] = $jobs[$rand[$i]];
        }
        return $result;
    }

}