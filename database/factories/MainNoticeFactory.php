<?php

namespace Database\Factories;

use App\Models\MainNotice;
use Illuminate\Database\Eloquent\Factories\Factory;

class MainNoticeFactory extends Factory
{
    protected $model = MainNotice::class;
    protected $index = 1;
    
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'subject_ko' => (($this->index%2)?'뉴스_':'공지_').$this->index,
            'subject_en' => (($this->index%2)?'news_':'notice_').$this->index,
            'expo_yn' => ($this->index%2)?'N':'Y',
            'url' => 'http://test.com'.$this->index,
            'link_text_ko' => '텍스트_'.$this->index,
            'link_text_en' => 'text_'.$this->index++
        ];
    }

}
