<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //@dkjung-issue : 갑자기 운영에 배포시 발생된 오류 때문에 추가된 코드.
        //191로만 된다.
        Schema::defaultStringLength(191);

        //@dkjung-issue : 쿼리 디버깅.
        if (env("SQL_DEBUG_LOG"))
        {
            DB::listen(function ($query) {
                Log::debug("DB: " . $query->sql . "[".  implode(",",$query->bindings). "]");
                Log::debug("DB: execute time => ".$query->time." sec.");
            });
        }

        //usage => <textarea>@br2nl($post->post_text)</textarea>
        Blade::directive('br2nl', function ($string)
        {
            return "<?php echo preg_replace('/\<br(\s*)?\/?\>/i', \"\n\", $string); ?>";
        });

    }
}
