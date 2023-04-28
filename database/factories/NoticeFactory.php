<?php

namespace Database\Factories;

use App\Models\Notice;
use Illuminate\Database\Eloquent\Factories\Factory;

class NoticeFactory extends Factory
{
    protected $model = Notice::class;
    protected $index = 1;
    
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'news_gubun' => ($this->index%2)?'02':'03',
            'subject' => (($this->index%2)?'뉴스_':'공지_').$this->index,
            'content' => '내용_'.$this->index,
            'expo_yn' => ($this->index%2)?'N':'Y',
            'image_id' => 0,
            'attach_id' => 0,
            'created_id' => 'test_01',
            'updated_id' => 'test_01',
            'youtube_url' => 'http://www.youtube.com',
            'shortcut_nm' => 'shortcut_'.$this->index++,
            'shortcut_url' => 'http://test.com',
            'shortcut_expo_yn' => 'Y',
            'useflag' => 'Y'
        ];
    }
}
