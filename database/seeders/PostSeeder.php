<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')
            ->insert([
                [
                    'user_id' => 1,
                    'category_id' => 1,
                    'title' => 'Chua Keo Thai Binh',
                    'content' => 'Tương truyền, dưới thời vua Lý Thánh Tông, chùa Keo được xây dựng bởi Thiền sư Dương Không Lộ ở ven sông Hồng từ năm 1061 tại hương (làng) Giao Thủy, phủ Hà Thanh (nay là các xã thuộc ven sông Hồng huyện Nam Trực và Trực Ninh, tỉnh Nam Định, một số tài liệu nhầm lẫn huyện Giao Thủy thành lập muộn sau này). Tuy nhiên, theo "Thánh tổ thực lục diễn ca" lưu giữ ở chùa thì ban đầu chùa Keo có tên gọi là Nghiêm Quang Tự, sư tổ của chùa chính là Lý Triều Quốc Sư: Thiền sư Nguyễn Minh Không (pháp hiệu là Không Lộ)[1]. Đến năm 1167 mới đổi thành Thần Quang Tự. Vì làng Giao Thủy có tên Nôm là Keo, nên ngôi chùa này cũng được gọi là chùa Keo.',
                    'description' => 'Lễ hội chùa Keo được tổ chức hai lần hằng năm, lần đầu vào ngày mùng 4 tháng giêng Âm lịch, ngày hội chính tổ chức vào giữa tháng 9 Âm lịch. Trong ngày hội, người ta tổ chức lễ rước kiệu, hương án, long đình, thuyền rồng và tiểu đỉnh. Trong chùa có cuộc thi diễn xướng về đề tài lục cúng: hương, đăng, hoa, trà, quả, thực, thật sinh động. Dân gian có câu ca dao về hội chùa Keo: "Dù cho cha đánh mẹ treo Em không bỏ hội chùa Keo hôm rằm."',
                    'status' => 0,
                    'image' => 'noimage.jpg'
                ],
                [
                    'user_id' => 2,
                    'category_id' => 2,
                    'title' => 'Chua Boc Ha Noi',
                    'content' => 'Chùa Bộc (còn có tên chữ là Sùng Phúc Tự hay Thiên Phúc Tự), tọa lạc tại xã Khương Thượng, nay thuộc phường Quang Trung, quận Đống Đa, thành phố Hà Nội. Chùa nằm giữa khu vực diễn ra trận Đống Đa lịch sử năm 1789 (cách gò Đống Đa khoảng 300 mét), cạnh Núi Loa (Loa Sơn) còn gọi là núi Cây Cờ, nơi tướng giặc Sầm Nghi Đống thắt cổ tự tử. Chùa vốn được dựng để thờ Phật, nhưng vì chùa tọa lạc sát một chiến trường giữa quân Tây Sơn và quân Thanh nên chùa còn thờ cả vua Quang Trung và vong linh những người đã chết trận.',
                    'description' => 'Chùa đã được Bộ Văn hóa công nhận là Di tích lịch sử - văn hóa quốc gia từ năm 1962 (cùng đợt với đền Ngọc Sơn,...)',
                    'status' => 0,
                    'image' => 'noimage.jpg'
                ]
            ]);
    }
}
