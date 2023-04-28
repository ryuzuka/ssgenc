<?php

namespace Database\Factories;

use App\Models\Message;
use Illuminate\Database\Eloquent\Factories\Factory;

class MessageFactory extends Factory
{
    protected $model = Message::class;
    protected $index = 1;


    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'msg_acc' => ($this->index%2)?'01':'02',
            'key_msg_ko' => '키메세지_'.$this->index,
            'key_msg_en' => 'key_message_'.$this->index,
            'key_msg_desc_ko' => '디스크립션_'.$this->index,
            'key_msg_desc_en' => 'description_'.$this->index,
            'url' => 'http://test.com'.$this->index,
            'link_text_ko' => '텍스트_'.$this->index,
            'link_text_en' => 'text_'.$this->index,
            'expo_yn' => ($this->index%2)?'N':'Y',
            'data_1' => 'data_1_'.$this->index,
            'data_2' => 'data_1_'.$this->index++,
            'desc_1_ko' => '',
            'desc_2_ko' => '',
            'desc_1_en' => '',
            'desc_2_en' => '',
            'attach_id' => 0,
            'created_id' => 'test_01',
            'updated_id' => 'test_01'
        ];
    }
}
