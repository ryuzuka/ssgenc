<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Support\Facades\Log;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->withHeaders([
            'X-Header' => 'Value',
            'Accept'=>'application/json',
            'Content-Type'=>'application/json'
        ])->json('POST', 'http://ssgenc.test/api/auth/login', [
            'user_id'=>base64_encode('test_100'),
            'password'=>'96962d1ac0e27e92cc1978554ccfcb2e38652d6308e4a5ed85a6d3b5d7f89115'
        ]);

        Log::debug('===========> 테스트 시작');
        $response->dumpHeaders();
        $response->dumpSession();
        $response->dump();
        $response->assertStatus(200);
    }
}
