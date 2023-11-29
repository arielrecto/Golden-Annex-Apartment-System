<?php

namespace App\Enums;


enum MaintenanceStatus:string{
    case PENDING = 'Pending';
    case PROCESSING = 'Processing';
    case DONE = 'Done';
    case REJECT = 'Reject';
}
