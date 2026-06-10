<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\StrictRules\CreditCardRules;
use CodeIgniter\Validation\StrictRules\FileRules;
use CodeIgniter\Validation\StrictRules\FormatRules;
use CodeIgniter\Validation\StrictRules\Rules;

class Validation extends BaseConfig
{
    // --------------------------------------------------------------------
    // Setup
    // --------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var list<string>
     */
    public array $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public array $templates = [
        'list' => 'CodeIgniter\Validation\Views\list',
        // 'single' => 'CodeIgniter\Validation\Views\single',
        'single' => 'errors/validation/single',
        'check'  => 'errors/validation/check',
    ];

    // --------------------------------------------------------------------
    // Rules
    // --------------------------------------------------------------------
    public array $login = [
        'username' => [
            'label' => 'Auth.username',
            'rules' => 'required|max_length[16]|min_length[3]|regex_match[/\A[a-zA-Z0-9\.]+\z/]',
        ],
        'password' => [
            'label'  => 'Auth.password',
            'rules'  => 'required|max_byte[72]',
            'errors' => ['max_byte' => 'Auth.errorPasswordTooLongBytes'],
        ],
    ];
    public array $registration = [
        'username' => [
            'label' => 'Auth.username',
            'rules' => 'required|max_length[16]|min_length[3]|regex_match[/\A[a-zA-Z0-9\.]+\z/]|is_unique[users.username]',
        ],
        'email' => [
            'label' => 'Auth.email',
            'rules' => 'required|max_length[254]|valid_email|is_unique[auth_identities.secret]',
        ],
        'password' => [
            'label'  => 'Auth.password',
            'rules'  => 'required|max_byte[72]|strong_password[]',
            'errors' => ['max_byte' => 'Auth.errorPasswordTooLongBytes'],
        ],
        'password_confirm' => [
            'label' => 'Auth.passwordConfirm',
            'rules' => 'required|matches[password]',
        ],
    ];
    public array $message = [
        'secret' => [
            'label' => 'Pesan Rahasia',
            'rules' => 'required|max_length[255]|string',
        ],
    ];
    public array $profile = [
        'username' => [
            'label' => 'Auth.username',
            'rules' => 'required|max_length[16]|min_length[3]|regex_match[/\A[a-zA-Z0-9\.]+\z/]',
        ],
        'current_password' => [
            'label'  => 'Kata Sandi Saat Ini',
            'rules'  => 'permit_empty|max_byte[72]',
            'errors' => ['max_byte' => 'Auth.errorPasswordTooLongBytes'],
        ],
        'new_password' => [
            'label'  => 'Kata Sandi Baru',
            'rules'  => 'required_with[current_password]|permit_empty|strong_password[]|max_byte[72]|differs[current_password]',
            'errors' => ['max_byte' => 'Auth.errorPasswordTooLongBytes'],
        ],
        'new_password_confirm' => [
            'label' => 'Konfirmasi Kata Sandi Baru',
            'rules' => 'required_with[current_password]|permit_empty|matches[new_password]',
        ],
    ];
}
