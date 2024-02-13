<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class IndonesiaProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Blade::directive('convertToRupiah', function (string $amount) {
            $str = "'Rp. ' . number_format($amount, 0, ',', '.')";
            return "<?php echo $str; ?>";
        });

        Blade::directive('formatPhoneNumber', function (string $expression) {
            return "<?php

            \$phoneNumber = $expression;
            \$phoneNumberLength = strlen(\$phoneNumber);
            if (\$phoneNumberLength < 10) {
                \$phoneNumber .= str_repeat('x', 10 - \$phoneNumberLength);
            } elseif (\$phoneNumberLength > 13) {
                \$phoneNumber = substr(\$phoneNumber, 0, 13);
            } elseif (\$phoneNumberLength < 13) {
                \$phoneNumber = str_pad(\$phoneNumber, 13, 'x');
            }

            echo (substr(\$phoneNumber, 0, 1) === '0')
                ? '+62-' . substr(\$phoneNumber, 1, 4) . '-' . substr(\$phoneNumber, 5, 4) . '-' . substr(\$phoneNumber, 9, 4) . '-' . substr(\$phoneNumber, 13)
                : '+62-' . substr(\$phoneNumber, 0, 4) . '-' . substr(\$phoneNumber, 4, 4) . '-' . substr(\$phoneNumber, 8, 4) . '-' . substr(\$phoneNumber, 12);
        ?>";
        });

        Blade::directive('formatTime', function (string $expression) {
            $str = "Carbon\Carbon::createFromFormat('H:i:s', {$expression})->format('H:i');";
            return "<?php echo $str ?>";
        });
    }


//    protected function formatTime($time)
//    {
//        return Carbon::createFromFormat('H:i:s', $time)->format('H:i');
//    }

}
