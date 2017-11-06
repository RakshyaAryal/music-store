<?php
/**
 * Created by PhpStorm.
 * User: E-Signature
 * Date: 9/14/2017
 * Time: 11:09 AM
 */

namespace App\Libraries;


class Permission
{
    public static function all()
    {
        return [
            'Dashboard' => [
                [
                    'slug' => 'dashboard-view',
                    'description' => 'View',
                ]
            ],
            'Retailers' => [
                [
                    'slug' => 'retailers-view',
                    'description' => 'View',
                ],
                [
                    'slug' => 'retailers-create',
                    'description' => 'Create',
                ],
                [
                    'slug' => 'retailers-edit',
                    'description' => 'Edit',
                ],
                [
                    'slug' => 'retailers-delete',
                    'description' => 'Delete',
                ],
            ],

            'Retailers Category' => [
                [
                    'slug' => 'retailers-category-view',
                    'description' => 'View',
                ],
                [
                    'slug' => 'retailers-category-create',
                    'description' => 'Create',
                ],
                [
                    'slug' => 'retailers-category-edit',
                    'description' => 'Edit',
                ],
                [
                    'slug' => 'retailers-category-delete',
                    'description' => 'Delete',
                ],
            ],
            'Customer' => [
                [
                    'slug' => 'customer-view',
                    'description' => 'View',
                ],
                [
                    'slug' => 'customer-create',
                    'description' => 'Create',
                ],
                [
                    'slug' => 'customer-edit',
                    'description' => 'Edit',
                ],
                [
                    'slug' => 'customer-delete',
                    'description' => 'Delete',
                ],
            ],

            'Push Notification' => [
                [
                    'slug' => 'push-notification-view',
                    'description' => 'View',
                ],
                /* [
                     'slug' => 'push-notification-create',
                     'description' => 'Create'/*'Allow the user to interact with push notification'*/
                //]


            ],

            'Orders' => [
                [
                    'slug' => 'orders-view',
                    'description' => 'View',
                ],
            ],

            'User Management' => [
                [
                    'slug' => 'user-management-view',
                    'description' => 'View',
                ],
                [
                    'slug' => 'user-management-create',
                    'description' => 'Create',
                ],
                [
                    'slug' => 'user-management-edit',
                    'description' => 'Edit',
                ],
                [
                    'slug' => 'user-management-delete',
                    'description' => 'Delete',
                ],
                [
                    'slug' => 'user-management-email-change',
                    'description' => 'Change Email',
                ],
                [
                    'slug' => 'user-management-first-name-change',
                    'description' => 'Change First Name',
                ],
                [
                    'slug' => 'user-management-last-name-change',
                    'description' => 'Change Last Name',
                ],
                [
                    'slug' => 'user-management-username-change',
                    'description' => 'Change Username',
                ],
            ],

            'Roles' => [
                [
                    'slug' => 'roles-view',
                    'description' => 'View',
                ],
                [
                    'slug' => 'roles-create',
                    'description' => 'Create',
                ],
                [
                    'slug' => 'roles-edit',
                    'description' => 'Edit',
                ],
                [
                    'slug' => 'roles-delete',
                    'description' => 'Delete',
                ],
            ],
            'Permission' => [
                [
                    'slug' => 'permission-view',
                    'description' => 'View',
                ],
                [
                    'slug' => 'permission-update',
                    'description' => 'Update',
                ],
            ],
            'Support Contact' => [
                [
                    'slug' => 'support-contact-view',
                    'description' => 'View',
                ],
                [
                    'slug' => 'support-contact-update',
                    'description' => 'Update',
                ],
            ],

            /*   'Billings' => [
                   [
                       'slug' => 'billings-view',
                       'description' => 'View',
                   ],
                   [
                       'slug' => 'billings-update',
                       'description' => 'Update',
                   ],
               ],*/

            'Guide' => [
                [
                    'slug' => 'guide-view',
                    'description' => 'View',
                ],
                [
                    'slug' => 'guide-update',
                    'description' => 'Update',
                ],
            ],
            'Total Revenue' => [
                [
                    'slug' => 'revenue-view',
                    'description' => 'View',
                ],
            ],
            'Total Commission' => [
                [
                    'slug' => 'commission-view',
                    'description' => 'View',
                ],
            ],

        ];
    }

    public static function check($slug, $user = '')
    {
        return self::normalCheck($slug, $user, FALSE);
    }

    public static function checkAndExit($slug, $user = '')
    {
        return self::normalCheck($slug, $user, TRUE);
    }

    private static function normalCheck($slug, $user, $exit)
    {
        if ($user == '') {
            $user = Auth::user();
        }
        if($user->id ==1){
            return true;
        }

        //var_dump ($user);
        //echo  $user->id;

        $userRoles = UserRole::where('user_id', $user->id)->get();

        if ($userRoles == null) {
            return self::noAccess($exit);
        }
        //var_dump($userRoles[0]->role_id);
        foreach ($userRoles as $role) {

            $rolesPermission = RolePermission::where('role_id', $role->role_id)
                ->where('permission_slug', $slug)
                ->get();
            //var_dump($rolesPermission[0]);
            /*if(!$rolesPermission->contains('permission_slug', $slug)) {
                return self::noAccess($exit);
            }*/
            // echo count($rolesPermission);exit;
            if (count($rolesPermission) < 1) {
                return self::noAccess($exit);
            }
        }

        return true;
    }

    public static function noAccess($exit = false)
    {
        if ($exit) {
            echo view('admin.layouts.no-access');
            //echo "Access Denied";
            exit;
        }

        return false;
    }

}