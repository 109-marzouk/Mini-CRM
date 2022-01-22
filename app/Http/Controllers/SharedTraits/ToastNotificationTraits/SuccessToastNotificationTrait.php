<?php

namespace App\Http\Controllers\SharedTraits\ToastNotificationTraits;

trait SuccessToastNotificationTrait {
    public static function push($item_name, $operation) {
        $message = null;
        switch ($operation){
            case 'create':
            case 'store':
                $message = $item_name . ' was created successfully!';
                break;
            case 'edit':
            case 'update':
            $message = $item_name . ' was updated successfully!';
                break;
            case 'delete':
            case 'destroy':
            $message = $item_name . ' was deleted successfully!';
                break;
        }

        return toastr(
            $message,
            'success',
            '',
            [
                'closeButton'   => true,
                'positionClass' => 'toast-bottom-right',
            ]
        );
    }
}
