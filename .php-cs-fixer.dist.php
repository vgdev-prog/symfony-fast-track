<?php

$dirs = [
    __DIR__ . '/src',
    __DIR__ . '/config',
];

$excludedDirs = [
    'var',
    'vendor',
    'cache'
];

// Add tests when you create the directory:
// __DIR__ . '/tests',

$rules = [
    '@PSR12' => true,
    '@Symfony' => true, // Add Symfony-specific rules on top of PSR12

    // Tests
    'php_unit_method_casing' => ['case' => 'snake_case'],

    // Yoda style
    'yoda_style' => false,

    // Arrays
    'array_syntax' => ['syntax' => 'short'],
    'no_whitespace_before_comma_in_array' => true,
    'normalize_index_brace' => true,
    'trim_array_spaces' => true,
    'whitespace_after_comma_in_array' => true,
    'trailing_comma_in_multiline' => [
        'after_heredoc' => false,
        'elements' => ['arrays', 'arguments', 'parameters'],
    ],

    // PHPDoc
    'no_superfluous_phpdoc_tags' => ['allow_mixed' => true],
    'no_empty_comment' => true,
    'no_empty_phpdoc' => true,
    'no_blank_lines_after_phpdoc' => true,
    'phpdoc_types_order' => [
        'null_adjustment' => 'always_last',
        'sort_algorithm' => 'none',
    ],

    // Imports
    'no_unused_imports' => true,
    'ordered_imports' => ['sort_algorithm' => 'alpha'],

    // Formatting
    'no_extra_blank_lines' => [
        'tokens' => [
            'extra',
            'throw',
            'use',
        ],
    ],
    'single_quote' => true,
    'concat_space' => ['spacing' => 'one'],
    'blank_line_before_statement' => [
        'statements' => ['return'],
    ],

    // Type casting
    'cast_spaces' => ['space' => 'single'],
    'no_short_bool_cast' => true,
    'no_unset_cast' => true,
    'short_scalar_cast' => true,

    // Casing
    'magic_constant_casing' => true,
    'magic_method_casing' => true,
    'native_function_casing' => true,
    'native_function_type_declaration_casing' => true,

    // Interfaces and classes
    'ordered_interfaces' => [
        'order' => 'alpha',
        'direction' => 'ascend',
    ],
    'ordered_class_elements' => [
        'order' => [
            'use_trait',
            'case',
            'constant_public',
            'constant_protected',
            'constant_private',
            'property_public',
            'property_protected',
            'property_private',
            'construct',
            'destruct',
            'magic',
            'method',
        ],
    ],

    'global_namespace_import' => [
        'import_classes' => true,
        'import_constants' => false,
        'import_functions' => false,
    ],


    // Control structures
    'control_structure_braces' => true,
    'no_alternative_syntax' => ['fix_non_monolithic_code' => false],
    'no_superfluous_elseif' => true,

    // Operators
    'binary_operator_spaces' => [
        'default' => 'single_space',
    ],
    'space_after_semicolon' => ['remove_in_empty_for_expressions' => true],

    // Miscellaneous
    'include' => true,
    'new_with_parentheses' => true,
    'single_space_after_construct' => true,
    'type_declaration_spaces' => true,
];

$finder = PhpCsFixer\Finder::create()
    ->in($dirs)
    ->exclude($excludedDirs)
    ->notPath('Kernel.php');

$config = new PhpCsFixer\Config();
$config->setRules($rules);
$config->setFinder($finder);

return $config;
