<?php

namespace App\Http\Controllers\SharedTraits\ToastNotificationTraits;

trait ErrorToastNotification {
    public static function push($item_name, $operation) {
        $message = null;
        switch ($operation){
            case 'create':
            case 'store':
                $message = 'Something went wrong while creating this ' . $item_name;
                break;
            case 'edit':
            case 'update':
            $message = 'Something went wrong while updating this ' . $item_name;
                break;
            case 'delete':
            case 'destroy':
            $message = 'Something went wrong while deleting this ' . $item_name;
                break;
        }

        return toastr(
            $message,
            'error',
            '',
            [
                'closeButton'   => true,
                'positionClass' => 'toast-bottom-right',
            ]
        );
    }
}
