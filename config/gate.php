<?php
use App\Services\Gates\SystemMonitor;
?>
<?php
return [
    'see-ram-usage' => [SystemMonitor::class,'ramUsage'] ,
    'see-disk-usage' => [SystemMonitor::class,'diskUsage']
];
